<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs_model extends CI_Model{
    private $__table = 'jq_jobs';
    private $__table_save = 'jq_saved_jobs';
    
    
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

    public function save_job($data)  {
        $query = $this->db->insert($this->__table_save, $data); 
        return $query;
    }

    public function delete_job($data)   {
        $this->db->where($data);
        $this->db->delete($this->__table_save);         
    }

    public function has_applied($data)   {

    }

          

    
}