<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Geolocalisation_model extends CI_Model
{
   var $CI;
   var $ip;
   var $ipToNumber;
   var $department;
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getDepartment()
    {
        $this->ip = explode('.', $this->input->ip_address());
        //$this->ip = explode('.','46.36.199.131');
        $this->ipToNumber = $this->ip[0]*256*256*256 +  $this->ip[1]*256*256 + $this->ip[2]*256 + $this->ip[3]; 
        
        $sql = "SELECT * FROM user_geolocalisation_ip_to_country2 WHERE begin_ip_num <= ? AND end_ip_num >= ?";
        
        $query = $this->db->query($sql, array($this->ipToNumber,$this->ipToNumber)); 
        
       if($query->num_rows() > 0)
       {
           $departArr = $query->result();
           return $departArr[0]->country_name;
       }else{
           return $this->department = "Guadeloupe";
       }
    }
}