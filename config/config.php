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
    }

}
