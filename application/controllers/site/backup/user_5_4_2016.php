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
    }

	public function signup_form(){
		if ($this->checkLogin('U') != ''){
			redirect(base_url());
		}else {
			$this->data['title'] = "Create your hoopy account";
			$this->data['heading'] = 'Sign up';
			$this->load->view('site/user/signup_form',$this->data);
		}
	}
	
	public function login_form(){
		if ($this->checkLogin('U') != ''){
			redirect(base_url());
		}else {
			$this->data['title'] = "Sign in with your hoopy account";
			$this->data['heading'] = 'Sign up';
			$this->load->view('site/user/login_form',$this->data);
		}
	}
	
	
	public function register_user()
 {
  if(!empty($_POST['user_name']) ||!empty($_POST['mobile_no']) ||!empty($_POST['gender ']) ||!empty($_POST['email']) ||!empty($_POST['password']) )
  {
   //base_url();
   $user_name=$_POST['user_name'];
   $mobile_no=$_POST['mobile_no'];
   $gender=$_POST['gender'];
   $email=$_POST['email'];
   $password=md5($_POST['password']);
    
	$chkDupemail = $this->user_model->get_all_details(USERS,array('email'=>$email));
   //    $chkDupemail = $this->user_model->checkDupUser(USERS,array('email'=>$email));
	
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
    $insertData = array('user_name'=>$user_name,'mobile_no'=>$mobile_no,'gender'=>$gender,'email'=>$email,'password'=>$password,'verify_code'=>$genVierifCode);
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
    <h3>Dear '.$user_name.'user_name</h3>
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
 
 public function verified(){
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
 
 public function login(){
	
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE)
		{	$this->setErrorMessage('error','Username and Password Required');
			redirect('login');
		}else {
			$user_name = $this->input->post('user_name');
			$password = md5($this->input->post('password'));
		//echo "<pre>"; print_r($_POST);die;
		    
			$checkUser = $this->user_model->checkUserLogin($user_name,$password);
        // echo "<pre>"; print_r($checkUser->result());die;
		   // echo $user_name;
			//echo $password;
		   // echo $checkUser->num_rows();
			
		   // die('jjjjjjjjjjjjj');
			if ($checkUser->num_rows() == 1){

					   if($checkUser->row()->is_verified=='Yes' && $checkUser->row()->status=='Active')
					   {			
					//   echo "login success";die;
					   $userdata = array(
													'hoopy_session_user_id' => $checkUser->row()->id,
													'session_user_name' => $checkUser->row()->user_name,
													'session_user_email' => $checkUser->row()->email
									);
									//				echo "<pre>";print_r($userdata);
									$this->session->set_userdata($userdata);
									//				echo $this->session->userdata('fc_session_user_id');die;
									$datestring = "%Y-%m-%d %h:%i:%s";
									$time = time();
									$newdata = array(
									   'last_login_date' => mdate($datestring,$time),
									   'last_login_ip' => $this->input->ip_address()
									);
									$condition = array('id' => $checkUser->row()->id);
									$this->user_model->update_details(USERS,$newdata,$condition);
									$this->setErrorMessage('success','You are Logged In ...');
									redirect('login');
									
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
	
	public function terms_of_use(){
	  $this->load->view('site/cms/terms_of_use',$this->data);
	}
   public function become_partner_register(){
   $name=$_POST['name'];
   $mobile_no=$_POST['mobile_no'];
   $email=$_POST['email'];
   $business_name=$_POST['business_name'];
   $insertData = array('name'=>$name,'mobile_no'=>$mobile_no,'email'=>$email,'business_name'=>$business_name);
   
   //echo "<pre>"; print_r($insertData);die;
   $res = $this->user_model->simple_insert(BECOME_PARTNER,$insertData);
   $this->setErrorMessage('success','Submitted Successfully');
   redirect('become-a-partner');
	  
	}
 
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */