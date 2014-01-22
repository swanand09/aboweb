<!-- MODEM & DECODEUR TV -->

<div id="location">
<?php //if(isset($dummy4[0]["Valeurs"]["Libelle"]["string"])){ 
    if(isset($location_equipement)&&!empty($location_equipement)){
       
?>
<div class="modem-deco notitle forpro">
  <ul>
    <?php foreach($location_equipement as $key=>$val){
        $label        = utf8_encode($val["Valeurs"]["Libelle"]["string"]);
        $tarifLocation = $val["Valeurs"]["Tarif"]["decimal"];
   ?>  
    <li class="bottom-10"><strong><?php echo $label; ?><span class="right"><?php echo ($tarifLocation>0)?number_format($tarifLocation,2,',',' ')."€/mois":"inclus"; ?></span></strong></li>
    <?php 
    }
    if(isset($tvChoisi)&&$tvChoisi==true){
        foreach($decodeurTv as $key=>$val){
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
