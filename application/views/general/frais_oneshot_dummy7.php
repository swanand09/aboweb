 <!-- oneshot DUMMY7 -->
<div id="oneshot">
<?php 
    if(isset($oneshot_dummy7)&&$oneshot_dummy7!=""&&$decoder_tv!="uncheck"){
?>
 <div class="mfacturation notitle forpro">
     <ul>
         <li class="bottom-10"><strong><?php echo (isset($dummy7[0]["Libelle"]["string"]))?$dummy7[0]["Libelle"]["string"]:""; ?><span class="right"><?php echo number_format($oneshot_dummy7,2,',',' ')."€";?></span></strong></li>
     </ul>
</div>

<hr>
<?php } ?>
</div>
  <!-- END OF ONESHOT -->