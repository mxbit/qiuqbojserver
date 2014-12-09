<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

  public function __construct(){  
    parent::__construct();  
    if (!$this->ion_auth->logged_in()){
      redirect('auth', 'refresh');
    }  
   
    $this->load->model('places_model','places');

    // $this->load->library('grocery_CRUD');
  }

  public function index(){  
    redirect('landing/admin_home');
  }

  
  public function admin_home()  {
    $data['content'] = 'admin/view_admin_landing';  
    $this->load->view('admin/template_admin',$data);    
  }

  public function maps()  {
    $data['content'] = 'maps/testmap';
    $data['metro'] = true;
    $this->load->view('admin/template_admin',$data);    
  }




/**
AJAX REQUESTS
***/

  public function get_citis()  {
    $cities = $this->places->get_places( $this->input->get('query') );
    echo (json_encode($cities->result()));
  }



//@class ends
}