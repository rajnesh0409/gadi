<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * This model contains all common db related functions
 * @author Brill Mindz
 *
 */
class My_Model extends CI_Model { 
	/**
	 * 
	 * This function connect the database and load the functions from CI_Model
	 */
	public function __construct()  
	{
		parent::__construct();
//		$this->load->database();

	}
	
	public function commonUpdate($table='',$condition='',$fieldName='',$updateList=''){
		$this->db->where($fieldName,$updateList);
		$this->db->update($table,$condition);
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
	 * This function returns the table contents based on data
	 * @param String $table	->	Table name
	 * @param Array $condition	->	Conditions
	 * @param Array $sortArr	->	Sorting details
	 * 
	 * return Array
	 */

	public function get_all_details($table='',$condition='',$sortArr=''){
		
		if ($sortArr != '' && is_array($sortArr)){
			
			foreach ($sortArr as $sortRow){
				if (is_array($sortRow)){
					$this->db->order_by($sortRow['field'],$sortRow['type']);
				}
			}
		}
		
		return $this->db->get_where($table,$condition);
	}
	
	
	public function get_limited_details($table='',$condition='',$sortArr='',$limit='',$likeVal=''){
		
				//print_r($condition); die;

		if ($sortArr != '' && is_array($sortArr)){
			
			foreach ($sortArr as $sortRow){
				if (is_array($sortRow)){
					$this->db->order_by($sortRow['field'],$sortRow['type']);
				}
			}
		}
		       if($likeVal != ''){
				   $fis="FIND_IN_SET(`rootID`,'".$likeVal."')";
				   $condition.=$fis;
			   }
		       $this->db->limit($limit,0);
		return $this->db->get_where($table,$condition);
	}
	
	public function get_limited_details_FIND($table='',$limit='',$condition=''){
		
		if ($sortArr != '' && is_array($sortArr)){
			
			foreach ($sortArr as $sortRow){
				if (is_array($sortRow)){
					$this->db->order_by($sortRow['field'],$sortRow['type']);
				}
			}
		}
		  
	       if($limit != ''){
		       $this->db->limit($limit,0);
		   }
		return $this->db->get_where($table,$condition);
	}
	
	/**
	 * 
	 * This function update the table contents based on params
	 * @param String $table		->	Table name
	 * @param Array $data		->	New data
	 * @param Array $condition	->	Conditions
	 */
	public function update_details($table='',$data='',$condition=''){
		$this->db->where($condition);
		return $this->db->update($table,$data);
	}
	
	/**
	 * 
	 * Simple function for inserting data into a table
	 * @param String $table
	 * @param Array $data
	 */
	public function simple_insert($table='',$data=''){

		$this->db->insert($table,$data);
	}
	
	
	public function saveform($table=null,$data=null) {

		$str = $this->db->insert_string($table, $data);
		$this->db->query($str);
		return $str;
	}
	
	
	public function updateform($table=null,$data=null,$where=null) {

		$str = $this->db->update_string($table, $data, $where);
		$this->db->query($str);
		return $str;
	}
	
	/**
	 * 
	 * This function do all insert and edit operations
	 * @param String $table		->	Table name
	 * @param String $mode		->	insert, update
	 * @param Array $excludeArr	
	 * @param Array $dataArr
	 * @param Array $condition
	 */
	 
	public function commonInsertUpdate($table='',$mode='',$excludeArr='',$dataArr='',$condition='') {
		$inputArr = array();
		foreach ($this->input->post() as $key => $val){
			if (!in_array($key, $excludeArr)){
				$inputArr[$key] = $val;
			}
		}
		$finalArr = array_merge($inputArr,$dataArr);
		if ($mode == 'insert'){
			return $this->db->insert($table,$finalArr);
		}else if ($mode == 'update'){
			$this->db->where($condition);
			return $this->db->update($table,$finalArr);
		}
	}
	
	/**
	 * 
	 * For getting last insert id
	 */
	public function get_last_insert_id(){
		return $this->db->insert_id();
	}
	
	/**
	 * 
	 * This function do the delete operation
	 * @param String $table
	 * @param Array $condition
	 */
	public function commonDelete($table='',$condition=''){
		$this->db->delete($table,$condition);

	}
	
	/**
	 * 
	 * This function return the admin settings details
	 */
	public function getAdminSettings(){
		$this->db->select('*');
		$this->db->where(ADMIN.'.id','1');
		$this->db->from(ADMIN_SETTINGS);
		$this->db->join(ADMIN,ADMIN.'.id = '.ADMIN_SETTINGS.'.id');
		
		$result = $this->db->get();
		unset($result->row()->admin_password);
		return $result;
	}
	
	public function selectRecordsFromTable($tableName,$paraArr){
		extract($paraArr);
		$this->db->select($selectValues);
		$this->db->from($tableName);
		
		if(!empty($whereCondition))
		{
			$this->db->where($whereCondition);
		}
		
		if(!empty($sortArray))
		{
			foreach($sortArray as $key=>$val)
			{
				$this->db->order_by($key,$val); 
			}
		}
		
		if($perpage !='')
		{
			$this->db->limit($perpage,$start);
		}		
		
		if(!empty($likeQuery))
		{
			$this->db->like($likeQuery);
		}
		$query = $this->db->get();
		
		return $result = $query->result_array();
		
	}
	
	/**
	 * 
	 * Common function for executing mysql query
	 * @param String $Query	->	Mysql Query
	 */
	public function ExecuteQuery($Query){
		return $this->db->query($Query); 
	}	
	
	/**
	 * 
	 * Category -> product count function 
	 * @param String $res	->product category colum values
	 * @param String $id	->Category id
	 */
	public function productPerCategory($res,$id){

			$option_exp="";
			
			for($i=0;$i<=count($res->num_rows);$i++){
				$option_exp .= $res[$i]['category_id'].","; 
			}
		
			$option_exploded = explode(',',$option_exp); 
			$valid_option =array_filter($option_exploded);
			$occurences = array_count_values($valid_option);
			
			if($occurences[$id] == ''){
				return '0';
			}else{
				return $occurences[$id];
			}

	}
		
	
	/**
	 * 
	 * Retrieve records using where_in
	 * @param String $table
	 * @param Array $fieldsArr
	 * @param String $searchName
	 * @param Array $searchArr
	 * @param Array $joinArr
	 * @param Array $sortArr
	 * @param Integer $limit
	 * 
	 * @return Array
	 */
	public function get_fields_from_many($table='',$fieldsArr='',$searchName='',$searchArr='',$joinArr='',$sortArr='',$limit='',$condition=''){
		if ($searchArr != '' && count($searchArr)>0 && $searchName != ''){
			$this->db->where_in($searchName, $searchArr);
		}
		if ($condition != '' && count($condition)>0){
			$this->db->where($condition);
		}
		$this->db->select($fieldsArr);
		$this->db->from($table);
		if ($joinArr != '' && is_array($joinArr)){
			foreach ($joinArr as $joinRow){
				if (is_array($joinRow)){
					$this->db->join($joinRow['table'],$joinRow['on'],$joinRow['type']);
				}
			}
		}
		if ($sortArr != '' && is_array($sortArr)){
			foreach ($sortArr as $sortRow){
				if (is_array($sortRow)){
					$this->db->order_by($sortRow['field'], $sortRow['type']);
				}
			}
		}
		if ($limit!=''){
			$this->db->limit($limit);
		}
		return $this->db->get();
	}
	
	public function get_total_records($table='',$condition=''){
		$Query = 'SELECT COUNT(*) as total FROM '.$table.' '.$condition;
		return $this->ExecuteQuery($Query);
	}
	
	public function common_email_send($eamil_vaues = array())
	{
	#echo '<pre>'; print_r($eamil_vaues);
	
			echo  'From : '.$eamil_vaues['from_mail_id'].' <'.$eamil_vaues['mail_name'].'><br/>'.
		 'To   : '.$eamil_vaues['to_mail_id'].'<br/>'.
		 'Subject : '.$eamil_vaues['subject_message'].'<br/>'.
		 'Message : '.trim(stripslashes($eamil_vaues['body_messages']));die;

		//Prevent mail for pleasureriver
		$server_ip = $this->input->ip_address();
		$mail_id = '';
		if ($demoserverChk){
			if (isset($eamil_vaues['mail_id'])){
				$mail_id = $eamil_vaues['mail_id'];
			}
		}else {
			$mail_id = 'set';
		}

		if ($mail_id != ''){
			if (is_file('./commonsettings/hoopy_smtp_settings.php'))
			{
				include('commonsettings/hoopy_smtp_settings.php');
			}


			// Set SMTP Configuration

			if($config['smtp_user'] != '' && $config['smtp_pass'] != ''){
				$emailConfig = array(
					'protocol' => 'smtp',
					'smtp_host' => $config['smtp_host'],
					'smtp_port' => $config['smtp_port'],
					'smtp_user' => $config['smtp_user'],
					'smtp_pass' => $config['smtp_pass'],
					 'auth' => true,
				);
			}

			// Set your email information
			$from = array('email' => $eamil_vaues['from_mail_id'],'name' => $eamil_vaues['mail_name']);
			$to = $eamil_vaues['to_mail_id'];
			$subject = $eamil_vaues['subject_message'];
			$message = stripslashes($eamil_vaues['body_messages']);
			// Load CodeIgniter Email library
#echo "<pre>"; echo $message; die;
			if($config['smtp_user'] != '' && $config['smtp_pass'] != ''){

				$this->load->library('email', $emailConfig);

			}else {
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
				// Additional headers
				//$headers .= 'To: '.$eamil_vaues['to_mail_id']. "\r\n";
				$headers .= 'From: '.$eamil_vaues['mail_name'].' <'.$eamil_vaues['from_mail_id'].'>' . "\r\n";
				if($eamil_vaues['cc_mail_id'] != '')
				{
					$headers .= 'Cc: '.$eamil_vaues['cc_mail_id']. "\r\n";
				}
					
				// Mail it
				mail($eamil_vaues['to_mail_id'], trim(stripslashes($eamil_vaues['subject_message'])), trim(stripslashes($eamil_vaues['body_messages'])), $headers);
				return 1;
			}

			// Sometimes you have to set the new line character for better result

			$this->email->set_newline("\r\n");
			// Set email preferences
			$this->email->set_mailtype($eamil_vaues['mail_type']);
			$this->email->from($from['email'],$from['name']);
			$this->email->to($to);
			if($eamil_vaues['cc_mail_id'] != '')
			{
				$this->email->cc($eamil_vaues['cc_mail_id']);
			}
			$this->email->subject($subject);
			$this->email->message($message);   
			// Ready to send email and check whether the email was successfully sent;
			
			
			
			if (!$this->email->send()) {
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					
				// Additional headers
				//$headers .= 'To: '.$eamil_vaues['to_mail_id']. "\r\n";
				$headers .= 'From: '.$eamil_vaues['mail_name'].' <'.$eamil_vaues['from_mail_id'].'>' . "\r\n";
				if($eamil_vaues['cc_mail_id'] != '')
				{
					$headers .= 'Cc: '.$eamil_vaues['cc_mail_id']. "\r\n";
				}
					
				// Mail it
				mail($eamil_vaues['to_mail_id'], trim(stripslashes($eamil_vaues['subject_message'])), trim(stripslashes($eamil_vaues['body_messages'])), $headers);
				return 1;

			}
			else {
				// Show success notification or other things here
				//echo 'Success to send email';

					


				return 1;
			}
		}else {
			return 1;
		}
	
	}
	//get newsletter template
	public function get_newsletter_template_details($apiId='')
		{
			$twitterQuery = "select * from ".NEWSLETTER." where id=".$apiId. " AND status='Active'";
			$twitterQueryDetails  = mysql_query($twitterQuery);
			return $twitterFetchDetails = mysql_fetch_assoc($twitterQueryDetails);
	   }

	
	//common multiple active/inactive 
	function commonActiveInactive($tableName,$fieldName,$userList,$updateValues)
	{
		return $this->doActiveInactive($tableName,$fieldName,$userList,$updateValues);
	}
	
	function doActiveInactive($tableName,$fieldName,$updateList,$updateValues)
	{
		$this->db->where_in($fieldName,$updateList);
		$this->db->update($tableName, $updateValues); 
	}

	function CommonGeneralDelete($tableName,$fieldName='',$whereCondition=array())
	{
		return $this->deleteRecords($tableName,$fieldName,$whereCondition);
	}
	
	function deleteRecords($tableName,$fieldName,$deleteList)
	{
		$this->maintain_active_inactive_delete_details($tableName,$fieldName,$deleteList,array('status'=>'delete'));
		$this->db->where_in($fieldName,$deleteList);
		$this->db->delete($tableName);
	}
	
	
	
	
}