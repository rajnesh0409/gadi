<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to admin management and login, forgot password
 * @author Brill Mindz
 *
 */

class User extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','url'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->library('session');		
		$this->load->model('user_model');
		$this->data['loginCheck'] = $this->checkLogin('U');
		
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

	
	// signup form
	public function signup_form(){
		if ($this->checkLogin('U') != ''){
			redirect(base_url());
		}else {
			$this->data['title'] = "Create your hoopy account";
			$this->data['heading'] = 'Sign up';
			$this->load->view('site/user/signup_form',$this->data);
		}
	}
	
	// login form
	public function login_form(){
		if ($this->checkLogin('U') != ''){
			redirect(base_url());
		}else {

			$this->data['title'] = "Sign in with your hoopy account";
			$this->data['heading'] = 'Sign In';
			$this->load->view('site/user/login_form',$this->data);
		}
	}
	
	
	// forget form
	public function forget_form(){
		
			$this->data['title'] = "Forget Password";
			$this->data['heading'] = 'Forget Password';
			$this->load->view('site/user/forget_form',$this->data);
		
	}
	
	// forget form
	public function forget(){
		
			 if(!empty($_POST))
			  {
				 	$email=$_POST['email'];
					 
					$genVierifCode = rand(11111,99999);
					
					$res = $this->user_model->update_details(USERS,array('forget_verify'=> $genVierifCode),array('email'=>$email));
					 
					$getUserData = $this->user_model->get_all_details(USERS,array('email'=>$email));
					$sendVerifyCode = $getUserData->row()->id.'/'.$genVierifCode;
					$user_name = $getUserData->row()->user_name;
					
					$to =''.$email.'';
					$subject = 'Hoopy forget password request';
					$headers = "From: " . strip_tags('info@hoopy-services.in') . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$message = '
					<html>
					<body>
					<h3>Dear '.$user_name.'</h3>
					<p>To get new password for your account please <a href="'.base_url().'forget-link/'.$sendVerifyCode.'">Click here</a></p>
					<br>
					<p>Thank you,</p>
					<h3>Hoopy Team</h3>';
					mail($to, $subject, $message, $headers);
					$this->setErrorMessage('success','Check your email to get new password for Hoopy account.');
					redirect('login');  
			  }	  
			  
		
	}
	
	// forget verify link form
	public function forget_link_form(){
		
			$this->data['title'] = "Forget Password";
			$this->data['heading'] = 'Forget Password';
			
			$userId = $this->uri->segment(2);
			$verifyCode = $this->uri->segment(3);
			$this->data['userId'] = $userId;
			$this->data['verifyCode'] = $verifyCode;
			$this->load->view('site/user/forget_link_form',$this->data);
		
	}
	
	// forget verify link form
	public function forget_link(){
			
			  if(!empty($_POST))
			  {
				   $userId=$_POST['userId'];
				   $verifyCode=$_POST['verifyCode'];
				   $password=$_POST['password'];
				   $repassword=$_POST['repassword']; 
				   $hashpassword = md5($password);
				   $sendVerifyCode = $userId.'/'.$verifyCode;
				   
				   $chkPass = $this->user_model->get_all_details(USERS,array('forget_verify'=>$verifyCode,'id'=>$userId));
                    if($chkPass->num_rows()!= 1){
						$this->setErrorMessage("error","Sorry!! It seem's something wrong happened with your new password request. Please contact Hoopy Team.");
						redirect('forget-password');
					}
					
					if($password != $repassword)
					{
					
						$this->setErrorMessage('error','Sorry!! passwords fields does not matches.');
						redirect('forget-link/'.$sendVerifyCode);
					}

					$res = $this->user_model->update_details(USERS,array('password'=> $hashpassword,'forget_verify'=> 'null'),array('id'=>$userId));
                    $this->setErrorMessage('success','New password for your Hoopy account created successfully');
					 redirect(login);
			  }
			  else
			  {
			   $this->setErrorMessage('error','Please enter the required fields');
			   redirect(base_url());
			  }

		
	}
	
	     // signup - ajax call
	     public function register_user()
		 {
			  if(!empty($_POST))
			  {
				   $user_name=$_POST['user_name'];
				   $mobile_no=$_POST['mobile_no'];
				   $gender=$_POST['gender'];
				   $email=$_POST['email'];
				   $password=md5($_POST['password']);
					
					$chkDupemail = $this->user_model->get_all_details(USERS,array('email'=>$email));
					if($chkDupemail->num_rows()==1){
						$this->setErrorMessage('error','Sorry!! this email id already exist');
						redirect('login');
					}
					
					$chkDupnum = $this->user_model->get_all_details(USERS,array('mobile_no'=>$mobile_no));
					
					if($chkDupnum->num_rows()==1){
						$this->setErrorMessage('error','Sorry!! this mobile number already exist');
						redirect('login');
					}

					if($chkDupemail->num_rows()==0){    
					$genVierifCode = rand(11111,99999);
					$insertData = array('user_name'=>$user_name,'mobile_no'=>$mobile_no,'gender'=>$gender,'email'=>$email,'password'=>$password,'verify_code'=>$genVierifCode,'status'=>'Inactive');
					$res = $this->user_model->simple_insert(USERS,$insertData);
					$getUserData = $this->user_model->get_all_details(USERS,array('email'=>$email));
					$sendVerifyCode = $getUserData->row()->id.'/'.$genVierifCode;
					
					
					$to =''.$email.'';
					$subject = 'Hoopy Mail Verification';
					$headers = "From: " . strip_tags('info@hoopy-services.in') . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$message = '
					<html>
					<body>
					<h3>Dear '.$user_name.'</h3>
					<p>To activate your account please <a href="'.base_url().'site/user/verified/'.$sendVerifyCode.'">Click here</a></p>
					<br>
					<p>Thank you,</p>
					<h3>Hoopy Team</h3>';
					mail($to, $subject, $message, $headers);
					$this->setErrorMessage('success','Check your email to activate your Hoopy account');
					redirect('login');
				   }
			  }
			  else
			  {
			   $this->setErrorMessage('error','Please enter the required fields');
			   redirect('login');
			  }
			 }
		 
	// verify customer through email link
		 public function verified() {
		  $userId = $this->uri->segment(4);
		  $verifyCode = $this->uri->segment(5);
		  $result = $this->user_model->get_all_details(USERS,array('id'=>$userId,'verify_code'=>$verifyCode));
		  if($result->num_rows()==1){
		  $res = $this->user_model->update_details(USERS,array('is_verified'=>'Yes','status'=>'Active'),array('id'=>$userId));
		  if($res)
		  {
		   $this->setErrorMessage('success','Your Hoopy account has been activated successfully');
		   redirect('login');
		  }else{
		  $this->setErrorMessage('error','Invalid Link');
		   redirect('login');
			  
			  }
		 
		   }
		 }
 
    // login - ajax call for get login
	   public function login(){
	
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE)
		{	$this->setErrorMessage('error','Username and Password Required');
			redirect('login');
		}else {

			$user_name = $this->input->post('user_name');
			$password = md5($this->input->post('password'));
			$checkUser = $this->user_model->checkUserLogin($user_name,$password);
			
			if(array_key_exists('keeplogin', $_POST))
	        {
				$cookie_value = uniqid().uniqid();
                setcookie('5748535be72195748535be7219', $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
				$newdata = array('cookie' => $cookie_value);					
				$condition = array('id' => $checkUser->row()->id);
				$this->user_model->update_details(USERS,$newdata,$condition);
			}	
      
			if ($checkUser->num_rows() == 1){

					   if($checkUser->row()->is_verified=='Yes' && $checkUser->row()->status=='Active')
					   {			
					         $userdata = array(
													'hoopy_session_user_id' => $checkUser->row()->id,
													'session_user_name' => $checkUser->row()->user_name,
													'session_user_email' => $checkUser->row()->email
									);
									
									$this->session->set_userdata($userdata);
									$datestring = "%Y-%m-%d %h:%i:%s";
									$time = time();
								    $first_time = $checkUser->row()->first_time;

									$newdata = array(
										   'last_login_date' => mdate($datestring,$time),
										   'last_login_ip' => $this->input->ip_address()
										);
										$condition = array('id' => $checkUser->row()->id);
										$this->user_model->update_details(USERS,$newdata,$condition);
										
									 $customer_id =$checkUser->row()->id;
									 $result = $this->user_model->get_all_details(VEHICLES,array('customer_id'=>$customer_id));
                                     
									if($result->num_rows()>0){
										 redirect('login'); 
									 }
                                     else
                                     {
										redirect('add-vehicle');
									 }										 	
                                    
									//die;
                                     $this->setErrorMessage('success','You are Logged In ...');									
									
					   }elseif($checkUser->row()->is_verified=='No'){
							 $this->setErrorMessage('error','Check your email to activate your Hoopy account');
							 redirect('login');
					   }elseif($checkUser->row()->status=='Inctive'){
							 $this->setErrorMessage('error','Your account status is inactive, please contact the hoopy team');
							 redirect('login');
						
					   }
   
   } else {
	     	$this->setErrorMessage('error','Invalid login details');
			redirect('login');
			}
		}
	}
	
		// customer logout	
		 public function logout_user(){
				$datestring = "%Y-%m-%d %h:%i:%s";
				$time = time();
				$newdata = array(
					   'last_logout_date' => mdate($datestring,$time)
				);
				$condition = array('id' => $this->checkLogin('U'));
				$this->user_model->update_details(USERS,$newdata,$condition);
				$userdata = array(
								'hoopy_session_user_id'=>'',
								'session_user_name'=>'',
								'session_user_email'=>''
								);
								$this->session->unset_userdata($userdata);
								$this->setErrorMessage('success','Successfully logged out from your account');
								redirect(base_url());
			}
	
	 // customer profile
		 public function profile() {
			 
		if ($this->checkLogin('U') != '') { 
        $this->data['title'] = "Profile Details";		
		$customer_id = $this->checkLogin('U');
        $condition = array('id'=> $customer_id);
        $this->data['user_details'] = $this->user_model->get_all_details(USERS,$condition);		
		$this->load->view('site/user/profile',$this->data);
		 }
		 else
		 {
			 redirect(base_url());
		 }	 
	}
	
	 // customer password change
		 public function change_password() {
			 
		if ($this->checkLogin('U') != '') { 
        $this->data['title'] = "Change Password";			
		$this->load->view('site/user/change_password',$this->data);
		 }
		 else
		 {
			 redirect(base_url());
		 }	 
	}
	
	// customer password change form call
		 public function changepassword() {

		  if(!empty($_POST))
			  {
				   $old_password=$_POST['old_password'];
				   $password=$_POST['password'];
				   $repassword=$_POST['repassword']; 
				   $hashpassword = md5($password);
				   $oldhash = md5($old_password);
				   $customer_id = $this->checkLogin('U');

					$chkPass = $this->user_model->get_all_details(USERS,array('password'=>$oldhash,'id'=>$customer_id));
                    if($chkPass->num_rows()!= 1){
						$this->setErrorMessage('error','Sorry!! your current password does not matches.');
						redirect('change-password');
					}
					
					if($password != $repassword)
					{
						$this->setErrorMessage('error','Sorry!! passwords fields does not matches.');
						redirect('change-password');
					}

					$res = $this->user_model->update_details(USERS,array('password'=> $hashpassword),array('id'=>$customer_id));
                        $datestring = "%Y-%m-%d %h:%i:%s";
						$time = time();
						$newdata = array(
							   'last_logout_date' => mdate($datestring,$time)
						);
						$condition = array('id' => $this->checkLogin('U'));
						$this->user_model->update_details(USERS,$newdata,$condition);
						$userdata = array(
								'hoopy_session_user_id'=>'',
								'session_user_name'=>'',
								'session_user_email'=>''
								);
								$this->session->unset_userdata($userdata);
								$this->setErrorMessage('success','your Hoopy password changed successfully');
								redirect(login);
			  }
			  else
			  {
			   $this->setErrorMessage('error','Please enter the required fields');
			   redirect('change-password');
			  }		 
	}
	
	 // customer Edit details
		 public function edit_detail() {
			 
		if ($this->checkLogin('U') != '') { 
        $this->data['title'] = "Update customer Details";	
        $customer_id = $this->checkLogin('U');
        $condition = array('id'=> $customer_id);
        $this->data['user_details'] = $this->user_model->get_all_details(USERS,$condition);				
		$this->load->view('site/user/edit_detail',$this->data);
		 }
		 else
		 {
			 redirect(base_url());
		 }	 
	}
	 
	 // customer Edit details - form submit call
	     public function editdetail()
		 {
			  if(!empty($_POST))
			  {
				   $user_name=$_POST['user_name'];
				   $mobile_no=$_POST['mobile_no'];
				   $email=$_POST['email'];
				   $customer_id = $this->checkLogin('U');

					$chkDupemail = $this->user_model->get_all_details(USERS,array('email'=>$email,'id'=>$customer_id));
					if($chkDupemail->num_rows()!=1){
						
						$chkemail = $this->user_model->get_all_details(USERS,array('email'=>$email));
						if($chkemail->num_rows()==1){
							
						$this->setErrorMessage('error','Sorry!! this email id already exist');
						redirect('edit-detail');
						}
					}
					
					$chkDupnum = $this->user_model->get_all_details(USERS,array('mobile_no'=>$mobile_no,'id'=>$customer_id));
					
					if($chkDupnum->num_rows()!=1){
						
						$chknum = $this->user_model->get_all_details(USERS,array('mobile_no'=>$mobile_no));
						if($chknum->num_rows()==1){
						$this->setErrorMessage('error','Sorry!! this mobile number already exist');
						redirect('edit-detail');
						}
					}

					$res = $this->user_model->update_details(USERS,array('user_name'=> $user_name,'mobile_no'=> $mobile_no,'email'=> $email),array('id'=>$customer_id));
				    $datestring = "%Y-%m-%d %h:%i:%s";
						$time = time();
						$newdata = array(
							   'last_logout_date' => mdate($datestring,$time)
						);
						$condition = array('id' => $this->checkLogin('U'));
						$this->user_model->update_details(USERS,$newdata,$condition);
						$userdata = array(
								'hoopy_session_user_id'=>'',
								'session_user_name'=>'',
								'session_user_email'=>''
								);
								$this->session->unset_userdata($userdata);
								$this->setErrorMessage('success','Your account details updated successfully');
								redirect(login);
				 
			  }
			  else
			  {
			   $this->setErrorMessage('error','Please enter the required fields');
			   redirect('login');
			  }
		 }
	
	
	    // services
	     public function general_service()
		 {
			$this->load->view('site/services/gs',$this->data); 
		 }	 
		 
		 public function repairs()
		 {
			$this->load->view('site/services/repairs',$this->data); 
		 }
		 
		 public function break_service()
		 {
			$this->load->view('site/services/bkservice',$this->data); 
		 }
		 
		 public function carwash()
		 {
			$this->load->view('site/services/carwash',$this->data); 
		 }
		 
		 public function dentandpaint()
		 {
			$this->load->view('site/services/dentandpaint',$this->data); 
		 }
		 
		  public function booknow()
		  {
			if ($this->checkLogin('U') != '') { 
			     redirect('my-vehicles');	 
			 }
			 else
			 {
				redirect('login'); 
			 }
		  }
	
	
	// Extras
	public function terms_of_use(){
	  $this->load->view('site/cms/terms_of_use',$this->data);
	}
	
	
   public function become_partner_register(){
   $name=$_POST['name'];
   $mobile_no=$_POST['mobile_no'];
   $email=$_POST['email'];
   $business_name=$_POST['business_name'];
   $insertData = array('name'=>$name,'mobile_no'=>$mobile_no,'email'=>$email,'business_name'=>$business_name);
   $res = $this->user_model->simple_insert(BECOME_PARTNER,$insertData);
   $this->setErrorMessage('success','Submitted Successfully');
   redirect('become-a-partner');
	  
	}
 
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */