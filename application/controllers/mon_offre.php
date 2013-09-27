<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mon_offre extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index($num_tel="")
    {
        $this->data["department"] = $this->determine_location(); 
        $this->data["userdata"] = $this->session->all_userdata();       
        if(!empty($num_tel)){
           
             return $this->ajax_proc_interogeligib($num_tel);
        }
        return $this->controller_test_eligib_vue($num_tel);                
    }
   
    public function determine_location()
    {
       $this->load->model('geolocalisation_model','geoloca'); 
       return $this->geoloca->getDepartment();
    }
    
    public function ajax_proc_interogeligib($num_tel="")
    {
        $from_sitebox  = false;   
       (empty($num_tel))?$num_tel = $this->input->post('num_tel'):$from_sitebox = true;
        
        $htmlContent   = "";
        $contenuDroit1 = "";
        $contenuDroit2 = "";
        $contenuDroit3 = "";
        $data["num_tel"] = $num_tel; 
        $data["result"] = "";
        if($num_tel!="")
        {       
            $this->data["racap_num"] = array('name' => 'recap_num','id' => 'recap_num','type' => 'text','value' => $num_tel);
            $result = $this->Wsdl_interrogeligib->retrieveInfo($num_tel);
            if(!empty($result))
            {
                $data["result"] = $result;
                ///$data["kint"]   = $this->kint->dump($result);
//                if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"]))
//                {
                     $this->session->set_userdata('eligible_tv',$result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]);
                    $this->session->set_userdata('produit',$result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"]);   
                    $this->session->set_userdata('promo',$result["interrogeEligibiliteResult"]["Catalogue"]["Promo_libelle"]);
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
                    $contenuDroit1 .= $this->load->view("monoffre/colonne_droit1",$data,true);
//                }
            }
      }  
      $htmlContent .= $this->load->view("monoffre/num_eligib_info",$data,true);
      $this->session->set_userdata("htmlContent_testeligib",$htmlContent);
      $this->session->set_userdata('prevState',array("htmlContent"  => $htmlContent,"contenuDroit1" => $contenuDroit1,"contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3));
      if($from_sitebox)
      {
         redirect("mon_offre");
      }
      echo json_encode(array("htmlContent"  => $htmlContent,"contenuDroit1" => $contenuDroit1,"contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3));
     // echo utf8_encode(utf8_decode(json_encode(array("htmlContent"  => $htmlContent,"contenuDroit1" => $contenuDroit1,"contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3))));       
    }
    
    public function forfait()
    {   
       $redu_facture  = $this->input->post('redu_facture'); 
        $this->session->set_userdata("redu_facture",$redu_facture);
        $consv_num_tel = $this->input->post('consv_num_tel'); 
        $this->session->set_userdata("consv_num_tel",$consv_num_tel);
        $produit =  $this->session->userdata("produit");
        $data["promo_libelle"] = $this->session->userdata("promo");
       $htmlContent = $this->load->view("monoffre/forfait_info3",$data,true);
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
             $htmlContent .= $this->load->view("monoffre/forfait_info1",$data,true);
             $counter++;
           }
           if($val["Categorie"]=="IAD")
            {
                $iadArr = array("Libelle"=>$val["Libelle"],"Tarif"=>$val["Tarif"],"Tarif_promo"=>$val["Tarif_promo"],"Duree_mois_promo"=>$val["Duree_mois_promo"]);
                $this->session->set_userdata('tarifLocTvMod',$val["Tarif"]);
            }
        }
         $data["iadArr"] = $iadArr;
         $htmlContent .= $this->load->view("monoffre/forfait_info2",$data,true);
         $this->session->set_userdata('htmlContent_forfait',$htmlContent);
        $prevState = $this->session->userdata("prevState");
        $contenuDroit1 = $prevState["contenuDroit1"];
        //$contenuDroit2 = $prevState["contenuDroit2"];
        $contenuDroit3 = $prevState["contenuDroit3"];

        $data["degrouper"] = ($redu_facture=="true")?"Produit dégroupage total desiré":"Produit dégroupage partiel souscris";
        $contenuDroit2 = $this->load->view("monoffre/colonne_droit2",$data,true);
        if($contenuDroit3=="")
        {           
            $data["text"]  = '<p>Choisissez une offre...</p>';
            $contenuDroit3 = $this->load->view("monoffre/colonne_droit3",$data,true);
        }      
       $prevState["contenuDroit2"] =  $contenuDroit2;
       $prevState["contenuDroit3"] =  $contenuDroit3;
       $this->session->set_userdata('prevState',$prevState);
      echo json_encode(array("htmlContent"  => $htmlContent,"contenuDroit1" => $contenuDroit1,"contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3));   
    } 
    
    public function prevState($page='')
    {
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
         $id_crm = $this->input->post("id_crm");
         $produit =  $this->session->userdata("produit");
         $prevState = $this->session->userdata("prevState");
         $contenuDroit1 = $prevState["contenuDroit1"];
         $contenuDroit2 = $prevState["contenuDroit2"];
         $contenuDroit3 = "";       
         foreach($produit as $key=>$val)
         {
           if($val["Categorie"]=="FORFAIT"&&$val["Id_crm"]==$id_crm)
           {
               $data["val"]    = $val;
               $data["tarifLocTvMod"] = $this->session->userdata("tarifLocTvMod");
               $contenuDroit3 .= $this->load->view("monoffre/colonne_droit3",$data,true);
           }            
         }         
         $prevState["contenuDroit2"] = $contenuDroit2;
         $prevState["contenuDroit3"] = $contenuDroit3;         
        
         $data["tarif_ultra"] = 0;
         $data["tarif_giga"] = 0;
         $data["tarif_mega"] = 0;
         $count_tv = 0;
         foreach($produit as $key=>$val)
         {
            if($val["Categorie"]=="BOUQUET_TV"){
                switch(utf8_encode($val["Libelle"]))
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
         $prevState["htmlContent"] = $this->session->userdata("htmlContent_forfait");
         $this->session->set_userdata('prevState',$prevState);
         //Go to bouquet tv or mes coordonnes         
         //$prevState["htmlContent"] = ($count_tv>0)? $this->load->view("monoffre/bouqet_tv",$data,true):$this->load->view("mes_coord/mes_coordonnes",$data,true);   
         $this->load->model('stb_model','stb'); 
         $data["base_url_stb"] = BASEPATH_STB;
         $data["bouquet_list"] = $this->stb->retrievChainesList();
         $prevState["htmlContent"] = ($count_tv>0)? $this->load->view("monoffre/bouqet_tv",$data,true):"redirect to mes coordonnees";   
        // $this->session->set_userdata('prevState',$prevState);
         echo json_encode(array("htmlContent"   => $prevState["htmlContent"],"contenuDroit1"  => $contenuDroit1, "contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3));
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
