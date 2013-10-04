<?php echo js('main_functions.js');?>
<script>
    function verifMailWebSev(){
        preload();
        $.post(                   
            '<?php echo base_url('mes_coordonnees/verifEmail');?>',
             {
                email_msv : $("#email_mediaserv").val()
             },
            function(data){                 
              alert(data.msg);             
              switch(data.error){
                  case "401":
                      $("#email_mediaserv").val("").focus();
                  break;
              }
              $.unblockUI(); 
            },"json"
       ); 
    }
   $(function() {
        var villeLst=["BASSE TERRE","POINTE A PITRE","MORNE A L'EAU","GRAND BOURG","GOURBEYRE","TROIS RIVIERES","SAINTE ROSE","POINTE NOIRE","PORT LOUIS","SAINT FRANCOIS","VIEUX HABITANTS","SAINT CLAUDE","ANSE BERTRAND","BAIE-MAHAULT","BAILLIF","BOUILLANTE","DESHAIES","LA DESIRADE","GOYAVE","LAMENTIN","BANANIER","CAPESTERRE BELLE EAU","SAINTE MARIE","LES MANGLES","PETIT CANAL","BOUILLANTE","PIGEON","SAINT BARTHELEMY","SAINT LOUIS","TERRE DE BAS","TERRE DE HAUT","LES ABYMES","CAPESTERRE DE MARIE GALANTE","VIEUX FORT","LES ABYMES","SAINT MARTIN","LE MOULE","PETIT BOURG","DOUVILLE","SAINTE ANNE","LE GOSIER","FORT DE FRANCE","RIVIERE PILOTE","SAINT JOSEPH","GROS MORNE","LE LORRAIN","PETIT BOURG","RIVIERE SALEE","L'AJOUPA BOUILLON","LES ANSES D'ARLETS","BASSE POINTE","GRAND RIVIERE","MACOUBA","LA TRINITE","LE CARBET","BELLEFONTAINE","CASE PILOTE","LE DIAMANT","DUCOS","LE MARIGOT","LE MORNE VERT","SAINTE ANNE","SAINTE LUCE","LES TROIS ILETS","MORNE DES ESSES","SAINTE MARIE","LE ROBERT","VERT PRE","LE LAMENTIN","SCHOELCHER","FORT DE FRANCE","LE FRANCOIS","FONDS ST DENIS","LE PRECHEUR","SAINT PIERRE","LE MORNE ROUGE","SAINT ESPRIT","LE VAUCLIN","LE MARIN","CAYENNE","KOUROU","ROURA","ST ELIE","ST GEORGES","SAUL","SINNAMARY","PAPAICHTON","APATOU","JAVOUHEY","AWALA YALIMAPO","ST LAURENT DU MARONI","CAMOPI","GRAND SANTI","POMPIDOU PAPA ICHTON","IRACOUBO","MATOURY","CACAO","KAW","REMIRE MONTJOLY","MACOURIA","MACOURIA TONATE","MONTSINERY TONNEGRANDE","MANA","MARIPASOULA","OUANARY","REGINA","BELLE PIERRE","LE BRULE","ST DENIS","ST FRANCOIS","BASSE TERRE","GRAND BOIS","MONT VERT","ST PIERRE","TERRE SAINTE","BOIS DE NEFLES ST PAUL","BRAS PANON","RIVIERE DU MAT","CILAOS","PALMISTE ROUGE","ENTRE DEUX","LA CHALOUPE","LA MONTAGNE","ST BERNARD","ST DENIS","LA PLAINE DES CAFRES","LA POSSESSION","LA RIVIERE DES GALETS","LE DOS D ANE","SAINT DENIS","STE THERESE","LE PORT","LA RIVIERE","LES MAKES","LA SALINE","LE GUILLAUME","LE PITON ST LEU","LE PLATE","LES AVIRONS","TEVELAVE","LES TROIS BASSINS","TROIS BASSINS","L ETANG SALE","L ETANG SALE LES BAINS","PETITE ILE","LE TAMPON","LES TROIS MARES","PONT D YVES","TAMPON 14EME KM","LA PLAINE DES PALMISTES","RAVINE DES CABRIS","HELL BOURG","LA POSSESSION","SALAZIE","LA SALINE LES BAINS","ST GILLES LES BAINS","BERNICA","ST GILLES LES HAUTS","TAN ROUGE","ST LEU","STE ANNE","RIVIERE DES PLUIES","ROLAND GARROS AEROPORT","STE MARIE","LE PITON STE ROSE","STE ROSE","CAMBUSTON","LA CRESSONNIERE","ST ANDRE","STE SUZANNE","BASSE VALLEE","ST PHILIPPE","ST LOUIS","BELLEMENE","ST PAUL","ST BENOIT","LES LIANES","ST JOSEPH","VINCENDO","BOIS DE NEFLES ST DENIS","LA BRETAGNE","MOUFIA","STE CLOTILDE"];
        $( "#ville" ).autocomplete({
        source: villeLst
         });
      var voieLst=["Abbaye","Agglomeration","Aire(s)","Allee(s)","Ancien chemin","Ancienne route(s)","Anse","Arcade(s)","Autoroute","Avenue","Barriere(s)","Bas chemin","Bastide","Baston","Beguinage(s)","Berge(s)","Bois","Boucle","Boulevard","Bourg","Butte","Cale","Camp","Campagne","Camping","Carre","Carreau","Carrefour","Carriere(s)","Castel","Cavee","Centre(al)","Chalet","Chapelle","Charmille","Chateau","Chaussee(s)","Chemin Rural","Chemin vicinal (aux)","Cheminement(s)","Chemin(s)","Chez","Cite(s)","Cloitre","Clos","Col","Colline(s)","Contour","Corniche(s)","Cote(au)","Cottage(s)","Cour","Cours","Darse","Degre(s)","Descente(s)","Digue(s)","Domaine(s)","Ecluse(s)","Eglise","Enceinte","Enclave","Enclos","Escalier(s)","Espace","Esplanade(s)","Faubourg","Ferme(s)","Fontaine","Fort","Forum","Fosse(s)","Foyer","Galerie(s)","Gare","Garenne","Grand boulevard","Grande(s) ensemble(s)","Grande(s) rue(s)","Grille","Grimpette","Groupement","Groupe(s)","Halle(s)","Hameau(x)","Haut(s) chemin(s)","Hippodrome","HLM","Ile","Immeuble(s)","Impasse(s)","Jardin(s)","Jetee(s)","Levee","Lieu dit","Lotissement(s)","Mail","Maison forestiere","Manoir","Marche(s)","Mas","Metro","Montee(s)","Moulin(s)","Musee","Nouvelle route","Palais","Parc(s)","Parking","Parvis","Passage","Passage a niveau","Passerelle(s)","Passe(s)","Patio","Pavillon(s)","Peripherique","Peristyle","Petite avenue","Petite impasse","Petite route","Petite rue","Petites(s) allee(s)","Place","Placis","Plage(s)","Plaine","Plan","Plateau(x)","Pointe","Pont(s)","Porche","Port","Porte","Portique(s)","Poterne","Pourtour","Pre","Presqu ile","Promenade","Quai","Quartier","Raccourci","Raidillon","Rampe","Rempart","Residence(s)","Roc(ade)","Rond point","Roquet","Rotonde","Route","Rue","Ruelle","Sente(ier)","Square","Stade","Station","Terrain","Terrasse(s)","Terre plein","Tertre(s)","Tour","Traverse","Val(lee)(lon)","Venelle(s)","Via","Vieille route","Vieux chemin","Village(s)","Villa(s)","Voie(s)","Zone","Zone a urbaniser","Zone artisanale","Zone d amenagement Concerte","Zone d amenagement Differe","Zone industrielle"];
      $( "#nomdelavoie" ).autocomplete({
        source: voieLst
         });
});
</script>
<div class="left-etape-content">
    <form action="mon-recapitulatif.php" method="POST" id="mes-coordonnees">
      <!--Adresse coordonnées-->
      <h3>Coordonnées (adresse abonnement) :</h3>
      <div class="row bottom-10">
        <div class="columns five"><label>Civilité :</label></div><div class="seven columns">
          <label class="left"><input type="radio" value="monsieur" name="civilite" class="validate[required]">Monsieur</label>
          <label class="left"><input type="radio" value="madame" name="civilite" class="validate[required]">Madame</label>
        </div>
      </div>
      <div class="row">
        <div class="columns five"><label>Nom :</label></div><div class="seven columns"><input type="text" id="nom" name="nom" class="validate[required]"></div>
      </div>
      <div class="row">
        <div class="columns five"><label>Prénom :</label></div><div class="seven columns"><input type="text" id="prenom" name="prenom" class="validate[required,custom[onlyLetterNumber]]"></div>
      </div>
      <div class="row">
        <div class="columns five"><label>Numéro de mobile :</label></div><div class="seven columns"><input type="text" id="mobile" name="mobile" class="validate[required,custom[onlyNumberSp]]"></div>
      </div>
      <div class="row">
        <div class="columns five"><label>Adresse email :</label></div><div class="seven columns"><input type="text" id="email" name="email" class="validate[required,custom[email]]"></div>
      </div>

      <!--Adresse d'installation-->
      <h3>Adresse d'installation :</h3>
      <div class="row">
        <div class="columns five"><label>Numéro :</label></div><div class="seven columns"><input type="text" id="numero" name="numero" class="validate[required,custom[onlyNumberSp]]"></div>
      </div>
      <div class="row">
        <div class="columns five"><label>Nom de la voie :</label></div><div class="seven columns"><input type="text" id="nomdelavoie" name="NomDeLaVoie" class="validate[required]"></div>
      </div>
      <div class="row">
        <div class="columns five"><label>Complement d'adresse, étage, digicode... :</label></div><div class="seven columns"><input type="text" id="complement" name="complement" class="validate[required]"></div>
      </div>
      <div class="row">
        <div class="columns five"><label>Code postal :</label></div><div class="seven columns"><input type="text" id="codepostal" name="codepostal" class="validate[required]"></div>
      </div>
      <div class="row">
        <div class="columns five"><label>Ville :</label></div><div class="seven columns"><input type="text" id="ville" name="ville" class="validate[required]"></div>
      </div>

      <!--Adresse de livraison-->
      <h3>Adresse de livraison :</h3>
      <div class="row">
        <div class="column twelve bottom-10">
        <label>
          <input type="checkbox" value="identique" name="identique" checked ="checked">
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
          <input type="text" id="email_mediaserv" name="email_mediaserv" class="validate[required]"><span class="input-info">rassurez-vous, nous n'aimons pas non plus le SPAM</span>
        </div>
        <div class="column three"> 
          <span class="postfix">@mediaserv.net</span>
        </div>
        <div class="column three"> 
          <input type="button" onclick ="javascript:verifMailWebSev();" name="VerifierEmail" value="Vérifier" class="rmv-std-btn btn-verifier">
        </div>
        <div class="column twelve top-20">
          <label>Veuillez précisez une autre adresse de messagerie</label>
          <input type="text" name="email" class="validate[required,custom[email]] six">
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
</div>