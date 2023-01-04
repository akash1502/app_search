<?php

class AdminActivity_model extends CI_Model {

	public function __construct() {
      parent::__construct();
  	}


	public function getAllCountry()
    {
        $this->db->select('*');
        $this->db->from('country');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getStateByCountrId($countryId)
    {
        $query = "SELECT * FROM states WHERE country_id = ?";
        $paramType = 'd';
        $paramArray = array(
            $countryId
        );
        $result = $this->db->select($query, $paramType, $paramArray);
        return $result;
    }
    
    public function getCityByStateId($stateId)
    {
        print $query = "SELECT * FROM city WHERE state_id = ?";
        $paramType = 'd';
        $paramArray = array(
            $stateId
        );
        $result = $this->db->select($query, $paramType, $paramArray);
        return $result;
    }

}
