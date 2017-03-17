<?php 
include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");
include("logica-usuario.php");
require_once("class/ProdutoDao.php");
require_once("class/CategoriaDao.php");

$id = $_POST['id'];

$produtoDao = new Produto($conexao);

$produtoDao->removeProduto($id);
$_SESSION["success"] = "Produto removido com sucesso.";
header("Location: produto-lista.php");
die();
?>
