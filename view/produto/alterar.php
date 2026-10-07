<?php

use App\Fornecedor;
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
    $fornecedor = Fornecedor::buscarPorId($_GET['id']);
    echo "<pre>";
    print_r($fornecedor);
    echo "</pre>";
?>
<main class="container mb-5 mt-3">
    <h1 class="text-center">Editar Fornecedor</h1>
    <form method="POST" action="/supermercado/action/action_fornecedor.php?action=alterar&id=<?= $fornecedor->id ?>">
        Nome: <input name="nome" type="text" class="form-control" value="<?= $fornecedor->nome ?>">
        CNPJ <input name="cnpj" type="text" class="form-control" value="<?= $fornecedor->cnpj ?>">
        Telefone: <input name="telefone" type="text" class="form-control" value="<?= $fornecedor->telefone ?>">
        Email: <input name="email" type="text" class="form-control" value="<?= $fornecedor->email ?>">
        Endereço: <input name="endereco" type="text" class="form-control" value="<?= $fornecedor->endereco ?>">
        <input type="submit" value="Editar" class="btn btn-primary mb-5">
    </form>
</main>
