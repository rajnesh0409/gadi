<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to admin management and login, forgot password
 * @author Brill Mindz
 *
 */

class Vehicles extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','url'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->library('session');		
		$this->load->model('admin_model');
		$this->load->model('brands_model');
		
		 // cookie validation
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
			$this->load->view('site/vehicles/brands.php',$this->data);
	}
	
	public function choosebrands(){
			$this->load->view('site/vehicles/brands.php',$this->data);
	}
	
	public function add_vehicle() {
		
		    if ($this->checkLogin('U') != '') {
				$this->data['title'] = "Add vehicle";
				$this->load->view('site/vehicles/add_vehicle.php',$this->data);	
			} 
			else 
			{
				redirect(base_url());
		    }	
	}
	
	public function save_vehicle() {

			  if ($this->checkLogin('U') != '') { 
				 $data = $this->input->post();
				 $data['customer_id'] = $this->session->userdata('hoopy_session_user_id');
				 $data['created'] = date("Y-m-d H:i:s", strtotime('now'));
				 $this->brands_model->saveform(VEHICLES,$data);
				 $this->setErrorMessage('success','Vehicle added successfully');
				 redirect('my-vehicles');
			} 

			exit;
	}
	
	public function delete_vehicle() {

			if ($this->checkLogin('U') != '') { 
			$veh_id = $this->uri->segment(2,0);
			$customer_id = $this->checkLogin('U');
			$condition = array('id' => $veh_id,'customer_id'=> $customer_id);
			$this->brands_model->commonDelete(VEHICLES,$condition);
			$this->setErrorMessage('success','Vehicle deleted successfully');
		    redirect('my-vehicles');
			} 

			exit;
	}
	
	public function edit_vehicle() {

			if ($this->checkLogin('U') != '') { 
			$veh_id = $this->uri->segment(2,0);
			$condition = array('id' => $veh_id);
			$this->data['veh_details'] = $this->user_model->get_all_details(VEHICLES,$condition);
		    $this->load->view('site/vehicles/edit_vehicle',$this->data);	
			} 

			exit;
	}
	
	public function editvehicle() {

			 if(!empty($_POST))
			  {
				   $regno=$_POST['regno'];
				   $customer_id = $this->checkLogin('U');
				   $id = $_POST['id'];
				   $km = $_POST['km'];
				   $transmission=$_POST['transmission'];
				   $fuel = $_POST['fuel'];
				   $res = $this->user_model->update_details(VEHICLES,array('regno'=> $regno,'km'=> $km,'transmission'=> $transmission,'fuel'=> $fuel),array('id'=>$id,'customer_id'=>$customer_id));
				   $this->setErrorMessage('success','Vehicles details updated successfully');
				   redirect('my-vehicles');
             			   
			  }
			  else
			  {
			   $this->setErrorMessage('error','Please enter the required fields');
			   redirect('login');
			  }

			exit;
	}
	
	public function view_vehicle() {
		
		    if ($this->checkLogin('U') != '') { 
			
			  $user_id = $this->checkLogin('U');
			  $this->data['title'] = "My vehicles";
			  $condition = array('customer_id' =>$user_id);
			  $this->data['details'] = $this->brands_model->get_all_details(VEHICLES,$condition);
		      $this->load->view('site/vehicles/view_vehicle.php',$this->data);	
			
			} 
			else 
			{
				redirect(base_url());
		    } 	
	
	}

	
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */