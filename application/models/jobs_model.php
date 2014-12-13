<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs_model extends CI_Model{
    private $__table = 'jq_jobs';
    
    
    public function __construct()
    {
        parent::__construct();
    }

    public function add_jobs($data){
        $query = $this->db->insert($this->__table, $data); 
        return $query;
    }

    public function get_jobs($condition)	{
    	$this->db->like($condition);
        $result = $this->db->get($this->__table);
        return $result;
    }

          

    
}