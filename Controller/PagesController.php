<?php

use Model\PageEphemere;

require_once('app/Controller.php');
require_once('app/Model.php');
require_once('Model/PageEphemere.php');

class PagesController extends Controller {
    public function index() {
        $PageEphemere = new PageEphemere();
        $pages = $PageEphemere->getAll();

        return $this->render('pages', compact('pages'));
    }

    public function show(int $id) {
        $PageEphemere = new PageEphemere($id);
        $page = $PageEphemere->getOne();

        $data = ['page' => $page];
        return $this->render('page', compact('data'));
    }

    public function create () {
        $data = [];
        return $this->render('page', compact('data'));
    }

    public function store () {
        $dataToStore = $_POST;

        $Page = new PageEphemere();
        $new_Page = $Page->store($dataToStore);
        echo json_encode(['data' => $new_Page]);
        die(); // nécessaire pour éviter d'être redirigé par le routeur
    }

    public function update (int $id) {
        $updatedData = $_POST;

        $Page = new PageEphemere($id);
        $updated_Page = $Page->update($updatedData);
        echo json_encode(['data' => $updated_Page]);
        die(); // nécessaire pour éviter d'être redirigé par le routeur
    }

    public function replicate(int $id) {
        $Page = new PageEphemere($id);
        $newPageID = $Page->replicate();

        header("Location: ".ROOT.'pages');
    }

    public function destroy (int $id) {
        $Page = new PageEphemere($id);
        $pages = $Page->destroy();

        header("Location: ".ROOT.'pages');
    }
}
