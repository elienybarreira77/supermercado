<?php
use App\Fornecedor;
    require('../vendor/autoload.php');
    $opcao = $_GET['action'];
    $fornecedor = new Fornecedor();
    $msg='';
    switch($opcao){
        case 'cadastrar' :
            $fornecedor->nome = $_POST['nome'];
            $fornecedor->cnpj = $_POST['cnpj'];
            $fornecedor->telefone = $_POST['telefone'];
            $fornecedor->email = $_POST['email'];
            $fornecedor->endereco = $_POST['endereco'];
            $fornecedor->cadastrar();
            $msg='Fornecedor cadastrado com sucesso';
            header('location: /supermercado/view/fornecedor/listar.php?msg='.$msg);
        break;
        case 'alterar' :
            $fornecedor = Fornecedor::buscarPorId($_GET['id']);
            $fornecedor->nome = $_POST['nome'];
            $fornecedor->cnpj = $_POST['cnpj'];
            $fornecedor->telefone = $_POST['telefone'];
            $fornecedor->email = $_POST['email'];
            $fornecedor->endereco = $_POST['endereco'];
            $fornecedor->alterar();
            $msg='Fornecedor alterado com sucesso';
            header('location: /supermercado/view/fornecedor/listar.php?msg='.$msg);
        break;
        case 'excluir' :
            $fornecedor->id = $_GET['id'];
            $fornecedor->excluir();
            $msg='Fornecedor excluido com sucesso';
            header('location: /supermercado/view/fornecedor/listar.php?msg='.$msg);
        break;
    }
?>