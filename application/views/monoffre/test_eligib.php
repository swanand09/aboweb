<style>
    .prev_next
    {
        float:left;
        margin-right:50px;
    }
</style>
<script>  
          $(function() {                
         
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
                      //var content = $(data+'<div><div class="prev_next"><a href="javascript:void(0);" id="butt_prev">Précédent</a></div><div class="prev_next"><a href="javascript:void(0);" id="choose_forfait">Choisr Mon fortait</a></div></div>');
                       
                       var content = data+
                                     "<div>"+
                                     '<div class="prev_next"><?php echo anchor('mon_offre',"PRECEDENT");?></div>'+
                                     '<div class="prev_next"><a href="javascript:retrieveForfait();">CHOISIR MON FORFAIT</a></div>'+
                                     "</div>";
                      $("#cont_mon_off").empty().prepend(content); 
                      $.unblockUI();                    
                    }
                );
                return false;    
            });  
          });    
         function retrieveForfait()
         {
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
            $("#cont_mon_off").empty().load('mon_offre/forfait');
            $.unblockUI(); 
         }         
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
 