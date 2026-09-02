<?php
namespace App;
use PDO;
use PDOException;

class Database{
    private const HOST = 'localhost';

    private const USER = 'root';

    private const PASSWORD = '123';

    private const DBNAME = 'supermercado';

    private $connection;

    private $table;

    //método que constrói a classe

    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();

    }

    //método que cria uma conexão com o banco de dados

    public function setConnection(){
        $connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME,self::USER,self::PASSWORD);
    }

    //método que insere dados no banco

    public function insert($array){

       //extrair as chaves do array

        $fields = array_keys($array);
        //criar um array com valores = ?
        $binds = array_pad([], count($array), '?');
        //monta a query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).')
        VALUES('.$implode(',',$binds).')'; //algo deu errado aqui, não consegui identificar
        //executa a query
        $this->execute($query, array_values($array));
        return $this->connection->lastInsertId();
        
    }

}

$db = new Database('fornecedor');
$db->insert([
    'nome'=>'Coca-cola',
    'cnpj'=>'98867488393939',
    'telefone'=>'77857849030',
    'email'=>'coca@gmail.com',
    'endereco'=>'Avenida JK'
]);



/* $db = new Database('fornecedor');
$fornecedor = [
    'nome'=>'Coca-cola',
    'cnpj'=>'98867488393939',
    'telefone'=>'77857849030',
    'email'=>'coca@gmail.com',
    'endereco'=>'Avenida JK'
];
$db->insert($fornecedor);
*/
