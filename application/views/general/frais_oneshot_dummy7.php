 <!-- oneshot DUMMY7 -->

<div id="oneshot">
<?php 
    if(isset($oneshot_dummy7)&&$oneshot_dummy7!=""&&isset($decoder_tv)&&$decoder_tv!="uncheck"){
        //$oneshot_dummy7 = $oneshot_dummy7[0]+$oneshot_dummy7[1];
?>
 <div class="mfacturation notitle forpro">
     <ul>
         <?php foreach($oneshot_dummy7 as $key=>$val){
                $tarifOneshot = (is_array($val["Valeurs"]["Tarif"]["decimal"]))?$val["Valeurs"]["Tarif"]["decimal"][0]+$val["Valeurs"]["Tarif"]["decimal"][1]:$val["Valeurs"]["Tarif"]["decimal"];
                   
          ?>
         <li class="bottom-10"><strong><?php echo $val["Valeurs"]["Libelle"]["string"]; ?><span class="right"><?php echo number_format($tarifOneshot,2,',',' ')."€";?></span></strong></li>
         <?php } ?>
     </ul>
</div>

<hr>
<?php } 
    if(isset($oneshot_dummy7)&&!empty($oneshot_dummy7)){
         foreach($oneshot_dummy7 as $key=>$val){
            $label = utf8_encode($val["Valeurs"]["Libelle"]["string"]);
            $tarifOneshot = is_array($val["Valeurs"]["Tarif"]["decimal"])&&$val["Valeurs"]["Tarif"]["decimal"]>0?
                            $val["Valeurs"]["Tarif"]["decimal"][0]+$val["Valeurs"]["Tarif"]["decimal"][1]:
                            $val["Valeurs"]["Tarif"]["decimal"];
?>
 <div class="mfacturation notitle forpro">
     <ul>
         <li class="bottom-10"><strong><?php echo $label; ?><span class="right"><?php echo number_format($tarifOneshot,2,',',' ')."€";?></span></strong></li>
     </ul>
</div>
<hr>
  <?php }
    }
  ?>
</div>
  <!-- END OF ONESHOT -->