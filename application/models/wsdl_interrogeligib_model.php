<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Wsdl_interrogeligib_model extends CI_Model
{
   var $CI;
   var $nusoap_client;
 
    public function __construct()
    {
        parent::__construct();
        try
        {
            //$this->nusoap_client = new nusoap_client("http://192.168.64.46/WebserviceAboweb/Service.asmx?wsdl",true,false,false,false,false,300); 
            $this->nusoap_client = new nusoap_client("http://192.168.64.58/WebserviceAboweb/Service.asmx?wsdl",true,false,false,false,false,300); 
            $this->nusoap_client->soap_defencoding = 'UTF-8';
            $this->nusoap_client->decode_utf8      = false;
           
        }catch(Exception $e){
             throw new Exception( $this->nusoap_client->getError(), 0, $e);
        }
        
    }
    
    public function interrogeEligibilite($num_tel)
    {
        $soapEligib = $this->nusoap_client->serializeEnvelope('
                                    <interrogeEligibilite xmlns="msvaboweb">
                                      <_numero>'.$num_tel.'</_numero>
                                    </interrogeEligibilite>','',array(),'document', 'literal'); 
        $this->nusoap_client->operation = "msvaboweb/interrogeEligibilite";
        $result = $this->nusoap_client->send($soapEligib,$this->nusoap_client->operation);
        return  $result;
    }
    
    public function recupereOffre($context)
    {
        $soapEligib = $this->nusoap_client->serializeEnvelope('
                                    <recupere_offre xmlns="msvaboweb">
                                      <_context>'.$context.'</_context>
                                    </recupere_offre>','',array(),'document', 'literal'); 
        $this->nusoap_client->operation = "msvaboweb/recupere_offre";
        $result = $this->nusoap_client->send($soapEligib,$this->nusoap_client->operation);
        return  $result;
    }
    
    
    public function recupDummyParId($produit,$id_crm)
    {
        $arrDum1 = $arrDum2 = $arrDum3 = $arrDum4 = $arrDum5 = $arrDum6 = $arrDum7 = $arrDum8 = array();
        foreach($produit as $val1){
            if($val1["Id_crm"]==$id_crm){
            if(!empty($val1["Valeurs"]["WS_Produit_Valeur"])){
             foreach($val1["Valeurs"]["WS_Produit_Valeur"] as $key1=>$val2){
                 if(is_array($val2)){
                     foreach($val2 as $key2=>$val3){
                      if($key2=="Dummy"){
                          switch($val3){
                              case 1:
                                  array_push($arrDum1, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 2:
                                  array_push($arrDum2, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"],"Categorie"=>$val1["Categorie"]));
                              break;
                              case 3:
                                  array_push($arrDum3, array("Valeurs"=>$val2,"Tarif_promo"=>$val1["Tarif_promo"],"Duree_mois_promo"=>$val1["Duree_mois_promo"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 4:
                                  array_push($arrDum4, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 5:
                                  array_push($arrDum5, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 6:
                                  array_push($arrDum6, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 7:
                                  array_push($arrDum7, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                          }
                      }
                     }
                 }else{
                     if($key1=="Dummy"){
                          switch($val2){
                              case 1:
                                  array_push($arrDum1, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 2:
                                  array_push($arrDum2, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"],"Categorie"=>$val1["Categorie"]));
                              break;
                              case 3:
                                  array_push($arrDum3, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Tarif_promo"=>$val1["Tarif_promo"],"Duree_mois_promo"=>$val1["Duree_mois_promo"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 4:
                                  array_push($arrDum4, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 5:
                                  array_push($arrDum5, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 6:
                                  array_push($arrDum6, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 7:
                                  array_push($arrDum7, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                          }
                      }

                 }
             }
            }
            }
      }  
      return array("dummy1"=>$arrDum1,"dummy2"=>$arrDum2,"dummy3"=>$arrDum3,"dummy4"=>$arrDum4,"dummy5"=>$arrDum5,"dummy6"=>$arrDum6,"dummy7"=>$arrDum7);
  }
    
    public function recupDummyPanier($produit)
    {
        $arrDum1 = $arrDum2 = $arrDum3 = $arrDum4 = $arrDum5 = $arrDum6 = $arrDum7 = $arrDum8 = array();
        foreach($produit as $val1){
            if(!empty($val1["Valeurs"]["WS_Produit_Valeur"])){
             foreach($val1["Valeurs"]["WS_Produit_Valeur"] as $key1=>$val2){
                 if(is_array($val2)){
                     foreach($val2 as $key2=>$val3){
                      if($key2=="Dummy"){
                          switch($val3){
                              case 1:
                                  array_push($arrDum1, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 2:
                                  array_push($arrDum2, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"],"Categorie"=>$val1["Categorie"]));
                              break;
                              case 3:
                                  array_push($arrDum3, array("Valeurs"=>$val2,"Tarif_promo"=>$val1["Tarif_promo"],"Duree_mois_promo"=>$val1["Duree_mois_promo"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 4:
                                  array_push($arrDum4, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 5:
                                  array_push($arrDum5, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 6:
                                  array_push($arrDum6, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 7:
                                  array_push($arrDum7, array("Valeurs"=>$val2,"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                          }
                      }
                     }
                 }else{
                     if($key1=="Dummy"){
                          switch($val2){
                              case 1:
                                  array_push($arrDum1, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 2:
                                  array_push($arrDum2, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"],"Categorie"=>$val1["Categorie"]));
                              break;
                              case 3:
                                  array_push($arrDum3, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Tarif_promo"=>$val1["Tarif_promo"],"Duree_mois_promo"=>$val1["Duree_mois_promo"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 4:
                                  array_push($arrDum4, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 5:
                                  array_push($arrDum5, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 6:
                                  array_push($arrDum6, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                              case 7:
                                  array_push($arrDum7, array("Valeurs"=>$val1["Valeurs"]["WS_Produit_Valeur"],"Id_crm"=>$val1["Id_crm"],"Id_web"=>$val1["Id_web"]));
                              break;
                          }
                      }

                 }
             }
            }
      }  
      return array("dummy1"=>$arrDum1,"dummy2"=>$arrDum2,"dummy3"=>$arrDum3,"dummy4"=>$arrDum4,"dummy5"=>$arrDum5,"dummy6"=>$arrDum6,"dummy7"=>$arrDum7);
  }
    
   public function enregistreSouscription($dataArr)
   {        
     
    
      $mode_paiment = "";
       if(isset($dataArr["mode_paiement"][0]["mode_pay"])){
          
        switch($dataArr["mode_paiement"][0]["mode_pay"]){
            case "rib":
                       $mode_paiment .="
                                        <_cartebleue>
                                             <Numero></Numero>
                                             <Date_expiration></Date_expiration>
                                             <Cryptogramme></Cryptogramme>
                                             <Titulaire></Titulaire>
                                          </_cartebleue>
                                          <_rib>
                                            <Numero></Numero>
                                            <Clef></Clef>
                                            <Code_agence></Code_agence>
                                            <Code_banque></Code_banque>
                                            <Domiciliation></Domiciliation>
                                            <Titulaire>".$dataArr["mode_paiement"][0]["titulaire"]."</Titulaire>
                                            <Bic>".$dataArr["mode_paiement"][0]["bic"]."</Bic>
                                            <Iban>".$dataArr["mode_paiement"][0]["iban"]."</Iban>
                                           <AdresseIdentiqueAdresseFacturation>".$dataArr["mode_paiement"][1]["adresseIdentiqueAdresseFacturation"]."</AdresseIdentiqueAdresseFacturation>
                                           <Adresse>
                                                  <Civilite>".$dataArr["mode_paiement"][1]["civilite"]."</Civilite>
                                                  <Nom>".$dataArr["mode_paiement"][1]["nom"]."</Nom>
                                                  <Prenom>".$dataArr["mode_paiement"][1]["prenom"]."</Prenom>
                                                  <Numero>".$dataArr["mode_paiement"][1]["numero"]."</Numero>
                                                  <Complement>".$dataArr["mode_paiement"][1]["complement"]."</Complement>
                                                  <Type_voie>".$dataArr["mode_paiement"][1]["type_voie"]."</Type_voie>
                                                  <Voie>".$dataArr["mode_paiement"][1]["voie"]."</Voie>
                                                  <Voie_suite>".$dataArr["mode_paiement"][1]["voie_suite"]."</Voie_suite>
                                                  <Ensemble></Ensemble>
                                                  <Batiment></Batiment>
                                                  <Escalier></Escalier>
                                                  <Etage></Etage>
                                                  <Porte></Porte>
                                                  <Logo></Logo>
                                                  <Code_postal>".$dataArr["mode_paiement"][1]["code_postal"]."</Code_postal>
                                                  <Ville>".$dataArr["mode_paiement"][1]["ville"]."</Ville>
                                                  <CodeInsee></CodeInsee>
                                                  <FictifRivoli></FictifRivoli>
                                                  <Fictif_PC_Batiment></Fictif_PC_Batiment>
                                                  <Fictif_PC_Escalier></Fictif_PC_Escalier>
                                                  <Fictif_PC_Etage></Fictif_PC_Etage>
                                                  <Fictif_PC_Residence></Fictif_PC_Residence>
                                                  <Fictif_PC_NumeroVoie></Fictif_PC_NumeroVoie>
                                           </Adresse>
                                         </_rib>
                                       ";
            break;
            case "cartebleue":                        
                        $mode_paiment .=" 
                                         <_cartebleue>
                                             <Numero>".$dataArr["mode_paiement"][0]["numero"]."</Numero>
                                             <Date_expiration>".$dataArr["mode_paiement"][0]["date_expiration"]."</Date_expiration>
                                             <Cryptogramme>".$dataArr["mode_paiement"][0]["cryptogramme"]."</Cryptogramme>
                                             <Titulaire>".$dataArr["mode_paiement"][0]["titulaire"]."</Titulaire>
                                          </_cartebleue>
                                          <_rib>
                                            <Numero></Numero>
                                            <Clef></Clef>
                                            <Code_agence></Code_agence>
                                            <Code_banque></Code_banque>
                                            <Domiciliation></Domiciliation>
                                            <Titulaire></Titulaire>
                                            <Bic></Bic>
                                            <Iban></Iban>
                                           <AdresseIdentiqueAdresseFacturation>1</AdresseIdentiqueAdresseFacturation>
                                            <Adresse>
                                                  <Civilite></Civilite>
                                                  <Nom></Nom>
                                                  <Prenom></Prenom>
                                                  <Numero></Numero>
                                                  <Complement></Complement>
                                                  <Type_voie></Type_voie>
                                                  <Voie></Voie>
                                                  <Voie_suite></Voie_suite>
                                                  <Ensemble></Ensemble>
                                                  <Batiment></Batiment>
                                                  <Escalier></Escalier>
                                                  <Etage></Etage>
                                                  <Porte></Porte>
                                                  <Logo></Logo>
                                                  <Code_postal></Code_postal>
                                                  <Ville></Ville>
                                                  <CodeInsee></CodeInsee>
                                                  <FictifRivoli></FictifRivoli>
                                                  <Fictif_PC_Batiment></Fictif_PC_Batiment>
                                                  <Fictif_PC_Escalier></Fictif_PC_Escalier>
                                                  <Fictif_PC_Etage></Fictif_PC_Etage>
                                                  <Fictif_PC_Residence></Fictif_PC_Residence>
                                                  <Fictif_PC_NumeroVoie></Fictif_PC_NumeroVoie>
                                           </Adresse>
                                         </_rib>
                                        ";
            break;
        }
       }
       $prodSouscris = '<int>0</int>';
       $produIdCrm = $this->session->userdata("produIdCrm");
       if(!empty($produIdCrm)){
           $prodSouscris = "";
        foreach($produIdCrm as $key=>$val){
            if($key=="optionTv"){
                if(is_array($val)){
                    foreach($val as $key2=>$val2){
                       $prodSouscris .= "<int>".$val2."</int>";
                    }
                }
            }else{
                if(!empty($val)){
                    $prodSouscris .= "<int>".$val."</int>";
                }
            }
        }
       }
    $civiliteAF = $this->session->userdata("civilite_af");
    $addFacIdIns = !empty($civiliteAF)?0:1;
    $civiliteAL = $this->session->userdata("civilite_al");
    $addLivIdIns = !empty($civiliteAL)?0:1;
    
    $xmlStr = '<enregistreSouscription xmlns="msvaboweb">
                 <_con_id_parrainage>'.$dataArr["con_id_parrainage"].'</_con_id_parrainage>
                 <_produits_souscris>
                   '.$prodSouscris.'
                 </_produits_souscris>
                 <_adresse_installation>
                   <Civilite>'.$dataArr["adresse_installation"]["civilite"].'</Civilite>
                   <Nom>'.$dataArr["adresse_installation"]["nom"].'</Nom>
                   <Prenom>'.$dataArr["adresse_installation"]["prenom"].'</Prenom>
                   <Numero>'.$dataArr["adresse_installation"]["numero"].'</Numero>
                   <Complement>'.$dataArr["adresse_installation"]["complement"].'</Complement>
                   <Type_voie>'.$dataArr["adresse_installation"]["type_voie"].'</Type_voie>
                   <Voie>'.$dataArr["adresse_installation"]["voie"].'</Voie>
                   <Voie_suite>'.$dataArr["adresse_installation"]["voie_suite"].'</Voie_suite>
                   <Ensemble>'.$dataArr["adresse_installation"]["ensemble"].'</Ensemble>
                   <Batiment>'.$dataArr["adresse_installation"]["batiment"].'</Batiment>
                   <Escalier>'.$dataArr["adresse_installation"]["escalier"].'</Escalier>
                   <Etage>'.$dataArr["adresse_installation"]["etage"].'</Etage>
                   <Porte>'.$dataArr["adresse_installation"]["porte"].'</Porte>
                   <Logo>'.$dataArr["adresse_installation"]["logo"].'</Logo>
                   <Code_postal>'.$dataArr["adresse_installation"]["code_postal"].'</Code_postal>
                   <Ville>'.$dataArr["adresse_installation"]["ville"].'</Ville>
                   <CodeInsee></CodeInsee>
                   <FictifRivoli></FictifRivoli>
                   <Fictif_PC_Batiment></Fictif_PC_Batiment>
                   <Fictif_PC_Escalier></Fictif_PC_Escalier>
                   <Fictif_PC_Etage></Fictif_PC_Etage>
                   <Fictif_PC_Residence></Fictif_PC_Residence>
                   <Fictif_PC_NumeroVoie></Fictif_PC_NumeroVoie>
                 </_adresse_installation>
                 <_adresse_livraison_identique_instal>'.$addLivIdIns.'</_adresse_livraison_identique_instal>
                 <_adresse_livraison>
                   <Civilite>'.$dataArr["adresse_livraison"]["civilite"].'</Civilite>
                   <Nom>'.$dataArr["adresse_livraison"]["nom"].'</Nom>
                   <Prenom>'.$dataArr["adresse_livraison"]["prenom"].'</Prenom>
                   <Numero>'.$dataArr["adresse_livraison"]["numero"].'</Numero>
                   <Complement>'.$dataArr["adresse_livraison"]["complement"].'</Complement>
                   <Type_voie>'.$dataArr["adresse_livraison"]["type_voie"].'</Type_voie>
                   <Voie>'.$dataArr["adresse_livraison"]["voie"].'</Voie>
                   <Voie_suite>'.$dataArr["adresse_livraison"]["voie_suite"].'</Voie_suite>
                   <Ensemble>'.$dataArr["adresse_livraison"]["ensemble"].'</Ensemble>
                   <Batiment>'.$dataArr["adresse_livraison"]["batiment"].'</Batiment>
                   <Escalier>'.$dataArr["adresse_livraison"]["escalier"].'</Escalier>
                   <Etage>'.$dataArr["adresse_livraison"]["etage"].'</Etage>
                   <Porte>'.$dataArr["adresse_livraison"]["porte"].'</Porte>
                   <Logo>'.$dataArr["adresse_livraison"]["logo"].'</Logo>
                   <Code_postal>'.$dataArr["adresse_livraison"]["code_postal"].'</Code_postal>
                   <Ville>'.$dataArr["adresse_livraison"]["ville"].'</Ville>
                   <CodeInsee></CodeInsee>
                   <FictifRivoli></FictifRivoli>
                   <Fictif_PC_Batiment></Fictif_PC_Batiment>
                   <Fictif_PC_Escalier></Fictif_PC_Escalier>
                   <Fictif_PC_Etage></Fictif_PC_Etage>
                   <Fictif_PC_Residence></Fictif_PC_Residence>
                   <Fictif_PC_NumeroVoie></Fictif_PC_NumeroVoie>
                 </_adresse_livraison>
                 <_adresse_facturation_identique_instal>'.$addFacIdIns.'</_adresse_facturation_identique_instal>
                 <_adresse_facturation>
                  <Civilite>'.$dataArr["adresse_facturation"]["civilite"].'</Civilite>
                   <Nom>'.$dataArr["adresse_facturation"]["nom"].'</Nom>
                   <Prenom>'.$dataArr["adresse_facturation"]["prenom"].'</Prenom>
                   <Numero>'.$dataArr["adresse_facturation"]["numero"].'</Numero>
                   <Complement>'.$dataArr["adresse_facturation"]["complement"].'</Complement>
                   <Type_voie>'.$dataArr["adresse_facturation"]["type_voie"].'</Type_voie>
                   <Voie>'.$dataArr["adresse_facturation"]["voie"].'</Voie>
                   <Voie_suite>'.$dataArr["adresse_facturation"]["voie_suite"].'</Voie_suite>
                   <Ensemble>'.$dataArr["adresse_facturation"]["ensemble"].'</Ensemble>
                   <Batiment>'.$dataArr["adresse_facturation"]["batiment"].'</Batiment>
                   <Escalier>'.$dataArr["adresse_facturation"]["escalier"].'</Escalier>
                   <Etage>'.$dataArr["adresse_facturation"]["etage"].'</Etage>
                   <Porte>'.$dataArr["adresse_facturation"]["porte"].'</Porte>
                   <Logo>'.$dataArr["adresse_facturation"]["logo"].'</Logo>
                   <Code_postal>'.$dataArr["adresse_facturation"]["code_postal"].'</Code_postal>
                   <Ville>'.$dataArr["adresse_facturation"]["ville"].'</Ville>
                   <CodeInsee></CodeInsee>
                   <FictifRivoli></FictifRivoli>
                   <Fictif_PC_Batiment></Fictif_PC_Batiment>
                   <Fictif_PC_Escalier></Fictif_PC_Escalier>
                   <Fictif_PC_Etage></Fictif_PC_Etage>
                   <Fictif_PC_Residence></Fictif_PC_Residence>
                   <Fictif_PC_NumeroVoie></Fictif_PC_NumeroVoie>
                 </_adresse_facturation>                  
                 <_email>'.$dataArr["email"].'@mediaserv.net</_email>
                 <_renonce_delai_retractation>'.$dataArr["renonce_delai_retractation"].'</_renonce_delai_retractation>
                 <_information_contact>
                   <Email>'.$dataArr["information_contact"]["email"].'</Email>
                   <Telephone_mobile>'.$dataArr["information_contact"]["telephone_mobile"].'</Telephone_mobile>
                   <Telephone_bureau>'.$dataArr["information_contact"]["telephone_bureau"].'</Telephone_bureau>
                   <Telephone_domicile>'.$dataArr["information_contact"]["telephone_domicile"].'</Telephone_domicile>
                 </_information_contact>
                 <_moyen_paiement>'.$dataArr["moyen_paiement"].'</_moyen_paiement>
                 '.$mode_paiment.'
                 <_context>'.$dataArr["context"].'</_context>    
             </enregistreSouscription>';
    
$soapEligib = $this->nusoap_client->serializeEnvelope($xmlStr,'',array(),'document', 'literal'); 
        $this->nusoap_client->operation = "msvaboweb/enregistreSouscription";
        try{
            $result = $this->nusoap_client->send($soapEligib,'msvaboweb/enregistreSouscription');
            if(!isset($result)||empty($result)){
                throw new Exception("Le webservice a pris trop de temps à proceder l'enregistrement de la souscription");
            }
        }catch(Exception $e){
            log_message('error',$e->getMessage());
            return array();
        }
    $this->load->library('email');
//    $config['mailtype'] = 'html';
    //$this->email->initialize($config);
    $this->email->from('s.luthmoodoo@mediacall.mu', 'Swanand Reddy');
    if($_SERVER['HTTP_HOST']=="localhost"){
        $this->email->to('s.luthmoodoo@mediacall.mu');
    }else{
        $this->email->to('sophie.lacoste@mediaserv.com');
    }    
    $num_tel = $this->session->userdata("num_tel");
    $this->email->subject($num_tel.'_enregistrementSouscription_'.date('Y-m-d H:i:s'));
 
    $numError = !empty($result["enregistreSouscriptionResult"]["Erreur"]["NumError"])?$result["enregistreSouscriptionResult"]["Erreur"]["NumError"]:"";
    $errorMsg = !empty($result["enregistreSouscriptionResult"]["Erreur"]["ErrorMessage"])?$result["enregistreSouscriptionResult"]["Erreur"]["ErrorMessage"]:"";
    $this->email->message($xmlStr.'<NumError>'.$numError.'</NumError>
                            <ErrorMessage>'.$errorMsg.'</ErrorMessage>'
                          );
    $this->email->send(); 
    return  $result;
   }
   
  public function verifEmail($email_msv)
  {
       $soapEligib = $this->nusoap_client->serializeEnvelope('
                                    <VerifieEmailDisponibilite xmlns="msvaboweb">
                                        <_email>'.$email_msv.'@mediaserv.net</_email>
                                    </VerifieEmailDisponibilite>
                                    ','',array(),'document', 'literal');
       $this->nusoap_client->operation = "msvaboweb/VerifieEmailDisponibilite";
       $result = $this->nusoap_client->send($soapEligib,$this->nusoap_client->operation);
       return  $result["VerifieEmailDisponibiliteResult"];
  }
 
  public function verifParain($parrain_id_parcour,$parrain_num_contrat,$parrain_num_tel)
  {
      $soapEligib = $this->nusoap_client->serializeEnvelope('
                                    <rechercheParrain xmlns="msvaboweb">
                                        <_offreparrainage_id>'.$parrain_id_parcour.'</_offreparrainage_id>
                                        <_numero_tel>'.$parrain_num_tel.'</_numero_tel> 
                                        <_numero_contrat>'.$parrain_num_contrat.'</_numero_contrat>    
                                    </rechercheParrain>
                                    ','',array(),'document', 'literal');
       $this->nusoap_client->operation = "msvaboweb/rechercheParrain";
       $result = $this->nusoap_client->send($soapEligib,$this->nusoap_client->operation);
       return  $result["rechercheParrainResult"];
  }
}