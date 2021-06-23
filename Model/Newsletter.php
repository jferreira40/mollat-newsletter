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

    public function update ($data) {
        $sql = "UPDATE ".$this->table." SET title=:title, content=:content, style=:style WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':title', $data['title']);
        $query->bindParam(':content', $data['content']);
        $query->bindParam(':style', $data['style']);
        $query->execute();
        return $query->rowCount();
    }

    public function store ($data) {
        $sql = "INSERT INTO ".$this->table." (title, content, style) VALUES (:title, :content, :style)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':title', $data['title']);
        $query->bindParam(':content',  $data['content']);
        $query->bindParam(':style',  $data['style']);
        $query->execute();

        return $this->_connexion->lastInsertId();
    }

    public function replicate () {
        $NewsletterReference = $this->getOne();
        $newTitle = $NewsletterReference['title'].' (copie)';
        $newContent = $NewsletterReference['content'];
        $newStyle = $NewsletterReference['style'];
        $sql = "INSERT INTO ".$this->table." (title, content, style) VALUES (:title, :content, :style)";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':title', $newTitle);
        $query->bindParam(':content', $newContent);
        $query->bindParam(':style', $newStyle);
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
