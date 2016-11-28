<?php
define('BASEPATH', "");

require './config/init.php';

class index extends config {

    public $input;

    public function __construct() {
        $this->run(); //Run system
        $this->route(); //Run route
    }

    protected function run() {//running system 
        $this->request = new Request();
        $this->request->url_elements = array();
        if (isset($_SERVER['PATH_INFO'])) {
            $this->request->url_elements = explode('/', $_SERVER['PATH_INFO']);
        }
    }

    protected function route() {//Route controller and function method
        if ($this->request->url_elements) {
            $controller_name = ucfirst($this->request->url_elements[1] . 'Controller');
            if (class_exists($controller_name)) {
                $controller = new $controller_name();
                if (isset($this->request->url_elements[2])) {
                    $method_name = $this->request->url_elements[2];
                    if (method_exists($controller, $method_name)) {
                        $controller->$method_name();
                    } elseif (empty($method_name)) {
                        $controller->index();
                    } else {
                        header("HTTP/1.0 404 Bad Request");
                        die;
                    }
                } else {
                    $controller->index();
                }
            } else {
                header("HTTP/1.0 400 Bad Request");
                die;
            }
        } else {
            if ($this->mainController) {
                $controller = new $this->mainController();
                $controller->index();
            } else {
                header('HTTP/1.0 400 Bad Request');
                die;
            }
        }
    }

}

new index();
