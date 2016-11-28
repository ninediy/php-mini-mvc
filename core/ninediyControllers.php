<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ninediyControllers implements SyntaxFramework {

    function loadview($view = '', $parameter = array()) {
        $this->renderParameter($parameter);
        include './views/' . $view;
    }

    function renderParameter($parameter) {
        foreach ($parameter as $key => $value) {
            ${$key} = $value;
        }
    }

    function loadModel($modelName) {
        $this->model = new $modelName();
    }

    function getRequest() {//Get request method
        $verb = $_SERVER['REQUEST_METHOD'];
        switch ($verb) {
            case 'GET':
                return $_GET;
                break;
            case 'POST':
            case 'PUT':
                return json_decode(file_get_contents('php://input'), 1);
                break;
            case 'DELETE':
            default:
                $return = array();
                break;
        }
    }

    function get($param = NULL) {
        if ($param) {
            if (isset($_GET[$param])) {
                return $_GET[$param];
            } else {
                return '';
            }
        } else {
            return $_GET;
        }
    }

    function post($param = NULL) {
        if ($param) {
            if (isset($_GET[$param])) {
                return $_GET[$param];
            } else {
                return '';
            }
        } else {
            return $_POST;
        }
    }

    function inputGet($param = NULL) {
        $params = $this->inputall();
        if ($param) {
            if (isset($params->$param)) {
                return $params->$param;
            } else {
                return '';
            }
        } else {
            return $params;
        }
    }

    function inputall() {
        return json_decode(file_get_contents('php://input'));
    }

}
