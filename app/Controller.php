<?php

abstract class Controller{
    /**
     * Permet de charger un modèle
     *
     * @param string $model
     * @return void
     */
    public function loadModel(string $model){
        // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT.'Model/'.$model.'.php');

        // On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
        $this->$model = new $model();
    }

    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @return array
     */
    public function render(string $fichier, array $data = []): array
    {
        // Récupère les données et les extrait sous forme de variables
        extract($data);

        $Model_ClassName = str_replace('Controller', '', get_class($this));

        // Crée le chemin et inclut le fichier de vue
        return [
            'file' => ('View/pages/'.strtolower($Model_ClassName).'/'.$fichier.'.php'),
            'data' => $data
        ];
    }
}

