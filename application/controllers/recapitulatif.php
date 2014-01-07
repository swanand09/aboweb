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
        
        /*
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
        */
        
        

        


      /*  
      if ($this->form_validation->run() == FALSE)
        {
            return $this->controller_mes_coord_vue();
        }
        else
        {*/
            if($this->input->post("page_3")=="mes_coordonnes"){
                $this->session->set_userdata('civilite_aa',$this->input->post("civilite_aa"));
                $this->session->set_userdata('nom_aa',$this->input->post("nom_aa"));
                $this->session->set_userdata('prenom_aa',$this->input->post("prenom_aa"));
                $this->session->set_userdata('numero_aa',$this->input->post("numero_aa"));
                $this->session->set_userdata('comp_numero_aa',$this->input->post("comp_numero_aa"));
                $this->session->set_userdata('type_voie_aa',$this->input->post("type_voie_aa"));
                $this->session->set_userdata('voie_aa',$this->input->post("voie_aa"));
                $this->session->set_userdata('adresse_suite_aa',$this->input->post("adresse_suite_aa"));
                $this->session->set_userdata('ensemble_aa',$this->input->post("ensemble_aa"));
                $this->session->set_userdata('batiment_aa',$this->input->post("batiment_aa"));
                $this->session->set_userdata('escalier_aa',$this->input->post("escalier_aa"));
                $this->session->set_userdata('etage_aa',$this->input->post("etage_aa"));
                $this->session->set_userdata('porte_aa',$this->input->post("porte_aa"));
                $this->session->set_userdata('logo_aa',$this->input->post("logo_aa"));
                $this->session->set_userdata('code_postal_aa',$this->input->post("code_postal_aa"));
                $this->session->set_userdata('ville_aa',$this->input->post("ville_aa"));
                $this->session->set_userdata('telephone_portable',$this->input->post("telephone_portable"));
                $this->session->set_userdata('telephone_bureau',$this->input->post("telephone_bureau"));
                $this->session->set_userdata('telephone_domicile',$this->input->post("telephone_domicile"));
                $this->session->set_userdata('check_adresse_facturation',$this->input->post("check_adresse_facturation"));
                $this->session->set_userdata('civilite_af',$this->input->post("civilite_af"));
                $this->session->set_userdata('nom_af',$this->input->post("nom_af"));
                $this->session->set_userdata('prenom_af',$this->input->post("prenom_af"));
                $this->session->set_userdata('numero_af',$this->input->post("numero_af"));
                $this->session->set_userdata('comp_numero_af',$this->input->post("comp_numero_af"));
                $this->session->set_userdata('type_voie_af',$this->input->post("type_voie_af"));
                $this->session->set_userdata('voie_af',$this->input->post("voie_af"));
                $this->session->set_userdata('adresse_suite_af',$this->input->post("adresse_suite_af"));
                $this->session->set_userdata('code_postal_af',$this->input->post("code_postal_af"));
                $this->session->set_userdata('ville_af',$this->input->post("ville_af"));
                $this->session->set_userdata('check_adresse_livraison',$this->input->post("check_adresse_livraison"));
                $this->session->set_userdata('civilite_al',$this->input->post("civilite_al"));
                $this->session->set_userdata('nom_al',$this->input->post("nom_al"));
                $this->session->set_userdata('prenom_al',$this->input->post("prenom_al"));
                $this->session->set_userdata('numero_al',$this->input->post("numero_al"));
                $this->session->set_userdata('comp_numero_al',$this->input->post("comp_numero_al"));
                $this->session->set_userdata('type_voie_al',$this->input->post("type_voie_al"));
                $this->session->set_userdata('voie_al',$this->input->post("voie_al"));
                $this->session->set_userdata('adresse_suite_al',$this->input->post("adresse_suite_al"));
                $this->session->set_userdata('ensemble_al',$this->input->post("ensemble_al"));
                $this->session->set_userdata('batiment_al',$this->input->post("batiment_al"));
                $this->session->set_userdata('escalier_al',$this->input->post("escalier_al"));
                $this->session->set_userdata('etage_al',$this->input->post("etage_al"));
                $this->session->set_userdata('porte_al',$this->input->post("porte_al"));
                $this->session->set_userdata('logo_al',$this->input->post("logo_al"));
                $this->session->set_userdata('code_postal_al',$this->input->post("code_postal_al"));
                $this->session->set_userdata('ville_al',$this->input->post("ville_al"));
                $livraison_express = $this->input->post("livraison_express");
                $livraison_express = !empty($livraison_express)?$this->input->post("livraison_express"):"false";
                $this->session->set_userdata('livraison_express',$livraison_express);
                $this->session->set_userdata('email_mediaserv',$this->input->post("email_mediaserv"));
                $this->session->set_userdata('verif_email',$this->input->post("verif_email"));
                $this->session->set_userdata('email',$this->input->post("email"));
                $this->session->set_userdata('type_de_facturation',$this->input->post("type_facturation_hid"));
              
            }
           //display values
            
            $this->data['civilite_aa']                  = $this->session->userdata("civilite_aa");
            $this->data['nom_aa']                       = $this->session->userdata("nom_aa");
            $this->data['prenom_aa']                    = $this->session->userdata("prenom_aa");
            $this->data['numero_aa']                    = $this->session->userdata("numero_aa");
            $this->data['comp_numero_aa']               = $this->session->userdata("comp_numero_aa");
            $this->data['type_voie_aa']                 = $this->session->userdata("type_voie_aa");
            $this->data['voie_aa']                      = $this->session->userdata("voie_aa");
            $this->data['adresse_suite_aa']             = $this->session->userdata("adresse_suite_aa");
            $this->data['ensemble_aa']                  = $this->session->userdata("ensemble_aa");
            $this->data['batiment_aa']                  = $this->session->userdata("batiment_aa");
            $this->data['escalier_aa']                  = $this->session->userdata("escalier_aa");
            $this->data['etage_aa']                     = $this->session->userdata("etage_aa");
            $this->data['porte_aa']                     = $this->session->userdata("porte_aa");
            $this->data['logo_aa']                      = $this->session->userdata("logo_aa");
            $this->data['code_postal_aa']               = $this->session->userdata("code_postal_aa");
            $this->data['ville_aa']                     = $this->session->userdata("ville_aa");
            $this->data['telephone_portable']           = $this->session->userdata("telephone_portable");
            $this->data['telephone_bureau']             = $this->session->userdata("telephone_bureau");
            $this->data['telephone_domicile']           = $this->session->userdata("telephone_domicile");
            $this->data['check_adresse_facturation']    = $this->session->userdata("check_adresse_facturation");
            $this->data['civilite_af']                  = $this->session->userdata("civilite_af");
            $this->data['nom_af']                       = $this->session->userdata("nom_af");
            $this->data['prenom_af']                    = $this->session->userdata("prenom_af");
            $this->data['numero_af']                    = $this->session->userdata("numero_af");
            $this->data['comp_numero_af']               = $this->session->userdata("comp_numero_af");
            $this->data['type_voie_af']                 = $this->session->userdata("type_voie_af");
            $this->data['voie_af']                      = $this->session->userdata("voie_af");
            $this->data['adresse_suite_af']             = $this->session->userdata("adresse_suite_af");
            $this->data['code_postal_af']               = $this->session->userdata("code_postal_af");
            $this->data['ville_af']                     = $this->session->userdata("ville_af");
            $this->data['check_adresse_livraison']      = $this->session->userdata("check_adresse_livraison");
            $this->data['civilite_al']                  = $this->session->userdata("civilite_al");
            $this->data['nom_al']                       = $this->session->userdata("nom_al");
            $this->data['prenom_al']                    = $this->session->userdata("prenom_al");
            $this->data['numero_al']                    = $this->session->userdata("numero_al");
            $this->data['comp_numero_al']               = $this->session->userdata("comp_numero_al");
            $this->data['type_voie_al']                 = $this->session->userdata("type_voie_al");
            $this->data['voie_al']                      = $this->session->userdata("voie_al");
            $this->data['adresse_suite_al']             = $this->session->userdata("adresse_suite_al");
            $this->data['ensemble_al']                  = $this->session->userdata("ensemble_al");
            $this->data['batiment_al']                  = $this->session->userdata("batiment_al");
            $this->data['escalier_al']                  = $this->session->userdata("escalier_al");
            $this->data['etage_al']                     = $this->session->userdata("etage_al");
            $this->data['porte_al']                     = $this->session->userdata("porte_al");
            $this->data['logo_al']                      = $this->session->userdata("logo_al");
            $this->data['code_postal_al']               = $this->session->userdata("code_postal_al");
            $this->data['ville_al']                     = $this->session->userdata("ville_al");
            $this->data['livraison_express']            = $this->session->userdata("livraison_express");
            $this->data['email_mediaserv']              = $this->session->userdata("email_mediaserv");
            $this->data['verif_email']                  = $this->session->userdata("verif_email");
            $this->data['email']                        = $this->session->userdata("email");
            $this->data['type_de_facturation']          = explode("_",$this->session->userdata("type_de_facturation"));   
            
            return $this->controller_recap_vue();       
    }
    
    public function verifEmail($email_msv=""){
        $this->controller_verifySessExp()? redirect('mon_offre'):"";       
        $resultVerifEmail =$this->Wsdl_interrogeligib->verifEmail($email_msv);
        return array("msg"=>(empty($resultVerifEmail["Error"])?"Cet email est disponible":"Cet email n'est pas disponible"),"error"=>($resultVerifEmail["Disponible"]=="false"?"401":"0"));
        
    }
    
}
/* End of file recapitulatif.php */
/* Location: ./application/controllers/recapitulatif.php */