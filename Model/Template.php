<?php

namespace Model;

use app\Model;

class Template extends Model
{
    public function __construct($id = null)
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "template";
        $this->id = $id;

        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    public function update ($data) {
        $sql = "UPDATE ".$this->table." SET name=:name, content=:content WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':name', $data['name']);
        $query->bindParam(':content', $data['content']);
        $query->execute();
        return $query->rowCount();
    }

    public function store ($data) {
        $sql = "INSERT INTO ".$this->table." (name, content) VALUES (:name, :content)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':name', $data['name']);
        $query->bindParam(':content',  $data['content']);
        $query->execute();

        return $this->_connexion->lastInsertId();
    }

    public function replicate () {
        $TemplateReference = $this->getOne();
        $newName = $TemplateReference['name'].' (copie)';
        $newContent = $TemplateReference['content'];
        $sql = "INSERT INTO ".$this->table." (name, content) VALUES (:name, :content)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':name', $newName);
        $query->bindParam(':content', $newContent);
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
