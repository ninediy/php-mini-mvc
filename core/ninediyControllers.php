<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ninediyControllers implements SyntaxFramework {

    function loadview($view = '', $parameter = array()) {
        foreach ($parameter as $key => $value) {
            ${$key} = $value;
        }
        include './views/' . $view;
    }

    function loadModel($modelName, $prefix = null) {
        if ($prefix) {
            $this->$prefix = new $modelName() . '_model.php';
        } else {
            $this->$model_name = new $modelName() . '_model.php';
        }
    }

    function loadHelper($helperName, $prefix = null) {
        if ($prefix) {
            $this->$prefix = new $helperName() . '_helper.php';
        } else {
            $this->$helper_name = new $helperName() . '_helper.php';
        }
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
            if (isset($_POST[$param])) {
                return $_POST[$param];
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

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    }

    function native_curl($new_name, $new_email) {
        $username = 'admin';
        $password = '1234';

        // Alternative JSON version
        // $url = 'http://twitter.com/statuses/update.json';
        // Set up and execute the curl process
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/restserver/index.php/example_api/user/id/1/format/json');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
            'name' => $new_name,
            'email' => $new_email
        ));

        // Optional, delete this line if your API is open
        curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);

        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);

        $result = json_decode($buffer);

        if (isset($result->status) && $result->status == 'success') {
            echo 'User has been updated.';
        } else {
            echo 'Something has gone wrong';
        }
    }

}
