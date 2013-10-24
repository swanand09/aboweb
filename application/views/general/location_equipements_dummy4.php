<!-- MODEM & DECODEUR TV -->
<div id="location">
<div class="custom-column p10 modem-deco">
  <?php //if($iad["Tarif"]>0){ ?>  
  <h3 class="no-margin-top">Modem<span class="right"><?php echo ($iad["Tarif"]>0)?number_format($iad["Tarif"],2,',',' ')."€/mois":"inclus"; ?></span></h3>
  <?php //} ?>
  <?php if(isset($beneficierTv)&&$decoder_tv!="uncheck"){?>
  <h3 id="decod_tv">Décodeur TV<span class="right"><?php echo ($beneficierTv>0&&!empty($beneficierTv))?number_format($beneficierTv,2,',',' ')."€/mois":"inclus"; ?></span></h3>
  <?php } ?>
</div>
<!-- END OF MODEM & DECODEUR TV -->
<hr>
</div>