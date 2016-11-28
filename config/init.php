<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require './config/config.php';//configucation file
require './config/Request.php';//Get request
require './config/SyntaxFramework.php';//interface
require './core/ninediyControllers.php';//core controller
require './helper/DatabaseHelper.php';//database helper

foreach (glob('./controllers/*.php') as $key => $value) {//required all file from controller
    require $value;
}

foreach (glob('./models/*.php') as $key => $value) {//required all file from models
        require $value;
}
