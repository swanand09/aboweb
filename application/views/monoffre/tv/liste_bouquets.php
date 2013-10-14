<script>       
  $(function(){
      $("#bouquet_mega").attr("Disabled","Disabled");
      $("#bouquet_giga").attr("Disabled","Disabled");
      $("#bouquet_ultra").attr("Disabled","Disabled");
      $("#beneficier").click(function(){          
        if($(this).is(":checked")){          
           $("#decodeur_tv_netgem").attr("Checked","Checked");
            $("#bouquet_mega").removeAttr("Disabled");
           $("#bouquet_giga").removeAttr("Disabled");
           $("#bouquet_ultra").removeAttr("Disabled");
           
       }else{          
           $("#decodeur_tv_netgem").removeAttr("Checked");
           $("#bouquet_mega").removeAttr("checked");
           $("#bouquet_giga").removeAttr("checked");
           $("#bouquet_ultra").removeAttr("checked");
           $("#bouquet_mega").attr("Disabled","Disabled");
           $("#bouquet_giga").attr("Disabled","Disabled");
           $("#bouquet_ultra").attr("Disabled","Disabled");           
       }  
      }); 
        
      
  });  


function gotoMesCoord(){
   $(location).attr('href',"mes_coordonnees");
}
</script>

<form class="frm-tv" onSubmit="javascript:gotoMesCoord();return false; ">

        <div class="row">
          <div class="column twelve">
            <label for="beneficier"><input type="checkbox" id="beneficier" <?php echo (!empty($location_equipements)?"checked=checked":""); ?> onclick="javascript: choixTv();" value="<?php echo ($tarif_loca_decod>0?$tarif_loca_decod:$tarif_activ_servicetv); ?>" name="beneficier"> Je souhaite bénéficier de la TV avec 35 chaînes incluses.</label>
          </div>
        </div>

        <div class="row chaines-tv">
          <h3>MA TV <a href="#" class="en-savoir-plus right">En savoir +</a></h3>
          <div class="column eight">
            <!-- BASIQUE -->
            <?php 
            $counter =0;
            foreach($bouquet_list["BASIQUE"] as $key=> $val){ ?>
            <!--Generaliste new row-->
            <div class=" column six<?php if($counter>0){echo " top-10";}?>">
              <h4><?php echo $key; ?></h4>
              <ul class="bqt">
                    <?php foreach($val as $key2=>$val2){?>
                         <li><img src="<?php echo BASEPATH_STB.$val2["img_icon"]; ?>" alt ="<?php echo $val2["nom_chaines"]; ?>" /></li>                  
                    <?php } ?>
              </ul>
            </div>
            <?php 
             $counter++;   
             }?>
          </div>
          <div class="column four">
            <label for="decodeur-tv-netgem"><input type="checkbox" name="decodeur_tv_netgem" value="decodeur-tv-netgem" <?php echo (!empty($location_decodeur)?"checked=checked":""); ?> disabled="disabled" id="decodeur_tv_netgem"><strong>DÉCODEUR TV NETGEM</strong></label>
              <?php echo image("decodeur_tv_netgem.png",NULL,array("alt"=>"Décodeur TV netgem"));?>
            <strong class="left"> + DE 35 CHAÎNES INCLUSES 3,50€ TTC/MOIS</strong>
          </div>
        </div>

        <!-- Mon offre TV-->
        <div class="row">
          <h3>MON OFFRE TV</h3>
          <div class="column twelve options_tab">
            <!-- option mega -->
            <div class="column four bouquet mega">
              <div class="column four"><h4 class="no-margin-bottom no-margin-top">+25</h4> chaines</div>
              <div class="column eight">
                bouquet mega<br><?php echo $tarif_mega; ?> € 
                <label><input type="radio" value="mega" id="bouquet_mega" name="bouquet"><span>Sélectionner</span></label>
              </div>
            </div>
            <!--option giga-->
            <div class="column four bouquet ultra">
              <div class="column four"><h4 class="no-margin-bottom no-margin-top">+25</h4> chaines</div>
              <div class="column eight">
                bouquet giga<br><?php echo $tarif_giga; ?> € 
                <label><input type="radio" value="giga" id="bouquet_giga" name="bouquet"><span>Sélectionner</span></label>
              </div>
            </div>
            <!--option ultra -->
            <div class="column four bouquet ultra">
              <div class="column four"><h4 class="no-margin-bottom no-margin-top">+33</h4> chaines</div>
              <div class="column eight">
                bouquet ultra<br><?php echo $tarif_ultra; ?> € 
                <label><input type="radio" value="ultra" id="bouquet_ultra" name="bouquet"><span>Sélectionner</span></label>
              </div>
            </div>
          </div>
        </div>

          <!--Bouquet chaines depending on options-->
        <div class="row chaines-tv">
          <!-- MEGA -->
            <?php foreach($bouquet_list["MEGA"] as $key=> $val){ ?>
            <!--Generaliste new row-->
            <div class="column four">
              <h4><?php echo $key; ?></h4>
              <ul class="bqt">
                    <?php foreach($val as $key2=>$val2){?>
                         <li><img src="<?php echo BASEPATH_STB.$val2["img_icon"]; ?>" alt ="<?php echo $val2["nom_chaines"]; ?>" /></li>                  
                    <?php } ?>
              </ul>
            </div>
            <?php }?>
            
            
            <!-- GIGA -->
            <?php foreach($bouquet_list["GIGA"] as $key=> $val){ ?>
            <!-- Generaliste new row-->
            <div class="column four">
              <h4><?php echo $key; ?></h4>
              <ul class="bqt">
                    <?php foreach($val as $key2=>$val2){
                         if(empty($bouquet_list["MEGA"][$key][$key2])||!empty($bouquet_list["MEGA"][$key][$key2])&&$bouquet_list["MEGA"][$key][$key2]["nom_chaines"]!=$val2["nom_chaines"]){
                     ?>
                         <li><img src="<?php echo BASEPATH_STB.$val2["img_icon"]; ?>" alt ="<?php echo $val2["nom_chaines"]; ?>" /></li>                  
                    <?php                             
                            }
                         }
                    ?>
              </ul>
            </div>
            <?php }?>
            
            <!-- ULTRA -->
          <?php foreach($bouquet_list["ULTRA"] as $key=> $val){ ?>
            <!--Generaliste new row-->
          <div class="column four">
              <h4><?php echo $key; ?></h4>
              <ul class="bqt">
                    <?php foreach($val as $key2=>$val2){
                            if(empty($bouquet_list["GIGA"][$key][$key2])||!empty($bouquet_list["GIGA"][$key][$key2])&&$bouquet_list["GIGA"][$key][$key2]["nom_chaines"]!=$val2["nom_chaines"]){
                    ?>
                         <li><img src="<?php echo BASEPATH_STB.$val2["img_icon"]; ?>" alt ="<?php echo $val2["nom_chaines"]; ?>" /></li>                  
                    <?php 
                            }
                        }
                    ?>
              </ul>
            </div> 
            <?php }?>
          
          <hr class="sexy">
          <hr class="sexy">

        </div>

        <div class="row">
          <div class="top-20 column six back-button left"><a alt="Précédent" href="javascript:prevState('forfait');" class="precedent">Précédent</a></div>
          <div class="top-20 column six text-right"> <input type="submit" value="SUIVANT" name="suivant" class="btn-forward rmv-std-btn"></div>
        </div>

        </form>