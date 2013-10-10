<script>
    function modif_num()
    {
         preload();
           $.post(
                 '<?php echo base_url('mon_offre/ajax_proc_interogeligib');?>',
                     {
                        num_tel : $("#recap_num").val()                                                                                  
                     },
                    function(data){
                      $("#cont_mon_off").empty().prepend(data.htmlContent); 
                      $("#recap_contenu").empty().prepend(data.contenuDroit1);  
                       $("#recap_contenu").append(data.contenuDroit2);
                      $.unblockUI();                    
                    }, "json"  
            );
    }    
</script>
<div id="recap_contenu">    
   <?php
        if(array_key_exists("prevState",$userdata)){
            foreach($userdata["prevState"][1] as $val){
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
    ?>
   
</div>
 <div id="stopScroll"></div>