<?php
require_once("class/Categoria.php");

function listaCategorias($conexao) {
    $categorias = array();
    $query = "select * from categorias";

    $categoria =  new Categoria();

    $resultado = mysqli_query($conexao, $query);

    while($categoria_array = mysqli_fetch_assoc($resultado)) {

        $categoria->id =  $categoria_array['id'];
        $categoria->nome = $categoria_array['nome'];

        array_push($categorias, $categoria);
    }
    return $categorias;
}
