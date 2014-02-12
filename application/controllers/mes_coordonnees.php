<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mes_coordonnees extends MY_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
       
        //facturation
        $produit =  $this->session->userdata("produit");
        $this->data["factureData"] = array();
       if(isset($produit)&&!empty($produit)){
            foreach($produit as $key=>$val)
            {
              if($val["Categorie"]=="FACTURATION")
              {
                  array_push($this->data["factureData"],$val);
              }
            }
       }else{
           $this->session->destroy();
           redirect('mon_offre');
       }
      
        $panierVal = $this->session->userdata("panierVal"); 
        if(empty($panierVal["facturedum6"])){
            //+ parrainage
            $offparrainId= $this->session->userdata('offreparrainage_id');                       
            $this->majPanier(array("produit"=>array("FACTURATION"),"etape"=>array("choixFacture"),"parainageId"=>$offparrainId));  
        }
        $this->data["userdata"] = $this->session->all_userdata();
        
        $wsVille = $this->session->userdata("ws_ville");
        $this->data["wsVille"] = $wsVille;
                
        //initialising form values
        if(!array_key_exists("civilite_aa",$this->session->all_userdata())){
            $this->session->set_userdata('civilite_aa',"");
        }
        if(!array_key_exists("nom_aa",$this->session->all_userdata())){
            $this->session->set_userdata('nom_aa',"");
        }
        if(!array_key_exists("prenom_aa",$this->data['userdata'])){
            $this->session->set_userdata('prenom_aa',"");
        }
        if(!array_key_exists("numero_aa",$this->data['userdata'])){
            $this->session->set_userdata('numero_aa',"");
        }
        if(!array_key_exists("comp_numero_aa",$this->data['userdata'])){
            $this->session->set_userdata('comp_numero_aa',"");
        }             
        if(!array_key_exists("type_voie_aa",$this->data['userdata'])){
            $this->session->set_userdata('type_voie_aa',"");
        }
        if(!array_key_exists("voie_aa",$this->data['userdata'])){
            $this->session->set_userdata('voie_aa',"");
        }
        if(!array_key_exists("adresse_suite_aa",$this->data['userdata'])){
            $this->session->set_userdata('adresse_suite_aa',"");
        }
        if(!array_key_exists("ensemble_aa",$this->data['userdata'])){
            $this->session->set_userdata('ensemble_aa',"");
        }                
        if(!array_key_exists("batiment_aa",$this->data['userdata'])){
            $this->session->set_userdata('batiment_aa',"");
        }
        if(!array_key_exists("escalier_aa",$this->data['userdata'])){
            $this->session->set_userdata('escalier_aa',"");
        }
        if(!array_key_exists("etage_aa",$this->data['userdata'])){
            $this->session->set_userdata('etage_aa',"");
        }
        if(!array_key_exists("porte_aa",$this->data['userdata'])){
            $this->session->set_userdata('porte_aa',"");
        }
        if(!array_key_exists("logo_aa",$this->data['userdata'])){
            $this->session->set_userdata('logo_aa',"");
        }
        if(!array_key_exists("code_postal_aa",$this->data['userdata'])){
            $this->session->set_userdata('code_postal_aa',"");
        }        
        if(!array_key_exists("ville_aa",$this->data['userdata'])){
            $this->session->set_userdata('ville_aa',"");
        }
        if(!array_key_exists("telephone_portable",$this->data['userdata'])){
            $this->session->set_userdata('telephone_portable',"");
        }
        if(!array_key_exists("telephone_bureau",$this->data['userdata'])){
            $this->session->set_userdata('telephone_bureau',"");
        }
        if(!array_key_exists("telephone_domicile",$this->data['userdata'])){
            $num_tel = $this->session->userdata("num_tel");
            $this->session->set_userdata('telephone_domicile',$num_tel);
        }
        
        
        if(!array_key_exists("check_adresse_facturation",$this->data['userdata'])){
            $this->session->set_userdata('check_adresse_facturation',"check adresse facturation");
        }
        //Adresse de facturation
        if(!array_key_exists("civilite_af",$this->data['userdata'])){
            $this->session->set_userdata('civilite_af',"");
        }
        if(!array_key_exists("nom_af",$this->data['userdata'])){
            $this->session->set_userdata('nom_af',"");
        }
        if(!array_key_exists("prenom_af",$this->data['userdata'])){
            $this->session->set_userdata('prenom_af',"");
        }
        if(!array_key_exists("numero_af",$this->data['userdata'])){
            $this->session->set_userdata('numero_af',"");
        }
        if(!array_key_exists("comp_numero_af",$this->data['userdata'])){
            $this->session->set_userdata('comp_numero_af',"");
        }
        if(!array_key_exists("type_voie_af",$this->data['userdata'])){
            $this->session->set_userdata('type_voie_af',"");
        }
        if(!array_key_exists("voie_af",$this->data['userdata'])){
            $this->session->set_userdata('voie_af',"");
        }
        if(!array_key_exists("adresse_suite_af",$this->data['userdata'])){
            $this->session->set_userdata('adresse_suite_af',"");
        }
        if(!array_key_exists("code_postal_af",$this->data['userdata'])){
            $this->session->set_userdata('code_postal_af',"");
        }
        if(!array_key_exists("ville_af",$this->data['userdata'])){
            $this->session->set_userdata('ville_af',"");
        }
        
        
        if(!array_key_exists("check_adresse_livraison",$this->data['userdata'])){
            $this->session->set_userdata('check_adresse_livraison',"check adresse livraison");
        }
        //Adresse de livraison
        if(!array_key_exists("civilite_al",$this->data['userdata'])){
            $this->session->set_userdata('civilite_al',"");
        }
        if(!array_key_exists("nom_al",$this->data['userdata'])){
            $this->session->set_userdata('nom_al',"");
        }
        if(!array_key_exists("prenom_al",$this->data['userdata'])){
            $this->session->set_userdata('prenom_al',"");
        }
        if(!array_key_exists("numero_al",$this->data['userdata'])){
            $this->session->set_userdata('numero_al',"");
        }
        if(!array_key_exists("comp_numero_al",$this->data['userdata'])){
            $this->session->set_userdata('comp_numero_al',"");
        }
        if(!array_key_exists("type_voie_al",$this->data['userdata'])){
            $this->session->set_userdata('type_voie_al',"");
        }
        if(!array_key_exists("voie_al",$this->data['userdata'])){
            $this->session->set_userdata('voie_al',"");
        }
        if(!array_key_exists("adresse_suite_al",$this->data['userdata'])){
            $this->session->set_userdata('adresse_suite_al',"");
        }
        if(!array_key_exists("ensemble_al",$this->data['userdata'])){
            $this->session->set_userdata('ensemble_al',"");
        }
        if(!array_key_exists("batiment_al",$this->data['userdata'])){
            $this->session->set_userdata('batiment_al',"");
        }
        if(!array_key_exists("escalier_al",$this->data['userdata'])){
            $this->session->set_userdata('escalier_al',"");
        }
        if(!array_key_exists("etage_al",$this->data['userdata'])){
            $this->session->set_userdata('etage_al',"");
        }
        if(!array_key_exists("porte_al",$this->data['userdata'])){
            $this->session->set_userdata('porte_al',"");
        }
        if(!array_key_exists("logo_al",$this->data['userdata'])){
            $this->session->set_userdata('logo_al',"");
        }
        if(!array_key_exists("code_postal_al",$this->data['userdata'])){
            $this->session->set_userdata('code_postal_al',"");
        }
        if(!array_key_exists("ville_al",$this->data['userdata'])){
            $this->session->set_userdata('ville_al',"");
        }
        
        if(!array_key_exists("livraison_express",$this->data['userdata'])){
            $this->session->set_userdata('livraison_express',"false");
        }       
        if(!array_key_exists("email_mediaserv",$this->data['userdata'])){
            $this->session->set_userdata('email_mediaserv',"");
        }
        if(!array_key_exists("verif_email",$this->data['userdata'])){
            $this->session->set_userdata('verif_email',"faux");
        }
        if(!array_key_exists("email",$this->data['userdata'])){
            $this->session->set_userdata('email',"");
        }
        
        if(!array_key_exists("type_de_facturation",$this->data['userdata'])||empty($this->data['userdata']["type_de_facturation"])){
            $this->session->set_userdata('type_de_facturation',"");
        }
        
        
        //adresse installation
        $this->data["civilite_aa"] = $this->session->userdata('civilite_aa');
        $this->data["nom_aa"] = $this->session->userdata('nom_aa');
        $this->data["prenom_aa"] = $this->session->userdata('prenom_aa');
        $this->data["numero_aa"] = $this->session->userdata('numero_aa');
        $this->data["comp_numero_aa"] = $this->session->userdata('comp_numero_aa');
        $this->data["type_voie_aa"] = $this->session->userdata('type_voie_aa');
        $this->data["voie_aa"] = $this->session->userdata('voie_aa');
        $this->data["adresse_suite_aa"] = $this->session->userdata('adresse_suite_aa');
        $this->data["ensemble_aa"] = $this->session->userdata('ensemble_aa');
        $this->data["batiment_aa"] = $this->session->userdata('batiment_aa');
        $this->data["escalier_aa"] = $this->session->userdata('escalier_aa');
        $this->data["etage_aa"] = $this->session->userdata('etage_aa');
        $this->data["porte_aa"] = $this->session->userdata('porte_aa');
        $this->data["logo_aa"] = $this->session->userdata('logo_aa');        
        $this->data["code_postal_aa"] = $this->session->userdata('code_postal_aa');
        $this->data["ville_aa"] = $this->session->userdata('ville_aa');
        $this->data["telephone_portable"] = $this->session->userdata('telephone_portable');
        $this->data["telephone_bureau"] = $this->session->userdata('telephone_bureau');
        $this->data["telephone_domicile"] = $this->session->userdata('telephone_domicile');
        
        //adresse facturation
        $this->data["check_adresse_facturation"] = $this->session->userdata('check_adresse_facturation');
        $this->data["civilite_af"] = $this->session->userdata('civilite_af',"");
        $this->data["nom_af"] = $this->session->userdata('nom_af',"");
        $this->data["prenom_af"] = $this->session->userdata('prenom_af',"");
        $this->data["numero_af"] = $this->session->userdata('numero_af',"");
        $this->data["comp_numero_af"] = $this->session->userdata('comp_numero_af',"");
        $this->data["type_voie_af"] = $this->session->userdata('type_voie_af',"");
        $this->data["voie_af"] = $this->session->userdata('voie_af',"");
        $this->data["adresse_suite_af"] = $this->session->userdata('adresse_suite_af',"");
        $this->data["code_postal_af"] = $this->session->userdata('code_postal_af',"");
        $this->data["ville_af"] = $this->session->userdata('ville_af',"");
        
        //adresse livraison
        $this->data["check_adresse_livraison"] = $this->session->userdata('check_adresse_livraison');
        $this->data["civilite_al"] = $this->session->userdata('civilite_al',"");
        $this->data["nom_al"] = $this->session->userdata('nom_al',"");
        $this->data["prenom_al"] = $this->session->userdata('prenom_al',"");
        $this->data["numero_al"] = $this->session->userdata('numero_al',"");
        $this->data["comp_numero_al"] = $this->session->userdata('comp_numero_al',"");
        $this->data["type_voie_al"] = $this->session->userdata('type_voie_al',"");
        $this->data["voie_al"] = $this->session->userdata('voie_al',"");
        $this->data["adresse_suite_al"] = $this->session->userdata('adresse_suite_al',"");
        $this->data["ensemble_al"] = $this->session->userdata('ensemble_al',"");
        $this->data["batiment_al"] = $this->session->userdata('batiment_al',"");
        $this->data["escalier_al"] = $this->session->userdata('escalier_al',"");
        $this->data["etage_al"] = $this->session->userdata('etage_al',"");
        $this->data["porte_al"] = $this->session->userdata('porte_al',"");
        $this->data["logo_al"] = $this->session->userdata('logo_al',"");
        $this->data["code_postal_al"] = $this->session->userdata('code_postal_al',"");
        $this->data["ville_al"] = $this->session->userdata('ville_al',"");

        $this->data["livraison_express"] = $this->session->userdata('livraison_express');
        $this->data["email_mediaserv"] = $this->session->userdata('email_mediaserv');
        $this->data["verif_email"] = $this->session->userdata('verif_email');        
        $this->data["email"] = $this->session->userdata('email');
        $this->data["type_de_facturation"] = $this->session->userdata('type_de_facturation');
       
        
        return $this->controller_mes_coord_vue();                
    }
    
    public function verifEmail(){
        $this->controller_verifySessExp()? redirect('mon_offre'):"";       
        $email_msv = $this->input->post("email_msv");
        $resultVerifEmail =$this->Wsdl_interrogeligib->verifEmail($email_msv);
        echo json_encode(array("msg"=>(empty($resultVerifEmail["Error"])?"Cet email est disponible":"Cet email n'est pas disponible"),"error"=>($resultVerifEmail["Disponible"]=="false"?"401":"0")));
      
    }
    
    public function verifParain(){
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
        $parrain_num_contrat = $this->input->post('parrain_num_contrat');
        $parrain_num_tel    = $this->input->post('parrain_num_tel');
        if(empty($parrain_num_contrat)||empty($parrain_num_tel)){
            echo json_encode(array("Error"=>array("ErrorMessage"=>"Veuillez saisir le numéro de contrat et le numéro de téléphone de votre parrain!")));
        }else{
            $resultVerifParain =$this->Wsdl_interrogeligib->verifParain($this->session->userdata("offreparrainage_id"),$parrain_num_contrat,$parrain_num_tel);
            //echo json_encode(array("faultstring"=>"Le serveur n'a pas pu lire la demande. ---> Il existe une erreur dans le document XML (3, 52). ---> Le format de la chaîne d'entrée est incorrect."));
           if(empty($resultVerifParain["Error"])){           
              $this->session->set_userdata("parainNumCont",$parrain_num_contrat);
              $this->session->set_userdata("parainNumTel",$parrain_num_tel);
           }
           $resultVerifParain["Error"]["ErrorMessage"] = !empty($resultVerifParain["Error"])?$resultVerifParain["Error"]["ErrorMessage"]:"Votre parrain existe. Merci!";
           if(isset($resultVerifParain["Id_parrain"]))
           $this->session->set_userdata("id_parrain",(isset($resultVerifParain["Id_parrain"])&&!empty($resultVerifParain["Id_parrain"]))?$resultVerifParain["Id_parrain"]:0);
           echo json_encode($resultVerifParain);
        }
    }
    
    public function updateFacture(){
        $this->controller_verifySessExp()? redirect('mon_offre'):"";              
         //MAJ PANIER
        $this->majPanier(array("produit"=>array("FACTURATION"),"etape"=>array("choixFacture") )); 
        echo json_encode($this->colonneDroite);
    }
    
   
}
/* End of file mes_coordonnees.php */
/* Location: ./application/controllers/mes_coordonnees.php */