<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Wsdl_interrogeligib_model extends CI_Model
{
   var $CI;
   var $nusoap_client;
    public function __construct()
    {
        parent::__construct();
        try
        {
            $this->nusoap_client = new nusoap_client("http://192.168.64.46/WebserviceAboweb/Service.asmx?wsdl",true); 
        }catch(Exception $e){
             throw new Exception( $this->nusoap_client->getError(), 0, $e);
        }
        
    }
    
    public function retrieveInfo($num_tel)
    {
        $soapEligib = $this->nusoap_client->serializeEnvelope('
                                    <interrogeEligibilite xmlns="msvaboweb">
                                      <_numero>'.$num_tel.'</_numero>
                                    </interrogeEligibilite>','',array(),'document', 'literal'); 
        $this->nusoap_client->operation = "msvaboweb/interrogeEligibilite";
        $result = $this->nusoap_client->send($soapEligib,'msvaboweb/interrogeEligibilite');
        return  $result;
    }
}