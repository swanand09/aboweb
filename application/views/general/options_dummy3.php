<div id="options">
<?php
$bouquet_picto = "";
$vodPvr = $this->session->userdata("vodPvr");
if(!empty($vodPvr)||(isset($bouquetChoisi)&&!empty($bouquetChoisi))){
    if(!empty($bouquetChoisi)){
    $bouquetTv = explode("_",$bouquetChoisi);    
        if(!empty($dummy3)){
            foreach($dummy3 as $key=>$val){
                if($bouquetTv[0]==$val["Valeurs"]["Libelle"]["string"]){
                  $bouquet_picto =  trim($val["Valeurs"]["Picto"]);
                }
            }
        }
    }
?>
<!--OPTIONS DUMMY 3-->
<div class="forpro options">
    <h3>Options<span class="right"><a href="#">Modifier</a></span></h3>
    <ul>
        <?php if(!empty($bouquetTv)){ ?>
<!--        BOUQUET_TV-->
        <li style="background: url(<?php echo base_url()."/assets/images/contenu/".$bouquet_picto; ?>) no-repeat scroll 0 3px rgba(0, 0, 0, 0);">
          <strong><?php echo $bouquetTv[0]; ?></strong><span class="right"><?php echo number_format($bouquetTv[1],2,',',' ')."€/mois"; ?></span></strong><br><?php echo $bouquetTv[2]; ?> chaînes
      </li>
        <?php } ?>
<!--      OPTION_TV-->
      <?php if(!empty($tarifOptionEden)&&isset($tarifOptionEden)&&!empty($dummy3)&&isset($dummy3[2])){ ?>    
              <li style="background: url(<?php echo base_url().'assets/images/contenu/'.$dummy3[2]["Valeurs"]["Picto"]?>) no-repeat scroll 0 3px rgba(0, 0, 0, 0);"><strong><?php echo isset($dummy3[2]["Valeurs"]["Libelle"]["string"])?$dummy3[2]["Valeurs"]["Libelle"]["string"]:""; ?></strong><span class="right" style="margin-left:50px;"><?php echo number_format($tarifOptionEden,2,',',' ')."€/mois"; ?></span><!--<br>(+18)--></li>
      <?php } 
            if(!empty($tarifOptionBein)&&isset($tarifOptionBein)&&!empty($dummy3)&&isset($dummy3[3])){ ?>    
              <li style="background: url(<?php echo base_url().'assets/images/contenu/'.$dummy3[3]["Valeurs"]["Picto"]?>) no-repeat scroll 0 3px rgba(0, 0, 0, 0);"><strong><?php echo isset($dummy3[3]["Valeurs"]["Libelle"]["string"])?$dummy3[3]["Valeurs"]["Libelle"]["string"]:""; ?></strong><span class="right" style="margin-left:50px;"><?php echo number_format($tarifOptionBein,2,',',' ')."€/mois"; ?></span><!--<br>(+18)--></li>
      <?php } 
      
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
