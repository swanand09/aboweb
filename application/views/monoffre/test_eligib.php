<?php
//    echo "<pre>";
//    print_r($userdata);
//    echo "</pre>";
?>
<style>
    .prev_next
    {
        float:left;
        margin-right:50px;
    }
</style>
<script>  
        var preload = function(){ 
                      $.blockUI({                    
                    message:$("#displayBox"),
                      css: { border: 'none',
                        padding: '15px',
                        backgroundColor: '#fff',
                        width: '60px',
                        '-webkit-border-radius': '10px', 
                        '-moz-border-radius': '10px',
                        'border-radius': '10px',
                        opacity: .5
                         } 
                 }); 
              }
          
          function procTestEligib()
          {
                preload();
                $.post(
                    '<?php echo base_url('mon_offre/ajax_proc_interogeligib');?>',
                     {
                        num_tel : $("#num_tel").val()                                                                                  
                     },
                    function(data){
                      //var content = $(data+'<div><div class="prev_next"><a href="javascript:void(0);" id="butt_prev">Précédent</a></div><div class="prev_next"><a href="javascript:void(0);" id="choose_forfait">Choisr Mon fortait</a></div></div>');
                      
                      $("#cont_mon_off").empty().prepend(data.htmlContent); 
                      $("#recap_contenu").empty().prepend(data.contenuDroit);                     
                      $.unblockUI();                    
                    }, "json"
                );
                return false; 
          }
          
          function retrieveForfait()
          {           
              preload();
              var redu_facture = "false";
              var consv_num_tel = "false";
                if($("#redu_facture").is(":checked"))
                {
                    redu_facture = "true";
                }
                if($("#consv_num_tel").is(":checked"))
                {
                    consv_num_tel = "true";
                }
                $.post(
                    '<?php echo base_url('mon_offre/forfait');?>',
                     {
                        redu_facture : redu_facture,
                        consv_num_tel : consv_num_tel
                     },
                    function(data){
                      $("#cont_mon_off").empty().prepend(data.htmlContent); 
                      $("#recap_contenu").empty().prepend(data.contenuDroit);   
                      $.unblockUI();                    
                    },"json"
                  );   
                      return false;
          }  
          function prevState()
          {               
                preload();
                $("#cont_mon_off").empty().load('mon_offre/prevState');
                $.unblockUI(); 
          }
</script>

<div class='left-etape-content' id="cont_mon_off">
    
    <?php
       if(array_key_exists("prevState",$userdata)){
            $redu_facture = $this->session->userdata("redu_facture");
            $htmlContent = $userdata["prevState"]["htmlContent"];
            if($redu_facture=="true")
            {
                $htmlContent = str_replace('<input type="checkbox" name="redu_facture" value="true" id="redu_facture"  />','<input type="checkbox" name="redu_facture" value="true" checked="checked" id="redu_facture"  />',$htmlContent);
            }
            $consv_num_tel = $this->session->userdata("consv_num_tel");
            if($consv_num_tel=="true")
            {
                $htmlContent = str_replace('<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel"  />','<input type="checkbox" name="consv_num_tel" value="true" checked="checked" id="consv_num_tel"  />',$htmlContent);
            }
            echo utf8_encode(utf8_decode($htmlContent)); 
       }else {?>
           <?php  echo form_open('#',array('class'=>'border-gray frm-etape-tester columns twelve','onsubmit'=>'javascript:procTestEligib();return false;')); ?>        
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
     <?php 
        }
    ?>
</div>
 