<?php
defined('BASEPATH') OR exit('No direct script access allowed');

interface SyntaxFramework {

    function loadview($view = '', $parameter = array());

    function renderParameter($parameter);

    function loadModel($modelName);

    function getRequest();

    function get($param = NULL);

    function post($param = NULL);

    function inputGet($param = NULL);

    function inputall();
}
