<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $data;
	var $userdata;  
        var $colonneDroite = array();
        var $prenum;
        var $contenuGauche = array();
        var $idParcours;
        
        //modif le 4 dec 2013 on s'en sert plus d'id parcous par contre on vérifie la session context
        var $context; 
        
        var $totalParMois;
        var $iad;
        var $validPrefix   = array();
        
        //donnés dummy
//        var $dummyData1;
//        var $dummyData2;
//        var $dummyData3;
//        var $dummyData4;
//        var $dummyData5;
//        var $dummyData6;
//        var $dummyData7;
        
        //id_crm les produits souscris
        var $forfaitDummy1Crm;
        var $degroupageDummy1Crm;
        
        var $bouquetTvDummy3Crm;
        var $optionTvEdenDummy3Crm;
        var $optionTvBeinDummy3Crm;
        var $vodPvrOneshotDummy3Crm;
        var $vodPvrRecurrentDummy3Crm;
         
        var $locationIadDummy4Crm;
        var $locationDecTvDummy4Crm;
        
        var $cautionDummy5Crm;
        var $factureDummy6Crm;
        
        var $oneshotDummy7Crm;
        
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
          
            //$this->idParcours = $this->session->userdata("idParcours");
          $this->context =  $this->session->userdata("context");
          if(empty($this->context)){
             //echo "<script>alert('pas de session');</script>";
              $this->session->destroy();
             return true;
          }else{ //echo $this->context;exit;
             return  false;
          }
          
        }
        
        //s'il ya une perte de session on redirge vers la page mon offre
        public function redirectMonOffre(){
           // echo "redirect";
            redirect('mon_offre');
            exit();
        }
        
        //stripaccents
        public function stripAccents($str) {
            $str = strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
            return $str;
        }
  
        
        //configuration de la vue principal contenu droit et gauche       
        public function controller_test_eligib_vue()
        {
           $this->data['message']       = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
           $this->data["pageid"]        = "page-etape-1";
           $this->data["etapes_url"]    = array("#","#","#","#");
           $this->data["allow"]    = array("allowed","not-allowed","not-allowed","not-allowed");
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
            $this->data["etapes_url"]    = array("mon_offre","#","#","#");
            $this->data["allow"]    = array("allowed","allowed","not-allowed","not-allowed");
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
            $this->data["etapes_url"]    = array("mon_offre","mes_coordonnees","#","#");
            $this->data["allow"]    = array("allowed","allowed","allowed","not-allowed");
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
            $this->data["etapes_url"]    = array("mon_offre","mes_coordonnees","recapitulatif","#");
            $this->data["allow"]    = array("allowed","allowed","allowed","allowed");
            $this->data["colonneDroite"] = $this->colonneDroite;           
            $this->data["contenuGauche"] = $this->contenuGauche;
            $this->template
                            ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                            ->title('title', 'Paiement')
                            ->set_partial('contenu_gauche', 'paiement/paiement')
                            ->set_partial('contenu_droit', 'general/module_recap')    
                            ->build('page',$this->data);
        }
        public function controller_merci_vue()
        {
            $this->template->set_layout('merci');
            $this->data["moyen_paiement"] = $this->session->userdata("moyen_paiement");
            $this->template
                            ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                            ->title('title', 'Merci')
                            ->set_partial('contenu', 'merci/merci')                          
                            ->build('page',$this->data);
        }
        
        //get total par mois
        public function getTotal($amount){
            $this->totalParMois = $this->session->userdata('totalParMois');
            $this->totalParMois += (double)$amount;
            $this->session->set_userdata('totalParMois',$this->totalParMois);
            return $this->totalParMois;
        }
        
        //convertit un tableau en xml
        function arrayToXml(array $arr, SimpleXMLElement $xml) {
            foreach ($arr as $k => $v) {
                $attrArr = array();
                $kArray = explode(' ',$k);
                $tag = array_shift($kArray);

                if (count($kArray) > 0) {
                    foreach($kArray as $attrValue) {
                        $attrArr[] = explode('=',$attrValue);                   
                    }
                }

                if (is_array($v)) {
                    if (is_numeric($k)) {
                        $this->arrayToXml($v, $xml);
                    } else {
                        $child = $xml->addChild($tag);
                        if (isset($attrArr)) {
                            foreach($attrArr as $attrArrV) {
                                $child->addAttribute($attrArrV[0],$attrArrV[1]);
                            }
                        }                   
                        $this->arrayToXml($v, $child);
                    }
                } else {
                    $child = $xml->addChild($tag, $v);
                    if (isset($attrArr)) {
                        foreach($attrArr as $attrArrV) {
                            $child->addAttribute($attrArrV[0],$attrArrV[1]);
                        }
                    }
                }               
            }

        return $xml;
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */