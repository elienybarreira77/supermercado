<?php
use App\Produto;
    require('../../vendor/autoload.php');
    include('../includes/cabecalho.php');
    include('../includes/menu.php');
    include('../includes/rodape.php');
    $produtoes = Produto::listar(null,'nome asc');
    $msg = $_GET['msg'];
?>
<main class="container">
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= $msg ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <h2 class="text-center">Lista de Produtos</h2>
    <div class="text-end my-2">
        <a href="cadastrar.php"><button class="btn btn-success">+ Novo Produto</button></a>
    </div>
    <table class="table table-hover">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Codigo</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Data de validade</th>
                <th>Fornecedor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <?php foreach($produtoes as $produto){ ?>
                <tr>
                    <td><?= $produto->id ?></td>
                    <td><?= $produto->nome ?></td>
                    <td><?= $produto->descricao ?></td>
                    <td><?= $produto->codigo ?></td>
                    <td><?= $produto->quantidade ?></td>
                    <td><?= $produto->preco ?></td>
                    <td><?= $produto->data_validade ?></td>
                    <td><?= $produto->fornecedor ?></td>
                    <td><a href=""><button class="btn btn-primary">Editar</button></a>
                    <a href="/supermercado/action/action_produto.php?action=excluir&id=<?= $produto->id ?>">
                    <button onclick="return confirm('Deseja realmente excluir esse Produto?')" class="btn btn-danger">Excluir</button></a</td>
                </tr>
        <?php    }if (empty($produtoes)): ?>
                <tr><td colspan="7" class="text-center py-4"><b>Nenhum Produto cadastrado.</b></td></tr>
        <?php endif; ?>
        
    </table>
</main>