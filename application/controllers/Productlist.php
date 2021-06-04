<?php 
defined('BASEPATH') OR exit ("No direct script access allowed");

class Productlist extends CI_Controller
{
        private $sessionUser;

    	public function __construct()
        {
            parent:: __construct();
            $this->load->helper("url");
            $this->load->library("session");
            $this->load->model("ProductModel");
            $this->sessionUser = $this->session->userdata("user");
            
        }

        public function index()
        {
            if($this->sessionUser !=null){
                $data['user'] = $this->sessionUser;
                // $data['product_list'] = $this->ProductModel->loadProd();
                $this->load->view("templates/header");
                $this->load->view("templates/sidebar");
                $this->load->view("product", $data);
                $this->load->view("templates/footer");
            }else{
                redirect();
            }
        }

        #region
        public function load_Prod(){
            $data = $this->ProductModel->loadProd();
            echo json_encode($data);
        }
        #endregion

        #region
        public function save(){
           $data = $_POST;
           $res = $this->ProductModel->save_product($data);
           if($res){
               echo json_encode(array(
                   "status" => true,
                   "message" => "success"
               ));
           }else{
               echo json_encode(array(
                   "status" => false,
                   "message" => "failed"
               ));
           }

            //  $data = $this->ProductModel->save_product();
            //  echo json_encode($data);
        }
        #endregion

        #region DELETE
        public function delete(){
            $data=$this->ProductModel->delete_product();
            echo json_encode($data);
            
        }
        #endregion

        #region EDIT
        public function update(){
            $data=$this->ProductModel->update_product();
            echo json_encode($data);
        }
        
        #endregion

}