<script>       
//  $(function(){
//      $("#bouquet_mega").attr("Disabled","Disabled");
//      $("#bouquet_giga").attr("Disabled","Disabled");
//      $("#bouquet_ultra").attr("Disabled","Disabled");
//      $("#option_eden").attr("Disabled","Disabled");
//      $("#option_bein").attr("Disabled","Disabled");
//      $("#beneficier").click(function(){          
//        if($(this).is(":checked")){          
//           $("#decodeur-tv-netgem").attr("Checked","Checked");
//            $("#bouquet_mega").removeAttr("Disabled");
//           $("#bouquet_giga").removeAttr("Disabled");
//           $("#bouquet_ultra").removeAttr("Disabled");
//           
//           $('.accordion .first').addClass('active');	
//	   $('.accordion .first .content').css({ display: 'block'});
//           
////           $("#option_eden").removeAttr("Disabled");
////           $("#option_bein").removeAttr("Disabled");
//           
//       }else{          
//           $("#decodeur-tv-netgem").removeAttr("Checked");
//           $("#bouquet_mega").removeAttr("checked");
//           $("#bouquet_giga").removeAttr("checked");
//           $("#bouquet_ultra").removeAttr("checked");
//           $("#bouquet_mega").attr("Disabled","Disabled");
//           $("#bouquet_giga").attr("Disabled","Disabled");
//           $("#bouquet_ultra").attr("Disabled","Disabled");     
//           
//           $('.accordion .first').removeClass('active');	
//            $('.accordion .second').removeClass('active');
//            $('.accordion .first .content').css({ display: 'none'});
//            $('.accordion .second .content').css({ display: 'none'});
//            
//           
//           $("#option_eden").removeAttr("checked");
//           $("#option_bein").removeAttr("checked");
//           $("#option_eden").attr("Disabled","Disabled");
//           $("#option_bein").attr("Disabled","Disabled");
//       }  
//      }); 
//      var prix_option = $(".prix_opt").html();
//       $("#bouquet_ultra").click(function(){              
//            if($("#bouquet_ultra").is(":checked")){   
//                $("#option_eden").attr("disabled","disabled");
//                $("#option_eden").attr("checked","checked");
//                $("#option_bein").attr("disabled","disabled");
//                $("#option_bein").attr("checked","checked");                
//                //prix_option = $(".prix_opt").html();
//                $(".prix_opt").empty().append("inclus");
//            }
//      });
//       $("#bouquet_mega").click(function(){            
//            if($("#bouquet_mega").is(":checked")){   
//                $("#option_eden").removeAttr("checked");
//                $("#option_bein").removeAttr("checked");
//                $("#option_eden").removeAttr("disabled");
//                $("#option_bein").removeAttr("disabled");
//                $(".prix_opt").empty().append(prix_option);
//            }
//      });
//       $("#bouquet_giga").click(function(){            
//            if($("#bouquet_giga").is(":checked")){   
//                $("#option_eden").removeAttr("checked");
//                $("#option_bein").removeAttr("checked");
//                $("#option_eden").removeAttr("disabled");
//                $("#option_bein").removeAttr("disabled");
//                $(".prix_opt").empty().append(prix_option);
//            }
//      });
//  });  


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
    $bouquet_libelle = array();
    $bouquet_tarif = array();
    if(!empty($bouqTvArr)&&isset($bouqTvArr)){
        foreach($bouqTvArr as $key=>$val){
            
            foreach($val as $key2=>$val2){
                array_push($bouquet_libelle,$key2);
                array_push($bouquet_tarif,$val2);
            }
            /*
            if(isset($val["Mega"])){
                $tarif_mega = $val["Mega"];
            }
            if(isset($val["Giga"])){
                $tarif_giga = $val["Giga"];
            }
            if(isset($val["Ultra"])){
                $tarif_ultra = $val["Ultra"];
            }
             * 
             */
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
    
    //nombre des chaines
    $nombreChaineMega = $bouquet_list["MEGA"]["nombreChaine"];
    $nombreChaineGiga = $bouquet_list["GIGA"]["nombreChaine"];
    $nombreChaineUltra = $bouquet_list["ULTRA"]["nombreChaine"];
    
    //VOD PVR
    
    $vodTarif      = "";
    $numriquEnreg = "";
 
    if(!empty($vodPvr)){
        foreach($vodPvr as $key=>$val){
            if(isset($val["Vidéo à la demande"])){
                $vodTarif = ($val["Vidéo à la demande"]>0)?$val["Vidéo à la demande"]:"inclus";
            }
            if(isset($val["Enregistreur numérique"])){
                $numriquEnreg = ($val["Enregistreur numérique"]>0)?$val["Enregistreur numérique"]:"inclus";
            }
        }
    }
   
?>
<form class="frm-tv" onSubmit="javascript:gotoMesCoord();return false; ">

        <div class="row">
          <div class="column twelve bottom-10">
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
            foreach($bouquet_list["BASIQUE"] as $key=> $val){ 
                if($key!="nombreChaine"){
            ?>
            <!--Generaliste new row-->
            <div class=" column twelve<?php if($counter>0){echo " top-10";}?>">
              <h4><?php echo $key; ?></h4>
              <ul class="bqt">
                    <?php foreach($val as $key2=>$val2){?>
                         <li><img src="<?php echo BASEPATH_STB.$val2["img_icon"]; ?>" alt ="<?php echo $val2["nom_chaines"]; ?>" /></li>                  
                    <?php } ?>
              </ul>
            </div>
            <?php 
             $counter++;  
                }
             }?>
          </div>
          <div class="column four">
            <label for="decodeur-tv-netgem"><input type="checkbox" name="decodeur-tv-netgem" value="decodeur-tv-netgem" <?php echo (!empty($location_decodeur)?"checked=checked":""); ?> disabled="disabled" id="decodeur-tv-netgem"><strong>DÉCODEUR TV NETGEM</strong></label>
              <?php echo image("decodeur_tv_netgem.png",NULL,array("alt"=>"Décodeur TV netgem"));?>
            <strong class="left"> + DE 35 CHAÎNES INCLUSES</strong>
            <?php if($duree_mois_promo>0){ ?>
            <div class="prix_dec"><strong><?php echo $decodeur_tv_tarif; ?>€ TTC/MOIS</strong></div>
            <?php echo image('prix_bare.png',NULL,array("class"=>"prix_bare")); ?>          
            <div class="prix_promo"><strong><?php echo $decodeur_tv_promo_tarif; ?>€ durant <?php echo $duree_mois_promo; ?>mois</strong></div>
            <?php }else{?>
                 <div class="prix_promo"><strong><?php echo $decodeur_tv_tarif; ?>€ TTC/MOIS</strong></div>
          <?php  }
?>
          </div>
        </div>
        </div> <!--end of accordion content-->  
    </li> 
     <!--End of first accordion-->
     <!-- Second accordion -->
    <li class="second">
        <div class="title"><h5>MON OFFRE TV</h5></div>
              <div class="content"> <!--acc content-->
                <!-- Mon offre TV-->
        <div class="row">
             <!-- Filter Control-->
            <div class='columns four bouquet'>
              <ul id='filter'>
                <li>
                  <a href="#" onclick='javascript: choixBouquet("<?php echo $bouquet_libelle[0]; ?>_<?php echo $bouquet_tarif[0]; ?>_<?php echo $nombreChaineMega; ?>_<?php echo $vodTarif; ?>_<?php echo $numriquEnreg; ?>");' data-group='mega'>
                    <div class='columns five'>
                      <span class='nombre_chaines'>+<?php echo $nombreChaineMega; ?></span>
                      <label>Chaines</label>
                    </div>
                    <div class='columns seven'>
                      <label>BOUQUET MEGA</label>
<!--                      <span class='promo'><?php //echo $bouquet_tarif[0]; ?>€</span>-->
                      <span class='prix'><?php echo $bouquet_tarif[0]; ?>€</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#" onclick='javascript: choixBouquet("<?php echo $bouquet_libelle[1]; ?>_<?php echo $bouquet_tarif[1]; ?>_<?php echo $nombreChaineGiga; ?>_<?php echo $vodTarif; ?>_<?php echo $numriquEnreg; ?>");' data-group='giga'>
                    <div class='columns five'>
                      <span class='nombre_chaines'>+<?php echo $nombreChaineGiga; ?></span>
                      <label>Chaines</label>
                    </div>
                    <div class='columns seven'>
                      <label>BOUQUET GIGA</label>
                      <span class='prix'><?php echo $bouquet_tarif[1]; ?>€</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#" onclick='javascript: choixBouquet("<?php echo $bouquet_libelle[2]; ?>_<?php echo $bouquet_tarif[2]; ?>_<?php echo $nombreChaineUltra; ?>_<?php echo $vodTarif; ?>_<?php echo $numriquEnreg; ?>");' data-group='ultra'>
                    <div class='columns five'>
                      <span class='nombre_chaines'>+<?php echo $nombreChaineUltra; ?></span>
                      <label>Chaines</label>
                    </div>
                    <div class='columns seven'>
                      <label>BOUQUET ULTRA</label>
                      <span class='prix'><?php echo $bouquet_tarif[2]; ?>€</span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
            
            <div class='columns eight chaines'>
                 <!-- MEGA -->
                <?php
                    foreach($bouquet_list["MEGA"] as $key=> $val){ 
                        if($key!="nombreChaine"){
                 ?>
                        <div class='row'>
                           <h4><?php echo $key; ?></h4>
                           <ul class='grid bqt no-border'>
                              <?php foreach($val as $key2=>$val2){?>
                               <li class='item' data-groups='["mega","giga","ultra"]'><img src="<?php echo BASEPATH_STB.$val2["img_icon"]; ?>" alt ="<?php echo $val2["nom_chaines"]; ?>" /></li>                       
                              <?php 
                              }     
                              foreach($bouquet_list["GIGA"] as $key3=> $val3){
                                    if($key3==$key&&$key3!="nombreChaine"){
                                         foreach($val3 as $key4=>$val4){
                                             if(empty($bouquet_list["MEGA"][$key3][$key4])||!empty($bouquet_list["MEGA"][$key3][$key4])&&$bouquet_list["MEGA"][$key3][$key4]["nom_chaines"]!=$val4["nom_chaines"]){
                                          ?>
                                             <li class='item' data-groups='["giga","ultra"]'><img src="<?php echo BASEPATH_STB.$val4["img_icon"]; ?>" alt ="<?php echo $val4["nom_chaines"]; ?>" /></li>
                                        <?php  }
                                        }  
                                  }
                              }
                              ?>
                           </ul>
                        </div>
                <?php }
                    }
            $count = 0;
            foreach($bouquet_list["ULTRA"] as $key=> $val){
                if($key!="nombreChaine"){
        
          ?>
           <div class='row ultra <?php echo ($count==0)?"ufirst":"";?>'>
                <h4>
                  <?php echo $key; ?>
                  <span class='prix_option'>
                <!--<span class='promo'>9€</span>-->
                    <span class='normal'><?php echo (strpos($key,"Eden")!==false)?$tarif_eden:$tarif_bein;?>€</span>
                  </span>
                </h4>
                <ul class='bqt'>
                     <?php foreach($val as $key2=>$val2){
                            if(empty($bouquet_list["GIGA"][$key][$key2])||!empty($bouquet_list["GIGA"][$key][$key2])&&$bouquet_list["GIGA"][$key][$key2]["nom_chaines"]!=$val2["nom_chaines"]){
                    ?>
                         <li><img src="<?php echo BASEPATH_STB.$val2["img_icon"]; ?>" alt ="<?php echo $val2["nom_chaines"]; ?>" /></li>                  
                    <?php 
                            }
                        }
                    ?>
                </ul>
                <label class='top-10'>
                     <?php if(strpos($key,"Eden")!==false){ ?>
                        <input type="checkbox" value="<?php echo "Eden_".$tarif_eden; ?>" name="eden" id="option_eden" onclick="javascript: choixOption('option_eden');">
                   <?php }else{?>
                        <input type="checkbox" value="<?php echo "BeIN Sport_".$tarif_bein; ?>" name="bein" id="option_bein" onclick="javascript: choixOption('option_bein');">
                   <?php } ?>
                   <strong>Sélectionner</strong>
                </label>
           </div>
       
            <?php
                    $count++;
                 }
            }
            ?>
         
        </div>

        
        
              </div>
              <!-- end of acc content -->
            </li>
          </ul>

        <div class="row">
          <div class="top-20 column six back-button left"><a alt="Précédent" href="javascript:prevState('forfait');" class="precedent">Précédent</a></div>
          <div class="top-20 column six text-right"> <input type="submit" value="SUIVANT" name="suivant" class="btn-forward rmv-std-btn"></div>
        </div>

        </form>
