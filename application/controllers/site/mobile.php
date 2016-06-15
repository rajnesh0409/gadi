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
		 
		 	//Edit customer details
	     public function editcustomer()
		 {
			if(!empty($_POST))
			{ 
				   $customer_id = $_POST['customer_id'];
				   $user_name=$_POST['name'];
				   $mobile_no=$_POST['mobile_no'];
				   $email=$_POST['email'];
				   $gender=$_POST['gender'];

					$chkDupemail = $this->user_model->get_all_details(USERS,array('email'=>$email,'id'=>$customer_id));
					if($chkDupemail->num_rows()!=1){
						
						$chkDupemail = $this->user_model->get_all_details(USERS,array('email'=>$email));
					    if($chkDupemail->num_rows()==1){
						$status = '[{"status":"1"}]';
					    echo $status; 
						exit;
					   }
					}
					
					$chkDupnum = $this->user_model->get_all_details(USERS,array('mobile_no'=>$mobile_no,'id'=>$customer_id));
					
					if($chkDupnum->num_rows()!=1){
						
						$chkDupnum = $this->user_model->get_all_details(USERS,array('mobile_no'=>$mobile_no));
				        if($chkDupnum->num_rows()==1){
							$status = '[{"status":"2"}]';
							echo $status; 
							exit;
						}
					}  
					
					$insertData = array('user_name'=>$user_name,'mobile_no'=>$mobile_no,'gender'=>$gender,'email'=>$email);
					$condition = array('id'=>$customer_id);
					$this->user_model->update_details(USERS,$insertData,$condition);
					$status = '[{"status":"success"}]';
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
		 
		  // change password 
	     public function changepass()
		 {
			   if(!empty($_POST)){ 
				   $customer_id = $_POST['customer_id'];
				   $oldpassword = $_POST['oldpassword'];
				   $oldhash = md5($oldpassword);
				   
				   $password = $_POST['password'];
				   $hashpassoword = md5($password);
				   
				    $chkpass = $this->user_model->get_all_details(USERS,array('password'=>$oldhash,'id'=>$customer_id));
					if($chkpass->num_rows()==1){

					   $res = $this->user_model->update_details(USERS,array('password'=> $hashpassoword),array('id'=>$customer_id));
					   $status = '[{"status":"success"}]';
					   echo $status; 
					   exit; 
					}
                    else
                    {
					   $status = '[{"status":"failure"}]';
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
		 
		   // forget password
	     public function forgetpass()
		 {
			   if(!empty($_POST)){ 
				   
				   $mobile_no=$_POST['mobile_no'];
	
					$chkmobile_no = $this->user_model->get_all_details(USERS,array('mobile_no'=>$mobile_no));
					if($chkmobile_no->num_rows()==1){
					  
					  $otp =  substr(number_format(time() * rand(),0,'',''),0,4);
					  $res = $this->user_model->update_details(USERS,array('otp'=>$otp),array('mobile_no'=>$mobile_no));

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
					  $status = '[{"status":"number not found"}]';
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
		 
		    // forget password
	     public function saveforgetpass()
		 {
			   if(!empty($_POST)){ 
				   
				   $mobile_no=$_POST['mobile_no'];
				   $otp = $_POST['otp'];
	
					$chkotp = $this->user_model->get_all_details(USERS,array('mobile_no'=>$mobile_no,'otp'=>$otp));
					if($chkotp->num_rows()==1){
					  
					 $bytes = openssl_random_pseudo_bytes(2);
					 $pwd = bin2hex($bytes);
					 $hashpassoword = md5($pwd);
					 
					  $res = $this->user_model->update_details(USERS,array('password'=>$hashpassoword),array('mobile_no'=>$mobile_no));
					   
					   // send sms
						require('textlocal/textlocal.class.php');
                        $textlocal = new Textlocal('abhinav.shrivastava@hoopy.in', '574f8e6fe8608f3ce9ed7f6d211758f9d55e4bbf');
						$numbers = array($mobile_no);
						$sender = 'VHOOPY';
						$message = 'Greetings from Hoopy!! Your OTP is : '.$pwd;

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
					  $status = '[{"status":"wrong otp"}]';
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
		 
		 // Delete vehicle
		 public function deletevehicle() {

			if(!empty($_POST))
			{ 
					$vehicle_id = $_POST['vehicle_id'];
					$customer_id = $_POST['customer_id'];
					
					if(empty($vehicle_id))
					{
                        $status = '[{"status":"vehicle id missing"}]';
					     echo $status; 
					     exit;
					}	
					
					if(empty($customer_id))
					{
                        $status = '[{"status":"customer id missing"}]';
					     echo $status; 
					     exit;
					}
					$condition = array('id'=> $vehicle_id,'customer_id' => $customer_id);	
                    $res = $this->user_model->commonDelete(VEHICLES,$condition);
					if($res)
					{
						 $status = '[{"status":"success"}]';
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
		
		//Edit vehicle details
	     public function editvehicle()
		 {
			if(!empty($_POST))
			{ 
					$vehicle_id = $_POST['vehicle_id'];
					$customer_id = $_POST['customer_id'];
					$regno = $_POST['regno'];
					$fuel = $_POST['fuel'];
					$transmission = $_POST['transmission'];
					
					if(empty($vehicle_id))
					{
                        $status = '[{"status":"vehicle id missing"}]';
					     echo $status; 
					     exit;
					}	
					
					if(empty($customer_id))
					{
                        $status = '[{"status":"customer id missing"}]';
					     echo $status; 
					     exit;
					}
					
					$insertData = array('regno'=>$regno,'fuel'=>$fuel,'transmission'=>$transmission);
					$condition = array('id'=>$vehicle_id,'customer_id'=>$customer_id);
					$this->user_model->update_details(VEHICLES,$insertData,$condition);
					$status = '[{"status":"success"}]';
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
		 
		
		 // send stores details
	    public function stores(){
		
			if(!empty($_POST))
			{ 
                 $lat=$_POST['lat'];
				 $lng=$_POST['lng'];
				 $range=$_POST['range'];

			 $query = 'SELECT *,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lng.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `hp_stores` HAVING `distance` <= '.$range;
			 $me  = $this->user_model->ExecuteQuery($query);
			 $status = $me->result_array();
	 	     
			 $i = 0;
			 foreach($status as $key=>$val)
			 { 
				$status[$i]['distance'] = round($val['distance'],1);
				$i++;
			 }
			 		
			if(!empty($status)){
							echo json_encode($status);  
							exit;
						}
						else 
						{
							$status = '[{"status":"no stores found"}]';
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

	    // send services details
	    public function services(){
		
			if(!empty($_POST))
			{ 
                $vehtype=$_POST['vehtype'];
	            $cat_name=$_POST['cat_name'];
				$services=$_POST['services'];
				$ser = explode(",",$services);

						foreach($ser as $key=>$val) {
								$service_name = trim($val," ");		
								$veh_type = trim($vehtype," ");
								if($veh_type == 'Four Wheeler')
								{
									$condition = array('four_wheeler'=>'yes','service_name'=> $service_name,'service_cat'=> $cat_name,'status'=> 'Active');	
								}
								else
								{
									$condition = array('two_wheeler'=>'yes','service_name'=> $service_name,'service_cat'=> $cat_name,'status'=> 'Active');
								}
								
								$cusdetails = $this->user_model->gedetails(SERVICES,$condition);
								$status = $cusdetails->result_array();

								if(!empty($status)){
								$data[] = $status['0'];
								}	
					   }
					   
					   if(!empty($data)){
							echo json_encode($data);  
							exit;
						}
						else 
						{
							$status = '[{"status":"no stores found"}]';
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
	   
	   
	    // send repairs details
	    public function repairs(){
		
			if(!empty($_POST))
			{ 
                $veh_type=$_POST['vehtype'];
				if(empty($veh_type))
					{
                        $status = '[{"status":"vehicle type missing"}]';
					     echo $status; 
					     exit;
					}
	           
				if($veh_type == 'Four Wheeler')
				{
					$condition = array('four_wheeler'=>'yes','status'=>'Active');
				}
				else
				{
					$condition = array('two_wheeler'=>'yes','status'=>'Active');
				}
			
				$cusdetails = $this->user_model->get_all_details(ADD_REPAIRS,$condition);
				$data = $cusdetails->result_array();
			
					   if(!empty($data)){
							echo json_encode($data);  
							exit;
						}
						else 
						{
							$status = '[{"status":"no repairs found"}]';
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

		 //save booking details
	     public function booking()
		 {
			if(!empty($_POST))
			{      
		           require 'instamojo/instamojo.php';
				   $prices = $_POST['prices'];
				   $services = $_POST['services']; 
				   $storeid = $_POST['storeid'];
				   $storename = $_POST['storename'];
				   $pickup_lat = $_POST['pickup_lat'];
				   $pickup_lon = $_POST['pickup_lon'];
				   $drop_lon = $_POST['drop_lon'];
				   $drop_lat = $_POST['drop_lat'];
				   $vehtype = $_POST['vehtype'];
				   $veh_id = $_POST['veh_id'];
				   
				   $pick_point = $_POST['pick_point'];
				   $drop_point = $_POST['drop_point'];
				   $date = $_POST['date'];
				   $time = $_POST['time'];
                   $cat_name=$_POST['cat_name'];
				   $customer_id = $_POST['customer_id'];
				   $booktime = date("Y-m-d", strtotime('now'));
				   
				    $api = new Instamojo\Instamojo('45625fe0461ccfb5a6ba77e756751ca4', '7f9a410af386a0cd4b0e1a3bf7c90816');
	
					$response = $api->linkCreate(array(
					'title'=>'Hoopy Vehicle Service',
					'description'=>'Transparent process and Authenticity is our commitment. So sit back, relax and book your vehicle service.',
					'base_price'=> $prices,
					'redirect_url'=> 'http://hoopy.in/service-history',
					'webhook_url'=> 'http://hoopy.in/instamojo',
					));
		    
			        $slug = $response['slug'];
					$insertData = array('booktime'=> $booktime,'payment_slug'=>$slug,'store_name'=>$storename,'store_id'=>$storeid,'services'=>$services,'est_cost'=>$prices,'pickup_lat'=>$pickup_lat,'pickup_lon'=>$pickup_lon,'drop_lat'=>$drop_lat,'drop_lon'=>$drop_lon,'vehtype'=>$vehtype,'pick_point'=>$pick_point,'drop_point'=>$drop_point,'at_date'=>$date,'at_time'=>$time,'cat_name'=>$cat_name,'vehicle_id'=>$veh_id,'customer_id'=>$customer_id);
					$lastid = $this->user_model->lastinsert(BOOKDETAILS,$insertData);
                   
				    $booknumber = 'HPYBOOK'.$lastid;
					$newdata = array('booking_no' => $booknumber);
					$condition = array('id' => $lastid);
					$this->user_model->update_details(BOOKDETAILS,$newdata,$condition);	
					$status = '[{"status":"success"}]';
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
	   
	    // booking details
	    public function bookingdetails(){
		
			if(!empty($_POST))
			{ 
                $customer_id = $_POST['customer_id'];
				
				if(empty($customer_id))
					{
                        $status = '[{"status":"customer id missing"}]';
					     echo $status; 
					     exit;
					}
	           
				$condition = array('customer_id' =>$customer_id);
				$h = $this->user_model->gedetails(BOOKDETAILS,$condition);
				
				$m = $h->result_array();
				foreach($m as $key=>$val) {
				 $vehicle_id = $val['vehicle_id'];	

				    $condition = array('id'=> $vehicle_id);
					$vehdetails = $this->user_model->get_all_details(VEHICLES,$condition);
					$s = $vehdetails->result_array();
	
                   $service = array('booking'=>$val);
				   $vehicle = array('vehicle'=>$s['0']);
				   $data[] = array_merge($service,$vehicle); 
  
			}
			
			 if(!empty($data)){
							echo json_encode($data);  
							exit;
						}
						else 
						{
							$status = '[{"status":"no booking found"}]';
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
	   
	   	    // filter booking details
	    public function filterbooking(){
		
			if(!empty($_POST))
			{ 
                $customer_id = $_POST['customer_id'];
				$vehicle_id = $_POST['vehicle_id'];
				$booktime = $_POST['date'];
				
				if(empty($customer_id))
					{
                        $status = '[{"status":"customer id missing"}]';
					     echo $status; 
					     exit;
					}
					
					if(empty($vehicle_id))
					{
                        $status = '[{"status":"vehicle id missing"}]';
					     echo $status; 
					     exit;
					}
					
					if(empty($booktime))
					{
                        $status = '[{"status":"date missing"}]';
					     echo $status; 
					     exit;
					}
					
				if($vehicle_id != 'no' && $booktime != 'no')
					{
                       $condition = array('customer_id' =>$customer_id,'vehicle_id' =>$vehicle_id,'booktime'=> $booktime);
					}

                elseif($booktime != 'no')
					{
                       $condition = array('customer_id' =>$customer_id,'booktime'=> $booktime); 
					}	
                elseif($vehicle_id != 'no')
					{
                       $condition = array('customer_id' =>$customer_id,'vehicle_id' =>$vehicle_id); 
					}
                else
                {
					$condition = array('customer_id' =>$customer_id);
				}					
	           
				
				$h = $this->user_model->gedetails(BOOKDETAILS,$condition);
				
				$m = $h->result_array();
				foreach($m as $key=>$val) {
				 $vehicle_id = $val['vehicle_id'];	

				    $condition = array('id'=> $vehicle_id);
					$vehdetails = $this->user_model->get_all_details(VEHICLES,$condition);
					$s = $vehdetails->result_array();
	
                   $service = array('booking'=>$val);
				   $vehicle = array('vehicle'=>$s['0']);
				   $data[] = array_merge($service,$vehicle); 
  
			}
			
			 if(!empty($data)){
							echo json_encode($data);  
							exit;
						}
						else 
						{
							$status = '[{"status":"no booking found"}]';
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
	   
	     // show feedback popup
	    public function feedbackneed(){
		
			if(!empty($_POST))
			{ 
                $customer_id=$_POST['customer_id'];
				if(empty($customer_id))
					{
                        $status = '[{"status":"customer id missing"}]';
					     echo $status; 
					     exit;
					}
	           
			  $condition = array('customer_id' =>$customer_id,'feedback'=> 'no');
			  $detail = $this->user_model->get_all_details(BOOKDETAILS,$condition);
			  $detail = $detail->result_array();

			  if(!empty($detail))
			  { 
				$booking_no = $detail['0']['booking_no'];
				$status = $detail['0']['status'];

					if($status == 'Service completed')
					{
					        $status = '[{"status":"success","booking_no":"'.$booking_no.'"}]';
							echo $status; 
							exit;   
					}
					else
					{
					        $status = '[{"status":"failure"}]';
							echo $status; 
							exit; 	
					}	
			  }
			  else
              {
				            $status = '[{"status":"failure"}]';
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
	   
	    //save feedback details
	     public function feedback()
		 {
			if(!empty($_POST))
			{      
		           $customer_id = $_POST['customer_id'];
				   $booking_no = $_POST['booking_no'];
				   $rating = $_POST['rate'];
				   $comments = $_POST['comments'];
				   if(empty($customer_id))
					{
                        $status = '[{"status":"customer id missing"}]';
					     echo $status; 
					     exit;
					}
					
					$insertData = array('booking_id'=> $booking_no,'rating'=>$rating,'comments'=>$comments,'customer_id'=>$customer_id);
					$lastid = $this->user_model->lastinsert(FEEDBACK,$insertData);
					$res = $this->user_model->update_details(BOOKDETAILS,array('feedback'=> 'yes'),array('booking_no'=>$booking_no));
					$status = '[{"status":"success"}]';
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

        // cancel booking
       public function cancelbooking() {
	
			   if(!empty($_POST))
				{ 
				   $book_id=$_POST['book_id'];
				   $status=$_POST['status'];
				   $customer_id = $_POST['customer_id'];
			   
				   if($status == 'Request recieved' || $status == 'Request confirmed')
				   {
					   $res = $this->user_model->update_details(BOOKDETAILS,array('Iscancelled'=>'Yes'),array('id'=>$book_id,'customer_id'=>$customer_id));
					   $status = '[{"status":"success"}]';
					   echo $status; 
					   exit; 	 
				   }
				   else
				   {
					  $status = '[{"status":"failure"}]';
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