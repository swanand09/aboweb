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
                      $("#recap_contenu").empty().prepend(data.contenuDroit);                      
                      $.unblockUI();                    
                    }, "json"  
            );
    }    
</script>
<div id="recap_contenu">
   <?php
       if(array_key_exists("prevState",$userdata)){
           echo $userdata["prevState"]["contenuDroit"];
       }
    ?>
</div>