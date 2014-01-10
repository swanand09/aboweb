<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mon_offre extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
           // $this->output->enable_profiler(TRUE);
            $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index($num_tel="")
    {
         //verificaition session
        $prevState = $this->session->userdata("prevState");
        if(isset($prevState[1]["parrainage"])&&!empty($prevState[1]["parrainage"])){
            $prevState[1]["parrainage"] = "";
            $this->session->set_userdata('prevState',$prevState);
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
                                    'class'     => 'validate[required,custom[onlyNumberSp],minSize[6],maxSize[6]]',
                                    'maxlength'      => '6'
                                   
                              );
        $data['test_eligb_butt'] = array(
                                            'class'=>'rmv-std-btn btn-green',
                                            'name' => 'test_eligb_butt',
                                            'id' => 'test_eligb_butt',
                                            'type' => 'submit',
                                            'value' => 'TESTER'
                                      );
        
        $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/saisie_num",$data,true);
        
        //verifie si numero tel est saisi depuis la site box
        if(!empty($num_tel)){
             return $this->ajax_proc_interogeligib($num_tel);
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
           echo json_encode(array($this->contenuGauche,$this->colonneDroite,"error"=>$data["error"],"msg"=>"Veuillez saisir un autre numéro"));
           exit();
       }
        $data["num_tel"] = $num_tel; 
        $data["result"] = "";
       
        if($num_tel!=""&&$this->validateNum($num_tel))
        {   
            $this->data["racap_num"] = array('name' => 'recap_num','id' => 'ligne','type' => 'text','value' => $num_tel);
            $result = $this->Wsdl_interrogeligib->interrogeEligibilite($num_tel);
           
            if(!empty($result))
            {
                $data["result"] = $result;               
               if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"]))
               {                  
                    $data["error"]  = false;
                    $this->session->set_userdata("num_tel",$num_tel);
                    //$this->session->set_userdata('localite',$result["interrogeEligibiliteResult"]["Localite"]);
                    //$this->session->set_userdata('idParcours',$result["interrogeEligibiliteResult"]["Id"]);                  
                   // $this->session->set_userdata('offreparrainage_id',($result["interrogeEligibiliteResult"]["Catalogue"]["Autorise_parrainage"]=="true")?$result["interrogeEligibiliteResult"]["Catalogue"]["Offreparrainage_id"]:"");                  
                    $this->session->set_userdata('eligible_tv',$result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]);
                    //$this->session->set_userdata('ws_ville',$result["interrogeEligibiliteResult"]["Villes"]["WS_Ville"]);
                   // $this->session->set_userdata('produit',$result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"]);   
                    //$this->session->set_userdata('promo', utf8_encode($result["interrogeEligibiliteResult"]["Catalogue"]["Promo_libelle"]));
                    //$this->session->set_userdata('localite',$result["interrogeEligibiliteResult"]["Localite"]);
                    $this->session->set_userdata('context',$result["interrogeEligibiliteResult"]["Context"]);
                   // $this->session->set_userdata('dummyPanier',$this->Wsdl_interrogeligib->recupDummyPanier($result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"]));
                  
                    $disable_checkbox = $result["interrogeEligibiliteResult"]["Ligne"]["Eligible_degroupage_partiel"]=="false"?true:false;
                    
                    if($disable_checkbox ==false){  
                        $input1 = array('name' => 'redu_facture','id' => 'redu_facture','value' => 'true','checked'=> 'checked');
                        $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','disabled'=> 'disabled');   
                    }else
                    {
                        $input1 = array('name' => 'redu_facture','id' => 'redu_facture','value' => 'true','checked'=> 'checked','disabled'=> 'disabled');
                        //$input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel','value' => 'true','checked'=> 'checked'); 
                    }
                    
                    //PRODUIT PORTABILITE
                    if($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_dégroupage_total"]=="true"){                      
                         $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','checked'=> 'checked'); 
                    }
                     /*
                     if(isset($result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"])){
                        foreach($result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"] as $key=>$val){
                            if($val["Categorie"]=="PORTABILITE"){
                                $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','checked'=> 'checked'); 
                            }
                        }
                    }*/
                    
                    $data["input1"] = $input1;
                    $data["input2"] = $input2;                
                    $choix_forfait = array('class'=> 'rmv-std-btn btn-forward','name' => 'choix_forfait','id' => 'choix_forfait','type' => 'submit','value' => 'CHOISIR MON FORFAIT');   
                    $data["choix_forfait"] = $choix_forfait;                    
                    $this->colonneDroite["form_test_ligne"] = $this->load->view("general/form_test_ligne",$data,true);
                    
                    
                }
            }
      }  
      $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/num_eligib_info",$data,true);     
      $this->session->set_userdata("htmlContent_testeligib",$this->contenuGauche["contenu_html"]);      
      $this->session->set_userdata('prevState',array($this->contenuGauche,$this->colonneDroite));
      if($from_sitebox)
      {
         redirect("mon_offre");
      }
      //echo json_encode(array("htmlContent"  => $htmlContent,"contenuDroit1" => $contenuDroit1,"contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3));
     echo json_encode(array($this->contenuGauche,$this->colonneDroite,"error"=>$data["error"],"msg"=>"Le web service ne renvoie aucunes valeurs pour ce numéro "));
    }
    
    public function forfait()
    {         
       $this->controller_verifySessExp()? redirect('mon_offre'):"";     
       
       
       //reset session de type de faturation à null
       $this->session->set_userdata("type_de_facturation","");
       $this->session->set_userdata("typeFacture",array("facture","electronique"));
       
       $redu_facture  = $this->input->post('redu_facture'); 
       $this->session->set_userdata("redu_facture",$redu_facture);
       $consv_num_tel = $this->input->post('consv_num_tel'); 
       $this->session->set_userdata("consv_num_tel",$consv_num_tel);
       
       //connection à la fonctionalité recupere_info du wdsl
       $context = $this->session->userdata('context');
       $result = $this->Wsdl_interrogeligib->recupereOffre($context);
              
       $this->session->set_userdata('localite',$result["recupere_offreResult"]["Localite"]);
       $this->session->set_userdata('idParcours',$result["recupere_offreResult"]["Id"]); 
       $this->session->set_userdata('offreparrainage_id',($result["recupere_offreResult"]["Catalogue"]["Autorise_parrainage"]=="true")?$result["recupere_offreResult"]["Catalogue"]["Offreparrainage_id"]:"");                  
       $this->session->set_userdata('ws_ville',$result["recupere_offreResult"]["Villes"]["WS_Ville"]);
       $this->session->set_userdata('produit',$result["recupere_offreResult"]["Catalogue"]["Produits"]["WS_Produit"]);   
       $this->session->set_userdata('promo', utf8_encode($result["recupere_offreResult"]["Catalogue"]["Promo_libelle"]));
       $this->session->set_userdata('context',$result["recupere_offreResult"]["Context"]);
       $this->session->set_userdata('dummyPanier',$this->Wsdl_interrogeligib->recupDummyPanier($result["recupere_offreResult"]["Catalogue"]["Produits"]["WS_Produit"]));
     
      
       $produit =  $this->session->userdata("produit");
       $data["promo_libelle"] = $this->session->userdata("promo");       
       
       $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/forfait/ma_promo",$data,true);
       $counter = 1;
       $iadArr = array("Libelle"=>"","Tarif"=>"","Tarif_promo"=>"","Duree_mois_promo"=>"");
       $data["produit"] = $produit;
       
        foreach($produit as $key=>$val)
        {
           if($val["Categorie"]=="FORFAIT")
           {
             $choixArr = array('class'=>'rmv-std-btn btn-green','name' => 'button','id' => 'butt_'.$counter,"onclick" => "javascript:choixForfait(".$val["Id_crm"].")",'content' => 'CHOISIR');

             $data["val"] = $val;
             $data["choixArr"] = $choixArr;
             $data["counter"] = $counter; 
             $data["eligible_tv"] = $this->session->userdata("eligible_tv");
             $this->contenuGauche["contenu_html"] .= $this->load->view("monoffre/forfait/liste",$data,true);
             $counter++;
           }
           if($val["Categorie"]=="IAD")
           {
                $iadArr = array("Libelle"=>$val["Libelle"],"Tarif"=>$val["Tarif"],"Tarif_promo"=>$val["Tarif_promo"],"Duree_mois_promo"=>$val["Duree_mois_promo"],"Id_crm"=>$val["Id_crm"]);
                $this->session->set_userdata('tarifLocTvMod',$val["Tarif"]);
           }
        }
        $data["iadArr"] = $iadArr;
        $this->session->set_userdata('iad',$iadArr);
        $this->contenuGauche["contenu_html"] .= $this->load->view("monoffre/forfait/location_modem",$data,true);
        $this->session->set_userdata('htmlContent_forfait',$this->contenuGauche["contenu_html"]);
        $prevState = $this->session->userdata("prevState");
        $this->colonneDroite["form_test_ligne"] = $prevState[1]["form_test_ligne"];
        /*
        $data["degrouper"]   =  ($redu_facture=="true")?"Produit dégroupage total desiré":"Produit dégroupage partiel souscris";
        $data["portabilite"] =  ($consv_num_tel=="true"&&$redu_facture=="true")?"Produit portabilité souscris ":"Un autre numéro est desiré";   
        $this->colonneDroite["donnee_degroupage"] = $this->load->view("general/donnee_degroupage",$data,true);
        */
        if($this->colonneDroite["forfait_dummy1"]=="")
        {           
            $data["text"]  = '<p>Choisissez une offre...</p>';
           // $this->colonneDroite["offre_mediaserv"] = $this->load->view("general/offre_mediaserv",$data,true);
            $this->colonneDroite["forfait_dummy1"] = $this->load->view("general/forfait_dummy1",$data,true);
        }      
        
        
        //to review total
       $this->session->set_userdata('totalParMois',"");

       $this->session->set_userdata('prevState',array($this->contenuGauche,$this->colonneDroite));
      echo json_encode(array($this->contenuGauche,$this->colonneDroite));   
       
    } 
    
    public function prevState($page='')
    {
       
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        //$prevState =  $this->session->userdata("prevState"); 
        $redu_facture = $this->session->userdata("redu_facture");
        
        switch($page)
        {
            case "forfait":
                $htmlContent   = $this->session->userdata("htmlContent_forfait");
            break;
        
            case "test_eligib":
                $htmlContent   = $this->session->userdata("htmlContent_testeligib");
            break;
        }
       if(!empty($htmlContent)){
            if($redu_facture=="true"){
                $htmlContent = str_replace('<input type="checkbox" name="redu_facture" value="true" id="redu_facture"  />','<input type="checkbox" name="redu_facture" value="true" checked="checked" id="redu_facture"  />',$htmlContent);
            }else{
                $htmlContent = str_replace('<input type="checkbox" name="redu_facture" value="true" checked="checked" id="redu_facture"  />','<input type="checkbox" name="redu_facture" value="true" id="redu_facture"  />',$htmlContent);
            }
            $consv_num_tel = $this->session->userdata("consv_num_tel");
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
         $this->controller_verifySessExp()? redirect('mon_offre'):"";
         
         //initialiser les tarifs a zéro pour le panier
         $this->session->set_userdata('totalParMois',$this->totalParMois);
         $this->session->set_userdata("tarifBouqTv","");
         $this->session->set_userdata("tarifOptionEden","");
         $this->session->set_userdata("tarifOptionBein","");
          
         $prevState = $this->session->userdata("prevState");
         $data["promo_libelle"] = $this->session->userdata("promo");
         $this->iad = $this->session->userdata("iad");
         $data["iad"] = $this->iad;
         $data["totalParMois"] = $this->getTotal($this->iad["Tarif"]);
         $localite    = $this->session->userdata("localite");
         $dummyPanier = $this->session->userdata("dummyPanier");
  
            $id_crm = $this->input->post("id_crm");
            $produit =  $this->session->userdata("produit");           
            $this->colonneDroite["form_test_ligne"] = $prevState[1]["form_test_ligne"];
            $this->colonneDroite["donnee_degroupage"] = $prevState[1]["donnee_degroupage"];                  
            if(isset($produit)&&!empty($produit)){
                foreach($produit as $key=>$val)
                {
                  if($val["Categorie"]=="FORFAIT"&&$val["Id_crm"]==$id_crm)
                  {
                      //id crm forfait dummy1
                      $this->session->set_userdata("forfaitDummy1Crm",$id_crm);
                      $this->session->set_userdata("locationIadDummy4Crm",$this->iad["Id_crm"]);

                      $data["donne_forfait"]    = $val;
                      $data["totalParMois"] = $this->getTotal((($val["Tarif_promo"]>0)?$val["Tarif_promo"]:$val["Tarif"]));                 
                      $this->session->set_userdata("donne_forfait",$val);
                      $data["tarifLocTvMod"] = $this->session->userdata("tarifLocTvMod");
                      
                      //$data["eligible_tv"] = $this->session->userdata("eligible_tv");
                      $this->colonneDroite["forfait_dummy1"]               = $this->load->view("general/forfait_dummy1",$data,true);
                      $this->colonneDroite["libelles_promo_dummy2"]        = $this->load->view("general/libelles_promo_dummy2",$data,true);

                      //location modem
                      $this->colonneDroite["location_equipements_dummy4"]  = $this->load->view("general/location_equipements_dummy4",$data,true);

                      $this->colonneDroite["frais_activation_facture_dummy7"] = $this->load->view("general/frais_oneshot_dummy7",$data,true);
                      //$this->colonneDroite["envoie_facture_dummy6"]  = $this->load->view("general/type_facturation_dummy6",$data,true);
                       
                  }     
                  if($val["Categorie"]=="TELEVISION")
                  { 
                      $data["duree_mois_promo"]         = $val["Duree_mois_promo"];
                      $data["decodeur_tv_tarif"]        = $val["Tarif"];
                      $data["decodeur_tv_promo_tarif"]  = $val["Tarif_promo"];

                  }
                }         
            }
            
            $data["dummyPanier"] = $dummyPanier;
         $bouqTvArr = array(); $optionTvArr = array();$vodPvrArr = array();
         if(isset($dummyPanier)&&!empty($dummyPanier)){
            foreach($dummyPanier as $key=>$val){
               if(!empty($val)){
                   switch($key){
                       case "dummy1":
                              $redu_facture = $this->session->userdata("redu_facture");
                              if($redu_facture!='true'){
                                  foreach($val as $val2){
                                    if($val2["Valeurs"]["Categorie"]=="DEGROUPAGE"){ 
                                        $data["dum1_degroup_tarif"] = $val2["Valeurs"]["Tarif"]["decimal"];
                                        $data["dum1_degroup_libelle"] = $val2["Valeurs"]["Libelle"]["string"];   
                                        $data["totalParMois"] = $this->getTotal($val2["Valeurs"]["Tarif"]["decimal"]);
                                        $this->session->set_userdata("degroupageDummy1Crm",$val2["Id_crm"]);
                                        $this->colonneDroite["donnee_degroupage"]            = $this->load->view("general/donnee_degroupage",$data,true);
                                    }  
                                 }
                              }
                              
                       break;
                       case "dummy3":                           
                              foreach($val as $val2){
                                  switch($val2["Valeurs"]["Categorie"]){
                                      case "BOUQUET_TV":
                                          array_push($bouqTvArr, array(
                                                                        $val2["Valeurs"]["Libelle"]["string"]=>array(
                                                                                                                        "tarif"     => $val2["Valeurs"]["Tarif"]["decimal"],
                                                                                                                        "picto"     => $val2["Valeurs"]["Picto"],
                                                                                                                        "id_crm"    => $val2["Id_crm"],
                                                                                                                        "id_web"    => $val2["Valeurs"]["Id_web"],
                                                                                                                        "promo"     => array(
                                                                                                                                         "Tarif_promo"      =>  $val2["Tarif_promo"],
                                                                                                                                         "Duree_mois_promo" =>  $val2["Duree_mois_promo"]
                                                                                                                                        )
                                                                                                                     )
                                                                       )
                                                      );
                                      break;
                                      case "OPTION_TV":
                                          array_push($optionTvArr, array(
                                                                         $val2["Valeurs"]["Libelle"]["string"]=>array(
                                                                                                                         "tarif"     => $val2["Valeurs"]["Tarif"]["decimal"],
                                                                                                                         "picto"     => $val2["Valeurs"]["Picto"],
                                                                                                                         "id_crm"    => $val2["Id_crm"],
                                                                                                                         "id_web"    => $val2["Valeurs"]["Id_web"],
                                                                                                                         "promo"     => array(
                                                                                                                                                "Tarif_promo"=>$val2["Tarif_promo"],
                                                                                                                                                "Duree_mois_promo"=>$val2["Duree_mois_promo"]
                                                                                                                                             )
                                                                                                                      )
                                                                        )
                                                      );
                                      break;
                                      case "VOD_PVR":
                                           array_push($vodPvrArr, array(
                                                                        $val2["Valeurs"]["Libelle"]["string"]=>array(
                                                                                                                     "tarif"=>$val2["Valeurs"]["Tarif"]["decimal"],
                                                                                                                     "picto"=>$val2["Valeurs"]["Picto"],
                                                                                                                     "id_crm"    => $val2["Id_crm"],
                                                                                                                     "id_web"    => $val2["Valeurs"]["Id_web"],
                                                                                                                     "promo"=>array(
                                                                                                                                     "Tarif_promo"=>$val2["Tarif_promo"],
                                                                                                                                     "Duree_mois_promo"=>$val2["Duree_mois_promo"])
                                                                                                                                   )
                                                                                                                     
                                                                                                                  )
                                                   );
                                      break;
                                  }
                              }
                             
                       break;
                       case "dummy4":
                               $data["dummy4"] = $dummyPanier["dummy4"];
                              foreach($val as $val2){
                                $data["tarif_loca_decod"] = ($val2["Valeurs"]["Categorie"]=="STB")?"dummy4_".$val2["Valeurs"]["Tarif"]["decimal"]:"dummy4_0";                                
                                $data["tarif_activ_servicetv"] = "dummy7_";
                              }
                              $this->colonneDroite["location_equipements_dummy4"]  = $this->load->view("general/location_equipements_dummy4",$data,true);
                       break;
                       case "dummy5":  //caution
                              foreach($val as $val2){
                                   //$data["caution_dummy5"] = $val2["Tarif"]; 
                                   $this->session->set_userdata("caution_dummy5",$val2["Valeurs"]["Tarif"]["decimal"]);
                                   //$data["total1erFact"]   = $this->session->userdata('totalParMois')+$val2["Valeurs"]["Tarif"]["decimal"][0]; 
                                   $total1erFact = $this->session->userdata('totalParMois')+$val2["Valeurs"]["Tarif"]["decimal"][0]; 
                                   $this->session->set_userdata("total1erFact",$total1erFact );
                                   //$data["total2emeFact"] = $this->session->userdata('totalParMois')+$val2["Valeurs"]["Tarif"]["decimal"][1];
                                   $total2emeFact = $this->session->userdata('totalParMois')+$val2["Valeurs"]["Tarif"]["decimal"][1];
                                   $this->session->set_userdata("total2emeFact",$total2emeFact );
                                   // $this->colonneDroite["caution_decodeur_dummy5"] = $this->load->view("general/caution_dummy5",$data,true);  
                              }
                       break;
                       case "dummy7":  //oneshot
                              foreach($val as $val2){
                                     $data["tarif_loca_decod"] = "dummy4_";
                                     $data["tarif_activ_servicetv"] = "dummy7_".$val2["Valeurs"]["Tarif"]["decimal"];
                                     $data["total1erFact"]   = $this->session->userdata('total1erFact')+$val2["Valeurs"]["Tarif"]["decimal"];
                                }
                       break;
                   }
                }
            }
         }
           $data["bouqTvArr"] = $bouqTvArr;  $data["optionTvArr"] = $optionTvArr; $data["vodPvr"] = $vodPvrArr; 
           $this->session->set_userdata("bouquetTv",$bouqTvArr);
           $this->session->set_userdata("vodPvr",$vodPvrArr); 
           $this->session->set_userdata("optionTv",$optionTvArr);
           
            //Go to bouquet tv or mes coordonnes 
            //if($count_tv>0){
           $this->colonneDroite["total_par_mois"]  = $this->load->view("general/total_mois",$data,true);   
           
            if(!empty($bouqTvArr)){
                $this->load->model('stb_model','stb'); 
                $data["base_url_stb"] = BASEPATH_STB;
                $data["bouquet_list"] = $this->stb->retrievChainesList(array("bouquetTv"=>$bouqTvArr,"optionTv"=>$optionTvArr));
                //$data["location_equipements_dummy4"] = $prevState[1]["location_equipements_dummy4"];
                $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/tv/liste_bouquets",$data,true);    
                $this->session->set_userdata('prevState',array($this->contenuGauche,$this->colonneDroite));
                
            }else{
                $this->contenuGauche["contenu_html"] = "redirect to mes coordonnees";
                
                $offreparrainage_id = $this->session->userdata('offreparrainage_id');
                if(!empty($offreparrainage_id))
                $this->colonneDroite["parrainage"] = $this->load->view("general/parrainage",$data,true);
                 
                $this->session->set_userdata('prevState',array(array("contenu_html"=>$this->session->userdata("htmlContent_forfait")),$this->colonneDroite));                
            }
            
            echo json_encode(array($this->contenuGauche,$this->colonneDroite));

    }  
    
    //update tv decodeur
    
    public function updateTvDecodeur()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        $prevState = $this->session->userdata("prevState");
        $beneficierTv =  $this->input->post("beneficierTv");
        $decoder_tv   =  $this->input->post('decoder_tv');    
        $data["decoder_tv"]    = $decoder_tv; 
        //affiche icon tv dans le forfait
        $data["donne_forfait"] = $this->session->userdata("donne_forfait");
        $data["eligible_tv"] = $this->session->userdata("eligible_tv");            
        $prevState[1]["forfait_dummy1"] = $this->load->view("general/forfait_dummy1",$data,true);
        
        $beneficierTv  = explode("_",$beneficierTv); 
        $dummyPanier = $this->session->userdata("dummyPanier");
        
        //les tarifs bouquets tv dans le cas décocher
        $tarifBouqTv = $this->session->userdata("tarifBouqTv");
        if(!empty($tarifBouqTv)){
           $data["totalParMois"] = $this->getTotal(-$tarifBouqTv); 
           $this->session->set_userdata("tarifBouqTv","");
        }
        
        $data["iad"] = $this->session->userdata("iad");
        switch($beneficierTv[0]){
            case "dummy4":
                   $data["beneficierTv"]  = $beneficierTv[1];
                   $data["oneshot_dummy7"] = "";
                   $data["dummy4"] = $dummyPanier["dummy4"];
                   $prevState[1]["location_equipements_dummy4"] = $this->load->view("general/location_equipements_dummy4",$data,true);
                   $prevState[1]["frais_activation_facture_dummy7"] = $this->load->view("general/frais_oneshot_dummy7",$data,true);
                                
                   //total par mois
                   $data["totalParMois"] = $this->getTotal(($decoder_tv!="uncheck")?$beneficierTv[1]:-$beneficierTv[1]);
                   
                   //mettre $locationDecTvDummy4Crm en session
                   foreach($dummyPanier["dummy4"] as $key=>$val){
                       if($val["Valeurs"]["Categorie"]=="STB"){
                           $this->session->set_userdata("locationDecTvDummy4Crm",($decoder_tv!="uncheck")?$val["Id_crm"]:"");
                       }
                   }
                   
            break;
            case "dummy7":
                   $data["beneficierTv"]  = "";
                   $data["dummy7"] = $dummyPanier["dummy7"];
                   $data["oneshot_dummy7"] = $beneficierTv[1];
                   $prevState[1]["location_equipements_dummy4"] = $this->load->view("general/location_equipements_dummy4",$data,true);
                   $prevState[1]["frais_activation_facture_dummy7"] = $this->load->view("general/frais_oneshot_dummy7",$data,true);
                   
                    //total par mois
                   $data["totalParMois"] = $this->session->userdata('totalParMois');
                   
                   //mettre oneshotDummy7Crm en session
                   foreach($dummyPanier["dummy7"] as $key=>$val){
                       $this->session->set_userdata("oneshotDummy7Crm",($decoder_tv!="uncheck")?$val["Id_crm"]:"");
                   }
            break;
        }
        
        //total 1ere facture
        $caution_dummy5 = $this->session->userdata("caution_dummy5");
        $this->session->set_userdata("oneshot_dummy7",$data["oneshot_dummy7"]);
        $data["total1erFact"]  = ($decoder_tv=="uncheck")?"":$data["totalParMois"]+$data["oneshot_dummy7"]+$caution_dummy5[0];
        //total 2eme facture
        $data["total2emeFact"] = ($decoder_tv=="uncheck")?"":$data["totalParMois"]+$caution_dummy5[1];
        
        //caution decodeur
        $prevState[1]["caution_decodeur_dummy5"] = "";
        $data["caution_dummy5"] = $caution_dummy5;
        if(!empty($data["caution_dummy5"])){    
             $data["dummy5"] = $dummyPanier["dummy5"];
            $prevState[1]["caution_decodeur_dummy5"] = ($decoder_tv=="uncheck")?"": $this->load->view("general/caution_dummy5",$data,true);  
        }
        
        $prevState[1]["total_par_mois"]       = $this->load->view("general/total_mois",$data,true);
        $data["vodPvr"] = $this->session->userdata("vodPvr");
        $data["bouquetTv"] = "";
        $data["dummy3"]="";
        $prevState[1]["options_dummy3"]    = ($decoder_tv=="uncheck")?"":$this->load->view("general/options_dummy3",$data,true);;
        $this->session->set_userdata('prevState',$prevState);            
        echo json_encode($prevState[1]);
    }
    
    //dummy3 update bouquet
    public function updateBouquet(){
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        $bouquetChoisi =  $this->input->post("bouquetChoisi");
        $data["bouquetTv"] = $this->session->userdata("bouquetTv");
         
        //verifier si les options en session contiennent des valeurs
        $tarifOptionEden = $this->session->userdata("tarifOptionEden"); 
        $tarifOptionBein = $this->session->userdata("tarifOptionBein");
                
        if(!empty($bouquetChoisi)){
            //$this->session->set_userdata("bouquetTv",$bouquetTv); 
            $bouquetChoisi = explode("_",$bouquetChoisi); 
            $tarifBouqTv = $this->session->userdata("tarifBouqTv");
            if(!empty($tarifBouqTv)){
              $data["totalParMois"] = $this->getTotal(-$tarifBouqTv);
              $this->session->set_userdata("tarifBouqTv","");
              $data["totalParMois"] = $this->getTotal(-$tarifOptionEden);
              $this->session->set_userdata("tarifOptionEden",""); 
              $data["totalParMois"] = $this->getTotal(-$tarifOptionBein);
              $this->session->set_userdata("tarifOptionBein","");
              
             //mettre les Id_crm en session 
             $this->session->set_userdata("bouquetTvDummy3Crm","");
             $this->session->set_userdata("optionTvEdenDummy3Crm","");
             $this->session->set_userdata("optionTvBeinDummy3Crm","");
             $this->session->set_userdata("vodPvrOneshotDummy3Crm","");
             $this->session->set_userdata("vodPvrRecurrentDummy3Crm","");
            }
            $data["totalParMois"] = $this->getTotal($bouquetChoisi[1]);
            if(!empty($bouquetChoisi[3])&&$bouquetChoisi[3]!="inclus")
            {
                 $data["totalParMois"] = $this->getTotal($bouquetChoisi[3]);
            }    
             if(!empty($bouquetChoisi[4])&&$bouquetChoisi[4]!="inclus")
            {
                 $data["totalParMois"] = $this->getTotal($bouquetChoisi[4]);
            } 
            $this->session->set_userdata("tarifBouqTv",$bouquetChoisi[1]); 
            
             $dummyPanier = $this->session->userdata("dummyPanier");
             $data["dummy3"] = $dummyPanier["dummy3"];
             //mettre les Id_crm en session
              foreach($dummyPanier["dummy3"] as $key=>$val){ 
                  switch($val["Valeurs"]["Categorie"]){
                      case "BOUQUET_TV": //bouquetTvDummy3Crm;               
                          if($val["Valeurs"]["Tarif"]==$bouquetChoisi[1]){
                              $this->session->set_userdata("bouquetTvDummy3Crm",$val["Id_crm"]);
                          }
                      break;  
                      case "OPTION_TV": //optionTvEdenDummy3Crm;               
                          switch($val["Valeurs"]["Libelle"]["string"]){
                            case "Eden":
                                $this->session->set_userdata("optionTvEdenDummy3Crm",$val["Id_crm"]);    
                            break;
                            case "BeIN Sport":
                                    $this->session->set_userdata("optionTvBeinDummy3Crm",$val["Id_crm"]);    
                            break;
                          }
                         
                      break;
                      case "VOD_PVR": //vodPvrDummy3Crm;  
                         switch($val["Valeurs"]["Type"])
                         {
                            case "ONESHOT":  //Enregistreur numérique
                                $this->session->set_userdata("vodPvrOneshotDummy3Crm",$val["Id_crm"]);
                            break;
                            case "RECURRENT":  // Vidéo à la demande
                                $this->session->set_userdata("vodPvrRecurrentDummy3Crm",$val["Id_crm"]);
                            break;
                         }
                      break; 
                  }
               
              }
           // $data["vodTarif"]       = $bouquetTv[3];
           // $data["numriquEnreg"]   = $bouquetTv[4];
         }
        
        //total 1ere facture
        $caution_dummy5 = $this->session->userdata("caution_dummy5");
        $data["oneshot_dummy7"] = $this->session->userdata("oneshot_dummy7");
        $data["total1erFact"]  = $data["totalParMois"]+$data["oneshot_dummy7"]+$caution_dummy5[0];
        //total 2eme facture
        $data["total2emeFact"] = $data["totalParMois"]+$caution_dummy5[1];                    
 
         
        $prevState = $this->session->userdata("prevState");
        $prevState[1]["options_dummy3"] = $this->load->view("general/options_dummy3",$data,true);
        $prevState[1]["total_par_mois"] = $this->load->view("general/total_mois",$data,true);
        $this->session->set_userdata("prevState",$prevState);
        echo json_encode(array("options_dummy3"=>$prevState[1]["options_dummy3"],"total_par_mois"=>$prevState[1]["total_par_mois"]));
    }
    
    //dummy3 update option
    public function updateOptions(){
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        $data["bouquetTv"] = $this->session->userdata("bouquetTv");
        $data["tarifOptionEden"] = $this->session->userdata("tarifOptionEden");
        $data["tarifOptionBein"] = $this->session->userdata("tarifOptionBein");
        $optionTv =  $this->input->post("optionTv");
        $checkOption =  $this->input->post("checkOption");
        $data["optionTv"] = $optionTv;
        
        $dummyPanier = $this->session->userdata("dummyPanier");
        $data["dummy3"] = $dummyPanier["dummy3"];
        
        foreach($dummyPanier["dummy3"] as $key=>$val){ 
                if($val["Valeurs"]["Categorie"]=="OPTION_TV"){
              //optionTvEdenDummy3Crm;               
                    switch($val["Valeurs"]["Libelle"]["string"]){
                      case "Eden":
                          $this->session->set_userdata("optionTvEdenDummy3Crm",$val["Valeurs"]["Id_crm"]);    
                      break;
                      case "BeIN Sport":
                              $this->session->set_userdata("optionTvBeinDummy3Crm",$val["Valeurs"]["Id_crm"]);    
                      break;
                    }
                }
         }
        
         if(!empty($optionTv)){           
            $optionTv = explode("_",$optionTv); 
            switch($optionTv[0]){
                case "Eden":
                    $tarifOptionEden = $this->session->userdata("tarifOptionEden");
                    if(!empty($tarifOptionEden)&&$checkOption=="uncheck"){
                      $data["totalParMois"] = $this->getTotal(-$tarifOptionEden);
                      $this->session->set_userdata("tarifOptionEden","");
                      
                      //unset les id_crm 
                      $this->session->set_userdata("optionTvEdenDummy3Crm","");
            
                    }else{
                        $data["totalParMois"] = $this->getTotal($optionTv[1]);
                        $this->session->set_userdata("tarifOptionEden",$optionTv[1]);
                    }
                    $data["tarifOptionEden"] = $this->session->userdata("tarifOptionEden");
                break;
                case "BeIN Sport":
                    $tarifOptionBein = $this->session->userdata("tarifOptionBein");
                    if(!empty($tarifOptionBein)&&$checkOption=="uncheck"){
                      $data["totalParMois"] = $this->getTotal(-$tarifOptionBein);
                      $this->session->set_userdata("tarifOptionBein","");
                      
                       $this->session->set_userdata("optionTvBeinDummy3Crm","");
                    }else{
                        $data["totalParMois"] = $this->getTotal($optionTv[1]);
                        $this->session->set_userdata("tarifOptionBein",$optionTv[1]);
                    }
                    $data["tarifOptionBein"] = $this->session->userdata("tarifOptionBein");
                break;
            }        
         }
        
       //total 1ere facture
        $caution_dummy5 = $this->session->userdata("caution_dummy5");
        $data["oneshot_dummy7"] = $this->session->userdata("oneshot_dummy7");
        $data["total1erFact"]  = $data["totalParMois"]+$data["oneshot_dummy7"]+$caution_dummy5[0];
        //total 2eme facture
        $data["total2emeFact"] = $data["totalParMois"]+$caution_dummy5[1];     
         
         
        $prevState = $this->session->userdata("prevState");
        $prevState[1]["options_dummy3"] = $this->load->view("general/options_dummy3",$data,true);
        $prevState[1]["total_par_mois"] = $this->load->view("general/total_mois",$data,true);
        $this->session->set_userdata("prevState",$prevState);
        echo json_encode(array("options_dummy3"=>$prevState[1]["options_dummy3"],"total_par_mois"=>$prevState[1]["total_par_mois"]));
    }
    
    //got to mes coordonnes
    public function mesCoordonnes()
    {
         $data["test"] = "ok";   
         $prevState = $this->session->userdata("prevState");
         $offreparrainage_id = $this->session->userdata('offreparrainage_id');
         
         if(!empty($offreparrainage_id))
         $prevState[1]["parrainage"] = $this->load->view("general/parrainage",$data,true);
         
         $this->session->set_userdata('prevState',$prevState);
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
