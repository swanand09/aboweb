<div id="options">
<?php
$panierVal = $this->session->userdata("panierVal");
if(!empty($panierVal["bouquetTvdum3"])||!empty($panierVal["optionTvdum3"])||!empty($panierVal["voddum3"])){
?>
<!--OPTIONS DUMMY 3-->
<div class="forpro options">
    <h3>Options<span class="right"><a id="modifier-option" href="#">Modifier</a></span></h3>
    <ul>
        <?php if(!empty($panierVal["bouquetTvdum3"])){ 
                //foreach($panierVal["bouquetTvdum3"] as $key=>$val){
        ?>
<!--        BOUQUET_TV-->
        <li style="background: url(<?php echo base_url()."/assets/images/contenu/".trim($panierVal["bouquetTvdum3"]["Valeurs"]["Picto"]); ?>) no-repeat scroll 0 3px rgba(0, 0, 0, 0);">
          <strong><?php echo $panierVal["bouquetTvdum3"]["Valeurs"]["Libelle"]["string"]; ?></strong><span class="right"><?php echo number_format($panierVal["bouquetTvdum3"]["Valeurs"]["Tarif"]["decimal"],2,',',' ')." €/mois"; ?></span></strong><br><?php echo $panierVal["bouquetTvdum3"]["nombreChaines"]; ?> chaînes
      </li>
        <?php 
               // }
                } ?>
<!--      OPTION_TV-->
      <?php 
            if(!empty($panierVal["optionTvdum3"])){
                foreach($panierVal["optionTvdum3"] as $key=>$val){
                    ?>
                        <li style="background: url(<?php echo base_url().'assets/images/contenu/'.$val["Valeurs"]["Picto"];?>) no-repeat scroll 0 3px rgba(0, 0, 0, 0);"><strong><?php echo $val["Valeurs"]["Libelle"]["string"]; ?><span class="right"><?php echo number_format($val["Valeurs"]["Tarif"]["decimal"],2,',',' ')." €/mois"; ?></span></strong><?php echo ($val["Valeurs"]["Libelle"]["string"]=="Eden")?"<br>(Réservé à un public adulte)":""; ?></li>
                    <?php
                }
             } 
      
     // VOD_PVR
       if(!empty($panierVal["voddum3"])){
        foreach($panierVal["voddum3"] as $key=>$val){
            foreach($val as $key2=>$val2){
                if($val2["promo"]["Duree_mois_promo"]>0){
                    $vodTarif       = $val2["promo"]["Tarif_promo"];
                    $vodDureePromo  = $val2["promo"]["Duree_mois_promo"];
                }else{
                    $vodTarif = ($val2["tarif"]>0)?$val2["tarif"]:"inclus";
                }
            ?>
                 <li style="background: url(<?php echo base_url().'assets/images/contenu/'.$val2["picto"]?>) no-repeat scroll 0 3px rgba(0, 0, 0, 0);"><strong><?php echo $key2; ?><span class="right"><?php echo ($vodTarif=="inclus")?$vodTarif:number_format($vodTarif,2,',',' ')." €/mois"; ?></span></strong></li>
           <?php }
        }
       
    }
      ?>
             
    </ul>
</div>
<hr>
<!--END OF OPTIONS DUMMY 3-->
<?php }?>
</div>
