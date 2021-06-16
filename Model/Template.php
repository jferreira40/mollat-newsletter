<?php

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

    public function destroy () {
        $sql = "DELETE FROM ".$this->table." WHERE id=".$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }
}
