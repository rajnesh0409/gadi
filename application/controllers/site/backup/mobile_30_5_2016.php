<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to admin management and login, forgot password
 * @author Brill Mindz
 *
 */

class Mobile extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','url'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->library('session');		
		$this->load->model('user_model');
		
    }

	     // customer signup 
	     public function register_user()
		 {
			   if(!empty($_POST)){ 
				   $user_name=$_POST['name'];
				   $mobile_no=$_POST['mobile_no'];
				   $email=$_POST['email'];
				   $gender=$_POST['gender'];
				   $password = $_POST['password'];
				   $repassword =$_POST['repassword'];
				   $hashpassoword = md5($password);
				   
				  if($password != $repassword)
				 {
					 $status = '[{"status":"Sorry!! passwords fields does not matches"}]';
					 echo $status; 
					 exit;
				 }
					
					$chkDupemail = $this->user_model->get_all_details(USERS,array('email'=>$email));
					if($chkDupemail->num_rows()==1){
						$status = '[{"status":"1"}]';
					    echo $status; 
						exit;
					}
					
					$chkDupnum = $this->user_model->get_all_details(USERS,array('mobile_no'=>$mobile_no));
					
					if($chkDupnum->num_rows()==1){
						$status = '[{"status":"2"}]';
					    echo $status; 
						exit;
					}

					if($chkDupemail->num_rows()==0) {    
					$otp =  substr(number_format(time() * rand(),0,'',''),0,4);
					$insertData = array('user_name'=>$user_name,'mobile_no'=>$mobile_no,'gender'=>$gender,'email'=>$email,'password'=>$hashpassoword,'otp'=>$otp,'reg_device'=>'Mobile','status'=>'Inactive');
					$this->user_model->simple_insert(USERS,$insertData);
					$getUserData = $this->user_model->get_all_details(USERS,array('email'=>$email));
					$user_id = $getUserData->row()->id;
					
                        // send sms
						require('textlocal/textlocal.class.php');
                        $textlocal = new Textlocal('abhinav.shrivastava@hoopy.in', '574f8e6fe8608f3ce9ed7f6d211758f9d55e4bbf');
						$numbers = array($mobile_no);
						$sender = 'VHOOPY';
						$message = 'Greetings from Hoopy!! Your OTP is : '.$otp;

						try {
							$result = $textlocal->sendSms($numbers, $message, $sender);
							//print_r($result);
						} catch (Exception $e) {
							die('Error: ' . $e->getMessage());
						}
					
					
					$status = '[{"status":"success","customer_id":"'.$user_id.'"}]';
			        echo $status; 
			        exit;
				   }
			  }
			  else
			  {
			   $status = '[{"status":"Access denied !!"}]';
			   echo $status; 
			   exit;
			  }
		 }
		 
		 // customer signup otp check 
	     public function otp()
		 {
			 if(!empty($_POST)){ 
             $otp = $_POST['otp'];
			 $customer_id = $_POST['customer_id'];
			    
				$otp_check = $this->user_model->get_all_details(USERS,array('otp'=>$otp,'id'=>$customer_id));
					if($otp_check->num_rows()==1){
					    $this->user_model->update_details(USERS,array('is_verified'=>'Yes','status'=>'Active'),array('id'=>$customer_id));
					    $status = '[{"status":"success"}]';
						echo $status; 
						exit;
					}
				    else 
					{
				        $status = '[{"status":"your otp is incorrect"}]';
						echo $status; 
						exit;
			        }			   		  
		   }
		   else
		   {
			  $status = '[{"status":"Access denied !!"}]';
			   echo $status; 
			   exit;  
		   }	   
		}
		 

    // customer login
	   public function login(){
	
			if(!empty($_POST)){ 
				$user_name = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$checkUser = $this->user_model->checkUserLogin($user_name,$password);

				if ($checkUser->num_rows() == 1){

						   if($checkUser->row()->is_verified=='Yes' && $checkUser->row()->status=='Active')
						   {			
										
										$datestring = "%Y-%m-%d %h:%i:%s";
										$time = time();
										$newdata = array(
										   'last_login_date' => mdate($datestring,$time),
										   'last_login_ip' => $_SERVER['REMOTE_ADDR'],
										   'Isactive'=>'yes'
										);
										
										$condition = array('id' => $checkUser->row()->id);
										$this->user_model->update_details(USERS,$newdata,$condition);
										
									 $status = $checkUser->result_array();
									 $status['0']['status'] = 'success'; 
					                 echo json_encode($status);  
									  
									die;
										
						   } 
						   elseif($checkUser->row()->is_verified=='No')
						   {
								 $status = '[{"status":"please verify your account."}]';
								 echo $status; 
								 exit;
						   } 
						   elseif($checkUser->row()->status=='Inactive')
						   {
								 $status = '[{"status":"Your account is Inactive, please contact the Hoopy Team."}]';
								 echo $status; 
								 exit;

						   }
				} 
				else 
				{
							$status = '[{"status":"Invalid login details."}]';
							echo $status; 
							exit;
				}
			}
            else
			{
				$status = '[{"status":"Access denied !!"}]';
			    echo $status; 
			    exit; 
			}			
		}
	
        // call for resend otp
		 public function resendotp() {
			 
					 if(!empty($_POST)){ 
					
						$customer_id = $_POST['customer_id'];
						$otp =  substr(number_format(time() * rand(),0,'',''),0,4);

						$cus_check = $this->user_model->get_all_details(USERS,array('id'=>$customer_id));
						$mobile_no = $cus_check->row()->mobile_no;
						
							if($cus_check->num_rows()==1){
								$this->user_model->update_details(USERS,array('otp'=> $otp),array('id'=>$customer_id));
								
								// send sms
								require('textlocal/textlocal.class.php');
								$textlocal = new Textlocal('abhinav.shrivastava@hoopy.in', '574f8e6fe8608f3ce9ed7f6d211758f9d55e4bbf');
								$numbers = array($mobile_no);
								$sender = 'VHOOPY';
								$message = 'Greetings from Hoopy!! Your OTP is : '.$otp;

								try {
									$result = $textlocal->sendSms($numbers, $message, $sender);
									//print_r($result);
								} catch (Exception $e) {
									die('Error: ' . $e->getMessage());
								}
								
								
								$status = '[{"status":"success"}]';
								echo $status; 
								exit;
							}
							else 
							{
								$status = '[{"status":"Invalid customer Id"}]';
								echo $status; 
								exit;
							}
				  }
				  else
				  {
						$status = '[{"status":"Access denied !!"}]';
						echo $status; 
						exit; 
				  }
	
		 }

		// customer logout	
		 public function logout(){
				
				if(!empty($_POST)){ 
				$customer_id = $_POST['customer_id'];
				$datestring = "%Y-%m-%d %h:%i:%s";
				$time = time();
				$newdata = array(
					   'last_logout_date' => mdate($datestring,$time),
					   'Isactive'=>'no'
				);
				$condition = array('id' => $customer_id);
				$this->user_model->update_details(USERS,$newdata,$condition);
				
			}
		     else
		    {
				$status = '[{"status":"Access denied !!"}]';
				echo $status; 
				exit; 
	        }		 
		 }
		 
	  
         //get all service categories
	     public function servicecats()
		 {
				$condition = array('status'=>'Active');
				$cats = $this->user_model->get_all_details(CATS,$condition);
				$status = $cats->result_array();
					
					if(!empty($status)){
					    echo json_encode($status);  
						exit;
					}
				    else 
					{
				        $status = '[{"status":"sorry!! no categories found."}]';
						echo $status; 
						exit;
			        }			   		  	   
		}	 
        
        //get all service categories based on vehicle type
	     public function servicevehcats()
		 {
		    if(!empty($_POST))
			{ 
					$veh_type = $_POST['veh_type'];
					if($veh_type == 'Four Wheeler')
					{
						$condition = array('four_wheeler'=>'yes','status'=>'Active');
					}
					else
					{
						$condition = array('two_wheeler'=>'yes','status'=>'Active');
					}
					
					$cats = $this->user_model->get_all_details(CATS,$condition);
					$status = $cats->result_array();
						
						if(!empty($status)){
							echo json_encode($status);  
							exit;
						}
						else 
						{
							$status = '[{"status":"sorry!! no categories found."}]';
							echo $status; 
							exit;
						}
		    }		
			else
		    {
				$status = '[{"status":"Access denied !!"}]';
				echo $status; 
				exit; 
	        }		
		}	
     

       //get all brands per vehicle type
	     public function vehbrands()
		 {
				
				if(!empty($_POST))
			{ 
					$veh_type = $_POST['veh_type'];
					if($veh_type == 'Four Wheeler')
					{
						$condition = array('four_wheeler'=>'yes');
					}
					else
					{
						$condition = array('two_wheeler'=>'yes');
					}
					
					$brands = $this->user_model->get_all_details(BRANDS,$condition);
					$status = $brands->result_array();
						
						if(!empty($status)){
							echo json_encode($status);  
							exit;
						}
						else 
						{
							$status = '[{"status":"sorry!! no brands found."}]';
							echo $status; 
							exit;
						}
		    }		
			else
		    {
				$status = '[{"status":"Access denied !!"}]';
				echo $status; 
				exit; 
	        }	   		  	   
		 }	 
 
         //get all models on brand basis
	     public function vehmodels()
		 {

			if(!empty($_POST))
			{ 
					$veh_type = $_POST['veh_type'];
					$brand_name = $_POST['brand_name'];
					$condition = array('veh_type'=> $veh_type,'brand_name'=> $brand_name);	

					$models = $this->user_model->get_all_details(VEHICLE_MODELS,$condition);
					$status = $models->result_array();
						
						if(!empty($status)){
							echo json_encode($status);  
							exit;
						}
						else 
						{
							$status = '[{"status":"sorry!! no models found."}]';
							echo $status; 
							exit;
						}
		    }		
			else
		    {
				$status = '[{"status":"Access denied !!"}]';
				echo $status; 
				exit; 
	        }	   		  	   
		 }
		 
		 //save vehicles details
	     public function savevehicle()
		 {
			if(!empty($_POST))
			{ 
					$veh_type = $_POST['veh_type'];
					$customer_id = $_POST['customer_id'];
					$brand_name = $_POST['brand_name'];
					$model_name = $_POST['model_name'];
					$model_year = $_POST['model_year'];
					$model_img = $_POST['model_img'];
					$brand_img = $_POST['brand_img'];
					$regno = $_POST['regno'];
					$fuel = $_POST['fuel'];
					$transmission = $_POST['transmission'];
					
					$insertData = array('veh_type'=>$veh_type,'customer_id'=>$customer_id,'brand_name'=>$brand_name,'model_name'=>$model_name,'model_year'=>$model_year,'model_img'=>$model_img,'brand_img'=>$brand_img,'regno'=>$regno,'fuel'=>$fuel,'transmission'=>$transmission);
					$this->user_model->simple_insert(VEHICLES,$insertData);
					$status = '[{"status":"vehicle saved sucessfully."}]';
					echo $status; 
					exit;								
		    }		
			else
		    {
				$status = '[{"status":"Access denied !!"}]';
				echo $status; 
				exit; 
	        }	   		  	   
		 }
		 
		  //get my vehicles
	     public function myvehicles()
		 {

			if(!empty($_POST))
			{ 
					$customer_id = $_POST['customer_id'];
					$condition = array('customer_id'=> $customer_id);	

					$vehicles = $this->user_model->get_all_details(VEHICLES,$condition);
					$status = $vehicles->result_array();
						
						if(!empty($status)){
							echo json_encode($status);  
							exit;
						}
						else 
						{
							$status = '[{"status":"No vehicles added yet."}]';
							echo $status; 
							exit;
						}
		    }		
			else
		    {
				$status = '[{"status":"Access denied !!"}]';
				echo $status; 
				exit; 
	        }	   		  	   
		 }
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */