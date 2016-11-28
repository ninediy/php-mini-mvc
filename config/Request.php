<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Request {

    public $params = array();

    public function __set($name, $value) {
        $this->params[$name] = $value;
    }

    public function __get($name) {
        return $this->params[$name];
    }

}
