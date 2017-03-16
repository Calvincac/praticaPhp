<?php
include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("logica-usuario.php");
require_once("class/Produto.php");

verificaUsuario();

//$produto = array("nome" => "", "descricao" => "", "preco" => "", "categoria_id" => "1");
@$produto = new Produto();
@$produto->nome = '';
@$produto->descricao = '';
@$produto->preco = '';
@$produto->categoria->id = 1;
@$produto->usado = "";

$categorias = listaCategorias($conexao);
?>

<h1>Formulário de produto</h1>
<form action="adiciona-produto.php" method="post">
    <table class="table">

        <?php include("produto-formulario-base.php"); ?>
        
        <tr>
            <td><button class="btn btn-primary" type="submit">Cadastrar</button></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
