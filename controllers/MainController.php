<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends ninediyControllers {

    public function __construct() {
        //someThing
    }

    public function index() {
        echo '<h1>Hello world</h1>'
        . '<hr>'
        . '<p>Welcome to Ninediy <b>Mini MVC</b>'
        . '<ul>'
        . '<li>MainController is default controller</li>'
        . '<li>DatabaseHelper is helper for mysql</li>'
        . '<li>'
        . 'Path Structuer'
        . '<ul>'
        . '<li>/assets</li>'
        . '<li>/config</li>'
        . '<li>/controllers</li>'
        . '<li>/core</li>'
        . '<li>/helper</li>'
        . '<li>/models</li>'
        . '<li>/views</li>'
        . '</ul>'
        . '</li>'
        . '</ul>'
        . '</p>';
    }

}
