<?php
 //$label = explode("@",$val["Libelle"]);
 $tarif = explode(".",$val["Tarif"]);
 
 //gestion tarif promo et durée
 $tarifPromo = array();
 $dureePromo = $val["Duree_mois_promo"];
// if($val["Tarif_promo"]>0&&$val["Tarif_promo"]!=$val["Tarif"]){
 if($dureePromo>0){
    $tarifPromo = explode(".",$val["Tarif_promo"]);   
 }
 
?>
<div class="forfait">
    <h3>Forfait n&deg;<?php echo $counter; ?></h3>
<!--     <label><?php //echo $val["promo_libelle"]; ?></label>-->
    <div class="three columns telephone">Téléphone<br><span class="green-text"><?php echo $labelTel;?></span></div>
    <div class="three columns internet">Internet<br><span class="green-text"><?php echo $labelNet;?></span></div>
    <!-- If television is not available, add 'not-available' to its class -->
    <div class="three columns television <?php echo ($eligible_tv=='false'?'not-available':'available');?>">Télévision</div>
    <div class="three columns tarifs">
        <?php if(!empty($tarifPromo)){?>
            <div class="promo"><div class="prix"><?php echo $tarif["0"]; ?>€<sup><?php echo $tarif["1"]; ?></sup> <span>TTC/mois</span></div><?php echo image('prix_bare.png'); ?></div>
            <span class="green-text"><?php echo $tarifPromo[0]; ?>€<sup><?php echo (!empty($tarifPromo[1])?$tarifPromo[1]:"00"); ?></sup></span>pendant <?php echo $dureePromo; ?> mois<sup>(1)</sup>
        <?php }else{?>
        <span class="green-text"><?php echo $tarif["0"]; ?>€<sup><?php echo $tarif["1"]; ?></sup></span>TTC/mois
        <?php }
            echo form_button($choixArr);
        ?>
    </div>
</div>  