<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paiement extends MY_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wsdl_interrogeligib_model','Wsdl_interrogeligib'); 
    }  
    
    public function index()
    {
        $this->controller_verifySessExp()? redirect('mon_offre'):"";
        $this->data["userdata"] = $this->session->all_userdata();  
        return $this->controller_paiement_vue();   
    }
    
    public function generatePdf()
    {
        $this->load->helper(array('dompdf', 'file'));
        $data["test"] = "test";
        $html = $this->load->view('layouts/pdf_page', $data, true);
        pdf_create($html, 'receipt');
        //$data_pdf = pdf_create($html, '', false);
        //write_file('assets/pdf/receipt.pdf', $data_pdf);
    }
    
}
/* End of file paiement.php */
/* Location: ./application/controllers/paiement.php */