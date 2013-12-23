<!-- MODEM & DECODEUR TV -->

<div id="location">
<?php if(isset($dummy4[0]["Valeurs"]["Libelle"]["string"])){ ?>
<div class="modem-deco notitle forpro">
  <ul>
    <li class="bottom-10"><strong><?php echo (isset($dummy4[0]["Valeurs"]["Libelle"]["string"]))?$dummy4[0]["Valeurs"]["Libelle"]["string"]:""; ?><span class="right"><?php echo ($iad["Tarif"]>0)?number_format($iad["Tarif"],2,',',' ')."€/mois":"inclus"; ?></span></strong></li>
    <?php if(isset($beneficierTv)&&$decoder_tv!="uncheck"){?>
    <li><strong><?php echo (isset($dummy4[1]["Valeurs"]["Libelle"]["string"]))?$dummy4[1]["Valeurs"]["Libelle"]["string"]:""; ?><span class="right"><?php echo ($beneficierTv>0&&!empty($beneficierTv))?number_format($beneficierTv,2,',',' ')."€/mois":"inclus"; ?></span></strong></li>
    <?php } ?>
  </ul>    
  
</div>
<!-- END OF MODEM & DECODEUR TV -->
<hr>
<?php } ?>
</div>
