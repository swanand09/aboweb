<?php
  if(isset($totalParMois)&&!empty($totalParMois)){ 
?>

<!--TOTAL-->
<div class="custom-column p10 total">
  <h3 class="no-margin-top">Total par mois<span class="right"><?php echo number_format($totalParMois,2,',',' '); //$total?> €</span></h3>
</div>
<!--END OF TOTAL-->
  <?php } ?>