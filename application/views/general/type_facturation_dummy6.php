<!-- facturation -->
<div id="colFacture">
 <?php
     $panierVal = $this->session->userdata("panierVal");  
     if(!empty($panierVal["facturedum6"])){
 ?>
<div class="mfacturation notitle forpro">
    <ul>
        <?php
         foreach($panierVal["facturedum6"] as $key=>$val){
        ?>    
        <li class="bottom-10"><strong>Facturation : <?php echo $val["Valeurs"]["Libelle"]["string"]; ?><span class="right"><?php echo (isset($val["Valeurs"]["Tarif"]["decimal"])&&$val["Valeurs"]["Tarif"]["decimal"]>0)?number_format($val["Valeurs"]["Tarif"]["decimal"],2,',',' ')."€/mois":"inclus"; ?></span></strong></li>
         <?php } ?> 
   </ul>
</div>
<hr>
<?php 
     }
?>
</div>
<!-- END facturation -->