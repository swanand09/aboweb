<hr>
<div class="votre-offre p10">
    <span class="left">Votre offre Mediaserv</span>
    <span class="right">
        <strong><?php echo (!empty($text))?$text:$val["Tarif"]."€";?></strong>
    </span>
</div>
<?php 
if(!empty($tarifLocTvMod)){
    ?>
    <div class="votre-offre p10">
    <span class="left">Location box et décodeur TV</span>
    <span class="right">
        <strong><?php echo $tarifLocTvMod."€";?></strong>
    </span>
</div>
<?php
}
if(empty($text)){ 
    $label = explode("@",utf8_encode($val["Libelle"]));
?>
<div class=" custom-column forpro forfait top-20 p10">
    <h3>Forfait <span class="right"><a href="javascript:prevState('forfait');">Modifier</a></span></h3>
    <ul>
      <li class="small-icon-internet"><strong>Internet</strong><br><?php echo $label[1]; ?></li>
      <li class="small-icon-telephone"><strong>Téléphone</strong><br><?php echo $label[0]; ?></li>
    </ul>
</div>
<?php }?>