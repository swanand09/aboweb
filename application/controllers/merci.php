<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Merci extends MY_Controller {
	
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
        //$this->data["userdata"] = $this->session->all_userdata();  
        return $this->controller_merci_vue();   
    }
    
}
/* End of file merci.php */
/* Location: ./application/controllers/merci.php */