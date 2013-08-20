<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mon_offre extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib');    
            $this->load->library('phpsession');
    }  
    public function index()
    {
        $this->data["department"] = $this->session->userdata("user_geolocalisation");      
        return $this->controller_test_eligib_vue($this->data["department"]);                
    }
    
    public function ajax_proc_interogeligib()
    {
       
       $num_tel       = $this->input->post('num_tel'); 
       $htmlContent = "";
       $result = $this->Wsdl_interrogeligib->retrieveInfo($num_tel);          
       $this->phpsession->save('produit',$result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"]);
       $htmlContent .= "<p>Numero: ".$result["interrogeEligibiliteResult"]["Ligne"]["Numero"]."</p>";
                   $htmlContent .= "<p>Debit emmission: ".$result["interrogeEligibiliteResult"]["Ligne"]["Debit_emmission"]."</p>";
                   $htmlContent .= "<p>Debit reception: ".$result["interrogeEligibiliteResult"]["Ligne"]["Debit_de_reception"]."</p>";                    
                   $htmlContent .= "<p>Eligibilé ADSL: ".($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]?"Oui":"Non")."</p>";
                   $htmlContent .= "<p>Eligibilé TV: ".($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]?"Oui":"Non")."</p>";
      
       echo utf8_encode(utf8_decode($htmlContent));       
    }
    
    public function forfait()
    {   
        $produit =  $this->phpsession->get("produit");
        $htmlContent ="";
        foreach($produit as $key=>$val)
        {
             $htmlContent.="<div>";
             $htmlContent.="<h3>FORFAIT N&deg;".($key+1)."</h3>";  
             $htmlContent.="<p>";
             $htmlContent .=$val["Libelle"]."&nbsp;&nbsp;";
             $htmlContent .=$val["Tarif"]."&euro;";
             $htmlContent.="</p>"; 
             $htmlContent.="</div>";        
        }
        echo utf8_encode($htmlContent);     
    } 
}

/* End of file mon_offre.php */
/* Location: ./application/controllers/mon_offre.php */
