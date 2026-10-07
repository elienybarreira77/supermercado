<?php
namespace App;
use PDO;
class Fornecedor{
    public $id;
    public $nome;
    public $cnpj;
    public $email;
    public $telefone;
    public $endereco;   

    public function cadastrar(){
        $db = new DataBase('fornecedor');
        $db->insert([
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco
        ]);
        return true;
    }
    public function alterar(){
        return (new DataBase('fornecedor'))->update($this->id, [
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco
        ]);
    }
    public function excluir(){
        return (new DataBase('fornecedor'))->delete('id='.$this->id);
    }
    public static function listar($where = null, $order = null, $limit = null){
        return (new DataBase('fornecedor'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    public static function buscarPorId($id){
        return (new DataBase('fornecedor'))->select('id='.$id)->fetchObject(self::class);
    }
    
}