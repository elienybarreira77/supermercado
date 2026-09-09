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
        $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME,self::USER,self::PASSWORD);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function execute($query, $values = null){
        try{
            echo "<pre>";
            print_r($query);
            echo "</pre>";
            $statement = $this->connection->prepare($query);
            $statement->execute($values);
            return $statement;

        }catch(PDOException $e){
            die('ERRO: '.$e);

        }
    }

    //método que insere dados no banco

    public function insert($array){

       //extrair as chaves do array
        $fields = array_keys($array);
        //criar um array com valores = ?
        $binds = array_pad([], count($array), '?');
        //monta a query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).')
        VALUES('.implode(',',$binds).')'; //algo deu errado aqui, não consegui identificar
        //executa a query
        $this->execute($query, array_values($array));
        return $this->connection->lastInsertId()
    }

    public function update($where, $array){
        //extrair as chaves do array
        $fields = array_keys($array);
        //monta a query
        $query = 'UPDATE '.$this->table.' SET '.implode('=?, ',$fields).' WHERE '.$where;
        $this->execute($query, array_values($array));
        return true;
    }

    public function delete($where){
        //monta a query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);
        return true;
    }

    public function select($where=null,$order=null,$limit=null,$fields='*'){
        $where = strlen($where) ? 'ORDER BY'.$where : '';
        $order = strlen($order) ? 'ORDER BY'.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where. ' '.$order.' '.$limit;
        return $this->execute($query);
    }

}

$db = new Database('fornecedor');
$db->delete('id=1');
$f = $db->select(null,'cnpj desc',2,'nome, cnpj')->fetchAll(PDO::FETCH_CLASS);
echo "<pre>";
print_r($f);
echo "</pre>";




//------------------------------------------------------------------------------------------------------------//


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

/*$db->insert([
    'nome'=>'Coca-cola',
    'cnpj'=>'98867488393939',
    'telefone'=>'77857849030',
    'email'=>'coca@gmail.com',
    'endereco'=>'Avenida JK'
]);*/


/*$db->update('id = 1',[
    'nome'=>'Kuat',
    'cnpj'=>'98867488393939',
    'telefone'=>'77857849030',
    'email'=>'kuat@gmail.com',
    'endereco'=>'Avenida JK'
]);*/