<!--VOTRE OFFRE MEDIASERV-->
<div class="forpro votre-offre">
    <?php echo (!empty($text))?"<strong> VOTRE OFFRE MEDIASERV</strong><br><br><span class='top-10 block'><strong>".$text."</strong></span>":""; ?>    
    <?php if(!empty($donne_forfait)){ ?>
    <h3>Votre offre Mediaserv<span class="right"><?php echo (($donne_forfait["Tarif_promo"]>0)?number_format($donne_forfait["Tarif_promo"],2,',',' '):number_format($donne_forfait["Tarif"],2,',',' '))."€";?><span class="mini">/mois</span></span></h3>
    <?php } ?>
</div>
 <hr>
<!--END OF VOTRE OFFRE MEDIASERV-->
<?php 
    if(!empty($donne_forfait)){
     $label_internet  = isset($donne_forfait["Valeurs"]["WS_Produit_Valeur"][1]["Libelle"]["string"][0])?$donne_forfait["Valeurs"]["WS_Produit_Valeur"][1]["Libelle"]["string"][0]:$donne_forfait["Valeurs"]["WS_Produit_Valeur"]["Libelle"]["string"][0];
     $label_internet  = explode(";",utf8_encode($label_internet));
     $label_telephone = isset($donne_forfait["Valeurs"]["WS_Produit_Valeur"][1]["Libelle"]["string"][1])?$donne_forfait["Valeurs"]["WS_Produit_Valeur"][1]["Libelle"]["string"][1]:$donne_forfait["Valeurs"]["WS_Produit_Valeur"]["Libelle"]["string"][1];
     $label_telephone = explode(";",utf8_encode($label_telephone));
    
?>
<!--FORFAIT-->
<div class="forpro forfait">
  <h3>Forfait <span class="right"><a href="javascript:prevState('forfait');">Modifier</a></span></h3>
  <?php
   if(isset($dum1_degroup_tarif)){
    ?>
       <!--degroupage-->
      <div class="degroupage end" style='min-height:20px'>
            <span class="left"><?php echo utf8_encode($dum1_degroup_libelle); ?></span>
            <span class="right"><strong><?php echo number_format($dum1_degroup_tarif,2,',',' ')."€"; ?></strong></span>
       </div>
        <!--end degroupage--> 
    <?php
  }?>
  <ul>
    <li class="small-icon-internet"><strong>Internet</strong><br><?php echo $label_internet[1]; ?></li>
    <li class="small-icon-telephone"><strong>Téléphone</strong><br><?php echo $label_telephone[1]; ?></li>
  </ul>
</div>
 <hr>
<!--END OF FORFAIT-->
<?php } ?>
  