 <?php
echo form_open('#',array('class'=>'border-gray frm-etape-tester columns twelve','onsubmit'=>'javascript:procTestEligib();return false;')); ?>
<div class='seven columns'>
    <label class='misc-custom-3'>
       <strong class='left'>SAISISEZ VOTRE NUM&Eacute;RO DE T&Eacute;L&Eacute;PHONE</strong>
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