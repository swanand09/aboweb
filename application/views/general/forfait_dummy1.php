<div class="votre-offre p10">
    <span class="left">Votre offre Mediaserv <?php echo (!empty($text))?"<br>".$text:""; ?></span>  
    <?php if(!empty($donne_forfait)){ ?>
    <span class="right"><strong><?php echo (($donne_forfait["Tarif_promo"]>0)?$donne_forfait["Tarif_promo"]:$donne_forfait["Tarif"])."€";?></strong></span>
    <?php } ?>
</div>
<?php 
  if(isset($dum1_degroup_tarif)){
    ?>
       <!--degroupage-->
        <div class="votre-offre p10">
            <span class="left" style="width:50px;"><?php echo utf8_encode($dum1_degroup_libelle); ?></span>
            <span class="right"><strong><?php echo number_format($dum1_degroup_tarif,2,'.',' ')."€"; ?></strong></span>
        </div>
        <!--end degroupage--> 
    <?php
  }
?>

<?php     
    if(!empty($donne_forfait)){
     $label = explode("@",utf8_encode($donne_forfait["Libelle"]));
?>
<!--FORFAIT-->
<div class=" custom-column forpro forfait top-20 p10">
  <h3>Forfait <span class="right"><a href="javascript:prevState('forfait');">Modifier</a></span></h3>
  <ul>
    <li class="small-icon-internet"><strong>Internet</strong><br><?php echo $label[1]; ?></li>
    <li class="small-icon-telephone"><strong>Téléphone</strong><br><?php echo $label[0]; ?></li>
  </ul>
</div>
<!--END OF FORFAIT-->
<?php } ?>