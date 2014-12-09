<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

  public function __construct(){  
    parent::__construct();  
    if (!$this->ion_auth->logged_in()){
      redirect('auth', 'refresh');
    }   
    $this->load->library('grocery_CRUD');
  }

  public function index(){  
    redirect('customers/all');
  }

  public function all(){
    $crud = new grocery_CRUD();
    $crud->set_table('cm_customer');    
    $crud->set_subject('Customers List');
  
    $crud->display_as('customer_name','Name');
    $crud->display_as('customer_email','Email');
    $crud->display_as('customer_phone','Phone');
    $crud->display_as('customer_alt_phone','Alt Phone');
    $crud->display_as('customer_addr_line_1','Address Line 1');
    $crud->display_as('customer_addr_line_2','Addres Line 2');

    $crud->required_fields('customer_name','customer_email','customer_phone','customer_alt_phone','customer_addr_line_1', 'customer_addr_line_2');

    $crud->columns('customer_name','customer_email','customer_phone','customer_alt_phone','customer_addr_line_1', 'customer_addr_line_2');

    $crud->unset_add();
    //$crud->unset_edit();

    $data['gcrud'] = $crud->render();

    $data['content'] = 'customers/customers_all';  
    $this->load->view('template',$data);
  }



//@class ends
}