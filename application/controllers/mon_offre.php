<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mon_offre extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
            //var $mycont = MY_Controller();
    }  
    public function index()
    {
        $this->data["department"] = $this->session->userdata("user_geolocalisation");      
        return $this->controller_test_eligib_vue($this->data["department"]);                
    }
    public function wsdl()
    {
        $this->nusoap_client = new nusoap_client("http://192.168.64.46/WebserviceAboweb/Service.asmx?wsdl");

        if($this->nusoap_client->fault)
        {
            $text = 'Error: '.$this->nusoap_client->fault;
        }
        else
        {

            if ($this->nusoap_client->getError())
            {
                $text = 'Error: '.$this->nusoap_client->getError();
            }
            else
            {
                $row = $this->nusoap_client->call('interrogeEligibilite',array('2465132165462'));
                $text = "success";
                print_r($row);
            }
        }
    }
}

/* End of file mon_offre.php */
/* Location: ./application/controllers/mon_offre.php */
