<?php

require_once('app/Model.php');

class Newsletter extends Model
{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "newsletter";

        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    public function getAll() {
        return ['News1', 'News2', 'News3'];
    }
}
