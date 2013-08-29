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
        $contenuDroit = "";
        
        if($num_tel!="")
        {
             $this->data["racap_num"] = array(
                                                'name' => 'recap_num',
                                                'id' => 'recap_num',
                                                'type' => 'text',
                                                'value' => $num_tel
                                            );
            $result = $this->Wsdl_interrogeligib->retrieveInfo($num_tel);  
//            $htmlContent = array(
//                                "htmlContent"  =>  "<pre>".print_r($result)."</pre>",
//                                
//                                "contenuDroit" => ""    
//                 );  
//            echo utf8_encode(utf8_decode(json_encode($htmlContent))); exit();
            if(!empty($result))
            {               
                $this->session->set_userdata('produit',$result["interrogeEligibiliteResult"]["Catalogue"]["Produits"]["WS_Produit"]);        
                $htmlContent .= "<p>VOICI LES RESULTATS D'ELIGIBILITE LIES A VOTRE LIGNE</p>";
                $htmlContent .= "<h3>VOTRE DEBIT ADSL</h3>";
                $htmlContent .= "<p>Numero: ".$result["interrogeEligibiliteResult"]["Ligne"]["Numero"]."</p>";
                $htmlContent .= "<p>Debit emmission: ".$result["interrogeEligibiliteResult"]["Ligne"]["Debit_emmission"]."</p>";
                $htmlContent .= "<p>Debit reception: ".$result["interrogeEligibiliteResult"]["Ligne"]["Debit_de_reception"]."</p>";
                $htmlContent .= "<h3>LES SERVICES MEDIASERV</h3>";
                $htmlContent .= "<p>Eligibilé ADSL: ".($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]?"Oui":"Non")."</p>";
                $htmlContent .= "<p>Eligibilé TV: ".($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]?"Oui":"Non")."</p>";
                $htmlContent .= "<h3>CE QUE NOUS POUVONS AUSSI VOUS PROPOSER:</h3>";
                $htmlContent .= "<div>";
                $htmlContent .= "<form action='#' onsubmit='javascript:retrieveForfait();return false;'>";
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
                
                    $htmlContent .= '<p>'.form_checkbox($input1).' Réduisez votre facture en résiliant votre abonnement<br>car vous êtes en zone dégroupée</p>';
               
                    $htmlContent .= '<p>'.form_checkbox($input2).' Vous pouvez aussi conserver votre numéro de téléphone</p>';
                
                $htmlContent .= "<div>";
                    $htmlContent .= '<div class="prev_next">'.anchor('mon_offre/redirectToMonOffre',"PRECEDENT").'</div>';
                    $choix_forfait = array(
                                                    'class'=>'rmv-std-btn btn-green',
                                                    'name' => 'choix_forfait',
                                                    'id' => 'choix_forfait',
                                                    'type' => 'submit',
                                                   // 'onclick'=>'javascript:retrieveForfait();',    
                                                    'value' => 'CHOISIR MON FORFAIT'
                                              );
                    $htmlContent .= '<div class="prev_next">'.form_submit($choix_forfait).'</div>';
                    $htmlContent .= "</form>";
                    $htmlContent .= "</div>";
                $htmlContent .= "</div>";  
                
                $contenuDroit  .= '<h3 style="color:#fff;font-size:15px;">VOTRE LIGNE</h3>';
                $contenuDroit .= form_input($this->data["racap_num"]);
                $contenuDroit .= '<a href="javascript:modif_num();" id="modif_num" style="color:#fff;text-decoration:underline;margin-left:250px;font-size:12px;margin-bottom:10px;">Modifier</a>';  
               
            }else
            {
                $htmlContent .="Le webservice retourne aucune valeur pour ce numéro: ".$num_tel; 
                $htmlContent .= "<div>";
                $htmlContent .= '<div class="prev_next">'.anchor('mon_offre',"PRECEDENT").'</div>';
                $htmlContent .= "</div>";
            }
        }else
        {
                $htmlContent .="Veuillez saisir une valeur pour le numéro téléphone"; 
                $htmlContent .= "<div>";
                $htmlContent .= '<div class="prev_next">'.anchor('mon_offre/redirectToMonOffre',"PRECEDENT").'</div>';
                $htmlContent .= "</div>";
        }
      $htmlContent = array(
                                "htmlContent"  => $htmlContent,
                                
                                "contenuDroit" => $contenuDroit    
                 );  
      $this->session->set_userdata('prevState',$htmlContent);
       echo utf8_encode(utf8_decode(json_encode($htmlContent)));       
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
        foreach($produit as $key=>$val)
        {
           if($val["Categorie"]=="FORFAIT")
           {
             $htmlContent .="<div style='margin:10px 0px 30px 0px;'>";
             $htmlContent .="<h3>FORFAIT N&deg;".$counter."</h3>";  
             $htmlContent .="<div style='width:300px;float:left;margin-top:5px;'>";
             $htmlContent .=utf8_encode($val["Libelle"])."&nbsp;&nbsp;";              
             $htmlContent .= $val["Tarif"]."&euro;<br><br><span style='font-size:11px;'><strong>Promo: </strong>".utf8_encode($val["Valeurs"]["WS_Produit_Valeur"][0]["Libelle"]["string"])."</span></div>";  
             $choixArr = array(
                 'class'=>'rmv-std-btn btn-green',
                'name' => 'button',
                'id' => 'butt_'.$counter,
                "onclick" => "javascript:choixForfait(".$val["Id_crm"].")",               
                'content' => 'CHOISIR',
             );
             
             
             $htmlContent .="<div style='clear:right;margin-top:5px;'>".form_button($choixArr);  
             $htmlContent .="</div>"; 
             $htmlContent .="</div>";    
             $counter++;
           }
           if($val["Categorie"]=="IAD")
             {
                 $iadArr = array("Libelle"=>$val["Libelle"],"Tarif"=>$val["Tarif"],"Tarif_promo"=>$val["Tarif_promo"],"Duree_mois_promo"=>$val["Duree_mois_promo"]);
             }
        }
        $htmlContent .= "<div>";
        if($iadArr["Libelle"]!="")
        {
            $htmlContent .="<div><input type='checkbox' checked='checked' disabled='disabled'>".$iadArr["Libelle"]."&nbsp;&nbsp;".$iadArr["Tarif"]."&euro;</div>";
        }
        $htmlContent .= "<div class='prev_next'><a href='javascript:prevState();'>PRECEDENT</a></div>";
        $htmlContent .= "</div>";
        $prevState = $this->session->userdata("prevState");
        $contenuDroit = $prevState["contenuDroit"];
        $contenuDroit .='<h3 style="color:#fff;font-size:15px;">VOTRE OFFRE MEDIASERV</h3>';
        $contenuDroit .='<h3 style="color:#fff;font-size:12px;">Choisissez une offre...</h3>';
    
      echo json_encode(array("htmlContent"  => $htmlContent,"contenuDroit" => $contenuDroit));   
    } 
    
    public function prevState()
    {
        $prevState =  $this->session->userdata("prevState"); 
        $redu_facture = $this->session->userdata("redu_facture");
        $htmlContent = utf8_encode(utf8_decode($prevState["htmlContent"]));
        
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
            $htmlContent = str_replace('<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel" checked="checked"  />','<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel"  />',$htmlContent);
           //$htmlContent = str_replace('<input type="checkbox" id="consv_num_tel" checked="checked" value="true" name="consv_num_tel">','<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel"  />',$htmlContent);
        }
       
        //echo utf8_encode(utf8_decode($htmlContent));   
        echo $htmlContent;
    }
    
    public function refreshRecapCol()
    {
         $id_crm = $this->input->post("id_crm");
         $produit =  $this->session->userdata("produit");
         $prevState = $this->session->userdata("prevState");
         $contenuDroit = $prevState["contenuDroit"];
         $tarif = "";
         $libele = "";
         foreach($produit as $key=>$val)
         {
           if($val["Categorie"]=="FORFAIT"&&$val["Id_crm"]==$id_crm)
           {
               $tarif  = '<div style="color:#fff;margin-top:20px;">
                            <span style="font-size:14px;">VOTRE OFFRE MEDIASERV</span>
                            <span style="margin-left:60px;font-size:13px;">'.$val["Tarif"].'&euro;</span>
                         </div>';
               $libele = '<div>
                            <div style="font-size:13px;color:#fff;margin-top:20px;">
                                Forfait
                                <span style="font-size:12px;margin-left:210px;">
                                    <a href="javascript:void(0);" style="color:#fff;text-decoration:underline;">Modifier</a>
                                </span>
                            </div>   
                            <div style="font-size:12px;color:#000;margin-bottom:10px;margin-top:10px;">
                             '
                            .utf8_encode($val["Libelle"]).
                            '<div> 
                        </div>';
           }            
         }
         
         echo json_encode(array("tarif"=>$tarif,"libelle"=>$libele,"contenuDroit"=>$contenuDroit));
    }       
    
    public function redirectToMonOffre()
    {
      //  $this->session-> regenerate_id();
        $this->session->destroy();
        redirect("mon_offre");
    }
}

/* End of file mon_offre.php */
/* Location: ./application/controllers/mon_offre.php */
