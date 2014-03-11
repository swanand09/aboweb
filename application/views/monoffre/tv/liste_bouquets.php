<?php 
 $basicNumChain = 0;
 foreach($bouquet_list["Bouquet"]["BASIQUE"] as $key=> $val){ 
     if($key=="nombreChaine"){
         $basicNumChain = $val-1;
     }
 }
?>                                       
<form class="frm-tv" onSubmit="javascript:gotoMesCoord();return false; ">

        <div class="row">
          <div class="column twelve bottom-10">
            <label for="beneficier"><input type="checkbox" id="beneficier" <?php echo (!empty($location_equipements)?"checked=checked":""); ?> onclick="javascript: choixTv();"  name="beneficier"> Je souhaite bénéficier de la TV avec <?php echo $basicNumChain; ?> cha&icirc;nes incluses.</label>
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
            <strong class="left"> + DE <?php echo $basicNumChain; ?> CHAÎNES INCLUSES</strong>
            <?php if($duree_mois_promo>0){ ?>
            <div class="prix_dec"><strong><?php echo $decodeur_tv_tarif; ?>€ TTC/MOIS</strong></div>
            <?php echo image('prix_bare.png',NULL,array("class"=>"prix_bare")); ?>          
            <div class="prix_promo"><strong><?php echo $decodeur_tv_promo_tarif; ?>€ durant <?php echo $duree_mois_promo; ?>mois</strong></div>
            <?php }else{?>
                 <div class="prix_promo"><strong><?php echo $decodeur_tv_tarif; ?>€ TTC/MOIS</strong></div>
          <?php  } ?>
          <!-- Frais d'accès au service : 35 € ttc <br/>
          Dépôt de garantie de 50 € restituable <br/> -->
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
                  $nomBouq = "";
                  $countId   = 0;
                    if(!empty($bouqTvArr)&&isset($bouqTvArr)){
                        foreach($bouqTvArr as $key=>$val){
                            foreach($val as $key2=>$val2){
                                 $nomBouq   .='"'.strtolower($key2).'",';  
                                  $countId++;
                              if($val2["promo"]["Duree_mois_promo"]>0){
                   ?>
                                <li class='promo'>
                                <a href="#" onclick='javascript: choixBouquet("<?php echo $val2["picto"]."__".$key2."__".$val2["tarif"]."__".$bouquet_list["Bouquet"][strtoupper($key2)]["nombreChaine"]."__".$val2["id_crm"]; ?>");' data-group='<?php echo strtolower($key2); ?>'>
                                  <div class='columns five'>
                                <span class='nombre_chaines'>+<?php echo $bouquet_list["Bouquet"][strtoupper($key2)]["nombreChaine"]; ?></span>
                                    <label>Chaines</label>
                                  </div>
                                  <div class='columns seven'>
                                      <label>BOUQUET <?php echo strtoupper($key2); ?></label>
                                      <span class='prix'><?php echo $val2["tarif"]; ?>€</span>
                                      <span class='nouveau-prix'><?php echo $val2["promo"]["Tarif_promo"]; ?>€</span>
                                      <span class='nouveau-prix-mois'>/mois</span>
                                      <span class='nouveau-prix-text'>pendant <?php echo $val2["promo"]["Duree_mois_promo"]; ?> mois</span>
                                  </div>
                                </a>
                              </li>
                  
                          <?php }else{ ?>
                            <li>
                                <a href="#" onclick='javascript: choixBouquet("<?php echo $val2["picto"]."__".$key2."__".$val2["tarif"]."__".$bouquet_list["Bouquet"][strtoupper($key2)]["nombreChaine"]."__".$val2["id_crm"]; ?>");' data-group='<?php echo strtolower($key2); ?>'>
                                  <div class='columns five'>
                                <span class='nombre_chaines'>+<?php echo $bouquet_list["Bouquet"][strtoupper($key2)]["nombreChaine"]; ?></span>
                                    <label>Chaines</label>
                                  </div>
                                  <div class='columns seven'>
                                      <label>BOUQUET <?php echo strtoupper($key2); ?></label>
                                      <span class='prix'><?php echo $val2["tarif"]; ?>€</span>
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
                 <?php
                    $prevBouq = "";
                    $countBouq = 0;
                   
                    $nomBouq = rtrim($nomBouq, ",");
                    if(!empty($bouqTvArr)&&isset($bouqTvArr)){
                           foreach($bouqTvArr as $key=>$val){
                               foreach($val as $key2=>$val2){                                   
                                   switch(strtoupper($key2)){
                                       case "MEGA":
                                            foreach($bouquet_list["Bouquet"]["MEGA"] as $key3=> $val3){ 
                                                if(!empty($val3)&&!preg_match('/option/',strtolower($key3))){
                                                    if($key3!="nombreChaine"){
                                                           
                                                        ?>
                                                          <div class='row'>
                                                            <h4><?php echo $key3; ?></h4>
                                                            <ul class='grid bqt no-border'>
                                                               <?php foreach($val3 as $key4=>$val4){?>
                                                                <li class='item' data-groups='["mega","giga","ultra"]'><img src="<?php echo BASEPATH_STB.$val4["img_icon"]; ?>" alt ="<?php echo $val4["nom_chaines"]; ?>" /></li>                       
                                                               <?php 
                                                               }
                                                                if(isset($bouquet_list["Bouquet"]["GIGA"][$key3])){                                                                          
                                                                   foreach($bouquet_list["Bouquet"]["GIGA"][$key3] as $key5=>$val5){?>
                                                                       <li class='item' data-groups='["giga","ultra"]'><img src="<?php echo BASEPATH_STB.$val5["img_icon"]; ?>" alt ="<?php echo $val5["nom_chaines"]; ?>" /></li>                  
                                                                   <?php
                                                                   }
                                                                   unset($bouquet_list["Bouquet"]["GIGA"][$key3]);
                                                                }
                                                                 if(isset($bouquet_list["Bouquet"]["ULTRA"][$key3])){  
                                                                     foreach($bouquet_list["Bouquet"]["ULTRA"][$key3] as $key5=>$val5){?>
                                                                       <li class='item' data-groups='["ultra"]'><img src="<?php echo BASEPATH_STB.$val5["img_icon"]; ?>" alt ="<?php echo $val5["nom_chaines"]; ?>" /></li>                  
                                                                   <?php
                                                                   }
                                                                   unset($bouquet_list["Bouquet"]["ULTRA"][$key3]);
                                                                 }
                                                               ?>
                                                            </ul>
                                                         </div>
                                                  <?php
                                                        
                                                   }
                                                }
                                            }
                                           
                                       break;
                                       case "GIGA":
                                           foreach($bouquet_list["Bouquet"]["GIGA"] as $key3=> $val3){ 
                                                if(!empty($val3)&&!preg_match('/option/',strtolower($key3))){
                                                    if($key3!="nombreChaine"){
                                                           
                                                        ?>
                                                          <div class='row'>
                                                            <h4><?php echo $key3; ?></h4>
                                                            <ul class='grid bqt no-border'>
                                                               <?php foreach($val3 as $key4=>$val4){?>
                                                                <li class='item' data-groups='["giga","ultra"]'><img src="<?php echo BASEPATH_STB.$val4["img_icon"]; ?>" alt ="<?php echo $val4["nom_chaines"]; ?>" /></li>                       
                                                               <?php 
                                                               } 
                                                                if(isset($bouquet_list["Bouquet"]["ULTRA"][$key3])){                                                                          
                                                                   foreach($bouquet_list["Bouquet"]["ULTRA"][$key3] as $key5=>$val5){?>
                                                                       <li class='item' data-groups='["ultra"]'><img src="<?php echo BASEPATH_STB.$val5["img_icon"]; ?>" alt ="<?php echo $val5["nom_chaines"]; ?>" /></li>                  
                                                                   <?php
                                                                   }
                                                                   unset($bouquet_list["Bouquet"]["ULTRA"][$key3]);
                                                                }
                                                                   
                                                               ?>
                                                            </ul>
                                                         </div>
                                                  <?php
                                                   }
                                                }
                                            }
                                       break;
                                       case "ULTRA":
                                            foreach($bouquet_list["Bouquet"]["GIGA"] as $key3=> $val3){ 
                                                if(!empty($val3)&&!preg_match('/option/',strtolower($key3))){
                                                    if($key3!="nombreChaine"){
                                                           
                                                        ?>
                                                          <div class='row'>
                                                            <h4><?php echo $key3; ?></h4>
                                                            <ul class='grid bqt no-border'>
                                                                <?php foreach($val3 as $key4=>$val4){?>
                                                                <li class='item' data-groups='["ultra"]'><img src="<?php echo BASEPATH_STB.$val4["img_icon"]; ?>" alt ="<?php echo $val4["nom_chaines"]; ?>" /></li>                       
                                                             <?php 
                                                              }?>
                                                            </ul>
                                                         </div>   
                                                       <?php
                                                         }
                                                }
                                            }
                                       break;
                                   }
                                    $prevBouq = $key2;
                                 }
                           }
                    } 
                 ?>
                        
                <?php 
                if(!empty($optionTvArr)&&isset($optionTvArr)){
                   foreach($optionTvArr as $key=>$val){
                       foreach($val as $key2=>$val2){
                    ?>
                        <div class='row ultra <?php echo ($key==0)?"ufirst":"";?>'>
                            <h4>
                              <?php echo $key2; ?>
                              <span class='prix_option'>
                                  <?php if($val2["promo"]["Duree_mois_promo"]>0){?>
                                    <span class="promo"><?php echo $val2["tarif"]; ?>€</span>
                                    <span class="normal"><?php echo $val2["promo"]["Tarif_promo"]; ?>€</span>
                                  <?php }else{ ?>
                                  <span class="normal"><?php echo $val2["tarif"]; ?>€</span>
                                  <?php } ?>
                              </span>
                            </h4>
                            <ul class='bqt'>
                                <?php
                                foreach($bouquet_list["Options"][strtoupper($key2)] as $key3=> $val3){ 
                                    foreach($val3 as $key4=>$val4){
                                        ?>
                                              <li><img src="<?php echo BASEPATH_STB.$val4["img_icon"]; ?>" alt ="<?php echo $val4["nom_chaines"]; ?>" /></li>                  
                                     <?php             
                                    }
                                } 
                                ?>
                             </ul>
                            <label class='top-10'>
                                 <input type="checkbox" disabled="disabled" class='ultraoption'  value="<?php echo $val2["picto"]."__".$key2."__".$val2["tarif"]."__".$val2["id_crm"]; ?>" name="option_<?php echo $key; ?>" id="option_<?php echo $key; ?>" onclick="javascript: choixOption('option_<?php echo $key; ?>');">
                               <strong>Sélectionner</strong>
                            </label>                      
                        </div>
                            <?php
                       }
                   }
                }
            ?>
        </div>
              </div>
              <!-- end of acc content -->
            </li>
          </ul>

        <div class="row">
          <div class="top-20 column six back-button left"><a alt="Précédent" href="javascript:prevState('forfait');" class="precedent" title="Retour à l'étape précédente">Précédent</a></div>
          <div class="top-20 column six text-right"> <input type="submit" value="SUIVANT" name="suivant" class="btn-forward rmv-std-btn" title="Etape suivant"></div>
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
          <h4>LE PVR </h4>C'est en reliant un disque dur externe USB(non fourni) à votre décodeur TV que vous pourrez bénéficier de L'option PVR (enregistreur numérique) et du Time Shifting (gestion du direct).<br>Avec le PVR, vous pourrez ainsi enregistrer vos programmes préférés et les visionner en accédant au menu "mes enregistrements TV". <br><span class="txtblue">Bon à savoir</span> : Pour plus de facilité et une meilleure aisance de l'option PVR, nous vous conseillons de connecter un disque dur externe d'une capacité minimum de 500 go.( Disque dur externe USB non fourni)<h4>Time Shifting (gestion du direct)</h4>La gestion du direct, liée également à la capacité de votre disque dur externe (non fourni), vous permettra de mettre en pause un programme. Vous pourrez ainsi à tout moment effectuer un avance rapide et revenir au direct ou revenir plus tard sur la partie de votre programme sauvegardée. 
          <a class="close-reveal-modal">&#215;</a>
        </div>