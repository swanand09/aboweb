 <!-- Caution DECODEUR TV -->
<div id="caution">
<?php 
    $panierVal = $this->session->userdata("panierVal");    
    if(!empty($panierVal["cautiondum5"])){
?>
 <div class="caution-deco notitle forpro">
    <ul>
      <?php foreach($panierVal["cautiondum5"] as $key=>$val){
                $label = utf8_encode($val["Valeurs"]["Libelle"]["string"]);
                $tarifCaution = is_array($val["Valeurs"]["Tarif"]["decimal"])&&$val["Valeurs"]["Tarif"]["decimal"]>0?
                        $val["Valeurs"]["Tarif"]["decimal"][0]+$val["Valeurs"]["Tarif"]["decimal"][1]:
                        $val["Valeurs"]["Tarif"]["decimal"];
      ?>  
      <li><strong><?php echo $label; ?><span class="right"><?php echo ($tarifCaution>0?number_format($tarifCaution,2,',',' ')."€":"inclus");?></span></strong></li>
    <?php }?>
    </ul>
 </div>

<hr>
    <?php } ?>
</div>
 <!-- END OF CAUTION -->
