<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Refus_de_paiement extends MY_Controller {
	
    public function __construct()
    {
        parent::__construct();        
    }  
    
    public function index($type)
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
        $this->data["userdata"] = $this->session->all_userdata();  
        return $this->controller_refus_vue($type);   
    }
    
}
/* End of file refus_de_paiement.php */
/* Location: ./application/controllers/paiement.php */