<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model{
    private $__table = 'natgeo_contastant';
    
    
    public function __construct()
    {
        parent::__construct();
    }

    public function add_user($data){
        $query = $this->db->insert($this->__table, $data); 
        return $query;
    }

     public function has_user_registered($email){
        $this->db->where('customer_email',$email);
        $result = $this->db->get($this->__table);
        return $result->num_rows();     	
     }

     
     public function get_user($email){
        $this->db->where('customer_email',$email);
        return $this->db->get($this->__table);          
     }

     public function update_user($email,$update_row)    {
        $this->db->where('customer_email',$email);
        return $this->db->update($this->__table, $update_row);   
    }  

          

    
}