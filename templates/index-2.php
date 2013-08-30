<?php include('header.php'); ?>
<!--MAIN SECTION-->
<section class='row main-content'>
  <!--Right content -->
  <section class='nine columns left-content'>
      <ul class="block-grid four-up etapes page-etape-1">
        <li class='etape1 state1'><img src='images/etape.png'/><a href='index.php'><span>1</span> Mon<br/>offre</a></li>
        <li class='etape2'><img src='images/etape.png'/><a href='index-4.php'><span>2</span> Mes<br/>coordonnées</a></li>
        <li class='etape3'><img src='images/etape.png'/><a href='index-5.php'><span>3</span> Mon<br/>récapitulatif</a></li>
        <li class='etape4'><img src='images/etape.png'/><a href='#'><span>4</span> Paiement</a></li>
      </ul>

      <div class='left-etape-content'>

        <h4 class='green-text'>MA PROMOTION</h4>

        <form class='frm-choisir-offre'>
          <label><input type='checkbox' value='illimite'>Un grand pas pour l'illimité <span class='green-text'>49,99€</span></label>
        <!-- LOOP -->  
        <div class='forfait'>
          <h3>Forfait no1</h3>
          <div class='three columns telephone'>Téléphone</br><span class='green-text'>Payez à la communication</span></div>
          <div class='three columns internet'>Internet<br/><span class='green-text'>Jusqu'à 2 Mega<sup>(2)</sup></span></div>
          <!-- If television is not available, add 'not-available' to its class -->
          <div class='three columns television not-available'>Télé</div>
          <div class='three columns tarifs'><span class='green-text'>24€<sup>99</sup></span>TTC/mois<strong>*</strong><input class='rmv-std-btn btn-green' type='submit' name='forfait1' value='Choisir' /></div>
        </div>

        <div class='forfait'>
          <h3>Forfait no1</h3>
          <div class='three columns telephone'>Téléphone</br><span class='green-text'>Payez à la communication</span></div>
          <div class='three columns internet'>Internet<br/><span class='green-text'>Jusqu'à 2 Mega<sup>(2)</sup></span></div>
          <div class='three columns television disable'>Télé</div>
          <div class='three columns tarifs'><span class='green-text'>24€<sup>99</sup></span>TTC/mois<strong>*</strong><input class='rmv-std-btn btn-green' type='submit' name='forfait1' value='Choisir' /></div>
        </div>
        <!-- END OF LOOP-->
        <div class='border-gray modem-sagem'>
            <input class='left' type='checkbox' name='modemsagem' value='modemsagem' /> 
            <img class='left' src='images/modem_sagem.png' alt='Modem Sagem FAST3504'/>
            <div class='left plus'><span class='green-text'>+</span><span class='misc-custom-4'><strong>Votre modem<br/>Sagem FAST3504</strong></span></div>
            <div class='left trf'><span>24€<sup>99</sup></span>TTC/mois</div>
        </div>
        <div class='top-20 custom-column back-button left'><a class='precedent' href='#' alt='Précédent'>Précédent</a></div>

        </form>

      </div>
    </section>
    <!--RIGHT SIDEBAR-->
    <section class='three columns right-content'>
      <!--votre ligne-->
     <div class='ligne'>
        <form class='frm-etape-tester-block'>
          <label class='lbl-white'><strong>Votre ligne</strong></label>
          <input type='text' id='ligne' name='ligne' value='02 40 52 48 69'/>
          <input class='rmv-std-btn right link' type='submit' value='Modifier' name='tester_ligne_block'/>
        </form>
     </div>
     <div class='degroupage custom-column top-20 bottom-20'>
        <strong> Dégroupé - Sans abonnement</strong>
      </div>
    </section>
    <!--END OF RIGHT SIDEBAR-->
  </section>
  <!--END OF MAIN SECTION-->
<?php include('footer.php');?>
