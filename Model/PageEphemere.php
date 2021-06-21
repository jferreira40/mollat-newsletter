<?php

namespace Model;

use app\Model;

class PageEphemere extends Model {
    public function __construct($id = null) {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "page";
        $this->id = $id;

        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    public function update ($data) {
        $sql = "UPDATE ".$this->table." SET name=:name, content=:content, title=:title, description=:description, url=:url WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':name', $data['name']);
        $query->bindParam(':content', $data['content']);
        $query->bindParam(':title', $data['title']);
        $query->bindParam(':description', $data['description']);
        $query->bindParam(':url', $data['url']);
        $query->execute();
        return $query->rowCount();
    }

    public function store ($data) {
        $sql = "INSERT INTO ".$this->table." (name, content, title, description, url) VALUES (:name, :content, :title, :description, :url)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':name', $data['name']);
        $query->bindParam(':content', $data['content']);
        $query->bindParam(':title', $data['title']);
        $query->bindParam(':description',  $data['description']);
        $query->bindParam(':url',  $data['url']);
        $query->execute();

        return $this->_connexion->lastInsertId();
    }

    public function replicate () {
        $PageReference = $this->getOne();
        $newName = $PageReference['name'].' (copie)';
        $sql = "INSERT INTO ".$this->table." (name, content, title, description, url) VALUES (:name, :content, :title, :description, :url)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':name', $newName);
        $query->bindParam(':content', $PageReference['content']);
        $query->bindValue(':title', "");
        $query->bindValue(':description', "");
        $query->bindValue(':url', "");
        $query->execute();

        return $this->_connexion->lastInsertId();
    }

    public function destroy () {
        $sql = "DELETE FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }
}
