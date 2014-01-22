<div id="options">
<?php
//$vodPvr = $this->session->userdata("vodPvr");
if(!empty($vodPvr)||(isset($bouquetChoisi)&&!empty($bouquetChoisi))){
    if(!empty($bouquetChoisi)){
        $bouquetTv = explode("__",$bouquetChoisi);  
    }
?>
<!--OPTIONS DUMMY 3-->
<div class="forpro options">
    <h3>Options<span class="right"><a href="#">Modifier</a></span></h3>
    <ul>
        <?php if(!empty($bouquetTv)){ ?>
<!--        BOUQUET_TV-->
        <li style="background: url(<?php echo base_url()."/assets/images/contenu/".trim($bouquetTv[0]); ?>) no-repeat scroll 0 3px rgba(0, 0, 0, 0);">
          <strong><?php echo $bouquetTv[1]; ?></strong><span class="right"><?php echo number_format($bouquetTv[2],2,',',' ')."€/mois"; ?></span></strong><br><?php echo $bouquetTv[3]; ?> chaînes
      </li>
        <?php } ?>
<!--      OPTION_TV-->
      <?php 
            if(!empty($optionData)){ 
                foreach($optionData as $key=>$val){
                    foreach($val as $key2=>$val2){
                    ?>
                        <li style="background: url(<?php echo base_url().'assets/images/contenu/'.$val2[0];?>) no-repeat scroll 0 3px rgba(0, 0, 0, 0);"><strong><?php echo $val2[1]; ?></strong><span class="right" style="margin-left:50px;"><?php echo number_format($val2[2],2,',',' ')."€/mois"; ?></span></li>
                    <?php
                    }
                }
             } 
      
     // VOD_PVR
       if(!empty($vodPvr)){
        foreach($vodPvr as $key=>$val){
            foreach($val as $key2=>$val2){
                if($val2["promo"]["Duree_mois_promo"]>0){
                    $vodTarif       = $val2["promo"]["Tarif_promo"];
                    $vodDureePromo  = $val2["promo"]["Duree_mois_promo"];
                }else{
                    $vodTarif = ($val2["tarif"]>0)?$val2["tarif"]:"inclus";
                }
            ?>
                 <li style="background: url(<?php echo base_url().'assets/images/contenu/'.$val2["picto"]?>) no-repeat scroll 0 3px rgba(0, 0, 0, 0);"><strong><?php echo utf8_encode($key2); ?><span class="right"><?php echo ($vodTarif=="inclus")?$vodTarif:number_format($vodTarif,2,',',' ')."€/mois"; ?></span></strong></li>
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
