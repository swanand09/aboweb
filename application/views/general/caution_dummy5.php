 <!-- Caution DECODEUR TV -->
<div id="caution">
<?php 
    if(isset($caution_dummy5)&&  is_array($caution_dummy5)){
        $caution_dummy5 = $caution_dummy5[0]+$caution_dummy5[1];
?>
 <div class="caution-deco notitle forpro">
    <ul>
      <li><strong><?php echo (isset($dummy5[0]["Libelle"]["string"])?utf8_encode($dummy5[0]["Libelle"]["string"]):""); ?><span class="right"><?php echo ($caution_dummy5>0?number_format($caution_dummy5,2,',',' ')."€":"inclus");?></span></strong></li>
    </ul>
 </div>

<hr>
    <?php } ?>
</div>
 <!-- END OF CAUTION -->
