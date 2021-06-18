<?php

use Model\Template;

require_once('app/Controller.php');
require_once('app/Model.php');
require_once('Model/Template.php');

class TemplatesController extends Controller {
    public function index() {
        $Templates = new Template();
        $templates = $Templates->getAll();

        return $this->render('templates', compact('templates'));
    }

    public function show(int $id) {
        $Templates = new Template($id);
        $template = $Templates->getOne();

        return $this->render('template', compact('template'));
    }

    public function create () {
        $data = [];
        return $this->render('template', compact('data'));
    }

    public function store () {
        $dataToStore = $_POST;
        $dataToStore['content'] = preg_replace( "/\r|\n/", "", $dataToStore['content']);

        $Template = new Template();
        $new_Template = $Template->store($dataToStore);
        echo json_encode(['data' => $new_Template]);
        die(); // nécessaire pour éviter d'être redirigé par le routeur
    }

    public function update (int $id) {
        $updatedData = $_POST;
        $updatedData['content'] = preg_replace( "/\r|\n/", "", $updatedData['content']);

        $Template = new Template($id);
        $updated_Template = $Template->update($updatedData);
        echo json_encode(['data' => $updated_Template]);
        die(); // nécessaire pour éviter d'être redirigé par le routeur
    }

    public function replicate(int $id) {
        $Templates = new Template($id);
        $template = $Templates->replicate();

        header("Location: ".ROOT.'templates');
    }

    public function destroy (int $id) {
        $Templates = new Template($id);
        $template = $Templates->destroy();

        header("Location: ".ROOT.'templates');
    }
}
