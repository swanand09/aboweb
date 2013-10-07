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
        $this->data["userdata"] = $this->session->all_userdata();
        //re initialise session pour le panier partie parrainage
        $prevState = $this->session->userdata("prevState");
        $data["test"] = "test";
        $this->colonneDroite["parrainage"] = $this->load->view("general/parrainage",$data,true);        
        $prevState[1]["parrainage"] = $this->load->view("general/parrainage",$data,true);        
        $this->session->set_userdata('prevState',$prevState);
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
            $resultVerifParain =$this->Wsdl_interrogeligib->verifParain($this->session->userdata("idParcours"),$parrain_num_contrat,$parrain_num_tel);
            //echo json_encode(array("faultstring"=>"Le serveur n'a pas pu lire la demande. ---> Il existe une erreur dans le document XML (3, 52). ---> Le format de la chaîne d'entrée est incorrect."));
            echo json_encode($resultVerifParain);
        }
    }
}
/* End of file mes_coordonnees.php */
/* Location: ./application/controllers/mes_coordonnees.php */