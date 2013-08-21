<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mon_offre extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib');    
           // $this->load->library('phpsession');
    }  
    public function index($param="")
    {
        $this->data["department"] = $this->session->userdata("user_geolocalisation"); 
        (!$this->session->_session_id_expired())?$this->session->destroy():"";
        return $this->controller_test_eligib_vue($this->data["department"]);                
    }
    
    public function ajax_proc_interogeligib()
    {
       
        $num_tel       = $this->input->post('num_tel'); 
        $htmlContent   = "";
        if($num_tel!="")
        {
            $result = $this->Wsdl_interrogeligib->retrieveInfo($num_tel);  
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
                $htmlContent .= "<form>";
                $input1 = array(
                                'name' => 'redu_facture',
                                'id' => 'redu_facture',                                
                                'value' => 'true'
                         );
                    $htmlContent .= '<p>'.form_checkbox($input1).' Réduisez votre facture en résiliant votre abonnement<br>car vous êtes en zone dégroupée</p>';
                 $input2 = array(
                                'name' => 'consv_num_tel',
                                'id' => 'consv_num_tel',                              
                                'value' => 'true'
                         );   
                    $htmlContent .= '<p>'.form_checkbox($input2).' Vous pouvez aussi conserver votre numéro de téléphone</p>';
                $htmlContent .= "</div>";
                $htmlContent .= "<div>";
                    $htmlContent .= '<div class="prev_next">'.anchor('mon_offre',"PRECEDENT").'</div>';
                    $choix_forfait = array(
                                                    'class'=>'rmv-std-btn btn-green',
                                                    'name' => 'choix_forfait',
                                                    'id' => 'choix_forfait',
                                                    'type' => 'submit',
                                                    'onclick'=>'javascript:retrieveForfait();',    
                                                    'value' => 'CHOISIR MON FORFAIT'
                                              );
                    $htmlContent .= '<div class="prev_next">'.form_submit($choix_forfait).'</div>';
                    $htmlContent .= "</form>";
                $htmlContent .= "</div>";                
                $this->session->set_userdata('prevState',$htmlContent);
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
                $htmlContent .= '<div class="prev_next">'.anchor('mon_offre',"PRECEDENT").'</div>';
                $htmlContent .= "</div>";
        }
       echo utf8_encode(utf8_decode($htmlContent));       
    }
    
    public function forfait()
    {   
        $redu_facture  = $this->input->post('redu_facture'); 
        $this->session->set_userdata("redu_facture",$redu_facture);
        $consv_num_tel = $this->input->post('consv_num_tel'); 
        $this->session->set_userdata("consv_num_tel",$consv_num_tel);
        $produit =  $this->session->userdata("produit");
        $htmlContent ="";
        foreach($produit as $key=>$val)
        {
             $htmlContent.="<div>";
             $htmlContent.="<h3>FORFAIT N&deg;".($key+1)."</h3>";  
             $htmlContent.="<p>";
             $htmlContent .=$val["Libelle"]."&nbsp;&nbsp;";
             $htmlContent .=$val["Tarif"]."&euro;";
             $htmlContent.="</p>"; 
             $htmlContent.="</div>";        
        }
        $htmlContent .= "<div>";
        $htmlContent .= '<div class="prev_next"><a href="javascript:prevState();">PRECEDENT</a></div>';
        $htmlContent .= "</div>";
        echo utf8_encode($htmlContent);     
    } 
    
    public function prevState()
    {
        $htmlContent =  $this->session->userdata("prevState"); 
        $redu_facture = $this->session->userdata("redu_facture");
        if($redu_facture=="true")
        {
            $htmlContent = str_replace('<input type="checkbox" name="redu_facture" value="true" id="redu_facture"  />','<input type="checkbox" name="redu_facture" value="true" checked="checked" id="redu_facture"  />',$htmlContent);
        }
        $consv_num_tel = $this->session->userdata("consv_num_tel");
        if($consv_num_tel=="true")
        {
            $htmlContent = str_replace('<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel"  />','<input type="checkbox" name="consv_num_tel" value="true" checked="checked" id="consv_num_tel"  />',$htmlContent);
        }
        echo utf8_encode(utf8_decode($htmlContent));   
    }
}

/* End of file mon_offre.php */
/* Location: ./application/controllers/mon_offre.php */
