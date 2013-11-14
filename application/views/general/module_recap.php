<div id="recap_contenu">    
   <?php
        if(array_key_exists("prevState",$userdata)){
            foreach($userdata["prevState"][1] as $key=>$val){
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
    ?>
   
</div>
<div id ="total_mois"><?php echo (array_key_exists("prevState",$userdata))?$userdata["prevState"][1]["total_par_mois"]:""; ?></div>
 <div id="stopScroll"></div>