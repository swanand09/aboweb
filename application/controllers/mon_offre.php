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
    
    public function ajax_proc_interogeligib()
    {
       $num_tel       = $this->input->post('num_tel');  
       if($num_tel!="")
       {
           $this->nusoap_client = new nusoap_client("http://192.168.64.46/WebserviceAboweb/Service.asmx?wsdl",true);           
           $htmlContent = "test eligibilité en cours";
           if($this->nusoap_client->fault)
           {
               $htmlContent = 'Error: '.$this->nusoap_client->fault;
           } else
           {
                if ($this->nusoap_client->getError())
                {
                    $htmlContent = 'Error: '.$this->nusoap_client->getError();
                }
                else
                {
                    $soapEligib = $this->nusoap_client->serializeEnvelope('
                                    <interrogeEligibilite xmlns="msvaboweb">
                                      <_numero>'.$num_tel.'</_numero>
                                    </interrogeEligibilite>','',array(),'document', 'literal'); 
                    $this->nusoap_client->operation = "msvaboweb/interrogeEligibilite";
                    $result = $this->nusoap_client->send($soapEligib,'msvaboweb/interrogeEligibilite');
                  $htmlContent ="";
//                    foreach($result["interrogeEligibiliteResult"]["Ligne"] as $key=>$val)
//                    {
//                        if($val!=true || $val!=false)
//                        $htmlContent.=$val."<br>";
//                    }
                    $htmlContent .= "<p>Numero: ".$result["interrogeEligibiliteResult"]["Ligne"]["Numero"]."</p>";
                    $htmlContent .= "<p>Debit emmission: ".$result["interrogeEligibiliteResult"]["Ligne"]["Debit_emmission"]."</p>";
                    $htmlContent .= "<p>Debit reception: ".$result["interrogeEligibiliteResult"]["Ligne"]["Debit_de_reception"]."</p>";                    
                    $htmlContent .= "<p>Eligibilé ADSL: ".($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]?"Oui":"Non")."</p>";
                    $htmlContent .= "<p>Eligibilé TV: ".($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]?"Oui":"Non")."</p>";
                }
           }           
           
       }else
       {
            $htmlContent = "<p>Veuillez ajouter votre numero de tel</p>";
       }
       echo utf8_encode(utf8_decode($htmlContent));
    }
    
    public function wsdl()
    {
        $this->nusoap_client = new nusoap_client("http://192.168.64.46/WebserviceAboweb/Service.asmx?wsdl",true);
               
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
                $soapEligib = $this->nusoap_client->serializeEnvelope('
                                <interrogeEligibilite xmlns="msvaboweb">
				  <_numero>0590998670</_numero>
				</interrogeEligibilite>','',array(),'document', 'literal'); 
                $result = $this->nusoap_client->send($soapEligib,'msvaboweb/interrogeEligibilite');
                echo "<pre>";
                print_r($result);
                echo "</pre>";    
            }
        }
        
    }
}

/* End of file mon_offre.php */
/* Location: ./application/controllers/mon_offre.php */
