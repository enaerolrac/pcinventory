<?php
defined("BASEPATH") or exit ("No direct script access allowed"); 

class Dashboard extends CI_Controller
{

    private $sessionUser;

    public function __construct(){

        parent::__construct();
        $this->load->helper("url"); 
        $this->load->library("session");

        $this->sessionUser = $this->session->userdata("user");
    }


    public function index()
    {  
        if($this->sessionUser !=null){
            $data['user'] = $this->sessionUser;
            $this->load->view("templates/header");
            $this->load->view("templates/sidebar");
            $this->load->view("dashboard", $data);
            $this->load->view("templates/footer");
        }else{
            redirect();
        }
    }



}   
