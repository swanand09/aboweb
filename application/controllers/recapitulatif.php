<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recapitulatif extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
        $this->data["userdata"] = $this->session->all_userdata();  
        $this->session->set_userdata('civilite',$this->input->post('civilite'));
        $this->session->set_userdata('nom',$this->input->post('nom'));
        $this->session->set_userdata('prenom',$this->input->post('prenom'));
        $this->session->set_userdata('mobile',$this->input->post('mobile'));
        return $this->controller_recap_vue();                
    }
    
}
/* End of file recapitulatif.php */
/* Location: ./application/controllers/recapitulatif.php */