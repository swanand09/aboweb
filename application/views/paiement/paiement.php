<div class="left-etape-content recapitulatif">
    <div class="row prelevement">
      <div class="column twelve"><h3>LE PAIEMENT DE VOTRE ABONNEMENT</h3></div>
      <div class="column twelve"><p><strong>Optez pour le mode de paiement de votre choix</strong></p></div>
      <div class="row automatique border-gray">
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
        <input type="hidden" name="mode_pay" id="mode_pay" value="rib"/>
<!--    <div class="section-automatique">
        <div class="row">
          <div class="column twelve"><h3>LE PRÉLÈVEMENT AUTOMATIQUE :</h3></div>
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
  </div>-->
        
        
  <div class='section-automatique'>
          <div class='row'><div class='column twelve'><h3>LE PRÉLÈVEMENT AUTOMATIQUE :</h3></div></div>
          <div class="row">
              <div class="column twelve"><label><input checked="checked" type="checkbox" id="show-hide-adresse">Mon adresse de paiement est identique à mon adresse de facturation. </label></div>
          </div>
          <div id='adresse-paiement' class='hide'>
            <!-- Civilité-->
            <div class='row'>
              <div class='columns bottom-10 two'><label>Civilité :<span class='has-tip' title='obligatoire'>*</span></label></div>
              <div class='columns bottom-10 end'>
                <label class='left'><input class='validate[required]' type='radio' name='civilite_pa' value='M.'/>M.</label>
                <label class='left'><input class='validate[required]' type='radio' name='civilite_pa' value='Mme'/>Mme</label>
                <label class='left'><input class='validate[required]' type='radio' name='civilite_pa' value='Melle'/>Melle</label>
              </div>
            </div>
            <!-- Nom -->
            <div class='row'>
              <div class='columns two'><label>Nom :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] nom' name='nom_pa' /></div>
            </div>
            <!--Prénom -->
            <div class='row'>
              <div class='columns two'><label>Prénom :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] prenom' name='prenom_pa' /></div>
            </div>
            <!--Numéro & Complément numéro & Type de voie-->
            <div class='row'>
              <div class='columns two'><label>Numéro :</label></div><div class='two columns'><input type='text' class='numero' name='numero_pa' /></div>
              <div class='nfirst columns three'><label>Complément numéro :</label></div><div class='three columns end'><input type='text' class='comp_numero' name='comp_numero_pa' /></div>              
            </div>
            <!--Addresse & Addresse suite-->
            <div class='row'>
              <div class='columns two'><label>Adresse :</label></div><div class='four columns'><input type='text' class='validate[maxSize[64]] adresse' name='voie_pa' /></div>
              <div class='nfirst columns two'><label>Adresse suite :</label></div><div class='four columns'><input type='text' class='validate[maxSize[64]] adresse_suite' name='adresse_suite_pa' /></div>
            </div>
            <!--Code postal & Ville -->
            <div class='row'>
              <div class='columns two'><label>Code postal :</label></div>
              <div class='columns two'><input type='text' class='validate[required] code_postal' name='code_postal_pa' id='codepostal2' /></div>
              <div class='columns one nfirst'><label>Ville :</label></div><div class='columns four end'><input type='text' class='validate[required] ville' name='ville_pa' id='ville2' /></div>
            </div>
          </div>
          <!--Coordonnées de votre compte-->
          <div class='row'><div class='column twelve top-20'><h4>LES COORDONNEES DE VOTRE COMPTE</h4></div></div>
          <div class="row">
            <div class="column two"><label>IBAN <a href='#' class='has-tip' data-width='360' title='Le passage au format SEPA est une obligation légale qui vient remplacer le prélèvement automatique actuel. Il est constitué des éléments suivants :
            BIC (Business Identifier Code) et IBAN (International Bank Account Number) : ils remplacent votre RIB actuel. Le BIC est le code d’identification de la banque, l’IBAN est le numéro de code bancaire international.'><?php echo image('info_icon.png',NULL,array("class"=>"border-gray","alt"=>"Plus info")); ?></a></label></div>
<!--            
            <div class="column one"><input type="text" name='iban1' class="iban1"></div>
            <div class="column one"><input type="text" name='iban2' class="iban2"></div>
            <div class="column one"><input type="text" name='iban3' class="iban3"></div>
            <div class="column one"><input type="text" name='iban4' class="iban4"></div>
            <div class="column one"><input type="text" name='iban5' class="iban5"></div>
            <div class="column one"><input type="text" name='iban6' class="iban6"></div>
            <div class="column one end"><input type="text" name='iban7' class="iban7"></div>
-->
            <div class="column one"><input type="text" class='validate[required],funcCall[validateIbanFr]' name='iban1' id ="iban1" maxlength = '4'></div>
            <div class="column one"><input type="text" class='validate[required]' name='iban2' id ="iban2" maxlength = '4'></div>
            <div class="column one"><input type="text" class='validate[required]' name='iban3' id ="iban3" maxlength = '4'></div>
            <div class="column one"><input type="text" class='validate[required]' name='iban4' id ="iban4" maxlength = '4'></div>
            <div class="column one"><input type="text" class='validate[required]' name='iban5' id ="iban5" maxlength = '4'></div>
            <div class="column one"><input type="text" class='validate[required]' name='iban6' id ="iban6" maxlength = '4'></div>
            <div class="column one end"><input type="text" class='validate[required,funcCall[validateIban]]' name='iban7' id ="iban7" maxlength = '4'></div>

            
          </div>
          <div class="row">
            <div class="column two"><label>BIC <a href='#' class='has-tip' data-width='360' title='Le passage au format SEPA est une obligation légale qui vient remplacer le prélèvement automatique actuel. Il est constitué des éléments suivants :
            BIC (Business Identifier Code) et IBAN (International Bank Account Number) : ils remplacent votre RIB actuel. Le BIC est le code d’identification de la banque, l’IBAN est le numéro de code bancaire international.'><?php echo image('info_icon.png',NULL,array("class"=>"border-gray","alt"=>"Plus info")); ?></a></label></div>
<!--            <div class="column one"><input type="text"name='bic1' class="bic1"></div>
            <div class="column three end"><input type="text"name='bic2' class="bic2"></div>-->
            <div class="column one"><input type="text" name='bic1' class="validate[required]" id="bic1" maxlength = '4'></div>
            <div class="column three end"><input type="text" name='bic2' class="validate[required,funcCall[validateBic]]" id="bic2" maxlength ='7'></div>
  
          </div>
          <div class="row"><div class='column twelve'><label class='autorise'><input type="checkbox" name="autorise"><span class='left'>J'autorise MEDIASERV à envoyer des instructions à ma banque pour débiter mon compte, et ma banque à débiter mon compte conformément aux instructions de MEDIASERV. Je reconnais que la notification de tout prélèvement SEPA s’opère par le biais de la facture au plus tard 5 jours ouvrés avant sa date d’échéance pour le premier prélèvement et au plus tard 2 jours ouvrés pour les suivants.</span></label></div></div>
        
      </div>      

    <!--Carte bancaire-->
<!--    <div class="row section-carte-bancaire" style="display: none;">
      <h3>CARTE BANCAIRE</h3>
      <div class="column border-gray misc-custom-5 top-20 p20all">
        <div class="column twelve"><p>Saisissez ci-dessous les informations relatives à la carte de paiement utilisée pour effectuer le dépôt de garantie :</p></div>
        <div class="column three">Type de carte</div>
        <div class="column nine">
          <label class="left"><?php //echo image("contenu/cartebancaire.png");?><input type="radio" value="cartebancaire" name="typedecarte" class="validate[required]"></label>
          <label class="left"><?php //echo image("contenu/cartebleue.png");?><input type="radio" value="cartebleue" name="typedecarte" class="validate[required]"></label>
          <label class="left"><?php //echo image("contenu/visa.png");?><input type="radio" value="visa" name="typedecarte" class="validate[required]"></label>
          <label class="left"><?php //echo image("contenu/mastercard.png");?><input type="radio" value="mastercard" name="typedecarte" class="validate[required]"></label>
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
    </div>-->
    <!---->

    
    <!--Carte bancaire-->
      <div class='row section-carte-bancaire'>
        <h3>CARTE BANCAIRE</h3>
        <div class='column border-gray misc-custom-5 top-20 p20all'>
          <div class='column twelve'><p>Saisissez ci-dessous les informations relatives à la carte de paiement utilisée pour effectuer le dépôt de garantie :</p></div>
          <div class='column three'>Type de carte</div>
          <div class='column nine'>
            <label class='left'><?php echo image("contenu/cartebancaire.png");?><input class='validate[required]' type='radio' name='typedecarte' value='cartebancaire'/></label>
            <label class='left'><?php echo image("contenu/cartebleue.png");?><input class='validate[required]' type='radio' name='typedecarte' value='cartebleue'/></label>
            <label class='left'><?php echo image("contenu/visa.png");?><input class='validate[required]' type='radio' name='typedecarte' value='visa'/></label>
            <label class='left'><?php echo image("contenu/mastercard.png");?><input class='validate[required]' type='radio' name='typedecarte' value='mastercard'/></label>
          </div>
          <div class='column three top-10'>Numéro de carte</div><div class='column nine top-10'><input class='validate[required,creditCard]' type='text' name='numerodecarte' id='numerodecarte'/></div>
          <div class='column three'>Date d'expiration</div>
            <div class='column nine'>
              <div class='column two no-padding-left'>
                <select name='date_expiration_mois'>
                  <option value='Jan'>Jan</option>
                  <option value='Jan'>Fév</option>
                  <option value='Fév'>Mar</option>
                  <option value='Avr'>Avr</option>
                  <option value='Mai'>Mai</option>
                  <option value='Jui'>Jui</option>
                  <option value='Jul'>Jul</option>
                  <option value='Aou'>Aou</option>
                  <option value='Sep'>Sep</option>
                  <option value='Oct'>Oct</option>
                  <option value='Nov'>Nov</option>
                  <option value='Déc'>Déc</option>
                </select>
              </div>
              <div class='column three'>
                <select name='date_expiration_annee'>
                  <option value='2013'>2013</option>
                  <option value='2014'>2014</option>
                  <option value='2015'>2015</option>
                  <option value='2016'>2016</option>
                  <option value='2017'>2017</option>
                  <option value='2018'>2018</option>
                  <option value='2019'>2019</option>
                  <option value='2020'>2020</option>
                  <option value='2021'>2021</option>
                  <option value='2022'>2022</option>
                  <option value='2023'>2023</option>
                  <option value='2024'>2024</option>
                  <option value='2025'>2025</option>
                </select>
              </div>
              <div class='column eight'></div>
            </div>
          <div class='column three top-10'>Cryptogramme</div><div class='column three end top-10'><input class='validate[required,custom[onlyNumberSp]]' type='text' name='cryptogramme' id='cryptogramme'/></div>
        </div>

        <div class='column twelve top-20'>
          <p>Le remboursement du dépôt de garantie se fera lors de la résiliation de votre abonnement. Si vous ne voulez pas payer de dpôt de garantie, <a href='#'>modifiez votre commande</a></p>
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