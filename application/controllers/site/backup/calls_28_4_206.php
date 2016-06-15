<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This controller contains the functions related to admin management and login, forgot password
 * @author Brill Mindz
 *
 */

class Calls extends MY_Controller {
	function __construct(){
        parent::__construct();
		$this->load->helper(array('cookie','date','form','url'));
		$this->load->library(array('encrypt','form_validation'));
		$this->load->library('session');		
		$this->load->model('admin_model');
		$this->load->model('brands_model');
    }
    
    /**
     * 
     * This function check the admin login session and load the templates
     * If session exists then load the dashboard
     * Otherwise load the login form
     */
   	public function index(){
		     die('indexxx...');
	}
	
	// admin panel - while adding models - brand veh types
	public function vehtype(){
		
		$brand = $this->input->post('brand');
		$condition = array('name'=> $brand);
		$option = '';
		$details = $this->brands_model->get_all_details(BRANDS,$condition);
		
	   if ($details->num_rows() > 0) {
		   foreach ($details->result() as $row) {
		   $two_wheeler = $row->two_wheeler; 
		   $four_wheeler = $row->four_wheeler;
           
		   if($two_wheeler == 'yes')
           {
			   $option = '<option value="Two Wheeler">Two Wheeler</option>';
		   }

           if($four_wheeler == 'yes')
           {
			   $option = $option.'<option value="Four Wheeler">Four Wheeler</option>';
		   }		   
		   
		   }
       }	   
         
		echo $option;
		exit;

	}
	
	
	
	// Adding vehicles - brands ajax call function
	public function brands(){
		
		$vehtype = $this->input->post('vehtype');
		if($vehtype == 'Four Wheeler')
		{
			$condition = array('four_wheeler'=>'yes');
		}
        else
        {
			$condition = array('two_wheeler'=>'yes');
		}			

        $this->data['details'] = $this->brands_model->get_all_details(BRANDS,$condition);
        $this->load->view('site/calls/brands',$this->data);
		
	}
	
		// Adding vehicles - models ajax call function
	public function models(){
		
		$brand_name = $this->input->post('brand_name');
		$veh_type = $this->input->post('vehtype');
		$condition = array('veh_type'=> $veh_type,'brand_name'=> $brand_name);			
        $m = $this->data['details'] = $this->brands_model->get_all_details(VEHICLE_MODELS,$condition);
        $this->load->view('site/calls/models',$this->data);
		
	}
	
	// Adding vehicles - fueltype ajax call function
 	public function fuel(){
		
		$option = '';
		$model_name = $this->input->post('model_name');
		$model_year = $this->input->post('model_year');
		$condition = array('model_name'=> $model_name,'model_year'=> $model_year);			
        $sata  = $this->brands_model->get_all_details(VEHICLE_MODELS,$condition);
        
		if ($sata->num_rows() > 0){
			foreach ($sata->result() as $row) {
				$petrol = $row->on_petrol;
				$diesel = $row->on_diesel;							
			}
		}
				
		 if($petrol == 'yes')
           {
			   $option = ' <div style="float:left;padding-top: 5px;" class="vdiv"> 
							<input id="petrol" class="radio-custom" name="fuel" type="radio" value="Petrol" required>
							<label for="petrol" class="radio-custom-label">Petrol</label>
						  </div>';
		   }

           if($diesel == 'yes')
           {
			   $option = $option.' <div style="padding-top: 5px;" class="vdiv">
							<input id="diesel" class="radio-custom" name="fuel" type="radio" value="Diesel" required>
							<label for="diesel" class="radio-custom-label">Diesel</label>
						  </div>';
		   }
		
		echo $option;
		exit;
		
	} 
	
		// Adding vehicles - fueltype ajax call function
 	public function transmission(){
		
		$option = '';
		$model_name = $this->input->post('model_name');
		$model_year = $this->input->post('model_year');
		$condition = array('model_name'=> $model_name,'model_year'=> $model_year);			
        $sata  = $this->brands_model->get_all_details(VEHICLE_MODELS,$condition);
        
		if ($sata->num_rows() > 0){
			foreach ($sata->result() as $row) {
				$manual = $row->manual;
				$automatic = $row->automatic;							
			}
		}
				
		 if($automatic == 'yes')
           {
			   $option = '<div style="float:left;padding-top: 5px;" class="vdiv"> 
							<input id="automatic" class="radio-custom" name="transmission" type="radio" value="Automatic" required>
							<label for="automatic" class="radio-custom-label">Automatic</label>
						  </div>';
		   }

           if($manual == 'yes')
           {
			   $option = $option.'<div style="padding-top: 5px;" class="vdiv">
							<input id="manual" class="radio-custom" name="transmission" type="radio" value="Manual" required>
							<label for="manual" class="radio-custom-label">Manual</label>
						  </div>';
		   }
		
		echo $option;
		exit;
		
	} 
	
	 // latitude and longitude on address based
    public function latlng(){
	         $address = rawurlencode($_GET['address']);
	         $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key=AIzaSyAugqxWYdXhQA7rGXaOTbXE3lZfs9BqNEk';
             $json = file_get_contents($url);
            $data=json_decode($json);
			$status = $data->status;
			if($status=="OK")
			{
				$lat = $data->results[0]->geometry->location->lat;
				$lng = $data->results[0]->geometry->location->lng;
				echo $lat.'-'.$lng;
			} 
    exit;			
    }	  

    //  Address on based latitude and longitude 
    public function address(){
	         $lat = $_GET['lat'];
			 $lon = $_GET['lon'];
	         $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lon.'&key=AIzaSyAugqxWYdXhQA7rGXaOTbXE3lZfs9BqNEk';
             $json = file_get_contents($url);
             $data=json_decode($json);
			 $status = $data->status;
			 if($status=="OK")
			 {
				$address = $data->results[0]->formatted_address;
				echo $address;
			 } 
    exit;			
    }		
	
   // save booking details - 2w	
   public function savebooking_2w(){

	 if(!empty($_POST)){ 
				   $lat=$_POST['lat'];
				   $lon=$_POST['lon'];
				   $vehtype=$_POST['vehtype'];
				   $pick_point=$_POST['pick_point'];
				   $drop_point = $_POST['drop_point'];
				   $date =$_POST['date'];
				   $time =$_POST['time'];
				  
				   $cat_name=$_POST['cat_name'];
				   $veh_id = $_POST['veh_id'];
				   $customer_id = $this->checkLogin('U');
				  
					$insertData = array('pickup_lat'=>$lat,'pickup_lon'=>$lon,'drop_lat'=>$lat,'drop_lon'=>$lon,'vehtype'=>$vehtype,'pick_point'=>$pick_point,'drop_point'=>$drop_point,'at_date'=>$date,'at_time'=>$time,'cat_name'=>$cat_name,'vehicle_id'=>$veh_id,'customer_id'=>$customer_id);
					$lastid = $this->user_model->lastinsert(BOOKDETAILS,$insertData);
                   
				    $booknumber = 'HPYBOOK'.$lastid;
					$newdata = array('booking_no' => $booknumber);
					$condition = array('id' => $lastid);
					$this->user_model->update_details(BOOKDETAILS,$newdata,$condition);
					$this->setErrorMessage('success','Service booking details saved successfully');
					die('success');   
			  }
			  else
			  {
			   $status = '[{"status":"Access denied !!"}]';
			   echo $status; 
			   exit;
			  }   
   }

  // Update booking status 
  public function booking_status(){
	  
                   $book_id=$_POST['book_id'];
				   $todo=$_POST['todo'];
				   $newdata = array(
									    'status' => $todo
									);
									$condition = array('id' => $book_id);
									$this->user_model->update_details(BOOKDETAILS,$newdata,$condition);
                                    echo "Status changed successfully";
   exit;
 }	
 
 // stores details in 5km range
  public function getstores(){
	  
     $lat=$_POST['lat'];
	 $lng=$_POST['lng'];
	 $lat = '12.92443';
	 $lng = '77.64682';
	 
	// echo $lat;
	// echo $lng;
	 $query = 'SELECT *,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lng.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `hp_stores` HAVING `distance` <= 5';
	 $me  = $this->brands_model->ExecuteQuery($query);
     $m = $me->result_array();
	 
	 
	 foreach($m as $key=>$val) {
				 $name = $val['name'];	
				 $service = $val['services'];	
				 $ser = explode(",",$service);
				 $store_id =  $val['id'];
				 $inval = $store_id.'-'.$name;	
				 $msg='';
				 $i=0;
				  
				
				foreach($ser as $key=>$val) {
				$labid = $store_id.'-'.$i;	
				$cnt = '<span><div>   
			    <input id="'.$labid.'" class="checkbox-custom" name="checkbox-1" value="'.$inval.'" type="checkbox" >
				<label for="'.$labid.'" class="checkbox-custom-label stserv">'.$val.'</label>
				</div></span>';
				$msg = $msg.$cnt;
				$i++;
			   }
               
               $cool = '<p class="storename">'.$name.'</p><div>'.$msg.'</div>';			   
			   $data = $data.$cool;
				    
			}			

	// echo "<pre>";
	 //print_r($m);
	 
	 echo $data;
			
	exit;
	// die('nvbnvb');            
				
 }
 
 // stores details in 5km range
  public function stores_latlng() {
	  
     $lat=$_POST['lat'];
	 $lng=$_POST['lng'];
	 $data = '';
	 
	// echo $lat;
	// echo $lng;
	 $query = 'SELECT *,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lng.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `hp_stores` HAVING `distance` <= 5';
	 $me  = $this->brands_model->ExecuteQuery($query);
     $m = $me->result_array();
	 
	 
	 foreach($m as $key=>$val) {
				 $name = $val['name'];	
				 $lat = $val['lat'];
				 $lng = $val['lng'];
                 $dst = round($val['distance'],1);				 
		 
		       $cool = $name.','.$lat.','.$lng.','.$dst;			   
			   
			   if($data == '')
			   {
				 $data = $cool;  
			   }
               else 
			   { 
		         $data = $data.'-'.$cool;
			   }			   
			   
				    
			}			

	//echo "<pre>";
	//print_r($m);
	 
	
	echo $data;		
	exit;
	// die('nvbnvb');            
				
 }

	
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */