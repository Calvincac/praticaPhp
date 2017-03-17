<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");

$id = $_GET['id'];

$produtoDao = new Produto($conexao);
$categoriaDao = new Categoria($conexao);

$produto = $produtoDao->buscaProduto($id);

$categorias = $categoriaDao->listaCategorias();

$usado = $produto->isUsado() ? "checked='checked'" : "";
?>

<h1>Alterando produto</h1>
<form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?=$produto->getId()?>" />
    <table class="table">

        <?php include("produto-formulario-base.php"); ?>
        
        <tr>
            <td><button class="btn btn-primary" type="submit">Alterar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
