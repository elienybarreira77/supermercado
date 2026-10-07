<?php
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
?>
<main class="container mb-5 mt-3">
    <h1 class="text-center">Cadastrar Fornecedor</h1>
    <form method="POST" action="/supermercado/action/action_produto.php?action=cadastrar">
        Nome: <input name="nome" type="text" class="form-control">
        Descrição <input name="descricao" type="text" class="form-control">
        Codigo: <input name="codigo" type="text" class="form-control">
        Quantidade: <input name="quantidade" type="number" class="form-control">
        Preço: <input name="preco" type="text" class="form-control">
        Data de validade: <input name="data_validade" type="date" class="form-control">
        Fornecedor: <input name="fornecedor" type="text" class="form-control">
        <input type="submit" value="Cadastrar" class="btn btn-primary mb-5">
    </form>
</main>
