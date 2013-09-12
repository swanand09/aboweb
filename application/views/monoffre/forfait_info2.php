<?php
if(!empty($iadArr["Tarif"])){
 $tarif = explode(".",$iadArr["Tarif"]);
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
                <div class="left trf"><span><?php echo $tarif[0]; ?>€<sup><?php echo $tarif[1]; ?></sup></span>TTC/mois</div>
               <?php //echo $iadArr["Libelle"]."&nbsp;&nbsp;".$iadArr["Tarif"]."&euro;"; ?>
          
     <?php
        }?>
</div>
<?php }?>
<div class="top-20 custom-column back-button left"><a alt="Précédent" href="javascript:prevState('test_eligib');" class="precedent">Précédent</a></div>