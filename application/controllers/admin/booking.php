<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking extends MY_Controller {  
	function __construct(){
		parent::__construct();
    	$this->load->helper(array('cookie','date','form'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->model('brands_model');
    	
	}
	

     // View store details
        public function booking_details(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Service Booking Details';

			$todo= $this->uri->segment(4,0);

			  if(!empty($todo))
			  {	  
				  if($todo == 'live')
				   {
					$where = "status != 'Request recieved' AND status != 'Service completed' AND Iscancelled = 'no'";
				   }
				   elseif($todo == 'pending')
				   {
					   $where = "status = 'Request recieved' AND Iscancelled = 'no'";  
				   }
				  elseif($todo == 'completed')
				   {
						$where = "status = 'Service completed' AND Iscancelled = 'no'";
				   }
				  elseif($todo == 'cancelled')
				   {
					   $where = "Iscancelled = 'Yes'";
				   }
				   else
				   {
						$where = "";
				   }
                $h = $this->brands_model->bookdetails(BOOKDETAILS,$where);  				   
			  }
			  else
			  {
				  $h = $this->brands_model->gedetails(BOOKDETAILS,array());  
			  }	  
			
				$m = $h->result_array();
				
				foreach($m as $key=>$val) {
				 $vehicle_id = $val['vehicle_id'];	
				 $customer_id = $val['customer_id'];	

				    $condition = array('id'=> $vehicle_id);
					$vehdetails = $this->brands_model->gedetails(VEHICLES,$condition);
					$s = $vehdetails->result_array();
					
					$condition = array('id'=> $customer_id);
					$cusdetails = $this->brands_model->gedetails(USERS,$condition);
					$su = $cusdetails->result_array();
	
                   $service = array('booking'=>$val);
				   $vehicle = array('vehicle'=>$s['0']);
				   $customer = array('customer'=>$su['0']);
				   
				   $merg = array_merge($vehicle,$customer); 
				   $data[] = array_merge($service,$merg); 
			}
				
				 /* echo "<pre>";
				print_r($data);
				die; */ 
				 
				$this->data['details'] = $data;
			
			
			
			$this->load->view('admin/booking/booking_details',$this->data);
		}
	}
	
	
   // View store details
        public function booking_memo(){
		if ($this->checkLogin('A') == ''){
			redirect('admin');
		}else {
			$this->data['heading'] = 'Service Booking Details';
			$booking_id = $this->uri->segment(4,0);
			$this->data['booking_id'] = $booking_id;
			
			$condition = array('id'=> $booking_id);
			
			$h = $this->brands_model->gedetails(BOOKDETAILS,$condition);
				
				$m = $h->result_array();
				foreach($m as $key=>$val) {
				 $vehicle_id = $val['vehicle_id'];	
				 $customer_id = $val['customer_id'];	

				    $condition = array('id'=> $vehicle_id);
					$vehdetails = $this->brands_model->gedetails(VEHICLES,$condition);
					$s = $vehdetails->result_array();
					
					$condition = array('id'=> $customer_id);
					$cusdetails = $this->brands_model->gedetails(USERS,$condition);
					$su = $cusdetails->result_array();
	
                   $service = array('booking'=>$val);
				   $vehicle = array('vehicle'=>$s['0']);
				   $customer = array('customer'=>$su['0']);
				   
				   $merg = array_merge($vehicle,$customer); 
				   $data[] = array_merge($service,$merg); 
			}
				
				 /* echo "<pre>";
				print_r($data);
				die; */ 
				
				$this->data['details'] = $data;
			
			
			
			$this->load->view('admin/booking/booking_memo',$this->data);
		}
	}
	

	
	
	
	

	
}/* End of file brand.php */
/* Location: ./application/controllers/admin/amenities.php */