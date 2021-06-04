<?php
defined('BASEPATH') or exit("No direct script access allowed");

class UserModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    #region AUTHENTICATE user
    public function authenticate($username, $password)
    {
        // $this->db->where(array("username" => $username, "password" => hash('sha512', $password)));
        // $res = $this->db->get("users")->row();// null or array object (result)
        // return $res;
        $res = $this->db->query("SELECT *FROM users WHERE username = ? AND password = ?", array($username, hash("sha512", $password)))->row();
        return $res;
    }
    #endregion
}   