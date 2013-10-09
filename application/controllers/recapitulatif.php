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
        
        
        //configuring rules
        //$this->form_validation->set_rules('civilite', 'civilite', 'required');
        $this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[1]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('prenom', 'prenom', 'trim|required|min_length[1]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('numero', 'numero', 'required');
        $this->form_validation->set_rules('NomDeLaVoie', 'nom de la voie', 'trim|required|min_length[1]|max_length[200]|xss_clean');
        $this->form_validation->set_rules('complement', 'complement', 'required');
        $this->form_validation->set_rules('codepostal', 'codepostal', 'required');
        $this->form_validation->set_rules('ville', 'ville', 'required');
        $this->form_validation->set_rules('identique', 'identique', 'required');       
        $verifEmail = $this->verifEmail($this->input->post('email_mediaserv'));
        $is_unique =  '';
        if($verifEmail["error"]>0){
            $is_unique =  '|is_dispo';
            $this->form_validation->set_message('is_dispo', $verifEmail["msg"]);
        }
        $this->form_validation->set_rules('email_mediaserv', 'email_mediaserv', 'trim|required'.$is_unique);
        $this->form_validation->set_rules('emailAutre', 'une autre adresse', 'trim|required|valid_email');
        $this->form_validation->set_rules('TypeDeFacturation','type de facturation', 'required');
        
        $this->data["civilite"] = $this->input->post('civilite');
        $this->data["nom"] = $this->input->post('nom');
        $this->data["prenom"] = $this->input->post('prenom');
        $this->data["mobile"] = $this->input->post('mobile');
        $this->data["email"] = $this->input->post('email');
        $this->data["numero"] = $this->input->post('numero');
        $this->data["nomDeLaVoie"] = $this->input->post('NomDeLaVoie');
        $this->data["complement"] = $this->input->post('complement');
        $this->data["codepostal"] = $this->input->post('codepostal');
        $this->data["ville"] = $this->input->post('ville');
        $this->data["identique"] = $this->input->post('identique');
        $this->data["email_mediaserv"] = $this->input->post('email_mediaserv')."@mediaserv.net";
        $this->data["emailAutre"] = $this->input->post('emailAutre');
        $this->data["typeDeFacturation"] = $this->input->post('TypeDeFacturation'); 
        if ($this->form_validation->run() == FALSE)
        {
            return $this->controller_mes_coord_vue();
        }
        else
        {
            $this->session->set_userdata('civilite',$this->input->post('civilite'));
            $this->session->set_userdata('nom',$this->input->post('nom'));
            $this->session->set_userdata('prenom',$this->input->post('prenom'));
            $this->session->set_userdata('mobile',$this->input->post('mobile'));
            $this->session->set_userdata('email',$this->input->post('email'));
            $this->session->set_userdata('numero',$this->input->post('numero'));
            $this->session->set_userdata('nomDeLaVoie',$this->input->post('NomDeLaVoie'));
            $this->session->set_userdata('complement',$this->input->post('complement'));
            $this->session->set_userdata('codepostal',$this->input->post('codepostal'));
            $this->session->set_userdata('ville',$this->input->post('ville'));
            $this->session->set_userdata('identique',$this->input->post('identique'));
            $this->session->set_userdata('email_mediaserv',$this->input->post('email_mediaserv'));
            $this->session->set_userdata('emailAutre',$this->input->post('emailAutre'));
            $this->session->set_userdata('typeDeFacturation',$this->input->post('TypeDeFacturation'));
            
             return $this->controller_recap_vue();           
        }
             
    }
    
    public function verifEmail($email_msv=""){
        $this->controller_verifySessExp()? redirect('mon_offre'):"";       
        $resultVerifEmail =$this->Wsdl_interrogeligib->verifEmail($email_msv);
        return array("msg"=>(empty($resultVerifEmail["Error"])?"Cet email est disponible":"Cet email n'est pas disponible"),"error"=>($resultVerifEmail["Disponible"]=="false"?"401":"0"));
        
    }
    
}
/* End of file recapitulatif.php */
/* Location: ./application/controllers/recapitulatif.php */