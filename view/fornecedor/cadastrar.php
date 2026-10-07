<?php
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
?>
<main class="container mb-5 mt-3">
    <h1 class="text-center">Cadastrar Fornecedor</h1>
    <form method="POST" action="/supermercado/action/action_fornecedor.php?action=cadastrar">
        Nome: <input name="nome" type="text" class="form-control">
        CNPJ <input name="cnpj" type="text" class="form-control">
        Telefone: <input name="telefone" type="text" class="form-control">
        Email: <input name="email" type="text" class="form-control">
        Endereço: <input name="endereco" type="text" class="form-control">
        <input type="submit" value="Cadastrar" class="btn btn-primary mb-5">
    </form>
</main>
