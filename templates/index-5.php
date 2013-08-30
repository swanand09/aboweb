<?php include('header.php'); ?>
<!--MAIN SECTION-->
<section class='row main-content'>
  <!--Right content -->
  <section class='nine columns left-content'>
      <ul class="block-grid four-up etapes page-etape-3">
        <li class='etape1 state1'><img src='images/etape.png'/><a href='index.php'><span>1</span> Mon<br/>offre</a></li>
        <li class='etape2'><img src='images/etape.png'/><a href='index-4.php'><span>2</span> Mes<br/>coordonnées</a></li>
        <li class='etape3'><img src='images/etape.png'/><a href='index-5.php'><span>3</span> Mon<br/>récapitulatif</a></li>
        <li class='etape4'><img src='images/etape.png'/><a href='#'><span>4</span> Paiement</a></li>
      </ul>

      <div class='left-etape-content recapitulatif'>
        <div class='row'>
          <div class='column twelve bottom-20'>
            <label class='top-20'><strong>Vos coordonnées</strong></label>
            <span class='val'>Madame Martine Durand</span>
            <label class='top-20'><strong>Adresse d'installation</strong></label>
            <span class='val'>!2 Avneur des Lilas <br/>97262 Fort de France</span>
            <label class='top-20'><strong>Vos coordonnées</strong></label>
            <span class='val'>Vous souhaitez une livraison express</span>
            <label class='top-20'><strong>Votre adresse médiaServ est : </strong><a class='mail-link' href='mailto:martine.durand@mediaserv.net'>martine.durand@mediaserv.net</a></label>
          </div>
        </div>
        <hr class='sexy'/>
        <div class='row'>
          <div class='column twelve'><label><strong>Vous profitez en plus de :</strong></label></div>
          <div class='column six top-20'><img src='images/promo_nouveau_forfait.png' alt='Nouveau Forfaite 49,99€ TTC par mois' title='Nouveau Forfaite 49,99€ TTC par mois'/></div>
          <div class='column six top-20 border-left-gray'>
            <h4>PARRAINEZ C'EST GAGNEZ</h4>
            <p><strong>Parrainez vos proches et bénéficiez de 25 € d'avoir pour chaque filleul devenu client </strong></p>
          </div>
        </div>

        <hr class='sexy'/>
        <form method='POST'>
        <div class='row'>
          <div class='column twelve conditions'><label><input class='left' type='checkbox' name='recap' value='conditions'/><strong class='left'>Je déclare avoir pris connaissance et accepté dans toutes leur teneur les Conditions Générales d’Inscriptions aux Services haut débit et de téléphonie fixe, ainsi que les descriptifs et les tarifs des offres.</strong></label></div>
          <div class='column twelve top-20'><label><input type='checkbox' name='recap' value='mandat'/><strong>Je donne mandat à MEDIASERV……..</strong></label></div>
        </div>

        <!--back and submit buttom -->
        <div class='row'>
          <div class='six column back-button left top-20'><a class='precedent' href='#' alt='Modifier'>Modifier</a></div>
          <div class='six column text-right top-20'> <input class='btn-confirmer rmv-std-btn' type='submit' name='suivant' value='Confirmer mon choix'/></div> 
        </div>

      </form>

      </div>
    </section>
    <!--RIGHT SIDEBAR-->
    <section class='three columns right-content'>
     <!--VOTRE LIGNE-->
      <div class='ligne p10'>
         <form class='frm-etape-tester-block'>
           <label class='lbl-white'><strong>Votre ligne</strong></label>
           <input type='text' id='ligne' name='ligne' value='02 40 52 48 69'/>
           <input class='rmv-std-btn right link' type='submit' value='Modifier' name='tester_ligne_block'/>
         </form>
      </div>
      <!--END OF VOTRE LIGNE-->
      <div class='degroupage p10 custom-column top-20 bottom-20 twelve'>
         <strong> Dégroupé - Sans abonnement</strong>
       </div>
       <hr/>
       <div class='votre-offre p10'><span class='left'>Votre offre Mediaserv</span><span class='right'><strong>44,99€</strong></span></div>
       <!--FORFAIT-->
       <div class=' custom-column forpro forfait top-20 p10'>
         <h3>Forfait <span class='right'><a href='#'>Modifier</a></span></h3>
         <ul>
           <li class='small-icon-internet'><strong>Internet</strong><br/>20 Mo</li>
           <li class='small-icon-telephone'><strong>Téléphone</strong><br/>50 destinations illimité 24h/24 + illimité vers mobile et métropole 24h/24 et 7j/7 en local et vers la métropole</li>
         </ul>
       </div>
       <!--END OF FORFAIT-->

       <!--PROMOTION-->
       <div class='custom-column forpro promotion top-20 p10'>
         <h3>Promotion <span class='right'><a href='#'>Modifier</a></span></h3>
         <ul class='bottom-20'>
           <li class='small-icon-location bottom-10'><strong>Location box et décodeur TV</strong></li>
           <li class='small-icon-appel'><strong>Vos appels vers les mobiles 24h/24 et 7j/7 en local et vers la métropole</strong></li>
         </ul>
       </div>
       <!--END OF PROMOTION-->
       <hr/>
       <!-- PARRAINAGE -->
       <form method='POST'>
       <div class='custom-column p10 bottom-20'>
           <div class='custom-column six'><strong>Avez-vous un parrain ?</strong></div>
           <div class='custom-column six'>
             <label class='left'><input type='radio' name='parrain' value='oui'/>Oui</label>
             <label class='right'><input type='radio' checked name='parrain' value='non'/>Non</label>
           </div>
           <div class='parrain-section column twelve top-20'>
                <input type='text' name='parrain_nom' placeholder='M. Cailleau'/>
                <input type='text' name='parrain_code' placeholder='XDF 2355 Ui KFC'/>
            </div>
       </div>
       <!-- END OF PARRAINAGE -->
       <hr/>
       <!-- MODEM & DECODEUR TV -->
       <div class='custom-column p10 modem-deco'>
         <h3 class='no-margin-top'>Modem<span class='right'>0€</span></h3>
         <h3>Décodeur TV<span class='right'>0€</span></h3>
       </div>
       <!-- END OF MODEM & DECODEUR TV -->
       <hr/>
       <!--TOTAL-->
       <div class='custom-column p10 total'>
         <h3 class='no-margin-top'>Total par mois<span class='right'>44,99 €</span></h3>
       </div>
       <!--END OF TOTAL-->
     </form>

    </section>
    <!--END OF RIGHT SIDEBAR-->
  </section>
  <!--END OF MAIN SECTION-->
<?php include('footer.php');?>
