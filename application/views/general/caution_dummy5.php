<div id="caution">
<?php 
    if(isset($caution_dummy5)){
       
?>
<div class="custom-column p10 modem-deco">
    <h3 class="no-margin-top"><?php echo (isset($dummy5[0]["Libelle"]["string"])?utf8_encode($dummy5[0]["Libelle"]["string"]):""); ?><span class="right"><?php echo ($caution_dummy5>0?number_format($caution_dummy5,2,',',' ')."€":"inclus");?></span></h3>
</div>
<!-- END OF CAUTION -->
<hr>
    <?php } ?>
</div>