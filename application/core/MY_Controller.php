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
        var $portabiliteDummy1Crm;
        var $bouquetTvDummy3Crm;
        var $optionTvDummy3Crm;
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
             $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
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
        
        public function majPanier($prodArr)
        {
            $produit =  $this->session->userdata("produit"); 
            $promo_libelle = $this->session->userdata("promo");
            $promo_libelle = array($promo_libelle);
            $this->data["promo_libelle"] = $promo_libelle;    
            $this->data["etape"] = $prodArr["etape"];
            foreach($produit as $key=>$val){
                foreach($prodArr["produit"] as $key2=>$val2){
                    switch($val2){
                        case "DEGROUPAGE":
                            if($val["Categorie"]=="DEGROUPAGE"){
                                $redu_facture = $this->session->userdata("redu_facture");
                                if($redu_facture=="false"){
                                   //dégroupage partiel
                                   if(utf8_encode($val["Libelle"])=="Dégroupage Partiel"){
                                       $this->session->set_userdata("degroupageDummy1Crm",$val["Id_crm"]);
                                       if(!empty($val["Valeurs"])){
                                            foreach($val["Valeurs"] as $key3=>$val3){
                                                if($val3["Categorie"]=="DEGROUPAGE"){
                                                    $this->data["dum1_degroup_tarif"] = $val["Tarif"];
                                                    $this->data["dum1_degroup_libelle"] = $val3["Libelle"]["string"];   
                                                    $this->getTotal($val3["Tarif"]["decimal"]);
                                                }
                                            }
                                       }
                                   }
                               }
                            }

                        break;
                        case "PORTABILITE":
                             if($val["Categorie"]=="PORTABILITE"){
                                $consv_num_tel = $this->session->userdata("consv_num_tel");
                                if($consv_num_tel=="true"){
                                     $this->session->set_userdata("portabiliteDummy1Crm",$val["Id_crm"]);
                                     $this->data["dum1_portab_libelle"] = $val["Libelle"];   
                                }  
                             }
                        break;
                        case "FORFAIT":
                            if($val["Categorie"]=="FORFAIT"){
                                $id_crm = $this->input->post("id_crm");
                                if($val["Id_crm"]==$id_crm){
                                    //id crm forfait dummy1
                                     $this->session->set_userdata("forfaitDummy1Crm",$id_crm);
                                     
                                     
                                     $this->data["totalParMois"] = $this->getTotal((($val["Tarif_promo"]>0)?$val["Tarif_promo"]:$val["Tarif"]));
                                     $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$id_crm); 
                                     //MAJ PANIER
                                     $this->procDummy(array("dummyArr"=>$dummyAMaj));   
                                     // $promo_libelle = $this->data["promo_libelle"];
                                   }
                            }
                        break;
                        case "IAD":
                            if($val["Categorie"]=="IAD"){
                                if(!empty($val["Valeurs"])){
                                    $this->session->set_userdata("locationIadDummy4Crm",$this->iad["Id_crm"]);
                                    $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$this->iad["Id_crm"]);                                    
                                     //MAJ PANIER
                                    $this->procDummy(array("dummyArr"=>$dummyAMaj)); 
                                    //$promo_libelle = $this->data["promo_libelle"];
                                }
                            }
                        break;
                        case "TELEVISION":
                            if($val["Categorie"]=="TELEVISION"){
                                $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$val["Id_crm"]); 
                                //MAJ PANIER
                                $this->procDummy(array("dummyArr"=>$dummyAMaj));
                            }
                        break;                
                        case "OPTION_TV":
                        break;
                        case "FACTURATION":
                        break;
                    }
                }
            }
            
             //$this->data["promo_libelle"] = $promo_libelle;             
        }

        //MAJ PANIER 
        public function procDummy($dataArr){            
            foreach($dataArr["dummyArr"] as $key=>$val){
                if(!empty($val)){
                    switch($key){
                        case "dummy1":
                            switch($this->data["etape"]){
                                case "choixForfait":
                                     $this->data["donne_forfait"]    = array("Valeurs"=>$val[0]["Valeurs"]);   
                                     $this->session->set_userdata("donne_forfait",array("Valeurs"=>$val[0]["Valeurs"]));
                                break;
                                case "choixTv":
                                    $this->data["donne_forfait"]    = $this->session->userdata("donne_forfait"); 
                                    //ajout tv ou pas
                                    
                                    
                                break;
                            }
                           
                            //$this->data["tarifLocTvMod"] = $this->session->userdata("tarifLocTvMod");                                                     
                        break;
                        case "dummy2":
                            $promoArr = $this->data["promo_libelle"];
                            foreach($val as $key2=>$val2){
                                array_push($promoArr,utf8_encode($val2["Valeurs"]["Libelle"]["string"]));  
                            }
                            $this->data["promo_libelle"] = $promoArr;
                        break;
                        case "dummy3":
                            $vodPvrArr = array();
                            foreach($val as $key2=>$val2){
                                  array_push($vodPvrArr, array(
                                                                $val2["Valeurs"]["Libelle"]["string"]=>array(
                                                                                                             "tarif"=>$val2["Valeurs"]["Tarif"]["decimal"],
                                                                                                             "picto"=>$val2["Valeurs"]["Picto"],
                                                                                                             "id_crm"    => $val2["Id_crm"],
                                                                                                             "id_web"    => $val2["Id_web"],
                                                                                                             "promo"=>array(
                                                                                                                             "Tarif_promo"=>$val2["Tarif_promo"],
                                                                                                                             "Duree_mois_promo"=>$val2["Duree_mois_promo"])
                                                                                                                           )

                                                                                                          )
                                                   );
                            }
                            $this->data["vodPvr"] =  $vodPvrArr;
                                                   
                        break;
                        case "dummy4":     
                            foreach($val as $key2=>$val2){
                                switch($this->data["etape"]){
                                    case "choixForfait":
                                        $this->data["location_equipement"]    = array("Valeurs"=>$val2["Valeurs"]);
                                    break;
                                    case "choixtv":
                                        $this->data["location_equipement"]    = $this->session->userdata("location_equipement");
                                        $this->data["tarif_loca_decod"] = ($val2["Valeurs"]["Categorie"]=="STB")?"dummy4_".$val2["Valeurs"]["Tarif"]["decimal"]:"dummy4_0";                                
                                        $this->data["tarif_activ_servicetv"] = "dummy7_";
                                    break;
                                }
                            }
                        break;
                        case "dummy5":
                            $this->data["caution_dummy5"] = $val[0]["Valeurs"];
                        break;
                        case "dummy6":
                        break;
                        case "dummy7":
                           $this->data["oneshot_dummy7"] = $val[0]["Valeurs"];                                                     
                        break;
                    }
                }
            }
           
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