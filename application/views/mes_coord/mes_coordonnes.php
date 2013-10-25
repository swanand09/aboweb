<?php 
echo validation_errors();

?>
<script>  
    /*
   $(function() {
        var villeLst=["BASSE TERRE","POINTE A PITRE","MORNE A L'EAU","GRAND BOURG","GOURBEYRE","TROIS RIVIERES","SAINTE ROSE","POINTE NOIRE","PORT LOUIS","SAINT FRANCOIS","VIEUX HABITANTS","SAINT CLAUDE","ANSE BERTRAND","BAIE-MAHAULT","BAILLIF","BOUILLANTE","DESHAIES","LA DESIRADE","GOYAVE","LAMENTIN","BANANIER","CAPESTERRE BELLE EAU","SAINTE MARIE","LES MANGLES","PETIT CANAL","BOUILLANTE","PIGEON","SAINT BARTHELEMY","SAINT LOUIS","TERRE DE BAS","TERRE DE HAUT","LES ABYMES","CAPESTERRE DE MARIE GALANTE","VIEUX FORT","LES ABYMES","SAINT MARTIN","LE MOULE","PETIT BOURG","DOUVILLE","SAINTE ANNE","LE GOSIER","FORT DE FRANCE","RIVIERE PILOTE","SAINT JOSEPH","GROS MORNE","LE LORRAIN","PETIT BOURG","RIVIERE SALEE","L'AJOUPA BOUILLON","LES ANSES D'ARLETS","BASSE POINTE","GRAND RIVIERE","MACOUBA","LA TRINITE","LE CARBET","BELLEFONTAINE","CASE PILOTE","LE DIAMANT","DUCOS","LE MARIGOT","LE MORNE VERT","SAINTE ANNE","SAINTE LUCE","LES TROIS ILETS","MORNE DES ESSES","SAINTE MARIE","LE ROBERT","VERT PRE","LE LAMENTIN","SCHOELCHER","FORT DE FRANCE","LE FRANCOIS","FONDS ST DENIS","LE PRECHEUR","SAINT PIERRE","LE MORNE ROUGE","SAINT ESPRIT","LE VAUCLIN","LE MARIN","CAYENNE","KOUROU","ROURA","ST ELIE","ST GEORGES","SAUL","SINNAMARY","PAPAICHTON","APATOU","JAVOUHEY","AWALA YALIMAPO","ST LAURENT DU MARONI","CAMOPI","GRAND SANTI","POMPIDOU PAPA ICHTON","IRACOUBO","MATOURY","CACAO","KAW","REMIRE MONTJOLY","MACOURIA","MACOURIA TONATE","MONTSINERY TONNEGRANDE","MANA","MARIPASOULA","OUANARY","REGINA","BELLE PIERRE","LE BRULE","ST DENIS","ST FRANCOIS","BASSE TERRE","GRAND BOIS","MONT VERT","ST PIERRE","TERRE SAINTE","BOIS DE NEFLES ST PAUL","BRAS PANON","RIVIERE DU MAT","CILAOS","PALMISTE ROUGE","ENTRE DEUX","LA CHALOUPE","LA MONTAGNE","ST BERNARD","ST DENIS","LA PLAINE DES CAFRES","LA POSSESSION","LA RIVIERE DES GALETS","LE DOS D ANE","SAINT DENIS","STE THERESE","LE PORT","LA RIVIERE","LES MAKES","LA SALINE","LE GUILLAUME","LE PITON ST LEU","LE PLATE","LES AVIRONS","TEVELAVE","LES TROIS BASSINS","TROIS BASSINS","L ETANG SALE","L ETANG SALE LES BAINS","PETITE ILE","LE TAMPON","LES TROIS MARES","PONT D YVES","TAMPON 14EME KM","LA PLAINE DES PALMISTES","RAVINE DES CABRIS","HELL BOURG","LA POSSESSION","SALAZIE","LA SALINE LES BAINS","ST GILLES LES BAINS","BERNICA","ST GILLES LES HAUTS","TAN ROUGE","ST LEU","STE ANNE","RIVIERE DES PLUIES","ROLAND GARROS AEROPORT","STE MARIE","LE PITON STE ROSE","STE ROSE","CAMBUSTON","LA CRESSONNIERE","ST ANDRE","STE SUZANNE","BASSE VALLEE","ST PHILIPPE","ST LOUIS","BELLEMENE","ST PAUL","ST BENOIT","LES LIANES","ST JOSEPH","VINCENDO","BOIS DE NEFLES ST DENIS","LA BRETAGNE","MOUFIA","STE CLOTILDE"];
        $( "#ville" ).autocomplete({
        source: villeLst
         });
      var voieLst=["Abbaye","Agglomeration","Aire(s)","Allee(s)","Ancien chemin","Ancienne route(s)","Anse","Arcade(s)","Autoroute","Avenue","Barriere(s)","Bas chemin","Bastide","Baston","Beguinage(s)","Berge(s)","Bois","Boucle","Boulevard","Bourg","Butte","Cale","Camp","Campagne","Camping","Carre","Carreau","Carrefour","Carriere(s)","Castel","Cavee","Centre(al)","Chalet","Chapelle","Charmille","Chateau","Chaussee(s)","Chemin Rural","Chemin vicinal (aux)","Cheminement(s)","Chemin(s)","Chez","Cite(s)","Cloitre","Clos","Col","Colline(s)","Contour","Corniche(s)","Cote(au)","Cottage(s)","Cour","Cours","Darse","Degre(s)","Descente(s)","Digue(s)","Domaine(s)","Ecluse(s)","Eglise","Enceinte","Enclave","Enclos","Escalier(s)","Espace","Esplanade(s)","Faubourg","Ferme(s)","Fontaine","Fort","Forum","Fosse(s)","Foyer","Galerie(s)","Gare","Garenne","Grand boulevard","Grande(s) ensemble(s)","Grande(s) rue(s)","Grille","Grimpette","Groupement","Groupe(s)","Halle(s)","Hameau(x)","Haut(s) chemin(s)","Hippodrome","HLM","Ile","Immeuble(s)","Impasse(s)","Jardin(s)","Jetee(s)","Levee","Lieu dit","Lotissement(s)","Mail","Maison forestiere","Manoir","Marche(s)","Mas","Metro","Montee(s)","Moulin(s)","Musee","Nouvelle route","Palais","Parc(s)","Parking","Parvis","Passage","Passage a niveau","Passerelle(s)","Passe(s)","Patio","Pavillon(s)","Peripherique","Peristyle","Petite avenue","Petite impasse","Petite route","Petite rue","Petites(s) allee(s)","Place","Placis","Plage(s)","Plaine","Plan","Plateau(x)","Pointe","Pont(s)","Porche","Port","Porte","Portique(s)","Poterne","Pourtour","Pre","Presqu ile","Promenade","Quai","Quartier","Raccourci","Raidillon","Rampe","Rempart","Residence(s)","Roc(ade)","Rond point","Roquet","Rotonde","Route","Rue","Ruelle","Sente(ier)","Square","Stade","Station","Terrain","Terrasse(s)","Terre plein","Tertre(s)","Tour","Traverse","Val(lee)(lon)","Venelle(s)","Via","Vieille route","Vieux chemin","Village(s)","Villa(s)","Voie(s)","Zone","Zone a urbaniser","Zone artisanale","Zone d amenagement Concerte","Zone d amenagement Differe","Zone industrielle"];
      $( "#nomdelavoie" ).autocomplete({
        source: voieLst
         });
        
}); */
</script>
<div class="left-etape-content">
    <form action="recapitulatif" method="POST" id="mes-coordonnees">
      <!--Adresse coordonnées-->
        <div class="adresse-abonnement">
          <h3>COORDONNÉES (ADRESSES ABONNEMENT):</h3>
         <!-- Civilité-->
          <div class="row">
            <div class="columns bottom-10"><label>Civilité:</label></div>
            <div class="columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="M.")?"checked='checked'":"";?> class="validate[required]">M.</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="Mme")?"checked='checked'":"";?> class="validate[required]">Mme</label>
              <label class="left"><input type="radio" value="Melle" name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="Melle")?"checked='checked'":"";?> class="validate[required]">Melle</label>
            </div>
          </div>
          <div class="row">
            <div class="columns"><label>Nom :</label></div><div class="five columns end"><input type="text" name="nom_aa" value="<?php echo set_value("nom_aa",$nom_aa);?>" class="validate[required,maxSize[30]] nom"></div>
          </div>
          <!--Prénom -->
          <div class="row">
            <div class="columns"><label>Prénom :</label></div><div class="five columns end"><input type="text" name="prenom_aa" value="<?php echo set_value("prenom_aa",$prenom_aa);?>" class="validate[required,maxSize[30]] prenom"></div>
          </div>
          <!--Numéro & Complément numéro-->
          <div class="row">
            <div class="columns"><label>Numéro :</label></div><div class="two columns"><input type="text" name="numero_aa" value="<?php echo set_value("numero_aa",$numero_aa);?>"  class="validate[required,maxSize[5]] numero"></div>
            <div class="columns"><label>Complément numéro :</label></div><div class="two columns end"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" value="<?php echo set_value("comp_numero_aa",$comp_numero_aa);?>" name="comp_numero_aa" class="comp_numero ui-autocomplete-input" autocomplete="off"></div>              
          </div>
          <!--Type Voie-->
          <div class="row">
            <div class="columns"><label>Type de Voie :</label></div><div class="columns two"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" value="<?php echo set_value("type_voie_aa",$type_voie_aa);?>" name="type_voie_aa" class="type_voie ui-autocomplete-input" autocomplete="off"></div>
            <div class="columns"><label>Voie :</label></div><div class="three columns end"><input type="text" name="voie_aa" value="<?php echo set_value("voie_aa",$voie_aa);?>" class="validate[required,maxSize[200]] voie"></div>
          </div>
          <!--Addresse suite-->
          <div class="row">
            <div class="columns"><label>Adresse suite :</label></div><div class="five columns end"><input type="text" name="adresse_suite_aa" value="<?php echo set_value("adresse_suite_aa",$adresse_suite_aa);?>" class="validate[maxSize[64]] adresse_suite"></div>
          </div>
          <!--Ensemble-->
          <div class="row">
            <div class="columns"><label>Ensemble</label></div><div class="columns five end"><input type="text" name="ensemble_aa" value="<?php echo set_value("ensemble_aa",$ensemble_aa);?>" class="validate[maxSize[20]] ensemble"></div>
          </div>
          <!--Batiment-->
          <div class="row">
            <div class="columns"><label>Batiment :</label></div><div class="columns five end"><input type="text" name="batiment_aa" value="<?php echo set_value("batiment_aa",$batiment_aa);?>" class="validate[maxSize[4]] batiment"></div>
          </div>
          <!--Escalier & Etage-->
          <div class="row">
            <div class="columns"><label>Escalier :</label></div><div class="columns five"><input type="text" size="2" name="escalier_aa" value="<?php echo set_value("escalier_aa",$escalier_aa);?>" class="validate[maxSize[2]] escalier"></div>
            <div class="columns"><label>Etage :</label></div><div class="columns two end"><input type="text" size="2" name="etage_aa" value="<?php echo set_value("etage_aa",$etage_aa);?>" class="validate[maxSize[2]] etage"></div>
          </div>
          <!--Porte & logo-->
          <div class="row">
            <div class="columns"><label>Porte :</label></div><div class="columns two"><input type="text" name="porte_aa" value="<?php echo set_value("porte_aa",$porte_aa);?>" class="validate[maxSize[5]] porte"></div>
            <div class="columns"><label>Logo :</label></div><div class="columns three end"><input type="text" name="logo_aa" value="<?php echo set_value("logo_aa",$logo_aa);?>" class="validate[maxSize[5]] logo"></div>
          </div>
          <!--Code postal & Ville -->
          <div class="row">
            <div class="columns"><label>Code postal :</label></div>
            <div class="columns"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="codepostal" name="code_postal_aa" value="<?php echo set_value("code_postal_aa",$code_postal_aa);?>" class="validate[required] code_postal ui-autocomplete-input" autocomplete="off"></div>
            <div class="columns"><label>Ville :</label></div>
            <div class="columns end"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="ville" name="ville_aa" value="<?php echo set_value("ville_aa",$ville_aa);?>" class="validate[required] ville ui-autocomplete-input" autocomplete="off"></div>
          </div>
          <h3 class="lfsection_space">TÉLÉPHONES</h3>
          <div class="row">
            <div class="columns"><label>Téléphone portable :</label></div><div class="columns end"><input type="text" name="telephone_portable" value="<?php echo set_value("telephone_portable",$telephone_portable);?>" class="validate[required] telephone telephone_portable"></div>
          </div>
          <div class="row">
            <div class="columns"><label>Téléphone de bureau :</label></div><div class="columns end"><input type="text" name="telephone_bureau" value="<?php echo set_value("telephone_bureau",$telephone_bureau);?>" class="telephone_bureau telephone"></div>
          </div>
          <div class="row">
            <div class="columns"><label>Téléphone du domicile :</label></div><div class="columns end"><input type="text" name="telephone_domicile" value="<?php echo set_value("telephone_domicile",$telephone_domicile);?>" class="telephone_domicile telephone"></div>
          </div>
        </div>
      <!--adresse de facturation-->
        <h3 class="lfsection_space">Adresse de facturation</h3>
        <div class="row">
          <div class="column twelve bottom-10">
            <label>
              <input type="checkbox" value="true" name="check_adresse_facturation" <?php echo empty($check_adresse_facturation)?"checked='checked'":"";?> id="check-adresse-facturation">
              Identique à l'adresse d'installation
            </label>
          </div>
        </div>

        <div class="adresse-facturation hide">
         <!-- Civilité-->
          <div class="row">
            <div class="columns bottom-10"><label>Civilité:</label></div>
            <div class="columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_af" class="validate[required]">M.</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_af" class="validate[required]">Mme</label>
              <label class="left"><input type="radio" value="Melle" name="civilite_af" class="validate[required]">Melle</label>
            </div>
          </div>
          <!-- Nom -->
          <div class="row">
            <div class="columns"><label>Nom :</label></div><div class="five columns end"><input type="text" name="nom_af" value="<?php echo set_value("nom_af",$nom_af);?>" class="validate[required,maxSize[30]] nom"></div>
          </div>
          <!--Prénom -->
          <div class="row">
            <div class="columns"><label>Prénom :</label></div><div class="five columns end"><input type="text" name="prenom_af" value="<?php echo set_value("prenom_af",$prenom_af);?>" class="validate[required,maxSize[30]] prenom"></div>
          </div>
          <!--Numéro & Complément numéro-->
          <div class="row">
            <div class="columns"><label>Numéro :</label></div><div class="two columns"><input type="text" name="numero_af" value="<?php echo set_value("numero_af",$numero_af);?>" class="numero"></div>
            <div class="columns"><label>Complément numéro :</label></div><div class="two columns end"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" value="<?php echo set_value("comp_numero_af",$comp_numero_af);?>" name="comp_numero_af" class="comp_numero ui-autocomplete-input" autocomplete="off"></div>              
          </div>
          <!--Type Voie & Voie-->
          <div class="row">
            <div class="columns"><label>Type de Voie :</label></div><div class="columns two"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" value="<?php echo set_value("type_voie_af",$type_voie_af);?>" name="type_voie_af" class="validate[required] type_voie ui-autocomplete-input" autocomplete="off"></div>
            <div class="columns"><label>Voie :</label></div><div class="three columns end"><input type="text" name="voie_af" value="<?php echo set_value("voie_af",$voie_af);?>" class="validate[required,maxSize[32]] voie"></div>
          </div>
          <!--Addresse suite-->
          <div class="row">
            <div class="columns"><label>Adresse suite :</label></div><div class="five columns end"><input type="text" name="adresse_suite_af" value="<?php echo set_value("adresse_suite_af",$adresse_suite_af);?>" class="validate[maxSize[30]] adresse_suite"></div>
          </div>
          <!--Code postal & Ville -->
          <div class="row">
            <div class="columns"><label>Code postal :</label></div>
            <div class="columns"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="codepostal2" name="code_postal_af" value="<?php echo set_value("code_postal_af",$code_postal_af);?>" class="validate[required] code_postal ui-autocomplete-input" autocomplete="off"></div>
            <div class="columns"><label>Ville :</label></div>
            <div class="columns end"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="ville2" name="ville_af" value="<?php echo set_value("ville_af",$ville_af);?>" class="validate[required] ville ui-autocomplete-input" autocomplete="off"></div>
          </div>
        </div>


        <!--Adresse de livraison-->
        <h3 class="lfsection_space">Adresse de livraison :</h3>
        <div class="row">
          <div class="column twelve bottom-10">
            <label>
              <input type="checkbox" value="true" name="check_adresse_livraison" <?php echo empty($check_adresse_livraison)?"checked='checked'":"";?> id="check-adresse-livraison">
              Identique à l'adresse d'installation
            </label>
          </div>
        </div>
        <!--adresse de livraison-->
        <div class="adresse-livraison hide">
         <!-- Civilité-->
          <div class="row">
            <div class="columns bottom-10"><label>Civilité:</label></div>
            <div class="five columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_al" class="validate[required]">M.</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_al" class="validate[required]">Mme</label>
              <label class="left"><input type="radio" value="Melle" name="civilite_al" class="validate[required]">Melle</label>
            </div>
          </div>
          <!-- Nom -->
          <div class="row">
            <div class="columns"><label>Nom :</label></div><div class="five columns end"><input type="text" name="nom_al" value="<?php echo set_value("nom_al",$nom_al);?>" class="validate[required,maxSize[30]] nom"></div>
          </div>
          <!--Prénom -->
          <div class="row">
            <div class="columns"><label>Prénom :</label></div><div class="five columns end"><input type="text" name="prenom_al" value="<?php echo set_value("prenom_al",$prenom_al);?>" class="validate[required,maxSize[30]] prenom"></div>
          </div>
          <!--Numéro & Complément numéro-->
          <div class="row">
            <div class="columns"><label>Numéro :</label></div><div class="two columns"><input type="text" name="numero_al" value="<?php echo set_value("numero_al",$numero_al);?>" class="numero"></div>
            <div class="columns"><label>Complément numéro:</label></div><div class="two columns end"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" name="comp_numero_al" value="<?php echo set_value("comp_numero_al",$comp_numero_al);?>" class="comp_numero ui-autocomplete-input" autocomplete="off"></div>              
          </div>
          <!--Type Voie-->
          <div class="row">
            <div class="columns"><label>Type de Voie :</label></div><div class="columns two"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" name="type_voie_al" value="<?php echo set_value("type_voie_al",$type_voie_al);?>" class="validate[required] type_voie ui-autocomplete-input" autocomplete="off"></div>
            <div class="columns"><label>Voie :</label></div><div class="columns end"><input type="text" name="voie_al" class="validate[requiredmaxSize[200]] voie"></div>
          </div>
          <!--Addresse suite-->
          <div class="row">
            <div class="columns"><label>Adresse suite :</label></div><div class="five columns end"><input type="text" name="adresse_suite_al" value="<?php echo set_value("adresse_suite_al",$adresse_suite_al);?>" class="validate[maxSize[64]] adresse_suite"></div>
          </div>
          <!--Ensemble-->
          <div class="row">
            <div class="columns"><label>Ensemble</label></div><div class="columns five end"><input type="text" name="ensemble_al" value="<?php echo set_value("ensemble_al",$ensemble_al);?>" class="validate[maxSize[20]] ensemble"></div>
          </div>
          <!--Batiment-->
          <div class="row">
            <div class="columns"><label>Batiment :</label></div><div class="columns five end"><input type="text" name="batiment_al" value="<?php echo set_value("batiment_al",$batiment_al);?>" class="validate[maxSize[4]] batiment"></div>
          </div>
          <!--Escalier & Etage-->
          <div class="row">
            <div class="columns"><label>Escalier :</label></div><div class="columns five"><input type="text" name="escalier_al" value="<?php echo set_value("escalier_al",$escalier_al);?>" class="validate[maxSize[2]] escalier"></div>
            <div class="columns"><label>Etage :</label></div><div class="columns two end"><input type="text" name="etage_al" value="<?php echo set_value("etage_al",$etage_al);?>" class="validate[maxSize[2]] etage"></div>
          </div>
          <!--Porte & logo-->
          <div class="row">
            <div class="columns"><label>Porte :</label></div><div class="columns two"><input type="text" name="porte_al" value="<?php echo set_value("porte_al",$porte_al);?>" class="validate[required,maxSize[30]] porte"></div>
            <div class="columns"><label>Logo :</label></div><div class="columns three end"><input type="text" name="logo_al" value="<?php echo set_value("logo_al",$logo_al);?>" class="validate[required,maxSize[30]] logo"></div>
          </div>
          <!--Code postal & Ville -->
          <div class="row">
            <div class="columns"><label>Code postal :</label></div>
            <div class="columns"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="codepostal3" name="code_postal_al" value="<?php echo set_value("code_postal_al",$code_postal_al);?>" class="validate[required] code_postal ui-autocomplete-input" autocomplete="off"></div>
            <div class="columns"><label>Ville :</label></div>
            <div class="columns end"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="ville3" name="ville_al" value="<?php echo set_value("ville_al",$ville_al);?>" class="validate[required] ville ui-autocomplete-input" autocomplete="off"></div>
          </div>
        </div>
        <!--end of adresse de livraison-->
        <div class="row">
           <div class="column twelve bottom-10">
            <label>
              <input type="checkbox" value="true" name="livraison_express" <?php echo !empty($livraison_express)?"checked='checked'":"";?> class="left">
              Je souhaite bénéficier gratuitement d'une livraison express (72 heures à partir du traitement de votre commande).<br>
            </label>
            <span class="top-10 column"><strong>IMPORTANT :</strong> dans ce cas je renonce à exercer mon droit de rétractation dans les 7 jours suivant achats.</span>
          </div>
        </div>

          <!--adresse principale-->
          <h3 class="lfsection_space">Adresse de messagerie principale :</h3>
          <div class="row">
            <div class="column twelve bottom-10">
              <label>Vous bénéficiez d’un compte e-mail médiaserv<br> avec une messagerie de 100 mo</label>
            </div>
            <div class="column six"> 
              <input type="text" id="email_mediaserv" name="email_mediaserv" value="<?php echo set_value("email_mediaserv",$email_mediaserv);?>" class="validate[required]"><span class="input-info">rassurez-vous, nous n'aimons pas non plus le SPAM</span>
            </div>
            <div class="column three"> 
              <span class="postfix">@mediaserv.net</span>
            </div>
            <div class="column three"> 
              <input type="button" name="VerifierEmail" onclick ="javascript:verifMailWebServ();" value="Vérifier" class="rmv-std-btn btn-verifier">
            </div>
            <div class="column twelve top-20">
              <label>Veuillez précisez une autre adresse de messagerie</label>
              <input type="text" name="email" value="<?php echo set_value("email",$email);?>" class="validate[required,custom[email]] six">
            </div>
          </div>

          <!--type de facturation-->
          <h3>Type de facturation :</h3>
          <div class="row">
             <?php if(!empty($type_de_facturation)){ ?>
            <div class="column four"><label><input type="radio" value="Electronique (gratuit)" name="type_de_facturation"  <?php echo (set_value("type_de_facturation",$type_de_facturation)=="Electronique (gratuit)")?"checked='checked'":"";?>> Electronique (gratuit)</label></div>
            <div class="column four end"> <label><input type="radio" value="papier(1,5€)" name="type_de_facturation" <?php echo (set_value("type_de_facturation",$type_de_facturation)=="papier(1,5€)")?"checked='checked'":"";?>> Facture papier(1,5€)</label></div>            
             <?php }else{ ?>
            <div class="column four"><label><input type="radio" value="Electronique (gratuit)" name="type_de_facturation"  checked="checked"> Electronique (gratuit)</label></div>
            <div class="column four end"> <label><input type="radio" value="papier(1,5€)" name="type_de_facturation"> Facture papier(1,5€)</label></div>            
             <?php } ?>
<!--            <div class="column four"> </div>-->
          </div>
          
          <!-- Sexy line -->
          <hr class="sexy">

          <!--back and submit buttom -->
          <div class="six custom-column back-button left"><a title="Précédent" href="mon_offre" class="precedent">Précédent</a></div>
          <div class="six custom-column text-right"> <input type="submit" value="SUIVANT" name="suivant" class="btn-forward rmv-std-btn"></div>
        </form>
</div>