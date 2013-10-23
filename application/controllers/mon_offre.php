<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mon_offre extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index($num_tel="")
    {
        
        $this->data["userdata"] = $this->session->all_userdata();       
        $data['num_tel'] = array(
                                        'name' => 'num_tel',
                                        'id' => 'ligne',
                                        'type' => 'text',
                                        'class' => 'validate[required,custom[onlyNumberSp],minSize[14],maxSize[14]]',
                                        'value' => $this->determine_location()  //recuperation department 
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
       
        return $this->controller_test_eligib_vue($num_tel);                
    }
   
    //geolocalisation basant sur ip
    public function determine_location()
    {
       $this->load->model('geolocalisation_model','geoloca'); 
       switch($this->geoloca->getDepartment()){
            case "Martinique":
                return "0596";
            break;

            case "Guadeloupe":
                return "0590";
            break;

            case "Reunion":
                return "0262";
            break;

            case "Guyane":
                return "0594";
            break;

            case "Iles du Nord":
               return "0605";
            break;
            default: return "0590";
       }
       
    }
    
    //connection avec le webservice fontionalite interrogeEligibilite - ajax
    public function ajax_proc_interogeligib($num_tel="")
    {
        $from_sitebox  = false;   
       (empty($num_tel))?$num_tel = str_replace(' ', '', $this->input->post('num_tel')):$from_sitebox = true;
        
        $data["num_tel"] = $num_tel; 
        $data["result"] = "";
        if($num_tel!="")
        {       
            $this->data["racap_num"] = array('name' => 'recap_num','id' => 'ligne','class' => 'validate[required,custom[onlyNumberSp],minSize[14],maxSize[14]]','type' => 'text','value' => $num_tel);
            $result = $this->Wsdl_interrogeligib->retrieveInfo($num_tel);
            if(!empty($result))
            {
                $data["result"] = $result;               
               if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"]))
               {                  
                    $this->session->set_userdata('localite',$result["interrogeEligibiliteResult"]["Localite"]);
                    $this->session->set_userdata('idParcours',$result["interrogeEligibiliteResult"]["Id"]);
                    $this->session->set_userdata('offreparrainage_id',$result["interrogeEligibiliteResult"]["Catalogue"]["Offreparrainage_id"]);
                    $this->session->set_userdata('eligible_tv',$result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]);
                    $this->session->set_userdata('ws_ville',$result["interrogeEligibiliteResult"]["Villes"]["WS_Ville"]);
                    $this->session->set_userdata('produit',$result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"]);   
                    $this->session->set_userdata('promo', utf8_encode($result["interrogeEligibiliteResult"]["Catalogue"]["Promo_libelle"]));
                    $this->session->set_userdata('localite',$result["interrogeEligibiliteResult"]["Localite"]);
                    $this->session->set_userdata('dummyPanier',$this->Wsdl_interrogeligib->recupDummyPanier($result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"]));
                    
                    
                    $disable_checkbox = $result["interrogeEligibiliteResult"]["Ligne"]["Eligible_degroupage_partiel"]=="false"?true:false;
                    
                    if($disable_checkbox ==false){
                        $input1 = array('name' => 'redu_facture','id' => 'redu_facture','value' => 'true','checked'=> 'checked');
                       // $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','disabled'=> 'disabled');   
                    }else
                    {
                        $input1 = array('name' => 'redu_facture','id' => 'redu_facture','value' => 'true','checked'=> 'checked','disabled'=> 'disabled');
                        //$input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel','value' => 'true','checked'=> 'checked'); 
                    }
                    
                    //PRODUIT PORTABILITE
                     $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','disabled'=> 'disabled'); 
                     foreach($result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"] as $key=>$val){
                        if($val["Categorie"]=="PORTABILITE"){
                            $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','checked'=> 'checked'); 
                        }
                    }
                    
                    $data["input1"] = $input1;
                    $data["input2"] = $input2;                
                    $choix_forfait = array('class'=> 'rmv-std-btn btn-forward','name' => 'choix_forfait','id' => 'choix_forfait','type' => 'submit','value' => 'Choisir mon forfait');   
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
     echo json_encode(array($this->contenuGauche,$this->colonneDroite));
    }
    
    public function forfait()
    { 
        $this->controller_verifySessExp()? redirect('mon_offre'):"";         
        $redu_facture  = $this->input->post('redu_facture'); 
        $this->session->set_userdata("redu_facture",$redu_facture);
        $consv_num_tel = $this->input->post('consv_num_tel'); 
        $this->session->set_userdata("consv_num_tel",$consv_num_tel);
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
                $iadArr = array("Libelle"=>$val["Libelle"],"Tarif"=>$val["Tarif"],"Tarif_promo"=>$val["Tarif_promo"],"Duree_mois_promo"=>$val["Duree_mois_promo"]);
                $this->session->set_userdata('tarifLocTvMod',$val["Tarif"]);
            }
        }
        $data["iadArr"] = $iadArr;
        $this->session->set_userdata('iad',$iadArr);
        $this->contenuGauche["contenu_html"] .= $this->load->view("monoffre/forfait/location_modem",$data,true);
        $this->session->set_userdata('htmlContent_forfait',$this->contenuGauche["contenu_html"]);
        $prevState = $this->session->userdata("prevState");
        $this->colonneDroite["form_test_ligne"] = $prevState[1]["form_test_ligne"];

        $data["degrouper"]   =  ($redu_facture=="true")?"Produit dégroupage total desiré":"Produit dégroupage partiel souscris";
        $data["portabilite"] =  ($consv_num_tel=="true"&&$redu_facture=="true")?"Produit portabilité souscris ":"Un autre numéro est desiré";   
        $this->colonneDroite["donnee_degroupage"] = $this->load->view("general/donnee_degroupage",$data,true);
        
        if($this->colonneDroite["forfait_dummy1"]=="")
        {           
            $data["text"]  = '<p>Choisissez une offre...</p>';
           // $this->colonneDroite["offre_mediaserv"] = $this->load->view("general/offre_mediaserv",$data,true);
            $this->colonneDroite["forfait_dummy1"] = $this->load->view("general/forfait_dummy1",$data,true);
        }      
       
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
        
        if($redu_facture=="true")
        {
            $htmlContent = str_replace('<input type="checkbox" name="redu_facture" value="true" id="redu_facture"  />','<input type="checkbox" name="redu_facture" value="true" checked="checked" id="redu_facture"  />',$htmlContent);
        }else
        {
            $htmlContent = str_replace('<input type="checkbox" name="redu_facture" value="true" checked="checked" id="redu_facture"  />','<input type="checkbox" name="redu_facture" value="true" id="redu_facture"  />',$htmlContent);
        }
        $consv_num_tel = $this->session->userdata("consv_num_tel");
        if($consv_num_tel=="true")
        {
            $htmlContent = str_replace('<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel"  />','<input type="checkbox" name="consv_num_tel" value="true" checked="checked" id="consv_num_tel"  />',$htmlContent);
        }else
        {
           $htmlContent = str_replace('<input type="checkbox" name="consv_num_tel" value="true" checked="checked" id="consv_num_tel"  />','<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel"  />',$htmlContent);
        }
       // echo utf8_encode(utf8_decode($htmlContent));
        echo $htmlContent;
    }
    
    public function refreshRecapCol()
    {
         $this->controller_verifySessExp()? redirect('mon_offre'):""; 
         $this->session->set_userdata('totalParMois',$this->totalParMois);
         $prevState = $this->session->userdata("prevState");
         $data["promo_libelle"] = $this->session->userdata("promo");
         $this->iad = $this->session->userdata("iad");
         $data["iad"] = $this->iad;
         $data["totalParMois"] = $this->getTotal($this->iad["Tarif"]);
         $localite    = $this->session->userdata("localite");
         $dummyPanier = $this->session->userdata("dummyPanier");
          if(isset($dummyPanier["dummy6"])){
            foreach($dummyPanier["dummy6"] as $val){
                $data["totalParMois"] = $this->getTotal($val["Tarif"]);             
            }
         }
         $data["dummyPanier"] = $dummyPanier;
        
         foreach($dummyPanier as $key=>$val){
            if(!empty($val)){
                switch($key){
                    case "dummy1":
                           foreach($val as $val2){
                              if($val2["Categorie"]=="DEGROUPAGE"){ 
                                  $data["dum1_degroup_tarif"] = $val2["Tarif"];
                                  $data["dum1_degroup_libelle"] = $val2["Libelle"]["string"];   
                                  $data["totalParMois"] = $this->getTotal($val2["Tarif"]);
                              }  
                           }
                    break;
                    case "dummy4":
                           foreach($val as $val2){
                                $data["tarif_loca_decod"] = ($val2["Categorie"]=="STB")?"dummy4_".$val2["Tarif"]:"dummy4_0";                                
                                $data["tarif_activ_servicetv"] = "dummy7_";
                           }
                    break;
                    case "dummy5":
                           foreach($val as $val2){
                                $data["caution_dummy5"] = $val2["Tarif"];   
                                $data["totalParMois"] = $this->getTotal($val2["Tarif"]);       
                                $this->colonneDroite["caution_decodeur_dummy5"] = $this->load->view("general/caution_dummy5",$data,true);  
                           }
                    break;
                    case "dummy7":
                           foreach($val as $val2){
                                  $data["tarif_loca_decod"] = "dummy4_";
                                  $data["tarif_activ_servicetv"] = "dummy7_".$val2["Tarif"];
                           }
                    break;
                }
             }
         }
          

            $id_crm = $this->input->post("id_crm");
            $produit =  $this->session->userdata("produit");           
            $this->colonneDroite["form_test_ligne"] = $prevState[1]["form_test_ligne"];
            $this->colonneDroite["donnee_degroupage"] = $prevState[1]["donnee_degroupage"];                  
            foreach($produit as $key=>$val)
            {
              if($val["Categorie"]=="FORFAIT"&&$val["Id_crm"]==$id_crm)
              {
                  $data["donne_forfait"]    = $val;
                  $data["totalParMois"] = $this->getTotal((($val["Tarif_promo"]>0)?$val["Tarif_promo"]:$val["Tarif"]));                 
                  $this->session->set_userdata("donne_forfait",$val);
                  $data["tarifLocTvMod"] = $this->session->userdata("tarifLocTvMod");
                  
                  $this->colonneDroite["forfait_dummy1"]               = $this->load->view("general/forfait_dummy1",$data,true);
                  $this->colonneDroite["libelles_promo_dummy2"]        = $this->load->view("general/libelles_promo_dummy2",$data,true);
                  
                  //location modem
                  $this->colonneDroite["location_equipements_dummy4"]  = $this->load->view("general/location_equipements_dummy4",$data,true);
                  
                  $this->colonneDroite["frais_activation_facture_dummy7"] = $this->load->view("general/frais_oneshot_dummy7",$data,true);
                  $this->colonneDroite["envoie_facture_dummy6"]  = $this->load->view("general/type_facturation_dummy6",$data,true);
                  $this->colonneDroite["total_par_mois"]  = $this->load->view("general/total_mois",$data,true);    
              }            
            }         
            
            $data["tarif_ultra"] = 0;
            $data["tarif_giga"] = 0;
            $data["tarif_mega"] = 0;
            $count_tv = 0;
            foreach($produit as $key=>$val)
            {
               if($val["Categorie"]=="BOUQUET_TV"){
                   switch($val["Libelle"])
                   {
                       case "Bouquet Ultra":
                           $data["tarif_ultra"] = $val["Tarif"];
                           break;
                        case "Bouquet Giga":
                            $data["tarif_giga"] = $val["Tarif"];
                           break;
                        case "Bouquet Méga":
                            $data["tarif_mega"] = $val["Tarif"];
                           break;
                   }
                   $count_tv++;
               }
               
            }
            
            //Go to bouquet tv or mes coordonnes 
            if($count_tv>0){
                $this->load->model('stb_model','stb'); 
                $data["base_url_stb"] = BASEPATH_STB;
                $data["bouquet_list"] = $this->stb->retrievChainesList();
                $data["location_equipements_dummy4"] = $prevState[1]["location_equipements_dummy4"];
                $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/tv/liste_bouquets",$data,true);    
                $this->session->set_userdata('prevState',array($this->contenuGauche,$this->colonneDroite));
            }else{
                $this->contenuGauche["contenu_html"] = "redirect to mes coordonnees";
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
        $beneficierTv  = explode("_",$beneficierTv);             
        $data["decoder_tv"]    = $decoder_tv; 
        $data["totalParMois"] = $this->getTotal(($decoder_tv!="uncheck")?$beneficierTv[1]:-$beneficierTv[1]);
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
                   $prevState[1]["location_equipements_dummy4"] = $this->load->view("general/location_equipements_dummy4",$data,true);
                   $prevState[1]["frais_activation_facture_dummy7"] = $this->load->view("general/frais_oneshot_dummy7",$data,true);
            break;
            case "dummy7":
                   $data["beneficierTv"]  = "";
                   $data["oneshot_dummy7"] = $beneficierTv[1];
                   $prevState[1]["location_equipements_dummy4"] = $this->load->view("general/location_equipements_dummy4",$data,true);
                   $prevState[1]["frais_activation_facture_dummy7"] = $this->load->view("general/frais_oneshot_dummy7",$data,true);
            break;
        }

        $prevState[1]["total_par_mois"]       = $this->load->view("general/total_mois",$data,true);
        $prevState[0]["contenu_html"] = $this->load->view("monoffre/tv/liste_bouquets",$data,true);
        //$this->session->set_userdata('prevState',$prevState);            
        echo json_encode(array("location_equipements_dummy4"=>$prevState[1]["location_equipements_dummy4"],"frais_activation_facture_dummy7"=>$prevState[1]["frais_activation_facture_dummy7"],"total_par_mois"=>$prevState[1]["total_par_mois"]));
    }
    
    //dummy3 update bouquet
    public function updateOptions(){
        $this->controller_verifySessExp()? redirect('mon_offre'):""; 
        $bouquetTv =  $this->input->post("bouquetTv");
        $data["bouquetTv"] = $bouquetTv;
         if(!empty($bouquetTv)){
            $bouquetTv = explode("_",$bouquetTv); 
            $tarifBouqTv = $this->session->userdata("tarifBouqTv");
            if(!empty($tarifBouqTv)){
              $data["totalParMois"] = $this->getTotal(-$tarifBouqTv);
              $this->session->set_userdata("tarifBouqTv","");
            }
            $data["totalParMois"] = $this->getTotal($bouquetTv[1]);
            $this->session->set_userdata("tarifBouqTv",$bouquetTv[1]);           
         }
        $prevState = $this->session->userdata("prevState");
        $prevState[1]["options_dummy3"] = $this->load->view("general/options_dummy3",$data,true);
        $prevState[1]["total_par_mois"] = $this->load->view("general/total_mois",$data,true);
        echo json_encode(array("options_dummy3"=>$prevState[1]["options_dummy3"],"total_par_mois"=>$prevState[1]["total_par_mois"]));
    }
    
    //got to mes coordonnes
    public function gotoMesCoord()
    {
        
    }
            
    public function redirectToMonOffre()
    {
        $this->session->destroy();
        redirect("mon_offre");
    }
    
    //get total par mois
    public function getTotal($amount){
        $this->totalParMois = $this->session->userdata('totalParMois');
        $this->totalParMois += (double)$amount;
        $this->session->set_userdata('totalParMois',$this->totalParMois);
        return $this->totalParMois;
    }
    
    public function saveInfo()
    {
         $result = $this->Wsdl_interrogeligib->saveInfo($num_tel);
         echo "<pre>";
         print_r($result);
         echo "</pre>";
    }
    
    public function testFlux()
    {
        //dummy
        /*
        $dummyPanier = $this->session->userdata("dummyPanier");
        echo "<pre>";
        print_r($dummyPanier["dummy1"]);
        print_r($dummyPanier["dummy4"]);
        print_r($dummyPanier["dummy5"]);
        print_r($dummyPanier["dummy7"]);
        echo "</pre>";*/
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
        $promo = $this->session->userdata("promo");
        echo "<pre>";
        print_r($promo);
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
