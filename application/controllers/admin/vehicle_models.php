<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vehicle_models extends MY_Controller {  
	function __construct(){
		parent::__construct();
    	$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->model('vehicle_model');
    	
	}
	
	public function index(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			redirect('admin/vehicle_models/display_brands');
		}
	}	
	
	public function display_brands(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Vehicle Models List';
			$condition = array();
			$this->data['details'] = $this->vehicle_model->get_all_details(VEHICLE_MODELS,$condition);
			$this->load->view('admin/vehicles-models/display_brands',$this->data);
		}
	} 
	
		public function display_models(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			
			$name = $this->uri->segment(4,0);
			$this->data['heading'] = $name.' Models List';
			$this->data['details'] = $this->vehicle_model->get_all_details(VEHICLE_MODELS,array('brand_name'=>$name));
			$this->load->view('admin/vehicles-models/display_models',$this->data);
		}
	} 

  	
	public function add_brand(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Add New';
     		$this->data['brandDetails'] = $this->vehicle_model->get_all_details(BRANDS,array());
			$this->load->view('admin/vehicles-models/add_brand',$this->data);
		}
	}
   
	public function insertModels(){
	//	echo '<pre>'; print_r($this->input->post()); die;
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$brand_name = trim($this->input->post('brand_name'));
		//	$model_year = trim($this->input->post('model_year'));
		//	$fuel_ype = trim($this->input->post('fuel_ype'));	
			//$transmission = trim($this->input->post('transmission'));	
			//$description = trim($this->input->post('description'));
						
			$excludeArr = array("status","model_image");
			//$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
			$config['max_size'] = 2000;
			$config['upload_path'] = './images/vehicle-models';
			//$config['upload_path'] = SHORTURL.'images/vehicle-models/';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if ( $this->upload->do_upload('model_image')){
				$logoDetails = $this->upload->data();
				$ImageName = $logoDetails['file_name'];
			}else{
				$logoDetails = $this->upload->display_errors();
				$this->setErrorMessage('error',strip_tags($logoDetails));
				redirect('admin/vehicle_models/add_brand');
			}
			$amenity_data = array( 'model_image' => $ImageName);
			$dataArr = $amenity_data;
			$this->vehicle_model->commonInsertUpdate(VEHICLE_MODELS,'insert',$excludeArr,$dataArr);
			$this->setErrorMessage('success','Added successfully');
			redirect('admin/vehicle_models/display_brands');
			
		}
	}	
	public function change_brand_status(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$mode = $this->uri->segment(4,0);
			$id = $this->uri->segment(5,0);
			$newdata = array('status' => $mode);
			$condition = array('id' => $id);
			$this->vehicle_model->update_details(VEHICLE_MODELS,$newdata,$condition);
			$this->setErrorMessage('success','Status Changed Successfully');
			redirect('admin/vehicle_models/display_brands');
		}
	}	
	
 public function delete_brand(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$id = $this->uri->segment(4,0);
			$condition = array('id' => $id);
			$this->vehicle_model->commonDelete(VEHICLE_MODELS,$condition);
			$this->setErrorMessage('success','Deleted successfully');
			redirect('admin/vehicle_models/display_brands');
		}
	}	
	public function edit_model(){
		
		
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			
			$this->data['heading'] = 'Edit Model';
			$id = $this->uri->segment(4,0);
			$condition = array('id' => $id);
			$this->data['model_details'] = $this->vehicle_model->get_all_details(VEHICLE_MODELS,array('id'=>$id)); 
			//echo '<pre>'; print_r($this->data['brand_details']->result()); die;
			if ($this->data['model_details']->num_rows() == 1){
				$this->load->view('admin/vehicles-models/edit_model',$this->data);
			}else {
				redirect('admin');
			}
		}
	}  	
	public function editModel(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$aid = $this->input->post('id');
			$excludeArr = $dataArr = array();
			$condition = array('id'=>$aid);
			$this->vehicle_model->commonInsertUpdate(VEHICLE_MODELS,'update',$excludeArr,$dataArr,$condition);
			$this->setErrorMessage('success','Updated successfully');
			redirect('admin/vehicle_models/display_brands');
			
		}
	}
}/* End of file brand.php */
/* Location: ./application/controllers/admin/amenities.php */