<div class="left-etape-content recapitulatif">
    <div class="row prelevement">
      <div class="column twelve"><h3>LE PAIEMENT DE VOTRE ABONNEMENT</h3></div>
      <div class="column twelve"><p><strong>Optez pour le mode de paiement de votre choix</strong></p></div>
      <div class="row automatique border-gray box-shadow">
        <div class="column three"><?php echo image("contenu/automatique.png"); ?></div>
        <div class="column nine">
          <strong>LE PRÉLÈVEMENT AUTOMATIQUE :</strong><br>
          <p>vous saisissez vos informations bancaires indiquées sur votre RIB.</p>
        </div>  
      </div>
      <div class="row cartebancaire border-gray">
        <div class="column three"><?php echo image("contenu/bancaire.png"); ?></div>
        <div class="column nine"><strong>LE PAIEMENT PAR CARTE BANCAIRE</strong></div>
      </div>
    </div>

    <!--Form-->
    <form action="paiement/enregistreSouscription" method="post" id="frm-paiement">
    <div class="section-automatique">
    <div class="row">
      <div class="column twelve"><h3>LE PAIEMENT DE VOTRE ABONNEMENT</h3></div>
      <div class="column twelve bottom-20">Saisissez ci-dessous les informations relatives au compte bancaire sur lequel sera prélevé votre abonnement mensuel:</div>
      <div class="column three"><label>Titulaire du compte</label></div><div class="column four bottom-20"><input type="text" name="nom" id="nom" class="validate[required]"><span>Nom</span></div><div class="column five bottom-20"><input type="text" name="prenom" id="prenom" class="validate[required]"><span>Prénom</span></div>
      <div class="column three"><label>Domiciliation</label></div><div class="column nine bottom-20"><input type="text" name="domiciliation" id="domiciliation" class="validate[required,maxSize[30]]"></div>
      <div class="column three"><label>RIB</label></div>
      <div class="column two"><input type="text" name="banque" id="banque" class="validate[required]"><span>Banque</span></div>
      <div class="column two"><input type="text" name="guichet" id="guichet" class="validate[required]"><span>Guichet</span></div>
      <div class="column three"><input type="text" name="numero_de_compte" id="numero_de_compte" class="validate[required,custom[onlyNumberSp]]"><span>Numéro de compte</span></div>
      <div class="column two"><input type="text" name="cle" id="cle" class="validate[required]"><span>Clé</span></div>
    </div>

    <div class="row">
      <div class="column twelve top-20">
        <p class="p20all border-yellow text-gray">
          <strong>Vous recevrez dans votre courrier de bienvenue une demande de prélèvement automatique.</strong><br>A réception, et afin que votre demande soit prise en compte, vous devrez la renvoyer complétée et signée à orange sous 10 jours. Si Vous avez choisi une offre opérateur TV( CanalSat, Canal + le bouquet), nous vous informons que votre RIB sera transmis à l'opérateur afin qu'il puisse à son tour valider votre demande.
        </p>
      </div>
    </div>
  </div>

    <!--Carte bancaire-->
    <div class="row section-carte-bancaire" style="display: none;">
      <h3>Carte bancaire</h3>
      <div class="column border-gray misc-custom-5 top-20 p20all">
        <div class="column twelve"><p>Saisissez ci-dessous les informations relatives à la carte de paiement utilisée pour effectuer le dépôt de garantie :</p></div>
        <div class="column three">Type de carte</div>
        <div class="column nine">
          <label class="left"><?php echo image("contenu/cartebancaire.png");?><input type="radio" value="cartebancaire" name="typedecarte" class="validate[required]"></label>
          <label class="left"><?php echo image("contenu/cartebleue.png");?><input type="radio" value="cartebleue" name="typedecarte" class="validate[required]"></label>
          <label class="left"><?php echo image("contenu/visa.png");?><input type="radio" value="visa" name="typedecarte" class="validate[required]"></label>
          <label class="left"><?php echo image("contenu/mastercard.png");?><input type="radio" value="mastercard" name="typedecarte" class="validate[required]"></label>
        </div>
        <div class="column three top-10">Numéro de carte</div><div class="column nine top-10"><input type="text" id="numerodecarte" name="numerodecarte" class="validate[required,creditCard]"></div>
        <div class="column three">Date d'expiration</div>
          <div class="column nine">
            <div class="column two no-padding-left">
              <select name="date_expiration_mois">
                <option value="Jan">Jan</option>
                <option value="Jan">Fév</option>
                <option value="Jan">Mar</option>
                <option value="Jan">Avr</option>
                <option value="Jan">Mai</option>
                <option value="Jan">Jui</option>
                <option value="Jan">Jul</option>
                <option value="Jan">Aou</option>
                <option value="Jan">Sep</option>
                <option value="Jan">Oct</option>
                <option value="Jan">Nov</option>
                <option value="Jan">Déc</option>
              </select>
            </div>
            <div class="column three">
              <select name="date_expiration_annee">
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
              </select>
            </div>
            <div class="column eight"></div>
          </div>
        <div class="column three top-10">Cryptogramme</div><div class="column nine top-10"><input type="text" id="cryptogramme" name="cryptogramme" class="validate[required,custom[onlyNumberSp]]"></div>
      </div>

      <div class="column twelve top-20">
        <p>Le remboursement du dépôt de garantie se fera lors de la résiliation de votre abonnement. Si vous ne voulez pas payer de dépôt de garantie, <a href="#">modifiez votre commande</a></p>
      </div>
    </div>
    <!---->

     <div class="row">
      <div class="six column back-button left top-20"><?php echo anchor('recapitulatif','Précedent',array('title'=>'Précedent','class'=>'precedent','alt'=>'Précedent')); ?></div>
      <div class="six column text-right top-20"> <input type="submit" value="Confirmer mon choix" name="suivant" class="btn-confirmer rmv-std-btn"></div> 
    </div>
  </form>
    <!--end form-->

</div>