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
                        
                    $disable_checkbox = $result["interrogeEligibiliteResult"]["Ligne"]["Eligible_degroupage_partiel"]=="false"?true:false;
                    if($disable_checkbox ==false){
                        $input1 = array('name' => 'redu_facture','id' => 'redu_facture','value' => 'true','checked'=> 'checked');
                        $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel', 'value' => 'true','disabled'=> 'disabled');   
                    }else
                    {
                        $input1 = array('name' => 'redu_facture','id' => 'redu_facture','value' => 'true','checked'=> 'checked','disabled'=> 'disabled');
                        $input2 = array('name' => 'consv_num_tel','id' => 'consv_num_tel','value' => 'true','checked'=> 'checked'); 
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

        $data["degrouper"] = ($redu_facture=="true")?"Produit dégroupage total desiré":"Produit dégroupage partiel souscris";
        $this->colonneDroite["donnee_degroupage"] = $this->load->view("general/donnee_degroupage",$data,true);
        
        if($this->colonneDroite["forfait"]=="")
        {           
            $data["text"]  = '<p>Choisissez une offre...</p>';
           // $this->colonneDroite["offre_mediaserv"] = $this->load->view("general/offre_mediaserv",$data,true);
            $this->colonneDroite["forfait"] = $this->load->view("general/new_forfait",$data,true);
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
         $beneficierTv =  $this->input->post("beneficierTv");
         $decoder_tv   =  $this->input->post('decoder_tv');
         $prevState = $this->session->userdata("prevState");
         $data["promo_libelle"] = $this->session->userdata("promo");
         $data["iad"] = $this->session->userdata("iad");
         $localite    = $this->session->userdata("localite");
         if($beneficierTv==false){
            $id_crm = $this->input->post("id_crm");
            $produit =  $this->session->userdata("produit");           
            $this->colonneDroite["form_test_ligne"] = $prevState[1]["form_test_ligne"];
            $this->colonneDroite["donnee_degroupage"] = $prevState[1]["donnee_degroupage"];                  
            foreach($produit as $key=>$val)
            {
              if($val["Categorie"]=="FORFAIT"&&$val["Id_crm"]==$id_crm)
              {
                  $data["donne_forfait"]    = $val;
                  $this->session->set_userdata("donne_forfait",$val);
                  $data["tarifLocTvMod"] = $this->session->userdata("tarifLocTvMod");
                  
                 // $this->colonneDroite["offre_mediaserv"] .= $this->load->view("general/offre_mediaserv",$data,true);
                  $this->colonneDroite["forfait"]               = $this->load->view("general/new_forfait",$data,true);
                  $this->colonneDroite["libelles_promo"]        = $this->load->view("general/new_libelles_promo",$data,true);
                  //location modem
                  //if($data["iad"]["Tarif"]>0){
                  $this->colonneDroite["location_equipements"]  = $this->load->view("general/new_location_equipements",$data,true);
                  //}
                  $this->colonneDroite["total_par_mois"]  = $this->load->view("general/new_total_mois",$data,true);    
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
                if($val["Categorie"]=="TELEVISION")
                {
                    foreach($val["Valeurs"]["WS_Produit_Valeur"] as $val2){
                        
                        if($val2["Categorie"]=="STB"&&$val2["Type"]=="RECURRENT"&&$localite!="RE"){
                             $data["tarif_loca_decod"] = $val2["Tarif"];
                             $data["tarif_activ_servicetv"] = 0;
                        }
                        
                        if($val2["Categorie"]=="STB"&&$val2["Type"]=="ONESHOT"&&$localite=="RE"){
                             $data["tarif_loca_decod"] = 0;
                             $data["tarif_activ_servicetv"] = $val2["Tarif"];
                        }
                    }
                   
                }
            }
            
            //Go to bouquet tv or mes coordonnes 
            if($count_tv>0){
                $this->load->model('stb_model','stb'); 
                $data["base_url_stb"] = BASEPATH_STB;
                $data["bouquet_list"] = $this->stb->retrievChainesList();
                $data["location_equipements"] = $prevState[1]["location_equipements"];                
              //  $this->colonneDroite["location_decodeur"] =  (!empty($prevState[1]["location_decodeur"])?$prevState[1]["location_decodeur"]:"");                
             //  $this->colonneDroite["location_equipements"] =  (!empty($prevState[1]["location_equipements"])?$prevState[1]["location_equipements"]:"");
                
                $this->contenuGauche["contenu_html"] = $this->load->view("monoffre/tv/liste_bouquets",$data,true);    
                $this->session->set_userdata('prevState',array($this->contenuGauche,$this->colonneDroite));
            }else{
                $this->contenuGauche["contenu_html"] = "redirect to mes coordonnees";
                $this->session->set_userdata('prevState',array(array("contenu_html"=>$this->session->userdata("htmlContent_forfait")),$this->colonneDroite));                
            }
            
            echo json_encode(array($this->contenuGauche,$this->colonneDroite));
         }else{
             $data["beneficierTv"]  = $beneficierTv;
             $data["decoder_tv"]    = $decoder_tv; 
             $data["donne_forfait"] = $this->session->userdata("donne_forfait"); 
             $data["iad"]           = $this->session->userdata("iad");
            /// $prevState[1]["location_decodeur"] = (($data["beneficierTv"]!="uncheck")?$this->load->view("general/location_decodeur",$data,true):"");
             $prevState[1]["location_equipements"] = $this->load->view("general/new_location_equipements",$data,true);
             $prevState[1]["total_par_mois"]       = $this->load->view("general/new_total_mois",$data,true);
             $this->session->set_userdata('prevState',$prevState);            
             echo json_encode(array("location_equipements"=>$prevState[1]["location_equipements"],"total_par_mois"=>$prevState[1]["total_par_mois"]));
         }
    }       
    
    
    public function redirectToMonOffre()
    {
        $this->session->destroy();
        redirect("mon_offre");
    }
    
    public function saveInfo()
    {
         $result = $this->Wsdl_interrogeligib->saveInfo($num_tel);
         echo "<pre>";
         print_r($result);
         echo "</pre>";
    }
}

/* End of file mon_offre.php */
/* Location: ./application/controllers/mon_offre.php */
