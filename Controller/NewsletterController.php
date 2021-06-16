<?php

require_once('app/Controller.php');

class NewsletterController extends Controller {
    public function index() {
        return ('View/pages/newsletter/newsletters.php');
    }

    public function edit() {
        return ('View/pages/newsletter/newsletter.php');
    }
}
