<hr>
<div class="votre-offre p10">
    <span class="left">Votre offre Mediaserv</span>
    <span class="right">
        <strong><?php echo (!empty($text))?$text:$val["Tarif"]."€";?></strong>
    </span>
</div>
<?php 
if(empty($text)){ 
    $label = explode("@",utf8_encode($val["Libelle"]));
?>
<div class=" custom-column forpro forfait top-20 p10">
    <h3>Forfait <span class="right"><a href="#">Modifier</a></span></h3>
    <ul>
      <li class="small-icon-internet"><strong>Internet</strong><br><?php echo $label[1]; ?></li>
      <li class="small-icon-telephone"><strong>Téléphone</strong><br><?php echo $label[0]; ?></li>
    </ul>
</div>
<?php }?>