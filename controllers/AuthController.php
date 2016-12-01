<?php

class AuthController extends ninediyControllers {

    public function __construct() {
        $this->loadModel('auth_model', 'aModel');
    }

    public function index() {
        $this->login();
    }

    public function login() {
        $this->loadview('view-login.php');
    }

    public function processLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = $this->post('username'); //$_POST['username']
            $password = $this->post('password'); //$_POST['password']

            $result = $this->aModel->checkLogin($username, $password);

            if (count($result) > 0) {
                $_SESSION['userdata'] = $result;
                header('Location:' . BASEPATH . 'admin');die;
            } else {
                header('Location:login?status=error');
                die;
            }
        } else {
            header("HTTP/1.0 404 Bad Request");
            die;
        }
    }

    public function logout() {
        session_destroy();
        header('refresh:0;url=login');
        die;
    }

}
