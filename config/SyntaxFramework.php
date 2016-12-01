<?php
defined('BASEPATH') OR exit('No direct script access allowed');

interface SyntaxFramework {

    function loadview($view = '', $parameter = array());

    function loadModel($modelName,$prefix);

    function getRequest();

    function get($param = NULL);

    function post($param = NULL);

    function inputGet($param = NULL);

    function inputall();
}
