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
}
