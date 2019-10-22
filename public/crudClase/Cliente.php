<?php
/**
 * Created by PhpStorm.
 * User: igomis
 * Date: 2019-10-20
 * Time: 20:36
 */


class Cliente
{
    private $data = [];


    public static function conn(){
        $db_host = "localhost";
        $db_post = '3306';
        $db_user = "homestead";
        $db_pass = "secret";
        $db_name = "test";

        try {
            return new PDO ("mysql:host=$db_host;port=$db_post;dbname=$db_name", $db_user, $db_pass);
        }catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    public function __construct(Array $array)
    {
        $this->data = $array;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {

        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }


    static public function all(){
        $sth = self::conn()->prepare("SELECT * FROM clientes");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    static public function find($id):Cliente
    {
        $sth = self::conn()->prepare("SELECT * FROM clientes WHERE dni = :id");
        $sth->bindParam(':id',$id);
        $sth->execute();
        if (!$sth->rowCount()) throw new Exception('Client no trobat');
        return new Cliente($sth->fetch());
    }

    function delete():bool
    {
        $sth = self::conn()->prepare("DELETE FROM clientes WHERE dni = :id");
        $dni = $this->dni;
        $sth->bindParam(':id',$dni);
        $sth->execute();
        if (!$sth->rowCount()) throw new Exception('No he pogut esborrar client');
        return true;
    }

    function save(){
        $sth = self::conn()->prepare("INSERT INTO clientes (dni,nombre,direccion,telefono) VALUES (:dni,:nombre,:direccion,:telefono)");
        $sth->execute(array(':dni'=>$this->dni,':nombre'=>$this->nombre,':direccion'=>$this->direccion,':telefono'=>$this->telefono));
        if (!$sth->rowCount()) throw new Exception('No he pogut afegir el client');
        return true;
    }

    function update(){
        $sth = self::conn()->prepare("UPDATE clientes SET `nombre` = :nombre,`direccion` = :direccion,`telefono` = :telefono WHERE dni = :id");
        $sth->execute(array(':id'=>$this->dni,':nombre'=>$this->nombre,':direccion'=>$this->direccion,':telefono'=>$this->telefono));
        if (!$sth->rowCount()) throw new Exception('No he pogut modificar el client');
        return true;
    }

}