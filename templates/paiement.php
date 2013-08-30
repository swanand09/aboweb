<?php include('header.php'); ?>
<!--MAIN SECTION-->
<section class='row main-content'>
  <!--Right content -->
  <section class='nine columns left-content'>
      <ul class="block-grid four-up etapes page-etape-4">
        <li class='etape1 state1'><img src='images/etape.png'/><a href='index.php'><span>1</span> Mon<br/>offre</a></li>
        <li class='etape2'><img src='images/etape.png'/><a href='index-4.php'><span>2</span> Mes<br/>coordonnées</a></li>
        <li class='etape3'><img src='images/etape.png'/><a href='index-5.php'><span>3</span> Mon<br/>récapitulatif</a></li>
        <li class='etape4'><img src='images/etape.png'/><a href='paiement.php'><span>4</span> Paiement</a></li>
      </ul>

      <div class='left-etape-content recapitulatif'>
        <div class='row'>
          <div class='column twelve'><h3>LE PAIEMENT DE VOTRE ABONNEMENT</h3></div>
          <div class='column twelve bottom-20'>Saisissez ci-dessous les informations relatives au compte bancaire sur lequel sera prélevé votre abonnement mensuel:</div>
          <div class='column three'><label>Titulaire du compte</label></div><div class='column nine'><input type='text' id='compte_titulaire' name='compte_titulaire'/></div>

          <div class='column three'><label>RIB</label></div>
          <div class='column two'><input type='text' id='banque' name='banque'/><span>Banque</span></div>
          <div class='column two'><input type='text' id='guichet' name='guichet'/><span>Guichet</span></div>
          <div class='column three'><input type='text' id='numero_de_compte' name='numero_de_compte'/><span>Numéro de compte</span></div>
          <div class='column two'><input type='text' id='cle' name='cle'/><span>Clé</span></div>
        </div>

        <div class='row'>
          <div class='column twelve top-20'>
            <p>
              Vous recevrez dans votre courrier de bienvenue une demande de prélèvement automatique.<br/>A réception, et afin que votre demande soit prise en compte, vous devrez la renvoyer complétée et signée à orange sous 10 jours. Si Vous avez choisi une offre opérateur TV( CanalSat, Canal + le bouquet), nous vous informons que votre RIB sera transmis à l'opérateur afin qu'il puisse à son tour valider votre demande.
            </p>
          </div>
        </div>
      
        <div class='row'>
          <div class='column twelve'><h3>Votre dépôt de guarantie</h3></div>
          <div class='column twelve'><p>Un dépôt de garantie de 49€ est nécessaire pour le(s) matériels(s) suivant : 1 Décodeur TV UHD87 et carte VIACCESS</p></div>
          <div class='column twelve small-icons'><strong>Paiement 100% sécurisé</strong></div>
        </div>

        <div class='row'></div>


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
