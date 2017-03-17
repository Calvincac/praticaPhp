<?php
require_once("class/Categoria.php");

function listaCategorias($conexao) {
    $categorias = array();
    $query = "select * from categorias";

    $categoria =  new Categoria();

    $resultado = mysqli_query($conexao, $query);

    while($categoria_array = mysqli_fetch_assoc($resultado)) {

        $categoria->setId($categoria_array['id']);
        $categoria->setNome($categoria_array['nome']);

        array_push($categorias, $categoria);
    }
    return $categorias;
}
