<?php

namespace Model;

use app\Model;

class Newsletter extends Model
{
    public function __construct($id = null)
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "newsletter";
        $this->id = $id;

        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    public function store ($Model) {
        var_dump($Model);
        die();
        $sql = "INSERT INTO ".$this->table." WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }

    public function replicate () {
        $NewsletterReference = $this->getOne();
        $newTitle = $NewsletterReference['title'].' (copie)';
        $newContent = $NewsletterReference['content'];
        $sql = "INSERT INTO ".$this->table." (title, content) VALUES (:title, :content)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':title', $newTitle);
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
