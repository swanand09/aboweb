<div class="votre-offre p10">
    <span class="left">Votre offre Mediaserv <?php echo (!empty($text))?"<br>".$text:""; ?></span>  
    <?php if(!empty($donne_forfait)){ ?>
    <span class="right"><strong><?php echo $donne_forfait["Tarif"]."€";?></strong></span>
    <?php } ?>
</div>
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