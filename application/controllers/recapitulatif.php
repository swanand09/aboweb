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

        
         //les checkbox
         $this->data['recapChk1'] = $this->session->userdata('recapChk1');
         $this->data['recapChk2'] = $this->session->userdata('recapChk2');
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