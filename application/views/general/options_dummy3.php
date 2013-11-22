<div id="options">
<?php
if(isset($bouquetTv)&&!empty($bouquetTv)){
    $bouquetTv = explode("_",$bouquetTv);
 
?>
<!--OPTIONS DUMMY 3-->
<div class="forpro options">
    <h3>Options<span class="right"><a href="#">Modifier</a></span></h3>
    <ul>
        <li class="<?php echo strtolower($bouquetTv[0]); ?>">
          <strong><?php echo $bouquetTv[0]; ?></strong><span class="right"><?php echo number_format($bouquetTv[1],2,',',' ')."€/mois"; ?></span></strong><br><?php echo $bouquetTv[2]; ?> chaînes
      </li>
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

<!--
OPTIONS
       <div class="forpro options">
         <h3>Options<span class="right"><a href="#">Modifier</a></span></h3>
         <ul>
           <li class="mega"><strong>Méga<span class="right">10€</span></strong><br>60 chaînes</li>
           <li class="giga"><strong>Giga<span class="right">10€</span></strong><br>60 chaînes</li>
           <li class="ultra"><strong>Ultra<span class="right">10€</span></strong><br>60 chaînes</li>
           <li class="sport"><strong>Bein Sport<span class="right">10€</span></strong><br>60 chaînes</li>
           <li class="eden"><strong>Eden<span class="right">10€</span></strong><br>(Réservé à un public adulte)</li>
           <li class="vod"><strong>Vidéo à la demande<span class="right">inclus</span></strong></li>
           <li class="dvr"><strong>Option Enregistreur Numérique<span class="right">inclus</span></strong></li>
         </ul>
       </div>
       END OF OPTIONS
       <hr>-->