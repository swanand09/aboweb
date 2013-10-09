<?php
 $label = explode("@",utf8_encode($val["Libelle"]));
 $tarif = explode(".",$val["Tarif"]);
 $tarifPromo = array();
 $dureePromo = $val["Duree_mois_promo"];
 if($val["Tarif_promo"]>0){
    $tarifPromo = explode(".",$val["Tarif_promo"]);   
 }
?>
<div class="forfait">
    <h3>Forfait n&deg;<?php echo $counter; ?></h3>
<!--     <label><?php //echo $val["promo_libelle"]; ?></label>-->
    <div class="three columns telephone">Téléphone<br><span class="green-text"><?php echo $label[0];?></span></div>
    <div class="three columns internet">Internet<br><span class="green-text"><?php echo $label[1];?></span></div>
    <!-- If television is not available, add 'not-available' to its class -->
    <div class="three columns television <?php echo ($eligible_tv=='false'?'not-available':'available');?>">Télé</div>
    <div class="three columns tarifs">
        <?php if(!empty($tarifPromo)){?>
            <div class="promo"><div class="prix"><?php echo $tarif["0"]; ?>€<sup><?php echo $tarif["1"]; ?></sup> <span>TTC/mois</span></div><img src="images/prix_bare.png"></div>
            <span class="green-text"><?php echo $tarifPromo[0]; ?>€<sup><?php echo $tarifPromo[1]; ?></sup></span>TTC/mois<strong>*</strong>
        <?php }else{?>
        <span class="green-text"><?php echo $tarif["0"]; ?>€<sup><?php echo $tarif["1"]; ?></sup></span>TTC/mois<strong>*</strong>
        <?php }
            echo form_button($choixArr);
        ?>
    </div>
</div>  