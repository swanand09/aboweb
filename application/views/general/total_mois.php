<?php
  if(isset($totalParMois)&&!empty($totalParMois)){ 
?>
<!--TOTAL ABONNEMENT-->
<div class="total">
  <h3 class="no-margin-top">Total abonnement<span class="right"><?php echo number_format($totalParMois,2,',',' ');?> €<span class="mini">/mois</span></span></h3>
  <div class="hpromo">(hors promotion)</div>
</div>
<!--END OF TOTAL-->
 <?php 
    if(isset($total1erFacture)&&!empty($total1erFacture)&&$total1erFacture!=$totalParMois&&$total1erFacture>0){ ?>
        <hr>
        <div class="total">
          <h3 class="no-margin-top">Total première facture :<span class="right"><?php echo number_format($total1erFacture,2,',',' '); ?> €</span></h3>
         <div class="hpromo">(hors promotion)</div>
        </div>
     <?php }
    if(isset($total2emeFacture)&&!empty($total2emeFacture)&&$total2emeFacture!=$totalParMois&&$total2emeFacture>0){
  ?>
    <hr>
    <div class="total">
      <h3 class="no-margin-top">Total deuxième facture :<span class="right"><?php echo number_format($total2emeFacture,2,',',' '); ?> €</span></h3>
      <div class="hpromo">(hors promotion)</div>
    </div>
    <?php 
    }
  }
  ?>