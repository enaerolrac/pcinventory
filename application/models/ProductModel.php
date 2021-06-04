<?php 
defined('BASEPATH') OR exit ("No direct script access allowed");

class ProductModel extends CI_Model {
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
    }

    public function loadProd(){
        $query = $this->db->get('product_list');
        return $query->result();
    }

    #region ADD
        public function save_product($data)
        {
            $this->db->insert("product_list", $data);
            return $this->db->affected_rows();
        }
    #endregion

    #region test delete
        public function delete_product(){
            $id=$this->input->post('id');
            $this->db->where('id', $id);
            $result=$this->db->delete('product_list');
            return $result;
        }
    #endregion

    #region update
        public function update_product(){
            $id=$this->input->post('id');
            $product_id=$this->input->post('product_id');
            $product_name=$this->input->post('product_name');
            $product_brand=$this->input->post('product_brand');
            $qtyonhand=$this->input->post('qtyonhand');
            $price=$this->input->post('price');

            $this->db->set('product_id', $product_id);
            $this->db->set('product_name',$product_name);
            $this->db->set('product_brand', $product_brand);
            $this->db->set('qtyonhand',$qtyonhand);
            $this->db->set('price',$price);
            $this->db->where('id',$id);
           
            $result=$this->db->update('product_list');
            return $result;






        }
    #endregion

}