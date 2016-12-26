<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class config {

    public $mainController = 'MainController';

    public function regenerateSession() {
        if (isset($_SESSION['regenerated_count'])) {//regenerate session
            if (++$_SESSION['regenerated_count'] > 100) {
                //reset and regenerate
                $_SESSION['regenerated_count'] = 0;
                session_regenerate_id(true);
            }
        } else {
            $_SESSION['regenerated_count'] = 0;
        }
        return $this;
    }

    public function checkUserAgent($byIp = true) {
        if (isset($_SESSION['OLD_USER_AGENT'])) {
            if ($_SESSION['OLD_USER_AGENT'] == ($byIp ? $this->genUserAgenctByIP() : $this->genUserAgent())) {
                return true;
            } else {
                return false;
            }
        } else {
            if ($byIp) {
                $_SESSION['OLD_USER_AGENT'] = $this->genUserAgenctByIP();
            } else {
                $_SESSION['OLD_USER_AGENT'] = $this->genUserAgenct();
            }
        }
    }

    public function genUserAgent() {
        $user_agent = @md5($_SERVER['HTTP_ACCEPT_CHARSET'] . $_SERVER['HTTP_ACCEPT_ENCODING'] . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . $_SERVER['HTTP_USER_AGENT']);
        return $user_agent;
    }

    public function genUserAgenctByIP() {
        $user_agent = @md5($_SERVER['HTTP_ACCEPT_CHARSET'] . $_SERVER['HTTP_ACCEPT_ENCODING'] . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
        return $user_agent;
    }

}
