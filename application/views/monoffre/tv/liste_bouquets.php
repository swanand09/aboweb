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
    /*
    echo "<pre>";
    print_r($optionTvArr);
    echo "</pre>";
     * 
     */
    //option tv
    $tarif_bein = 0;
    $duree_promo_bein = 0;
    $tarif_promo_bein = 0;
    $tarif_eden = 0;
    $duree_promo_eden = 0;
    $tarif_promo_eden = 0;
    if(!empty($optionTvArr)&&isset($optionTvArr)){
        foreach($optionTvArr as $key=>$val){
            if(isset($val["BeIN Sport"])){
                $tarif_bein = $val["BeIN Sport"];
                $duree_promo_bein = $val[0]["Duree_mois_promo"];
                $tarif_promo_bein = $val[0]["Tarif_promo"];
            }
            if(isset($val["Eden"])){
                $tarif_eden = $val["Eden"];
                $duree_promo_eden = $val[0]["Duree_mois_promo"];
                $tarif_promo_eden = $val[0]["Tarif_promo"];               
            }
        }
    }
   
    
    //VOD PVR
    
    $vodTarif      = "";
    $numriquEnreg = "";
    /*
    echo "<pre>";
    print_r($vodPvr);
    echo "</pre>";
     * 
     */
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
            <label for="beneficier"><input type="checkbox" id="beneficier" <?php echo (!empty($location_equipements)?"checked=checked":""); ?> onclick="javascript: choixTv();" value="<?php echo $valBeneficier; ?>" name="beneficier"> Je souhaite bénéficier de la TV avec 41 cha&icirc;nes incluses.</label>
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
            foreach($bouquet_list["Bouquet"]["BASIQUE"] as $key=> $val){ 
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
                  
        <div class="row inclus-tv">
          <div class="column five vod shadow">
            <div class="row">
              <?php echo image("contenu/inclus_vod.jpg",NULL,array("alt"=>"INCLUS VOD","class"=>"left"));?> 
              <div class="column seven">
                <h4>INCLUS</h4>
                <p>Vidéo à la Demande(VOD), disponible sans engagement. Plus de 4000 films à partir de 2,99€</p>
                <a href="#" class="en-savoir-plus" data-reveal-id='vod-modal'>En savoir +</a>
              </div>
            </div>
          </div>
          <div class="column five pvr shadow">
            <div class="row">
              <?php echo image("contenu/inclus_pvr.png",NULL,array("alt"=>"INCLUS PVR","class"=>"left"));?>
              <div class="column seven">
                <h4>INCLUS</h4>
                <p>Nouvelles fonctions, à l'instar du PVR et du TIME Shifting, <span class='blue'>avec un disque dur externe</span></p>
                <a href="#" class="en-savoir-plus" data-reveal-id='pvr-modal'>En savoir +</a>
              </div>
            </div>
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
                  <?php 
                    if(!empty($bouqTvArr)&&isset($bouqTvArr)){
                        foreach($bouqTvArr as $key=>$val){
                            foreach($val as $key2=>$val2){
                                if(is_string($key2)){
                   ?>
                            <li>
                                <a href="#" onclick='javascript: choixBouquet("<?php echo $key2; ?>_<?php echo $val2; ?>_<?php echo $bouquet_list["Bouquet"][strtoupper($key2)]["nombreChaine"]; ?>_<?php echo $vodTarif; ?>_<?php echo $numriquEnreg; ?>");' data-group='<?php echo strtolower($key2); ?>'>
                                  <div class='columns five'>
                                <span class='nombre_chaines'>+<?php echo $bouquet_list["Bouquet"][strtoupper($key2)]["nombreChaine"]; ?></span>
                                    <label>Chaines</label>
                                  </div>
                                  <div class='columns seven'>
                                      <label>BOUQUET <?php echo strtoupper($key2); ?></label>
                                      <?php if($val[0]["Duree_mois_promo"]>0){ ?>
                                       <span class='promo'><?php echo $val2; ?>€</span>
                                       <span class='prix'><?php echo $val[0]["Tarif_promo"]; ?>€</span>
                                      <?php }else{?>
                                    <span class='prix'><?php echo $val2; ?>€</span>
                                      <?php }?>
                                  </div>
                                </a>
                              </li>
                       <?php       
                                }
                            }
                        }
                    }
                  ?>
               
              </ul>
              <div class="disabled-div"></div>  
            </div>
            
            <div class='columns eight chaines'>
                 <!-- MEGA -->
                <?php
                    foreach($bouquet_list["Bouquet"]["MEGA"] as $key=> $val){ 
                        if($key!="nombreChaine"){
                 ?>
                        <div class='row'>
                           <h4><?php echo $key; ?></h4>
                           <ul class='grid bqt no-border'>
                              <?php foreach($val as $key2=>$val2){?>
                               <li class='item' data-groups='["mega","giga","ultra"]'><img src="<?php echo BASEPATH_STB.$val2["img_icon"]; ?>" alt ="<?php echo $val2["nom_chaines"]; ?>" /></li>                       
                              <?php 
                              }     
                              foreach($bouquet_list["Bouquet"]["GIGA"] as $key3=> $val3){
                                    if($key3==$key&&$key3!="nombreChaine"){
                                         foreach($val3 as $key4=>$val4){
                                             if(empty($bouquet_list["Bouquet"]["MEGA"][$key3][$key4])||!empty($bouquet_list["Bouquet"]["MEGA"][$key3][$key4])&&$bouquet_list["Bouquet"]["MEGA"][$key3][$key4]["nom_chaines"]!=$val4["nom_chaines"]){
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
            foreach($bouquet_list["Options"] as $key=> $val){
          ?>
           <div class='row ultra <?php echo ($count==0)?"ufirst":"";?>'>
                <h4>
                  <?php echo $key; ?>
                  <span class='prix_option'>
                      <?php //if($duree_promo_bein>0){ ?>
                <!--<span class='promo'>9€</span>-->
                    <span class='normal'><?php echo (strpos($key,"Eden")!==false)?$tarif_eden:$tarif_bein;?>€</span>
                      <?php //} ?>
                  </span>
                </h4>
                <ul class='bqt'>
                     <?php foreach($val as $key2=>$val2){
                            foreach($val2 as $key3=>$val3){
                     ?>
                         <li><img src="<?php echo BASEPATH_STB.$val3["img_icon"]; ?>" alt ="<?php echo $val3["nom_chaines"]; ?>" /></li>                  
                    <?php
                        }
                     } 
                    ?>
                </ul>
                <label class='top-10'>
                     <?php if(strpos(strtolower($key),"eden")!==false){ ?>
                        <input type="checkbox" disabled="disabled" value="<?php echo "Eden_".$tarif_eden; ?>" name="eden" id="option_eden" onclick="javascript: choixOption('option_eden');">
                   <?php }else{?>
                        <input type="checkbox" disabled="disabled" value="<?php echo "BeIN Sport_".$tarif_bein; ?>" name="bein" id="option_bein" onclick="javascript: choixOption('option_bein');">
                   <?php } ?>
                   <strong>Sélectionner</strong>
                </label>
           </div>
       
            <?php
                    $count++;
                
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
        
        <!--VOD MODAL-->
        <div id="vod-modal" class="reveal-modal [expand, xlarge]">
          <h2>VIDEO À LA DEMANDE : LE GRAND ÉCRAN DANS VOTRE SALON</h2>
          <p>La Vidéo à la Demande (VOD) est un service de location, sans engagement, qui vous permettra de découvrir les meilleurs films quelques mois après leur sortie au cinéma.Découvrez sans attendre dans le menu VOD de votre décodeur TV plus de 4000 films à partir de 2,99€ <sup>(9)</sup></p><p><?php echo image("contenu/video_a_la_demande.jpg",NULL,array("alt"=>"Vidéo à la ddemande"));?></p>
          <a class="close-reveal-modal">&#215;</a>
        </div>
        <!--PVR MODAL-->
        <div id="pvr-modal" class="reveal-modal [expand, xlarge]">
          <h2>PVR (enregistreur numérique) et Time Shifting (gestion du direct)</h2>
          <h4>LE PVR </h4>C'est en reliant un disque dur externe USB(non fourni) à votre décodeur TV que vous pourrez bénéficier de L'option PVR (enregistreur numérique) et du Time Shifting (gestion du direct).<br>Avec le PVR, vous pourrez ainsi enregistrer vos programmes préférés et les visionner en accédant au menu "mes enregistrements TV". <br><span class="txtblue">Bon à savoir</span> : Pour plus de facilité et une meilleure aisance de l'option PVR, nous vous conseillons de connecter un disque dur externe d'une capacité minimum de 500 go.<h4>Time Shifting (gestion du direct)</h4>La gestion du direct, liée également à la capacité de votre disque dur externe (non fourni), vous permettra de mettre en pause un programme. Vous pourrez ainsi à tout moment effectuer un avance rapide et revenir au direct ou revenir plus tard sur la partie de votre programme sauvegardée. 
          <a class="close-reveal-modal">&#215;</a>
        </div>