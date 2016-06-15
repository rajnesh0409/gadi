<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *
 * This model contains all db functions related to user management
 * @author Brill Mindz
 *
 */
class Rooms_model extends My_Model
{
	public function __construct() 
	{
		parent::__construct();
	}
	
	public function insertHotelDetails($hotelDtls=''){
		
			$this->simple_insert(HOTEL_DETAILS,$hotelDtls);
	}
	
	public function get_all_usa_cities($hotelDtls=''){
		$this->db->select('city');
		$this->db->from(HOTEL_DETAILS);
		$this->db->group_by("city");
		//$this->db->order_by("state_code",'asc');
		$query = $this->db->get();
		return $query;
	}
	
	public function get_cities(){
		$this->db->select('city_name');
		$this->db->from(US_CITIES);
		$this->db->group_by("city_name");
		//$this->db->order_by("state_code",'asc');
		$query = $this->db->get();
		return $query;
	}
	
	public function getSearchValues($skey=''){
		$this->db->select('hotelId,city,stateProvinceCode,countryCode,name');
		$this->db->from(HOTEL_DETAILS);
		$this->db->group_by("city");
		$this->db->group_by("hotelId");
		$this->db->like('name', $skey);
		$this->db->or_like('city', $skey);
		$this->db->limit(20);
		//$this->db->order_by("state_code",'asc');
		$query = $this->db->get();
		
		return $query; 
	}
}