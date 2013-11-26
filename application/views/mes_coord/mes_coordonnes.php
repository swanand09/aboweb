<?php 
echo validation_errors();

//facturation
 $facture_papier = '<span class="prix">('.$facture_tarif.'€)</span>';
 if($facture_duree_promo>0){
   $facture_papier = '<span class="promo">('.$facture_tarif.'€)</span> <span class="prix">('.$facture_tarif_promo.'€)</span>';
 }
 $facture_tarif2 = ($facture_tarif>$facture_tarif_promo)?$facture_tarif_promo:$facture_tarif;
 if(!empty($type_de_facturation)){
    $facture_data   = explode("_",set_value("type_de_facturation",$type_de_facturation));
    $check_electronic = ($facture_data[1]=="electronique")?"checked='checked'":"";
    $check_papier = ($facture_data[1]=="papier")?"checked='checked'":"";
 }
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
        <input type="hidden" name="page_3" value="mes_coordonnes" />
      <!--Adresse coordonnées-->
        <div class="adresse-abonnement">
          <h3>COORDONNÉES (ADRESSES ABONNEMENT):</h3>
         <!-- Civilité-->
          <div class="row">
            <div class="columns two bottom-10"><label>Civilité:</label></div>
            <div class="columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="M.")?"checked='checked'":"";?> class="validate[required]">M.</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="Mme")?"checked='checked'":"";?> class="validate[required]">Mme</label>
              <label class="left"><input type="radio" value="Melle" name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="Melle")?"checked='checked'":"";?> class="validate[required]">Melle</label>
            </div>
          </div>
         
         <!-- Société -->
         <div class='row'>
           <div class='columns two'><label>Société :</label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] societe' name='societe_aa' /></div>
         </div>

         <!-- Nom -->
          <div class="row">
            <div class='columns two'><label>Nom :</label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] nom' name='nom_aa' value="<?php echo set_value("nom_aa",$nom_aa);?>" /></div>
          </div>
          <!--Prénom -->
          <div class="row">
            <div class='columns two'><label>Prénom :</label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] prenom' name='prenom_aa' value="<?php echo set_value("prenom_aa",$prenom_aa);?>" /></div>
          </div>
          <!--Numéro & Complément numéro-->
          <div class="row">
            <div class='columns two'><label>Numéro :</label></div><div class='two columns'><input type='text' class='validate[required,maxSize[5]] numero' value="<?php echo set_value("numero_aa",$numero_aa);?>" name='numero_aa' /></div>
            <div class='columns two'><label>Complément numéro :</label></div><div class='two columns'><input type='text' class='comp_numero' name='comp_numero_aa' value="<?php echo set_value("comp_numero_aa",$comp_numero_aa);?>" /></div>              
            <div class='columns two'><label>Type de Voie :</label></div><div class='columns two'><input type='text' class='type_voie' name='type_voie_aa' value="<?php echo set_value("type_voie_aa",$type_voie_aa);?>" /></div>
          </div>
          
          <!--Ensemble & Batiment & Escalier-->
          <div class="row">
            <div class='columns two'><label>Ensemble</label></div><div class='columns two'><input type='text' class='validate[maxSize[20]] ensemble' value="<?php echo set_value("ensemble_aa",$ensemble_aa);?>" name='ensemble_aa' /></div>
            <div class='columns two'><label>Batiment :</label></div><div class='columns two'><input type='text' class='validate[maxSize[4]] batiment' name='batiment_aa' value="<?php echo set_value("batiment_aa",$batiment_aa);?>" /></div>
            <div class='columns two'><label>Escalier :</label></div><div class='columns two'><input type='text' class='validate[maxSize[2]] escalier' value="<?php echo set_value("escalier_aa",$escalier_aa);?>" name='escalier_aa' size='2' /></div>
          </div>
          
          <!--Etage & Porte & logo-->
          <div class="row">
            <div class='columns two'><label>Etage :</label></div><div class='columns two'><input type='text' class='validate[maxSize[2]] etage' name='etage_aa' value="<?php echo set_value("etage_aa",$etage_aa);?>" size='2' /></div>
            <div class='columns two'><label>Porte :</label></div><div class='columns two'><input type='text' class='validate[maxSize[5]] porte' name='porte_aa' value="<?php echo set_value("porte_aa",$porte_aa);?>" /></div>
            <div class='columns two'><label>Logo :</label></div><div class='columns two'><input type='text' class='validate[maxSize[5]] logo' name='logo_aa' value="<?php echo set_value("logo_aa",$logo_aa);?>" /></div>
          </div> 
          
          <!--Addresse-->
          <div class="row">
            <div class='columns two'><label>Adresse :</label></div><div class='ten columns'><input type='text' class='validate[maxSize[64]] adresse_suite' name='adresse_suite_aa' value="<?php echo set_value("adresse_suite_aa",$adresse_suite_aa);?>" /></div>
          </div>
          
          <!--Code postal & Ville & Localisation-->
           <div class="row">
                <div class='columns two'><label>Code postal :</label></div>
                <div class='columns two'><input type='text' class='validate[required] code_postal' name='code_postal_aa' value="<?php echo set_value("code_postal_aa",$code_postal_aa);?>" id='codepostal'/></div>
                <div class='columns one'><label>Ville :</label></div>
                <div class='columns two'><input type='text' class='validate[required] ville' name='ville_aa' value="<?php echo set_value("ville_aa",$ville_aa);?>" id='ville'/></div>
                <div class='columns one'><label>Localisation :</label></div>
                <div class='columns three'><input type='text' class='validate[required] code_postal' name='localisation_aa' id='localisation'/></div>
          </div>
          
          
          <!--Type Voie-->
<!--          <div class="row">
            <div class="columns"><label>Type de Voie :</label></div><div class="columns two"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" value="<?php //echo set_value("type_voie_aa",$type_voie_aa);?>" name="type_voie_aa" class="type_voie ui-autocomplete-input" autocomplete="off"></div>
            <div class="columns"><label>Voie :</label></div><div class="three columns end"><input type="text" name="voie_aa" value="<?php //echo set_value("voie_aa",$voie_aa);?>" class="validate[required,maxSize[200]] voie"></div>
          </div>-->
 
         
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
                <?php //if(empty($check_adresse_facturation)){ ?>
              <input type="checkbox" value="check adresse facturation" name="check_adresse_facturation" <?php echo !empty($check_adresse_facturation)?"checked='checked'":"";?> id="check-adresse-facturation">
                <?php //}else{ ?>
        <!--  <input type="checkbox" value="check adresse facturation" name="check_adresse_facturation" checked="checked" id="check-adresse-facturation">-->
                <?php //} ?>
              Identique à l'adresse d'installation
            </label>
          </div>
        </div>

        <div class="adresse-facturation hide">
         <!-- Civilité-->
          <div class="row">
            <div class="columns bottom-10 two"><label>Civilité:</label></div>
            <div class="columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_af" <?php echo (set_value("civilite_af",$civilite_af)=="M.")?"checked='checked'":"";?> class="validate[required]">M.</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_af" <?php echo (set_value("civilite_af",$civilite_af)=="Mme")?"checked='checked'":"";?> class="validate[required]">Mme</label>
              <label class="left"><input type="radio" value="Melle" name="civilite_af" <?php echo (set_value("civilite_af",$civilite_af)=="Melle")?"checked='checked'":"";?> class="validate[required]">Melle</label>
            </div>
          </div>
          <!-- société -->
          <div class='row'>
            <div class='columns two'><label>Société :</label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] societe' name='societe_af' /></div>
          </div>
          <!-- Nom -->
          <div class="row">
             <div class='columns two'><label>Nom :</label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] nom' name='nom_af' value="<?php echo set_value("nom_af",$nom_af);?>" /></div>
          </div>
          <!--Prénom -->
          <div class="row">
             <div class='columns two'><label>Prénom :</label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] prenom' name='prenom_af' value="<?php echo set_value("prenom_af",$prenom_af);?>" /></div>
          </div>
          <!--Numéro & Complément numéro-->
          <div class="row">
            <div class="columns two"><label>Numéro :</label></div><div class="two columns"><input type="text" name="numero_af" value="<?php echo set_value("numero_af",$numero_af);?>" class="numero"></div>
            <div class="columns two"><label>Complément numéro :</label></div><div class="two columns end"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" value="<?php echo set_value("comp_numero_af",$comp_numero_af);?>" name="comp_numero_af" class="comp_numero ui-autocomplete-input"></div>              
            <div class='columns two'><label>Type de Voie :</label></div><div class='columns two'><input type='text' class='validate[required] type_voie' name='type_voie_af' value="<?php echo set_value("type_voie_af",$type_voie_af);?>" /></div>
          </div>
          
          <!--Addresse suite-->
          <div class="row">
            <div class='columns two'><label>Adresse :</label></div><div class='ten columns end'><input type='text' class='validate[maxSize[30]] adresse_suite' name='adresse_suite_af' value="<?php echo set_value("adresse_suite_af",$adresse_suite_af);?>" /></div>
          </div>
          <!--Type Voie & Voie-->
<!--          <div class="row">            
            <div class="columns two"><label>Voie :</label></div><div class="three columns end"><input type="text" name="voie_af" value="<?php //echo set_value("voie_af",$voie_af);?>" class="validate[required,maxSize[32]] voie"></div>
          </div>-->
          
          <!--Code postal & Ville -->
          <div class="row">
            <div class='columns two'><label>Code postal :</label></div>
            <div class='columns two'><input type='text' class='validate[required] code_postal' name='code_postal_af' value="<?php echo set_value("code_postal_af",$code_postal_af);?>" id='codepostal2' /></div>
            <div class='columns one'><label>Ville :</label></div>
            <div class='columns two'><input type='text' class='validate[required] ville' name='ville_af' value="<?php echo set_value("ville_af",$ville_af);?>" id='ville2' /></div>
            <div class='columns two'><label>Localisation :</label></div>
            <div class='columns three'><input type='text' class='validate[required] code_postal' name='localisation_aa' id='localisation_af'/></div>
          </div>
        </div>


        <!--Adresse de livraison-->
        <h3 class="lfsection_space">Adresse de livraison :</h3>
        <div class="row">
          <div class="column twelve bottom-10">
            <label>
             <?php //if(!empty($check_adresse_livraison)){ ?>
              <input type="checkbox" value="check adresse livraison" name="check_adresse_livraison" <?php echo !empty($check_adresse_livraison)?"checked='checked'":"";?> id="check-adresse-livraison">
             <?php //}else{ ?> 
<!--              <input type="checkbox" value="check adresse livraison" name="check_adresse_livraison" checked="checked" id="check-adresse-livraison">-->
             <?php ///} ?>
              Identique à l'adresse d'installation
            </label>
          </div>
        </div>
        <!--adresse de livraison-->
        <div class="adresse-livraison hide">
         <!-- Civilité-->
          <div class="row">
            <div class="columns bottom-10 two"><label>Civilité:</label></div>
            <div class="five columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_al" <?php echo (set_value("civilite_al",$civilite_al)=="M.")?"checked='checked'":"";?> class="validate[required]">M.</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_al" <?php echo (set_value("civilite_al",$civilite_al)=="Mme")?"checked='checked'":"";?> class="validate[required]">Mme</label>
              <label class="left"><input type="radio" value="Melle" name="civilite_al" <?php echo (set_value("civilite_al",$civilite_al)=="Melle")?"checked='checked'":"";?> class="validate[required]">Melle</label>
            </div>
          </div>
          <!--societé-->
          <div class='row'>
            <div class='columns two'><label>Société :</label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] societe' name='societe_al' /></div>
          </div>
          
          <!-- Nom -->
          <div class='row'>
            <div class='columns two'><label>Nom :</label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] nom' name='nom_al' value="<?php echo set_value("nom_al",$nom_al);?>" /></div>
          </div>
          <!--Prénom -->
          <div class='row'>
            <div class='columns two'><label>Prénom :</label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] prenom' name='prenom_al' value="<?php echo set_value("prenom_al",$prenom_al);?>" /></div>
          </div>
          
          
          <!--Numéro & Complément numéro 7 type de voie-->
          <div class='row'>
            <div class='columns two'><label>Numéro :</label></div><div class='two columns'><input type='text' class='numero' name='numero_al' value="<?php echo set_value("numero_al",$numero_al);?>" /></div>
            <div class='columns two'><label>Complément numéro:</label></div><div class='two columns'><input type='text' class='comp_numero' name='comp_numero_al' value="<?php echo set_value("comp_numero_al",$comp_numero_al);?>" /></div>              
            <div class='columns two'><label>Type de Voie :</label></div><div class='columns two'><input type='text' class='validate[required] type_voie' name='type_voie_al' value="<?php echo set_value("type_voie_al",$type_voie_al);?>" /></div>
          </div>
          
          <!--Addresse-->
          <div class='row'>
            <div class='columns two'><label>Adresse :</label></div><div class='ten columns end'><input type='text' class='validate[maxSize[64]] adresse_suite' name='adresse_suite_al' value="<?php echo set_value("adresse_suite_al",$adresse_suite_al);?>" /></div>
          </div>
         
          
          <!--Code postal & Ville -->
          <div class='row'>
            <div class='columns two'><label>Code postal :</label></div>
            <div class='columns two'><input type='text' class='validate[required] code_postal' name='code_postal_al' value="<?php echo set_value("code_postal_al",$code_postal_al);?>" id='codepostal3' /></div>
            <div class='columns one'><label>Ville :</label></div>
            <div class='columns two'><input type='text' class='validate[required] ville' name='ville_al' value="<?php echo set_value("ville_al",$ville_al);?>" id='ville3' /></div>
            <div class='columns two'><label>Localisation :</label></div>
            <div class='columns three'><input type='text' class='validate[required] code_postal' name='localisation_aa' id='localisation_al'/></div>
          </div>
          
          
          <!--Ensemble-->
<!--          <div class="row">
            <div class="columns"><label>Ensemble</label></div><div class="columns five end"><input type="text" name="ensemble_al" value="<?php //echo set_value("ensemble_al",$ensemble_al);?>" class="validate[maxSize[20]] ensemble"></div>
          </div>-->
          <!--Batiment-->
<!--          <div class="row">
            <div class="columns"><label>Batiment :</label></div><div class="columns five end"><input type="text" name="batiment_al" value="<?php //echo set_value("batiment_al",$batiment_al);?>" class="validate[maxSize[4]] batiment"></div>
          </div>-->
          <!--Escalier & Etage-->
<!--          <div class="row">
            <div class="columns"><label>Escalier :</label></div><div class="columns five"><input type="text" name="escalier_al" value="<?php //echo set_value("escalier_al",$escalier_al);?>" class="validate[maxSize[2]] escalier"></div>
            <div class="columns"><label>Etage :</label></div><div class="columns two end"><input type="text" name="etage_al" value="<?php //echo set_value("etage_al",$etage_al);?>" class="validate[maxSize[2]] etage"></div>
          </div>-->
          <!--Porte & logo-->
<!--          <div class="row">
            <div class="columns"><label>Porte :</label></div><div class="columns two"><input type="text" name="porte_al" value="<?php //echo set_value("porte_al",$porte_al);?>" class="validate[required,maxSize[30]] porte"></div>
            <div class="columns"><label>Logo :</label></div><div class="columns three end"><input type="text" name="logo_al" value="<?php //echo set_value("logo_al",$logo_al);?>" class="validate[required,maxSize[30]] logo"></div>
          </div>-->
          <!--Code postal & Ville -->
<!--          <div class="row">
            <div class="columns"><label>Code postal :</label></div>
            <div class="columns"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="codepostal3" name="code_postal_al" value="<?php //echo set_value("code_postal_al",$code_postal_al);?>" class="validate[required] code_postal ui-autocomplete-input" autocomplete="off"></div>
            <div class="columns"><label>Ville :</label></div>
            <div class="columns end"><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" id="ville3" name="ville_al" value="<?php //echo set_value("ville_al",$ville_al);?>" class="validate[required] ville ui-autocomplete-input" autocomplete="off"></div>
          </div>-->
        </div>
        <!--end of adresse de livraison-->
        <div class="row">
           <div class="column twelve bottom-10 top-20">
            <label>
              <input type="checkbox" value="true" name="livraison_express" <?php echo ($livraison_express!="false")?"checked='checked'":"";?> class="left">
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
               <input type='text' class='validate[required]' name='email_mediaserv' value="<?php echo set_value("email_mediaserv",$email_mediaserv);?>" id='email_mediaserv'/><span class='input-info'>rassurez-vous, nous n'aimons pas non plus le SPAM</span>
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
              <input type='hidden' name='type_facturation_hid' id="type_facturation_hid" value='<?php echo $type_de_facturation; ?>' />
            <div class="column four"><label><input type="radio" onclick="javascript:choixFacture('type_facture1');" value="facture_electronique" name="type_de_facturation" id="type_facture1"  <?php echo $check_electronic;?>> Electronique (gratuit)</label></div>
            <div class="column four end facturepapier"> <label><input type="radio" onclick="javascript:choixFacture('type_facture2');" value="facture_papier_<?php echo $facture_tarif2; ?>" name="type_de_facturation" id="type_facture2" <?php echo $check_papier;?>> Facture papier <?php echo $facture_papier; ?></label></div>            
             <?php }else{ ?>
            <input type='hidden' name='type_facturation_hid' id="type_facturation_hid" value='facture_electronique' />
            <div class="column four"><label><input type="radio" onclick="javascript:choixFacture('type_facture1');" value="facture_electronique" name="type_de_facturation" id="type_facture1" disabled="disabled" checked="checked"> Electronique (gratuit)</label></div>
            <div class="column four end facturepapier"> <label><input type="radio" onclick="javascript:choixFacture('type_facture2');" value="facture_papier_<?php echo $facture_tarif2; ?>" name="type_de_facturation" id="type_facture2" > Facture papier <?php echo $facture_papier; ?></label></div>            
             <?php } ?>
<!--            <div class="column four"> </div>-->
          </div>
          
          <!-- Sexy line -->
          <hr class="sexy">

          <!--back and submit buttom -->
          <div class="six custom-column back-button left"><?php echo anchor('mon_offre','Précedent',array('title'=>'Précedent','class'=>'precedent','alt'=>'Précedent')); ?></div>
          <div class="six custom-column text-right"> <input type="submit" value="SUIVANT" name="suivant" class="btn-forward rmv-std-btn"></div>
        </form>
</div>