<?php
namespace App;
use PDO;
class Produto{
    public $id;
    public $nome;
    public $descricao;
    public $codigo;
    public $quantidade;
    public $preco;
    public $data_validade;
    public $fornecedor;
    public function cadastrar(){
        $db = new DataBase('produto');
        $db->insert([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'codigo' => $this->codigo,
            'quantidade' => $this->quantidade,
            'preco' => $this->preco,
            'data_validade' => $this->data_validade,
            'id_fornecedor' => $this->fornecedor
        ]);
        return true;
    }
    public function alterar(){
        return (new DataBase('produto'))->update($this->id, [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'codigo' => $this->codigo,
            'quantidade' => $this->quantidade,
            'preco' => $this->preco,
            'data_validade' => $this->data_validade,
            'id_fornecedor' => $this->fornecedor
        ]);
    }
    public function excluir(){
        return (new DataBase('produto'))->delete('id='.$this->id);
    }
    public static function listar($where = null, $order = null, $limit = null){
        return (new DataBase('produto'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function buscarPorId($id){
        return (new DataBase('produto'))->select('id='.$id)->fetchObject(self::class);
    }
}