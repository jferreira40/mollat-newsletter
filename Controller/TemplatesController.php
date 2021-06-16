<?php

require_once('app/Controller.php');
require_once('app/Model.php');
require_once('Model/Template.php');

class TemplatesController extends Controller {
    public function index() {
        $Templates = new Template();
        $templates = $Templates->getAll();

        return $this->render('templates', compact('templates'));
    }

    public function edit() {
        $Templates = new Template(1);
        $template = $Templates->getOne();

        return $this->render('templates', compact('template'));
    }
}
