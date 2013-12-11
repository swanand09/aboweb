<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paiement extends MY_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
        $this->data["userdata"] = $this->session->all_userdata();  
        return $this->controller_paiement_vue();   
    }
    
    public function generatePdf()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        $this->load->helper(array('dompdf', 'file'));
        $data["test"] = "test";
        $html = $this->load->view('layouts/pdf_page', $data, true);
        pdf_create($html, 'receipt');
        //$data_pdf = pdf_create($html, '', false);
        //write_file('assets/pdf/receipt.pdf', $data_pdf);
    }
    
    public function enregistreSouscription()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        
               
        $id_parrain =$this->session->userdata("id_parrain");
        $id_parrain = !empty($id_parrain)?$id_parrain:0;
        $dataArr = array(
                           //"id"                     => $this->session->userdata("idParcours"),
                           "con_id_parrainage"      => $id_parrain,
                           "produits_souscris"      => array(
                                                               $this->session->userdata("forfaitDummy1Crm"),
                                                               $this->session->userdata("degroupageDummy1Crm"),
                                                               $this->session->userdata("bouquetTvDummy3Crm"),
                                                               $this->session->userdata("optionTvEdenDummy3Crm"),
                                                               $this->session->userdata("optionTvBeinDummy3Crm"),
                                                               $this->session->userdata("vodPvrOneshotDummy3Crm"),
                                                               $this->session->userdata("vodPvrRecurrentDummy3Crm"),
                                                               $this->session->userdata("locationIadDummy4Crm"),
                                                               $this->session->userdata("locationDecTvDummy4Crm"),
                                                               $this->session->userdata("cautionDummy5Crm"),
                                                               $this->session->userdata("factureDummy6Crm"),
                                                               $this->session->userdata("oneshotDummy7Crm")
                           ),
                           "adresse_installation"   => array(
                                                            "civilite"      => $this->session->userdata("civilite_aa"),
                                                            "nom"           => $this->session->userdata("nom_aa"),
                                                            "prenom"        => $this->session->userdata("prenom_aa"),
                                                            "numero"        => $this->session->userdata("numero_aa"),
                                                            "complement"    => $this->session->userdata("comp_numero_aa"),
                                                            "type_voie"     => $this->session->userdata("type_voie_aa"),
                                                            "voie"          => $this->session->userdata("voie_aa"),
                                                            "voie_suite"    => $this->session->userdata("adresse_suite_aa"),
                                                            "ensemble"    => $this->session->userdata("ensemble_aa"),
                                                            "batiment"    => $this->session->userdata("batiment_aa"),
                                                            "escalier"    => $this->session->userdata("escalier_aa"),
                                                            "etage"       => $this->session->userdata("etage_aa"),
                                                            "porte"       => $this->session->userdata("porte_aa"),
                                                            "logo"        => $this->session->userdata("logo_aa"),
                                                            "code_postal" => $this->session->userdata("code_postal_aa"),
                                                            "ville"       => $this->session->userdata("ville_aa")
                                                       ),
                           "adresse_livraison"   => array(
                                                            "civilite"      => $this->session->userdata("civilite_af"),
                                                            "nom"           => $this->session->userdata("nom_af"),
                                                            "prenom"        => $this->session->userdata("prenom_af"),
                                                            "numero"        => $this->session->userdata("numero_af"),
                                                            "complement"    => $this->session->userdata("comp_numero_af"),
                                                            "type_voie"     => $this->session->userdata("type_voie_af"),
                                                            "voie"          => $this->session->userdata("voie_af"),
                                                            "voie_suite"    => $this->session->userdata("adresse_suite_af"),
                                                            "ensemble"    => $this->session->userdata("ensemble_af"),
                                                            "batiment"    => $this->session->userdata("batiment_af"),
                                                            "escalier"    => $this->session->userdata("escalier_af"),
                                                            "etage"       => $this->session->userdata("etage_af"),
                                                            "porte"       => $this->session->userdata("porte_af"),
                                                            "logo"        => $this->session->userdata("logo_af"),
                                                            "code_postal" => $this->session->userdata("code_postal_af"),
                                                            "ville"       => $this->session->userdata("ville_af")
                                                       ), 
                           "adresse_facturation"   => array(
                                                            "civilite"      => $this->session->userdata("civilite_al"),
                                                            "nom"           => $this->session->userdata("nom_al"),
                                                            "prenom"        => $this->session->userdata("prenom_al"),
                                                            "numero"        => $this->session->userdata("numero_al"),
                                                            "complement"    => $this->session->userdata("comp_numero_al"),
                                                            "type_voie"     => $this->session->userdata("type_voie_al"),
                                                            "voie"          => $this->session->userdata("voie_al"),
                                                            "voie_suite"    => $this->session->userdata("adresse_suite_al"),
                                                            "ensemble"    => $this->session->userdata("ensemble_al"),
                                                            "batiment"    => $this->session->userdata("batiment_al"),
                                                            "escalier"    => $this->session->userdata("escalier_al"),
                                                            "etage"       => $this->session->userdata("etage_al"),
                                                            "porte"       => $this->session->userdata("porte_al"),
                                                            "logo"        => $this->session->userdata("logo_al"),
                                                            "code_postal" => $this->session->userdata("code_postal_al"),
                                                            "ville"       => $this->session->userdata("ville_al")
                                                       ),
                            "email"                 => $this->session->userdata("email_mediaserv"),
                            
                            "information_contact"   => array(
                                                                "email"                 => $this->session->userdata("email"),
                                                                "telephone_mobile"      => $this->session->userdata("telephone_portable"),
                                                                "telephone_bureau"      => $this->session->userdata("telephone_bureau"),
                                                                "telephone_domicile"    => $this->session->userdata("telephone_domicile")
                                                                 
                                                             ),
                           "renonce_delai_retractation" => $this->session->userdata("livraison_express"),                                
                           "mode_paiement"          =>  array()
                    );
        if($this->input->post("mode_pay")=="rib"){
            /* 
            $this->session->set_userdata('paiement_nom',$this->input->post("nom"));
             $this->session->set_userdata('paiement_prenom',$this->input->post("prenom"));
             $this->session->set_userdata('paiement_banque',$this->input->post("banque"));
             $this->session->set_userdata('paiement_guichet',$this->input->post("guichet"));
             $this->session->set_userdata('paiement_num_compte',$this->input->post("numero_de_compte"));
             $this->session->set_userdata('paiement_cle',$this->input->post("cle"));*/
              
               array_push($dataArr["mode_paiement"],
                          array(
                              "mode_pay"         =>  "rib",
                              "titulaire"        =>  $this->input->post("nom")." ".$this->input->post("prenom"),                              
                              "code_banque"      =>  $this->input->post("banque"),
                              "code_agence"      =>  $this->input->post("guichet"),
                              "domiciliation"    =>  $this->input->post("domiciliation"),
                              "numero"           =>  $this->input->post("numero_de_compte"),
                              "clef"             =>  $this->input->post("cle")
                             )
                        );
        }
        if($this->input->post("mode_pay")=="cartebleue"){
            /*
            $this->session->set_userdata('paiement_typedecarte',$this->input->post("typedecarte"));
            $this->session->set_userdata('paiement_numerodecarte',$this->input->post("numerodecarte"));
            $this->session->set_userdata('paiement_date_expiration_mois',$this->input->post("date_expiration_mois"));
            $this->session->set_userdata('paiement_date_expiration_annee',$this->input->post("date_expiration_annee"));
            $this->session->set_userdata('paiement_cryptogramme',$this->input->post("cryptogramme"));   
              */    
            
            array_push($dataArr["mode_paiement"],
                        array(
                              "mode_pay"         =>  "cartebleue",
                              "titulaire"        =>  $this->input->post("nom")." ".$this->input->post("prenom"),                              
                              "date_expiration"  =>  $this->input->post("date_expiration_mois")." ".$this->input->post("date_expiration_annee"),
                              "numero"           =>  $this->input->post("numerodecarte"),
                              "cryptogramme"     =>  $this->input->post("cryptogramme")
                        )
                      );
        }
        
        $context = $this->session->userdata("context");
        /*
        $xmlContext = new SimpleXMLElement('<_context/>');
        $dom = new DOMDocument("1.0");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($this->arrayToXml($context, $xmlContext)->asXML());
       */
        /*$dataArr["context"] = str_replace('<?xml version="1.0"?>', "", $dom->saveXML());*/
        $dataArr["context"] = $context;
        $result = $this->Wsdl_interrogeligib->enregistreSouscription($dataArr);
        echo "<pre>";
        print_r($result);
        echo "</pre>"; 
    }
}
/* End of file paiement.php */
/* Location: ./application/controllers/paiement.php */