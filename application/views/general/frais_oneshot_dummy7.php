<div id="oneshot">
<?php 
    if(isset($oneshot_dummy7)&&$oneshot_dummy7!=""&&$decoder_tv!="uncheck"){
      
?>

<div class="custom-column p10 modem-deco">
    <h3 class="no-margin-top"><?php echo (isset($dummy7[0]["Libelle"]["string"]))?$dummy7[0]["Libelle"]["string"]:""; ?> <span class="right"><?php echo number_format($oneshot_dummy7,2,',',' ')."€";?></span></h3>
</div>
<!-- END OF CAUTION -->
<hr>
<?php } ?>
</div>