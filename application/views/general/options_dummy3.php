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
              <li class="small-icon-heart"><strong><?php echo isset($dummy3[3]["Libelle"]["string"])?$dummy3[3]["Libelle"]["string"]:""; ?></strong><span class="right" style="margin-left:50px;"><?php echo number_format($tarifOptionEden,2,',',' ')."€/mois"; ?></span><!--<br>(+18)--></li>
      <?php } 
            if(!empty($tarifOptionBein)&&isset($tarifOptionBein)){ ?>    
              <li class="small-icon-heart"><strong><?php echo isset($dummy3[4]["Libelle"]["string"])?$dummy3[4]["Libelle"]["string"]:""; ?></strong><span class="right" style="margin-left:50px;"><?php echo number_format($tarifOptionBein,2,',',' ')."€/mois"; ?></span><!--<br>(+18)--></li>
      <?php } 
             if(!empty($bouquetTv[3])&&isset($bouquetTv[3])){ ?> 
              <li><strong><?php echo isset($dummy3[5]["Libelle"]["string"])?utf8_encode($dummy3[5]["Libelle"]["string"]):""; ?></strong><span class="right" style="margin-left:50px;"><?php echo ($bouquetTv[3]=="inclus")?$bouquetTv[3]:number_format($bouquetTv[3],2,',',' ')."€/mois"; ?></span><!--<br>(+18)--></li>
      <?php }
             if(!empty($bouquetTv[4])&&isset($bouquetTv[4])){?>
              <li><strong><?php echo isset($dummy3[6]["Libelle"]["string"])?utf8_encode($dummy3[6]["Libelle"]["string"]):""; ?></strong><span class="right" style="margin-left:50px;"><?php echo ($bouquetTv[4]=="inclus")?$bouquetTv[4]:number_format($bouquetTv[4],2,',',' ')."€/mois"; ?></span><!--<br>(+18)--></li>   
      <?php } ?>
    </ul>
</div>
<hr>
<!--END OF OPTIONS DUMMY 3-->
<?php }?>
</div>