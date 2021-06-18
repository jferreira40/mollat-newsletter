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
}
