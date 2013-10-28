<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $data;
	var $userdata;  
        var $colonneDroite = array();
        var $prenum;
        var $contenuGauche = array();
        var $idParcours;
        var $totalParMois;
        var $iad;
        var $validPrefix   = array();
        public function __construct()
	{
            parent::__construct(); 
            $this->colonneDroite = array(
                                       "form_test_ligne"                    => "",
                                       "donnee_degroupage"                  => "",
                                       "forfait_dummy1"                     => "",   
                                       "libelles_promo_dummy2"              => "", 
                                       "options_dummy3"                     => "",
                                       "parrainage"                         => "",
                                       "location_equipements_dummy4"        => "",                                      
                                       "caution_decodeur_dummy5"            => "",
                                       "envoie_facture_dummy6"              => "",
                                       "frais_activation_facture_dummy7"    => "",
                                       "total_par_mois"                     => ""
                                      
            );   
            $this->contenuGauche = array("contenu_html"  => "");
            $this->prenum = "";
            $this->idParcours = "";
            $this->totalParMois = "";
            $this->iad = "";
            $this->validPrefix = array("Martinique"     =>  "0596",
                                       "Guadeloupe"     =>  "0590",
                                       "Reunion"        =>  "0262",
                                       "Guyane"         =>  "0594",
                                       "Iles du Nord"   =>  "0605"
            );
	}  	
        
        //verification expiration de la session
        public function controller_verifySessExp()
        {
          $this->idParcours = $this->session->userdata("idParcours");
          if(empty($this->idParcours)){
              $this->session->destroy();
             return true;
          }else{
             return  false;
          }
          
        }
        
        //configuration de la vue principal contenu droit et gauche       
        public function controller_test_eligib_vue()
        {
           $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
           $this->data["pageid"] ="page-etape-1";
           $this->data["etapes_url"][0] = "#";
           $this->data["etapes_url"][1] = "#";
           $this->data["etapes_url"][2] = "#";
           $this->data["etapes_url"][3] = "#";
           $this->data["colonneDroite"] = $this->colonneDroite;           
           $this->data["contenuGauche"] = $this->contenuGauche;
           $this->template
                            ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                            ->title('title', 'Mon Offre')
                            ->set_partial('contenu_gauche', 'monoffre/test_eligib')
                            ->set_partial('contenu_droit', 'general/module_recap')    
                            ->build('page',$this->data);
        }
     
        public function controller_mes_coord_vue()
        {
            $this->data["pageid"] ="page-etape-2";
            $this->data["etapes_url"][0] = "mon_offre";
            $this->data["etapes_url"][1] = "#";
            $this->data["etapes_url"][2] = "#";
            $this->data["etapes_url"][3] = "#";
            $this->data["colonneDroite"] = $this->colonneDroite;           
            $this->data["contenuGauche"] = $this->contenuGauche;
            $this->template
                            ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                            ->title('title', 'Mes coordonnés')
                            ->set_partial('contenu_gauche', 'mes_coord/mes_coordonnes')
                            ->set_partial('contenu_droit', 'general/module_recap')    
                            ->build('page',$this->data);
        }
        
        public function controller_recap_vue()
        {
            $this->data["pageid"] ="page-etape-3";
            $this->data["etapes_url"][0] = "mon_offre";     
            $this->data["etapes_url"][1] = "mes_coordonnees";
            $this->data["etapes_url"][2] = "#";
            $this->data["etapes_url"][3] = "#";
            $this->data["colonneDroite"] = $this->colonneDroite;           
            $this->data["contenuGauche"] = $this->contenuGauche;
            $this->template
                            ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                            ->title('title', 'Recapitulatif')
                            ->set_partial('contenu_gauche', 'recap/recapitulatif')
                            ->set_partial('contenu_droit', 'general/module_recap')    
                            ->build('page',$this->data);
        }
        
        public function controller_paiement_vue()
        {
            $this->data["pageid"] ="page-etape-4";
            $this->data["etapes_url"][0] = "mon_offre";     
            $this->data["etapes_url"][1] = "mes_coordonnees";
            $this->data["etapes_url"][2] = "recapitulatif";
            $this->data["etapes_url"][3] = "#";
            $this->data["colonneDroite"] = $this->colonneDroite;           
            $this->data["contenuGauche"] = $this->contenuGauche;
            $this->template
                            ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                            ->title('title', 'Paiement')
                            ->set_partial('contenu_gauche', 'paiement/paiement')
                            ->set_partial('contenu_droit', 'general/module_recap')    
                            ->build('page',$this->data);
        }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */