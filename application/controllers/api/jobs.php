<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Jobs extends REST_Controller
{

    public function all_get()   {
    	$this->load->model('jobs_model','jmodel');
    	$places =  explode(" ", $this->get('place'));
    	$conidtion  = array('jobs_place_name' => $places[0] );

    	$list = $this->jmodel->get_jobs($conidtion);
    	
    	if($list->num_rows > 0)	{
    		$this->response( array('result' => $list->result() , 'status' => 'success' ), 200); 
    	}
    	else {
			$this->response( array('result' => 0 ,'status' => 'fault'), 200); 
    	}
        
    }


    public function job_get()   {
        $this->response( array('result' => 100 ), 200); 
    }

    public function job_post()  {
        $this->load->model('jobs_model','jmodel');
        
        if($this->post('isapplied') == true)    {
            $this->jmodel->delete_job( array('save_job_id' => $this->post('id') , 'save_appuser' => $this->post('email') ) );
        }
        else {
            $this->jmodel->save_job( array('save_job_id' => $this->post('id') , 'save_appuser' => $this->post('email') ) );
        }
        
        $this->response( array('result' => 1000, 'id' => $this->post('id') ), 200); 
    }

	
}