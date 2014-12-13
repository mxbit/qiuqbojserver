<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

     public function __construct(){  
      parent::__construct();	
      if (!$this->ion_auth->logged_in()){
        redirect('auth', 'refresh');
      }	

      $this->load->model('jobs_model','jobs'); 
      $this->load->library('grocery_CRUD');
    }
    
    
    public function index(){	
	     redirect('jobs/job_list');
    }
    
    public function job_list()  {
      $crud = new grocery_CRUD();
      $crud->set_table('jq_jobs');    
      $crud->set_subject('Jobs List');

      $crud->where('jobs_client',$this->session->userdata('client_id'));
    
      $crud->display_as('jobs_id','Jobs Id');
      $crud->display_as('jobs_name','Name');
      $crud->display_as('jobs_place_name','Place name');
      $crud->display_as('jobs_radius','Radius');
      $crud->display_as('jobs_remuneration','Remuneration');
      $crud->display_as('jobs_date','Date');
      $crud->display_as('jobs_time_from','Start time');
      $crud->display_as('jobs_time_to','End time');
      $crud->display_as('jobs_status','Status');

      $crud->order_by('jobs_id','desc');

      $crud->callback_column('jobs_id',array($this,'view_applied_jobs')); 

      $crud->required_fields('jobs_status');
      $crud->unset_edit_fields('jobs_id','jobs_client','jobs_user','jobs_latlong','jobs_short_desc','jobs_long_desc','jobs_options','jobs_name','jobs_place_name','jobs_radius','jobs_remuneration','jobs_date','jobs_time_from','jobs_time_to');

      $crud->columns('jobs_id','jobs_name','jobs_place_name','jobs_radius','jobs_remuneration','jobs_date','jobs_time_from','jobs_time_to','jobs_status');

      $crud->unset_add();
      //$crud->unset_edit();

      $data['gcrud'] = $crud->render();

      $data['content'] = 'jobs/view_jobs_list';  
      $this->load->view('admin/template_admin',$data);    
    }


  public function view_applied_jobs($value,$row){
    return '<a class="button mini" href="'.site_url('jobs/jobs_applied/'.$row->jobs_id).'"># '.$row->jobs_id.'</a>';
  }

   public function jobs_applied()  {
      $job_id = $this->uri->segment(3, 0);

      $crud = new grocery_CRUD();
      $crud->set_table('jq_saved_jobs');    
      $crud->set_subject('Jobs applied for id '.$job_id);

      $crud->where('save_job_id',$job_id);
    
      $crud->display_as('save_id','Id');
      $crud->display_as('save_appuser','App User');


      $crud->order_by('save_id','desc');




      $crud->unset_add();
      $crud->unset_edit();

      $data['gcrud'] = $crud->render();

      $data['content'] = 'jobs/view_applied_jobs_list';  
      $this->load->view('admin/template_admin',$data);   


   }

/**
AJAX REQUESTS
***/

  public function save_job()  {

    $options = array(
      'id_required' =>  $this->input->post("id_proof")  
      ,'english_required' => $this->input->post("english") 
       );
    $jstatus = ( $this->input->post("job_status")  == 'on' ? 1 : 0);
    $save_data = array(
    'jobs_client' =>           $this->session->userdata('client_id')
    ,'jobs_user' =>            $this->session->userdata('user_id')
    ,'jobs_name' =>            $this->input->post("job_name")
    ,'jobs_radius' =>          (int) $this->input->post("radius")
    ,'jobs_latlong' =>         $this->input->post("latlong")
    ,'jobs_place_name' =>      $this->input->post("place_name")
    ,'jobs_location' =>      $this->input->post("location_name")
    ,'jobs_remuneration' =>    $this->input->post("remuneration")
    ,'jobs_date' =>            $this->input->post("job_date")
    ,'jobs_time_from' =>       $this->input->post("from_time")
    ,'jobs_time_to' =>         $this->input->post("to_time")
    ,'jobs_short_desc' =>      $this->input->post("short_desc")
    ,'jobs_long_desc' =>       $this->input->post("long_desc")
    ,'jobs_options' =>        json_encode($options)
    ,'jobs_status' =>          $jstatus
      );
    $status = $this->jobs->add_jobs($save_data);

    print_r($status);
  }    
 
    

//@class ends
}