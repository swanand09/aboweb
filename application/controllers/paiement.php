<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paiement extends MY_Controller {
	
    public function __construct()
    {
        parent::__construct();        
    }  
    
    public function index()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
        $this->data["userdata"] = $this->session->all_userdata();  
        $etapePasse = $this->session->userdata("etapePasse");
         if($this->input->post("page_3")=="recapitulatif"&&$etapePasse>=2){
               $this->session->set_userdata("etapePasse",3); //identifier les etapes traverser
               $this->session->set_userdata('recapChk1',$this->input->post('recap'));
               $this->session->set_userdata('recapChk2',$this->input->post('mandat'));
              return $this->controller_paiement_vue();   
         }else{
              $produit =  $this->session->userdata("produit");
                if(!isset($produit)&&empty($produit)){
                     $this->session->destroy();
                     redirect('mon_offre');
                }
                switch($etapePasse){
                    case 1:
                          redirect("mes_coordonnees");
                    break;
                    case 2:
                        redirect("recapitulatif");
                    break;
                    default:
                        redirect("mon_offre");
                }
         }
        
       
    }
    
    public function generateDomPdf()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        $this->load->helper(array('dompdf', 'file'));
        $data["test"] = "test";
        $html = $this->load->view('layouts/pdf_page', $data, true);
        pdf_create($html, 'receipt');
        //$data_pdf = pdf_create($html, '', false);
        //write_file('assets/pdf/receipt.pdf', $data_pdf);
    }
    
    public function generateFpdf()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        $this->load->library('fpdf');
        define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        $this->load->library('fpdi');
        //Set all writable variables
        //$reference = "shjkpaloijanjuithsbju";
        //addresse facturation et installation
        $civilteAf  = $this->session->userdata("civilite_af");
        
       $enregistreSouscriptionResult = $this->session->userdata("enregistreSouscriptionResult");
       
        $nom        = "";
        $adresse    = "";
        $codePostal = "";
        $ville      = "";
        $pays       = $this->session->userdata("pays");
        $iban = $this->session->userdata("iban");
        $bic = $this->session->userdata("bic");
        if(isset($enregistreSouscriptionResult["ImprimerMandat"])){
            $nom        = $enregistreSouscriptionResult["ImprimerMandat"]["Nom"];
            $adresse    = $enregistreSouscriptionResult["ImprimerMandat"]["Voie1"]." ".$enregistreSouscriptionResult["ImprimerMandat"]["Voie2"];
            $codePostal = $enregistreSouscriptionResult["ImprimerMandat"]["Code_postal"];
            $ville      = $enregistreSouscriptionResult["ImprimerMandat"]["Ville"];
            $pays       = $enregistreSouscriptionResult["ImprimerMandat"]["Pays"];
            $iban       = $enregistreSouscriptionResult["ImprimerMandat"]["Iban"];
            $bic        = $enregistreSouscriptionResult["ImprimerMandat"]["Bic"];
        }
        /*
        $nom = $nom;
        $adresse = "22 Rue du Débarcadère";
        $codePostal = "97130";
        $ville = "BANANIER";
        $pays = $this->session->userdata("pays");
        $iban = "FR7619806000170001793017632";
        $bic = "NORDFRPPXXX";
        */

        // initiate FPDI
        $pdf =new FPDI();
        // add a page
        $pdf->AddPage('P','a4');
        //SetLeftMargin
        $pdf->SetMargins(0,0,0,0);
        // set the source file
        $pdf->setSourceFile("assets/fpdf/template/MANDAT-VIERGE.pdf");
        // import page 1
        $tplIdx = $pdf->importPage(1);
        // use the imported page and place it at point 10,10 with a width of 100 mm
        $pdf->useTemplate($tplIdx, 0, 0, 210);
        // now write some text above the imported page
        $pdf->SetFont('Helvetica');
        $pdf->SetFontSize(10);


        //REFERENCE
        /* $reference = str_split($reference);
        $pdf->Text(99,21.5, utf8_decode($reference[0]));
        $pdf->Text(104,21.5, utf8_decode($reference[1]));
        $pdf->Text(109,21.5, utf8_decode($reference[2]));
        $pdf->Text(114,21.5, utf8_decode($reference[3]));
        $pdf->Text(119,21.5, utf8_decode($reference[4]));
        $pdf->Text(124,21.5, utf8_decode($reference[5]));
        $pdf->Text(129,21.5, utf8_decode($reference[6]));
        $pdf->Text(134,21.5, utf8_decode($reference[7]));
        $pdf->Text(139,21.5, utf8_decode($reference[8]));
        $pdf->Text(144,21.5, utf8_decode($reference[9]));
        $pdf->Text(149,21.5, utf8_decode($reference[10]));
        $pdf->Text(154,21.5, utf8_decode($reference[11]));
        $pdf->Text(159,21.5, utf8_decode($reference[12]));
        $pdf->Text(164,21.5, utf8_decode($reference[13]));
        $pdf->Text(169,21.5, utf8_decode($reference[14]));
        $pdf->Text(175,21.5, utf8_decode($reference[15]));
        $pdf->Text(179,21.5, utf8_decode($reference[16]));
        $pdf->Text(184,21.5, utf8_decode($reference[17]));
        $pdf->Text(189,21.5, utf8_decode($reference[18]));
        $pdf->Text(194,21.5, utf8_decode($reference[19]));
        $pdf->Text(199,21.5, utf8_decode($reference[20]));*/

        //VOTRE NOM
        $pdf->SetXY(35, 62);
        $pdf->Write(0, utf8_decode($nom));

        //VOTRE ADRESSE
        $pdf->SetXY(35, 72);
        $pdf->Write(0, utf8_decode($adresse));

        //CODEPOSTAL
        $pdf->SetXY(58, 86);
        $pdf->Write(0, utf8_decode($codePostal));

        //VILLE
        $pdf->SetXY(98, 86);
        $pdf->Write(0, utf8_decode($ville));

        //PAYS
        $pdf->SetXY(98, 94);
        $pdf->Write(0, utf8_decode($pays));

        //IBAN
        $iban = str_split($iban);
        $pdf->Text(37,102.5, utf8_decode($iban[0]));
        $pdf->Text(42,102.5, utf8_decode($iban[1]));
        $pdf->Text(46.5,102.5, utf8_decode($iban[2]));
        $pdf->Text(51,102.5, utf8_decode($iban[3]));

        $pdf->Text(57,102.5, utf8_decode($iban[4]));
        $pdf->Text(61.5,102.5, utf8_decode($iban[5]));
        $pdf->Text(66,102.5, utf8_decode($iban[6]));
        $pdf->Text(70.5,102.5, utf8_decode($iban[7]));

        $pdf->Text(76.5,102.5, utf8_decode($iban[8]));
        $pdf->Text(81,102.5, utf8_decode($iban[9]));
        $pdf->Text(85.5,102.5, utf8_decode($iban[10]));
        $pdf->Text(90,102.5, utf8_decode($iban[11]));

        $pdf->Text(95.5,102.5, utf8_decode($iban[12]));
        $pdf->Text(101,102.5, utf8_decode($iban[13]));
        $pdf->Text(105,102.5, utf8_decode($iban[14]));
        $pdf->Text(110,102.5, utf8_decode($iban[15]));

        $pdf->Text(115.5,102.5, utf8_decode($iban[16]));
        $pdf->Text(120,102.5, utf8_decode($iban[17]));
        $pdf->Text(124.5,102.5, utf8_decode($iban[18]));
        $pdf->Text(129,102.5, utf8_decode($iban[19]));

        $pdf->Text(135,102.5, utf8_decode($iban[20]));
        $pdf->Text(139.5,102.5, utf8_decode($iban[21]));
        $pdf->Text(144,102.5, utf8_decode($iban[22]));
        $pdf->Text(148.3,102.5, utf8_decode($iban[23]));

        $pdf->Text(154.5,102.5, utf8_decode($iban[24]));
        $pdf->Text(159,102.5, utf8_decode($iban[25]));
        $pdf->Text(163.5,102.5, utf8_decode($iban[26]));

        /*$pdf->Text(169.5,102.5, utf8_decode($iban[26]));
        $pdf->Text(174,102.5, utf8_decode($iban[26]));
        $pdf->Text(178.5,102.5, utf8_decode($iban[26]));
        $pdf->Text(183,102.5, utf8_decode($iban[26]));
        $pdf->Text(187.5,102.5, utf8_decode($iban[26]));
        $pdf->Text(192.5,102.5, utf8_decode($iban[26]));
        $pdf->Text(197,102.5, utf8_decode($iban[26]));*/


        //BIC
        $pdf->SetXY(36, 113);
        $bic = str_split($bic);
        $pdf->Write(0, utf8_decode($bic[0]));
        $pdf->SetXY(40, 113);
        $pdf->Write(0, utf8_decode($bic[1]));
        $pdf->SetXY(45, 113);
        $pdf->Write(0, utf8_decode($bic[2]));
        $pdf->SetXY(51, 113);
        $pdf->Write(0, utf8_decode($bic[3]));
        $pdf->SetXY(55, 113);
        $pdf->Write(0, utf8_decode($bic[4]));
        $pdf->SetXY(59.5, 113);
        $pdf->Write(0, utf8_decode($bic[5]));
        $pdf->SetXY(64.5, 113);
        $pdf->Write(0, utf8_decode($bic[6]));
        $pdf->SetXY(69, 113);
        $pdf->Write(0, utf8_decode($bic[7]));
        $pdf->SetXY(73, 113);
        $pdf->Write(0, utf8_decode($bic[8]));
        $pdf->SetXY(78, 113);
        $pdf->Write(0, utf8_decode($bic[9]));
        $pdf->SetXY(82, 113);
        $pdf->Write(0, utf8_decode($bic[10]));

        $pdf->Output('MANDAT-SEPA.pdf','D');
        //$pdf->Output();
        $this->session->destroy();
      }
    
    public function enregistreSouscription()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
      
        $id_parrain =$this->session->userdata("id_parrain");
        $id_parrain = !empty($id_parrain)?$id_parrain:0;
        $idOptionCrm = $this->session->userdata("optionTvDummy3Crm");
        
        
        $dataArr = array(
                           //"id"                     => $this->session->userdata("idParcours"),
                           "con_id_parrainage"      => $id_parrain,
                          /* "produits_souscris"      => array(
                                                               $this->session->userdata("forfaitDummy1Crm"),
                                                               $this->session->userdata("portabiliteDummy1Crm"),
                                                               $this->session->userdata("degroupageDummy1Crm"),
                                                               $this->session->userdata("bouquetTvDummy3Crm"),
                                                               $this->session->userdata("vodPvrOneshotDummy3Crm"),
                                                               $this->session->userdata("vodPvrRecurrentDummy3Crm"),
                                                               $this->session->userdata("locationIadDummy4Crm"),
                                                               $this->session->userdata("locationDecTvDummy4Crm"),
                                                               $this->session->userdata("cautionDummy5Crm"),
                                                               $this->session->userdata("factureDummy6Crm"),
                                                               $this->session->userdata("oneshotDummy7Crm")
                           ),*/
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
                           "adresse_facturation"   => array(
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
               $iban = $this->input->post("iban1").$this->input->post("iban2").$this->input->post("iban3").$this->input->post("iban4").$this->input->post("iban5").$this->input->post("iban6").$this->input->post("iban7");
               $this->session->set_userdata("iban",$iban);
               //$bic  = $this->input->post("bic1").$this->input->post("bic2");
               $bic  = $this->input->post("bic");
               $this->session->set_userdata("bic",$bic);
               $dataArr["mode_paiement"][] =
                          array(
                              "mode_pay"         =>  "rib",
                              "titulaire"        =>  $this->input->post("titulaire"),                              
                              "code_banque"      =>  $this->input->post("banque"),
                              "code_agence"      =>  $this->input->post("guichet"),
                              "domiciliation"    =>  $this->input->post("domiciliation"),
                              "numero"           =>  $this->input->post("numero_de_compte"),
                              "clef"             =>  $this->input->post("cle"),
                              "iban"             =>  $iban,
                              "bic"              =>  $bic  
                             );
               if($this->input->post("adresse_identique")!=1){
                   $dataArr["mode_paiement"][] =
                           array(
                                "adresseIdentiqueAdresseFacturation" => 0,
                                "civilite"                           => $this->input->post("civilite_pa"),
                                "nom"                                => $this->input->post("nom_pa"),
                                "prenom"                             => $this->input->post("prenom_pa"),
                                "numero"                             => $this->input->post("numero_pa"),
                                "complement"                         => $this->input->post("comp_numero_pa"),
                                "type_voie"                          => $this->input->post("type_voie_pa"),
                                "voie"                               => $this->input->post("voie_pa"),
                                "voie_suite"                         => $this->input->post("adresse_suite_pa"),
                                "ensemble"                           => "",  
                                "batiment"                           => "",  
                                "escalier"                           => "",
                                "etage"                              => "",
                                "porte"                              => "",
                                "logo"                               => "",
                                "code_postal"                        => $this->input->post("code_postal_pa"),
                                "ville"                              => $this->input->post("ville_pa"),
                                "codeInsee"                          => "",
                                "fictifRivoli"                       => "",
                                "fictif_pc_batiment"                 => "",
                                "fictif_pc_escalier"                 => "",
                                "Fictif_PC_etage"                    => "",
                                "Fictif_pc_residence"                => "",
                                "Fictif_pc_numeroVoie"               => ""
                           );
               }else{
                    $dataArr["mode_paiement"][] =
                           array(
                               "adresseIdentiqueAdresseFacturation" => 1,
                                "civilite"                           => "",
                                "nom"                                => "",
                                "prenom"                             => "",
                                "numero"                             => "",
                                "complement"                         => "",
                                "type_voie"                          => "",
                                "voie"                               => "",
                                "voie_suite"                         => "",
                                "ensemble"                           => "",  
                                "batiment"                           => "",  
                                "escalier"                           => "",
                                "etage"                              => "",
                                "porte"                              => "",
                                "logo"                               => "",
                                "code_postal"                        => "",
                                "ville"                              => "",
                                "codeInsee"                          => "",
                                "fictifRivoli"                       => "",
                                "fictif_pc_batiment"                 => "",
                                "fictif_pc_escalier"                 => "",
                                "Fictif_PC_etage"                    => "",
                                "Fictif_pc_residence"                => "",
                                "Fictif_pc_numeroVoie"               => ""
                           );
               }
               $dataArr["moyen_paiement"]='PR';
               $this->session->set_userdata("moyen_paiement","PR");
        }
        if($this->input->post("mode_pay")=="cartebleue"){
                      
            $dataArr["mode_paiement"][] =
                        array(
                              "mode_pay"         =>  "cartebleue",
                              "titulaire"        =>  $this->input->post("titulaire_cb"),                              
                              "date_expiration"  =>  $this->input->post("date_expiration_mois").$this->input->post("date_expiration_annee"),
                              "numero"           =>  $this->input->post("numerodecarte"),
                              "cryptogramme"     =>  $this->input->post("cryptogramme")
                        );
            $dataArr["moyen_paiement"]='CB';
            $this->session->set_userdata("moyen_paiement","CB");
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
        if(!empty($idOptionCrm)){
            foreach($idOptionCrm as $key=>$val){
                foreach($val as $key2=>$val2){
                    array_push($dataArr["produits_souscris"],$val2);
                }
            }
        }
       
        $result = $this->Wsdl_interrogeligib->enregistreSouscription($dataArr);
        
        if(!isset($result["enregistreSouscriptionResult"]["Numero_contrat"])||empty($result["enregistreSouscriptionResult"]["Numero_contrat"])){
            log_message('error', 'pas de numéro de contrat');
            redirect('refus_de_paiement/index/fail');
        }
        
        $this->session->set_userdata("enregistreSouscriptionResult",$result["enregistreSouscriptionResult"]);
       
      // if(isset($result["enregistreSouscriptionResult"]["Erreur"])&&($result["enregistreSouscriptionResult"]["Erreur"]["NumError"]==820||$result["enregistreSouscriptionResult"]["Erreur"]["NumError"]==700||$result["enregistreSouscriptionResult"]["Erreur"]["NumError"]==701)){
        if(isset($result["enregistreSouscriptionResult"]["Erreur"])&&!empty($result["enregistreSouscriptionResult"]["Erreur"])){   
             log_message('error', 'erreur '.$result["enregistreSouscriptionResult"]["Erreur"]["NumError"]);
             log_message('error', $result["enregistreSouscriptionResult"]["Erreur"]["ErrorMessage"]);
           switch($result["enregistreSouscriptionResult"]["Erreur"]["NumError"]){
                case "700":
                    redirect('refus_de_paiement/index/cb');
                break;
                case "701":
                    redirect('refus_de_paiement/index/cb');
                break;
                case "820":
                    redirect('refus_de_paiement/index/rib');
                break;
          }
            
            redirect('refus_de_paiement/index/fail');
        }
            redirect('merci');       
      // }
    }
}
/* End of file paiement.php */
/* Location: ./application/controllers/paiement.php */