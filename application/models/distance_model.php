<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *
 * This model contains all db functions related to user management
 * @author Brill Mindz
 *
 */
class Distance_model extends My_Model
{
	public function __construct() 
	{
		parent::__construct();
	}
	
   /*public function get_users_details($condition=''){
   		$Query = " select * from ".USERS." ".$condition;
   		return $this->ExecuteQuery($Query);
   }*/ 

}