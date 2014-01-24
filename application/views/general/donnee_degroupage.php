<?php
    $panierVal = $this->session->userdata("panierVal");
    if(!empty($panierVal)){       
       if(!empty($panierVal["degroupagedum1"])){
        ?>   
        <div class="degroupage end" style='min-height:20px'>
        <?php  
            foreach($panierVal["degroupagedum1"] as $key=>$val){
              ?>
                  <span class="left"><strong><?php echo utf8_encode($val["libelle"]); ?></strong></span>            
                  <span class="right"><strong><?php echo number_format($val["tarif"],2,',',' ')."€"; ?></strong></span>
            <?php

            }
            ?>
          </div>       
        <hr>  
      <?php
       }
        if(!empty($panierVal["portabilitedum1"])){
     ?>
        <div class="degroupage end" style='min-height:20px'>
             <span class="left"><strong><?php echo utf8_encode($panierVal["portabilitedum1"]["libelle"]); ?></strong></span>   
        </div>
     <?php   
        }
    }
   ?>