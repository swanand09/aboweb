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
                      //var content = $(data+'<div><div class="prev_next"><a href="javascript:void(0);" id="butt_prev">Précédent</a></div><div class="prev_next"><a href="javascript:void(0);" id="choose_forfait">Choisr Mon fortait</a></div></div>');
                      
                      $("#cont_mon_off").empty().prepend(data.htmlContent); 
                      $("#recap_contenu").empty().prepend(data.contenuDroit);                      
                      $.unblockUI();                    
                    }, "json"  
            );
    }    
</script>
<div id="recap_contenu">
   
</div>