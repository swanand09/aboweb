<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mon_offre extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
           // $this->output->enable_profiler(TRUE);
           
    }  
    
    public function index($num_tel="")
    {
         //verificaition session
        $this->prevState = $this->session->userdata("prevState");
        if(isset($this->prevState[1]["parrainage"])&&!empty($this->prevState[1]["parrainage"])){
            $this->prevState[1]["parrainage"] = "";
            $this->session->set_userdata('prevState',$this->prevState);
        }
        
        $this->data["userdata"] = $this->session->all_userdata();  
       
        $data['ligne_prefix'] = array(
                                    'name'      => 'ligne_prefix',
                                    'id'        => 'ligne_prefix',
                                    'type'      => 'text',
                                    'class'     => 'prefix',
                                    'maxlength' => '4',
                                    'value'     => $this->determine_location()  //recuperation department 
                              );
        $data['ligne_sufix'] = array(
                                    'name'      => 'ligne_sufix',
                                    'id'        => 'ligne_sufix',
                                    'type'      => 'text',
                                    'class'     => 'validate[required,custom[integer],minSize[6],maxSize[6]]',
                                    'maxlength'      => '6'
                                   
                              );
        $data['test_eligb_butt'] = array(
                                            'class'=>'rmv-std-btn btn-green',
                                            'name' => 'test_eligb_butt',
                                            'id' => 'test_eligb_butt',
                                            'type' => 'submit',
                                            'title'=> 'Tester mon eligibilité',
                                            'value' => 'TESTER'
                                      );
        
        $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/saisie_num",$data,true);
        
        //verifie si numero tel est saisi depuis la site box
        if(!empty($num_tel)){
             return $this->ajax_proc_interogeligib($num_tel);
        }
       if(empty($this->prevState[0]["contenu_html"])){
        $this->majSession(array("panierVal"=>$this->panierVal));
        $this->majSession(array("produIdCrm"=>$this->produIdCrm));
       }
        return $this->controller_test_eligib_vue();                
    }
   
    //geolocalisation basant sur ip
    public function determine_location()
    {
       $this->load->model('geolocalisation_model','geoloca'); 
       $pays = $this->geoloca->getDepartment();
       $this->session->set_userdata("pays",$pays);
        return $this->validPrefix[$pays];
    }
    
    //test prefix of numbers entered
    public function validateNum($prefix_num)
    {
        $prefix_num = substr($prefix_num,0,4);
        foreach($this->validPrefix as $key=>$val){
            if($prefix_num==$val){
                return true;
            }
        }
        return false;
    }
    
    //connection avec le webservice fontionalite interrogeEligibilite - ajax
    public function ajax_proc_interogeligib($num_tel="")
    {
        $from_sitebox  = false;   
       (empty($num_tel))?$num_tel = str_replace(' ', '', $this->input->post('num_tel')):$from_sitebox = true;
       $numTelSess = $this->session->userdata("num_tel"); 
       $data["error"]  = true;
       if(!empty($numTelSess)&&$num_tel==$numTelSess){
           echo json_encode(array($this->contenuGauche,$this->colonneDroite,"error"=>$data["error"],"msg"=>"<p><strong>VEUILLEZ SAISIR UN AUTRE NUMERO.</strong>
  </p><a class='close-reveal-modal'>&#215;</a>"));
           exit();
       }
        $data["num_tel"] = $num_tel; 
        $data["result"] = "";
       try{
        if($num_tel!=""&&$this->validateNum($num_tel))
        {   
            $this->data["racap_num"] = array('name' => 'recap_num','id' => 'ligne','class'=>'validate[required,custom[integer],minSize[10]]','maxlength'=>'10','type' => 'text','value' => $num_tel);
            $result = $this->Wsdl_interrogeligib->interrogeEligibilite($num_tel);
           
            if(!empty($result))
            {
                $data["result"] = $result;               
               if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"])||$result["interrogeEligibiliteResult"]["Erreur"]["NumError"]==202)
               {                  
                    $data["error"]  = false;
                    $this->session->set_userdata("resultProd",""); //flux de produits
                    $this->session->set_userdata("num_tel",$num_tel);                   
                    $this->session->set_userdata('eligible_tv',$result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]);                    
                    if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"])){
                       $this->session->set_userdata('context',$result["interrogeEligibiliteResult"]["Context"]);
                    }else{
                       $this->session->set_userdata('context',""); 
                    }
                    
                    $eligDegPart  = $result["interrogeEligibiliteResult"]["Ligne"]["Eligible_degroupage_partiel"];
                    $eligDegTotal = $result["interrogeEligibiliteResult"]["Ligne"]["Eligible_dégroupage_total"];
                    $produitDegroupage = true;
                    if($eligDegPart=="true"&&$eligDegTotal=="true"){
                        $input1 = array('name' => 'redu_facture','id' => 'redu_facture','value' => 'true','checked'=> 'checked');
                        $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','checked'=> 'checked'); 
                    }
                    if($eligDegPart=="true"&&$eligDegTotal=="false"){
                        $input1 = array('name' => 'redu_facture','id' => 'redu_facture','value' => 'true','disabled'=> 'disabled');
                        $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','disabled'=> 'disabled'); 
                    }
                    if($eligDegPart=="false"&&$eligDegTotal=="true"){
                        $input1 = array('name' => 'redu_facture','id' => 'redu_facture','value' => 'true','checked'=> 'checked','disabled'=> 'disabled');
                        $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','checked'=> 'checked'); 
                    }
                    if($eligDegPart=="false"&&$eligDegTotal=="false"){
                        $produitDegroupage =false;
                        $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','checked'=> 'checked'); 
                    }
                    
                    $data["produitDegroupage"] = $produitDegroupage;
                    $data["input1"] = $input1;
                    $data["input2"] = $input2;                
                    $choix_forfait = array('class'=> 'rmv-std-btn btn-forward','name' => 'choix_forfait','id' => 'choix_forfait','type' => 'submit','value' => 'CHOISIR MON FORFAIT', 'title'=>'Choisir mon forfait');   
                    $data["choix_forfait"] = $choix_forfait;                    
                    $this->colonneDroite["form_test_ligne"] = $this->load->view("general/form_test_ligne",$data,true);
                  
                    $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/num_eligib_info",$data,true);
                    
                }else if($result["interrogeEligibiliteResult"]["Erreur"]["NumError"]==201){
                    log_message('error', 'erreur '.$result["interrogeEligibiliteResult"]["Erreur"]["NumError"]);
                    log_message('error', $num_tel." n'est pas éligible.");
                    echo json_encode(array(
                                            $this->contenuGauche,
                                            $this->colonneDroite,
                                            "error"=>$data["error"],
                                            "msg"=>"<p><strong>VOTRE LIGNE <span class='green-text'>".$num_tel."</span> N'EST PAS ENCORE ÉLIGIBLE À NOS SERVICES.<br/><br/>
  VOUS POUVEZ CONTACTER NOTRE SERVICE COMMERCIAL POUR PLUS D'INFORMATION.</strong></p><a class='close-reveal-modal'>&#215;</a>"
                                            )
                            );
                    exit;
                }else{
                    log_message('error', 'erreur '.$result["interrogeEligibiliteResult"]["Erreur"]["NumError"]);
                    log_message('error', "services indisponibles, numéro: ".$num_tel);
                    echo json_encode(array(
                                            $this->contenuGauche,
                                            $this->colonneDroite,
                                            "error"=>$data["error"],
                                            "msg"=>"<p><strong>".strtoupper("nos services sont actuellement indisponibles nous vous invitons a contacter notre service commercial")."</strong></p><a class='close-reveal-modal'>&#215;</a>"
                                            )
                            );
                    exit;
                }
            }
      }else{
          throw new Exception("VOTRE NUMERO EST INVALIDE. VEUILLEZ RÉ-ESSAYER.");
      }
       }catch(Exception $e){
           log_message('error', $num_tel." est invalide");
            echo json_encode(array(
                                            $this->contenuGauche,
                                            $this->colonneDroite,
                                            "error"=>$data["error"],
                                            "msg"=>"<p><strong>".$e->getMessage()."</strong></p><a class='close-reveal-modal'>&#215;</a>"
                                            ));
            exit;
            
       }
          
      $this->session->set_userdata("htmlContent_testeligib",$this->contenuGauche["contenu_html"]);      
      $this->session->set_userdata('prevState',array($this->contenuGauche,$this->colonneDroite));
      if($from_sitebox)
      {
         redirect("mon_offre");
      }
          
    //reintialiser
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
     $this->session->set_userdata("produIdCrm",$this->produIdCrm); 
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
     $this->session->set_userdata("panierVal",$this->panierVal);
         
      
     echo json_encode(array($this->contenuGauche,$this->colonneDroite,"error"=>$data["error"],"msg"=>""));
    }
    
    public function forfait()
    {         
      if($this->controller_verifySessExp()==true){
         echo json_encode(
                            array(
                                    "error"=>"redirect",
                                    "msg"=>"<p><strong>VOTRE SESSION A EXPIRÉ. VEUILLEZ RÉ-ESSAYER.</strong>
  </p><a class='close-reveal-modal' onclick='javascript:$(location).attr(\"href\",monOffre);'>&#215;</a>")
                          );
        exit;
         
      }     
       
       
       //reset session de type de faturation à null
       $this->session->set_userdata("type_de_facturation","");
       $this->session->set_userdata("typeFacture",array("facture","electronique"));    
       
       $redu_facture  = $this->input->post('redu_facture');       
       $this->session->set_userdata("redu_facture",$redu_facture);
       $consv_num_tel = $this->input->post('consv_num_tel'); 
       $this->session->set_userdata("consv_num_tel",$consv_num_tel);
       
       $this->prevState = $this->session->userdata("prevState");
       
       $num_tel = $this->session->userdata("num_tel"); 
       //connection à la fonctionalité recupere_info du wdsl
       $context = $this->session->userdata('context');
       if(empty($context)){
           // error 202 ligne deja activé   
           log_message('error', 'erreur 202');
           log_message('error', "services indisponibles, numéro: ".$num_tel);
           $this->colonneDroite["form_test_ligne"] = $this->prevState[1]["form_test_ligne"];
           echo json_encode(array($this->contenuGauche,$this->colonneDroite,"error"=>202));   
           exit;
       }
       try{
       //verifie si on a deja les flux de produit
       $resultProd = $this->session->userdata("resultProd");
       if(empty($resultProd)){
         $resultProd  = $this->Wsdl_interrogeligib->recupereOffre($context);
         $this->session->set_userdata("resultProd",$resultProd);
       }
       if(empty($resultProd["recupere_offreResult"]["Erreur"])){
       $this->session->set_userdata('localite',$resultProd["recupere_offreResult"]["Localite"]);
       $this->session->set_userdata('idParcours',$resultProd["recupere_offreResult"]["Id"]); 
       $this->session->set_userdata('offreparrainage_id',($resultProd["recupere_offreResult"]["Catalogue"]["Autorise_parrainage"]=="true")?$resultProd["recupere_offreResult"]["Catalogue"]["Offreparrainage_id"]:"");                  
       $this->session->set_userdata('ws_ville',$resultProd["recupere_offreResult"]["Villes"]["WS_Ville"]);
       $this->session->set_userdata('produit',$resultProd["recupere_offreResult"]["Catalogue"]["Produits"]["WS_Produit"]);   
       $panierVal = $this->session->userdata("panierVal");       
       array_push($panierVal["promodum2"],array($resultProd["recupere_offreResult"]["Catalogue"]["Promo_libelle"]));       
       $this->session->set_userdata("panierVal",$panierVal);
       $this->session->set_userdata('context',$resultProd["recupere_offreResult"]["Context"]);
       //$this->session->set_userdata('dummyPanier',$this->Wsdl_interrogeligib->recupDummyPanier($result["recupere_offreResult"]["Catalogue"]["Produits"]["WS_Produit"]));
     
      
       $produit =  $this->session->userdata("produit");
       $data["promo_libelle"] = $resultProd["recupere_offreResult"]["Catalogue"]["Promo_libelle"];       
       
       $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/forfait/ma_promo",$data,true);
       $counter = 1;
       $iadArr = array("Libelle"=>"","Tarif"=>"","Tarif_promo"=>"","Duree_mois_promo"=>"");
       $data["produit"] = $produit;
       
       //to review total       
       $this->session->set_userdata('totalParMois',"");
       $this->session->set_userdata('total1erFacture',"");
       $this->session->set_userdata('total2emeFacture',"");
       
        foreach($produit as $key=>$val)
        {
           switch($val["Categorie"]){               
               case "FORFAIT":
                   $choixArr = array("title"=>"CHOISIR CE FORFAIT",'class'=>'rmv-std-btn btn-green','name' => 'button','id' => 'butt_'.$counter,"onclick" => "javascript:choixForfait(".$val["Id_crm"].")",'content' => 'CHOISIR');
                   $label            = explode("@",$val["Libelle"]);
                   $data["labelTel"] = $this->my_ucfirst($label[0]);
                   $data["labelNet"] = $this->my_ucfirst($label[1]);
                   $data["val"]      = $val;
                   $data["choixArr"] = $choixArr;
                   $data["counter"]  = $counter; 
                   $data["eligible_tv"] = $this->session->userdata("eligible_tv");
                   $this->contenuGauche["contenu_html"] .= $this->load->view("monoffre/forfait/liste",$data,true);
                   $counter++;
               break;
               case "IAD":
                   $iadArr = array("Libelle"=>$val["Libelle"],"Tarif"=>$val["Tarif"],"Tarif_promo"=>$val["Tarif_promo"],"Duree_mois_promo"=>$val["Duree_mois_promo"],"Id_crm"=>$val["Id_crm"]);
                   $this->session->set_userdata('tarifLocTvMod',$val["Tarif"]);
               break;
           }
        }
        
      //  $this->colonneDroite["total_par_mois"]  = $this->load->view("general/total_mois",$data,true);   
        $data["iadArr"] = $iadArr;
        $this->session->set_userdata('iad',$iadArr);
        $data["prefixNum"] = substr($this->session->userdata("num_tel"),0,4);
        $this->contenuGauche["contenu_html"] .= $this->load->view("monoffre/forfait/location_modem",$data,true);
        $this->session->set_userdata('htmlContent_forfait',$this->contenuGauche["contenu_html"]);
       
        $this->colonneDroite["form_test_ligne"] = $this->prevState[1]["form_test_ligne"];
       
        if($this->colonneDroite["forfait_dummy1"]=="")
        {           
            $data["text"]  = '<p>Choisissez une offre...</p>';
           // $this->colonneDroite["offre_mediaserv"] = $this->load->view("general/offre_mediaserv",$data,true);
            $this->colonneDroite["forfait_dummy1"] = $this->load->view("general/forfait_dummy1",$data,true);
        }      
        

        $this->session->set_userdata('prevState',array($this->contenuGauche,$this->colonneDroite));
        echo json_encode(array($this->contenuGauche,$this->colonneDroite,"error"=>"")); 
       }else{
           throw new Exception("Nos services sont actuellement indisponibles nous vous invitons a contacter notre service commercial");
       }
       
       }catch(Exception $e){             
           log_message('error', "services indisponibles, numéro: ".$num_tel);
           $this->session->destroy();           
           echo json_encode(array($this->contenuGauche,$this->colonneDroite,"error"=>"redirect","msg"=>"<p><strong>".strtoupper($e->getMessage())."</strong>
  </p><a class='close-reveal-modal' onclick='javascript:$(location).attr(\"href\",monOffre);'>&#215;</a>")); 
       }
       
    } 
    
    public function ligne_active()
    {
        $this->data["userdata"] = $this->session->all_userdata();  
        return $this->controller_ligne_deja_active_vue();   
    }
    
    public function prevState($page='')
    {
       if($this->controller_verifySessExp()==true){
          echo json_encode(
                            array(
                                    "error"=>"redirect",
                                    "msg"=>"<p><strong>VOTRE SESSION A EXPIRÉ. VEUILLEZ RÉ-ESSAYER.</strong>
  </p><a class='close-reveal-modal' onclick='javascript:$(location).attr(\"href\",monOffre);'>&#215;</a>")
                          );
        exit;                 
       }     
       // $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        //$this->prevState =  $this->session->userdata("prevState"); 
        $redu_facture = $this->session->userdata("redu_facture");
        $consv_num_tel = $this->session->userdata("consv_num_tel");
        $resultProd = $this->session->userdata("resultProd");
        $promodum2Arr = "";
        if(!empty($resultProd["recupere_offreResult"]["Catalogue"]["Promo_libelle"])){
          $promodum2Arr = array($resultProd["recupere_offreResult"]["Catalogue"]["Promo_libelle"]);
        }
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
        $this->session->set_userdata("produIdCrm",$this->produIdCrm);
        //
        $this->session->set_userdata("totalParMois","");   
        $this->session->set_userdata("total1erFacture","");
        $this->session->set_userdata("total2emeFacture","");
                
        switch($page)
        {
            case "forfait":
                    $this->panierVal       = array(
                                        "degroupagedum1"    => array(),
                                        "portabilitedum1"   => array(),
                                        "forfaitdum1"       => array(),
                                        "promodum2"         => array($promodum2Arr),
                                        "bouquetTvdum3"     => array(),
                                        "optionTvdum3"      => array(),
                                        "voddum3"           => array(),
                                        "locaEquipdum4"     => array(),
                                        "decodEquipdum4"    => array(),
                                        "cautiondum5"       => array(),
                                        "facturedum6"       => array(),
                                        "oneshotdum7"       => array()
                );    
               
                $htmlContent   = $this->session->userdata("htmlContent_forfait");
            break;
        
            case "test_eligib":
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
               
                $htmlContent   = $this->session->userdata("htmlContent_testeligib");
            break;
        }
       $this->session->set_userdata("panierVal",$this->panierVal);
       if(!empty($htmlContent)){
            if($redu_facture=="true"){
                $htmlContent = str_replace('<input type="checkbox" name="redu_facture" value="true" id="redu_facture"  />','<input type="checkbox" name="redu_facture" value="true" checked="checked" id="redu_facture"  />',$htmlContent);
            }else{
                $htmlContent = str_replace('<input type="checkbox" name="redu_facture" value="true" checked="checked" id="redu_facture"  />','<input type="checkbox" name="redu_facture" value="true" id="redu_facture"  />',$htmlContent);
                $htmlContent = str_replace('<input type="checkbox" name="consv_num_tel" value="true" checked="checked" id="consv_num_tel"  />','<input type="checkbox" name="consv_num_tel" value="true" disabled="disabled" id="consv_num_tel"  />',$htmlContent);
            }
            
            if($consv_num_tel=="true"){
                $htmlContent = str_replace('<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel"  />','<input type="checkbox" name="consv_num_tel" value="true" checked="checked" id="consv_num_tel"  />',$htmlContent);
            }else{
               $htmlContent = str_replace('<input type="checkbox" name="consv_num_tel" value="true" checked="checked" id="consv_num_tel"  />','<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel"  />',$htmlContent);
            }
             echo $htmlContent;
       }else{
           $this->session->destroy();
           redirect('mon_offre');
       }
    }
    
   
    
    public function refreshRecapCol()
    {
         if($this->controller_verifySessExp()==true){
            echo json_encode(
                              array(
                                      "error"=>"redirect",
                                      "msg"=>"<p><strong>VOTRE SESSION A EXPIRÉ. VEUILLEZ RÉ-ESSAYER.</strong>
    </p><a class='close-reveal-modal' onclick='javascript:$(location).attr(\"href\",monOffre);'>&#215;</a>")
                            );
          exit;              
         } 
         //$this->controller_verifySessExp()? redirect('mon_offre'):"";
         
         //initialiser les tarifs a zéro pour le panier
         $this->session->set_userdata('totalParMois',"");
         $this->session->set_userdata('total1erFacture',"");
         $this->session->set_userdata('total2emeFacture',"");
         //reinitialiser
         $resultProd = $this->session->userdata("resultProd");
         $promodum2Arr = "";
         if(!empty($resultProd["recupere_offreResult"]["Catalogue"]["Promo_libelle"])){
             $promodum2Arr = array($resultProd["recupere_offreResult"]["Catalogue"]["Promo_libelle"]);
         }
         $this->panierVal       = array(
                                        "degroupagedum1"    => array(),
                                        "portabilitedum1"   => array(),
                                        "forfaitdum1"       => array(),
                                        "promodum2"         => array($promodum2Arr),
                                        "bouquetTvdum3"     => array(),
                                        "optionTvdum3"      => array(),
                                        "voddum3"           => array(),
                                        "locaEquipdum4"     => array(),
                                        "decodEquipdum4"    => array(),
                                        "cautiondum5"       => array(),
                                        "facturedum6"       => array(),
                                        "oneshotdum7"       => array()
                );    
         $this->session->set_userdata("panierVal",$this->panierVal);
         
         $this->iad = $this->session->userdata("iad");
         $this->data["iad"] = $this->iad;        
         $localite    = $this->session->userdata("localite");       
         $id_crm = $this->input->post("id_crm");
         $produit =  $this->session->userdata("produit");   
        
         //MAJ PANIER         
          $this->majPanier(array("produit"=>array("DEGROUPAGE","PORTABILITE","FORFAIT","IAD"),"etape"=>array("choixForfait"))); 
                   
          $bouqTvArr = array(); $optionTvArr = array();$vodPvrArr = array();
          if(isset($produit)&&!empty($produit)){
                foreach($produit as $key=>$val)
                {
                    switch($val["Categorie"]){
                       case "TELEVISION":
                           //décodeur tv chaines basique
                            $this->data["duree_mois_promo"]         = $val["Duree_mois_promo"];
                            $this->data["decodeur_tv_tarif"]        = $val["Tarif"];
                            $this->data["decodeur_tv_promo_tarif"]  = $val["Tarif_promo"];
                            
                       break;
                       case "BOUQUET_TV":
                           $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$val["Id_crm"]); 
                           
                           foreach($dummyAMaj["dummy3"] as $key2=>$val2)
                           {
                                array_push($bouqTvArr, array(
                                                                 $val2["Valeurs"]["Libelle"]["string"]=>array(
                                                                                                                 "tarif"     => $val2["Valeurs"]["Tarif"]["decimal"],
                                                                                                                 "picto"     => $val2["Valeurs"]["Picto"],
                                                                                                                 "id_crm"    => $val["Id_crm"],
                                                                                                                 "id_web"    => $val["Id_web"],
                                                                                                                 "promo"     => array(
                                                                                                                                  "Tarif_promo"      =>  $val["Tarif_promo"],
                                                                                                                                  "Duree_mois_promo" =>  $val["Duree_mois_promo"]
                                                                                                                                 )
                                                                                                              )
                                                             )
                                                 );
                           }
                       break;
                       case "OPTION_TV":
                           $dummyAMaj = $this->Wsdl_interrogeligib->recupDummyParId($produit,$val["Id_crm"]); 
                           foreach($dummyAMaj["dummy3"] as $key2=>$val2)
                           {
                               array_push($optionTvArr, array(
                                                                $val2["Valeurs"]["Libelle"]["string"]=>array(
                                                                                                                "tarif"     => $val2["Valeurs"]["Tarif"]["decimal"],
                                                                                                                "picto"     => $val2["Valeurs"]["Picto"],
                                                                                                                "id_crm"    => $val["Id_crm"],
                                                                                                                "id_web"    => $val["Id_web"],
                                                                                                                "promo"     => array(
                                                                                                                                       "Tarif_promo"=>$val["Tarif_promo"],
                                                                                                                                       "Duree_mois_promo"=>$val["Duree_mois_promo"]
                                                                                                                                    )
                                                                                                             )
                                                               )
                                                      );
                           } 
                       break;
                       
                    }
                }         
            }
          
           $this->data["bouqTvArr"] = $bouqTvArr;  $this->data["optionTvArr"] = $optionTvArr; //$this->data["vodPvr"] = $vodPvrArr; 
           $this->session->set_userdata("bouquetTv",$bouqTvArr);         
           $this->session->set_userdata("optionTv",$optionTvArr);
           
           
            if(!empty($bouqTvArr)){
                $this->load->model('stb_model','stb'); 
                $this->data["base_url_stb"] = BASEPATH_STB;
                $bouquetList = $this->stb->retrievChainesList(array("bouquetTv"=>$bouqTvArr,"optionTv"=>$optionTvArr)); 
               
                if(isset($bouquetList["error"])&&!empty($bouquetList["error"])){
                     echo json_encode(
                              array(
                                      "error"=>"redirect",
                                      "msg"=>"<p><strong>".$bouquetList["error"]."</strong>
                                                </p><a class='close-reveal-modal'>&#215;</a>")
                                   );
                              exit;              
                }
                
                $this->data["bouquet_list"] =  $bouquetList; 
                //$this->data["bouqReformat"] = $this->stb->reformatBouquet($bouquetList["Bouquet"]);
                $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/tv/liste_bouquets",$this->data,true);                   
                
            }else{
                $this->contenuGauche["contenu_html"] = "redirect to mes coordonnees";                
                $offreparrainage_id = $this->session->userdata('offreparrainage_id');
                if(!empty($offreparrainage_id))
                $this->colonneDroite["parrainage"] = $this->load->view("general/parrainage",$this->data,true);                 
                $this->session->set_userdata('prevState',array(array("contenu_html"=>$this->session->userdata("htmlContent_forfait")),$this->colonneDroite));                
            }
            
            echo json_encode(array($this->contenuGauche,$this->colonneDroite));          
    }  
    
    //update tv decodeur
    
    public function updateTvDecodeur()
    {
        //$this->controller_verifySessExp()? redirect('mon_offre'):"";              
        if($this->controller_verifySessExp()==true){
            echo json_encode(
                              array(
                                      "error"=>"redirect",
                                      "msg"=>"<p><strong>VOTRE SESSION A EXPIRÉ. VEUILLEZ RÉ-ESSAYER.</strong>
    </p><a class='close-reveal-modal' onclick='javascript:$(location).attr(\"href\",monOffre);'>&#215;</a>")
                            );
          exit;                
       } 
        $decoder_tv   =  $this->input->post('decoder_tv');                    
         //MAJ PANIER
        $this->majPanier(array("produit"=>array("TELEVISION"),"etape"=>array("choixTv",$decoder_tv) ));          
       //dummy1
        $this->data["decoder_tv"]  = $decoder_tv;
        $this->data["eligible_tv"] = $this->session->userdata("eligible_tv");          
        echo json_encode($this->colonneDroite);
    }
    
    //dummy3 update bouquet
    public function updateBouquet(){
        if($this->controller_verifySessExp()==true){
            echo json_encode(
                              array(
                                      "error"=>"redirect",
                                      "msg"=>"<p><strong>VOTRE SESSION A EXPIRÉ. VEUILLEZ RÉ-ESSAYER.</strong>
    </p><a class='close-reveal-modal' onclick='javascript:$(location).attr(\"href\",monOffre);'>&#215;</a>")
                            );
          exit;              
       }                
        // $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        $bouquetChoisi =  $this->input->post("bouquetChoisi");
        $this->session->set_userdata("bouquetChoisi",$bouquetChoisi);
        $this->data["bouquetChoisi"] =  $bouquetChoisi;
         //MAJ PANIER
        $this->majPanier(array("produit"=>array("BOUQUET_TV"),"etape"=>array("choixBouquet") ));        
        echo json_encode($this->colonneDroite);
    }
    
    //dummy3 update option
    public function updateOptions(){
       if($this->controller_verifySessExp()==true){
          echo json_encode(
                            array(
                                    "error"=>"redirect",
                                    "msg"=>"<p><strong>VOTRE SESSION A EXPIRÉ. VEUILLEZ RÉ-ESSAYER.</strong>
  </p><a class='close-reveal-modal' onclick='javascript:$(location).attr(\"href\",monOffre);'>&#215;</a>")
                          );
        exit;            
       } 
        // $this->controller_verifySessExp()? redirect('mon_offre'):"";
        $checkOption =  $this->input->post("checkOption");
         //MAJ PANIER
        $this->majPanier(array("produit"=>array("OPTION_TV"),"etape"=>array("choixOption",$checkOption) )); 
        echo json_encode($this->colonneDroite);
    }
    
    //got to mes coordonnes
    public function mesCoordonnes()
    {
         $data["test"] = "ok";   
         $this->prevState = $this->session->userdata("prevState");
         
         //maj contenu précédente
          $maTv = $this->input->post("maTv");
          $this->prevState[0]["contenu_html"] =  $maTv;
         
         
         $offreparrainage_id = $this->session->userdata('offreparrainage_id');
         
         if(!empty($offreparrainage_id))
         $this->prevState[1]["parrainage"] = $this->load->view("general/parrainage",$data,true);
         
         $this->session->set_userdata('prevState',$this->prevState);
       // redirect('mes_coordonnees');
         echo json_encode(array("test"=>$data["test"]));
    }
            
    public function redirectToMonOffre()
    {
        $this->session->destroy();
        redirect("mon_offre");
    }
    
    
    /*****************************************testing**********************************************/
    public function arrayToXml2()
    {
        // Load XML writer library
        //$this->load->library('xml_writer');
        // Initiate class
       // $xml = new Xml_writer();
        $context = $this->session->userdata("context");
        // creating object of SimpleXMLElement
        $xmlContext = new SimpleXMLElement('<Context/>');
        // function call to convert array to xml
        //array_walk_recursive($context, array($xmlContext, 'addChild'));
        /*
        echo "<pre>";
        print_r(str_replace('<?xml version="1.0"?>', "", $this->arrayToXml($context, $xmlContext)->asXML()));
        echo "</pre>";
         * 
         */
        
        $dom = new DOMDocument("1.0");
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($this->arrayToXml($context, $xmlContext)->asXML());
        echo str_replace('<?xml version="1.0"?>', "", $dom->saveXML());
    }
    public function interrogEligibilite()
    {
       echo "<pre>";
        print_r($this->Wsdl_interrogeligib->interrogeEligibilite("0594306643"));
       echo "</pre>"; 
    }
    
    public function testFlux($dummy)
    {
        //dummy
        
        $dummyPanier = $this->session->userdata("dummyPanier");
        echo "<pre>";
        print_r($dummyPanier[$dummy]);        
        echo "</pre>";
        //produit degroupage
        /*
        $produit = $this->session->userdata("produit");
        foreach($produit as $key=>$val){
            if($val["Categorie"]=="PORTABILITE"){
            echo "<pre>";
            print_r($val);
            echo "</pre>";
            }
        }*/
        
        //promo
//        $promo = $this->session->userdata("promo");
//        echo "<pre>";
//        print_r($promo);
//        echo "</pre>";
    }
    
    public function retrieveChaines(){
         $this->load->model('stb_model','stb'); 
         $bouqTvArr = $this->session->userdata("bouquetTv");
         $optionTvArr = $this->session->userdata("optionTv");
       echo "<pre>";
       print_r($this->stb->retrievChainesList(array("bouquetTv"=>$bouqTvArr,"optionTv"=>$optionTvArr)));
       echo "</pre>";
    } 
    
    public function testProduit()
    {
       $produit = $this->session->userdata("produit");
       foreach($produit as $key=>$val){
           echo $val["Categorie"]."<br>";
         /*
           if($val["Categorie"]=="OPTION_TV"){
               echo "<pre>";
               print_r($val);
               echo "</pre>";
           }  
          * 
          */         
       }
    }
    
    public function testDummy($num_tel)
    {
        $result = $this->Wsdl_interrogeligib->retrieveInfo($num_tel);
         if(!empty($result))
         {                        
            if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"]))
            {               
                 $produit = $result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"];
  
                foreach($produit as $val1){
                  if(!empty($val1["Valeurs"]["WS_Produit_Valeur"])){
                   foreach($val1["Valeurs"]["WS_Produit_Valeur"] as $key=>$val2){
                       if(is_array($val2)){
                           foreach($val2 as $key=>$val3){
                            switch($key){
                                 case "Dummy":
                                      echo "Dummy: ".$val3."<br>";
                                 break;
                                 case "Categorie":
                                      echo "Categorie: ".$val3.", ";
                                 break;
                                 case "Type":
                                      echo "Type: ".$val3.", ";
                                 break;
                                 case "Libelle":
                                     if(is_array($val3["string"])){
                                         foreach($val3["string"] as $val4){
                                              echo "Libelle: ".$val4.", ";
                                         }
                                     }else{
                                      echo "Libelle: ".$val3["string"].", ";
                                     }
                                 break;
                                 case "Tarif":
                                     echo "Tarif: ".$val3."<br>";
                                 break;
                             }
                           }
                       }else{
                           switch($key){
                               case "Dummy":
                                    echo "Dummy: ".$val2."<br>";
                               break;
                               case "Categorie":
                                    echo "Categorie: ".$val2.", ";
                               break;
                               case "Tarif":
                                   echo "Tarif: ".$val2."<br>";
                               break;
                           }

                       }
                   }
                  }
                }   
            }
         }
        
        
    }
}

/* End of file mon_offre.php */
/* Location: ./application/controllers/mon_offre.php */
