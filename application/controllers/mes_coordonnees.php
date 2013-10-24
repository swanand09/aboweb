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
        $wsVille = $this->session->userdata("ws_ville");
        $codePostal = "";
        $codeVille  = "";
        foreach($wsVille as $key=>$val){
            if(is_array($val)){
                $codePostal = $val["Code_postal"];
                $codeVille  = $val["Code_ville"];
                break;
            }else{
                $codePostal = $wsVille["Code_postal"];
                $codeVille  = $wsVille["Code_ville"];
            }
        }
        
        //re initialise session pour le panier partie parrainage
        $prevState = $this->session->userdata("prevState");
        $data["test"] = "test";
        /*$this->colonneDroite["parrainage"] = $this->load->view("general/parrainage",$data,true);        
        $prevState[1]["parrainage"] = $this->load->view("general/parrainage",$data,true); */       
        $this->session->set_userdata('prevState',$prevState);
        /*
        //configuring rules
        $this->form_validation->set_rules('civilite_aa', 'civilite des adresses abonnement', 'required');
        $this->form_validation->set_rules('nom_aa', 'nom des adresses abonnement', 'trim|required|min_length[1]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('prenom_aa', 'prenom des adresses abonnement', 'trim|required|min_length[1]|max_length[30]|xss_clean');
//        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|min_length[5]|max_length[5]|xss_clean');
//        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('numero_aa', 'numero des adresses abonnement', 'required');
        $this->form_validation->set_rules('code_postal_aa', 'codepostal des adresses abonnement', 'required');        
        $this->form_validation->set_rules('voie_aa', 'voie des adresses abonnement', 'required');
        
        $this->form_validation->set_rules('NomDeLaVoie', 'nom de la voie', 'trim|required|min_length[1]|max_length[200]|xss_clean');
        $this->form_validation->set_rules('complement', 'complement', 'required');
        $this->form_validation->set_rules('codepostal', 'codepostal', 'required');
        $this->form_validation->set_rules('ville', 'ville', 'required');
        $this->form_validation->set_rules('identique', 'identique', 'required');
        $this->form_validation->set_rules('email_mediaserv', 'email_mediaserv', 'trim|required');
        $this->form_validation->set_rules('emailAutre', 'une autre adresse', 'trim|required|valid_email');
        $this->form_validation->set_rules('TypeDeFacturation','type de facturation', 'required');
        */
        
        //initialising form values
        if(!array_key_exists("civilite_aa",$this->data['userdata'])){
            $this->session->set_userdata('civilite_aa',"");
        }
        if(!array_key_exists("nom_aa",$this->data['userdata'])){
            $this->session->set_userdata('nom_aa',"");
        }
        if(!array_key_exists("prenom_aa",$this->data['userdata'])){
            $this->session->set_userdata('prenom_aa',"");
        }
        if(!array_key_exists("numero_aa",$this->data['userdata'])){
            $this->session->set_userdata('numero_aa',"");
        }
        if(!array_key_exists("comp_numero_aa",$this->data['userdata'])){
            $this->session->set_userdata('comp_numero_aa',"");
        }             
        if(!array_key_exists("type_voie_aa",$this->data['userdata'])){
            $this->session->set_userdata('type_voie_aa',"");
        }
        if(!array_key_exists("voie_aa",$this->data['userdata'])){
            $this->session->set_userdata('voie_aa',"");
        }
        if(!array_key_exists("adresse_suite_aa",$this->data['userdata'])){
            $this->session->set_userdata('adresse_suite_aa',"");
        }
        if(!array_key_exists("ensemble_aa",$this->data['userdata'])){
            $this->session->set_userdata('ensemble_aa',"");
        }                
        if(!array_key_exists("batiment_aa",$this->data['userdata'])){
            $this->session->set_userdata('civilite_aa',"");
        }
        if(!array_key_exists("escalier_aa",$this->data['userdata'])){
            $this->session->set_userdata('nom_aa',"");
        }
        if(!array_key_exists("etage_aa",$this->data['userdata'])){
            $this->session->set_userdata('prenom_aa',"");
        }
        if(!array_key_exists("porte_aa",$this->data['userdata'])){
            $this->session->set_userdata('numero_aa',"");
        }
        if(!array_key_exists("comp_numero_aa",$this->data['userdata'])){
            $this->session->set_userdata('comp_numero_aa',"");
        }
        if(!array_key_exists("code_postal_aa",$this->data['userdata'])){
            $this->session->set_userdata('code_postal_aa',$codePostal);
        }        
        if(!array_key_exists("ville_aa",$this->data['userdata'])){
            $this->session->set_userdata('ville_aa',$codeVille);
        }
        if(!array_key_exists("telephone_portable",$this->data['userdata'])){
            $this->session->set_userdata('telephone_portable',"");
        }
        if(!array_key_exists("telephone_bureau",$this->data['userdata'])){
            $this->session->set_userdata('telephone_bureau',"");
        }
        if(!array_key_exists("telephone_domicile",$this->data['userdata'])){
            $this->session->set_userdata('telephone_domicile',"");
        }
        if(!array_key_exists("check_adresse_facturation",$this->data['userdata'])){
            $this->session->set_userdata('check_adresse_facturation',"");
        }
        if(!array_key_exists("check_adresse_livraison",$this->data['userdata'])){
            $this->session->set_userdata('check_adresse_livraison',"");
        }
        if(!array_key_exists("email_mediaserv",$this->data['userdata'])){
            $this->session->set_userdata('email_mediaserv',"");
        }
        if(!array_key_exists("email",$this->data['userdata'])){
            $this->session->set_userdata('email',"");
        }
        if(!array_key_exists("type_de_facturation",$this->data['userdata'])){
            $this->session->set_userdata('type_de_facturation',"");
        }
        
        
        
        $this->data["civilite_aa"] = $this->session->userdata('civilite_aa');
        $this->data["nom_aa"] = $this->session->userdata('nom_aa');
        $this->data["prenom_aa"] = $this->session->userdata('prenom_aa');
        $this->data["numero_aa"] = $this->session->userdata('numero_aa');
        $this->data["comp_numero_aa"] = $this->session->userdata('comp_numero_aa');
        $this->data["type_voie_aa"] = $this->session->userdata('type_voie_aa');
        $this->data["voie_aa"] = $this->session->userdata('voie_aa');
        $this->data["adresse_suite_aa"] = $this->session->userdata('adresse_suite_aa');
        $this->data["ensemble_aa"] = $this->session->userdata('ensemble_aa');
        $this->data["batiment_aa"] = $this->session->userdata('batiment_aa');
        $this->data["escalier_aa"] = $this->session->userdata('escalier_aa');
        $this->data["etage_aa"] = $this->session->userdata('etage_aa');
        $this->data["porte_aa"] = $this->session->userdata('porte_aa');
        $this->data["comp_numero_aa"] = $this->session->userdata('comp_numero_aa');
        
        $this->data["code_postal_aa"] = $this->session->userdata('code_postal_aa');
        $this->data["ville_aa"] = $this->session->userdata('ville_aa');
        $this->data["telephone_portable"] = $this->session->userdata('telephone_portable');
        $this->data["telephone_bureau"] = $this->session->userdata('telephone_bureau');
        $this->data["telephone_domicile"] = $this->session->userdata('telephone_domicile');
        $this->data["check_adresse_facturation"] = $this->session->userdata('check_adresse_facturation');
        $this->data["check_adresse_livraison"] = $this->session->userdata('check_adresse_livraison');
        $this->data["email_mediaserv"] = $this->session->userdata('email_mediaserv');
        $this->data["email"] = $this->session->userdata('email');
        $this->data["type_de_facturation"] = $this->session->userdata('type_de_facturation');
       
        
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