<div style='margin:10px 0px 30px 0px;'>
    <h3>FORFAIT N&deg;"<?php echo $counter; ?></h3>
    <div style='width:300px;float:left;margin-top:5px;'>
    <?php echo utf8_encode($val["Libelle"])."&nbsp;&nbsp;"; ?>           
    <?php echo $val["Tarif"];?>&euro;<br><br><span style='font-size:11px;'><strong>Promo: </strong><?php echo utf8_encode($val["Valeurs"]["WS_Produit_Valeur"][0]["Libelle"]["string"]);?></span>
</div>
<div style='clear:right;margin-top:5px;'>
    <?php echo form_button($choixArr); ?>
 </div>
</div>    