<?php include('header.php'); ?>
<!--MAIN SECTION-->
<section class='row main-content'>
  <!--Right content -->
  <section class='nine columns left-content'>
      <ul class="block-grid four-up etapes page-etape-2">
        <li class='etape1 state1'><img src='images/etape.png'/><a href='index.php'><span>1</span> Mon<br/>offre</a></li>
        <li class='etape2'><img src='images/etape.png'/><a href='index-4.php'><span>2</span> Mes<br/>coordonnées</a></li>
        <li class='etape3'><img src='images/etape.png'/><a href='index-5.php'><span>3</span> Mon<br/>récapitulatif</a></li>
        <li class='etape4'><img src='images/etape.png'/><a href='#'><span>4</span> Paiement</a></li>
      </ul>

      <div class='left-etape-content'>

        <form method='POST'>
          <!--Adresse coordonnées-->
          <h3>Coordonnées (adresse abonnement) :</h3>
          <div class='row bottom-10'>
            <div class='columns five'><label>Civilité :</label></div><div class='seven columns'>
              <label class='left'><input type='radio' name='civilite' value='monsieur'/>Monsieur</label>
              <label class='left'><input type='radio' name='civilite' value='madame'/>Madame</label>
            </div>
          </div>
          <div class='row'>
            <div class='columns five'><label>Nom :</label></div><div class='seven columns'><input type='text' name='nom' id='nom' /></div>
          </div>
          <div class='row'>
            <div class='columns five'><label>Prénom :</label></div><div class='seven columns'><input type='text' name='prenom' id='prenom' /></div>
          </div>

          <!--Adresse d'installation-->
          <h3>Adresse d'installation :</h3>
          <div class='row'>
            <div class='columns five'><label>Numéro :</label></div><div class='seven columns'><input type='text' name='numero' id='numero' /></div>
          </div>
          <div class='row'>
            <div class='columns five'><label>Nom de la voie :</label></div><div class='seven columns'><input type='text' name='NomDeLaVoie' id='nomdelavoie' /></div>
          </div>
          <div class='row'>
            <div class='columns five'><label>Complement d'adresse, étage, digicode... :</label></div><div class='seven columns'><input type='text' name='complement' id='complement' /></div>
          </div>
          <div class='row'>
            <div class='columns five'><label>Code postal :</label></div><div class='seven columns'><input type='text' name='codepostal' id='codepostal' /></div>
          </div>
          <div class='row'>
            <div class='columns five'><label>Ville :</label></div><div class='seven columns'><input type='text' name='ville' id='ville' /></div>
          </div>

          <!--Adresse de livraison-->
          <h3>Adresse de livraison :</h3>
          <div class='row'>
            <div class='column twelve bottom-10'>
            <label>
              <input type='checkbox' name='identique' value='identique'/>
              Identique à l'adresse d'abonnement
            </label>
            </div>
            <div class='column twelve bottom-10'>
            <label>
              <input class='left' type='checkbox' name='identique' value='identique'/>
              Je souhaite bénéficier gratuitement d'une livraison express(72 heures à partir du traitement de votre commande).<br/>
            </label>
            <span class='top-10 column'><strong>IMPORTANT :</strong> dans ce cas je renonce à exercer mon droit de rétractation dans les 7 jours suivant achats.</span>
          </div>
        </div>

          <!--adresse principale-->
          <h3>Adresse de messagerie principale :</h3>
          <div class='row'>
            <div class='column twelve bottom-10'>
              <label>Vous bénéficiez d’un compte e-mail médiaserv<br/> avec une messagerie de 100 mo</label>
            </div>
            <div class='column six'> 
              <input type='text' name='email_mediaserv' id='email_mediaserv'/><span class='input-info'>rassurez-vous, nous n'aimons pas non plus le SPAM</span>
            </div>
            <div class='column three'> 
              <span class='postfix'>@mediaserv.net</span>
            </div>
            <div class='column three'> 
              <input class='rmv-std-btn btn-verifier' type="button" value="Vérifier" name="VerifierEmail"/>
            </div>
            <div class='column twelve top-20' >
              <label>Veuillez précisez une autre adresse de messagerie</label>
              <input class='six' type='text' name='email' />
            </div>
          </div>

          <!--type de facturation-->
          <h3>Type de facturation :</h3>
          <div class='row'>
            <div class='column four'><label><input type='radio' checked name='TypeDeFacturation' value='Electronique'/> Electronique (gratuit)</label></div>
            <div class='column four'> <label><input type='radio' name='TypeDeFacturation' value='Papier'/> Facture papier(1,5€)</label></div>
            <div class='column four'> </div>
          </div>
          
          <!-- Sexy line -->
          <hr class='sexy'/>

          <!--back and submit buttom -->
          <div class='six custom-column back-button left'><a class='precedent' href='#' alt='Précédent'>Précédent</a></div>
          <div class='six custom-column text-right'> <input class='btn-forward rmv-std-btn' type='submit' name='suivant' value='SUIVANT'/></div>
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

       <!--SUBMIT BUTTON-->
       <div class='row bottom-10'>
        <div class='column twelve'>
          <input class='rmv-std-btn btn-valider' type='submit' value='Valider ma sélection' />
        </div>
       </div>
     </form>
       <!--END OF SUBMIT BUTTOM-->
    </section>
    <!--END OF RIGHT SIDEBAR-->
  </section>
  <!--END OF MAIN SECTION-->
<?php include('footer.php');?>
