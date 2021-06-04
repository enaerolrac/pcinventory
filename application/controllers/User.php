<?php
defined('BASEPATH') or exit("No direct script access allowed");

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("UserModel");
        $this->load->library("session");
        
        $this->sessionUser = $this->session->userdata("user");
    }
    

    public function index()
    {
        if($this->sessionUser !=null){
            redirect("dashboard");
        }else{
            $this->load->view("templates/header");
            $this->load->view("login");
            $this->load->view("templates/footer");
        }
            
    }
    
    #region LOGIN
    public function login()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $user = $this->UserModel->authenticate($username, $password);
        if ($user == null){
            $this->session->set_flashdata("response", true);
            $this->session->set_flashdata("message", "Invalid account!");
            redirect();
        } else {
            $this->session->set_userdata(array("user" => $user));
            redirect("dashboard");
        }
    }
    #endregion

    
    #region LOGOUT
    public function logout()
    {
        if ($this->sessionUser !=null){
            $this->session->sess_destroy();
            redirect();
        }
    }
    #endregion
    
}