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

    public function edit() {
        $Newsletter = new Newsletter(1);
        $news = $Newsletter->getOne();

        return $this->render('newsletter', compact('news'));
    }
}
