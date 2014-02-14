<div id="recap_contenu">    
   <?php
        if(array_key_exists("prevState",$userdata)){
            //verif parainage
            $offparrainId = $this->session->userdata('offreparrainage_id');  
            $this->data["parrain"] =  $this->session->userdata("parrain");
            $this->data["parainNumCont"] = $this->session->userdata("parainNumCont");
            $this->data["parainNumTel"] = $this->session->userdata("parainNumTel");
           if((isset($this->data["parainageId"])&&!empty($this->data["parainageId"]))||!empty($offparrainId)){
               $this->colonneDroite["parrainage"]    = $this->load->view("general/parrainage",$this->data,true);   
           }
           $prevState = $this->session->userdata('prevState');
           if(isset($prevState[1]["parrainage"])){
             $prevState[1]["parrainage"] = $this->colonneDroite["parrainage"];   
             $this->session->set_userdata('prevState',array($prevState[0],$prevState[1])); 
              $prevState = $this->session->userdata('prevState');
           }
            
          
          if(!empty($prevState[1])&&isset($prevState[1])){
           foreach($prevState[1] as $key=>$val){
               if($key!="total_par_mois"){
                   if(!empty($val)){
                     if(!is_array($val)){
                      echo $val;
                     }else{                    
                         foreach($val as $val2){
                             echo $val2;
                         }
                     }
                   }
               }
               
               
               
            }
          }
       }
    ?>
   
</div>
<div id ="total_mois"><?php echo (array_key_exists("prevState",$userdata))?$userdata["prevState"][1]["total_par_mois"]:""; ?></div>
 <div id="stopScroll"></div>