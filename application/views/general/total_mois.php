<?php
    /*
    $total = (double)(($donne_forfait["Tarif_promo"]>0)?$donne_forfait["Tarif_promo"]:$donne_forfait["Tarif"]);
    $total +=(double)$iad["Tarif"];
    if(!empty($beneficierTv)&&!empty($decoder_tv)){    
        if($decoder_tv!="uncheck"){
             $total += (double)$beneficierTv;
        }
    }
    
    //degroupage dummy 1
    if(isset($dum1_degroup_tarif)){
         $total +=(double)$dum1_degroup_tarif;
    }
    
    //facturation dummy 6
    if(isset($dummyPanier["dummy6"])){
        foreach($dummyPanier["dummy6"] as $val){
            $total += (double)$val["Tarif"];
        }
    }
    
    // caution dummy 5
    if(isset($caution_dummy5)){
        $total += (double)$caution_dummy5;
    }
    
    //oneshot dummy7
    if(isset($oneshot_dummy7)&&$oneshot_dummy7!=""&&!empty($decoder_tv)){
        if($decoder_tv!="uncheck"){
            $total += (double)$oneshot_dummy7;
        }
    }
     //options dummy3
    if(isset($bouquetTv)&&!empty($bouquetTv)){
       $bouquetTv = explode("_",$bouquetTv);       
       $total += (double)$bouquetTv[1];
      
    }
  */
?>
<!--TOTAL-->
<div class="custom-column p10 total">
  <h3 class="no-margin-top">Total par mois<span class="right"><?php echo number_format($totalParMois,2,',',' '); //$total?> €</span></h3>
</div>
<!--END OF TOTAL-->