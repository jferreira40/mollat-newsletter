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

    public function show(int $id) {
        $Templates = new Template($id);
        $template = $Templates->getOne();

        return $this->render('template', compact('template'));
    }

    public function destroy (int $id) {
        $Templates = new Template($id);
        $template = $Templates->destroy();

        header("Location: ".ROOT.'templates');
    }
}
