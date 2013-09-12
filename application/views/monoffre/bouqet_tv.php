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
            <!--Generaliste new row-->
            <div class=" column twelve">
              <h4>Généraliste</h4>
              <ul class="bqt">
                  <li><?php echo image("chaines/tf1.png",NULL,array("alt"=>"TF1"));?></li>
                  <li><?php echo image("chaines/france2.png",NULL,array("alt"=>"France 2"));?></li>
                  <li><?php echo image("chaines/france3.png",NULL,array("alt"=>"France 3"));?></li>
                  <li><?php echo image("chaines/france4.png",NULL,array("alt"=>"France 4"));?></li>
                  <li><?php echo image("chaines/france5.png",NULL,array("alt"=>"France 5"));?></li>
                  <li><?php echo image("chaines/france0.png",NULL,array("alt"=>"France 0"));?></li>
                  <li><?php echo image("chaines/canalplus.png",NULL,array("alt"=>"Canal+"));?></li>
                  <li><?php echo image("chaines/m6.png",NULL,array("alt"=>"M6"));?></li>
                  <li><?php echo image("chaines/arte.png",NULL,array("alt"=>"Arte"));?></li>
                  <li><?php echo image("chaines/tv5monde.png",NULL,array("alt"=>"TV5 monde"));?></li>
                  <li><?php echo image("chaines/d8.png",NULL,array("alt"=>"D8"));?></li>
                  <li><?php echo image("chaines/w9.png",NULL,array("alt"=>"W9"));?></li>
                  <li><?php echo image("chaines/nrj_12.png",NULL,array("alt"=>"NRJ 12"));?></li>
                  <li><?php echo image("chaines/nt1.png",NULL,array("alt"=>"NT1"));?></li>
                  <li><?php echo image("chaines/tmc.png",NULL,array("alt"=>"TMC"));?></li>
                  <li><?php echo image("chaines/teva.png",NULL,array("alt"=>"Téva"));?></li>
              </ul>
            </div>
            <!--Locales et régionales new row-->
            <div class=" column twelve top-10">
              <h4>Locales et régionales</h4>
              <ul class="bqt">
                  <li><?php echo image("chaines/guadeloupe_radio_tv_internet.png",NULL,array("alt"=>"Guadeloupe Radio Télévision Internet"));?></li>
                  <li><?php echo image("chaines/martinique_radio_tv_internet.png",NULL,array("alt"=>"Martinique Radio Télévision Internet"));?></li>
                  <li><?php echo image("chaines/guyane_radio_tv_internet.png",NULL,array("alt"=>"Guyane Radio Télévision Internet"));?></li>
                  <li><?php echo image("chaines/gtv_guadeloupe_television.png",NULL,array("alt"=>"GTV"));?></li>
                  <li><?php echo image("chaines/atv_cest_ma_tele.png",NULL,array("alt"=>"ATV c'est ma télé"));?></li>
                  <li><?php echo image("chaines/tropik_tv.png",NULL,array("alt"=>"Tropik Musik TV"));?></li>
                  <li><?php echo image("chaines/kmt.png",NULL,array("alt"=>"KMT"));?></li>
                  <li><?php echo image("chaines/canal10.png",NULL,array("alt"=>"Canal 10"));?></li>
                  <li><?php echo image("chaines/etv.png",NULL,array("alt"=>"ETV"));?></li>
              </ul>
            </div>
            <!--Infos et société new row-->
            <div class=" column seven top-10">
              <h4>Infos et société</h4>
              <ul class="bqt">
                  <li><?php echo image("chaines/france24.png",NULL,array("alt"=>"France 24"));?></li>
                  <li><?php echo image("chaines/kot_television_catholique.png",NULL,array("alt"=>"KTO - Télévision catholique"));?></li>
                  <li><?php echo image("chaines/itele.png",NULL,array("alt"=>"iTele"));?></li>
                  <li><?php echo image("chaines/bfm.png",NULL,array("alt"=>"BFM TV"));?></li>
                  <li><?php echo image("chaines/lcp_assemblee_nationale.png",NULL,array("alt"=>"LCP Assemblée Nationale"));?></li>
              </ul>
            </div>
            <!--Découverte-->
            <div class=" column three top-10">
              <h4>Découverte</h4>
              <ul class="bqt">
                  <li><?php echo image("chaines/nrj_paris.png",NULL,array("alt"=>"NRJ"));?></li>
                  <li><?php echo image("chaines/stylia.png",NULL,array("alt"=>"Stylia"));?></li>
              </ul>
            </div>
            <!--Sport-->
            <div class=" column two top-10">
              <h4>Sport</h4>
              <ul class="bqt">
                  <li><?php echo image("chaines/ms.png",NULL,array("alt"=>"MS"));?></li>
              </ul>
            </div>

            <!--Musique-->
            <div class="column seven top-10">
              <h4>Musique</h4>
              <ul class="bqt">
                  <li><?php echo image("chaines/d17.png",NULL,array("alt"=>"D17"));?></li>
                  <li><?php echo image("chaines/nrj_hits.png",NULL,array("alt"=>"NRJ"));?></li>
                  <li><?php echo image("chaines/blex.png",NULL,array("alt"=>"Blex"));?></li>
                  <li><?php echo image("chaines/mcm.png",NULL,array("alt"=>"MCM"));?></li>
                  <li><?php echo image("chaines/tropikmuziktv.png",NULL,array("alt"=>"Tropik Muzik"));?></li>
              </ul>
            </div>

            <!--Jeunesse-->
            <div class="column five top-10">
              <h4>Jeunesse</h4>
              <ul class="bqt">
                  <li><?php echo image("chaines/gulli.png",NULL,array("alt"=>"Gulli"));?></li>
                  <li><?php echo image("chaines/soleil.png",NULL,array("alt"=>"Soleil"));?></li>
                  <li><?php echo image("chaines/gameone.png",NULL,array("alt"=>"Game one"));?></li>
              </ul>
            </div>

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