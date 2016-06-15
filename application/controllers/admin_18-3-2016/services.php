<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Services extends MY_Controller {  
	function __construct(){
		parent::__construct();
    	$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->model('brands_model');
    	
	}
	
	public function index(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			redirect('admin/brands/display_brands');
		}
	}	
	
	public function display_brands(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Brands List';
			$condition = array();
			$this->data['details'] = $this->brands_model->get_all_details(BRANDS,$condition);
			$this->load->view('admin/brands/display_brands',$this->data);
		}
	}   

	
	public function add_partner(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Add Service Partner';
			$this->load->view('admin/brands/add_partners',$this->data);
		}
	}
   
	public function insertBrand(){
		
       if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$name = trim($this->input->post('name'));
			
			$name = trim($this->input->post('name'));
			$name = trim($this->input->post('name'));
			

			$checkDup = $this->brands_model->get_all_details(BRANDS,array('name'=>$name));
			if($checkDup->num_rows()>0){
				$this->setErrorMessage('error','Already exists');
			    redirect('admin/brands/add_brand');
			}else{
			$excludeArr = array("status","brand_image");
			//$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
			$config['max_size'] = 2000;
			$config['upload_path'] = './images/brands';
			$this->load->library('upload', $config);
			
			if ( $this->upload->do_upload('brand_image')){
				$logoDetails = $this->upload->data();
				$ImageName = $logoDetails['file_name'];
			}else{
				$logoDetails = $this->upload->display_errors();
				$this->setErrorMessage('error',strip_tags($logoDetails));
				redirect('admin/brands/add_brand');
			}
			
			$amenity_data = array( 'brand_image' => $ImageName);
			$dataArr = $amenity_data;
			$this->brands_model->commonInsertUpdate(BRANDS,'insert',$excludeArr,$dataArr);
			$this->setErrorMessage('success','Added successfully');
			redirect('admin/brands/display_brands');
			}
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
			$this->brands_model->update_details(BRANDS,$newdata,$condition);
			$this->setErrorMessage('success','Status Changed Successfully');
			redirect('admin/brands/display_brands');
		}
	}	
	
 public function delete_brand(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$id = $this->uri->segment(4,0);
			$condition = array('id' => $id);
			$this->brands_model->commonDelete(BRANDS,$condition);
			$this->setErrorMessage('success','Deleted successfully');
			redirect('admin/brands/display_brands');
		}
	}	
	public function edit_brand(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Edit Brand';
			$id = $this->uri->segment(4,0);
			$condition = array('id' => $id);
			$this->data['brand_details'] = $this->brands_model->get_all_details(BRANDS,array('id'=>$id)); 
			//echo '<pre>'; print_r($this->data['brand_details']->result()); die;
			if ($this->data['brand_details']->num_rows() == 1){
				$this->load->view('admin/brands/edit_brand',$this->data);
			}else {
				redirect('admin');
			}
		}
	}  	
	public function editBrand(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$aid = $this->input->post('id');
			$name = trim($this->input->post('name'));
			$checkDup = $this->brands_model->get_all_details(BRANDS,array('id !='=>$aid,'name'=>$name));
			//echo "<pre>"; print_r($checkDup->result());die;
			if($checkDup->num_rows()>0){
				
				$this->setErrorMessage('error','Already exists');
			    redirect('admin/brands/edit_brand/'.$aid);
			}else{
			$excludeArr = array("status","brand_image","id");
			//$config['encrypt_name'] = TRUE;
			$config['overwrite'] = FALSE;
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
			$config['max_size'] = 2000;
			$config['upload_path'] = './images/brands';
			$this->load->library('upload', $config);
			if ( $this->upload->do_upload('brand_image')){
				$logoDetails = $this->upload->data();
				$ImageName = $logoDetails['file_name'];
				$amenity_data = array( 'brand_image' => $ImageName);
			}else{
				$amenity_data = array();
			}			$dataArr = $amenity_data;
			$condition = array('id'=>$aid);
			$this->brands_model->commonInsertUpdate(BRANDS,'update',$excludeArr,$dataArr,$condition);
			//echo $this->db->last_query(); die;
			$this->setErrorMessage('success','Updated successfully');
			redirect('admin/brands/display_brands');
			}
		}
	}
}/* End of file brand.php */
/* Location: ./application/controllers/admin/amenities.php */