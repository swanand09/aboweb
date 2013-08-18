<script>
          $(document).ready(function() {
          //$(function() {             
           
            var cont_monoff = $('#cont_mon_off').html();   
           // $( "#cont_mon_off" ).html(cont_monoff);  
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
                    '<?php echo base_url('mon_offre/ajax_proc_interogeligib');?>',
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
          
             $("#butt_prev").click(function(){ 
                 alert('TOTO');
                $( "#cont_mon_off" ).html(cont_monoff); 
            });
          
          });   
</script>
<div class='left-etape-content' id="cont_mon_off">
    <?php  echo form_open('mon_offre/ajax_proc_interogeligib',array('class'=>'border-gray frm-etape-tester columns twelve')); ?>        
            <div class='seven columns'>
                     <label>
                        <strong>SAISISEZ VOTRE NUM&Eacute;RO DE T&Eacute;L&Eacute;PHONE</strong>
                        <span class='right'><a href='#'><?php echo image('info_icon.png',NULL,array('class'=>'border-gray','title'=>'Plus info','alt'=>'Plus info'));?></a></span>
                     </label>
                <?php  echo form_input($num_tel);?>     
            </div>
            <div class='five columns'>
               <?php echo form_submit($test_eligb_butt);?>
            </div>
      <?php echo form_close();?>       
         <div>
          <div class='columns six text-right'><strong class='misc-custom-1' >VOUS N'AVEZ PAS DE LIGNE FIXE ?</strong></div>
          <div class='columns six text-left'><a class='button secondary' href='#'>CONTACTER LE SERVICE COMMERCIAL</a></div>
        </div>
</div>
                