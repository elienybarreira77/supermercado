<?php
use App\Fornecedor;
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
    $fornecedores = Fornecedor::listar(null,'nome asc');
    $msg = $_GET['msg'];
?>
<main class="container">
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= $msg ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <h2 class="text-center">Lista de Fornecedores</h2>
    <div class="text-end my-2">
        <a href="cadastrar.php"><button class="btn btn-success">+ Novo Fornecedor</button></a>
    </div>
    <table class="table table-hover">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
            </thead>
            <?php foreach($fornecedores as $fornecedor){ ?>
                <tr>
                    <td><?= $fornecedor->id ?></td>
                    <td><?= $fornecedor->nome ?></td>
                    <td><?= $fornecedor->cnpj ?></td>
                    <td><?= $fornecedor->telefone ?></td>
                    <td><?= $fornecedor->email ?></td>
                    <td><?= $fornecedor->endereco ?></td>
                    <td><a href=""><button class="btn btn-primary">Editar</button></a>
                    <a href="/supermercado/action/action_fornecedor.php?action=excluir&id=<?= $fornecedor->id ?>">
                    <button onclick="return confirm('Deseja realmente excluir esse Fornecedor?')" class="btn btn-danger">Excluir</button></a</td>
                </tr>
        <?php    }if (empty($fornecedores)): ?>
                <tr><td colspan="7" class="text-center py-4"><b>Nenhum Fornecedor cadastrado.</b></td></tr>
        <?php endif; ?>
        
    </table>
</main>