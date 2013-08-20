<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $data;
	var  $userdata;     
        public function __construct()
	{
		parent::__construct();     
               // $this->load->model('User_model','user');    
              // $this->userdata = $this->session->all_userdata();
               //$this->load->file(FCPATH.'ajaxfw.php');
               
	}  	
        
        public function get_department()
        {
            $this->userdata["user_geolocalisation"] = $_SESSION["user_geolocalisation"];
        }
        
        public function controller_test_eligib_vue($data=array())
        {
           $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
          $this->data["prenum"] = "";
           if(!empty($data))
           {
              switch($data['department'])
              {
                  case "Martinique":
                      $this->data["prenum"] = "0201";
                  break;
              
                  case "Guadeloupe":
                      $this->data["prenum"] = "0302";
                  break;
              
                  case "Réunion":
                      $this->data["prenum"] = "0403";
                  break;
                  
                  case "Guyane":
                      $this->data["prenum"] = "0504";
                  break;
                  
                  case "Iles du Nord":
                      $this->data["prenum"] = "0605";
                  break;
              }
           }
           $this->data['num_tel'] = array('name' => 'num_tel',
                    'id' => 'num_tel',
                    'type' => 'text',
                    'value' => $this->data["prenum"]
            );
            $this->data['test_eligb_butt'] = array(
                                                    'class'=>'rmv-std-btn btn-green',
                                                    'name' => 'test_eligb_butt',
                                                    'id' => 'test_eligb_butt',
                                                    'type' => 'submit',
                                                    'value' => 'TESTER'
                                                  );
           $this->data["pageid"] ="page_1";
//            $ajax  = ajax();
//           $ajax->test_eligb_butt = $ajax->form('mon_offre/ajax_proc_interogeligib');
           $this->template
                            ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                            ->title('title', 'Mon Offre')
                            ->set_partial('test_eligib_contenu', 'monoffre/test_eligib')
                            ->build('page',$this->data);
        }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */