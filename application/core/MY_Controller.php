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
               
        public function controller_test_eligib_vue()
        {
           $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
          $this->data["prenum"] = "";
           if(!empty($this->data))
           {
              switch($this->data['department'])
              {
                  case "Martinique":
                      $this->data["prenum"] = "0596";
                  break;
              
                  case "Guadeloupe":
                      $this->data["prenum"] = "0590";
                  break;
              
                  case "Reunion":
                      $this->data["prenum"] = "0262";
                  break;
                  
                  case "Guyane":
                      $this->data["prenum"] = "0594";
                  break;
                  
                  case "Iles du Nord":
                      $this->data["prenum"] = "0605";
                  break;
                  default: $this->data["prenum"] = "0590";
              }
           }
           
           
           $this->data['num_tel']          = array(
                                                    'name' => 'num_tel',
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
           $this->data["pageid"] ="page-etape-1";
           $this->data["etapes_url"][0] = "#";
           $this->template
                            ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                            ->title('title', 'Mon Offre')
                            ->set_partial('contenu_gauche', 'monoffre/test_eligib')
                             ->set_partial('contenu_droit', 'monoffre/module_recap')    
                            ->build('page',$this->data);
           
        }
     
        public function controller_mes_coord_vue()
        {
            $this->data["pageid"] ="page-etape-2";
            $this->data["etapes_url"][0] = "mon_offre";
            $this->template
                                 ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                                 ->title('title', 'Mon Offre')
                                 ->set_partial('contenu_gauche', 'mes_coord/mes_coordonnes')
                                  ->set_partial('contenu_droit', 'monoffre/module_recap')    
                                 ->build('page',$this->data);
        }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */