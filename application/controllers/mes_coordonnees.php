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
       
        $prevState = $this->session->userdata("prevState");
        //facturation
        
        $produit =  $this->session->userdata("produit");   
       if(isset($produit)&&!empty($produit)){
        foreach($produit as $key=>$val)
        {
          if($val["Categorie"]=="FACTURATION"&&strpos($val["Libelle"],"papier")!=false)
          {
              $this->data["facture_tarif"] = $val["Tarif"];              
              $this->data["facture_tarif_promo"] = $val["Tarif_promo"];
              $this->data["facture_duree_promo"] = $val["Duree_mois_promo"];
          }
        }
       }else{
           $this->session->destroy();
           redirect('mon_offre');
       }
        
        $dummyPanier            = $this->session->userdata("dummyPanier");
        $data["dummyPanier"]    = $dummyPanier;
        //$data["typeFacture"] = array("facture","electronique");
        $data["typeFacture"]    = $this->session->userdata("typeFacture");
        $prevState[1]["envoie_facture_dummy6"]  =   $this->load->view("general/type_facturation_dummy6",$data,true);
      // $this->colonneDroite["envoie_facture_dummy6"]  = $this->load->view("general/type_facturation_dummy6",$data,true);
//        if(isset($dummyPanier["dummy6"])){
//            foreach($dummyPanier["dummy6"] as $val){
//                $data["totalParMois"] = $this->getTotal($val["Tarif"]);             
//            }
//         }
       
         $this->session->set_userdata('prevState',$prevState);
         $this->data["userdata"] = $this->session->all_userdata();
        
        $wsVille = $this->session->userdata("ws_ville");
        $this->data["wsVille"] = $wsVille;
        /*
        $codePostal = "";
        $codeVille  = "";
        foreach($wsVille as $key=>$val){
            if(is_array($val)){
                $codePostal = $val["Code_postal"];
                $codeVille  = $val["Code_ville"];
                break;
            }else{
                $codePostal = $wsVille["Code_postal"];
                $codeVille  = $wsVille["Code_ville"];
            }
        }*/
        
        //re initialise session pour le panier partie parrainage
       // $prevState = $this->session->userdata("prevState");
        //$data["test"] = "test";
        /*$this->colonneDroite["parrainage"] = $this->load->view("general/parrainage",$data,true);        
        $prevState[1]["parrainage"] = $this->load->view("general/parrainage",$data,true); */       
        //$this->session->set_userdata('prevState',$prevState);
        /*
        //configuring rules
        $this->form_validation->set_rules('civilite_aa', 'civilite des adresses abonnement', 'required');
        $this->form_validation->set_rules('nom_aa', 'nom des adresses abonnement', 'trim|required|min_length[1]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('prenom_aa', 'prenom des adresses abonnement', 'trim|required|min_length[1]|max_length[30]|xss_clean');
//        $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|min_length[5]|max_length[5]|xss_clean');
//        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('numero_aa', 'numero des adresses abonnement', 'required');
        $this->form_validation->set_rules('code_postal_aa', 'codepostal des adresses abonnement', 'required');        
        $this->form_validation->set_rules('voie_aa', 'voie des adresses abonnement', 'required');
        
        $this->form_validation->set_rules('NomDeLaVoie', 'nom de la voie', 'trim|required|min_length[1]|max_length[200]|xss_clean');
        $this->form_validation->set_rules('complement', 'complement', 'required');
        $this->form_validation->set_rules('codepostal', 'codepostal', 'required');
        $this->form_validation->set_rules('ville', 'ville', 'required');
        $this->form_validation->set_rules('identique', 'identique', 'required');
        $this->form_validation->set_rules('email_mediaserv', 'email_mediaserv', 'trim|required');
        $this->form_validation->set_rules('emailAutre', 'une autre adresse', 'trim|required|valid_email');
        $this->form_validation->set_rules('TypeDeFacturation','type de facturation', 'required');
        */
        
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
            //update idcrm for dummy6
            $this->session->set_userdata("factureDummy6Crm",$this->updateFactureDummy6Crm('electronique'));
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
           if(!empty($resultVerifParain["Error"])){
               $resultVerifParain["Error"]["ErrorMessage"] = utf8_encode($resultVerifParain["Error"]["ErrorMessage"]);
           }
           $resultVerifParain["Error"]["ErrorMessage"] = !empty($resultVerifParain["Error"])?$resultVerifParain["Error"]["ErrorMessage"]:"Votre parrain existe. Merci!";
           if(isset($resultVerifParain["Id_parrain"]))
           $this->session->set_userdata("id_parrain",(isset($resultVerifParain["Id_parrain"])&&!empty($resultVerifParain["Id_parrain"]))?$resultVerifParain["Id_parrain"]:0);
           echo json_encode($resultVerifParain);
        }
    }
    
    public function updateFacture(){
       $this->controller_verifySessExp()? redirect('mon_offre'):""; 
       $typeFacture =  $this->input->post("typeFacture");
       $typeFacture = explode("_",$typeFacture);
       $data["typeFacture"] = $typeFacture;
       $this->session->set_userdata("typeFacture",$typeFacture);
       $this->session->set_userdata("facture","electronique");
       $data["totalParMois"] = $this->session->userdata('totalParMois');
       
       switch($typeFacture["1"]){
          case "papier": 
            $this->session->set_userdata("facture","papier");
            $data["totalParMois"] = $this->getTotal($typeFacture["2"]);
            $this->session->set_userdata("tarif_papier",$typeFacture["2"]);
          break;
          case "electronique":
            $this->session->set_userdata("facture","electronique");
            $tarif_papier =   $this->session->userdata("tarif_papier"); 
            if(!empty($tarif_papier)){
                $data["totalParMois"] = $this->getTotal(-$tarif_papier);
            }
          break;
       }
       $this->session->set_userdata("factureDummy6Crm",$this->updateFactureDummy6Crm($typeFacture["1"]));
       //total 1ere facture
        $caution_dummy5 = $this->session->userdata("caution_dummy5");
        $data["oneshot_dummy7"] = $this->session->userdata("oneshot_dummy7");
        $data["total1erFact"]  = $data["totalParMois"]+$data["oneshot_dummy7"]+$caution_dummy5[0];
        //total 2eme facture
        $data["total2emeFact"] = $data["totalParMois"]+$caution_dummy5[1];   
        
        
       $prevState = $this->session->userdata("prevState");
       $prevState[1]["envoie_facture_dummy6"] = $this->load->view("general/type_facturation_dummy6",$data,true);     
       $prevState[1]["total_par_mois"] = $this->load->view("general/total_mois",$data,true);
       $this->session->set_userdata("prevState",$prevState);
       echo json_encode(array("envoie_facture_dummy6"=>$prevState[1]["envoie_facture_dummy6"],"total_par_mois"=>$prevState[1]["total_par_mois"]));
    }
    
    public function updateFactureDummy6Crm($typeFacture){
       $dummyPanier = $this->session->userdata("dummyPanier"); 
       foreach($dummyPanier["dummy6"] as $key=>$val){
           if(strpos($this->stripAccents($val["Valeurs"]["Libelle"]["string"]),$typeFacture)==true){
               return $val["Id_crm"];
           }
       }
    }
}
/* End of file mes_coordonnees.php */
/* Location: ./application/controllers/mes_coordonnees.php */