<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");
include("logica-usuario.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto = new Produto();

$produto->setNome($_POST["nome"]);
$produto->setPreco($_POST["preco"]);
$produto->setDescricao($_POST["descricao"]);
$produto->setCategoria($categoria);

print_r($produto);

if(array_key_exists('usado', $_POST)) {
    $produto->setUsado("true");
} else {
    $produto->setUsado("false");
}

$produtoDao = new ProdutoDao($conexao);

if($produtoDao->insereProduto($produto)) { ?>
    <p class="text-success">O produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> adicionado com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O produto <?= $produto->getNome(); ?> não foi adicionado: <?= $msg ?></p>
<?php
}
?>

<?php include("rodape.php"); ?>
