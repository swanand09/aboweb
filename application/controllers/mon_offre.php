<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mon_offre extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index()
    {
        $this->data["department"] = $this->session->userdata("user_geolocalisation"); 
        $this->data["userdata"] = $this->session->all_userdata();
      
        return $this->controller_test_eligib_vue();                
    }
    
    public function ajax_proc_interogeligib()
    {
       
        $num_tel       = $this->input->post('num_tel'); 
        $htmlContent   = "";
        $contenuDroit1 = "";
        $contenuDroit2 = "";
        $contenuDroit3 = "";
        $data["num_tel"] = $num_tel; 
        if($num_tel!="")
        {
       
            $this->data["racap_num"] = array(
                                                'name' => 'recap_num',
                                                'id' => 'recap_num',
                                                'type' => 'text',
                                                'value' => $num_tel
                                            );
            $result = $this->Wsdl_interrogeligib->retrieveInfo($num_tel);
            $data["result"] = $result;

            if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"]))
            {
                $this->session->set_userdata('produit',$result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"]);   


                $disable_checkbox = $result["interrogeEligibiliteResult"]["Ligne"]["Eligible_degroupage_partiel"]=="false"?true:false;
                if($disable_checkbox ==false){
                    $input1 = array(
                                'name' => 'redu_facture',
                                'id' => 'redu_facture',                                
                                'value' => 'true',
                                'checked'=> 'checked'                               
                         );
                      $input2 = array(
                                'name' => 'consv_num_tel',
                                'id' => 'consv_num_tel',                              
                                'value' => 'true',
                                'disabled'=> 'disabled'
                         );   
                }else
                {
                    $input1 = array(
                                'name' => 'redu_facture',
                                'id' => 'redu_facture',                                
                                'value' => 'true',
                                'checked'=> 'checked',
                                'disabled'=> 'disabled'
                         );
                     $input2 = array(
                                'name' => 'consv_num_tel',
                                'id' => 'consv_num_tel',                              
                                'value' => 'true',
                                'checked'=> 'checked'

                         ); 
                }
                $data["input1"] = $input1;
                $data["input2"] = $input2;                
                $choix_forfait = array(
                                            'class'=> 'rmv-std-btn btn-forward',
                                            //'class'=>'rmv-std-btn btn-green',
                                            'name' => 'choix_forfait',
                                            'id' => 'choix_forfait',
                                            'type' => 'submit',
                                           // 'onclick'=>'javascript:retrieveForfait();',    
                                            'value' => 'Choisir mon forfait'
                                          );   
                $data["choix_forfait"] = $choix_forfait; 
                $contenuDroit1 .= '<h3 style="color:#fff;font-size:15px;">VOTRE LIGNE</h3>';
                $contenuDroit1 .= form_input($this->data["racap_num"]);
                $contenuDroit1 .= '<a href="javascript:modif_num();" id="modif_num" style="color:#fff;text-decoration:underline;margin-left:175px;font-size:12px;margin-bottom:10px;">Modifier</a>';  
            }
      }  
      $htmlContent .= $this->load->view("monoffre/num_eligib_info",$data,true);
      $this->session->set_userdata('prevState',array("htmlContent"  => $htmlContent,"contenuDroit1" => $contenuDroit1,"contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3));
      echo utf8_encode(utf8_decode(json_encode(array("htmlContent"  => $htmlContent,"contenuDroit1" => $contenuDroit1,"contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3))));       
    }
    
    public function forfait()
    {   
       $redu_facture  = $this->input->post('redu_facture'); 
        $this->session->set_userdata("redu_facture",$redu_facture);
        $consv_num_tel = $this->input->post('consv_num_tel'); 
        $this->session->set_userdata("consv_num_tel",$consv_num_tel);
        $produit =  $this->session->userdata("produit");
       $htmlContent =" ";
       $counter = 1;
       $iadArr = array("Libelle"=>"","Tarif"=>"","Tarif_promo"=>"","Duree_mois_promo"=>"");
       $data["produit"] = $produit;
       
        foreach($produit as $key=>$val)
        {
           if($val["Categorie"]=="FORFAIT")
           {

             $choixArr = array(
                 'class'=>'rmv-std-btn btn-green',
                'name' => 'button',
                'id' => 'butt_'.$counter,
                "onclick" => "javascript:choixForfait(".$val["Id_crm"].")",               
                'content' => 'CHOISIR',
             );

             $data["val"] = $val;
             $data["choixArr"] = $choixArr;
             $data["counter"] = $counter;
             $htmlContent .= $this->load->view("monoffre/forfait_info1",$data,true);
             $counter++;
           }
           if($val["Categorie"]=="IAD")
             {
                 $iadArr = array("Libelle"=>$val["Libelle"],"Tarif"=>$val["Tarif"],"Tarif_promo"=>$val["Tarif_promo"],"Duree_mois_promo"=>$val["Duree_mois_promo"]);
             }
        }
         $data["iadArr"] = $iadArr;
         $htmlContent .= $this->load->view("monoffre/forfait_info2",$data,true);

        $prevState = $this->session->userdata("prevState");
        $contenuDroit1 = $prevState["contenuDroit1"];
        $contenuDroit2 = $prevState["contenuDroit2"];
        $contenuDroit3 = $prevState["contenuDroit3"];

        $contenuDroit2 = ($redu_facture=="true")?"<p style='#000;'>Produit dégroupage total desiré</p>":"<p style='#000;'>Produit dégroupage partiel souscris</p>";

        if($contenuDroit3=="")
        {
            $contenuDroit3 .='<h3 style="color:#fff;font-size:15px;">VOTRE OFFRE MEDIASERV</h3>';
            $contenuDroit3 .='<h3 style="color:#fff;font-size:12px;">Choisissez une offre...</h3>';
        }      
       $prevState["contenuDroit2"] =  $contenuDroit2;
       $prevState["contenuDroit3"] =  $contenuDroit3;
       $this->session->set_userdata('prevState',$prevState);
      echo json_encode(array("htmlContent"  => $htmlContent,"contenuDroit1" => $contenuDroit1,"contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3));   
    } 
    
    public function prevState()
    {
        $prevState =  $this->session->userdata("prevState"); 
        $redu_facture = $this->session->userdata("redu_facture");
        $htmlContent   = $prevState["htmlContent"];
        $contenuDroit1 = $prevState["contenuDroit1"];
        $contenuDroit2 = $prevState["contenuDroit2"];
        $contenuDroit3 = $prevState["contenuDroit3"];
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
       //$this->session->set_userdata('prevState',array("htmlContent"  => $htmlContent,"contenuDroit1" => $contenuDroit1,"contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3));
       //echo json_encode($htmlContent);     
        echo utf8_encode(utf8_decode($htmlContent));
        //echo $htmlContent;
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
               $contenuDroit3 .= $this->load->view("monoffre/colonne_droit",$data,true);

           }            
         }         
         $prevState["contenuDroit2"] = $contenuDroit2;
         $prevState["contenuDroit3"] = $contenuDroit3;
         $this->session->set_userdata('prevState',$prevState);
         echo json_encode(array("htmlContent"   => $prevState["htmlContent"],"contenuDroit1"  => $contenuDroit1, "contenuDroit2" => $contenuDroit2,"contenuDroit3" => $contenuDroit3));
    }       
    
    public function redirectToMonOffre()
    {
        $this->session->destroy();
        redirect("mon_offre");
    }
}

/* End of file mon_offre.php */
/* Location: ./application/controllers/mon_offre.php */
