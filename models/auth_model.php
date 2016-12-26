<?php

class auth_model {

    public function __construct() {
        $this->db = new Mysqli_helper();
        $this->db->connect();
    }

    public function checkLogin($username = '', $password = '') {
        $sqlcmd = "SELECT member_id,name,surname,email,tel,username,permission FROM `member` WHERE `username`=%s AND `password`=%s LIMIT 1"; //sql cmd
        $result = $this->db->queryAndFetch($sqlcmd, array($username, $password)); //return 1 row   
        return $result;
    }

}
