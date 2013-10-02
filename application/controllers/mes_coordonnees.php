<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mes_coordonnees extends MY_Controller {
	
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index()
    {
        $this->data["userdata"] = $this->session->all_userdata();
        
        return $this->controller_mes_coord_vue();                
    }
    
    public function verifEmail(){
        $email_msv = $this->input->post("email_msv");
        $resultVerifEmail =$this->Wsdl_interrogeligib->verifEmail($email_msv);
        echo json_encode(array("msg"=>(empty($resultVerifEmail["Error"])?"Cet email est disponible":"Cet email n'est pas disponible"),"error"=>($resultVerifEmail["Disponible"]=="false"?"401":"0")));
        
    }
}
/* End of file mes_coordonnees.php */
/* Location: ./application/controllers/mes_coordonnees.php */