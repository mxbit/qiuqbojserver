<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

  public function __construct(){  
    parent::__construct();  
    if (!$this->ion_auth->logged_in()){
      redirect('auth', 'refresh');
    }   
    $this->load->library('grocery_CRUD');
    $this->load->model('customer_model','cmodel');
  }

  public function index(){  
    redirect('contestants/all');
  }

  public function all(){
//$this->output->enable_profiler(true);
    $crud = new grocery_CRUD();
    $crud->set_table('natgeo_contastant');    
    $crud->set_subject('Contestant List');
  
    $crud->display_as('name','Name');
    $crud->display_as('email','Email');
    $crud->display_as('phone','Phone');
    $crud->display_as('attempted','Questions Attempted');
    $crud->display_as('scored','Total Score');

    $crud->required_fields('name','email','phone','attempted','scored');

    $crud->columns('name','email','phone','attempted','scored');

    $crud->unset_add();
    $crud->unset_edit();

    $data['gcrud'] = $crud->render();

    $data['content'] = 'admin/view_customer_list';  
    $this->load->view('admin/template_admin',$data);
  }

private function _options() {

}
  public function send_score()  {
    $this->output->set_header( 'Access-Control-Allow-Origin: http://localhost:8000' );
    $this->output->set_header( "Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS" );
    $this->output->set_header( 'Access-Control-Allow-Headers: content-type' );
    $this->output->set_content_type( 'application/json' );
    $this->output->set_output( "*" );

echo json_encode(array("city" => "dhaka"));
    $insert_data = array(
        'name' => $this->input->post('name')
      , 'email' => $this->input->post('email')
      , 'phone' => $this->input->post('phone')
      , 'attempted' => $this->input->post('attempted')
      , 'scored' => $this->input->post('scored')
      );  
    //print_r($insert_data);
      //$result = $this->cmodel->add_user($insert_date);
      //echo json_encode($result);  
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



//@class ends
}