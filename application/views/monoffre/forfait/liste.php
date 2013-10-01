<?php
 $label = explode("@",utf8_encode($val["Libelle"]));
 $tarif = explode(".",$val["Tarif"]);
?>
<div class="forfait">
    <h3>Forfait n&deg;<?php echo $counter; ?></h3>
<!--     <label><?php //echo $val["promo_libelle"]; ?></label>-->
    <div class="three columns telephone">Téléphone<br><span class="green-text"><?php echo $label[0];?></span></div>
    <div class="three columns internet">Internet<br><span class="green-text"><?php echo $label[1];?></span></div>
    <!-- If television is not available, add 'not-available' to its class -->
    <div class="three columns television <?php echo ($eligible_tv=='false'?'not-available':'available');?>">Télé</div>
    <div class="three columns tarifs">
        <span class="green-text"><?php echo $tarif["0"]; ?>€<sup><?php echo $tarif["1"]; ?></sup></span>TTC/mois<strong>*</strong>
        <?php echo form_button($choixArr); ?>
    </div>
</div>  