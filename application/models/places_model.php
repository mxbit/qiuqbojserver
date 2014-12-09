<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places_model extends CI_Model{
    private $__table = 'jq_cities';
    
    
    public function __construct()
    {
        parent::__construct();
    }

     public function get_places($place){
     	$this->db->like(array("city"=>$place));
        return $this->db->get($this->__table);        	
     }

    
}