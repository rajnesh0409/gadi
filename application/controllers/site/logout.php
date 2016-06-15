<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to admin management and login, forgot password
 * @author Brill Mindz
 *
 */

class Logout extends MY_Controller {
	function __construct(){
		parent::__construct();
       $this->load->helper(array('cookie','date','form','url'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->library('session');	
		
		$this->load->library('session');		
		$this->load->model('user_model');

    }
	
		// customer logout	
		 public function logout_user(){
				//$condition = array('id' => $this->checkLogin('U'));
			
				$userdata = array(
								'hoopy_session_user_id'=>'',
								'session_user_name'=>'',
								'session_user_email'=>''
								);
								
								$cookie_name = '5748535be72195748535be7219';
								if(isset($_COOKIE[$cookie_name])) {
								setcookie($cookie_name, '', time() - 3600, "/"); 
								}

								$this->session->unset_userdata($userdata);
								$this->setErrorMessage('success','Successfully logged out from your account');
								redirect(base_url());
			}
	

 
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */