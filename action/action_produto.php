<?php
use App\Produto;
    require('../vendor/autoload.php');
    $opcao = $_GET['action'];
    $produto = new Produto();
    $msg='';
    switch($opcao){
        case 'cadastrar' :
            $produto->nome = $_POST['nome'];
            $produto->descricao = $_POST['descricao'];
            $produto->codigo = $_POST['codigo'];
            $produto->quantidade = $_POST['quantidade'];
            $produto->preco = $_POST['preco'];
            $produto->data_validade = $_POST['data_validade'];
            $produto->fornecedor = $_POST['fornecedor'];
            $produto->cadastrar();
            $msg='Produto cadastrado com sucesso';
            header('location: /supermercado/view/produto/listar.php?msg='.$msg);
        break;
        case 'alterar' :
            $produto = Produto::buscarPorId($_GET['id']);
            $produto->nome = $_POST['nome'];
            $produto->cnpj = $_POST['cnpj'];
            $produto->telefone = $_POST['telefone'];
            $produto->email = $_POST['email'];
            $produto->endereco = $_POST['endereco'];
            $produto->alterar();
            $msg='Produto alterado com sucesso';
            header('location: /supermercado/view/produto/listar.php?msg='.$msg);
        break;
        case 'excluir' :
            $produto->id = $_GET['id'];
            $produto->excluir();
            $msg='Produto excluido com sucesso';
            header('location: /supermercado/view/produto/listar.php?msg='.$msg);
        break;
    }
?>