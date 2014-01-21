 <!-- Caution DECODEUR TV -->
<div id="caution">
<?php 
    if(isset($caution_dummy5)&&  is_array($caution_dummy5)){
        $label = utf8_encode($caution_dummy5["Libelle"]["string"]);
        $tarifCaution = is_array($caution_dummy5["Tarif"]["decimal"])&&$caution_dummy5["Tarif"]["decimal"]>0?
                        $caution_dummy5["Tarif"]["decimal"][0]+$caution_dummy5["Tarif"]["decimal"][1]:
                        $caution_dummy5["Tarif"]["decimal"];
?>
 <div class="caution-deco notitle forpro">
    <ul>
      <li><strong><?php echo $label; ?><span class="right"><?php echo ($caution_dummy5>0?number_format($tarifCaution,2,',',' ')."€":"inclus");?></span></strong></li>
    </ul>
 </div>

<hr>
    <?php } ?>
</div>
 <!-- END OF CAUTION -->
