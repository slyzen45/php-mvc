<?php

abstract class Model{
    // infos bdd
    private $host = "DESKTOP-M50QUE7\MSSQLSERVER01";
    private $db_name = "Solarys";
    private $username = "admin_bdd";
    private $password = "admin_bdd123";

    // propriété contenant la connexion
    protected $_connexion;

    // propriétés contenant les informations de requêtes
    public $table;
    public $id;

    public function getConnection(){
        $this->_connexion = null;

        try{
            $this->_connexion = new PDO('sqlsrv:Server='. $this->host . '; Database=' . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo 'Erreur de connexion: ' . $exception->getMessage();
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}


