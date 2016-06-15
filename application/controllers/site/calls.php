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
     //  echo  $this->load->file('instamojo');		
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

        $this->data['details'] = $this->brands_model->gedbrandre(BRANDS,$condition);
        $this->load->view('site/calls/brands',$this->data);
		
	}
	
		// Adding vehicles - models ajax call function
	public function models(){
		
		$brand_name = $this->input->post('brand_name');
		$veh_type = $this->input->post('vehtype');
		$condition = array('veh_type'=> $veh_type,'brand_name'=> $brand_name);			
        $m = $this->data['details'] = $this->brands_model->gedmodelre(VEHICLE_MODELS,$condition);
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
                $cng = $row->on_cng;
				$lpg = $row->on_lpg;				
			}
		}
				
		 if($petrol == 'yes')
           {
			   $option = ' <div style="float:left;padding-top: 5px;" class="vdiv"> 
							<input id="petrol" class="radio-custom" name="fuel" type="radio" value="Petrol" checked required>
							<label for="petrol" class="radio-custom-label fuel">Petrol</label>
						  </div>';
		   }

           if($diesel == 'yes')
           {
			   $option = $option.' <div style="padding-top: 5px;" class="vdiv">
							<input id="diesel" class="radio-custom" name="fuel" type="radio" checked value="Diesel" required>
							<label for="diesel" class="radio-custom-label fuel">Diesel</label>
						  </div>';
		   }
		   
		   if($cng == 'yes')
           {
			   $option = $option.' <div style="padding-top: 5px;" class="vdiv">
							<input id="cng" class="radio-custom" name="fuel" type="radio" checked value="CNG" required>
							<label for="cng" class="radio-custom-label fuel">CNG</label>
						  </div>';
		   }
		   
		   if($lpg == 'yes')
           {
			   $option = $option.' <div style="padding-top: 5px;" class="vdiv">
							<input id="lpg" class="radio-custom" name="fuel" type="radio" checked value="LPG" required>
							<label for="lpg" class="radio-custom-label fuel">LPG</label>
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
							<input id="automatic" class="radio-custom" name="transmission" type="radio" checked value="Automatic" required>
							<label for="automatic" class="radio-custom-label fuel">Automatic</label>
						  </div>';
		   }

           if($manual == 'yes')
           {
			   $option = $option.'<div style="padding-top: 5px;" class="vdiv">
							<input id="manual" class="radio-custom" name="transmission" type="radio" checked value="Manual" required>
							<label for="manual" class="radio-custom-label fuel">Manual</label>
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

// store price saving
public function storeservice()
 
 {
	if(!empty($_POST)){
		
		 $service_ids = $_POST['mnseoshdfhftrt'];
		 $z = explode(',', $service_ids);
         $price = 0;
		  
		  foreach($z as $key=>$val)
		  {
			  
		  
		           $condition = array('id' => $val);
				   $cusdetails = $this->brands_model->gedetails(SERVICES,$condition);
				   $result = $cusdetails->result_array();
				   $sprice = $result['0']['price'];
				   $price = $price+$sprice;   
		  }		

				   $newdata = array(
                   'price'  => $price
                  );
				   $this->session->set_userdata($newdata);
                   die('success');		
		
	}
 
 }

 
 // repairs price saving
public function repairservice()
 
 {
	if(!empty($_POST)){
		
		 $service_ids = $_POST['mnseoshrtr'];
		 $z = explode(',', $service_ids);
         $price = 0;
		  
		  foreach($z as $key=>$val)
		  {
		           $condition = array('id' => $val);
				   $cusdetails = $this->brands_model->gedetails(ADD_REPAIRS,$condition);
				   $result = $cusdetails->result_array();
				   $sprice = $result['0']['price'];
				   $price = $price+$sprice;   
		  }		
                   
				   $newdata = array(
                   'repair_price'  => $price
                  );
				   $this->session->set_userdata($newdata);
				   die('success');		
		
	}
 
 }
	
	
   // save booking details - doorstep
   public function savebooking_2w(){

	 if(!empty($_POST)){
 	 
				   $lat=$_POST['lat'];
				   $lon=$_POST['lon'];
				   $vehtype=$_POST['vehtype'];
				   $pick_point=$_POST['pick_point'];
				   $drop_point = $_POST['drop_point'];
				   $date =$_POST['date'];
				   $time =$_POST['time'];
				   $prices =$_POST['prices'];
				   $services =$_POST['services'];
				  
				   $cat_name=$_POST['cat_name'];
				   $veh_id = $_POST['veh_id'];
				   $customer_id = $this->checkLogin('U');
				   $booktime = date("Y-m-d", strtotime('now'));
				   
				   // saved pricing in session
					$price = $this->session->userdata('price');
					$repair_price = $this->session->userdata('repair_price');
					$total_price = $price+$repair_price;
					$prices = $total_price;
	
					$insertData = array('booktime'=> $booktime,'services'=>$services,'est_cost'=>$prices,'pickup_lat'=>$lat,'pickup_lon'=>$lon,'drop_lat'=>$lat,'drop_lon'=>$lon,'vehtype'=>$vehtype,'pick_point'=>$pick_point,'drop_point'=>$drop_point,'at_date'=>$date,'at_time'=>$time,'cat_name'=>$cat_name,'vehicle_id'=>$veh_id,'customer_id'=>$customer_id);
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

      // save booking details 
   public function savebooking(){

	 if(!empty($_POST)){ 
				   require 'instamojo/instamojo.php';
				   $prices = $_POST['prices'];
				   $services = $_POST['services']; 
				   $storeid = $_POST['storeid'];
				   $storename = $_POST['storename'];
				   $pickup_lat = $_POST['pickup_lat'];
				   $pickup_lon = $_POST['pickup_lon'];
				   $drop_lon = $_POST['drop_lon'];
				   $drop_lat = $_POST['drop_lat'];
				   $vehtype = $_POST['vehtype'];
				   $veh_id = $_POST['veh_id'];
				   
				   $pick_point = $_POST['pick_point'];
				   $drop_point = $_POST['drop_point'];
				   $date = $_POST['date'];
				   $time = $_POST['time'];
                   $cat_name=$_POST['cat_name'];
				   $customer_id = $this->checkLogin('U');
				   $booktime = date("Y-m-d", strtotime('now'));
				   
				    // saved pricing in session
					$price = $this->session->userdata('price');
					$discount = $this->session->userdata('discount');
					$promo_code = $this->session->userdata('promo_code');
					$repair_price = $this->session->userdata('repair_price');
					$total_price = $price+$repair_price;
					if(!empty($discount))
					{
					  $prices = $total_price - ($total_price * ($discount / 100));
					}
                    else
				    {
					  $prices = $total_price; 
				    }

				    $api = new Instamojo\Instamojo('45625fe0461ccfb5a6ba77e756751ca4', '7f9a410af386a0cd4b0e1a3bf7c90816');
	
					$response = $api->linkCreate(array(
					'title'=>'Hoopy Vehicle Service',
					'description'=>'Transparent process and Authenticity is our commitment. So sit back, relax and book your vehicle service.',
					'base_price'=> $prices,
					'redirect_url'=> 'http://hoopy.in/service-history',
					'webhook_url'=> 'http://hoopy.in/instamojo',
					));
		    
			        $slug = $response['slug'];
					
					if(!empty($discount))
					{
					  $insertData = array('booktime'=> $booktime,'payment_slug'=>$slug,'store_name'=>$storename,'store_id'=>$storeid,'services'=>$services,'est_cost'=>$prices,'pickup_lat'=>$pickup_lat,'pickup_lon'=>$pickup_lon,'drop_lat'=>$drop_lat,'drop_lon'=>$drop_lon,'vehtype'=>$vehtype,'pick_point'=>$pick_point,'drop_point'=>$drop_point,'at_date'=>$date,'at_time'=>$time,'cat_name'=>$cat_name,'vehicle_id'=>$veh_id,'customer_id'=>$customer_id,'promo_code'=>$promo_code);
					
					}
                    else
				    {
					  $insertData = array('booktime'=> $booktime,'payment_slug'=>$slug,'store_name'=>$storename,'store_id'=>$storeid,'services'=>$services,'est_cost'=>$prices,'pickup_lat'=>$pickup_lat,'pickup_lon'=>$pickup_lon,'drop_lat'=>$drop_lat,'drop_lon'=>$drop_lon,'vehtype'=>$vehtype,'pick_point'=>$pick_point,'drop_point'=>$drop_point,'at_date'=>$date,'at_time'=>$time,'cat_name'=>$cat_name,'vehicle_id'=>$veh_id,'customer_id'=>$customer_id);
					
				    }
					
					
					$lastid = $this->user_model->lastinsert(BOOKDETAILS,$insertData);
                   
				    $booknumber = 'HPYBOOK'.$lastid;
					$newdata = array('booking_no' => $booknumber);
					$condition = array('id' => $lastid);
					$this->user_model->update_details(BOOKDETAILS,$newdata,$condition);
					$array_items = array('price' => '', 'repair_price' => '', 'discount' => '');
                    $this->session->unset_userdata($array_items);
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
	 $vehtype=$_POST['vehtype'];
	 $cat_name=$_POST['cat_name'];
	 $range=$_POST['range'];

	 $query = 'SELECT *,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lng.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `hp_stores` HAVING `distance` <= '.$range;
	 $me  = $this->brands_model->ExecuteQuery($query);
     $m = $me->result_array();
	 
	 foreach($m as $key=>$val) {
		         $partner_id = $val['partner_id'];
				 $name = $val['name'];	
				 $service = $val['services'];	
				 $ser = explode(",",$service);
				 $store_id =  $val['id'];
				 $msg='';
				 $i=0;
				  
				
				foreach($ser as $key=>$val) {
					
				$service_name = trim($val," ");		
				$veh_type = trim($vehtype," ");
				if($veh_type == 'Four Wheeler')
				{
					$condition = array('four_wheeler'=>'yes','service_name'=> $service_name,'service_cat'=> $cat_name,'status'=> 'Active');
				}
				else
				{
					$condition = array('two_wheeler'=>'yes','service_name'=> $service_name,'service_cat'=> $cat_name,'status'=> 'Active');
				}
				
				
				$cusdetails = $this->brands_model->gedetails(SERVICES,$condition);
				$su = $cusdetails->result_array();
				

					if(!empty($su))
					{
						$price = $su['0']['price'];
						$service_id = $su['0']['id'];
						$inval = $store_id.'-'.$name.'-'.$val.'-'.$price.'-'.$service_id;	
					
						$labid = $store_id.'-'.$i;	
						$cnt = '<span><div>   
						<input id="'.$labid.'" class="checkbox-custom stores" name="checkbox-1" value="'.$inval.'" type="checkbox" >
						<label for="'.$labid.'" class="checkbox-custom-label stserv fuel">'.$val.' - Rs. '.$price.'</label>
						</div></span>';
						$msg = $msg.$cnt;
					}	
				
				$i++;
			   }
               
               if(!empty($msg))
			   {
				  $cool = '<p class="storename">'.$name.'</p><div>'.$msg.'</div>';			   
			      $data = $data.$cool; 
			   }	   
   
			}	

	 echo $data;
	 exit;
		
 }
 
 // stores details in 5km range
  public function stores_latlng() {
	  
     $lat=$_POST['lat'];
	 $lng=$_POST['lng'];
	 $vehtype=$_POST['vehtype'];
	 $cat_name=$_POST['cat_name'];
	 $range=$_POST['range'];
	 $data = '';
	 
	  $query = 'SELECT *,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lng.' - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `hp_stores` HAVING `distance` <= '.$range;
	 
	  $me  = $this->brands_model->ExecuteQuery($query);
      $m = $me->result_array();
	 	 
	 foreach($m as $key=>$val) {
				 $name = $val['name'];	
				 $lat = $val['lat'];
				 $lng = $val['lng'];
                 $dst = round($val['distance'],1);				 
		         $partner_id = $val['partner_id'];
				 $service = $val['services'];	
				 $ser = explode(",",$service);
				 $store_id =  $val['id'];
				 $have_service ='no';
				 $i=0;
				 $service_name = trim($val," ");		
				 $veh_type = trim($vehtype," ");
				
				foreach($ser as $key=>$val) {
					
				$service_name = trim($val," ");		
				
				if($veh_type == 'Four Wheeler')
				{
					$condition = array('four_wheeler'=>'yes','partner_id'=> $partner_id,'service_name'=> $service_name,'service_cat'=> $cat_name,'status'=> 'Active');
				}
				else
				{
					$condition = array('two_wheeler'=>'yes','partner_id'=> $partner_id,'service_name'=> $service_name,'service_cat'=> $cat_name,'status'=> 'Active');
				}
				
				
				$cusdetails = $this->brands_model->gedetails(SERVICES,$condition);
				$su = $cusdetails->result_array();

					if(!empty($su))
					{
					  $have_service = 'yes';
					}	
				
				$i++;
			   }
			   
			   
			   if($have_service == 'yes')
			   {
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
			   		   			    
			}			

	echo $data;		
	exit;	          
				
 }
 
 // cancel booking from frontend
  public function cancelbooking() {
	
	   $book_id=$_POST['book_id'];
	   $status=$_POST['status'];
	   
	   if($status == 'Request recieved' || $status == 'Request confirmed')
	   {
		   $res = $this->user_model->update_details(BOOKDETAILS,array('Iscancelled'=>'Yes'),array('id'=>$book_id));
		   die('success');	 
	   }
	   else
	   {
		 die("Sorry!! you can't cancel booking now. Your service is already in process.");
	   }	

  }
  
  
   // save feedback details 
   public function feedback(){

	 if(!empty($_POST)){
 	 
				   if ($this->checkLogin('U') != '') { 
				   $_POST['customer_id'] = $this->checkLogin('U');
				   $booking_no =$_POST['booking_id'];
					$lastid = $this->user_model->lastinsert(FEEDBACK,$_POST);
					$res = $this->user_model->update_details(BOOKDETAILS,array('feedback'=> 'yes'),array('booking_no'=>$booking_no));
					die('success');  
				   }					
			  }   
   }
   
   public function promocheck(){
	   
	  if(!empty($_POST)){
 	 
				   if ($this->checkLogin('U') != '') { 
				   $customer_id = $this->checkLogin('U');
				   $promoval =$_POST['promoval'];
				  // echo $promoval;
				  $cdate = date("Y-m-d");
				  $checkpromo = $this->user_model->bookdetails(PROMOS,array('promo_code'=>$promoval,'from_time <='=>$cdate,'to_time >='=>$cdate,'isactive'=>'Active'));
				  
				   $result = $checkpromo->result_array();
				   $discount = $result['0']['amount'];
				   $promo_code = $result['0']['promo_code'];
				   
				   //print_r($result);
				  // echo $per;
				   
				   if($checkpromo->num_rows() > 0){

					 $checkbook = $this->user_model->get_all_details(BOOKDETAILS,array('promo_code'=>$promo_code,'customer_id'=>$customer_id));
					 
					 if($checkbook->num_rows() > 0 ){
					 die('2');	 
					 }
                     else
                     {
						// saved pricing in session
						$price = $this->session->userdata('price');
						$repair_price = $this->session->userdata('repair_price');
						$total_price = $price+$repair_price;
						$selling_price = $total_price - ($total_price * ($discount / 100));
						$newdata = array( 'discount'  => $discount, 'promo_code'  => $promo_code );
                        $this->session->set_userdata($newdata);
						echo $selling_price;
					 }						 
			       }
				   else
				   {
					   die('3');
				   }	   
			    }
				   
		}

	 die;  
   }	   
  
 

    // web hook for payment gateway
    public function instamojo(){
		
	   $amount=$_POST['amount'];
	   $buyer=$_POST['buyer'];
	   $buyer_name=$_POST['buyer_name'];
	   $buyer_phone=$_POST['buyer_phone'];
	   $currency=$_POST['currency'];
	  // $longurl=$_POST['longurl'];
	   $mac=$_POST['mac'];
	   $payment_id=$_POST['payment_id'];
	  // $payment_request_id=$_POST['payment_request_id'];
	  // $purpose=$_POST['purpose'];
	  // $shorturl=$_POST['shorturl'];
	   $status=$_POST['status'];
	   $fees=$_POST['fees'];
	   $unit_price=$_POST['unit_price'];
	   $quantity=$_POST['quantity'];
	   
	   $insertData = array('payment_id'=>$payment_id,'unit_price'=>$unit_price,'quantity'=>$quantity,'status'=>$status,'amount'=>$amount,'buyer'=>$buyer,'buyer_name'=>$buyer_name,'buyer_phone'=>$buyer_phone,'currency'=>$currency,'fees'=>$fees,'mac'=>$mac);
	   $res = $this->user_model->simple_insert(PAYMENTS,$insertData);
	}
	
   // create payment gateway link
    public function blink(){

	   require 'instamojo/instamojo.php';
	
	 $api = new Instamojo\Instamojo('45625fe0461ccfb5a6ba77e756751ca4', '7f9a410af386a0cd4b0e1a3bf7c90816');
	 try {
		$response = $api->linkCreate(array(
			'title'=>'Hello ghhhhh',
			'description'=>'Create a new Link easily',
			'base_price'=> 0,
			'cover_image'=>'/path/to/photo.jpg',
			'redirect_url'=> 'http://hoopy.in',
			'webhook_url'=> 'http://hoopy.in/instamojo',
			));
		
		//echo "<pre>";
		//print_r($response);
		
		$slug = $response['slug'];
		
		echo $slug;
	}
	catch (Exception $e) {
		print('Error: ' . $e->getMessage());
	}	
		
		
	}	
	
	 // create payment gateway link
    public function sms(){
	 
	 require('textlocal/textlocal.class.php');

		$textlocal = new Textlocal('rajnesh.developer@gmail.com', 'Admin@123');

		$numbers = array(9742441734);
		$sender = 'TXTLCL';
		$message = 'This is a message for testing';

		try {
			$result = $textlocal->sendSms($numbers, $message, $sender);
			print_r($result);
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	
	}	
	
	 public function smssend(){
	 
	 require('textlocal/textlocal.class.php');

		$textlocal = new Textlocal('abhinav.shrivastava@hoopy.in', '574f8e6fe8608f3ce9ed7f6d211758f9d55e4bbf');

		$numbers = array(9742441734);
		$sender = 'VHOOPY';
		$message = 'Greetings from Hoopy!! Your OTP is : 23456';

		try {
			$result = $textlocal->sendSms($numbers, $message, $sender);
			print_r($result);
		} catch (Exception $e) {
			die('Error: ' . $e->getMessage());
		}
	
	}
	
}

/* End of file adminlogin.php */
/* Location: ./application/controllers/admin/adminlogin.php */