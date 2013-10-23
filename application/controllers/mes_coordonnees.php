<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mes_coordonnees extends MY_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
        $this->data["userdata"] = $this->session->all_userdata();
        $ws_ville = $this->session->userdata("ws_ville");
        
        //re initialise session pour le panier partie parrainage
        $prevState = $this->session->userdata("prevState");
        $data["test"] = "test";
        /*$this->colonneDroite["parrainage"] = $this->load->view("general/parrainage",$data,true);        
        $prevState[1]["parrainage"] = $this->load->view("general/parrainage",$data,true); */       
        $this->session->set_userdata('prevState',$prevState);
        
        //configuring rules
        //$this->form_validation->set_rules('civilite', 'civilite', 'required');
        $this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[1]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('prenom', 'prenom', 'trim|required|min_length[1]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|min_length[5]|max_length[5]|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('numero', 'numero', 'required');
        $this->form_validation->set_rules('NomDeLaVoie', 'nom de la voie', 'trim|required|min_length[1]|max_length[200]|xss_clean');
        $this->form_validation->set_rules('complement', 'complement', 'required');
        $this->form_validation->set_rules('codepostal', 'codepostal', 'required');
        $this->form_validation->set_rules('ville', 'ville', 'required');
        $this->form_validation->set_rules('identique', 'identique', 'required');
        $this->form_validation->set_rules('email_mediaserv', 'email_mediaserv', 'trim|required');
        $this->form_validation->set_rules('emailAutre', 'une autre adresse', 'trim|required|valid_email');
        $this->form_validation->set_rules('TypeDeFacturation','type de facturation', 'required');
        
        //initialising form values
        
        if(!array_key_exists("nom",$this->data['userdata'])){
            $this->session->set_userdata('nom',"");
        }
        if(!array_key_exists("prenom",$this->data['userdata'])){
            $this->session->set_userdata('prenom',"");
        }
        if(!array_key_exists("mobile",$this->data['userdata'])){
            $this->session->set_userdata('mobile',"");
        }
        if(!array_key_exists("email",$this->data['userdata'])){
            $this->session->set_userdata('email',"");
        }
        if(!array_key_exists("numero",$this->data['userdata'])){
            $this->session->set_userdata('numero',"");
        }
        if(!array_key_exists("nomDeLaVoie",$this->data['userdata'])){
            $this->session->set_userdata('nomDeLaVoie',"");
        }
        if(!array_key_exists("complement",$this->data['userdata'])){
            $this->session->set_userdata('complement',"");
        }
        if(!array_key_exists("codepostal",$this->data['userdata'])){
            $this->session->set_userdata('codepostal',$ws_ville["Code_postal"]);
        }
        if(!array_key_exists("ville",$this->data['userdata'])){
           
            $this->session->set_userdata('ville',$ws_ville["Code_ville"]);
        }
        if(!array_key_exists("identique",$this->data['userdata'])){
            $this->session->set_userdata('identique',"");
        }
        if(!array_key_exists("email_mediaserv",$this->data['userdata'])){
            $this->session->set_userdata('email_mediaserv',"");
        }
        if(!array_key_exists("emailAutre",$this->data['userdata'])){
            $this->session->set_userdata('emailAutre',"");
        }
        if(!array_key_exists("typeDeFacturation",$this->data['userdata'])){
            $this->session->set_userdata('typeDeFacturation',"");
        }
        //$this->session->set_userdata('civilite',$this->input->post('civilite'));
        $this->data["nom"] = $this->session->userdata('nom');
        $this->data["prenom"] = $this->session->userdata('prenom');
        $this->data["mobile"] = $this->session->userdata('mobile');
        $this->data["email"] = $this->session->userdata('email');
        $this->data["numero"] = $this->session->userdata('numero');
        $this->data["nomDeLaVoie"] = $this->session->userdata('nomDeLaVoie');
        $this->data["complement"] = $this->session->userdata('complement');
        $this->data["codepostal"] = $this->session->userdata('codepostal');
        $this->data["ville"] = $this->session->userdata('ville');
        $this->data["identique"] = $this->session->userdata('identique');
        $this->data["email_mediaserv"] = $this->session->userdata('email_mediaserv');
        $this->data["emailAutre"] = $this->session->userdata('emailAutre');
        $this->data["typeDeFacturation"] = $this->session->userdata('typeDeFacturation');
        
        
        return $this->controller_mes_coord_vue();                
    }
    
    public function verifEmail(){
        $this->controller_verifySessExp()? redirect('mon_offre'):"";       
        $email_msv = $this->input->post("email_msv");
        $resultVerifEmail =$this->Wsdl_interrogeligib->verifEmail($email_msv);
        echo json_encode(array("msg"=>(empty($resultVerifEmail["Error"])?"Cet email est disponible":"Cet email n'est pas disponible"),"error"=>($resultVerifEmail["Disponible"]=="false"?"401":"0")));
      
    }
    
    public function verifParain(){
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
        $parrain_num_contrat = $this->input->post('parrain_num_contrat');
        $parrain_num_tel    = $this->input->post('parrain_num_tel');
        if(empty($parrain_num_contrat)||empty($parrain_num_tel)){
            echo json_encode(array("Error"=>array("ErrorMessage"=>"Veuillez saisir le numéro de contrat et le numéro de téléphone de votre parrain!")));
        }else{
            $resultVerifParain =$this->Wsdl_interrogeligib->verifParain($this->session->userdata("offreparrainage_id"),$parrain_num_contrat,$parrain_num_tel);
            //echo json_encode(array("faultstring"=>"Le serveur n'a pas pu lire la demande. ---> Il existe une erreur dans le document XML (3, 52). ---> Le format de la chaîne d'entrée est incorrect."));
           if(!empty($resultVerifParain["Error"])){
               $resultVerifParain["Error"]["ErrorMessage"] = utf8_encode($resultVerifParain["Error"]["ErrorMessage"]);
           }
            echo json_encode($resultVerifParain);
        }
    }
}
/* End of file mes_coordonnees.php */
/* Location: ./application/controllers/mes_coordonnees.php */