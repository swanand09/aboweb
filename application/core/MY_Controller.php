<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $data;
	var  $userdata;  
        var $colonneDroite = array();
        var $prenum;
        var $contenuGauche = array();
        public function __construct()
	{
            parent::__construct(); 
            $this->colonneDroite = array(
                                       "form_test_ligne"    => "",
                                       "donnee_degroupage"  => "",
                                       "offre_mediaserv"   => "",
                                       "forfait_choisi"    => "",
                                       "location_modem"    => "",
                                       "promo"             => "",
                                       "location_decodeur" => "",
                                       "Options_tv"        => ""
            );   
            $this->contenuGauche = array("contenu_html"  => "");
            $this->prenum = "";
	}  	
        //configuration de la vue principal       
        public function controller_test_eligib_vue()
        {
           $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
           $this->data["pageid"] ="page-etape-1";
           $this->data["etapes_url"][0] = "#";
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
            $this->template
                                 ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                                 ->title('title', 'Mon Offre')
                                 ->set_partial('contenu_gauche', 'mes_coord/mes_coordonnes')
                                  ->set_partial('contenu_droit', 'general/module_recap')    
                                 ->build('page',$this->data);
        }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */