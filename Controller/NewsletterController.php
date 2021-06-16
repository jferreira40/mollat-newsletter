<?php

require_once('app/Controller.php');
require_once('Model/Newsletter.php');

class NewsletterController extends Controller {
    public function index() {
        $News = new Newsletter();
        $AllNews = $News->getAll();

        $_POST['news'] = $AllNews;
        return ('View/pages/newsletter/newsletters.php');
    }

    public function edit() {
        return ('View/pages/newsletter/newsletter.php');
    }
}
