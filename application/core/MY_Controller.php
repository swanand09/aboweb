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
        var $total1erFacture;
        var $total2emeFacture;
        
        var $prevState;     //pour gerer les pages précédentes   
        var $iad;
        var $validPrefix   = array();
        
        var $produIdCrm = array();    //id_crm les produits souscris
        var $produListVal = array();   //produits 
        var $panierVal     = array();  //panier
        
        public function __construct()
	{
            parent::__construct(); 
            $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
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
            $this->produIdCrm   =   array(
                                    "forfait"       => "",
                                    "degroupage"    => "",
                                    "portabilite"   => "",
                                    "iad"           => "",
                                    "television"    => "",
                                    "bouquetTv"     => "",
                                    "optionTv"      => array(),
                                    "facturation"   => "",
            );    
            
            $this->produListVal   = array(
                                    "forfait"       => "",
                                    "degroupage"    => "",
                                    "portabilite"   => "",
                                    "iad"           => "",
                                    "television"    => "",
                                    "bouquetTv"     => "",
                                    "optionTv"      => "",
                                    "facturation"   => "",
            );    
            
            $this->panierVal       = array(
                                    "degroupagedum1"    => array(),
                                    "portabilitedum1"   => array(),
                                    "forfaitdum1"       => array(),
                                    "promodum2"         => array(),
                                    "bouquetTvdum3"     => array(),
                                    "optionTvdum3"      => array(),
                                    "voddum3"           => array(),
                                    "locaEquipdum4"     => array(),
                                    "decodEquipdum4"    => array(),
                                    "cautiondum5"       => array(),
                                    "facturedum6"       => array(),
                                    "oneshotdum7"       => array()
            );    
            
            $this->contenuGauche = array("contenu_html"  => "");
            $this->prenum = "";
            $this->idParcours = "";
            $this->totalParMois = "";
            $this->iad = "";
            $this->validPrefix = array(
                                       "Martinique"     =>  "0596",
                                       "Guadeloupe"     =>  "0590",
                                       "Reunion"        =>  "0262",
                                       "Guyane"         =>  "0594",
                                       "Iles du Nord"   =>  "0605"
                                     );
             
	} 
        
        //mettre les valeurs en session
        public function majSession($valArr)
        {
            foreach($valArr as $key=>$val){
                switch($key){
                    case "produIdCrm":
                        $this->session->set_userdata("produIdCrm",$this->produIdCrm);
                        $this->produIdCrm =  $this->session->userdata("produIdCrm");
                    break;
                    case "panierVal":
                        $this->session->set_userdata("panierVal",$this->panierVal);
                        $this->panierVal = $this->session->userdata("panierVal");
                    break;
                }
            }
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
            $this->controller_verifySessExp()? redirect('mon_offre'):"";
            $produit =  $this->session->userdata("produit"); 
            $this->data["etape"] = $prodArr["etape"];
            $this->panierVal = $this->session->userdata("panierVal");
            foreach($produit as $key=>$val){
                foreach($prodArr["produit"] as $key2=>$val2){
                    switch($val2){
                        case "DEGROUPAGE":
                            if($val["Categorie"]=="DEGROUPAGE"){
                                $redu_facture = $this->session->userdata("redu_facture");
                                if($redu_facture=="false"){
                                   //dégroupage partiel
                                   if(utf8_encode($val["Libelle"])=="Dégroupage Partiel"){
                                      $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$val["Id_crm"]); 
                                      //MAJ PANIER
                                      $this->procDummy(array("dummyArr"=>$dummyAMaj)); 
                                      
                                      //mettre en session les id crm
                                      $this->produIdCrm["degroupage"] = $val["Id_crm"];
                                      $this->majSession(array("produIdCrm"=>$this->produIdCrm));
                                     
                                   }
                               }
                            }

                        break;
                        case "PORTABILITE":
                             if($val["Categorie"]=="PORTABILITE"){
                                $consv_num_tel = $this->session->userdata("consv_num_tel");
                                if($consv_num_tel=="true"){
                                  $this->panierVal["portabilitedum1"] = array("libelle"=>$val["Libelle"]);                                    
                                }  
                             }
                        break;
                        case "FORFAIT":
                            if($val["Categorie"]=="FORFAIT"){
                                $id_crm = $this->input->post("id_crm");
                                if($val["Id_crm"]==$id_crm){
                                                                                                           
                                    
                                     $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$id_crm); 
                                     //MAJ PANIER
                                     $this->procDummy(array("dummyArr"=>$dummyAMaj));   
                                     
                                      //mettre en session les id crm
                                      $this->produIdCrm["forfait"] = $id_crm;
                                      $this->majSession(array("produIdCrm"=>$this->produIdCrm));
                                   
                                   }
                            }
                        break;
                        case "IAD":
                            if($val["Categorie"]=="IAD"){
                                if(!empty($val["Valeurs"])){
                                   
                                    $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$this->iad["Id_crm"]);  
                                   
                                     //MAJ PANIER
                                    $this->procDummy(array("dummyArr"=>$dummyAMaj)); 
                                    
                                    //mettre en session les id crm
                                    $this->produIdCrm["iad"] = $this->iad["Id_crm"];
                                    $this->majSession(array("produIdCrm"=>$this->produIdCrm));
                                }
                            }
                        break;
                        case "TELEVISION":
                            if($val["Categorie"]=="TELEVISION"){
                                
                                $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$val["Id_crm"]); 
                                //MAJ PANIER
                                $this->procDummy(array("dummyArr"=>$dummyAMaj));
                                //mettre en session les id crm
                                $this->produIdCrm["television"] = ($this->data["etape"][1]=="check")?$val["Id_crm"]:"";
                                $this->majSession(array("produIdCrm"=>$this->produIdCrm));
                            }
                        break;  
                        case "BOUQUET_TV":
                            if($val["Categorie"]=="BOUQUET_TV"){
                                $this->bouquetChoisi =  $this->input->post("bouquetChoisi");       
                                $this->bouquetChoisi = explode("__",$this->bouquetChoisi);
                                if($val["Id_crm"]==$this->bouquetChoisi[4]){
                                    $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$this->bouquetChoisi[4]);
                                    //MAJ PANIER
                                    $this->procDummy(array("dummyArr"=>$dummyAMaj));
                                    //mettre en session les id crm
                                    $this->produIdCrm["bouquetTv"] = $this->bouquetChoisi[4];
                                    $this->majSession(array("produIdCrm"=>$this->produIdCrm));
                                }
                            }
                        break;
                        case "OPTION_TV":
                            if($val["Categorie"]=="OPTION_TV"){
                                 $this->optionTv    =  $this->input->post("optionTv");
                                 $this->optionTv = explode("__",$this->optionTv);
                                 if($val["Id_crm"]==$this->optionTv[3]){
                                      $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$this->optionTv[3]);
                                     //MAJ PANIER
                                      $this->procDummy(array("dummyArr"=>$dummyAMaj));
                                      array_push($this->produIdCrm["optionTv"],$this->optionTv[3]);
                                      $this->majSession(array("produIdCrm"=>$this->produIdCrm));
                                 }
                            }
                        break;
                        case "FACTURATION":
                        break;
                    }
                }
            }
            
             //maj promo au cas on décoche le choix tv et il faut enlever la promo du produit BOUQUET_TV
             // si surtout on n'a pas de promo dans produit TELEVISION
             $this->majPromo();
             $this->majSession(array("panierVal"=>$this->panierVal));
             $this->getTotal1er2em();            
             return $this->majVuePanier();         
        }

        //MAJ PANIER 
        public function procDummy($dataArr){            
            foreach($dataArr["dummyArr"] as $key=>$val){
                if(!empty($val)){
                    switch($key){
                        case "dummy1":                           
                            foreach($val as $key2=>$val2){
                                switch($this->data["etape"][0]){
                                    case "choixForfait":
                                        if($val2["Valeurs"]["Categorie"]=="FORFAIT"){
                                             array_push($this->panierVal["forfaitdum1"],array(
                                                                                                "libelle" =>  $val2["Valeurs"]["Libelle"]["string"],
                                                                                                "tarif"  => $val2["Valeurs"]["Tarif"]["decimal"],
                                                                                                "tvChoisi" =>  false
                                             ));
                                        }
                                         
                                        if($val2["Valeurs"]["Categorie"]=="DEGROUPAGE"){
                                            array_push($this->panierVal["degroupagedum1"],array(
                                                                                                "libelle" =>  $val2["Valeurs"]["Libelle"]["string"],
                                                                                                "tarif"  => $val2["Valeurs"]["Tarif"]["decimal"]  
                                             ));
                                        }
                                         //abonnement total par mois
                                         //produit de type recurrent                                   
                                         if($val2["Valeurs"]["Type"]=="RECURRENT"){
                                              $this->getTotal($val2["Valeurs"]["Tarif"]["decimal"]);
                                         }                                    

                                    break;
                                    case "choixTv":
                                        //ajout tv ou pas
                                        foreach($this->panierVal["forfaitdum1"] as $key3=>$val3){
                                          $this->panierVal["forfaitdum1"][$key3]["tvChoisi"] = ($this->data["etape"][1]=="check")?true:false;
                                        }        
                                        if($val2["Valeurs"]["Type"]=="RECURRENT"){
                                            $this->getTotal(($this->data["etape"][1]=="check")?$val2["Valeurs"]["Tarif"]["decimal"]:-$val2["Valeurs"]["Tarif"]["decimal"]);
                                        }
                                    break;
                                }
                            }
                           
                            //$this->data["tarifLocTvMod"] = $this->session->userdata("tarifLocTvMod");                                                     
                        break;
                        case "dummy2":  
                             switch($this->data["etape"][0]){
                                 case "choixBouquet":
                                     if(!empty($this->panierVal["bouquetTvdum3"])){
                                        foreach($this->panierVal["promodum2"] as $key2=>$val2){
                                            foreach($val2 as $key3=>$val3){
                                                if($key3==$this->panierVal["bouquetTvdum3"]["idCrm"]){
                                                   unset($this->panierVal["promodum2"][$key2]);
                                                }
                                            }
                                        }
                                    }
                                 break;
                                 case "choixOption":
                                     if(!empty($this->panierVal["optionTvdum3"])){
                                        foreach($this->panierVal["optionTvdum3"] as $key2=>$val2){
                                            foreach($val2 as $key3=>$val3){
                                                 foreach($this->panierVal["optionTvdum3"] as $key4=>$val4){
                                                      if($key3==$val4["idCrm"]&&$val4["idCrm"]==$this->optionTv[3]){
                                                         unset($this->panierVal["promodum2"][$key2]);
                                                      }
                                                 }
                                            }
                                        }
                                    }
                                 break;
                                 case "choixTv":
                                     if(!empty($this->panierVal["bouquetTvdum3"])&&$this->data["etape"][1]!="check"){
                                        foreach($this->panierVal["promodum2"] as $key2=>$val2){
                                            foreach($val2 as $key3=>$val3){
                                                if($key3==$this->panierVal["bouquetTvdum3"]["idCrm"]){
                                                   unset($this->panierVal["promodum2"][$key2]);
                                                }
                                            }
                                        }
                                    }
                                 break;   
                             }
                                
                             foreach($val as $key2=>$val2){
                                array_push($this->panierVal["promodum2"],array($val2["Id_crm"]=>utf8_encode($val2["Valeurs"]["Libelle"]["string"])));  
                             }
                        break;
                        case "dummy3":                            
                            foreach($val as $key2=>$val2){
                                switch($this->data["etape"][0]){
                                    case "choixForfait":
                                    break;
                                    case "choixTv":
                                        ($this->data["etape"][1]=="check")?
                                             array_push($this->panierVal["voddum3"],array(
                                                                $val2["Valeurs"]["Libelle"]["string"]=>array(
                                                                                                             "tarif"=>$val2["Valeurs"]["Tarif"]["decimal"],
                                                                                                             "picto"=>$val2["Valeurs"]["Picto"],
                                                                                                             "id_crm"    => $val2["Id_crm"],
                                                                                                             "id_web"    => $val2["Id_web"],
                                                                                                             "promo"=>array(
                                                                                                                             "Tarif_promo"=>$val2["Tarif_promo"],
                                                                                                                             "Duree_mois_promo"=>$val2["Duree_mois_promo"]
                                                                                                                            )
                                                                                                             )

                                                                                                          )
                                                     ):
                                              $this->panierVal["voddum3"]=array()
                                        ;                                             
                                      
                                       //abonnement total
                                        //produit de type recurrent                                         
                                        if($val2["Valeurs"]["Type"]=="RECURRENT"){
                                             $this->getTotal(($this->data["etape"][1]=="check")?$val2["Valeurs"]["Tarif"]["decimal"]:-$val2["Valeurs"]["Tarif"]["decimal"]);
                                        }     
                                    break;
                                    case "choixBouquet":                                      
                                        if(!empty($this->panierVal["bouquetTvdum3"])){                                          
                                                $this->getTotal(-$this->panierVal["bouquetTvdum3"]["Valeurs"]["Tarif"]["decimal"]);                                                                                   
                                        }                                       
                                        if($val2["Valeurs"]["Type"]=="RECURRENT"){
                                              $this->getTotal($val2["Valeurs"]["Tarif"]["decimal"]); 
                                        } 
                                             
                                        $this->panierVal["bouquetTvdum3"] = array(
                                                                                    "Valeurs"       =>  $val2["Valeurs"],
                                                                                    "idCrm"         =>  $val2["Id_crm"],              
                                                                                    "nombreChaines" =>  $this->bouquetChoisi[3]    
                                                                            );
                                    break;
                                    
                                    case "choixOption":
                                            
                                        //ajout tv ou pas                                            
                                        if($val2["Valeurs"]["Type"]=="RECURRENT"){
                                            $this->getTotal(($this->data["etape"][1]=="check")?$val2["Valeurs"]["Tarif"]["decimal"]:-$val2["Valeurs"]["Tarif"]["decimal"]);
                                        }                                        
                                        
                                        if($this->data["etape"][1]=="check"){
                                            array_push($this->panierVal["optionTvdum3"],array(
                                                                                    "Valeurs"       =>  $val2["Valeurs"],
                                                                                    "idCrm"         =>  $val2["Id_crm"]   
                                                                            )
                                                     );
                                        }else{
                                            foreach($this->panierVal["optionTvdum3"] as $key=>$val){
                                                if($val["idCrm"]==$this->optionTv[3]){
                                                    unset($this->panierVal["optionTvdum3"][$key]);
                                                }
                                            }
                                        }
                                        
                                    break;
                                }
                                 
                            }
                                                   
                        break;
                        case "dummy4": 
                            foreach($val as $key2=>$val2){
                                switch($this->data["etape"][0]){
                                    case "choixForfait":
                                        array_push($this->panierVal["locaEquipdum4"],array("Valeurs"=>$val2["Valeurs"]));                                       
                                        if($val2["Valeurs"]["Type"]=="RECURRENT"){                                            
                                             $this->getTotal($val2["Valeurs"]["Tarif"]["decimal"]);
                                        }
                                    break;
                                    case "choixTv":                                        
                                        //abonnement total
                                        //produit de type recurrent                                          
                                        if($val2["Valeurs"]["Type"]=="RECURRENT"){                                                  
                                            $this->getTotal(($this->data["etape"][1]=="check")?$val2["Valeurs"]["Tarif"]["decimal"]:-$val2["Valeurs"]["Tarif"]["decimal"]);
                                            ($this->data["etape"][1]=="check")?
                                                array_push($this->panierVal["decodEquipdum4"],array("Valeurs"=>$val2["Valeurs"])):
                                                $this->panierVal["decodEquipdum4"]=array()
                                            ;
                                        }    
                                    break;
                                }
                            }
                        break;
                        case "dummy5":                            
                            foreach($val as $key2=>$val2){
                                switch($this->data["etape"][0]){
                                      case "choixForfait":
                                           array_push($this->panierVal["cautiondum5"],array("Valeurs"=>$val2["Valeurs"]));  
                                           
                                          //produit de type recurrent                                          
                                            if($val2["Valeurs"]["Type"]=="RECURRENT"){  
                                                $this->getTotal($val2["Valeurs"]["Tarif"]["decimal"]);
                                            } 
                                           
                                      break;
                                      case "choixTv":
                                          ($this->data["etape"][1]=="check")?
                                             array_push($this->panierVal["cautiondum5"],array("Valeurs"=>$val2["Valeurs"])):
                                             $this->panierVal["cautiondum5"] = array();
                                         
                                      break;
                                }
                            }
                           
                        break;
                        case "dummy6":
                            
                        break;
                        case "dummy7":                           
                           foreach($val as $key2=>$val2){
                                switch($this->data["etape"][0]){
                                      case "choixForfait": 
                                          array_push($this->panierVal["oneshotdum7"],array("Valeurs"=>$val2["Valeurs"]));                                          
                                           //produit de type recurrent                                          
                                            if($val2["Valeurs"]["Type"]=="RECURRENT"){  
                                                $this->getTotal($val2["Valeurs"]["Tarif"]["decimal"]);
                                            }                                            
                                      break;
                                      case "choixTv": 
                                           ($this->data["etape"][1]=="check")?
                                                array_push($this->panierVal["oneshotdum7"],array("Valeurs"=>$val2["Valeurs"])):
                                                $this->panierVal["oneshotdum7"] = array();
                                          
                                           //abonnement total
                                            //produit de type recurrent                                          
                                            if($val2["Valeurs"]["Type"]=="RECURRENT"){  
                                                $this->getTotal(($this->data["etape"][1]=="check")?$val2["Valeurs"]["Tarif"]["decimal"]:-$val2["Valeurs"]["Tarif"]["decimal"]);
                                            }                                              
                                       break;
                                       case "choixBouquet": 
                                          array_push($this->panierVal["oneshotdum7"],array("Valeurs"=>$val2["Valeurs"]));                                          
                                           //produit de type recurrent                                          
                                            if($val2["Valeurs"]["Type"]=="RECURRENT"){  
                                                $this->getTotal($val2["Valeurs"]["Tarif"]["decimal"]);
                                            }                                            
                                      break;
                                      case "choixOption":                                            
                                               if($this->data["etape"][1]=="check"){
                                                    array_push($this->panierVal["oneshotdum7"],array("Valeurs"=>$val2["Valeurs"],"idCrm"=>$val2["Id_crm"]));  
                                                  //produit de type recurrent                                          
                                                    if($val2["Valeurs"]["Type"]=="RECURRENT"){  
                                                        $this->getTotal($val2["Valeurs"]["Tarif"]["decimal"]);
                                                    }
                                               }else{
                                                    foreach($this->panierVal["oneshotdum7"] as $key3=>$val3){
                                                        if($val3["idCrm"]==$val2["Id_crm"]&&$val2["Id_crm"]==$this->optionTv[3]){
                                                            unset($this->panierVal["oneshotdum7"][$key3]);
                                                           // $this->getTotal(-$val3["Valeurs"]["Tarif"]["decimal"]);
                                                        }
                                                    }
                                                }
                                      break;
                                }
                            }
                                                                        
                        break;
                    }
                }
            }
           
        }
        
        //maj vues du panier
        public function majVuePanier(){            
            $this->prevState = $this->session->userdata("prevState");  
            
            //formulair
            $this->colonneDroite["form_test_ligne"] = $this->prevState[1]["form_test_ligne"];
            
            //dummy1
            $this->colonneDroite["forfait_dummy1"]    = $this->load->view("general/forfait_dummy1",$this->data,true);        
            $this->colonneDroite["donnee_degroupage"] = $this->load->view("general/donnee_degroupage",$this->data,true);        
            //dummy2
            $this->colonneDroite["libelles_promo_dummy2"] = $this->load->view("general/libelles_promo_dummy2",$this->data,true);        
            //dummy3
            $this->colonneDroite["options_dummy3"]    = $this->load->view("general/options_dummy3",$this->data,true);        
            //dummy4
            $this->colonneDroite["location_equipements_dummy4"]    = $this->load->view("general/location_equipements_dummy4",$this->data,true);         
             //dummy5           
            $this->colonneDroite["caution_decodeur_dummy5"]    = $this->load->view("general/caution_dummy5",$this->data,true);         
             //dummy7           
            $this->colonneDroite["frais_activation_facture_dummy7"]    = $this->load->view("general/frais_oneshot_dummy7",$this->data,true);

            $this->data["totalParMois"] = $this->session->userdata("totalParMois");            
            
            $this->data["total1erFacture"] = $this->session->userdata("total1erFacture");
            $this->data["total1erFacture"] = ($this->data["total1erFacture"]!=$this->data["totalParMois"])?$this->session->userdata("total1erFacture"):$this->session->set_userdata("total1erFacture","");
            $this->data["total2emeFacture"] = ($this->data["total1erFacture"]!=$this->data["totalParMois"])?$this->session->userdata("total2emeFacture"):$this->session->set_userdata("total2emeFacture","");
            
            $this->colonneDroite["total_par_mois"]  = $this->load->view("general/total_mois",$this->data,true);  
           
            $this->session->set_userdata('prevState',array($this->prevState[0],$this->colonneDroite));  
        }
        
        public function majPromo(){
             if(!empty($this->panierVal["bouquetTvdum3"])&&isset($this->data["etape"][1])&&$this->data["etape"][1]!="check"){
                    foreach($this->panierVal["promodum2"] as $key2=>$val2){
                        foreach($val2 as $key3=>$val3){
                            if($key3==$this->panierVal["bouquetTvdum3"]["idCrm"]){
                               unset($this->panierVal["promodum2"][$key2]);
                            }
                        }
                    }
                                                        
                  $this->getTotal(-$this->panierVal["bouquetTvdum3"]["Valeurs"]["Tarif"]["decimal"]);                                                                                   
                  $this->panierVal["bouquetTvdum3"] = array();                
                }
              if(!empty($this->panierVal["optionTvdum3"])&&isset($this->data["etape"][1])&&$this->data["etape"][1]!="check"){
                    foreach($this->panierVal["promodum2"] as $key2=>$val2){
                        foreach($val2 as $key3=>$val3){
                            foreach($this->panierVal["optionTvdum3"] as $key4=>$val4){
                                if($key3==$val4["idCrm"]&&$val4["idCrm"]==$this->optionTv[3]){
                                    unset($this->panierVal["promodum2"][$key2]);
                                    $this->getTotal(-$val4["Valeurs"]["Tarif"]["decimal"]);
                                }                                 
                            }
                        }
                    }                                                                            
                 // $this->panierVal["optionTvdum3"] = array();                
                }  
        }
        
        //total abonnement 1er et 2eme facture 
        public function getTotal1er2em(){
          
            $amount = 0;
            $amount =(double)0;
            if(!empty($this->panierVal["cautiondum5"])){
                foreach($this->panierVal["cautiondum5"] as $key=>$val){
                   if($val["Valeurs"]["Type"]=="CAUTION"){
                        $amount += (double)$val["Valeurs"]["Tarif"]["decimal"][0];
                   }
                }
            }
            if(!empty($this->panierVal["oneshotdum7"])){
               foreach($this->panierVal["oneshotdum7"] as $key=>$val){
                   if($val["Valeurs"]["Type"]=="ONESHOT"){
                       if(!is_array($val["Valeurs"]["Tarif"]["decimal"])){
                           $amount += (double)($val["Valeurs"]["Tarif"]["decimal"]/2);
                       }else{
                           $amount += (double)$val["Valeurs"]["Tarif"]["decimal"][0];
                       }
                   }
               }
                  
            }
            $this->total1erFacture = $amount;
            if($this->total1erFacture>0){
                $this->totalParMois = $this->session->userdata('totalParMois');
                $this->total1erFacture += $this->totalParMois;
            }
            
            $this->total2emeFacture = $this->total1erFacture;
            $this->session->set_userdata('total1erFacture',$this->total1erFacture);
            $this->session->set_userdata('total2emeFacture',$this->total1erFacture);
        }
        //get total par mois
        public function getTotal($amount){
            $this->totalParMois = $this->session->userdata('totalParMois');
            $this->totalParMois += (double)$amount;
            $this->session->set_userdata('totalParMois',$this->totalParMois);
            //return $this->totalParMois;
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