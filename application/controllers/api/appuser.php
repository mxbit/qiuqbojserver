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

class Appuser extends REST_Controller
{

    public function user_get()  {

        $this->response( array('name' => 'Shiva' ), 200); 
    }

    public function user_post() {
        $isInitial = $this->post('initial');
        $email = $this->post('email');
        $this->load->model('customer_model','cmodel');
        $has_user = $this->cmodel->has_user_registered($email);
        
        if($isInitial && $has_user == 0)    {
            $insert_data = array('appuser_name' => $this->post('name'),
                                'appuser_gid' => $this->post('id'), 
                                'appuser_email' => $email, 
                                'appuser_gender' => $this->post('gender'), 
                                'appuser_info' => json_encode($this->post()) ) ;

            $result = $this->cmodel->add_user($insert_data);

        }
        else   {
            $update_type = $this->post('update_type');
            //notification
            if($update_type == 'notification')    {
                 $update_data = array('appuser_notification' => $this->post('status'),'appuser_radius' => $this->post('radius'));
            }
            //geo location
            else if($update_type == 'geo')   {
                $update_data = array('appuser_latlong' => $this->post('latlong'),
                                    'appuser_location' => $this->post('location'),
                                    'appuser_place_name' => $this->post('place'),
                                    'appuser_geo_info' => $this->post('geoinfo'),
                                    'appuser_radius' => $this->post('radius')
                                    );
            }
            //lookup radius
            else if($update_type == 'lookup')   {
                $update_data = array('appuser_radius' => $this->post('radius'));
            }
            //address and phone
            else    {
            $alt_phone = $this->post('alt_phone') ? $this->post('alt_phone') : "";

            $update_data = array('appuser_addr' => $this->post('addr_1'),
                                'appuser_phone' => $this->post('phone'), 
                                'appuser_alt_phone' => $alt_phone);                
            }


            $this->cmodel->update_user($email, $update_data);
        }

        $this->response( array('status' => true ), 200); 
    }    

	
}

