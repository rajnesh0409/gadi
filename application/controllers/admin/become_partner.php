<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to admin management and login, forgot password
 * @author Brill Mindz
 *
 */

class Become_partner extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model(array('user_model'));
		$this->load->model('brands_model');
	}

		public function display_become_partner(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Become A Partner List';
			$condition = array();
			$this->data['usersList'] = $this->user_model->get_all_details(BECOME_PARTNER,$condition);
			$this->load->view('admin/users/display_become_partner',$this->data);
		}
	}
	
	public function add_partner(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Add Service Partner';
			$condition = array('status' => 'Active');
			$this->data['Services'] = $this->user_model->get_all_details(CATS,$condition);
			$this->load->view('admin/partners/add_partner',$this->data);
		}
	}
	
	public function insert_partner(){
		
       if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else
		{
		    $data = $this->input->post();
			$data['services'] = implode(', ',$this->input->post('services'));
			
			$excludeArr = array("status","brand_image");
			$config['overwrite'] = FALSE;
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
			$config['max_size'] = 2000;
			$config['upload_path'] = './images/partners';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ( $this->upload->do_upload('brand_image')){
				$logoDetails = $this->upload->data();
				$ImageName = $logoDetails['file_name'];
			}else{
				$logoDetails = $this->upload->display_errors();
				$this->setErrorMessage('error',strip_tags($logoDetails));
				redirect('admin/become_partner/add_partner');
			}
			
			
			$data['brand_image'] = $ImageName;
            $this->brands_model->saveform(SERVICE_PARTNERS,$data);
		    $this->setErrorMessage('success','Added successfully');
			redirect('admin/become_partner/add_partner');
			
		}
	}
	
		public function display_partners(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		} else {
			$this->data['heading'] = 'Service Partners List';
			$condition = array();
			$this->data['details'] = $this->brands_model->get_all_details(SERVICE_PARTNERS,$condition);
			$this->load->view('admin/partners/display_partners',$this->data);
		}
	}   
	
	
	public function delete_partner() {
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$id = $this->uri->segment(4,0);
			$condition = array('id' => $id);
			$this->brands_model->commonDelete(SERVICE_PARTNERS,$condition);
			$this->setErrorMessage('success','Deleted successfully');
			redirect('admin/become_partner/display_partners');
		}
	}	
	
	public function edit_partner(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		} else {

			$this->data['heading'] = 'Edit Partner';
			$id = $this->uri->segment(4,0);
			$condition = array('id' => $id);
			$this->data['partner_details'] = $this->brands_model->get_all_details(SERVICE_PARTNERS,array('id'=>$id)); 
			
			if ($this->data['partner_details']->num_rows() == 1){
				$this->load->view('admin/partners/edit_partner',$this->data);
			}else {
				redirect('admin');
			} 
		}
	}  	
	
	    public function editpartner() {
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		} else {
			$pid = $this->input->post('id');
			$name = trim($this->input->post('name'));

            $where = "id = ".$pid.""; 
            $data = $this->input->post();
            $this->brands_model->updateform(SERVICE_PARTNERS,$data,$where);
		    $this->setErrorMessage('success','Updated successfully');
			redirect('admin/become_partner/display_partners');
			
			}
		}
			
		
	}
	
 


/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */