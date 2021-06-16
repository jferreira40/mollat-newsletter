<?php

require_once('app/Controller.php');
require_once('app/Model.php');
require_once('Model/Newsletter.php');

class NewsletterController extends Controller {
    public function index() {
        $Newsletter = new Newsletter();
        $news = $Newsletter->getAll();

        return $this->render('newsletters', compact('news'));
    }

    public function show(int $id) {
        $Newsletter = new Newsletter($id);
        $news = $Newsletter->getOne();

        return $this->render('newsletter', compact('news'));
    }

    public function destroy (int $id) {
        $Newsletter = new Newsletter($id);
        $news = $Newsletter->destroy();

        header("Location: ".ROOT.'newsletter');
    }
}
