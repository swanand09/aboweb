<div id="options">
<?php
if(isset($bouquetTv)&&!empty($bouquetTv)){
    $bouquetTv = explode("_",$bouquetTv);
?>
<!--OPTIONS DUMMY 3-->
<div class=" custom-column forpro forfait top-20 p10">
  <h3>Options <span class="right" style="margin-left:50px;"><?php echo number_format($bouquetTv[1],2,'.',' ')."€/mois"; ?><br><a href="javascript:prevState('forfait');">Modifier</a></span></h3>
  <ul class="bottom-20">
    <li><strong><?php echo $bouquetTv[0]; ?></strong></li>
  </ul>
</div>
<hr>
<!--END OF FORFAIT-->
<?php }?>
</div>