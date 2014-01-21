<!-- MODEM & DECODEUR TV -->

<div id="location">
<?php //if(isset($dummy4[0]["Valeurs"]["Libelle"]["string"])){ 
    if(isset($location_equipement)&&!empty($location_equipement)){
       
        $label        = utf8_encode($location_equipement["Valeurs"]["Libelle"]["string"]);
        $tarifLocation = $location_equipement["Valeurs"]["Tarif"]["decimal"];
?>
<div class="modem-deco notitle forpro">
  <ul>
    <li class="bottom-10"><strong><?php echo $label; ?><span class="right"><?php echo ($tarifLocation>0)?number_format($tarifLocation,2,',',' ')."€/mois":"inclus"; ?></span></strong></li>
    <?php if(isset($beneficierTv)&&$decoder_tv!="uncheck"){?>
    <li><strong><?php echo (isset($dummy4[1]["Valeurs"]["Libelle"]["string"]))?$dummy4[1]["Valeurs"]["Libelle"]["string"]:""; ?><span class="right"><?php echo ($beneficierTv>0&&!empty($beneficierTv))?number_format($beneficierTv,2,',',' ')."€/mois":"inclus"; ?></span></strong></li>
    <?php } ?>
  </ul>    
  
</div>
<!-- END OF MODEM & DECODEUR TV -->
<hr>
<?php } ?>
</div>
