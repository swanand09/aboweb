 <form action="mon-recapitulatif.php" method="POST">
          <!--Adresse coordonnées-->
          <h3>Coordonnées (adresse abonnement) :</h3>
          <div class="row bottom-10">
            <div class="columns five"><label>Civilité :</label></div><div class="seven columns">
              <label class="left"><input type="radio" value="monsieur" name="civilite">Monsieur</label>
              <label class="left"><input type="radio" value="madame" name="civilite">Madame</label>
            </div>
          </div>
          <div class="row">
            <div class="columns five"><label>Nom :</label></div><div class="seven columns"><input type="text" id="nom" name="nom"></div>
          </div>
          <div class="row">
            <div class="columns five"><label>Prénom :</label></div><div class="seven columns"><input type="text" id="prenom" name="prenom"></div>
          </div>

          <!--Adresse d'installation-->
          <h3>Adresse d'installation :</h3>
          <div class="row">
            <div class="columns five"><label>Numéro :</label></div><div class="seven columns"><input type="text" id="numero" name="numero"></div>
          </div>
          <div class="row">
            <div class="columns five"><label>Nom de la voie :</label></div><div class="seven columns"><input type="text" id="nomdelavoie" name="NomDeLaVoie"></div>
          </div>
          <div class="row">
            <div class="columns five"><label>Complement d'adresse, étage, digicode... :</label></div><div class="seven columns"><input type="text" id="complement" name="complement"></div>
          </div>
          <div class="row">
            <div class="columns five"><label>Code postal :</label></div><div class="seven columns"><input type="text" id="codepostal" name="codepostal"></div>
          </div>
          <div class="row">
            <div class="columns five"><label>Ville :</label></div><div class="seven columns"><input type="text" id="ville" name="ville"></div>
          </div>

          <!--Adresse de livraison-->
          <h3>Adresse de livraison :</h3>
          <div class="row">
            <div class="column twelve bottom-10">
            <label>
              <input type="checkbox" value="identique" name="identique">
              Identique à l'adresse d'abonnement
            </label>
            </div>
            <div class="column twelve bottom-10">
            <label>
              <input type="checkbox" value="identique" name="identique" class="left">
              Je souhaite bénéficier gratuitement d'une livraison express(72 heures à partir du traitement de votre commande).<br>
            </label>
            <span class="top-10 column"><strong>IMPORTANT :</strong> dans ce cas je renonce à exercer mon droit de rétractation dans les 7 jours suivant achats.</span>
          </div>
        </div>

          <!--adresse principale-->
          <h3>Adresse de messagerie principale :</h3>
          <div class="row">
            <div class="column twelve bottom-10">
              <label>Vous bénéficiez d’un compte e-mail médiaserv<br> avec une messagerie de 100 mo</label>
            </div>
            <div class="column six"> 
              <input type="text" id="email_mediaserv" name="email_mediaserv"><span class="input-info">rassurez-vous, nous n'aimons pas non plus le SPAM</span>
            </div>
            <div class="column three"> 
              <span class="postfix">@mediaserv.net</span>
            </div>
            <div class="column three"> 
              <input type="button" name="VerifierEmail" value="Vérifier" class="rmv-std-btn btn-verifier">
            </div>
            <div class="column twelve top-20">
              <label>Veuillez précisez une autre adresse de messagerie</label>
              <input type="text" name="email" class="six">
            </div>
          </div>

          <!--type de facturation-->
          <h3>Type de facturation :</h3>
          <div class="row">
            <div class="column four"><label><input type="radio" value="Electronique" name="TypeDeFacturation" checked=""> Electronique (gratuit)</label></div>
            <div class="column four"> <label><input type="radio" value="Papier" name="TypeDeFacturation"> Facture papier(1,5€)</label></div>
            <div class="column four"> </div>
          </div>
          
          <!-- Sexy line -->
          <hr class="sexy">

          <!--back and submit buttom -->
          <div class="six custom-column back-button left"><a alt="Précédent" href="mon_offre" class="precedent">Précédent</a></div>
          <div class="six custom-column text-right"> <input type="submit" value="SUIVANT" name="suivant" class="btn-forward rmv-std-btn"></div>
        </form>