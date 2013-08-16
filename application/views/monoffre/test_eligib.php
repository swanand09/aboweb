<script>
          $(function() {             
            
            var cont_monoff = '<?php 
                        echo form_open('mon_offre/ajax_proc_interogeligib');
                        echo "<label>Saisissez votre numéro de téléphone:</label>";
                        echo form_input($num_tel);
                        echo form_submit($test_eligb_butt);
                        echo form_close();
                    ?>';
            $("#butt_prev").click(function(){
                $( "#cont_mon_off" ).html(cont_monoff); 
            });
            $( "#cont_mon_off" ).html(cont_monoff);  
            $("form").submit(function(){
                 $.blockUI({ 
                    message:$("#prlodtxt"), 
                    css: { 
                    border: 'none', 
                    padding: '15px', 
                    backgroundColor: '#000', 
                    '-webkit-border-radius': '10px', 
                    '-moz-border-radius': '10px', 
                    opacity: .5, 
                    color: '#fff' 
                } }); 
                $.post(
                    'mon_offre/ajax_proc_interogeligib',
                     {
                        num_tel : $("#num_tel").val()                                                                                  
                     },
                    function(data){
                       var content = $(data+'<div><a href="javascript:void(0);" id="butt_prev">Précédent</a></div>');
                       $( "#cont_mon_off" ).html(content);   
                       $.unblockUI();
                    }
                );
                return false;    
            });    
            
          });   
</script>
<div id="cont_mon_off">

</div>