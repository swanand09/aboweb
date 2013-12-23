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
        <div class='section-automatique'>
          <div class='row'><div class='column twelve'><h3>LE PRÉLÈVEMENT AUTOMATIQUE :</h3></div></div>
          <div class="row">
              <div class="column twelve"><label><input checked="checked" type="checkbox" name="adresse_identique" value="1" id="show-hide-adresse">Mon adresse de paiement est identique à mon adresse de facturation. </label></div>
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
            <div class="column one"><input type="text" name='bic1' class="validate[required]" id="bic1" maxlength = '4'></div>
            <div class="column three end"><input type="text" name='bic2' class="validate[required,funcCall[validateBic]]" id="bic2" maxlength ='7'></div>
          </div>
            <!--titulaire -->
          <div class="row">
            <div class="column two"><label>Titulaire</label></div>
            <div class="column five end"><input type="text" name='titulaire' class="validate[required]" id="titulaire" maxsize = "60"></div>
          </div>
          <div class="row"><div class='column twelve'><label class='autorise'><input type="checkbox" name="autorise"><span class='left'>J'autorise MEDIASERV à envoyer des instructions à ma banque pour débiter mon compte, et ma banque à débiter mon compte conformément aux instructions de MEDIASERV. Je reconnais que la notification de tout prélèvement SEPA s’opère par le biais de la facture au plus tard 5 jours ouvrés avant sa date d’échéance pour le premier prélèvement et au plus tard 2 jours ouvrés pour les suivants.</span></label></div></div>
      </div>      

    <!--Carte bancaire-->
      <div class='row section-carte-bancaire'>
          <input type="hidden" name='titulaire' value="nom prenom" class="validate[required]" id="titulaire" maxsize = "60">
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
                  <option value='01'>Jan</option>
                  <option value='02'>Fév</option>
                  <option value='03'>Mar</option>
                  <option value='04'>Avr</option>
                  <option value='05'>Mai</option>
                  <option value='06'>Jui</option>
                  <option value='07'>Jul</option>
                  <option value='08'>Aou</option>
                  <option value='09'>Sep</option>
                  <option value='10'>Oct</option>
                  <option value='11'>Nov</option>
                  <option value='12'>Déc</option>
                </select>
              </div>
              <div class='column three'>
                <select name='date_expiration_annee'>
                  <option value='13'>2013</option>
                  <option value='14'>2014</option>
                  <option value='15'>2015</option>
                  <option value='16'>2016</option>
                  <option value='17'>2017</option>
                  <option value='18'>2018</option>
                  <option value='19'>2019</option>
                  <option value='20'>2020</option>
                  <option value='21'>2021</option>
                  <option value='22'>2022</option>
                  <option value='23'>2023</option>
                  <option value='24'>2024</option>
                  <option value='25'>2025</option>
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