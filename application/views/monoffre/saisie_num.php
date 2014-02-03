 <?php
echo form_open('#',array('class'=>'border-gray frm-etape-tester columns twelve','onsubmit'=>'javascript:procTestEligib(\'contenu gauche\');return false;')); ?>
<div class='seven columns'>
    <label class='misc-custom-3'>
       <strong class='left'>SAISISEZ VOTRE NUM&Eacute;RO DE T&Eacute;L&Eacute;PHONE</strong>
       <span class='right'><a href='#' class='has-tip' data-width='250' title='En saisissant votre numéro de téléphone à dix chiffres, vous pourrez ainsi connaitre l’éligibilité de votre ligne.'><?php echo image('info_icon.png',NULL,array('class'=>'border-gray','title'=>'Plus info','alt'=>'Plus info'));?></a></span>
    </label>
     <div class="row">
        <div class="column three"><?php  echo form_input($ligne_prefix);?> </div>
        <div class="column nine"><?php  echo form_input($ligne_sufix);?></div>
      </div>    
       
</div>
<div class='five columns'>
    <?php echo form_submit($test_eligb_butt);?>
 </div>
<?php echo form_close();?>       
   <div>
    <div class='columns six text-right'><strong class='misc-custom-1' >VOUS N'AVEZ PAS DE LIGNE FIXE ?</strong></div>
    <div class='columns six text-left'><a class='btn-service-commercial' href='http://www.mediaserv.com/guadeloupe/souscrire/par-telephone.html' title="Contacter le service commercial">CONTACTER LE SERVICE COMMERCIAL</a></div>
  </div>
