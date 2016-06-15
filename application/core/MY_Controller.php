<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
error_reporting(-1);
/* 
 * 
 * This controller contains the common functions
 * @author Brill Mindz
 *
 */

date_default_timezone_set('Asia/Kolkata'); 

class MY_Controller extends CI_Controller {  
	public $privStatus;	
	public $data = array();
	function __construct()
    { 
        parent::__construct(); 
		ob_start();
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$this->load->helper(array('url', 'text'));
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->helper('directory');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->load->library('session');
		$this->load->model('user_model');
			
		//$feedbackCount = $this->category_model->getFeedbackCount();
	//	$this->data['cmsPages'] = count($feedbackCount);
		/*
		 * Connecting Database
		 */
		$this->load->database();
		
		/*
		 * Loading CMS Pages
		 */
		
		
	
		
			
		/*
		 * User activity Count
		 */
		 
		if($this->checkLogin('U')!=''){
			$userProfileDetails = $this->db->query('select * from '.USERS.' where `id`="'.$this->checkLogin('U').'"')->result_array();
		
			#echo $this->db->last_query(); die;
		}
		
		$this->data['title'] = $this->config->item('meta_title');;
		$this->data['heading'] = '';
		$this->data['flash_data'] = $this->session->flashdata('sErrMSG');
		$this->data['flash_data_type'] = $this->session->flashdata('sErrMSGType');
		$this->data['adminPrevArr'] = $this->config->item('adminPrev');
 		$this->data['adminEmail'] = $this->config->item('email');	
		$this->data['subAdminMail'] = $this->session->userdata('hoopy_session_admin_email');				
		$this->data['loginID'] = $this->session->userdata('hoopy_session_user_id');				
    	$this->data['allPrev'] = '0';
    	$this->data['logo'] = $this->config->item('logo_image');
    	$this->data['fevicon'] = $this->config->item('fevicon_image');
    	$this->data['footer'] = $this->config->item('footer_content');
    	$this->data['siteContactMail'] = $this->config->item('site_contact_mail');
		$this->data['WebsiteTitle'] = $this->config->item('email_title');
    	$this->data['siteTitle'] = $this->config->item('email_title');
    	$this->data['meta_title'] = $this->config->item('meta_title');
    	$this->data['meta_keyword'] = $this->config->item('meta_keyword');
    	$this->data['meta_description'] = $this->config->item('meta_description');
    	$this->data['giftcard_status'] = $this->config->item('giftcard_status');
		$this->data['sidebar_id'] = $this->session->userdata('session_sidebar_id');
		$this->data['vendorInfo'] = '';
		if ($this->session->userdata('hoopy_session_admin_name') == $this->config->item('admin_name')){
			$this->data['allPrev'] = '1';
		}
		$this->data['paypal_ipn_settings'] = unserialize($this->config->item('payment_0'));
		$this->data['paypal_credit_card_settings'] = unserialize($this->config->item('payment_1'));
		$this->data['authorize_net_settings'] = unserialize($this->config->item('payment_2'));
		
		
		
		
		$this->data['datestring'] = "%Y-%m-%d %h:%i:%s";
		if($this->checkLogin('U')!=''){
 			$this->data['common_user_id'] = $this->checkLogin('U'); 
		}
			
		
    }
 
	
	/**
     * 
     * This function return the session value based on param
     * @param $type
     */
    public function checkLogin($type=''){
    	if ($type == 'A'){
    		return $this->session->userdata('hoopy_session_admin_id');
    	}else if ($type == 'N'){
    		return $this->session->userdata('hoopy_session_admin_name');
    	}else if ($type == 'M'){
    		return $this->session->userdata('hoopy_session_admin_email');
    	}else if ($type == 'U'){
    		return $this->session->userdata('hoopy_session_user_id');
    	}else if ($type == 'T'){
    		return $this->session->userdata('hoopy_session_temp_id');
			
    	}
    }
    
    /**
     * 
     * This function set the error message and type in session
     * @param string $type
     * @param string $msg
     */
    public function setErrorMessage($type='',$msg=''){
    	($type == 'success') ? $msgVal = 'message-green' : $msgVal = 'message-red';
		$this->session->set_flashdata('sErrMSGType', $msgVal);
		$this->session->set_flashdata('sErrMSG', $msg);
		
    }
  
   /**
    * 
    * Generate random string
    * @param Integer $length
    */
   public function get_rand_str($length='6'){
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
   }
  
	/**
	 * 
	 * Resize the image
	 * @param int target_width
	 * @param int target_height
	 * @param string image_name
	 * @param string target_path
	 */
	public function imageResizeWithSpace($box_w,$box_h,$userImage,$savepath){
			
			$thumb_file = $savepath.$userImage;
				
			list($w, $h, $type, $attr) = getimagesize($thumb_file);
				
				$size=getimagesize($thumb_file);
			    switch($size["mime"]){
			        case "image/jpeg":
            			$img = imagecreatefromjpeg($thumb_file); //jpeg file
			        break;
			        case "image/gif":
            			$img = imagecreatefromgif($thumb_file); //gif file
				      break;
			      case "image/png":
			          $img = imagecreatefrompng($thumb_file); //png file
			      break;
				
				  default:
				        $im=false;
				    break;
				}
				
			$new = imagecreatetruecolor($box_w, $box_h);
			if($new === false) {
				//creation failed -- probably not enough memory
				return null;
			}
		
		
			$fill = imagecolorallocate($new, 255, 255, 255);
			imagefill($new, 0, 0, $fill);
		
			//compute resize ratio
			$hratio = $box_h / imagesy($img);
			$wratio = $box_w / imagesx($img);
			$ratio = min($hratio, $wratio);
		
			if($ratio > 1.0)
				$ratio = 1.0;
		
			//compute sizes
			$sy = floor(imagesy($img) * $ratio);
			$sx = floor(imagesx($img) * $ratio);
		
			$m_y = floor(($box_h - $sy) / 2);
			$m_x = floor(($box_w - $sx) / 2);
		
			if(!imagecopyresampled($new, $img,
				$m_x, $m_y, //dest x, y (margins)
				0, 0, //src x, y (0,0 means top left)
				$sx, $sy,//dest w, h (resample to this size (computed above)
				imagesx($img), imagesy($img)) //src w, h (the full size of the original)
			) {
				//copy failed
				imagedestroy($new);
				return null;
				
			}
			imagedestroy($i);
			imagejpeg($new, $thumb_file, 99);
			
	}
	
	
	function getAddEditDetails($excludeArray)
	{
		$inputArrayDetails = array();
		
		foreach($this->input->post() as $key=>$val)
		{
			if(!(in_array($key,$excludeArray)))
			{
				$inputArrayDetails[$key] = trim(addslashes($val));
			}
		}
		return $inputArrayDetails;
	}
	
	
	/**
	 * Image resize
	 * @param int $width
	 * @param int $height
	 * @param string $targetImage Name
	 * @param string $savepath 
	 */
	public function ImageResizeWithCrop($width, $height, $thumbImage, $savePath){
		
		$thumb_file = $savePath.$thumbImage;
		
		$newimgPath = base_url().substr($savePath,2).$thumbImage;
		
		/* Get original image x y*/
		list($w, $h) = getimagesize($thumb_file);
		$size=getimagesize($thumb_file);
		/* calculate new image size with ratio */
		$ratio = max($width/$w, $height/$h);
		$h = ceil($height / $ratio);
		$x = ($w - $width / $ratio) / 2;
		$w = ceil($width / $ratio);
		/* new file name */
		$path = $savePath.$thumbImage;
		/* read binary data from image file */
		
		$imgString = file_get_contents($newimgPath);
		/* create image from string */
		$image = imagecreatefromstring($imgString);
		$tmp = imagecreatetruecolor($width, $height);
		imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h); 
	
		/* Save image */
		switch ($size["mime"]) {
			case 'image/jpeg':
				imagejpeg($tmp, $path, 100);
				break;
			case 'image/png':
				imagepng($tmp, $path, 0);
				break;
			case 'image/gif':
				imagegif($tmp, $path);
				break;
			default:
				exit;
			break;
		}
		return $path;
		/* cleanup memory */
		imagedestroy($image);
		imagedestroy($tmp);
	}
	
	
}
