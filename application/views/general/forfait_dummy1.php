<div class="votre-offre p10">
    <span class="left">Votre offre Mediaserv <?php echo (!empty($text))?"<br>".$text:""; ?></span>  
    <?php if(!empty($donne_forfait)){ ?>
    <span class="right"><strong><?php echo (($donne_forfait["Tarif_promo"]>0)?number_format($donne_forfait["Tarif_promo"],2,',',' '):number_format($donne_forfait["Tarif"],2,',',' '))."€";?></strong></span>
    <?php } ?>
</div>
<?php 
  if(isset($dum1_degroup_tarif)){
    ?>
       <!--degroupage-->
        <div class="votre-offre p10">
            <span class="left" style="width:50px;"><?php echo utf8_encode($dum1_degroup_libelle); ?></span>
            <span class="right"><strong><?php echo number_format($dum1_degroup_tarif,2,',',' ')."€"; ?></strong></span>
        </div>
        <!--end degroupage--> 
    <?php
  }
?>

<?php     
    
    if(!empty($donne_forfait)){
     $label_internet  = isset($donne_forfait["Valeurs"]["WS_Produit_Valeur"][1]["Libelle"]["string"][0])?$donne_forfait["Valeurs"]["WS_Produit_Valeur"][1]["Libelle"]["string"][0]:$donne_forfait["Valeurs"]["WS_Produit_Valeur"]["Libelle"]["string"][0];
     $label_internet  = explode(";",utf8_encode($label_internet));
     $label_telephone = isset($donne_forfait["Valeurs"]["WS_Produit_Valeur"][1]["Libelle"]["string"][1])?$donne_forfait["Valeurs"]["WS_Produit_Valeur"][1]["Libelle"]["string"][1]:$donne_forfait["Valeurs"]["WS_Produit_Valeur"]["Libelle"]["string"][1];
     $label_telephone = explode(";",utf8_encode($label_telephone));
    
?>
<!--FORFAIT-->
<div class=" custom-column forpro forfait top-20 p10">
  <h3>Forfait <span class="right"><a href="javascript:prevState('forfait');">Modifier</a></span></h3>
  <ul>
    <li class="small-icon-internet"><strong>Internet</strong><br><?php echo $label_internet[1]; ?></li>
    <li class="small-icon-telephone"><strong>Téléphone</strong><br><?php echo $label_telephone[1]; ?></li>
  </ul>
</div>
<!--END OF FORFAIT-->
<?php } ?>