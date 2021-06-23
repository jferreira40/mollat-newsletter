<?php

require_once('app/Controller.php');
require_once('app/Model.php');

class NoelController extends Controller
{
    public function index()
    {
        return header("Location: ".ROOT.'noel.php');
    }
}
