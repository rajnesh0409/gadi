<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to user management 
 * @author Brill Mindz
 *
 */

class Users extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model(array('user_model'));
		}
    
    /**
     * 
     * This function loads the users list page
     */
   	public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			redirect('admin/users/display_user_list');
		}
	}
	
	/**
	 * 
	 * This function loads the users list page
	 */
	public function display_user_list(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Customers List';
			$condition = array();
			$this->data['usersList'] = $this->user_model->get_all_details(USERS,$condition);
			$this->load->view('admin/users/display_userlist',$this->data);
		}
	}
	
	public function customer_feedbacks(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Feedbacks';
			$id = $this->uri->segment(4,0);
			$condition = array('customer_id' => $id);
			$this->data['feedback'] = $this->user_model->get_all_details(FEEDBACK,$condition);
			$this->load->view('admin/users/cfeedback',$this->data);
		}
	}
	
	public function feedback(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Feedbacks';
			$condition = array();
			$data = $this->data['feedback'] = $this->user_model->get_all_details(FEEDBACK,$condition);
			$customer_id = $data->row()->customer_id;
			$this->load->view('admin/users/feedback',$this->data);
		}
	}
	
	public function promotions(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Promotions';
			$this->load->view('admin/users/promos',$this->data);
		}
	}
	
	public function insertpromo(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$name = trim($this->input->post('name'));
			
            $checkDup = $this->user_model->get_all_details(PROMOS,array('promo_code'=>$promo_code));
			
			if($checkDup->num_rows()>0){
				$this->setErrorMessage('error','Promo code already exist!!');
			    redirect('admin/users/promotions');
			}else{
			$dataArr = $excludeArr = array();
			$this->user_model->commonInsertUpdate(PROMOS,'insert',$excludeArr,$dataArr);
			$this->setErrorMessage('success','Promos added successfully');
			redirect('admin/users/viewpromos');
			}
		}
	}
	
	public function viewpromos(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			
			$this->data['heading'] = 'Promo Offers';
			$condition = array();
			$this->data['promos'] = $this->user_model->get_all_details(PROMOS,$condition);
			$this->load->view('admin/users/promoffer',$this->data);
		}
	}
	
	public function promo_status(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$mode = $this->uri->segment(4,0);
			$promo_id = $this->uri->segment(5,0);
			$newdata = array('isactive' => $mode);
			$condition = array('id' => $promo_id);
			$this->user_model->update_details(PROMOS,$newdata,$condition);
			$this->setErrorMessage('success','Promo status Changed Successfully');
			redirect('admin/users/viewpromos');
		}
	}
	
		public function delete_promo(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			
			$promo_id = $this->uri->segment(4,0);
			$condition = array('id' => $promo_id);
			$this->user_model->commonDelete(PROMOS,$condition);
			$this->setErrorMessage('success','Promo deleted successfully');
			redirect('admin/users/viewpromos');
		}
	}
	
	public function testimonials(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Testimonials';
			$this->load->view('admin/users/testimonials',$this->data);
		}
	}
	
	public function insert_testm(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		} else {
			
			$excludeArr = array("status","image");
			$config['overwrite'] = FALSE;
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
			$config['max_size'] = 2000;
			$config['upload_path'] = './images/testimonials';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ( $this->upload->do_upload('image')){
				$logoDetails = $this->upload->data();
				$ImageName = $logoDetails['file_name'];
			}else{
				$logoDetails = $this->upload->display_errors();
				$this->setErrorMessage('error',strip_tags($logoDetails));
				redirect('admin/users/testimonials');
			}
			$amenity_data = array( 'image' => $ImageName);
			$dataArr = $amenity_data;
			$this->user_model->commonInsertUpdate(TESTIMONIALS,'insert',$excludeArr,$dataArr);
			$this->setErrorMessage('success','testimonial added successfully');
			redirect('admin/users/viewtestimonial');
		}
	}
	
	public function viewtestimonial(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			
			$this->data['heading'] = 'Testimonials';
			$condition = array();
			$this->data['tests'] = $this->user_model->get_all_details(TESTIMONIALS,$condition);
			$this->load->view('admin/users/view_testimonial',$this->data);
		}
	}
	
	public function delete_test(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		} else {
			
			$test_id = $this->uri->segment(4,0);
			$condition = array('id' => $test_id);
			$this->user_model->commonDelete(TESTIMONIALS,$condition);
			$this->setErrorMessage('success','Testimonial deleted successfully');
			redirect('admin/users/viewtestimonial');
		}
	}
	
	public function deliveryboy(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Delivery Boy';
			$this->load->view('admin/users/deliveryboy',$this->data);
		}
	}
	
	public function insert_dboy(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		} else {
			if($_FILES['identity']['type']){
				
			  $filetmp =$_FILES['identity']['tmp_name'];
			  $filename = $_FILES['identity']['name'];
			  $ext = strrchr($filename, ".");
		
	
			  if ($error == 0 && $ext != '.exe') {
			  $uid = uniqid();
			  $file_name1 = $uid."_".$filename;
			  move_uploaded_file($filetmp,"./images/identity/".$file_name1);
	          }
              else
			  {
				 $this->setErrorMessage('error','Sorry!! wrong file extension for identity file upload.'); 
                 redirect('admin/users/deliveryboy');					 
			  }			  
			}
			
			if($_FILES['photo']['type']){
				
			  $filetmp =$_FILES['photo']['tmp_name'];
			  $filename = $_FILES['photo']['name'];
			  $ext = strrchr($filename, ".");
			  if ($error == 0 && $ext == '.jpg' || $ext == '.jpeg' || $ext == '.gif' || $ext == '.png' || $ext == '.bmp') {
			  $uid = uniqid();
			  $file_name2 = $uid."_".$filename;
			  move_uploaded_file($filetmp,"./images/photos/".$file_name2);
	          }
			  else
			  {
				 $this->setErrorMessage('error','Sorry!! wrong file extension for photo upload.'); 
                 redirect('admin/users/deliveryboy');					 
			  }	  

			}
			
			if($_FILES['driving_file']['type']){
				
			  $filetmp =$_FILES['driving_file']['tmp_name'];
			  $filename = $_FILES['driving_file']['name'];
			  $ext = strrchr($filename, ".");
		
	
			  if ($error == 0 && $ext != '.exe') {
			  $uid = uniqid();
			  $file_name3 = $uid."_".$filename;
			  move_uploaded_file($filetmp,"./images/drivers/".$file_name3);
	          }
              else
			  {
				 $this->setErrorMessage('error','Sorry!! wrong file extension for driving file upload.'); 
                 redirect('admin/users/deliveryboy');					 
			  }			  
			}

            $excludeArr = array("identity","photo");
			$amenity_data = array( 'identity' => $file_name1,'photo' => $file_name2,'driving_file' => $file_name3);
			$dataArr = $amenity_data;
			$_POST['password'] = base64_encode($_POST['password']);
			$lastid = $this->user_model->commonlastinsert(DELIVERY_BOY,'insert',$excludeArr,$dataArr);
			
			 $dnumber = 'HPDBOY'.$lastid;
			 $newdata = array('uid' => $dnumber);
			 $condition = array('id' => $lastid);
			 $this->user_model->update_details(DELIVERY_BOY,$newdata,$condition);
             $this->setErrorMessage('success','Delivery boy added successfully');
			 redirect('admin/users/deliveryboys');			

			}
		}
		
		public function deliveryboys(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			
			$this->data['heading'] = 'Delivery Boys';
			$condition = array();
			$this->data['dboys'] = $this->user_model->get_all_details(DELIVERY_BOY,$condition);
			$this->load->view('admin/users/deliveryboys',$this->data);
		}
	}
	
	public function dboy_status(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$mode = $this->uri->segment(4,0);
			$user_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $user_id);
			$this->user_model->update_details(DELIVERY_BOY,$newdata,$condition);
			$this->setErrorMessage('success','Delivery boy status Changed Successfully');
			redirect('admin/users/deliveryboys');
		}
	}
	
		public function delete_dboy(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			
			$user_id = $this->uri->segment(4,0);
			$condition = array('id' => $user_id);
			$this->user_model->commonDelete(DELIVERY_BOY,$condition);
			$this->setErrorMessage('success','Delivery boy deleted successfully');
			redirect('admin/users/deliveryboys');
		}
	}
	
	public function edit_dboy(){
		
		
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		} else {
			
			$this->data['heading'] = 'Edit Delivery Boy';
			$id = $this->uri->segment(4,0);
			$condition = array('id' => $id);
			$this->data['user_details'] = $this->user_model->get_all_details(DELIVERY_BOY,array('id'=>$id)); 
			if ($this->data['user_details']->num_rows() == 1){
				$this->load->view('admin/users/edit_dboy',$this->data);
			}else {
				redirect('admin');
			}
		}
	}  	
	
	public function editdboy(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$aid = $this->input->post('id');
			$excludeArr = $dataArr = array();
			$condition = array('id'=>$aid);
			$_POST['password'] = base64_encode($_POST['password']);
			$this->user_model->commonInsertUpdate(DELIVERY_BOY,'update',$excludeArr,$dataArr,$condition);
			$this->setErrorMessage('success','Updated successfully');
			redirect('admin/users/deliveryboys');
			
		}
	}

	
	/**
	 * 
	 * This function loads the users dashboard
	 */
	public function display_user_dashboard(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Users Dashboard';
			$condition = 'order by `created` desc';
			$this->data['usersList'] = $this->user_model->get_users_details($condition);
			$this->load->view('admin/users/display_user_dashboard',$this->data);
		}
	}
	
	/**
	 * 
	 * This function loads the add new user form
	 */
	public function add_user_form(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Add New User';
			$this->load->view('admin/users/add_user',$this->data);
		}
	}
	
	/**
	 * 
	 * This function insert and edit a user
	 */
	public function insertEditUser(){
		//echo "<pre>";print_r($_POST);die;
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$user_id = $this->input->post('user_id');
			$user_name = $this->input->post('user_name');
			$password = md5($this->input->post('new_password'));
			$email = $this->input->post('email');
			if ($user_id == ''){
				$unameArr = $this->config->item('unameArr');
				if (!preg_match('/^\w{1,}$/', trim($user_name))){
					$this->setErrorMessage('error','User name not valid. Only alphanumeric allowed');
					echo "<script>window.history.go(-1);</script>";exit;
				}
				if (in_array($user_name, $unameArr)){
					$this->setErrorMessage('error','User name already exists');
					echo "<script>window.history.go(-1);</script>";exit;
				}
				$condition = array('user_name' => $user_name);
				$duplicate_name = $this->user_model->get_all_details(USERS,$condition);
				if ($duplicate_name->num_rows() > 0){
					$this->setErrorMessage('error','User name already exists');
					redirect('admin/users/add_user_form');
				}else {
					$condition = array('email' => $email);
					$duplicate_mail = $this->user_model->get_all_details(USERS,$condition);
					if ($duplicate_mail->num_rows() > 0){
						$this->setErrorMessage('error','User email already exists');
						redirect('admin/users/add_user_form');
					}
				}
			}
			$excludeArr = array("user_id","thumbnail","new_password","confirm_password","group","status");
			if ($this->input->post('group') != ''){
				$user_group = 'User';
			}else {
				$user_group = 'Seller';
			}
			if ($this->input->post('status') != ''){
				$user_status = 'Active';
			}else {
				$user_status = 'Inactive';
			}
			$inputArr = array('group' => $user_group, 'status' => $user_status);
			if ($user_group == 'Seller'){
				$inputArr['request_status'] = 'Approved';
			}
			$datestring = "%Y-%m-%d";
			$time = time();
			//$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;
	    	$config['allowed_types'] = 'jpg|jpeg|gif|png';
		    $config['max_size'] = 2000;
		    $config['upload_path'] = './images/users';
		    $this->load->library('upload', $config);
			if ( $this->upload->do_upload('thumbnail')){
		    	$imgDetails = $this->upload->data();
		    	$inputArr['thumbnail'] = $imgDetails['file_name'];
			}
			if ($user_id == ''){
				$user_data = array(
					'password'	=>	$password,
					'is_verified'	=>	'Yes',
					'created'	=>	mdate($datestring,$time),
					'modified'	=>	mdate($datestring,$time),
				);
			}else {
				$user_data = array('modified' =>	mdate($datestring,$time));
			}
			$dataArr = array_merge($inputArr,$user_data);
			$condition = array('id' => $user_id);
			 //echo "<pre>";print_r($dataArr);die;
			if ($user_id == ''){
				$this->user_model->commonInsertUpdate(USERS,'insert',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','User added successfully');
			}else {
				$this->user_model->commonInsertUpdate(USERS,'update',$excludeArr,$dataArr,$condition);
				$this->setErrorMessage('success','User updated successfully');
			}
			redirect('admin/users/display_user_list');
		}
	}
	
	/**
	 * 
	 * This function loads the edit user form
	 */
	public function edit_user_form(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Edit User';
			$user_id = $this->uri->segment(4,0);
			$condition = array('id' => $user_id);
			$this->data['user_details'] = $this->user_model->get_all_details(USERS,$condition);
			if ($this->data['user_details']->num_rows() == 1){
				$this->load->view('admin/users/edit_user',$this->data);
			}else {
				redirect('admin');
			}
		}
	}
	
	/**
	 * 
	 * This function change the user status
	 */
	public function change_user_status(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$mode = $this->uri->segment(4,0);
			$user_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Inactive':'Active';
			$newdata = array('status' => $status);
			$condition = array('id' => $user_id);
			$this->user_model->update_details(USERS,$newdata,$condition);
			$this->setErrorMessage('success','User Status Changed Successfully');
			redirect('admin/users/display_user_list');
		}
	}
	
	/**
	 * 
	 * This function loads the user view page
	 */
	public function view_user(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'View User';
			$user_id = $this->uri->segment(4,0);
			$condition = array('id' => $user_id);
			$this->data['user_details'] = $this->user_model->get_all_details(USERS,$condition);
			if ($this->data['user_details']->num_rows() == 1){
				$this->load->view('admin/users/view_user',$this->data);
			}else {
				redirect('admin');
			}
		}
	}
	
	/**
	 * 
	 * This function delete the user record from db
	 */
	public function delete_user(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$user_id = $this->uri->segment(4,0);
			//$group = $this->uri->segment(5,0);
			$condition = array('id' => $user_id);
			//$condition1 = array('seller_id' => $user_id);
			if($group=='Seller')
			{
				//$this->seller_model->commonDelete(SELLER,$condition1);
				//$this->user_model->commonDelete(USERS,$condition);
			}else{

			$this->user_model->commonDelete(USERS,$condition);
			}
			
			//$this->user_model->update_details(USERS,array('status'=>'Deleted'),$condition);
			
			$this->setErrorMessage('success','User deleted successfully');
			redirect('admin/users/display_user_list');
		}
	}
	
	/**
	 * 
	 * This function change the user status, delete the user record
	 */
	public function change_user_status_global(){
		if(count($_POST['checkbox_id']) > 0 &&  $_POST['statusMode'] != ''){
			$this->user_model->activeInactiveCommon(USERS,'id');
			if (strtolower($_POST['statusMode']) == 'delete'){
				$this->setErrorMessage('success','User records deleted successfully');
			}else {
				$this->setErrorMessage('success','User records status changed successfully');
			}
			redirect('admin/users/display_user_list');
		}
	}
}

/* End of file users.php */
/* Location: ./application/controllers/admin/users.php */