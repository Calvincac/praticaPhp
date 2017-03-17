<?php
include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("logica-usuario.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");
require_once("class/ProdutoDao.php");
require_once("class/CategoriaDao.php");

verificaUsuario();

//$produto = array("nome" => "", "descricao" => "", "preco" => "", "categoria_id" => "1");
$categoria = new Categoria();
@$categoria->setId(1);
@$categoria->setNome("");

@$produto = new Produto();
@$produto->setNome('');
@$produto->setDescricao('');
@$produto->setPreco('');
@$produto->setCategoria($categoria);
@$produto->setUsado("");

$categoriaDao = new CategoriaDao($conexao);

$categorias = $categoriaDao->listaCategorias();
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
