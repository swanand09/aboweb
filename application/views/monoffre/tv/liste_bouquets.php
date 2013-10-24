<script>       
  $(function(){
      $("#bouquet_mega").attr("Disabled","Disabled");
      $("#bouquet_giga").attr("Disabled","Disabled");
      $("#bouquet_ultra").attr("Disabled","Disabled");
      $("#option_eden").attr("Disabled","Disabled");
      $("#option_bein").attr("Disabled","Disabled");
      $("#beneficier").click(function(){          
        if($(this).is(":checked")){          
           $("#decodeur-tv-netgem").attr("Checked","Checked");
            $("#bouquet_mega").removeAttr("Disabled");
           $("#bouquet_giga").removeAttr("Disabled");
           $("#bouquet_ultra").removeAttr("Disabled");
           
           $('.accordion .first').addClass('active');	
	   $('.accordion .first .content').css({ display: 'block'});
           
           $("#option_eden").removeAttr("Disabled");
           $("#option_bein").removeAttr("Disabled");
           
       }else{          
           $("#decodeur-tv-netgem").removeAttr("Checked");
           $("#bouquet_mega").removeAttr("checked");
           $("#bouquet_giga").removeAttr("checked");
           $("#bouquet_ultra").removeAttr("checked");
           $("#bouquet_mega").attr("Disabled","Disabled");
           $("#bouquet_giga").attr("Disabled","Disabled");
           $("#bouquet_ultra").attr("Disabled","Disabled");     
           
           $('.accordion .first').removeClass('active');	
            $('.accordion .second').removeClass('active');
            $('.accordion .first .content').css({ display: 'none'});
            $('.accordion .second .content').css({ display: 'none'});
            
           
           $("#option_eden").removeAttr("checked");
           $("#option_bein").removeAttr("checked");
           $("#option_eden").attr("Disabled","Disabled");
           $("#option_bein").attr("Disabled","Disabled");
       }  
      }); 
  });  


</script>
<?php
    $tarif_loca_decod      =  explode("_",$tarif_loca_decod);
    $tarif_activ_servicetv =  explode("_",$tarif_activ_servicetv);
    
    if($tarif_loca_decod[1]>0&&empty($tarif_activ_servicetv[1])){
       $valBeneficier = "dummy4_".$tarif_loca_decod[1];       
    }else if(!empty($tarif_activ_servicetv[1])&&$tarif_activ_servicetv[1]>0){
        $valBeneficier = "dummy7_".$tarif_activ_servicetv[1];
    }else{
        $valBeneficier = "dummy4_0";
    }
    
    //bouquet tv
    $tarif_mega = 0;
    $tarif_giga = 0;
    $tarif_ultra = 0;
    if(!empty($bouqTvArr)&&isset($bouqTvArr)){
        foreach($bouqTvArr as $key=>$val){
            if(isset($val["Mega"])){
                $tarif_mega = $val["Mega"];
            }
            if(isset($val["Giga"])){
                $tarif_giga = $val["Giga"];
            }
            if(isset($val["Ultra"])){
                $tarif_ultra = $val["Ultra"];
            }
        }
    }
    //option tv
    $tarif_bein = 0;
    $tarif_eden = 0;
    if(!empty($optionTvArr)&&isset($optionTvArr)){
        foreach($optionTvArr as $key=>$val){
            if(isset($val["BeIN Sport"])){
                $tarif_bein = $val["BeIN Sport"];
            }
            if(isset($val["Eden"])){
                $tarif_eden = $val["Eden"];
            }
        }
    }
    
?>
<form class="frm-tv" onSubmit="javascript:gotoMesCoord();return false; ">

        <div class="row">
          <div class="column twelve">
            <label for="beneficier"><input type="checkbox" id="beneficier" <?php echo (!empty($location_equipements)?"checked=checked":""); ?> onclick="javascript: choixTv();" value="<?php echo $valBeneficier; ?>" name="beneficier"> Je souhaite bénéficier de la TV avec 35 chaînes incluses.</label>
          </div>
        </div>
        <!--ACCORDION-->
        <ul class="accordion">
            <!-- first accordion -->
            <li class="first">
              <div class="title"><h5>MA TV </h5></div>
              <div class="content">
        <div class="row chaines-tv">
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
            <label for="decodeur-tv-netgem"><input type="checkbox" name="decodeur-tv-netgem" value="decodeur-tv-netgem" <?php echo (!empty($location_decodeur)?"checked=checked":""); ?> disabled="disabled" id="decodeur-tv-netgem"><strong>DÉCODEUR TV NETGEM</strong></label>
              <?php echo image("decodeur_tv_netgem.png",NULL,array("alt"=>"Décodeur TV netgem"));?>
            <strong class="left"> + DE 35 CHAÎNES INCLUSES 3,50€ TTC/MOIS</strong>
          </div>
        </div>
        </div> <!--end of accordion content-->  
    </li> 
     <!--End of first accordion-->
     <!-- Second accordion -->
    <li class="second">
        <div class="title"><h5>MON OFFRE TV</h5></div>
              <div class="content" style="display: none;"> <!--acc content-->
                <!-- Mon offre TV-->
        <div class="row">
        <div class="column twelve options_tab">
 <!-- option mega -->
         <div class="column four bouquet mega">
            <div class="column four border-right-gray"><h4 class="no-margin-bottom no-margin-top">+25</h4> chaines</div>
            <div class="column eight">
              <a href="#" id="link-mega">bouquet mega<br><?php echo $tarif_mega; ?> €</a> 
              <label><input type="radio" value="mega_<?php echo $tarif_mega; ?>_25" id="bouquet_mega" onclick="javascript: choixBouquet('bouquet_mega');"  name="bouquet"><span>Sélectionner</span></label>
            </div>
          </div>
          <!--option giga-->
          <div class="column four bouquet giga">
            <div class="column four border-right-gray"><h4 class="no-margin-bottom no-margin-top">+33</h4> chaines</div>
            <div class="column eight">
              <a href="#" id="link-giga">bouquet giga<br><?php echo $tarif_giga; ?> € </a>
              <label><input type="radio" value="giga_<?php echo $tarif_giga; ?>_33" id="bouquet_giga" name="bouquet" onclick="javascript: choixBouquet('bouquet_giga');" ><span>Sélectionner</span></label>
            </div>
          </div>
          <!--option ultra -->
          <div class="column four bouquet ultra">
            <div class="column four border-right-gray"><h4 class="no-margin-bottom no-margin-top">+38</h4> chaines</div>
            <div class="column eight">
              <a href="#" id="link-ultra">bouquet ultra<br><?php echo $tarif_ultra; ?> € </a>
              <label><input type="radio" value="ultra_<?php echo $tarif_ultra; ?>_38" id="bouquet_ultra" name="bouquet" onclick="javascript: choixBouquet('bouquet_ultra');"><span>Sélectionner</span></label>
            </div>
          </div>
           
            
          </div>
        </div>

          <!--Bouquet chaines depending on options-->
        <div class="row chaines-tv">
          <!-- MEGA -->
          <div id="mega" style="opacity: 0.2;">
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
          </div> 
            
            <!-- GIGA -->
            <div id="giga" style="opacity: 0.2;">
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
            </div>
            
            <hr class="sexy">
            <hr class="sexy">
            <!-- ULTRA -->
            
            <div id="ultra">
          <?php foreach($bouquet_list["ULTRA"] as $key=> $val){ ?>
            <!--Generaliste new row-->
          <div class="column four">
              <h4><?php echo $key." "; ?><?php echo (strpos($key,"Eden")!==false)?$tarif_eden:$tarif_bein;?>€</h4>
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
               <label class="top-10">
                   <?php if(strpos($key,"Eden")!==false){ ?>
                        <input type="checkbox" value="<?php echo "Eden_".$tarif_eden; ?>" name="option_eden" id="option_eden" onclick="javascript: choixOption('option_eden');">
                   <?php }else{?>
                        <input type="checkbox" value="<?php echo "BeIN Sport_".$tarif_bein; ?>" name="option_bein" id="option_bein" onclick="javascript: choixOption('option_bein');">
                   <?php } ?>
                   <strong>Sélectionner</strong>
               </label>
            </div> 
            <?php }?>
            </div>
            
                </div>
                <!--end of chaines depending-->
              </div>
              <!-- end of acc content -->
            </li>
          </ul>

        <div class="row">
          <div class="top-20 column six back-button left"><a alt="Précédent" href="javascript:prevState('forfait');" class="precedent">Précédent</a></div>
          <div class="top-20 column six text-right"> <input type="submit" value="SUIVANT" name="suivant" class="btn-forward rmv-std-btn"></div>
        </div>

        </form>