 <!-- oneshot DUMMY7 -->

<div id="oneshot">
<?php 
    if(isset($oneshot_dummy7)&&$oneshot_dummy7!=""&&isset($decoder_tv)&&$decoder_tv!="uncheck"){
        $oneshot_dummy7 = $oneshot_dummy7[0]+$oneshot_dummy7[1];
?>
 <div class="mfacturation notitle forpro">
     <ul>
         <li class="bottom-10"><strong><?php echo (isset($dummy7[0]["Valeurs"]["Libelle"]["string"]))?$dummy7[0]["Valeurs"]["Libelle"]["string"]:""; ?><span class="right"><?php echo number_format($oneshot_dummy7,2,',',' ')."€";?></span></strong></li>
     </ul>
</div>

<hr>
<?php } 
    if(isset($oneshot_dummy7)&&!empty($oneshot_dummy7)){
        $label = utf8_encode($oneshot_dummy7["Libelle"]["string"]);
        $tarifOneshot = is_array($oneshot_dummy7["Tarif"]["decimal"])&&$oneshot_dummy7["Tarif"]["decimal"]>0?
                        $oneshot_dummy7["Tarif"]["decimal"][0]+$oneshot_dummy7["Tarif"]["decimal"][1]:
                        $oneshot_dummy7["Tarif"]["decimal"];
?>
 <div class="mfacturation notitle forpro">
     <ul>
         <li class="bottom-10"><strong><?php echo $label; ?><span class="right"><?php echo number_format($tarifOneshot,2,',',' ')."€";?></span></strong></li>
     </ul>
</div>
<hr>
    <?php } ?>
</div>
  <!-- END OF ONESHOT -->