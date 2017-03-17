<?php

class ProdutoDao
{
	private $conexao;
	
	function __construct($conexao) {
		$this->conexao = $conexao;
	}
	
	
	function listaProdutos() {
		$produtos = array();
		$resultado = mysqli_query($this->conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");
		
		while($produto_array = mysqli_fetch_assoc($resultado)) {
			
			$categoria =  new Categoria();
			$categoria->setNome($produto_array['categoria_nome']);
			
			$produto = new Produto();
			$produto->setId($produto_array['id']);
			$produto->setNome($produto_array['nome']);
			$produto->setDescricao($produto_array['descricao']);
			$produto->setCategoria($categoria);
			$produto->setPreco($produto_array['preco']);
			$produto->setUsado($produto_array['usado']);
			
			array_push($produtos, $produto);
		}
		
		return $produtos;
	}
	
	function insereProduto(Produto $produto) {
		$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) 
        values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', 
            {$produto->getCategoria()->getId()}, {$produto->isUsado()})";
		
		return mysqli_query($this->conexao, $query);
	}
	
	function alteraProduto(Produto $produto) {
		$query = "update produtos set nome = '{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}',
        categoria_id= {$produto->getCategoria()->getId()}, usado = {$produto->getUsado()} where id = '{$produto->getId()}'";
		return mysqli_query($this->conexao, $query);
	}
	
	function removeProduto($id) {
		$query = "delete from produtos where id = {$id}";
		return mysqli_query($this->conexao, $query);
	}
	
	function buscaProduto($id) {
		$produto_buscado = array();
		$query = "select * from produtos where id = {$id}";
		$resultado = mysqli_query($this->conexao, $query);
		$produto_buscado =  mysqli_fetch_assoc($resultado);
		
		$categoria = new Categoria();
		$categoria->setId($produto_buscado['categoria_id']);
		
		$produto = new Produto();
		
		$produto->setId($produto_buscado['id']);
		$produto->setNome($produto_buscado['nome']);
		$produto->setDescricao($produto_buscado['descricao']);
		$produto->setCategoria($categoria);
		$produto->setPreco($produto_buscado['preco']);
		$produto->setUsado($produto_buscado['usado']);
		
		return $produto;
		
	}
	
	
	
	
	
}
