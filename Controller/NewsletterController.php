<?php

use Model\Newsletter;
use Model\Template;

require_once('app/Controller.php');
require_once('app/Model.php');
require_once('Model/Newsletter.php');
require_once('Model/Template.php');

class NewsletterController extends Controller {
    public function index() {
        $Newsletter = new Newsletter();
        $news = $Newsletter->getAll();

        return $this->render('newsletters', compact('news'));
    }

    public function show(int $id) {
        $Newsletter = new Newsletter($id);
        $news = $Newsletter->getOne();

        $Template = new Template();
        $templates = $Template->getAll();

        $data = ['news' => $news, 'templates' => $templates];
        return $this->render('newsletter', compact('data'));
    }

    public function create () {
        $Template = new Template();
        $templates = $Template->getAll();

        $data = ['templates' => $templates];
        return $this->render('newsletter', compact('data'));
    }

    public function replicate(int $id) {
        $Newsletter = new Newsletter($id);
        $newNewsID = $Newsletter->replicate();

        /* $newNews = new Newsletter($newNewsID);
        $news = $newNews->getOne();
        return $this->render('newsletter', compact('news')); */

        header("Location: ".ROOT.'newsletter');
    }

    public function destroy (int $id) {
        $Newsletter = new Newsletter($id);
        $news = $Newsletter->destroy();

        header("Location: ".ROOT.'newsletter');
    }
}
