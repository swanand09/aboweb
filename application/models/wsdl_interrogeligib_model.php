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
            $this->nusoap_client = new nusoap_client("http://192.168.64.46/WebserviceAboweb/Service.asmx?wsdl",true); 
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
                                  array_push($arrDum1, $val2);
                              break;
                              case 2:
                                  array_push($arrDum2, $val2);
                              break;
                              case 3:
                                  array_push($arrDum3, $val2);
                              break;
                              case 4:
                                  array_push($arrDum4, $val2);
                              break;
                              case 5:
                                  array_push($arrDum5, $val2);
                              break;
                              case 6:
                                  array_push($arrDum6, $val2);
                              break;
                              case 7:
                                  array_push($arrDum7, $val2);
                              break;
                          }
                      }
                     }
                 }else{
                     if($key1=="Dummy"){
                          switch($val2){
                              case 1:
                                  array_push($arrDum1, $val1["Valeurs"]["WS_Produit_Valeur"]);
                              break;
                              case 2:
                                  array_push($arrDum2, $val1["Valeurs"]["WS_Produit_Valeur"]);
                              break;
                              case 3:
                                  array_push($arrDum3, $val1["Valeurs"]["WS_Produit_Valeur"]);
                              break;
                              case 4:
                                  array_push($arrDum4, $val1["Valeurs"]["WS_Produit_Valeur"]);
                              break;
                              case 5:
                                  array_push($arrDum5, $val1["Valeurs"]["WS_Produit_Valeur"]);
                              break;
                              case 6:
                                  array_push($arrDum6, $val1["Valeurs"]["WS_Produit_Valeur"]);
                              break;
                              case 7:
                                  array_push($arrDum7, $val1["Valeurs"]["WS_Produit_Valeur"]);
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
       $soapEligib = $this->nusoap_client->serializeEnvelope('
                                                                <enregistreSouscription xmlns="msvaboweb">
                                                                    <_id>0</_id>
                                                                    <_con_id_parrainage>0</_con_id_parrainage>
                                                                    <_produits_souscris>
                                                                      <int>0</int>
                                                                    </_produits_souscris>
                                                                    <_adresse_installation>
                                                                      <Civilite />
                                                                      <Nom />
                                                                      <Prenom />
                                                                      <Numero />
                                                                      <Complement />
                                                                      <Type_voie />
                                                                      <Voie />
                                                                      <Voie_suite />
                                                                      <Ensemble />
                                                                      <Batiment />
                                                                      <Escalier />
                                                                      <Etage />
                                                                      <Porte />
                                                                      <Logo />
                                                                      <Code_postal />
                                                                      <Ville />
                                                                    </_adresse_installation>
                                                                    <_adresse_livraison>
                                                                      <Civilite />
                                                                      <Nom />
                                                                      <Prenom />
                                                                      <Numero />
                                                                      <Complement />
                                                                      <Type_voie />
                                                                      <Voie />
                                                                      <Voie_suite />
                                                                      <Ensemble />
                                                                      <Batiment />
                                                                      <Escalier />
                                                                      <Etage />
                                                                      <Porte />
                                                                      <Logo />
                                                                      <Code_postal />
                                                                      <Ville />
                                                                    </_adresse_livraison>
                                                                    <_adresse_facturation>
                                                                      <Civilite />
                                                                      <Nom />
                                                                      <Prenom />
                                                                      <Numero />
                                                                      <Complement />
                                                                      <Type_voie />
                                                                      <Voie />
                                                                      <Voie_suite />
                                                                      <Ensemble />
                                                                      <Batiment />
                                                                      <Escalier />
                                                                      <Etage />
                                                                      <Porte />
                                                                      <Logo />
                                                                      <Code_postal />
                                                                      <Ville />
                                                                    </_adresse_facturation>
                                                                    <_email />
                                                                    <_renonce_delai_retractation>false</_renonce_delai_retractation>
                                                                    <_information_contact>
                                                                      <Email />
                                                                      <Telephone_mobile />
                                                                      <Telephone_bureau />
                                                                      <Telephone_domicile />
                                                                    </_information_contact>
                                                                    <_cartebleue>
                                                                      <Numero />
                                                                      <Date_expiration />
                                                                      <Cryptogramme />
                                                                      <Titulaire />
                                                                    </_cartebleue>
                                                                    <_rib>
                                                                      <Numero />
                                                                      <Clef />
                                                                      <Code_agence />
                                                                      <Code_banque />
                                                                      <Domiciliation />
                                                                      <Titulaire />
                                                                    </_rib>
                                                                </enregistreSouscription>','',array(),'document', 'literal'
                                                            ); 
        $this->nusoap_client->operation = "msvaboweb/enregistreSouscription";
        $result = $this->nusoap_client->send($soapEligib,'msvaboweb/enregistreSouscription');
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