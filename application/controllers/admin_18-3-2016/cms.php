<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to cms management 
 * @author Brill Mindz
 *
 */

class Cms extends MY_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));		
		$this->load->model('cms_model');
    }
    
    /**
     * 
     * This function loads the cms list page
     */
   	public function index(){	
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			redirect('admin/cms/display_cms');
		}
	}
	
	/**
	 * 
	 * This function loads the cms list page
	 */
	public function display_cms(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Static Pages';
			$condition = array();
			$this->data['cmsList'] = $this->cms_model->get_all_details(CMS,$condition);
			$this->load->view('admin/cms/display_cms',$this->data);
		}
	}
	
	/**
	 * 
	 * This function loads the add new cms form
	 */
	public function add_cms_form(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Add New Page';
			$this->load->view('admin/cms/add_cms',$this->data);
		}
	}
	
	/**
	 * 
	 * This function loads the add new subpage form
	 */
	
	
	public function addNewPage(){
		//echo "<pre>"; print_r($this->input->post());die;
		$page_name = $this->input->post('page_name');
		$page_title = $this->input->post('page_title');
		$description = $this->input->post('description');
		$dataArr = array('page_name'=>$page_name,'page_title'=>$page_title,'description'=>$description,'status'=>'Publish');
		$this->user_model->simple_insert(CMS,$dataArr);
		$this->setErrorMessage('success','Successfully added');
		$this->data['cmsList'] = $this->cms_model->get_all_details(CMS,$condition);
		redirect('admin/cms/display_cms');
	}
	
	public function updatePage(){
		$page_id = $this->input->post('page_id');
     	$page_name = $this->input->post('page_name');
		$page_title = $this->input->post('page_title');
		$description = $this->input->post('description');
		$dataArr = array('page_name'=>$page_name,'page_title'=>$page_title,'description'=>$description);
		$condition = array('id'=>$page_id);
		$this->user_model->update_details(CMS,$dataArr,$condition);
		$this->setErrorMessage('success','Updated Successfully');
		redirect('admin/cms/display_cms');
	}
	
	/**
	 * 
	 * This function loads the edit cms form
	 */
	public function edit_cms_form(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Edit Page';
			$cms_id = $this->uri->segment(4,0);
			$condition = array('id' => $cms_id);
			$this->data['cms_details'] = $this->cms_model->get_all_details(CMS,$condition);
			if ($this->data['cms_details']->num_rows() == 1){
				//$condition = array('category' => 'Main');
				//$this->data['cms_main_details'] = $this->cms_model->get_all_details(CMS,$condition);
				$this->load->view('admin/cms/edit_cms',$this->data);
			}else {
				redirect('admin');
			}
		}
	}
	
	/**
	 * 
	 * This function change the cms page status
	 */
	public function change_cms_status(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$mode = $this->uri->segment(4,0);
			$cms_id = $this->uri->segment(5,0);
			$status = ($mode == '0')?'Unpublish':'Publish';
			$newdata = array('status' => $status);
			$condition = array('id' => $cms_id);
			$this->cms_model->update_details(CMS,$newdata,$condition);
			$this->setErrorMessage('success','Status Changed Successfully');
			redirect('admin/cms/display_cms');
		}
	}
	
	/**
	 * 
	 * This function change the cms page display mode
	 */
	public function change_cms_mode(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$mode = $this->uri->segment(4,0);
			$cms_id = $this->uri->segment(5,0);
			$newdata = 	array('status' => $mode);
			$condition = array('id' => $cms_id);
			$this->cms_model->update_details(CMS,$newdata,$condition);
			$this->setErrorMessage('success','Status Changed Successfully');
			redirect('admin/cms/display_cms');
		}
	}
	
	/**
	 * 
	 * This function delete the cms page from db
	 */
	public function delete_cms(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$cms_id = $this->uri->segment(4,0);
			$condition = array('id' => $cms_id);
			$this->cms_model->commonDelete(CMS,$condition);
			$this->setErrorMessage('success','Deleted Successfully');
			redirect('admin/cms/display_cms');
		}
	}
	
	
	
}

/* End of file cms.php */
/* Location: ./application/controllers/admin/cms.php */