<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *
 * This model contains all db functions related to user management
 * @author Brill Mindz
 *
 SELECT * FROM `hp_users` WHERE `user_name` = 'krishna' OR `mobile_no` = '9632871756' AND `password` = 'e10adc3949ba59abbe56e057f20f883e'
 
 
 */
class User_model extends My_Model
{
	public function __construct() 
	{
		parent::__construct();
	}
	
	/*
    * 
    * Getting Users details
    * @param String $condition
    */
   public function get_users_details($condition=''){
   		$Query = " select * from ".USERS." ".$condition;
   		return $this->ExecuteQuery($Query);
   }
  
  
//	Hoopy front end functions starts here
	public function checkUserLogin($user_name='', $password=''){
	//   $where =  "SELECT * FROM ".USERS." WHERE `user_name` = '".$user_name."' OR `mobile_no` = '".$user_name."' AND `password` = '".$password."'";
		$where =  "SELECT * FROM ".USERS." WHERE (`email` = '".$user_name."' OR `mobile_no` = '".$user_name."') AND `password` = '".$password."'";
	    return $this->ExecuteQuery($where);
	}
    public function checkDupUser($user_name='', $email=''){
         $this->db->select('*')
					->from(USERS)
					->where("user_name",$user_name)
					->or_where("email",$email);
	    $result= $this->db->get();
	    return $result;
	}
	
	
	
}