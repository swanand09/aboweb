<?php
//    echo "<pre>";
//    print_r($bouquet_list);
//    echo "</pre>";
//    exit();
function widthCol($size)
{
   /* switch($size)
    {
        case 1: 
            return "one";
        break;
        
        case 2: 
            return "three";
        break;
    
        case 3: 
            return "four";
        break;
        
        case 4: 
            return "five";
        break;
    
        case 5: 
            return "five";
        break;
    
        case 6: 
            return "six";
        break;
    
         case 7: 
            return "seven";
        break;
    
        case 8: 
            return "eight";
        break;
    
        case 9: 
            return "nine";
        break;
        
        case 10: 
            return "ten";
        break;
    
        case 11: 
            return "eleven";
        break;
    
        case 12: 
            return "twelve";
        break;
        default:return "twelve";
   
    } 
    */
    return "twelve";
}
?>
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
</script>

<form action="mes-cordonnees.php" class="frm-tv">

        <div class="row">
          <div class="column twelve">
            <label for="beneficier"><input type="checkbox" id="beneficier" value="beneficier" name="beneficier"> Je souhaite bénéficier de la TV avec 35 chaînes incluses.</label>
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
            <div class=" column <?php echo widthCol(sizeof($val)); if($counter>0){echo " top-10";}?>">
              <h4><?php echo $key; ?></h4>
              <ul class="bqt">
                    <?php foreach($val as $key2=>$val2){?>
                         <li><img src="<?php echo BASEPATH_STB.$val2->img_icon; ?>" alt ="<?php echo $val2->nom_chaines; ?>" /></li>                  
                    <?php } ?>
              </ul>
            </div>
            <?php 
             $counter++;   
             }?>
          </div>
          <div class="column four">
            <label for="decodeur-tv-netgem"><input type="checkbox" name="decodeur_tv_netgem" value="decodeur-tv-netgem" disabled="disabled" id="decodeur_tv_netgem"><strong>DÉCODEUR TV NETGEM</strong></label>
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
          <!--jeunesse new row-->
          <div class="column four">
            <h4>Jeunesse</h4>
            <ul class="bqt">
                <li><?php echo image("chaines/nickelodeon.png",NULL,array("alt"=>"Nickelodeon"));?></li>
                <li1><?php echo image("chaines/nickelodeon_junior.png",NULL,array("alt"=>"Nickelodeon Junior"));?></li>
                <li><?php echo image("chaines/manga.png",NULL,array("alt"=>"manga"));?></li>
            </ul>
          </div>

          <!--Musique-->
          <div class="column four">
            <h4>Musique</h4>
            <ul class="bqt">
                <li><?php echo image("chaines/mtv_music.png",NULL,array("alt"=>"MTV Music"));?></li>
                <li><?php echo image("chaines/mtv_base.png",NULL,array("alt"=>"MTV Base"));?></li>
                <li><?php echo image("chaines/mtv_idol.png",NULL,array("alt"=>"MTV Idol"));?></li>
                <li><?php echo image("chaines/mtv_pulse.png",NULL,array("alt"=>"MTV Pulse"));?></li>
            </ul>
          </div>

          <!--Info-->
          <div class="column two">
            <h4>Infos</h4>
            <ul class="bqt">
                <li><?php echo image("chaines/lci.png",NULL,array("alt"=>"LCI"));?></li>
            </ul>
          </div>

          <!--Cinema-->
          <div class="column two">
            <h4>Cinéma</h4>
            <ul class="bqt">
                <li><?php echo image("chaines/cine_polar.png",NULL,array("alt"=>"Cine Polar"));?></li>
                <li><?php echo image("chaines/cine_fx.png",NULL,array("alt"=>"Cine FX"));?></li>
            </ul>
          </div>

          <!--Découverte et art de vivre new row-->
          <div class="column nine">
            <h4>Découverte et art de vivre</h4>
            <ul class="bqt">
                <li><?php echo image("chaines/histoire.png",NULL,array("alt"=>"Histoire"));?></li>
                <li><?php echo image("chaines/encyclo.png",NULL,array("alt"=>"Encyclo"));?></li>
                <li><?php echo image("chaines/chasse_et_peche.png",NULL,array("alt"=>"Chasse et Pêche"));?></li>
                <li><?php echo image("chaines/animaux.png",NULL,array("alt"=>"Animaux"));?></li>
                <li><?php echo image("chaines/escales.png",NULL,array("alt"=>"Escales"));?></li>
                <li><?php echo image("chaines/fashion.png",NULL,array("alt"=>"Fashion TV"));?></li>
                <li><?php echo image("chaines/ushuaia_tv.png",NULL,array("alt"=>"Ushuaia TV"));?></li>
            </ul>
          </div>

          <!--Generaliste-->
          <div class="column three">
            <h4>Généraliste</h4>
            <ul class="bqt">
                <li><?php echo image("chaines/rtl9.png",NULL,array("alt"=>"RTL9"));?></li>
                <li><?php echo image("chaines/ab1.png",NULL,array("alt"=>"AB1"));?></li>
                <li><?php echo image("chaines/tv_breizh.png",NULL,array("alt"=>"TV breizh"));?></li>
            </ul>
          </div>

          <!--Sport new row-->
          <div class="column nine">
            <h4>Sport</h4>
            <ul class="bqt">
                <li><?php echo image("chaines/eurosport.png",NULL,array("alt"=>"Eurosport"));?></li>
                <li><?php echo image("chaines/eurosport_2.png",NULL,array("alt"=>"Eurosport 2"));?></li>
                <li><?php echo image("chaines/abmotors.png",NULL,array("alt"=>"AB Moteurs"));?></li>
                <li><?php echo image("chaines/equidia.png",NULL,array("alt"=>"Equidia live"));?></li>
                <li><?php echo image("chaines/golf_channel.png",NULL,array("alt"=>"Golf Channel"));?></li>
                <li><?php echo image("chaines/msc_extreme.png",NULL,array("alt"=>"MSC Extreme"));?></li>
            </ul>
          </div>

          <!--Charme-->
          <div class="column three bottom-20">
            <h4>Charme <?php echo image("picto-16.png",NULL,array("alt"=>""));?></h4>
            <ul class="bqt">
                <li><?php echo image("chaines/blue_hustler.png",NULL,array("alt"=>"Blue Hustler"));?></li>
            </ul>
          </div>

          <hr class="sexy">
          <hr class="sexy">

        </div>

        <div class="row">
          <div class="top-20 column six back-button left"><a alt="Précédent" href="javascript:prevState('forfait');" class="precedent">Précédent</a></div>
          <div class="top-20 column six text-right"> <input type="submit" value="SUIVANT" name="suivant" class="btn-forward rmv-std-btn"></div>
        </div>

        </form>