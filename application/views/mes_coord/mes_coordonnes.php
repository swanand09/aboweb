<?php 
echo (validation_errors() != NULL )? "<div class='all-errors'>".validation_errors('<div class="errormsg">', '</div>')."</div>" :""; 
$delaiRetrac = $this->session->userdata("delaiRetrac");

?>
<div class="left-etape-content">
    <form action="mes_coordonnees" method="POST" id="mes-coordonnees">
        <input type="hidden" name="page_2" value="mes_coordonnees" />
      <!--Adresse coordonnées-->
        <div class="adresse-abonnement">
          <h3>COORDONNÉES (ADRESSES ABONNEMENT):</h3>
         <!-- Civilité-->
          <div class="row">
            <div class="columns two bottom-10"><label>CIVILIT&Eacute;<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class="columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="M.")?"checked='checked'":"";?> class="validate[required]">Monsieur</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="Mme")?"checked='checked'":"";?> class="validate[required]">Madame</label>
            </div>
          </div>
         <!-- Nom -->
          <div class="row">
            <div class='columns two'><label>NOM<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[funcCall[validateName],required] nom' maxlength='30' name='nom_aa' value="<?php echo set_value("nom_aa",$nom_aa);?>" /></div>
          </div>
          <!--Prénom -->
          <div class="row">
            <div class='columns two'><label>PR&Eacute;NOM<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[funcCall[validateName],required] prenom' maxlength='30' name='prenom_aa' value="<?php echo set_value("prenom_aa",$prenom_aa);?>" /></div>
          </div>
          <!--Numéro & Complément numéro-->
          <div class="row">
            <div class='columns two'><label>NUM&Eacute;RO</label></div><div class='two columns'><input type='text' class='validate[condRequired[custom[integer],min[1],max[99999]]] numero' maxlength="5" value="<?php echo set_value("numero_aa",$numero_aa);?>" name='numero_aa' /></div>
            <div class='columns two'><label>COMPL&Eacute;MENT N&ordm;</label></div>
            <div class='three columns end'>
              <select id="comp_numero_aa" name="comp_numero_aa" class="comp_numero combobox" >
                <option value = ''></option>
                <option value = 'A'>A</option>
                <option value = 'B'>B</option>
                <option value = 'bis'>bis</option>
                <option value = 'C'>C</option>
                <option value = 'D'>D</option>
                <option value = 'E'>E</option>
                <option value = 'F'>F</option>
                <option value = 'G'>G</option>
                <option value = 'H'>H</option>
                <option value = 'I'>I</option>
                <option value = 'J'>J</option>
                <option value = 'K'>K</option>
                <option value = 'L'>L</option>
                <option value = 'M'>M</option>
                <option value = 'N'>N</option>
                <option value = 'O'>O</option>
                <option value = 'P'>P</option>
                <option value = 'Q'>Q</option>
                <option value = 'R'>R</option>
                <option value = 'S'>S</option>
                <option value = 'T'>T</option>
                <option value = 'ter'>ter</option>
                <option value = 'U'>U</option>
                <option value = 'V'>V</option>
                <option value = 'W'>W</option>
                <option value = 'X'>X</option>
                <option value = 'Y'>Y</option>
                <option value = 'Z'>Z</option>
              </select>
            </div>
          </div>
          <!--Type de voie-->
          <div class="row">
            <div class='columns two'><label>TYPE DE VOIE</label></div>
            <div class='columns seven end'>
              <select id="type_voie_aa" class="type_voie combobox" name="type_voie_aa">
                <option value=''></option>
                <option value='Abbaye'>Abbaye</option>
                <option value='Agglomeration'>Agglomeration</option>
                <option value='Aire(s)'>Aire(s)</option>
                <option value='Allee(s)'>Allee(s)</option>
                <option value='Ancien chemin'>Ancien chemin</option>
                <option value='Ancienne route(s)'>Ancienne route(s)</option>
                <option value='Anse'>Anse</option>
                <option value='Arcade(s)'>Arcade(s)</option>
                <option value='Autoroute'>Autoroute</option>
                <option value='Avenue'>Avenue</option>
                <option value='Barriere(s)'>Barriere(s)</option>
                <option value='Bas chemin'>Bas chemin</option>
                <option value='Bastide'>Bastide</option>
                <option value='Baston'>Baston</option>
                <option value='Beguinage(s)'>Beguinage(s)</option>
                <option value='Berge(s)'>Berge(s)</option>
                <option value='Bois'>Bois</option>
                <option value='Boucle'>Boucle</option>
                <option value='Boulevard'>Boulevard</option>
                <option value='Bourg'>Bourg</option>
                <option value='Butte'>Butte</option>
                <option value='Cale'>Cale</option>
                <option value='Camp'>Camp</option>
                <option value='Campagne'>Campagne</option>
                <option value='Camping'>Camping</option>
                <option value='Carre'>Carre</option>
                <option value='Carreau'>Carreau</option>
                <option value='Carrefour'>Carrefour</option>
                <option value='Carriere(s)'>Carriere(s)</option>
                <option value='Castel'>Castel</option>
                <option value='Cavee'>Cavee</option>
                <option value='Centre(al)'>Centre(al)</option>
                <option value='Chalet'>Chalet</option>
                <option value='Chapelle'>Chapelle</option>
                <option value='Charmille'>Charmille</option>
                <option value='Chateau'>Chateau</option>
                <option value='Chaussee(s)'>Chaussee(s)</option>
                <option value='Chemin Rural'>Chemin Rural</option>
                <option value='Chemin vicinal (aux)'>Chemin vicinal (aux)</option>
                <option value='Cheminement(s)'>Cheminement(s)</option>
                <option value='Chemin(s)'>Chemin(s)</option>
                <option value='Chez'>Chez</option>
                <option value='Cite(s)'>Cite(s)</option>
                <option value='Cloitre'>Cloitre</option>
                <option value='Clos'>Clos</option>
                <option value='Col'>Col</option>
                <option value='Colline(s)'>Colline(s)</option>
                <option value='Contour'>Contour</option>
                <option value='Corniche(s)'>Corniche(s)</option>
                <option value='Cote(au)'>Cote(au)</option>
                <option value='Cottage(s)'>Cottage(s)</option>
                <option value='Cour'>Cour</option>
                <option value='Cours'>Cours</option>
                <option value='Darse'>Darse</option>
                <option value='Degre(s)'>Degre(s)</option>
                <option value='Descente(s)'>Descente(s)</option>
                <option value='Digue(s)'>Digue(s)</option>
                <option value='Domaine(s)'>Domaine(s)</option>
                <option value='Ecluse(s)'>Ecluse(s)</option>
                <option value='Eglise'>Eglise</option>
                <option value='Enceinte'>Enceinte</option>
                <option value='Enclave'>Enclave</option>
                <option value='Enclos'>Enclos</option>
                <option value='Escalier(s)'>Escalier(s)</option>
                <option value='Espace'>Espace</option>
                <option value='Esplanade(s)'>Esplanade(s)</option>
                <option value='Faubourg'>Faubourg</option>
                <option value='Ferme(s)'>Ferme(s)</option>
                <option value='Fontaine'>Fontaine</option>
                <option value='Fort'>Fort</option>
                <option value='Forum'>Forum</option>
                <option value='Fosse(s)'>Fosse(s)</option>
                <option value='Foyer'>Foyer</option>
                <option value='Galerie(s)'>Galerie(s)</option>
                <option value='Gare'>Gare</option>
                <option value='Garenne'>Garenne</option>
                <option value='Grand boulevard'>Grand boulevard</option>
                <option value='Grande(s) ensemble(s)'>Grande(s) ensemble(s)</option>
                <option value='Grande(s) rue(s)'>Grande(s) rue(s)</option>
                <option value='Grille'>Grille</option>
                <option value='Grimpette'>Grimpette</option>
                <option value='Groupement'>Groupement</option>
                <option value='Groupe(s)'>Groupe(s)</option>
                <option value='Halle(s)'>Halle(s)</option>
                <option value='Hameau(x)'>Hameau(x)</option>
                <option value='Haut(s) chemin(s)'>Haut(s) chemin(s)</option>
                <option value='Hippodrome'>Hippodrome</option>
                <option value='HLM'>HLM</option>
                <option value='Ile'>Ile</option>
                <option value='Immeuble(s)'>Immeuble(s)</option>
                <option value='Impasse(s)'>Impasse(s)</option>
                <option value='Jardin(s)'>Jardin(s)</option>
                <option value='Jetee(s)'>Jetee(s)</option>
                <option value='Levee'>Levee</option>
                <option value='Lieu dit'>Lieu dit</option>
                <option value='Lotissement(s)'>Lotissement(s)</option>
                <option value='Mail'>Mail</option>
                <option value='Maison forestiere'>Maison forestiere</option>
                <option value='Manoir'>Manoir</option>
                <option value='Marche(s)'>Marche(s)</option>
                <option value='Mas'>Mas</option>
                <option value='Metro'>Metro</option>
                <option value='Montee(s)'>Montee(s)</option>
                <option value='Moulin(s)'>Moulin(s)</option>
                <option value='Musee'>Musee</option>
                <option value='Nouvelle route'>Nouvelle route</option>
                <option value='Palais'>Palais</option>
                <option value='Parc(s)'>Parc(s)</option>
                <option value='Parking'>Parking</option>
                <option value='Parvis'>Parvis</option>
                <option value='Passage'>Passage</option>
                <option value='Passage a niveau'>Passage a niveau</option>
                <option value='Passerelle(s)'>Passerelle(s)</option>
                <option value='Passe(s)'>Passe(s)</option>
                <option value='Patio'>Patio</option>
                <option value='Pavillon(s)'>Pavillon(s)</option>
                <option value='Peripherique'>Peripherique</option>
                <option value='Peristyle'>Peristyle</option>
                <option value='Petite avenue'>Petite avenue</option>
                <option value='Petite impasse'>Petite impasse</option>
                <option value='Petite route'>Petite route</option>
                <option value='Petite rue'>Petite rue</option>
                <option value='Petites(s) allee(s)'>Petites(s) allee(s)</option>
                <option value='Place'>Place</option>
                <option value='Placis'>Placis</option>
                <option value='Plage(s)'>Plage(s)</option>
                <option value='Plaine'>Plaine</option>
                <option value='Plan'>Plan</option>
                <option value='Plateau(x)'>Plateau(x)</option>
                <option value='Pointe'>Pointe</option>
                <option value='Pont(s)'>Pont(s)</option>
                <option value='Porche'>Porche</option>
                <option value='Port'>Port</option>
                <option value='Porte'>Porte</option>
                <option value='Portique(s)'>Portique(s)</option>
                <option value='Poterne'>Poterne</option>
                <option value='Pourtour'>Pourtour</option>
                <option value='Pre'>Pre</option>
                <option value='Presqu ile'>Presqu ile</option>
                <option value='Promenade'>Promenade</option>
                <option value='Quai'>Quai</option>
                <option value='Quartier'>Quartier</option>
                <option value='Raccourci'>Raccourci</option>
                <option value='Raidillon'>Raidillon</option>
                <option value='Rampe'>Rampe</option>
                <option value='Rempart'>Rempart</option>
                <option value='Residence(s)'>Residence(s)</option>
                <option value='Roc(ade)'>Roc(ade)</option>
                <option value='Rond point'>Rond point</option>
                <option value='Roquet'>Roquet</option>
                <option value='Rotonde'>Rotonde</option>
                <option value='Route'>Route</option>
                <option value='Rue'>Rue</option>
                <option value='Ruelle'>Ruelle</option>
                <option value='Sente(ier)'>Sente(ier)</option>
                <option value='Square'>Square</option>
                <option value='Stade'>Stade</option>
                <option value='Station'>Station</option>
                <option value='Terrain'>Terrain</option>
                <option value='Terrasse(s)'>Terrasse(s)</option>
                <option value='Terre plein'>Terre plein</option>
                <option value='Tertre(s)'>Tertre(s)</option>
                <option value='Tour'>Tour</option>
                <option value='Traverse'>Traverse</option>
                <option value='Val(lee)(lon)'>Val(lee)(lon)</option>
                <option value='Venelle(s)'>Venelle(s)</option>
                <option value='Via'>Via</option>
                <option value='Vieille route'>Vieille route</option>
                <option value='Vieux chemin'>Vieux chemin</option>
                <option value='Village(s)'>Village(s)</option>
                <option value='Villa(s)'>Villa(s)</option>
                <option value='Voie(s)'>Voie(s)</option>
                <option value='Zone'>Zone</option>
                <option value='Zone a urbaniser'>Zone a urbaniser</option>
                <option value='Zone artisanale'>Zone artisanale</option>
                <option value='Zone d amenagement Concerte'>Zone d amenagement Concerte</option>
                <option value='Zone d amenagement Differe'>Zone d amenagement Differe</option>
                <option value='Zone industrielle'>Zone industrielle</option>
              </select>
            </div>
          </div>
           <!--Addresse-->
          <div class="row">
            <div class='columns two'><label>ADRESSE<span class='has-tip' title='obligatoire'>*</span></label></div><div class='ten columns'><input type='text' class='validate[required,funcCall[validateAdd]] adresse' maxlength='40' name='voie_aa' value="<?php echo set_value("voie_aa",$voie_aa);?>" /></div>
          </div>
          <!--Complément d'adresse-->
          <div class="row">
            <div class='columns three'><label>COMPLÉMENT D'ADRESSE</label></div><div class='nine columns'><input type='text'  class='validate[condRequired[funcCall[validateAdd]]] adresse_suite' name='adresse_suite_aa' maxlength='60' value="<?php echo set_value("adresse_suite_aa",$adresse_suite_aa);?>" /></div>
          </div>
          <!--Ensemble & Batiment & Escalier-->
          <div class="row">
            <div class='columns two'><label>ENSEMBLE</label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] ensemble' maxlength='20' value="<?php echo set_value("ensemble_aa",$ensemble_aa);?>" name='ensemble_aa' /></div>
            <div class='columns two'><label>B&Acirc;TIMENT</label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] batiment' maxlength='4' name='batiment_aa' value="<?php echo set_value("batiment_aa",$batiment_aa);?>" /></div>
            <div class='columns two'><label>ESCALIER</label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] escalier' maxlength='2' value="<?php echo set_value("escalier_aa",$escalier_aa);?>" name='escalier_aa' size='2' /></div>
          </div>
          
          <!--Etage & Porte & logo-->
          <div class="row">
            <div class='columns two'><label>&Eacute;TAGE</label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] etage' maxlength='2' name='etage_aa' value="<?php echo set_value("etage_aa",$etage_aa);?>" size='2' /></div>
            <div class='columns two'><label>PORTE</label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] porte' maxlength='5' name='porte_aa' value="<?php echo set_value("porte_aa",$porte_aa);?>" /></div>
            <div class='columns two'><label>LOGO</label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] logo' maxlength='5' name='logo_aa' value="<?php echo set_value("logo_aa",$logo_aa);?>" /></div>
          </div> 
          
          <!--Code postal & Ville & Localisation-->
           <div class="row">
                <div class='columns two'><label>CODE POSTAL <span class='has-tip' title='obligatoire'>*</span></label></div>
                <!-- <div class='columns two'><input type='text' class='validate[required,funcCall[validateCodePostalEntryList]]' name='code_postal_aa' id='codepostal' maxlength='5' value="<?php echo set_value("code_postal_aa",$code_postal_aa);?>"/></div> -->
                <div class='columns four'>
                  <select id="code_postal_aa" name="code_postal_aa" class="code_postal required">
                    <?php
                    foreach ($wsVille as $key => $value) {
                      print "<option value='".$value['Code_postal']."'>".$value['Code_postal']."</option>";
                    }
                    ?>
                  </select> 
                </div>
                <div class='columns two'><label>VILLE<span class='has-tip' title='obligatoire'>*</span></label></div>
                <!-- <div class='columns four'><input type='text' class='validate[required,funcCall[validateVilleEntryList]] ville' name='ville_aa' id='ville' value="<?php echo set_value("ville_aa",$ville_aa);?>"/></div> -->
                <div class='columns four'>
                  <select id="ville_aa" name="ville_aa" class="ville required">
                    <?php 
                      foreach ($wsVille as $key => $value) {
                      print "<option value='".$value['Code_ville']."'>".$value['Code_ville']."</option>";
                    }
                    ?>
                  </select>
                </div>
          </div>
  
          <h3 class="lfsection_space">TÉLÉPHONES</h3>
          <div class="row">
            <div class="columns"><label>TÉLÉPHONE PORTABLE<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class='columns '><input type='text' value="<?php echo set_value("telephone_portable",$telephone_portable);?>" class='validate[required,custom[integer],minSize[10],funcCall[validateTelephonePortable]] telephone telephone_portable' name='telephone_portable' maxlength='10'/></div>
            <div class='column end'>
                <a href='#' class='has-tip' data-width='360' title='Votre numéro de téléphone mobile vous permettra de recevoir par SMS les informations liées à l’évolution de votre activation ainsi que du suivi de votre livraison.'>
                    <?php echo image('info_icon.png',NULL,array("class"=>"border-gray", "alt"=>"Plus info")); ?>
                </a>
            </div>
          </div>
          <div class="row">
            <div class="columns"><label>TÉLÉPHONE DE BUREAU</label></div><div class="columns end"><input type="text" name="telephone_bureau" value="<?php echo set_value("telephone_bureau",$telephone_bureau);?>" class="validate[condRequired[custom[integer],minSize[10]]] telephone_bureau telephone" maxlength='10'></div>
          </div>
          <div class="row">
            <div class="columns"><label>TÉLÉPHONE DU DOMICILE</label></div><div class="columns end"><input type="text" name="telephone_domicile" value="<?php echo set_value("telephone_domicile",$telephone_domicile);?>" class="validate[condRequired[custom[integer],minSize[10]]] telephone_domicile telephone" maxlength='10'></div>
          </div>
        </div>
      <!--adresse de facturation-->
        <h3 class="lfsection_space">Adresse de facturation</h3>
        <div class="row">
          <div class="column twelve bottom-10">
            <label>
                <?php //if(empty($check_adresse_facturation)){ ?>
              <input type="checkbox" value="check adresse facturation" name="check_adresse_facturation" <?php echo !empty($check_adresse_facturation)?"checked='checked'":"";?> id="check-adresse-facturation">
                Identique à l'adresse d'installation
            </label>
          </div>
        </div>

        <div class="adresse-facturation hide">
         <!-- Civilité-->
          <div class="row">
            <div class="columns bottom-10 two"><label>CIVILIT&Eacute;<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class="columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_af" <?php echo (set_value("civilite_af",$civilite_af)=="M.")?"checked='checked'":"";?> class="validate[required]">Monsieur</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_af" <?php echo (set_value("civilite_af",$civilite_af)=="Mme")?"checked='checked'":"";?> class="validate[required]">Madame</label>
            </div>
          </div>
          <!-- Nom -->
          <div class="row">
             <div class='columns two'><label>NOM <span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[funcCall[validateName],required] nom' maxlength='30' name='nom_af' value="<?php echo set_value("nom_af",$nom_af);?>" /></div>
          </div>
          <!--Prénom -->
          <div class="row">
             <div class='columns two'><label>PRÉNOM <span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[funcCall[validateName],required] prenom' maxlength='30' name='prenom_af' value="<?php echo set_value("prenom_af",$prenom_af);?>" /></div>
          </div>
          <!--Numéro & Complément numéro-->
          <div class="row">
            <div class="columns two"><label>NUMÉRO</label></div><div class="two columns"><input type="text" name="numero_af" value="<?php echo set_value("numero_af",$numero_af);?>" class='numero validate[condRequired[custom[integer],min[1],max[99999]]]' maxlength='5'></div>
            <!--<div class='columns two'><label>COMPLÉMENT N&ordm; </label></div><div class='three end columns'><input type='text' class='comp_numero validate[funcCall[validateCompNumEntryList]]' name='comp_numero_af' value="<?php echo set_value("comp_numero_af",$comp_numero_af);?>" /></div>-->
            <div class='columns two'><label>COMPLÉMENT N&ordm; </label></div>
            <div class='three end columns'>
              <select id="comp_numero_af" name="comp_numero_af" class="comp_numero combobox" >
                <option value = ''></option>
                <option value = 'A'>A</option>
                <option value = 'B'>B</option>
                <option value = 'bis'>bis</option>
                <option value = 'C'>C</option>
                <option value = 'D'>D</option>
                <option value = 'E'>E</option>
                <option value = 'F'>F</option>
                <option value = 'G'>G</option>
                <option value = 'H'>H</option>
                <option value = 'I'>I</option>
                <option value = 'J'>J</option>
                <option value = 'K'>K</option>
                <option value = 'L'>L</option>
                <option value = 'M'>M</option>
                <option value = 'N'>N</option>
                <option value = 'O'>O</option>
                <option value = 'P'>P</option>
                <option value = 'Q'>Q</option>
                <option value = 'R'>R</option>
                <option value = 'S'>S</option>
                <option value = 'T'>T</option>
                <option value = 'ter'>ter</option>
                <option value = 'U'>U</option>
                <option value = 'V'>V</option>
                <option value = 'W'>W</option>
                <option value = 'X'>X</option>
                <option value = 'Y'>Y</option>
                <option value = 'Z'>Z</option>
              </select>
            </div>
          </div>
          <!--type de voie-->
          <div class="row">
            <!--<div class='columns two'><label>TYPE DE VOIE </label></div><div class='columns seven end'><input type='text' class='type_voie validate[funcCall[validateVoieEntryList]]' name='type_voie_af' value="<?php echo set_value("type_voie_af",$type_voie_af);?>" /></div>-->
            <div class='columns two'><label>TYPE DE VOIE </label></div>
            <div class='columns seven end'>
              <select id="type_voie_af" class="type_voie combobox" name="type_voie_af">
                <option value=''></option>
                <option value='Abbaye'>Abbaye</option>
                <option value='Agglomeration'>Agglomeration</option>
                <option value='Aire(s)'>Aire(s)</option>
                <option value='Allee(s)'>Allee(s)</option>
                <option value='Ancien chemin'>Ancien chemin</option>
                <option value='Ancienne route(s)'>Ancienne route(s)</option>
                <option value='Anse'>Anse</option>
                <option value='Arcade(s)'>Arcade(s)</option>
                <option value='Autoroute'>Autoroute</option>
                <option value='Avenue'>Avenue</option>
                <option value='Barriere(s)'>Barriere(s)</option>
                <option value='Bas chemin'>Bas chemin</option>
                <option value='Bastide'>Bastide</option>
                <option value='Baston'>Baston</option>
                <option value='Beguinage(s)'>Beguinage(s)</option>
                <option value='Berge(s)'>Berge(s)</option>
                <option value='Bois'>Bois</option>
                <option value='Boucle'>Boucle</option>
                <option value='Boulevard'>Boulevard</option>
                <option value='Bourg'>Bourg</option>
                <option value='Butte'>Butte</option>
                <option value='Cale'>Cale</option>
                <option value='Camp'>Camp</option>
                <option value='Campagne'>Campagne</option>
                <option value='Camping'>Camping</option>
                <option value='Carre'>Carre</option>
                <option value='Carreau'>Carreau</option>
                <option value='Carrefour'>Carrefour</option>
                <option value='Carriere(s)'>Carriere(s)</option>
                <option value='Castel'>Castel</option>
                <option value='Cavee'>Cavee</option>
                <option value='Centre(al)'>Centre(al)</option>
                <option value='Chalet'>Chalet</option>
                <option value='Chapelle'>Chapelle</option>
                <option value='Charmille'>Charmille</option>
                <option value='Chateau'>Chateau</option>
                <option value='Chaussee(s)'>Chaussee(s)</option>
                <option value='Chemin Rural'>Chemin Rural</option>
                <option value='Chemin vicinal (aux)'>Chemin vicinal (aux)</option>
                <option value='Cheminement(s)'>Cheminement(s)</option>
                <option value='Chemin(s)'>Chemin(s)</option>
                <option value='Chez'>Chez</option>
                <option value='Cite(s)'>Cite(s)</option>
                <option value='Cloitre'>Cloitre</option>
                <option value='Clos'>Clos</option>
                <option value='Col'>Col</option>
                <option value='Colline(s)'>Colline(s)</option>
                <option value='Contour'>Contour</option>
                <option value='Corniche(s)'>Corniche(s)</option>
                <option value='Cote(au)'>Cote(au)</option>
                <option value='Cottage(s)'>Cottage(s)</option>
                <option value='Cour'>Cour</option>
                <option value='Cours'>Cours</option>
                <option value='Darse'>Darse</option>
                <option value='Degre(s)'>Degre(s)</option>
                <option value='Descente(s)'>Descente(s)</option>
                <option value='Digue(s)'>Digue(s)</option>
                <option value='Domaine(s)'>Domaine(s)</option>
                <option value='Ecluse(s)'>Ecluse(s)</option>
                <option value='Eglise'>Eglise</option>
                <option value='Enceinte'>Enceinte</option>
                <option value='Enclave'>Enclave</option>
                <option value='Enclos'>Enclos</option>
                <option value='Escalier(s)'>Escalier(s)</option>
                <option value='Espace'>Espace</option>
                <option value='Esplanade(s)'>Esplanade(s)</option>
                <option value='Faubourg'>Faubourg</option>
                <option value='Ferme(s)'>Ferme(s)</option>
                <option value='Fontaine'>Fontaine</option>
                <option value='Fort'>Fort</option>
                <option value='Forum'>Forum</option>
                <option value='Fosse(s)'>Fosse(s)</option>
                <option value='Foyer'>Foyer</option>
                <option value='Galerie(s)'>Galerie(s)</option>
                <option value='Gare'>Gare</option>
                <option value='Garenne'>Garenne</option>
                <option value='Grand boulevard'>Grand boulevard</option>
                <option value='Grande(s) ensemble(s)'>Grande(s) ensemble(s)</option>
                <option value='Grande(s) rue(s)'>Grande(s) rue(s)</option>
                <option value='Grille'>Grille</option>
                <option value='Grimpette'>Grimpette</option>
                <option value='Groupement'>Groupement</option>
                <option value='Groupe(s)'>Groupe(s)</option>
                <option value='Halle(s)'>Halle(s)</option>
                <option value='Hameau(x)'>Hameau(x)</option>
                <option value='Haut(s) chemin(s)'>Haut(s) chemin(s)</option>
                <option value='Hippodrome'>Hippodrome</option>
                <option value='HLM'>HLM</option>
                <option value='Ile'>Ile</option>
                <option value='Immeuble(s)'>Immeuble(s)</option>
                <option value='Impasse(s)'>Impasse(s)</option>
                <option value='Jardin(s)'>Jardin(s)</option>
                <option value='Jetee(s)'>Jetee(s)</option>
                <option value='Levee'>Levee</option>
                <option value='Lieu dit'>Lieu dit</option>
                <option value='Lotissement(s)'>Lotissement(s)</option>
                <option value='Mail'>Mail</option>
                <option value='Maison forestiere'>Maison forestiere</option>
                <option value='Manoir'>Manoir</option>
                <option value='Marche(s)'>Marche(s)</option>
                <option value='Mas'>Mas</option>
                <option value='Metro'>Metro</option>
                <option value='Montee(s)'>Montee(s)</option>
                <option value='Moulin(s)'>Moulin(s)</option>
                <option value='Musee'>Musee</option>
                <option value='Nouvelle route'>Nouvelle route</option>
                <option value='Palais'>Palais</option>
                <option value='Parc(s)'>Parc(s)</option>
                <option value='Parking'>Parking</option>
                <option value='Parvis'>Parvis</option>
                <option value='Passage'>Passage</option>
                <option value='Passage a niveau'>Passage a niveau</option>
                <option value='Passerelle(s)'>Passerelle(s)</option>
                <option value='Passe(s)'>Passe(s)</option>
                <option value='Patio'>Patio</option>
                <option value='Pavillon(s)'>Pavillon(s)</option>
                <option value='Peripherique'>Peripherique</option>
                <option value='Peristyle'>Peristyle</option>
                <option value='Petite avenue'>Petite avenue</option>
                <option value='Petite impasse'>Petite impasse</option>
                <option value='Petite route'>Petite route</option>
                <option value='Petite rue'>Petite rue</option>
                <option value='Petites(s) allee(s)'>Petites(s) allee(s)</option>
                <option value='Place'>Place</option>
                <option value='Placis'>Placis</option>
                <option value='Plage(s)'>Plage(s)</option>
                <option value='Plaine'>Plaine</option>
                <option value='Plan'>Plan</option>
                <option value='Plateau(x)'>Plateau(x)</option>
                <option value='Pointe'>Pointe</option>
                <option value='Pont(s)'>Pont(s)</option>
                <option value='Porche'>Porche</option>
                <option value='Port'>Port</option>
                <option value='Porte'>Porte</option>
                <option value='Portique(s)'>Portique(s)</option>
                <option value='Poterne'>Poterne</option>
                <option value='Pourtour'>Pourtour</option>
                <option value='Pre'>Pre</option>
                <option value='Presqu ile'>Presqu ile</option>
                <option value='Promenade'>Promenade</option>
                <option value='Quai'>Quai</option>
                <option value='Quartier'>Quartier</option>
                <option value='Raccourci'>Raccourci</option>
                <option value='Raidillon'>Raidillon</option>
                <option value='Rampe'>Rampe</option>
                <option value='Rempart'>Rempart</option>
                <option value='Residence(s)'>Residence(s)</option>
                <option value='Roc(ade)'>Roc(ade)</option>
                <option value='Rond point'>Rond point</option>
                <option value='Roquet'>Roquet</option>
                <option value='Rotonde'>Rotonde</option>
                <option value='Route'>Route</option>
                <option value='Rue'>Rue</option>
                <option value='Ruelle'>Ruelle</option>
                <option value='Sente(ier)'>Sente(ier)</option>
                <option value='Square'>Square</option>
                <option value='Stade'>Stade</option>
                <option value='Station'>Station</option>
                <option value='Terrain'>Terrain</option>
                <option value='Terrasse(s)'>Terrasse(s)</option>
                <option value='Terre plein'>Terre plein</option>
                <option value='Tertre(s)'>Tertre(s)</option>
                <option value='Tour'>Tour</option>
                <option value='Traverse'>Traverse</option>
                <option value='Val(lee)(lon)'>Val(lee)(lon)</option>
                <option value='Venelle(s)'>Venelle(s)</option>
                <option value='Via'>Via</option>
                <option value='Vieille route'>Vieille route</option>
                <option value='Vieux chemin'>Vieux chemin</option>
                <option value='Village(s)'>Village(s)</option>
                <option value='Villa(s)'>Villa(s)</option>
                <option value='Voie(s)'>Voie(s)</option>
                <option value='Zone'>Zone</option>
                <option value='Zone a urbaniser'>Zone a urbaniser</option>
                <option value='Zone artisanale'>Zone artisanale</option>
                <option value='Zone d amenagement Concerte'>Zone d amenagement Concerte</option>
                <option value='Zone d amenagement Differe'>Zone d amenagement Differe</option>
                <option value='Zone industrielle'>Zone industrielle</option>
              </select>
            </div>
          </div>
          
          <!--Addresse suite-->
          <div class="row">
            <div class='columns two'><label>ADRESSE </label></div><div class='ten columns'><input type='text' class='validate[maxSize[32]] adresse' maxlength='32' name='voie_af' value="<?php echo set_value("voie_af",$voie_af);?>" /></div>
          </div>
          <!--Complement d'adresse-->
          <div class='row'>
            <div class='columns three'><label>COMPLÉMENT D'ADRESSE</label></div><div class='nine columns'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] adresse_suite' maxlength='30' name='adresse_suite_af' value="<?php echo set_value("adresse_suite_af",$adresse_suite_af);?>" /></div>
          </div>
          <!--Code postal & Ville -->
          <div class="row">
            <div class='columns two'><label>CODE POSTAL </label></div>
            <!-- <div class='columns two'><input type='text' class='validate[required] code_postal' name='code_postal_af' id='codepostal2' maxlength='5' value="<?php echo set_value("code_postal_af",$code_postal_af);?>" /></div> -->
            <div class='columns four'>
              <select id="code_postal_af" class="code_postal combobox" name="code_postal_af">
                <option value=''></option>
                <option value='97100'>97100</option>
                <option value='97110'>97110</option>
                <option value='97111'>97111</option>
                <option value='97112'>97112</option>
                <option value='97113'>97113</option>
                <option value='97114'>97114</option>
                <option value='97115'>97115</option>
                <option value='97116'>97116</option>
                <option value='97117'>97117</option>
                <option value='97118'>97118</option>
                <option value='97119'>97119</option>
                <option value='97120'>97120</option>
                <option value='97121'>97121</option>
                <option value='97122'>97122</option>
                <option value='97123'>97123</option>
                <option value='97125'>97125</option>
                <option value='97126'>97126</option>
                <option value='97127'>97127</option>
                <option value='97128'>97128</option>
                <option value='97129'>97129</option>
                <option value='97130'>97130</option>
                <option value='97131'>97131</option>
                <option value='97132'>97132</option>
                <option value='97133'>97133</option>
                <option value='97134'>97134</option>
                <option value='97136'>97136</option>
                <option value='97137'>97137</option>
                <option value='97139'>97139</option>
                <option value='97140'>97140</option>
                <option value='97141'>97141</option>
                <option value='97142'>97142</option>
                <option value='97150'>97150</option>
                <option value='97160'>97160</option>
                <option value='97170'>97170</option>
                <option value='97180'>97180</option>
                <option value='97190'>97190</option>
                <option value='97200'>97200</option>
                <option value='97211'>97211</option>
                <option value='97212'>97212</option>
                <option value='97213'>97213</option>
                <option value='97214'>97214</option>
                <option value='97215'>97215</option>
                <option value='97216'>97216</option>
                <option value='97217'>97217</option>
                <option value='97218'>97218</option>
                <option value='97220'>97220</option>
                <option value='97221'>97221</option>
                <option value='97222'>97222</option>
                <option value='97223'>97223</option>
                <option value='97224'>97224</option>
                <option value='97225'>97225</option>
                <option value='97226'>97226</option>
                <option value='97227'>97227</option>
                <option value='97228'>97228</option>
                <option value='97229'>97229</option>
                <option value='97230'>97230</option>
                <option value='97231'>97231</option>
                <option value='97232'>97232</option>
                <option value='97233'>97233</option>
                <option value='97234'>97234</option>
                <option value='97240'>97240</option>
                <option value='97250'>97250</option>
                <option value='97260'>97260</option>
                <option value='97270'>97270</option>
                <option value='97280'>97280</option>
                <option value='97290'>97290</option>
                <option value='97300'>97300</option>
                <option value='97310'>97310</option>
                <option value='97311'>97311</option>
                <option value='97312'>97312</option>
                <option value='97313'>97313</option>
                <option value='97314'>97314</option>
                <option value='97315'>97315</option>
                <option value='97316'>97316</option>
                <option value='97317'>97317</option>
                <option value='97318'>97318</option>
                <option value='97319'>97319</option>
                <option value='97320'>97320</option>
                <option value='97330'>97330</option>
                <option value='97340'>97340</option>
                <option value='97350'>97350</option>
                <option value='97351'>97351</option>
                <option value='97352'>97352</option>
                <option value='97353'>97353</option>
                <option value='97354'>97354</option>
                <option value='97355'>97355</option>
                <option value='97356'>97356</option>
                <option value='97360'>97360</option>
                <option value='97370'>97370</option>
                <option value='97380'>97380</option>
                <option value='97390'>97390</option>
                <option value='97400'>97400</option>
                <option value='97410'>97410</option>
                <option value='97411'>97411</option>
                <option value='97412'>97412</option>
                <option value='97413'>97413</option>
                <option value='97414'>97414</option>
                <option value='97416'>97416</option>
                <option value='97417'>97417</option>
                <option value='97418'>97418</option>
                <option value='97419'>97419</option>
                <option value='97420'>97420</option>
                <option value='97421'>97421</option>
                <option value='97422'>97422</option>
                <option value='97423'>97423</option>
                <option value='97424'>97424</option>
                <option value='97425'>97425</option>
                <option value='97426'>97426</option>
                <option value='97427'>97427</option>
                <option value='97429'>97429</option>
                <option value='97430'>97430</option>
                <option value='97431'>97431</option>
                <option value='97432'>97432</option>
                <option value='97433'>97433</option>
                <option value='97434'>97434</option>
                <option value='97435'>97435</option>
                <option value='97436'>97436</option>
                <option value='97437'>97437</option>
                <option value='97438'>97438</option>
                <option value='97439'>97439</option>
                <option value='97440'>97440</option>
                <option value='97441'>97441</option>
                <option value='97442'>97442</option>
                <option value='97450'>97450</option>
                <option value='97460'>97460</option>
                <option value='97470'>97470</option>
                <option value='97480'>97480</option>
                <option value='97490'>97490</option>
              </select>
            </div>
            <div class='columns two'><label>VILLE</label></div>
            <!-- <div class='columns four'><input type='text' class='validate[required] ville' name='ville_af' value="<?php echo set_value("ville_af",$ville_af);?>" id='ville2' /></div> -->
            <div class='columns four'>
              <select id="ville_af" class="ville combobox" name="ville_af" >
                <option value=""></option>
                <option value="BASSE TERRE">BASSE TERRE</option>
                <option value="POINTE A PITRE">POINTE A PITRE</option>
                <option value="MORNE A L\'EAU">MORNE A LEAU</option>
                <option value="GRAND BOURG">GRAND BOURG</option>
                <option value="GOURBEYRE">GOURBEYRE</option>
                <option value="TROIS RIVIERES">TROIS RIVIERES</option>
                <option value="SAINTE ROSE">SAINTE ROSE</option>
                <option value="POINTE NOIRE">POINTE NOIRE</option>
                <option value="PORT LOUIS">PORT LOUIS</option>
                <option value="SAINT FRANCOIS">SAINT FRANCOIS</option>
                <option value="VIEUX HABITANTS">VIEUX HABITANTS</option>
                <option value="SAINT CLAUDE">SAINT CLAUDE</option>
                <option value="ANSE BERTRAND">ANSE BERTRAND</option>
                <option value="BAIE-MAHAULT">BAIE-MAHAULT</option>
                <option value="BAILLIF">BAILLIF</option>
                <option value="BOUILLANTE">BOUILLANTE</option>
                <option value="DESHAIES">DESHAIES</option>
                <option value="LA DESIRADE">LA DESIRADE</option>
                <option value="GOYAVE">GOYAVE</option>
                <option value="LAMENTIN">LAMENTIN</option>
                <option value="BANANIER">BANANIER</option>
                <option value="CAPESTERRE BELLE EAU">CAPESTERRE BELLE EAU</option>
                <option value="SAINTE MARIE">SAINTE MARIE</option>
                <option value="LES MANGLES">LES MANGLES</option>
                <option value="PETIT CANAL">PETIT CANAL</option>
                <option value="BOUILLANTE">BOUILLANTE</option>
                <option value="PIGEON">PIGEON</option>
                <option value="SAINT BARTHELEMY">SAINT BARTHELEMY</option>
                <option value="SAINT LOUIS">SAINT LOUIS</option>
                <option value="TERRE DE BAS">TERRE DE BAS</option>
                <option value="TERRE DE HAUT">TERRE DE HAUT</option>
                <option value="LES ABYMES">LES ABYMES</option>
                <option value="CAPESTERRE DE MARIE GALANTE">CAPESTERRE DE MARIE GALANTE</option>
                <option value="VIEUX FORT">VIEUX FORT</option>
                <option value="LES ABYMES">LES ABYMES</option>
                <option value="SAINT MARTIN">SAINT MARTIN</option>
                <option value="LE MOULE">LE MOULE</option>
                <option value="PETIT BOURG">PETIT BOURG</option>
                <option value="DOUVILLE">DOUVILLE</option>
                <option value="SAINTE ANNE">SAINTE ANNE</option>
                <option value="LE GOSIER">LE GOSIER</option>
                <option value="FORT DE FRANCE">FORT DE FRANCE</option>
                <option value="RIVIERE PILOTE">RIVIERE PILOTE</option>
                <option value="SAINT JOSEPH">SAINT JOSEPH</option>
                <option value="GROS MORNE">GROS MORNE</option>
                <option value="LE LORRAIN">LE LORRAIN</option>
                <option value="PETIT BOURG">PETIT BOURG</option>
                <option value="RIVIERE SALEE">RIVIERE SALEE</option>
                <option value="L\'AJOUPA BOUILLON">LAJOUPA BOUILLON</option>
                <option value="LES ANSES D\'ARLETS">LES ANSES DARLETS</option>
                <option value="BASSE POINTE">BASSE POINTE</option>
                <option value="GRAND RIVIERE">GRAND RIVIERE</option>
                <option value="MACOUBA">MACOUBA</option>
                <option value="LA TRINITE">LA TRINITE</option>
                <option value="LE CARBET">LE CARBET</option>
                <option value="BELLEFONTAINE">BELLEFONTAINE</option>
                <option value="CASE PILOTE">CASE PILOTE</option>
                <option value="LE DIAMANT">LE DIAMANT</option>
                <option value="DUCOS">DUCOS</option>
                <option value="LE MARIGOT">LE MARIGOT</option>
                <option value="LE MORNE VERT">LE MORNE VERT</option>
                <option value="SAINTE ANNE">SAINTE ANNE</option>
                <option value="SAINTE LUCE">SAINTE LUCE</option>
                <option value="LES TROIS ILETS">LES TROIS ILETS</option>
                <option value="MORNE DES ESSES">MORNE DES ESSES</option>
                <option value="SAINTE MARIE">SAINTE MARIE</option>
                <option value="LE ROBERT">LE ROBERT</option>
                <option value="VERT PRE">VERT PRE</option>
                <option value="LE LAMENTIN">LE LAMENTIN</option>
                <option value="SCHOELCHER">SCHOELCHER</option>
                <option value="FORT DE FRANCE">FORT DE FRANCE</option>
                <option value="LE FRANCOIS">LE FRANCOIS</option>
                <option value="FONDS ST DENIS">FONDS ST DENIS</option>
                <option value="LE PRECHEUR">LE PRECHEUR</option>
                <option value="SAINT PIERRE">SAINT PIERRE</option>
                <option value="LE MORNE ROUGE">LE MORNE ROUGE</option>
                <option value="SAINT ESPRIT">SAINT ESPRIT</option>
                <option value="LE VAUCLIN">LE VAUCLIN</option>
                <option value="LE MARIN">LE MARIN</option>
                <option value="CAYENNE">CAYENNE</option>
                <option value="KOUROU">KOUROU</option>
                <option value="ROURA">ROURA</option>
                <option value="ST ELIE">ST ELIE</option>
                <option value="ST GEORGES">ST GEORGES</option>
                <option value="SAUL">SAUL</option>
                <option value="SINNAMARY">SINNAMARY</option>
                <option value="PAPAICHTON">PAPAICHTON</option>
                <option value="APATOU">APATOU</option>
                <option value="JAVOUHEY">JAVOUHEY</option>
                <option value="AWALA YALIMAPO">AWALA YALIMAPO</option>
                <option value="ST LAURENT DU MARONI">ST LAURENT DU MARONI</option>
                <option value="CAMOPI">CAMOPI</option>
                <option value="GRAND SANTI">GRAND SANTI</option>
                <option value="POMPIDOU PAPA ICHTON">POMPIDOU PAPA ICHTON</option>
                <option value="IRACOUBO">IRACOUBO</option>
                <option value="MATOURY">MATOURY</option>
                <option value="CACAO">CACAO</option>
                <option value="KAW">KAW</option>
                <option value="REMIRE MONTJOLY">REMIRE MONTJOLY</option>
                <option value="MACOURIA">MACOURIA</option>
                <option value="MACOURIA TONATE">MACOURIA TONATE</option>
                <option value="MONTSINERY TONNEGRANDE">MONTSINERY TONNEGRANDE</option>
                <option value="MANA">MANA</option>
                <option value="MARIPASOULA">MARIPASOULA</option>
                <option value="OUANARY">OUANARY</option>
                <option value="REGINA">REGINA</option>
                <option value="BELLE PIERRE">BELLE PIERRE</option>
                <option value="LE BRULE">LE BRULE</option>
                <option value="ST DENIS">ST DENIS</option>
                <option value="ST FRANCOIS">ST FRANCOIS</option>
                <option value="BASSE TERRE">BASSE TERRE</option>
                <option value="GRAND BOIS">GRAND BOIS</option>
                <option value="MONT VERT">MONT VERT</option>
                <option value="ST PIERRE">ST PIERRE</option>
                <option value="TERRE SAINTE">TERRE SAINTE</option>
                <option value="BOIS DE NEFLES ST PAUL">BOIS DE NEFLES ST PAUL</option>
                <option value="BRAS PANON">BRAS PANON</option>
                <option value="RIVIERE DU MAT">RIVIERE DU MAT</option>
                <option value="CILAOS">CILAOS</option>
                <option value="PALMISTE ROUGE">PALMISTE ROUGE</option>
                <option value="ENTRE DEUX">ENTRE DEUX</option>
                <option value="LA CHALOUPE">LA CHALOUPE</option>
                <option value="LA MONTAGNE">LA MONTAGNE</option>
                <option value="ST BERNARD">ST BERNARD</option>
                <option value="ST DENIS">ST DENIS</option>
                <option value="LA PLAINE DES CAFRES">LA PLAINE DES CAFRES</option>
                <option value="LA POSSESSION">LA POSSESSION</option>
                <option value="LA RIVIERE DES GALETS">LA RIVIERE DES GALETS</option>
                <option value="LE DOS D ANE">LE DOS D ANE</option>
                <option value="SAINT DENIS">SAINT DENIS</option>
                <option value="STE THERESE">STE THERESE</option>
                <option value="LE PORT">LE PORT</option>
                <option value="LA RIVIERE">LA RIVIERE</option>
                <option value="LES MAKES">LES MAKES</option>
                <option value="LA SALINE">LA SALINE</option>
                <option value="LE GUILLAUME">LE GUILLAUME</option>
                <option value="LE PITON ST LEU">LE PITON ST LEU</option>
                <option value="LE PLATE">LE PLATE</option>
                <option value="LES AVIRONS">LES AVIRONS</option>
                <option value="TEVELAVE">TEVELAVE</option>
                <option value="LES TROIS BASSINS">LES TROIS BASSINS</option>
                <option value="TROIS BASSINS">TROIS BASSINS</option>
                <option value="L ETANG SALE">L ETANG SALE</option>
                <option value="L ETANG SALE LES BAINS">L ETANG SALE LES BAINS</option>
                <option value="PETITE ILE">PETITE ILE</option>
                <option value="LE TAMPON">LE TAMPON</option>
                <option value="LES TROIS MARES">LES TROIS MARES</option>
                <option value="PONT D YVES">PONT D YVES</option>
                <option value="TAMPON 14EME KM">TAMPON 14EME KM</option>
                <option value="LA PLAINE DES PALMISTES">LA PLAINE DES PALMISTES</option>
                <option value="RAVINE DES CABRIS">RAVINE DES CABRIS</option>
                <option value="HELL BOURG">HELL BOURG</option>
                <option value="LA POSSESSION">LA POSSESSION</option>
                <option value="SALAZIE">SALAZIE</option>
                <option value="LA SALINE LES BAINS">LA SALINE LES BAINS</option>
                <option value="ST GILLES LES BAINS">ST GILLES LES BAINS</option>
                <option value="BERNICA">BERNICA</option>
                <option value="ST GILLES LES HAUTS">ST GILLES LES HAUTS</option>
                <option value="TAN ROUGE">TAN ROUGE</option>
                <option value="ST LEU">ST LEU</option>
                <option value="STE ANNE">STE ANNE</option>
                <option value="RIVIERE DES PLUIES">RIVIERE DES PLUIES</option>
                <option value="ROLAND GARROS AEROPORT">ROLAND GARROS AEROPORT</option>
                <option value="STE MARIE">STE MARIE</option>
                <option value="LE PITON STE ROSE">LE PITON STE ROSE</option>
                <option value="STE ROSE">STE ROSE</option>
                <option value="CAMBUSTON">CAMBUSTON</option>
                <option value="LA CRESSONNIERE">LA CRESSONNIERE</option>
                <option value="ST ANDRE">ST ANDRE</option>
                <option value="STE SUZANNE">STE SUZANNE</option>
                <option value="BASSE VALLEE">BASSE VALLEE</option>
                <option value="ST PHILIPPE">ST PHILIPPE</option>
                <option value="ST LOUIS">ST LOUIS</option>
                <option value="BELLEMENE">BELLEMENE</option>
                <option value="ST PAUL">ST PAUL</option>
                <option value="ST BENOIT">ST BENOIT</option>
                <option value="LES LIANES">LES LIANES</option>
                <option value="ST JOSEPH">ST JOSEPH</option>
                <option value="VINCENDO">VINCENDO</option>
                <option value="BOIS DE NEFLES ST DENIS">BOIS DE NEFLES ST DENIS</option>
                <option value="LA BRETAGNE">LA BRETAGNE</option>
                <option value="MOUFIA">MOUFIA</option>
                <option value="STE CLOTILDE">STE CLOTILDE</option>
              </select>
            </div>
          </div>
        </div>


        <!--Adresse de livraison-->
        <h3 class="lfsection_space">Adresse de livraison :</h3>
        <div class="row">
          <div class="column twelve bottom-10">
            <label>
             <?php //if(!empty($check_adresse_livraison)){ ?>
              <input type="checkbox" value="check adresse livraison" name="check_adresse_livraison" <?php echo !empty($check_adresse_livraison)?"checked='checked'":"";?> id="check-adresse-livraison">
              Identique à l'adresse d'installation
            </label>
          </div>
        </div>
        <!--adresse de livraison-->
        <div class="adresse-livraison hide">
         <!-- Civilité-->
          <div class="row">
            <div class="columns bottom-10 two"><label>CIVILITÉ<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class="five columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_al" <?php echo (set_value("civilite_al",$civilite_al)=="M.")?"checked='checked'":"";?> class="validate[required]">Monsieur</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_al" <?php echo (set_value("civilite_al",$civilite_al)=="Mme")?"checked='checked'":"";?> class="validate[required]">Madame</label>
            </div>
          </div>
         
          <!-- Nom -->
          <div class='row'>
            <div class='columns two'><label>NOM <span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[funcCall[validateName],required] nom' maxlength='30' name='nom_al' value="<?php echo set_value("nom_al",$nom_al);?>" /></div>
          </div>
          <!--Prénom -->
          <div class='row'>
            <div class='columns two'><label>PRÉNOM <span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[funcCall[validateName],required] prenom' maxlength='30' name='prenom_al' value="<?php echo set_value("prenom_al",$prenom_al);?>" /></div>
          </div>
          
          
          <!--Numéro & Complément numéro 7 type de voie-->
          <div class='row'>
            <div class='columns two'><label>NUMÉRO</label></div><div class='two columns'><input type='text' class='numero validate[condRequired[custom[integer],min[1],max[99999]]]' maxlength='5' name='numero_al' value="<?php echo set_value("numero_al",$numero_al);?>" /></div>
            <!--<div class='columns two'><label>COMPLÉMENT N&ordm;</label></div><div class='three end columns'><input type='text' class='comp_numero validate[funcCall[validateCompNumEntryList]]' name='comp_numero_al' value="<?php echo set_value("comp_numero_al",$comp_numero_al);?>" /></div>-->
            <div class='columns two'><label>COMPLÉMENT N&ordm;</label></div>
            <div class='three end columns'>
              <select id="comp_numero_al" name="comp_numero_al" class="comp_numero combobox" >
                <option value = ''></option>
                <option value = 'A'>A</option>
                <option value = 'B'>B</option>
                <option value = 'bis'>bis</option>
                <option value = 'C'>C</option>
                <option value = 'D'>D</option>
                <option value = 'E'>E</option>
                <option value = 'F'>F</option>
                <option value = 'G'>G</option>
                <option value = 'H'>H</option>
                <option value = 'I'>I</option>
                <option value = 'J'>J</option>
                <option value = 'K'>K</option>
                <option value = 'L'>L</option>
                <option value = 'M'>M</option>
                <option value = 'N'>N</option>
                <option value = 'O'>O</option>
                <option value = 'P'>P</option>
                <option value = 'Q'>Q</option>
                <option value = 'R'>R</option>
                <option value = 'S'>S</option>
                <option value = 'T'>T</option>
                <option value = 'ter'>ter</option>
                <option value = 'U'>U</option>
                <option value = 'V'>V</option>
                <option value = 'W'>W</option>
                <option value = 'X'>X</option>
                <option value = 'Y'>Y</option>
                <option value = 'Z'>Z</option>
              </select>
            </div>
          </div>
          <!--type de voie-->
          <div class="row">
            <!-- <div class='columns two'><label>TYPE DE VOIE </label></div><div class='columns seven end'><input type='text' class='type_voie validate[funcCall[validateVoieEntryList]]' name='type_voie_al' value="<?php echo set_value("type_voie_al",$type_voie_al);?>" /></div> -->
            <div class='columns two'><label>TYPE DE VOIE </label></div>
            <div class='columns seven end'>
              <select id="type_voie_al" class="type_voie combobox" name="type_voie_al">
                <option value=''></option>
                <option value='Abbaye'>Abbaye</option>
                <option value='Agglomeration'>Agglomeration</option>
                <option value='Aire(s)'>Aire(s)</option>
                <option value='Allee(s)'>Allee(s)</option>
                <option value='Ancien chemin'>Ancien chemin</option>
                <option value='Ancienne route(s)'>Ancienne route(s)</option>
                <option value='Anse'>Anse</option>
                <option value='Arcade(s)'>Arcade(s)</option>
                <option value='Autoroute'>Autoroute</option>
                <option value='Avenue'>Avenue</option>
                <option value='Barriere(s)'>Barriere(s)</option>
                <option value='Bas chemin'>Bas chemin</option>
                <option value='Bastide'>Bastide</option>
                <option value='Baston'>Baston</option>
                <option value='Beguinage(s)'>Beguinage(s)</option>
                <option value='Berge(s)'>Berge(s)</option>
                <option value='Bois'>Bois</option>
                <option value='Boucle'>Boucle</option>
                <option value='Boulevard'>Boulevard</option>
                <option value='Bourg'>Bourg</option>
                <option value='Butte'>Butte</option>
                <option value='Cale'>Cale</option>
                <option value='Camp'>Camp</option>
                <option value='Campagne'>Campagne</option>
                <option value='Camping'>Camping</option>
                <option value='Carre'>Carre</option>
                <option value='Carreau'>Carreau</option>
                <option value='Carrefour'>Carrefour</option>
                <option value='Carriere(s)'>Carriere(s)</option>
                <option value='Castel'>Castel</option>
                <option value='Cavee'>Cavee</option>
                <option value='Centre(al)'>Centre(al)</option>
                <option value='Chalet'>Chalet</option>
                <option value='Chapelle'>Chapelle</option>
                <option value='Charmille'>Charmille</option>
                <option value='Chateau'>Chateau</option>
                <option value='Chaussee(s)'>Chaussee(s)</option>
                <option value='Chemin Rural'>Chemin Rural</option>
                <option value='Chemin vicinal (aux)'>Chemin vicinal (aux)</option>
                <option value='Cheminement(s)'>Cheminement(s)</option>
                <option value='Chemin(s)'>Chemin(s)</option>
                <option value='Chez'>Chez</option>
                <option value='Cite(s)'>Cite(s)</option>
                <option value='Cloitre'>Cloitre</option>
                <option value='Clos'>Clos</option>
                <option value='Col'>Col</option>
                <option value='Colline(s)'>Colline(s)</option>
                <option value='Contour'>Contour</option>
                <option value='Corniche(s)'>Corniche(s)</option>
                <option value='Cote(au)'>Cote(au)</option>
                <option value='Cottage(s)'>Cottage(s)</option>
                <option value='Cour'>Cour</option>
                <option value='Cours'>Cours</option>
                <option value='Darse'>Darse</option>
                <option value='Degre(s)'>Degre(s)</option>
                <option value='Descente(s)'>Descente(s)</option>
                <option value='Digue(s)'>Digue(s)</option>
                <option value='Domaine(s)'>Domaine(s)</option>
                <option value='Ecluse(s)'>Ecluse(s)</option>
                <option value='Eglise'>Eglise</option>
                <option value='Enceinte'>Enceinte</option>
                <option value='Enclave'>Enclave</option>
                <option value='Enclos'>Enclos</option>
                <option value='Escalier(s)'>Escalier(s)</option>
                <option value='Espace'>Espace</option>
                <option value='Esplanade(s)'>Esplanade(s)</option>
                <option value='Faubourg'>Faubourg</option>
                <option value='Ferme(s)'>Ferme(s)</option>
                <option value='Fontaine'>Fontaine</option>
                <option value='Fort'>Fort</option>
                <option value='Forum'>Forum</option>
                <option value='Fosse(s)'>Fosse(s)</option>
                <option value='Foyer'>Foyer</option>
                <option value='Galerie(s)'>Galerie(s)</option>
                <option value='Gare'>Gare</option>
                <option value='Garenne'>Garenne</option>
                <option value='Grand boulevard'>Grand boulevard</option>
                <option value='Grande(s) ensemble(s)'>Grande(s) ensemble(s)</option>
                <option value='Grande(s) rue(s)'>Grande(s) rue(s)</option>
                <option value='Grille'>Grille</option>
                <option value='Grimpette'>Grimpette</option>
                <option value='Groupement'>Groupement</option>
                <option value='Groupe(s)'>Groupe(s)</option>
                <option value='Halle(s)'>Halle(s)</option>
                <option value='Hameau(x)'>Hameau(x)</option>
                <option value='Haut(s) chemin(s)'>Haut(s) chemin(s)</option>
                <option value='Hippodrome'>Hippodrome</option>
                <option value='HLM'>HLM</option>
                <option value='Ile'>Ile</option>
                <option value='Immeuble(s)'>Immeuble(s)</option>
                <option value='Impasse(s)'>Impasse(s)</option>
                <option value='Jardin(s)'>Jardin(s)</option>
                <option value='Jetee(s)'>Jetee(s)</option>
                <option value='Levee'>Levee</option>
                <option value='Lieu dit'>Lieu dit</option>
                <option value='Lotissement(s)'>Lotissement(s)</option>
                <option value='Mail'>Mail</option>
                <option value='Maison forestiere'>Maison forestiere</option>
                <option value='Manoir'>Manoir</option>
                <option value='Marche(s)'>Marche(s)</option>
                <option value='Mas'>Mas</option>
                <option value='Metro'>Metro</option>
                <option value='Montee(s)'>Montee(s)</option>
                <option value='Moulin(s)'>Moulin(s)</option>
                <option value='Musee'>Musee</option>
                <option value='Nouvelle route'>Nouvelle route</option>
                <option value='Palais'>Palais</option>
                <option value='Parc(s)'>Parc(s)</option>
                <option value='Parking'>Parking</option>
                <option value='Parvis'>Parvis</option>
                <option value='Passage'>Passage</option>
                <option value='Passage a niveau'>Passage a niveau</option>
                <option value='Passerelle(s)'>Passerelle(s)</option>
                <option value='Passe(s)'>Passe(s)</option>
                <option value='Patio'>Patio</option>
                <option value='Pavillon(s)'>Pavillon(s)</option>
                <option value='Peripherique'>Peripherique</option>
                <option value='Peristyle'>Peristyle</option>
                <option value='Petite avenue'>Petite avenue</option>
                <option value='Petite impasse'>Petite impasse</option>
                <option value='Petite route'>Petite route</option>
                <option value='Petite rue'>Petite rue</option>
                <option value='Petites(s) allee(s)'>Petites(s) allee(s)</option>
                <option value='Place'>Place</option>
                <option value='Placis'>Placis</option>
                <option value='Plage(s)'>Plage(s)</option>
                <option value='Plaine'>Plaine</option>
                <option value='Plan'>Plan</option>
                <option value='Plateau(x)'>Plateau(x)</option>
                <option value='Pointe'>Pointe</option>
                <option value='Pont(s)'>Pont(s)</option>
                <option value='Porche'>Porche</option>
                <option value='Port'>Port</option>
                <option value='Porte'>Porte</option>
                <option value='Portique(s)'>Portique(s)</option>
                <option value='Poterne'>Poterne</option>
                <option value='Pourtour'>Pourtour</option>
                <option value='Pre'>Pre</option>
                <option value='Presqu ile'>Presqu ile</option>
                <option value='Promenade'>Promenade</option>
                <option value='Quai'>Quai</option>
                <option value='Quartier'>Quartier</option>
                <option value='Raccourci'>Raccourci</option>
                <option value='Raidillon'>Raidillon</option>
                <option value='Rampe'>Rampe</option>
                <option value='Rempart'>Rempart</option>
                <option value='Residence(s)'>Residence(s)</option>
                <option value='Roc(ade)'>Roc(ade)</option>
                <option value='Rond point'>Rond point</option>
                <option value='Roquet'>Roquet</option>
                <option value='Rotonde'>Rotonde</option>
                <option value='Route'>Route</option>
                <option value='Rue'>Rue</option>
                <option value='Ruelle'>Ruelle</option>
                <option value='Sente(ier)'>Sente(ier)</option>
                <option value='Square'>Square</option>
                <option value='Stade'>Stade</option>
                <option value='Station'>Station</option>
                <option value='Terrain'>Terrain</option>
                <option value='Terrasse(s)'>Terrasse(s)</option>
                <option value='Terre plein'>Terre plein</option>
                <option value='Tertre(s)'>Tertre(s)</option>
                <option value='Tour'>Tour</option>
                <option value='Traverse'>Traverse</option>
                <option value='Val(lee)(lon)'>Val(lee)(lon)</option>
                <option value='Venelle(s)'>Venelle(s)</option>
                <option value='Via'>Via</option>
                <option value='Vieille route'>Vieille route</option>
                <option value='Vieux chemin'>Vieux chemin</option>
                <option value='Village(s)'>Village(s)</option>
                <option value='Villa(s)'>Villa(s)</option>
                <option value='Voie(s)'>Voie(s)</option>
                <option value='Zone'>Zone</option>
                <option value='Zone a urbaniser'>Zone a urbaniser</option>
                <option value='Zone artisanale'>Zone artisanale</option>
                <option value='Zone d amenagement Concerte'>Zone d amenagement Concerte</option>
                <option value='Zone d amenagement Differe'>Zone d amenagement Differe</option>
                <option value='Zone industrielle'>Zone industrielle</option>
              </select>
            </div>
          </div>
          
          <!--Addresse-->
          <div class='row'>
            <div class='columns two'><label>ADRESSE </label></div><div class='ten columns'><input type='text' class='adresse' name='voie_al' maxlength='200' value="<?php echo set_value("voie_al",$voie_al);?>" /></div>
          </div>
          <div class='row'>
            <div class='columns three'><label>COMPLÉMENT D'ADRESSE</label></div><div class='nine columns'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] adresse_suite' maxlength='64' name='adresse_suite_al' value="<?php echo set_value("adresse_suite_al",$adresse_suite_al);?>" /></div>            
          </div>
         
          <!--Ensemble & Batiment & Escalier-->
          <div class='row'>
            <div class='columns two'><label>ENSEMBLE</label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] ensemble' maxlength='20' name='ensemble_al' value="<?php echo set_value("ensemble_al",$ensemble_al);?>" /></div>
            <div class='columns two'><label>B&Acirc;TIMENT </label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] batiment' maxlength='4' name='batiment_al' value="<?php echo set_value("batiment_al",$batiment_al);?>" /></div>
            <div class='columns two'><label>ESCALIER </label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] escalier' maxlength='2' name='escalier_al' size='2' value="<?php echo set_value("escalier_al",$escalier_al);?>" /></div>
          </div>
          
         <!--Etage & Porte & logo-->
          <div class='row'>
            <div class='columns two'><label>&Eacute;TAGE </label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] etage' maxlength='2' name='etage_al' size='2' value="<?php echo set_value("etage_al",$etage_al);?>" /></div>
            <div class='columns two'><label>PORTE </label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] porte' maxlength='5' name='porte_al' value="<?php echo set_value("porte_al",$porte_al);?>" /></div>
            <div class='columns two'><label>LOGO </label></div><div class='columns two'><input type='text' class='validate[condRequired[funcCall[validateAdd]]] logo' maxlength='5' name='logo_al' value="<?php echo set_value("logo_al",$logo_al);?>" /></div>
          </div>
          <!--Code postal & Ville -->
          <div class='row'>
            <div class='columns two'><label>CODE POSTAL <span class='has-tip' title='obligatoire'>*</span></label></div>
            <!-- <div class='columns four'><input type='text' class='validate[required] code_postal' name='code_postal_al' value="<?php echo set_value("code_postal_al",$code_postal_al);?>" id='codepostal3' maxlength='5' /></div> -->
            <div class='columns four'>
              <select id="code_postal_al" class="code_postal required" name="code_postal_al">
                <option value=''></option>
                <option value='97100'>97100</option>
                <option value='97110'>97110</option>
                <option value='97111'>97111</option>
                <option value='97112'>97112</option>
                <option value='97113'>97113</option>
                <option value='97114'>97114</option>
                <option value='97115'>97115</option>
                <option value='97116'>97116</option>
                <option value='97117'>97117</option>
                <option value='97118'>97118</option>
                <option value='97119'>97119</option>
                <option value='97120'>97120</option>
                <option value='97121'>97121</option>
                <option value='97122'>97122</option>
                <option value='97123'>97123</option>
                <option value='97125'>97125</option>
                <option value='97126'>97126</option>
                <option value='97127'>97127</option>
                <option value='97128'>97128</option>
                <option value='97129'>97129</option>
                <option value='97130'>97130</option>
                <option value='97131'>97131</option>
                <option value='97132'>97132</option>
                <option value='97133'>97133</option>
                <option value='97134'>97134</option>
                <option value='97136'>97136</option>
                <option value='97137'>97137</option>
                <option value='97139'>97139</option>
                <option value='97140'>97140</option>
                <option value='97141'>97141</option>
                <option value='97142'>97142</option>
                <option value='97150'>97150</option>
                <option value='97160'>97160</option>
                <option value='97170'>97170</option>
                <option value='97180'>97180</option>
                <option value='97190'>97190</option>
                <option value='97200'>97200</option>
                <option value='97211'>97211</option>
                <option value='97212'>97212</option>
                <option value='97213'>97213</option>
                <option value='97214'>97214</option>
                <option value='97215'>97215</option>
                <option value='97216'>97216</option>
                <option value='97217'>97217</option>
                <option value='97218'>97218</option>
                <option value='97220'>97220</option>
                <option value='97221'>97221</option>
                <option value='97222'>97222</option>
                <option value='97223'>97223</option>
                <option value='97224'>97224</option>
                <option value='97225'>97225</option>
                <option value='97226'>97226</option>
                <option value='97227'>97227</option>
                <option value='97228'>97228</option>
                <option value='97229'>97229</option>
                <option value='97230'>97230</option>
                <option value='97231'>97231</option>
                <option value='97232'>97232</option>
                <option value='97233'>97233</option>
                <option value='97234'>97234</option>
                <option value='97240'>97240</option>
                <option value='97250'>97250</option>
                <option value='97260'>97260</option>
                <option value='97270'>97270</option>
                <option value='97280'>97280</option>
                <option value='97290'>97290</option>
                <option value='97300'>97300</option>
                <option value='97310'>97310</option>
                <option value='97311'>97311</option>
                <option value='97312'>97312</option>
                <option value='97313'>97313</option>
                <option value='97314'>97314</option>
                <option value='97315'>97315</option>
                <option value='97316'>97316</option>
                <option value='97317'>97317</option>
                <option value='97318'>97318</option>
                <option value='97319'>97319</option>
                <option value='97320'>97320</option>
                <option value='97330'>97330</option>
                <option value='97340'>97340</option>
                <option value='97350'>97350</option>
                <option value='97351'>97351</option>
                <option value='97352'>97352</option>
                <option value='97353'>97353</option>
                <option value='97354'>97354</option>
                <option value='97355'>97355</option>
                <option value='97356'>97356</option>
                <option value='97360'>97360</option>
                <option value='97370'>97370</option>
                <option value='97380'>97380</option>
                <option value='97390'>97390</option>
                <option value='97400'>97400</option>
                <option value='97410'>97410</option>
                <option value='97411'>97411</option>
                <option value='97412'>97412</option>
                <option value='97413'>97413</option>
                <option value='97414'>97414</option>
                <option value='97416'>97416</option>
                <option value='97417'>97417</option>
                <option value='97418'>97418</option>
                <option value='97419'>97419</option>
                <option value='97420'>97420</option>
                <option value='97421'>97421</option>
                <option value='97422'>97422</option>
                <option value='97423'>97423</option>
                <option value='97424'>97424</option>
                <option value='97425'>97425</option>
                <option value='97426'>97426</option>
                <option value='97427'>97427</option>
                <option value='97429'>97429</option>
                <option value='97430'>97430</option>
                <option value='97431'>97431</option>
                <option value='97432'>97432</option>
                <option value='97433'>97433</option>
                <option value='97434'>97434</option>
                <option value='97435'>97435</option>
                <option value='97436'>97436</option>
                <option value='97437'>97437</option>
                <option value='97438'>97438</option>
                <option value='97439'>97439</option>
                <option value='97440'>97440</option>
                <option value='97441'>97441</option>
                <option value='97442'>97442</option>
                <option value='97450'>97450</option>
                <option value='97460'>97460</option>
                <option value='97470'>97470</option>
                <option value='97480'>97480</option>
                <option value='97490'>97490</option>
              </select>
            </div>
            <div class='columns two'><label>VILLE<span class='has-tip' title='obligatoire'>*</span></label></div>
            <!--<div class='columns four'><input type='text' class='validate[required] ville' name='ville_al' value="<?php echo set_value("ville_al",$ville_al);?>" id='ville3' /></div>-->
            <div class='columns four'>
              <select id="ville_al" class="required ville" name="ville_al">
                <option value=""></option>
                <option value="BASSE TERRE">BASSE TERRE</option>
                <option value="POINTE A PITRE">POINTE A PITRE</option>
                <option value="MORNE A L\'EAU">MORNE A LEAU</option>
                <option value="GRAND BOURG">GRAND BOURG</option>
                <option value="GOURBEYRE">GOURBEYRE</option>
                <option value="TROIS RIVIERES">TROIS RIVIERES</option>
                <option value="SAINTE ROSE">SAINTE ROSE</option>
                <option value="POINTE NOIRE">POINTE NOIRE</option>
                <option value="PORT LOUIS">PORT LOUIS</option>
                <option value="SAINT FRANCOIS">SAINT FRANCOIS</option>
                <option value="VIEUX HABITANTS">VIEUX HABITANTS</option>
                <option value="SAINT CLAUDE">SAINT CLAUDE</option>
                <option value="ANSE BERTRAND">ANSE BERTRAND</option>
                <option value="BAIE-MAHAULT">BAIE-MAHAULT</option>
                <option value="BAILLIF">BAILLIF</option>
                <option value="BOUILLANTE">BOUILLANTE</option>
                <option value="DESHAIES">DESHAIES</option>
                <option value="LA DESIRADE">LA DESIRADE</option>
                <option value="GOYAVE">GOYAVE</option>
                <option value="LAMENTIN">LAMENTIN</option>
                <option value="BANANIER">BANANIER</option>
                <option value="CAPESTERRE BELLE EAU">CAPESTERRE BELLE EAU</option>
                <option value="SAINTE MARIE">SAINTE MARIE</option>
                <option value="LES MANGLES">LES MANGLES</option>
                <option value="PETIT CANAL">PETIT CANAL</option>
                <option value="BOUILLANTE">BOUILLANTE</option>
                <option value="PIGEON">PIGEON</option>
                <option value="SAINT BARTHELEMY">SAINT BARTHELEMY</option>
                <option value="SAINT LOUIS">SAINT LOUIS</option>
                <option value="TERRE DE BAS">TERRE DE BAS</option>
                <option value="TERRE DE HAUT">TERRE DE HAUT</option>
                <option value="LES ABYMES">LES ABYMES</option>
                <option value="CAPESTERRE DE MARIE GALANTE">CAPESTERRE DE MARIE GALANTE</option>
                <option value="VIEUX FORT">VIEUX FORT</option>
                <option value="LES ABYMES">LES ABYMES</option>
                <option value="SAINT MARTIN">SAINT MARTIN</option>
                <option value="LE MOULE">LE MOULE</option>
                <option value="PETIT BOURG">PETIT BOURG</option>
                <option value="DOUVILLE">DOUVILLE</option>
                <option value="SAINTE ANNE">SAINTE ANNE</option>
                <option value="LE GOSIER">LE GOSIER</option>
                <option value="FORT DE FRANCE">FORT DE FRANCE</option>
                <option value="RIVIERE PILOTE">RIVIERE PILOTE</option>
                <option value="SAINT JOSEPH">SAINT JOSEPH</option>
                <option value="GROS MORNE">GROS MORNE</option>
                <option value="LE LORRAIN">LE LORRAIN</option>
                <option value="PETIT BOURG">PETIT BOURG</option>
                <option value="RIVIERE SALEE">RIVIERE SALEE</option>
                <option value="L\'AJOUPA BOUILLON">LAJOUPA BOUILLON</option>
                <option value="LES ANSES D\'ARLETS">LES ANSES DARLETS</option>
                <option value="BASSE POINTE">BASSE POINTE</option>
                <option value="GRAND RIVIERE">GRAND RIVIERE</option>
                <option value="MACOUBA">MACOUBA</option>
                <option value="LA TRINITE">LA TRINITE</option>
                <option value="LE CARBET">LE CARBET</option>
                <option value="BELLEFONTAINE">BELLEFONTAINE</option>
                <option value="CASE PILOTE">CASE PILOTE</option>
                <option value="LE DIAMANT">LE DIAMANT</option>
                <option value="DUCOS">DUCOS</option>
                <option value="LE MARIGOT">LE MARIGOT</option>
                <option value="LE MORNE VERT">LE MORNE VERT</option>
                <option value="SAINTE ANNE">SAINTE ANNE</option>
                <option value="SAINTE LUCE">SAINTE LUCE</option>
                <option value="LES TROIS ILETS">LES TROIS ILETS</option>
                <option value="MORNE DES ESSES">MORNE DES ESSES</option>
                <option value="SAINTE MARIE">SAINTE MARIE</option>
                <option value="LE ROBERT">LE ROBERT</option>
                <option value="VERT PRE">VERT PRE</option>
                <option value="LE LAMENTIN">LE LAMENTIN</option>
                <option value="SCHOELCHER">SCHOELCHER</option>
                <option value="FORT DE FRANCE">FORT DE FRANCE</option>
                <option value="LE FRANCOIS">LE FRANCOIS</option>
                <option value="FONDS ST DENIS">FONDS ST DENIS</option>
                <option value="LE PRECHEUR">LE PRECHEUR</option>
                <option value="SAINT PIERRE">SAINT PIERRE</option>
                <option value="LE MORNE ROUGE">LE MORNE ROUGE</option>
                <option value="SAINT ESPRIT">SAINT ESPRIT</option>
                <option value="LE VAUCLIN">LE VAUCLIN</option>
                <option value="LE MARIN">LE MARIN</option>
                <option value="CAYENNE">CAYENNE</option>
                <option value="KOUROU">KOUROU</option>
                <option value="ROURA">ROURA</option>
                <option value="ST ELIE">ST ELIE</option>
                <option value="ST GEORGES">ST GEORGES</option>
                <option value="SAUL">SAUL</option>
                <option value="SINNAMARY">SINNAMARY</option>
                <option value="PAPAICHTON">PAPAICHTON</option>
                <option value="APATOU">APATOU</option>
                <option value="JAVOUHEY">JAVOUHEY</option>
                <option value="AWALA YALIMAPO">AWALA YALIMAPO</option>
                <option value="ST LAURENT DU MARONI">ST LAURENT DU MARONI</option>
                <option value="CAMOPI">CAMOPI</option>
                <option value="GRAND SANTI">GRAND SANTI</option>
                <option value="POMPIDOU PAPA ICHTON">POMPIDOU PAPA ICHTON</option>
                <option value="IRACOUBO">IRACOUBO</option>
                <option value="MATOURY">MATOURY</option>
                <option value="CACAO">CACAO</option>
                <option value="KAW">KAW</option>
                <option value="REMIRE MONTJOLY">REMIRE MONTJOLY</option>
                <option value="MACOURIA">MACOURIA</option>
                <option value="MACOURIA TONATE">MACOURIA TONATE</option>
                <option value="MONTSINERY TONNEGRANDE">MONTSINERY TONNEGRANDE</option>
                <option value="MANA">MANA</option>
                <option value="MARIPASOULA">MARIPASOULA</option>
                <option value="OUANARY">OUANARY</option>
                <option value="REGINA">REGINA</option>
                <option value="BELLE PIERRE">BELLE PIERRE</option>
                <option value="LE BRULE">LE BRULE</option>
                <option value="ST DENIS">ST DENIS</option>
                <option value="ST FRANCOIS">ST FRANCOIS</option>
                <option value="BASSE TERRE">BASSE TERRE</option>
                <option value="GRAND BOIS">GRAND BOIS</option>
                <option value="MONT VERT">MONT VERT</option>
                <option value="ST PIERRE">ST PIERRE</option>
                <option value="TERRE SAINTE">TERRE SAINTE</option>
                <option value="BOIS DE NEFLES ST PAUL">BOIS DE NEFLES ST PAUL</option>
                <option value="BRAS PANON">BRAS PANON</option>
                <option value="RIVIERE DU MAT">RIVIERE DU MAT</option>
                <option value="CILAOS">CILAOS</option>
                <option value="PALMISTE ROUGE">PALMISTE ROUGE</option>
                <option value="ENTRE DEUX">ENTRE DEUX</option>
                <option value="LA CHALOUPE">LA CHALOUPE</option>
                <option value="LA MONTAGNE">LA MONTAGNE</option>
                <option value="ST BERNARD">ST BERNARD</option>
                <option value="ST DENIS">ST DENIS</option>
                <option value="LA PLAINE DES CAFRES">LA PLAINE DES CAFRES</option>
                <option value="LA POSSESSION">LA POSSESSION</option>
                <option value="LA RIVIERE DES GALETS">LA RIVIERE DES GALETS</option>
                <option value="LE DOS D ANE">LE DOS D ANE</option>
                <option value="SAINT DENIS">SAINT DENIS</option>
                <option value="STE THERESE">STE THERESE</option>
                <option value="LE PORT">LE PORT</option>
                <option value="LA RIVIERE">LA RIVIERE</option>
                <option value="LES MAKES">LES MAKES</option>
                <option value="LA SALINE">LA SALINE</option>
                <option value="LE GUILLAUME">LE GUILLAUME</option>
                <option value="LE PITON ST LEU">LE PITON ST LEU</option>
                <option value="LE PLATE">LE PLATE</option>
                <option value="LES AVIRONS">LES AVIRONS</option>
                <option value="TEVELAVE">TEVELAVE</option>
                <option value="LES TROIS BASSINS">LES TROIS BASSINS</option>
                <option value="TROIS BASSINS">TROIS BASSINS</option>
                <option value="L ETANG SALE">L ETANG SALE</option>
                <option value="L ETANG SALE LES BAINS">L ETANG SALE LES BAINS</option>
                <option value="PETITE ILE">PETITE ILE</option>
                <option value="LE TAMPON">LE TAMPON</option>
                <option value="LES TROIS MARES">LES TROIS MARES</option>
                <option value="PONT D YVES">PONT D YVES</option>
                <option value="TAMPON 14EME KM">TAMPON 14EME KM</option>
                <option value="LA PLAINE DES PALMISTES">LA PLAINE DES PALMISTES</option>
                <option value="RAVINE DES CABRIS">RAVINE DES CABRIS</option>
                <option value="HELL BOURG">HELL BOURG</option>
                <option value="LA POSSESSION">LA POSSESSION</option>
                <option value="SALAZIE">SALAZIE</option>
                <option value="LA SALINE LES BAINS">LA SALINE LES BAINS</option>
                <option value="ST GILLES LES BAINS">ST GILLES LES BAINS</option>
                <option value="BERNICA">BERNICA</option>
                <option value="ST GILLES LES HAUTS">ST GILLES LES HAUTS</option>
                <option value="TAN ROUGE">TAN ROUGE</option>
                <option value="ST LEU">ST LEU</option>
                <option value="STE ANNE">STE ANNE</option>
                <option value="RIVIERE DES PLUIES">RIVIERE DES PLUIES</option>
                <option value="ROLAND GARROS AEROPORT">ROLAND GARROS AEROPORT</option>
                <option value="STE MARIE">STE MARIE</option>
                <option value="LE PITON STE ROSE">LE PITON STE ROSE</option>
                <option value="STE ROSE">STE ROSE</option>
                <option value="CAMBUSTON">CAMBUSTON</option>
                <option value="LA CRESSONNIERE">LA CRESSONNIERE</option>
                <option value="ST ANDRE">ST ANDRE</option>
                <option value="STE SUZANNE">STE SUZANNE</option>
                <option value="BASSE VALLEE">BASSE VALLEE</option>
                <option value="ST PHILIPPE">ST PHILIPPE</option>
                <option value="ST LOUIS">ST LOUIS</option>
                <option value="BELLEMENE">BELLEMENE</option>
                <option value="ST PAUL">ST PAUL</option>
                <option value="ST BENOIT">ST BENOIT</option>
                <option value="LES LIANES">LES LIANES</option>
                <option value="ST JOSEPH">ST JOSEPH</option>
                <option value="VINCENDO">VINCENDO</option>
                <option value="BOIS DE NEFLES ST DENIS">BOIS DE NEFLES ST DENIS</option>
                <option value="LA BRETAGNE">LA BRETAGNE</option>
                <option value="MOUFIA">MOUFIA</option>
                <option value="STE CLOTILDE">STE CLOTILDE</option>
              </select>
            </div>
          </div>
          
        </div>
        <!--end of adresse de livraison-->
        <div class="row">
           <div class="column twelve bottom-10 top-20">
            <label>
              <input type="checkbox" value="true" name="livraison_express" <?php echo ($livraison_express!="false")?"checked='checked'":"";?> class="left">
                Je souhaite être livré plus rapidement et bénéficier d’une livraison express gratuite après validation de ma commande. (72h à partir du traitement de ma commande).<br>
            </label>
            <span class='top-10 column'><strong>IMPORTANT :</strong> Dans ce cas, je renonce à mon droit de rétractation de <?php echo $delaiRetrac; ?> jours suivant l'achat.</span>
          </div>
        </div>

          <!--adresse principale-->
          <h3 class="lfsection_space">Adresse de messagerie principale :</h3>
          <div class="row">
            <div class="column twelve bottom-10">
              <label>Vous bénéficiez d’un compte e-mail médiaserv<br> avec une messagerie de 100 mo <span class='has-tip' title='obligatoire'>*</span></label>
            </div>
            <div class="column six"> 
               <input type='text' class='validate[required,funcCall[validateVerifyEmail]]' name='email_mediaserv' onchange="javascript:$('#verif_email').val('faux');" value="<?php echo set_value("email_mediaserv",$email_mediaserv);?>" id='email_mediaserv'/>
            </div>
            <div class="column three"> 
              <span class="postfix">@mediaserv.net</span>
            </div>
            <div class="column three"> 
              <input type="hidden" name="verif_email" id="verif_email" value="<?php echo set_value("verif_email",$verif_email);?>">
              <input type="button" name="VerifierEmail" onclick ="javascript:verifMailWebServ();" value="Vérifier" class="rmv-std-btn btn-verifier">
            </div>
            <div class="column twelve top-20">
              <label>Veuillez communiquer une adresse de messagerie de contact <span class='has-tip' title='obligatoire'>*</span></label> 
<!--              <input type="text" name="email" value="<?php //echo set_value("email",$email);?>" class="validate[required,custom[email]] six">-->
            </div>
            <div class='column six'>
              <input class='validate[required,funcCall[validateEmail]]' value="<?php echo set_value("email",$email);?>" type='text' name='email' /><span class='input-info'>Rassurez-vous, nous n'aimons pas non plus le SPAM</span></div>
             <div class='column end'>
              <a href='#' class='has-tip' data-width='360' title='Votre adresse de messagerie nous permettra de vous tenir informé sur l’évolution de votre commande. Rassurez vous, aucune sollicitation commerciale ne sera effectuée.'>
                 <?php echo image('info_icon.png',NULL,array("class"=>"border-gray", "alt"=>"Plus info")); ?>
              </a>
            </div>
           </div>

          <!--type de facturation-->
          <h3>Type de facturation :</h3>
          <div class="row">
              <input type="hidden" name="type_facturation_hid" id="type_facturation_hid" value="<?php echo set_value("type_facturation_hid",$type_de_facturation);?>"/>
              <?php 
                    foreach($factureData as $key=>$val){
                       if(strpos($val["Libelle"],"papier")==false){
                          if(empty($type_de_facturation)){
                       ?>
                           <div class="column four"><label><input type="radio" onclick="javascript:choixFacture('facture_electronique');" value="<?php echo $val["Id_crm"]; ?>" name="type_de_facturation" id="facture_electronique" checked="checked"> &Eacute;lectronique (gratuit)</label></div>
                      <?php
                          }else{?>
                             <div class="column four"><label><input type="radio" onclick="javascript:choixFacture('facture_electronique');" value="<?php echo $val["Id_crm"]; ?>" name="type_de_facturation" id="facture_electronique" <?php echo ($type_de_facturation=="facture_electronique")?'checked="checked"':''; ?>> &Eacute;lectronique (gratuit)</label></div> 
                      <?php    }
                       }else{
                                $tarifPapier = $val["Tarif"]>0?$val["Tarif"].'€':'gratuite';    
                                $facture_papier = '<span class="prix">('.$tarifPapier.')</span>';
                                if($val["Duree_mois_promo"]>0){
                                  $facture_papier = '<span class="promo">('.$val["Tarif"].'€)</span> <span class="prix">('.$val["Tarif_promo"].'€)</span>';
                                }
                           ?>
                            <div class="column four end facturepapier"> <label><input type="radio" onclick="javascript:choixFacture('facture_papier');" value="<?php echo $val["Id_crm"]; ?>" name="type_de_facturation" id="facture_papier" <?php echo (!empty($type_de_facturation)&&$type_de_facturation=="facture_papier")?'checked="checked"':''; ?> > Facture papier <?php echo $facture_papier; ?></label></div>
                       <?php
                       }
                    } 
              ?>
              <div class="column twelve top-20 confirm-loi" >
                <p>Conformément à la loi informatique et libertés du 6/01/1978, les informations recueillies et transmises dans le cadre de la présente souscription peuvent donner lieu à l'exercice du droit d'accès et de rectification auprès de Mediaserv</p>
              </div>
              <div class="column twelve top-10 confirm-loi" >
                <p>*mentions obligatoires</p>
              </div>
          </div>
          
          <!-- Sexy line -->
          <hr class="sexy">

          <!--back and submit buttom -->
           <div class="six custom-column back-button left"><a  id="prevEtape2A1" class="precedent" title="Retour à l'étape précédente" alt="Précedent">Précédent</a><?php //echo anchor('#','Précédent',array('title'=>"Retour à l'étape précédente",'class'=>'precedent','id'=>'prevEtape2A1','alt'=>'Précedent')); ?></div>
          <div class="six custom-column text-right"> <input type="submit" value="SUIVANT" name="suivant" class="btn-forward rmv-std-btn" title="Etape suivante : voir le récapitulatif"></div>
        </form>
</div>

<script>
    // List of 'codepostal' and 'ville' from webservice
    <?php
        $codePostalVille = ""; 
        foreach($wsVille as $key=>$val){
          if(is_array($val)){
            if($key==(sizeof($wsVille)-1)){
                $codePostalVille .= "{'codepostal':'".$val["Code_postal"]."','ville':'".$val["Code_ville"]."'}";
            }else{
                $codePostalVille .= "{'codepostal':'".$val["Code_postal"]."','ville':'".$val["Code_ville"]."'},";
            }
          }else{
              $codePostalVille .= "{'codepostal':'".$wsVille["Code_postal"]."','ville':'".$wsVille["Code_ville"]."'}";
              break;
          }
       }
    ?>

    var WsVilleSet = { "data":[<?php echo $codePostalVille; ?>]};

    //ADRESSES ABONNEMENT
    setSelectDefault('#comp_numero_aa', '<?php echo set_value("comp_numero_aa",$comp_numero_aa);?>' );
    setSelectDefault('#type_voie_aa', '<?php echo set_value("type_voie_aa",$type_voie_aa);?>' );
    setSelectDefault('#code_postal_aa', '<?php echo set_value("code_postal_aa",$code_postal_aa);?>' );
    setSelectDefault('#ville_aa', '<?php echo set_value("ville_aa",$ville_aa);?>' );

    //ADRESSE DE FACTURATION
    setSelectDefault('#comp_numero_af', '<?php echo set_value("comp_numero_af",$comp_numero_af);?>' );
    setSelectDefault('#type_voie_af', '<?php echo set_value("type_voie_af",$type_voie_af);?>' );
    setSelectDefault('#code_postal_af', '<?php echo set_value("code_postal_af",$code_postal_af);?>' );
    setSelectDefault('#ville_af', '<?php echo set_value("ville_af",$ville_af);?>' );
    
    //ADRESSE DE LIVRAISON
    setSelectDefault('#comp_numero_al', '<?php echo set_value("comp_numero_al",$comp_numero_al);?>' );
    setSelectDefault('#type_voie_al', '<?php echo set_value("type_voie_al",$type_voie_al);?>' );
    setSelectDefault('#code_postal_al', '<?php echo set_value("code_postal_al",$code_postal_al);?>' );
    setSelectDefault('#ville_al', '<?php echo set_value("ville_al",$ville_al);?>' );

    $(function(){
        $('#cmb-code_postal_aa').blur(function(){
            SetVilleOptions($(this).val(), '#ville_aa', WsVilleSet); 
        });
    });

</script>