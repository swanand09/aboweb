<?php
if(!empty($iadArr["Tarif"])){
 $tarif = explode(".",$iadArr["Tarif"]);
 $tarif_promo = explode(".",$iadArr["Tarif_promo"]);
 
?>
<div class="border-gray modem-sagem">
    <?php
        if($iadArr["Libelle"]!="")
        {?>
           
               <input type='checkbox' checked='checked' disabled='disabled' class='left'>
               <?php echo image("modem_sagem.png",NULL,array("alt"=>"Modem Sagem FAST3504","class"=>"left"));?>   
                <div class="left plus">
                   <span class="green-text">+</span>
                   <span class="misc-custom-4">
                       <strong>Votre modem<br>Sagem FAST3504</strong>
                   </span>
                </div>
               <?php if($iadArr["Duree_mois_promo"]>0){?>
                  <div class='left trf nopromo'><span><?php echo $tarif[0]; ?>€<sup><?php echo $tarif[1]; ?></sup></span>TTC/mois</div>
                  <?php echo image('prix_bare.png',NULL,array("class"=>"prix_bare")); ?>              
                  <div class='left trf promo'><span><?php echo $tarif_promo[0]."€"; echo (isset($tarif_promo[1])?"<sup>".$tarif_promo[1]."</sup>":"&nbsp;"); ?></span>durant <?php echo $iadArr["Duree_mois_promo"]; ?> mois</div>
               <?php }else{ ?>
                <div class="left trf"><span><?php echo $tarif[0]; ?>€<sup><?php echo $tarif[1]; ?></sup></span>TTC/mois</div>
              <?php } ?>

          
     <?php
        }?>
</div>
<?php }?>
<div class="top-20 custom-column back-button left"><a alt="Précédent" href="javascript:prevState('test_eligib');" class="precedent">Précédent</a></div>