<!-- MODEM & DECODEUR TV -->
<div id="location">
<div class="custom-column p10 modem-deco">
  <?php //if($iad["Tarif"]>0){ ?>  
  <h3 class="no-margin-top">Modem<span class="right"><?php echo $iad["Tarif"]; ?>€</span></h3>
  <?php //} ?>
  <?php if(!empty($beneficierTv)&&$decoder_tv!="uncheck"){?>
  <h3 id="decod_tv">Décodeur TV<span class="right"><?php echo $beneficierTv.((strlen($beneficierTv)>1)?"":".00"); ?>€</span></h3>
  <?php } ?>
</div>
<!-- END OF MODEM & DECODEUR TV -->
<hr>
</div>