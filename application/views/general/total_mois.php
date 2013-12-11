<?php
  if(isset($totalParMois)&&!empty($totalParMois)){ 
?>
<!--TOTAL ABONNEMENT-->
<div class="total">
  <h3 class="no-margin-top">Total abonnement<span class="right"><?php echo number_format($totalParMois,2,',',' ');?> €<span class="mini">/mois</span></span></h3>
</div>
<!--END OF TOTAL-->
 <?php if(isset($total1erFact)&&!empty($total1erFact)){ ?>
  <hr>
  <div class="total">
    <h3 class="no-margin-top">Total première facture :<span class="right"><?php echo number_format($total1erFact,2,',',' '); ?> €</span></h3>
  </div>
 <?php }
  if(isset($total2emeFact)&&!empty($total2emeFact)){
  ?>
  <hr>
  <div class="total">
    <h3 class="no-margin-top">Total deuxième facture :<span class="right"><?php echo number_format($total2emeFact,2,',',' '); ?> €</span></h3>
  </div>
  <?php 
  }
  }
  ?>