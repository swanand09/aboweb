<?php
 $label = explode("@",utf8_encode($val["Libelle"]));
 $tarif = explode(".",$val["Tarif"]);
?>
<div class="forfait">
    <h3>Forfait n&deg;<?php echo $counter; ?></h3>
    <div class="three columns telephone">Téléphone<br><span class="green-text"><?php echo $label[0];?></span></div>
    <div class="three columns internet">Internet<br><span class="green-text"><?php echo $label[1];?></span></div>
    <!-- If television is not available, add 'not-available' to its class -->
    <div class="three columns television not-available">Télé</div>
    <div class="three columns tarifs">
        <span class="green-text"><?php echo $tarif["0"]; ?>€<sup><?php echo $tarif["1"]; ?></sup></span>TTC/mois<strong>*</strong>
        <?php echo form_button($choixArr); ?>
    </div>
</div>  

<!--<div class="forfait">
    <h3>FORFAIT N&deg;"<?php echo $counter; ?></h3>
    <div style='width:300px;float:left;margin-top:5px;'>
    <?php //echo utf8_encode($val["Libelle"])."&nbsp;&nbsp;"; ?>           
    <?php //echo $val["Tarif"];?>&euro;<br><br><span style='font-size:11px;'>
    <?php //if(!empty($val["Valeurs"]["WS_Produit_Valeur"][0]["Libelle"]["string"])){?>
    <strong>Promo: </strong><?php //echo utf8_encode($val["Valeurs"]["WS_Produit_Valeur"][0]["Libelle"]["string"]);?></span>
    <?php //} ?>
</div>
<div style='clear:right;margin-top:5px;'>
    <?php //echo form_button($choixArr); ?>
 </div>
</div>    -->