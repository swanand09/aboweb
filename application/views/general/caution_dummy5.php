 <!-- Caution DECODEUR TV -->
<div id="caution">
<?php 
    if(isset($caution_dummy5)){
       
?>
 <div class="caution-deco notitle forpro">
    <ul>
      <li class="bottom-10"><strong><?php echo (isset($dummy5[0]["Libelle"]["string"])?utf8_encode($dummy5[0]["Libelle"]["string"]):""); ?><span class="right"><?php echo ($caution_dummy5>0?number_format($caution_dummy5,2,',',' ')."€":"inclus");?></span></strong></li>
    </ul>
 </div>

<hr>
    <?php } ?>
</div>
 <!-- END OF CAUTION -->
