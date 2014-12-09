<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct(){  
	parent::__construct();	
	if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
	    redirect('auth', 'refresh');
	}	
	$this->load->library('grocery_CRUD');
    }
    
    
    public function index(){	
	redirect('users/all');
    }
    
    public function all(){	
	$crud = new grocery_CRUD();

	$crud->set_table('users');	
	$crud->set_subject('user');	
 	$crud->columns('username','email','first_name','last_name','active','phone','client_name');
// 	->add_fields('username','password','email','first_name','last_name','active','phone','client_name')
// 	->edit_fields('username','password','email','first_name','last_name','active','phone','client_name');
	$crud->set_relation('client_id','clients','client_name'); 
	$crud->field_type('ip_address','hidden')
	      ->field_type('salt','hidden')	
	      ->field_type('remember_code','hidden')
	      ->field_type('last_login','hidden')
	      ->field_type('created_on','hidden',date('Y-m-d'))
	      ->required_fields('username','password','email','active','first_name','last_name','phone','client_id');
	$crud->callback_before_insert(array($this,'encrypt_password_callback'));
	//$crud->set_relation('users_groups','groups','name');
	$data['gcrud'] = $crud->render();
	$data['main']='home';
	//$data['navigation']='navigation';
	//$data['client_id'] = $this->session->userdata('client_id');
    $data['content'] = 'common_list/list_all';
    $this->load->view('admin/template_admin',$data);
    }


  public function encrypt_password_callback($post_array){    
    $this->load->model('ion_auth_model');    
    $store_salt = $this->config->item('store_salt', 'ion_auth');
    $salt = $store_salt ? $this->ion_auth_model->salt() : FALSE;
    $post_array['password'] = $this->ion_auth_model->hash_password($post_array['password'],$salt);
    return $post_array;
  }
    

    

//@class ends
}