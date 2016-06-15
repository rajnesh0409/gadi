<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to admin management and login, forgot password
 * @author Brill Mindz
 *
 */

class Stores extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','url'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->library('session');		
		$this->load->model('admin_model');
		$this->load->model('brands_model');
		
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
		$this->data['title'] = "Service Centers and services";	
		$this->load->view('site/stores/stores.php',$this->data);
	}
	
	// schedule service for door step
	public function sch_service(){
		$this->data['title'] = "Schedule Service";
			$this->load->view('site/stores/sch_service.php',$this->data);
	}
	
	// schedule service
	public function sch_services(){
		$this->data['title'] = "Schedule Service";
			$this->load->view('site/stores/sch_services.php',$this->data);
	}
	
	// view booking details for doorstep
	public function booking_detail(){
		$this->data['title'] = "Booking Details";
			$this->load->view('site/stores/booking_detail.php',$this->data);
	}
	
		// view booking details
	public function booking_details(){
		$this->data['title'] = "Booking Details";
			$this->load->view('site/stores/booking_details.php',$this->data);
	}
	
	// Choose service category
	public function service_cats(){
		
		if ($this->checkLogin('U') != '') { 
		
			$this->data['title'] = "Service Categories";	
			$customer_id = $this->checkLogin('U');
			$veh_id = $this->uri->segment(2,0);
			$veh_type = $this->uri->segment(3,0);

			$this->data['veh_id'] = $veh_id;
			$this->data['veh_type'] = $veh_type;
            
			$veh_type = str_replace("%20"," ",$veh_type);
			
			
			if($veh_type == 'Four Wheeler')
			{
				$condition = array('four_wheeler'=>'yes','status'=>'Active');
			}
			else
			{
				$condition = array('two_wheeler'=>'yes','status'=>'Active');
			}
			
			$this->data['details'] = $this->brands_model->get_all_details(CATS,$condition);
			
			
			$this->load->view('site/stores/service_cats.php',$this->data);
		} 
		else 
		{
		redirect(base_url());
		}
	}
	
	// Additional repairs
	public function additional_repairs(){
		$this->data['title'] = "Additional Repairs";
		$veh_type = $this->uri->segment(2,0);
		$veh_type = str_replace("%20"," ",$veh_type);
	
			if($veh_type == 'Four Wheeler')
			{
				$condition = array('four_wheeler'=>'yes','status'=>'Active');
			}
			else
			{
				$condition = array('two_wheeler'=>'yes','status'=>'Active');
			}
			
			
			$cusdetails = $this->data['details'] = $this->brands_model->get_all_details(ADD_REPAIRS,$condition);
		
		$this->load->view('site/stores/additional_repairs.php',$this->data);
	}
	
	// Additional repairs
	public function repairs(){
		$this->data['title'] = "Repairs";
		
		
		$veh_type = $this->uri->segment(2,0);

			if($veh_type == 'Four Wheeler')
			{
				$condition = array('four_wheeler'=>'yes','status'=>'Active');
			}
			else
			{
				$condition = array('two_wheeler'=>'yes','status'=>'Active');
			}
			
			$cusdetails = $this->data['details'] = $this->brands_model->get_all_details(ADD_REPAIRS,$condition);
		
		$this->load->view('site/stores/repairs.php',$this->data);
	}
	
	// Service history
	public function service_history(){

		  if ($this->checkLogin('U') != '') { 
			
			    $user_id = $this->checkLogin('U');
			    $this->data['title'] = "Vehicles Service History";
				$customer_id = $this->uri->segment(4,0);
				$condition = array('customer_id' =>$user_id);
				$h = $this->brands_model->gedetails(BOOKDETAILS,$condition);
				
				$m = $h->result_array();
				foreach($m as $key=>$val) {
				 $vehicle_id = $val['vehicle_id'];	

				    $condition = array('id'=> $vehicle_id);
					$vehdetails = $this->brands_model->get_all_details(VEHICLES,$condition);
					$s = $vehdetails->result_array();
	
                   $service = array('booking'=>$val);
				   $vehicle = array('vehicle'=>$s['0']);
				   $data[] = array_merge($service,$vehicle); 
			}
				
				/* echo "<pre>";
				print_r($data);
				die; */
				
				$this->data['details'] = $data;
				$this->load->view('site/stores/service_history.php',$this->data);
			
			} 
			else 
			{
				redirect(base_url());
		    }

	}
	
	
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */