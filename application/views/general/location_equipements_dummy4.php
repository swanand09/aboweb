<!-- MODEM & DECODEUR TV -->

<div id="location">
<?php 
    $panierVal = $this->session->userdata("panierVal");
   
    if(!empty($panierVal["locaEquipdum4"])||!empty($panierVal["decodEquipdum4"])){       
?>
<div class="modem-deco notitle forpro">
  <ul>
    <?php foreach($panierVal["locaEquipdum4"] as $key=>$val){
        $label        = utf8_encode($val["Valeurs"]["Libelle"]["string"]);
        $tarifLocation = $val["Valeurs"]["Tarif"]["decimal"];
   ?>  
    <li class="bottom-10"><strong><?php echo $label; ?><span class="right"><?php echo ($tarifLocation>0)?number_format($tarifLocation,2,',',' ')."€/mois":"inclus"; ?></span></strong></li>
    <?php 
    }
    if(!empty($panierVal["decodEquipdum4"])){
        foreach($panierVal["decodEquipdum4"] as $key=>$val){
    ?>
    <li><strong><?php echo utf8_encode($val["Valeurs"]["Libelle"]["string"]); ?><span class="right"><?php echo ($val["Valeurs"]["Tarif"]["decimal"]>0)?number_format($val["Valeurs"]["Tarif"]["decimal"],2,',',' ')."€/mois":"inclus"; ?></span></strong></li>
    <?php 
            }
        } ?>
  </ul>    
  
</div>
<!-- END OF MODEM & DECODEUR TV -->
<hr>
<?php } ?>
</div>
