<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php"); 
require_once("class/Produto.php");
require_once("class/Categoria.php");
require_once("class/ProdutoDao.php");
require_once("class/CategoriaDao.php");

?>

<?php
$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto = new Produto();

$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"];
$produto->categoria = $categoria;

if(array_key_exists('usado', $_POST)) {
    $produto->usado = "true";
} else {
    $produto->usado = "false";
}

$produtoDao = new ProdutoDao($conexao);

if($produtoDao->alteraProduto($produto)) { ?>
    <p class="text-success">O produto <?= $produto->nome; ?>, <?= $produto->preco; ?> alterado com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O produto <?= $produto->nome; ?> não foi alterado: <?= $msg ?></p>
<?php
}
?>

<?php include("rodape.php"); ?>
