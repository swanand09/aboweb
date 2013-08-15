<?php //if (!defined('BASEPATH')) exit('No direct script access allowed');
      defined('BASEPATH') OR exit('No direct script access allowed');
      
      class Nusoap_lib{
          function Nusoap_lib(){
               require_once(str_replace("\\","/",APPPATH).'libraries/nusoap/nusoap'.EXT); //If we are executing this script on a Windows server
          }
      }
?>