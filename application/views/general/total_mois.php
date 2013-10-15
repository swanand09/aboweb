<?php
    $total = (double)(($donne_forfait["Tarif_promo"]>0)?$donne_forfait["Tarif_promo"]:$donne_forfait["Tarif"]);
    $total +=(double)$iad["Tarif"];
    if(!empty($beneficierTv)&&!empty($decoder_tv)){    
        if($decoder_tv!="uncheck"){
             $total += (double)$beneficierTv;
        }
    }
?>
<!--TOTAL-->
<div class="custom-column p10 total">
  <h3 class="no-margin-top">Total par mois<span class="right"><?php echo $total;?> €</span></h3>
</div>
<!--END OF TOTAL-->