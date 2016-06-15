<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to admin management and login, forgot password
 * @author Brill Mindz
 *
 */

class Landing extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','url'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->library('session');		
		$this->load->model('admin_model');
		
		 // cookie validation
		  if ($this->checkLogin('U') == '') {
				if(isset($_COOKIE['5748535be72195748535be7219'])) {
				  
				$cookie_val = $_COOKIE['5748535be72195748535be7219'];
				$checkUser = $this->user_model->get_all_details(USERS,array('cookie'=>$cookie_val));
				$uid = $checkUser->row()->id;
				if($checkUser->row()->is_verified=='Yes' && $checkUser->row()->status=='Active')
					   {			
					         $userdata = array(
													'hoopy_session_user_id' => $checkUser->row()->id,
													'session_user_name' => $checkUser->row()->user_name,
													'session_user_email' => $checkUser->row()->email
									);
									
									$this->session->set_userdata($userdata);	
																
									
					   } 
              }
			} 
    }
    
    /**
     * 
     * This function check the admin login session and load the templates
     * If session exists then load the dashboard
     * Otherwise load the login form
     */
   	public function index(){
		    
			 if ($this->checkLogin('U') != '') { 
			
			  $user_id = $this->checkLogin('U');
			  $condition = array('customer_id' =>$user_id,'feedback'=> 'no');
			  $detail = $this->admin_model->get_all_details(BOOKDETAILS,$condition);
			  $detail = $detail->result_array();

			  if(!empty($detail))
			  { 
				$booking_no = $detail['0']['booking_no'];
				$status = $detail['0']['status'];
				
					if($status == 'Service completed')
					{
					  $this->data['booking_no'] = $booking_no;  
					}
					else
					{
					  $this->data['booking_no'] = 'null';  	
					}	
			  }
              else
              {
				$this->data['booking_no'] = 'null';  
			  }				  

			}
            else
			{
				 $this->data['booking_no'] = 'null'; 
			}				  
		
			$condition = array();
			$this->data['partners'] = $this->admin_model->get_all_details(SERVICE_PARTNERS,$condition);
			
			
			$condition = array();
			$this->data['tests'] = $this->admin_model->get_all_details(TESTIMONIALS,$condition);
			
			
			$condition = array();
			$this->data['brands'] = $this->admin_model->get_all_details(BRANDS,$condition);
		    
			$this->load->view('site/landing/landing.php',$this->data);
	}
	
	
	public function how_it_works(){
			$this->load->view('site/cms/how_it_works.php',$this->data);
	}
	public function booking_service(){
			$this->load->view('site/cms/booking_service.php',$this->data);
	}
	public function become_partner(){
			$this->load->view('site/cms/become_partner.php',$this->data);
	}
	
	public function contact_us(){
			$this->load->view('site/pages/contact.php',$this->data);
	}
	
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */