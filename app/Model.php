<?php

namespace app;

use PDO;
use PDOException;

abstract class Model {
    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;

    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;

    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function getConnection(){
        include '_env.php';

        // On supprime la connexion précédente
        $this->_connexion = null;

        // On essaie de se connecter à la base
        try{
            $this->_connexion = new PDO("mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME, $DB_USER, $DB_PASSWORD);
            $this->_connexion->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }

    /**
     * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
     *
     * @return void
     */
    public function getOne(){
        $sql = "SELECT * FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     *
     * @return void
     */
    public function getAll(){
        $sql = "SELECT * FROM ".$this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
