<div id="options">
<?php
if(isset($bouquetTv)&&!empty($bouquetTv)){
    $bouquetTv = explode("_",$bouquetTv);
    
?>
<!--OPTIONS DUMMY 3-->
<div class="custom-column forpro options p10">
    <h3>Options</h3>
    <ul class="bottom-20">
      <li class="small-icon-cross bottom-10"><strong><?php echo $bouquetTv[0]; ?></strong><span class="right" style="margin-left:50px;"><?php echo number_format($bouquetTv[1],2,',',' ')."€/mois"; ?><!--<br><a href="javascript:prevState('forfait');">Modifier</a>--></span><br><?php echo $bouquetTv[2]; ?> chaînes</li>
      <?php if(!empty($tarifOptionEden)&&isset($tarifOptionEden)){ ?>    
              <li class="small-icon-heart"><strong>Eden</strong><span class="right" style="margin-left:50px;"><?php echo number_format($tarifOptionEden,2,',',' ')."€/mois"; ?></span><!--<br>(+18)--></li>
      <?php } 
            if(!empty($tarifOptionBein)&&isset($tarifOptionBein)){ ?>    
              <li class="small-icon-heart"><strong>BeIN Sport</strong><span class="right" style="margin-left:50px;"><?php echo number_format($tarifOptionBein,2,',',' ')."€/mois"; ?></span><!--<br>(+18)--></li>
      <?php } ?>
    </ul>
</div>
<hr>
<!--END OF OPTIONS DUMMY 3-->
<?php }?>
</div>