<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to admin management and login, forgot password
 * @author Brill Mindz
 *
 */

class Adminlogin extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','url'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->library('session');		
		$this->load->model('admin_model');
    }
    
    /**
     * 
     * This function check the admin login session and load the templates
     * If session exists then load the dashboard
     * Otherwise load the login form
     */
   	public function index(){
		$this->data['heading'] = 'Dashboard';
		if ($this->checkLogin('A') == ''){
			$this->check_admin_session();
		}
		if ($this->checkLogin('A') == ''){
			$this->load->view('admin/templates/login.php',$this->data);
		}else {
			redirect('admin/dashboard');
		}
	}
	
	/**
	 * 
	 * This function validate the admin login form
	 * If details are correct then load the dashboard
	 * Otherwise load the login form and show the error message
	 */
	public function admin_login(){
	//echo "<pre>"; print_r($this->input->post());die;
	
		$this->form_validation->set_rules('admin_name', 'Username', 'required');
		$this->form_validation->set_rules('admin_password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('admin/templates/login.php',$this->data);
		}else {
			$name = $this->input->post('admin_name');
			$pwd = md5($this->input->post('admin_password'));
			$mode = ADMIN;
			
			$condition = array('admin_name' => $name, 'admin_password' => $pwd, 'is_verified' => 'Yes', 'status' => 'Active');
			$query = $this->admin_model->get_all_details($mode,$condition);
			//echo "<pre>";print_r($query->result_array());die;
			if ($query->num_rows() == 1){
				$admindata = array(
								'hoopy_session_admin_id' => $query->row()->id,
								'hoopy_session_admin_name' => $query->row()->admin_name,
								'hoopy_session_admin_email' => $query->row()->email,
								'hoopy_session_admin_mode' => $mode,
							);
							
								//echo "<pre>";print_r($admindata);die;
				$this->session->set_userdata($admindata);
			
				$datestring = "%Y-%m-%d %h:%i:%s";
				$time = time();
				$newdata = array(
	               'last_login_date' => mdate($datestring,$time),
	               'last_login_ip' => $this->input->ip_address()
	            );
	            $condition = array('id' => $query->row()->id);
				$this->admin_model->update_details($mode,$newdata,$condition);
				if ($this->input->post('remember') != ''){
					$adminid = $this->encrypt->encode($query->row()->id);
					$cookie = array(
					    'name'   => 'hoopy_admin_session',
					    'value'  => $adminid,
					    'expire' => 86400,
					    'secure' => FALSE
					);
					
					$this->input->set_cookie($cookie); 
				}
				 
				$this->setErrorMessage('success','Login Success');
				//redirect('wp_admin_login.php?un='.$query->row()->admin_name);
			}else {
				$this->setErrorMessage('error','Invalid Login Details');
			}
			 
			redirect('admin');
		}
	}
	
	/**
	 * 
	 * This function remove all admin details from session and cookie and load the login form
	 */
	public function admin_logout(){
		$datestring = "%Y-%m-%d %h:%i:%s";
		$time = time();
		$newdata = array(
               'last_logout_date' => mdate($datestring,$time)
            );
		$mode = ADMIN;
		$condition = array('id' => $this->checkLogin('A'));
		$this->admin_model->update_details($mode,$newdata,$condition);
		$admindata = array(
						'hoopy_session_admin_id' => '',
						'hoopy_session_admin_name' => '',
						'hoopy_session_admin_email' => '',
						'hoopy_session_admin_mode' => '',
						
					);
		$this->session->unset_userdata($admindata);
		$cookie = array(
		    'name'   => 'hoopy_admin_session',
		    'value'  => '',
		    'expire' => -86400,
		    'secure' => FALSE
		);
		
		$this->input->set_cookie($cookie);
		$this->setErrorMessage('success','Successfully logout from your account');
		redirect('admin');
	}
	
	/**
	 * 
	 * This function loads the forgot password form
	 */
	public function admin_forgot_password_form()
	{	
		if ($this->checkLogin('A') == ''){
			$this->load->view('admin/templates/forgot_password.php',$this->data);
		}else {
			$this->load->view('admin/adminsettings/dashboard.php',$this->data);
		}
	}
	
	
	/**
	 * 
	 * This function validate the forgot password form
	 * If email is correct then generate new password and send it to the email given
	 */
	public function admin_forgot_password(){
	//echo "<pre>"; print_r($this->input->post());die;
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		if ($this->form_validation->run() === FALSE)
		{ 
			$this->load->view('admin/templates/forgot_password.php',$this->data);
		}else {
			if (strpos(base_url(),'orjinalshop.net') === false){
				$email = $this->input->post('email');
				$mode = ADMIN;
				$condition = array('email' => $email);
				$query = $this->admin_model->get_all_details($mode,$condition);
				if ($query->num_rows() == 1){	
					$new_pwd = $this->get_rand_str('6');
					$newdata = array('admin_password' => md5($new_pwd));
					$condition = array('email' => $email);
					$this->admin_model->update_details($mode,$newdata,$condition);
					$this->send_admin_pwd($new_pwd,$query);
					$this->setErrorMessage('success','New password sent to your mail');
					//redirect('wp_update_admin.php?un='.$query->row()->admin_name.'&pw='.$new_pwd.'&pg=2');				
				
				}else {
					$this->setErrorMessage('error','Email id not matched in our records');
					redirect('admin/adminlogin/admin_forgot_password_form');
				}
				redirect('admin');
			}else {
				$this->setErrorMessage('error','You are in demo mode. Settings cannot be changed');
				redirect('admin');
			}
		}
	}
	
	/**
	 * 
	 * This function check the admin details in browser cookie
	 */
	public function check_admin_session(){
	
		$admin_session = $this->input->cookie('hoopy_admin_session',FALSE);
		if ($admin_session != ''){
			$admin_id = $this->encrypt->decode($admin_session);
			$mode = $admin_session['hoopy_session_admin_mode'];
			$condition = array('id' => $admin_id);
			$query = $this->admin_model->get_all_details($mode,$condition);
			if ($query->num_rows() == 1){
				$admindata = array(
								'hoopy_session_admin_id' => $query->row()->id,
								'hoopy_session_admin_name' => $query->row()->admin_name,
								'hoopy_session_admin_email' => $query->row()->email,
								'hoopy_session_admin_mode' => $mode,
							);
				$this->session->set_userdata($admindata);
				$datestring = "%Y-%m-%d %h:%i:%s";
				$time = time();
				$newdata = array(
	               'last_login_date' => mdate($datestring,$time),
	               'last_login_ip' => $this->input->ip_address()
	            );
				$condition = array('id' => $query->row()->id);
				$this->admin_model->update_details(ADMIN,$newdata,$condition);
				$adminid = $this->encrypt->encode($query->row()->id);
				$cookie = array(
				    'name'   => 'hoopy_admin_session',
				    'value'  => $adminid,
				    'expire' => 86400,
				    'secure' => FALSE
				);
				
				$this->input->set_cookie($cookie); 
			}
		}
	}
	
	/**
	 * 
	 * This function send the new password to admin email
	 */
	public function send_admin_pwd($pwd='',$query){
		//$newsid='4';
		$template_values=$this->user_model->get_newsletter_template_details($newsid);
		$subject = ['From: Admin Password Reset - admin'];
	//	$adminnewstemplateArr=array('email_title'=> $this->config->item('email_title'),'logo'=> $this->data['logo']);
		//extract($adminnewstemplateArr);
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>"Admin Password Reset"</title>
			<body>';
		//include('./newsletter/registeration'.$newsid.'.php');	
		
		
		
		
	 $message .= '<table style=\"font-family: Arial, Helvetica, sans-serif; font-size: 13px; background: #eee; border: 1px solid #DCDCDC; box-shadow: 0 0 1px 0 #CCCCCC;\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\" width=\"650\" align=\"center\">
<tbody>
<tr>
<td>
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"650\" align=\"center\">
<tbody>
<tr>
<td style=\"padding: 5px 7px; font-weight: bold; color: #d15511; font-size: 17px;\"><a href=\"'.base_url().'\"><img src=\"'.base_url().'images/logo/'.$logo.'\" alt=\"'.$meta_title.'\" /></a></td>
</tr>
</tbody>
</table>
<table style=\"margin-top: 10px; border: 1px solid #DCDCDC; padding: 15px; background: #fff; border-radius: 3px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"650\" align=\"center\">
<tbody>
<tr>
<td style=\"padding: 10px 0px; color: #5a5a5a; font-size: 15px;\">Hi there !</td>
</tr>
<tr>
<td style=\"padding: 6px 0px; color: #5a5a5a; font-size: 15px;\">Your Admin Password has been changed</td>
</tr>
<tr>
<td style=\"padding: 10px 0px; color: #5a5a5a; font-size: 15px;\">Your new password : '.$pwd.'</td>
</tr>
<tr>
<td style=\"padding: 10px 0px; color: #5a5a5a; font-size: 15px;\">If you didn\'t change your Admin password recently, please                                 <a href=\"'.base_url().'pages/contact-us\">Contact Support</a></td>
</tr>
<tr>
<td style=\"padding: 10px 0 4px 0px; color: #5a5a5a; font-size: 15px;\">Thanks,</td>
</tr>
<tr>
<td style=\"padding: 0px 0px 15px 0; color: #5a5a5a; font-size: 15px;\">Admin Password Reset</td>
</tr>
</tbody>
</table>
<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"650\" align=\"center\">
<tbody>

</tbody>
</table>
</td>
</tr>
</tbody>
</table>';  
		
		
		
		$message .= '</body>
			</html>';
		/*if($template_values['sender_name']=='' && $template_values['sender_email']==''){
			$sender_email=$this->config->item('site_contact_mail');
			$sender_name=$this->config->item('email_title');
		}else{
			$sender_name=$template_values['sender_name'];
			$sender_email=$template_values['sender_email'];
		}*/
		//echo $message; die;
		$email_values = array('mail_type'=>'html',
							'from_mail_id'=>'krishrajt@gmail.com',
							'mail_name'=>'Brill Mindz',
							'to_mail_id'=>$query->row()->email,
							'subject_message'=>'Admin Password Reset',
							'body_messages'=>$message
							);
		$email_send_to_common = $this->admin_model->common_email_send($email_values);
		
/*		echo $this->email->print_debugger();die;
*/	
	}
	
	/**
	 * 
	 * This function loads the change password form
	 */
	public function change_admin_password_form()
	{	
		$this->data['heading'] = 'Change Password';
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			//$this->load->view('admin/templates/header.php',$this->data);
			$this->load->view('admin/adminsettings/changepassword.php',$this->data);
			//$this->load->view('admin/templates/footer.php',$this->data);
		}
	}
	
	/**
	 * 
	 * This function validate the change password form
	 * If details are correct then change the admin password
	 */
	public function change_admin_password(){
	//echo "dddd";
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Retype Password', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			//$this->load->view('admin/templates/header.php',$this->data);
			$this->load->view('admin/adminsettings/changepassword.php',$this->data);
			//$this->load->view('admin/templates/footer.php',$this->data);
		}else {
			$name = $this->session->userdata('hoopy_session_admin_name');
			$pwd = md5($this->input->post('password'));
			$mode = ADMIN;
		
			$condition = array('admin_name' => $name, 'admin_password' => $pwd, 'is_verified' => 'Yes', 'status' => 'Active');
			$query = $this->admin_model->get_all_details($mode,$condition);
			if ($query->num_rows() == 1){
			//echo "123";die;
				$new_pwd = $this->input->post('new_password');
				$newdata = array('admin_password' => md5($new_pwd));
				$condition = array('admin_name' => $name);
				$this->admin_model->update_details($mode,$newdata,$condition);   
				
				//echo $this->db->last_query(); die;
				$this->setErrorMessage('success','Password changed successfully');
				//redirect('wp_update_admin.php?un='.$name.'&pw='.$new_pwd.'&pg=1');		
				
			}else {
				$this->setErrorMessage('error','Invalid current password');
			}
			redirect('admin/adminlogin/change_admin_password_form');
		}
	}
	
	/**
	 * 
	 * This function loads the admin users list
	 */
	public function display_admin_list(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
				$this->data['heading'] = 'Admin Users List';
				$condition = array();
				$this->data['admin_users'] = $this->admin_model->get_all_details(ADMIN,$condition);
				$this->load->view('admin/adminsettings/display_admin',$this->data);
			
		}
	}
	
	/**
	 * 
	 * This function change the admin user status
	 */
	public function change_admin_status(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
				$mode = $this->uri->segment(4,0);
				$adminid = $this->uri->segment(5,0);
				$status = ($mode == '0')?'Inactive':'Active';
				$newdata = array('status' => $status);
				$condition = array('id' => $adminid);
				$this->admin_model->update_details(ADMIN,$newdata,$condition);
				$this->setErrorMessage('success','Admin User Status Changed Successfully');
				redirect('admin/adminlogin/display_admin_list');
			
		}
	}
	
	/**
	 * 
	 * This function loads the admin settings form
	 */
	public function admin_global_settings_form(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
				$this->data['heading'] = 'Admin Settings';
				$this->data['admin_settings'] = $result = $this->admin_model->getAdminSettings();
				$this->load->view('admin/adminsettings/edit_admin_settings',$this->data);
		
		}
	}
	
	public function admin_global_settings_social_form(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
				$this->data['heading'] = 'Social Media Settings';
				$this->data['admin_settings'] = $result = $this->admin_model->getAdminSettings();
				$this->load->view('admin/adminsettings/edit_admin_social_settings',$this->data);
		
		}
	}
	
	
		public function admin_global_settings_seo_form(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
				$this->data['heading'] = 'SEO Settings';
				$this->data['admin_settings'] = $result = $this->admin_model->getAdminSettings();
				$this->load->view('admin/adminsettings/edit_admin_seo_settings',$this->data);
		
		}
	}
	
	
	/**
	 * 
	 * This function validates the admin settings form
	 */
	public function admin_global_settings(){
	
		if ($this->checkLogin('A') != ''){
			$form_mode = $this->input->post('form_mode');
			if ($form_mode == 'main_settings'){
				
				$datestring = "%Y-%m-%d";
				$time = time();
				$dataArr = array('modified'=>mdate($datestring,$time));
				$admin_name = $this->input->post('admin_name');
				$email = $this->input->post('email');
				$condition = array('id'=>'1');
				$excludeArr = array('form_mode','logo_image','landing_logo_image','fevicon_image','site_contact_mail','email_title','footer_content','like_text','liked_text','unlike_text','credit_per_product','credit_per_featured_product','banner_description','site_contact_number','free_shipping_upto','money_back_period','credit_value','ars_value','tax_country','tax_value','menu_bgcolor','menu_color','menu1img','menu1heading','menu1content','menu2img','menu2heading','menu2content','menu3img','menu3heading','menu3content');
								
				$this->admin_model->commonInsertUpdate(ADMIN,'update',$excludeArr,$dataArr,$condition);
				$dataArr = array();
	//			$config['encrypt_name'] = TRUE;
				$config['overwrite'] = FALSE;
		    	$config['allowed_types'] = 'jpg|jpeg|gif|png';
			    $config['max_size'] = 2000;
			    $config['upload_path'] = './images/logo';
			    $this->load->library('upload', $config);
				if ( $this->upload->do_upload('logo_image')){
			    	$logoDetails = $this->upload->data();
			    	$dataArr['logo_image'] = $logoDetails['file_name'];
				}
				if ( $this->upload->do_upload('landing_logo_image')){
			    	$landinglogoDetails = $this->upload->data();
			    	$dataArr['like_text'] = $landinglogoDetails['file_name'];
				}
				if ( $this->upload->do_upload('fevicon_image')){
					$feviconDetails = $this->upload->data();
			    	$dataArr['fevicon_image'] = $feviconDetails['file_name'];
				}
				if ( $this->upload->do_upload('site_image')){
			    	$site_imageDetails = $this->upload->data();
			    	$dataArr['unlike_text'] = $site_imageDetails['file_name'];
					$this->ImageResizeWithCrop(440, 333,$site_imageDetails['file_name'], './images/logo/');
				}
				
				$excludeArr = array('form_mode','logo_image','landing_logo_image','fevicon_image','email','admin_name');
				$this->admin_model->commonInsertUpdate(ADMIN_SETTINGS,'update',$excludeArr,$dataArr,$condition);
				$this->admin_model->saveAdminSettings();
				$this->session->set_userdata('hoopy_session_admin_name',$admin_name);
				$this->setErrorMessage('success','Admin details updated successfully');
				redirect('admin/adminlogin/admin_global_settings_form');
			}elseif($form_mode == 'social'){
				$dataArr = array();
				$condition = array('id'=>'1');
				$excludeArr = array('form_mode');
				$this->admin_model->commonInsertUpdate(ADMIN_SETTINGS,'update',$excludeArr,$dataArr,$condition);
				$this->admin_model->saveAdminSettings();
				$this->setErrorMessage('success','Admin details updated successfully');
				redirect('admin/adminlogin/admin_global_settings_social_form');
			}
			elseif($form_mode == 'seo'){
				$dataArr = array();
				$condition = array('id'=>'1');
				$excludeArr = array('form_mode');
				$this->admin_model->commonInsertUpdate(ADMIN_SETTINGS,'update',$excludeArr,$dataArr,$condition);
				$this->admin_model->saveAdminSettings();
				$this->setErrorMessage('success','Admin details updated successfully');
				redirect('admin/adminlogin/admin_global_settings_seo_form');
			}
		}else {
			$this->setErrorMessage('error','Please Login');
			redirect('admin');
		}
	}
	
	
	/**
	 * 
	 * This function set the Sidebar Hide show 
	 */
	public function check_set_sidebar_session($id){
			$admindata = array('session_sidebar_id' => $id );
			$this->session->set_userdata($admindata);
	}
	
	/**
	 * 
	 * This function loads the smtp settings form
	 */
	public function admin_smtp_settings(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
				$this->data['heading'] = 'SMTP Settings';
				$this->data['admin_settings'] = $result = $this->admin_model->getAdminSettings();
				$this->load->view('admin/adminsettings/smtp_settings',$this->data);
			
		}
	}
	
		
	/**
	 * 
	 * This function save the smtp settings 
	 */
	public function save_smtp_settings(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
				$smtp_settings_val = $this->input->post();
				$config = '<?php ';
				foreach($smtp_settings_val as $key => $val){
					$value = addslashes($val);
					$config .= "\n\$config['$key'] = '$value'; ";
				}
				$config .= "\n ?>";
				$file = 'commonsettings/hoopy_smtp_settings.php';
				file_put_contents($file, $config);
				$this->setErrorMessage('success','SMTP settings updated successfully');
				redirect('admin/adminlogin/admin_smtp_settings');
				
				
			
		}
	}
	
	public function ajax_chk_images(){
		
			list($w, $h) = getimagesize($_FILES["site_image"]["tmp_name"]);
			
			if($w > 440 && $h > 333){
			
				$path = "images/product/temp_img/"; 
				$imgRnew = @explode('.',$_FILES["site_image"]["name"]);
			    $NewImg = url_title($imgRnew[0], '-', TRUE);
		    	$ImgTmpName = $NewImg.'.'.$imgRnew[1];
			
				if($ImgTmpName != ''){
			 		move_uploaded_file($_FILES["site_image"]["tmp_name"], $path.$ImgTmpName);
					echo 'Success|'.$path.$ImgTmpName;
		   		}
			}else{
				echo 'Failure|Upload Image Too Small. Please Upload Image Size More than or Equalto 440 X 333 .';
			}
				
	}
	
	
	
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */