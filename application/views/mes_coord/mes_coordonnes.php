<?php 
//echo validation_errors();
?>
<div class="left-etape-content">
    <form action="recapitulatif" method="POST" id="mes-coordonnees">
        <input type="hidden" name="page_3" value="mes_coordonnes" />
      <!--Adresse coordonnées-->
        <div class="adresse-abonnement">
          <h3>COORDONNÉES (ADRESSES ABONNEMENT):</h3>
         <!-- Civilité-->
          <div class="row">
            <div class="columns two bottom-10"><label>Civilité:<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class="columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="M.")?"checked='checked'":"";?> class="validate[required]">Monsieur</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_aa" <?php echo (set_value("civilite_aa",$civilite_aa)=="Mme")?"checked='checked'":"";?> class="validate[required]">Madame</label>
            </div>
          </div>
         
         <!-- Nom -->
          <div class="row">
            <div class='columns two'><label>Nom :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] nom' name='nom_aa' value="<?php echo set_value("nom_aa",$nom_aa);?>" /></div>
          </div>
          <!--Prénom -->
          <div class="row">
            <div class='columns two'><label>Prénom :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] prenom' name='prenom_aa' value="<?php echo set_value("prenom_aa",$prenom_aa);?>" /></div>
          </div>
          <!--Numéro & Complément numéro-->
          <div class="row">
            <div class='columns two'><label>Numéro :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='two columns'><input type='text' class='validate[required,custom[integer],min[1],max[99999]] numero' value="<?php echo set_value("numero_aa",$numero_aa);?>" name='numero_aa' /></div>
            <div class='columns two'><label>Complément numéro :</label></div><div class='two columns'><input type='text' class='comp_numero validate[funcCall[validateCompNumEntryList]]' name='comp_numero_aa' value="<?php echo set_value("comp_numero_aa",$comp_numero_aa);?>" /></div>              
            <div class='columns two'><label>Type de Voie :</label></div><div class='columns two'><input type='text' class='type_voie validate[funcCall[validateVoieEntryList]]' name='type_voie_aa' value="<?php echo set_value("type_voie_aa",$type_voie_aa);?>" /></div>
          </div>
          
           <!--Addresse-->
          <div class="row">
            <div class='columns two'><label>Adresse :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='four columns'><input type='text' class='validate[required,funcCall[validateAdd]] adresse' maxlength='200' name='voie_aa' value="<?php echo set_value("voie_aa",$voie_aa);?>" /></div>
            <div class='columns two'><label>Adresse suite :</label></div><div class='four columns'><input type='text'  class='validate[maxSize[64]] adresse_suite' name='adresse_suite_aa' value="<?php echo set_value("adresse_suite_aa",$adresse_suite_aa);?>" /></div>
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
          
         
          
          <!--Code postal & Ville & Localisation-->
           <div class="row">
                <div class='columns two'><label>Code postal :<span class='has-tip' title='obligatoire'>*</span></label></div>
                <div class='columns two'><input type='text' class='validate[required,funcCall[validateCodePostalEntryList]]' name='code_postal_aa' id='codepostal' value="<?php echo set_value("code_postal_aa",$code_postal_aa);?>"/></div>
                <div class='columns one'><label>Ville :<span class='has-tip' title='obligatoire'>*</span></label></div>
                <div class='columns four end'><input type='text' class='validate[required,funcCall[validateVilleEntryList]] ville' name='ville_aa' id='ville' value="<?php echo set_value("ville_aa",$ville_aa);?>"/></div>
          </div>
  
          <h3 class="lfsection_space">TÉLÉPHONES</h3>
          <div class="row">
            <div class="columns"><label>Téléphone portable :<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class='columns '><input type='text' value="<?php echo set_value("telephone_portable",$telephone_portable);?>" class='validate[required,funcCall[validateTelephonePortable]] telephone telephone_portable' name='telephone_portable' maxlength='10'/></div>
            <div class='column end'>
                <a href='#' class='has-tip' data-width='360' title='Votre numéro de téléphone mobile vous permettra de recevoir par SMS les informations liées à l’évolution de votre activation ainsi que du suivi de votre livraison.'>
                    <?php echo image('info_icon.png',NULL,array("class"=>"border-gray", "alt"=>"Plus info")); ?>
                </a>
            </div>
          </div>
          <div class="row">
            <div class="columns"><label>Téléphone de bureau :</label></div><div class="columns end"><input type="text" name="telephone_bureau" value="<?php echo set_value("telephone_bureau",$telephone_bureau);?>" class="telephone_bureau telephone" maxlength='10'></div>
          </div>
          <div class="row">
            <div class="columns"><label>Téléphone du domicile :</label></div><div class="columns end"><input type="text" name="telephone_domicile" value="<?php echo set_value("telephone_domicile",$telephone_domicile);?>" class="telephone_domicile telephone" maxlength='10'></div>
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
            <div class="columns bottom-10 two"><label>Civilité:<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class="columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_af" <?php echo (set_value("civilite_af",$civilite_af)=="M.")?"checked='checked'":"";?> class="validate[required]">Monsieur</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_af" <?php echo (set_value("civilite_af",$civilite_af)=="Mme")?"checked='checked'":"";?> class="validate[required]">Madame</label>
            </div>
          </div>
          <!-- Nom -->
          <div class="row">
             <div class='columns two'><label>Nom :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] nom' name='nom_af' value="<?php echo set_value("nom_af",$nom_af);?>" /></div>
          </div>
          <!--Prénom -->
          <div class="row">
             <div class='columns two'><label>Prénom :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] prenom' name='prenom_af' value="<?php echo set_value("prenom_af",$prenom_af);?>" /></div>
          </div>
          <!--Numéro & Complément numéro-->
          <div class="row">
            <div class="columns two"><label>Numéro :<span class='has-tip' title='obligatoire'>*</span></label></div><div class="two columns"><input type="text" name="numero_af" value="<?php echo set_value("numero_af",$numero_af);?>" class='numero validate[required,custom[integer],min[1],max[99999]]'></div>
            <div class='columns two'><label>Complément numéro :</label></div><div class='two columns'><input type='text' class='comp_numero validate[funcCall[validateCompNumEntryList]]' name='comp_numero_af' value="<?php echo set_value("comp_numero_af",$comp_numero_af);?>" /></div>              
            <div class='columns two'><label>Type de Voie :</label></div><div class='columns two'><input type='text' class='type_voie validate[funcCall[validateVoieEntryList]]' name='type_voie_af' value="<?php echo set_value("type_voie_af",$type_voie_af);?>" /></div>
          </div>
          
          <!--Addresse suite-->
          <div class="row">
            <div class='columns two'><label>Adresse :</label></div><div class='four columns'><input type='text' class='validate[maxSize[64]] adresse' name='voie_af' value="<?php echo set_value("voie_af",$voie_af);?>" /></div>
            <div class='columns two'><label>Adresse suite :</label></div><div class='four columns'><input type='text' class='validate[maxSize[64]] adresse_suite' name='adresse_suite_af' value="<?php echo set_value("adresse_suite_af",$adresse_suite_af);?>" /></div>
          </div>
          <!--Code postal & Ville -->
          <div class="row">
            <div class='columns two'><label>Code postal :</label></div>
            <div class='columns two'><input type='text' class='validate[required] code_postal' name='code_postal_af' id='codepostal2' value="<?php echo set_value("code_postal_af",$code_postal_af);?>" /></div>
            <div class='columns one'><label>Ville :</label></div>
            <div class='columns four end'><input type='text' class='validate[required] ville' name='ville_af' value="<?php echo set_value("ville_af",$ville_af);?>" id='ville2' /></div>
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
            <div class="columns bottom-10 two"><label>Civilité:<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class="five columns bottom-10 end">
              <label class="left"><input type="radio" value="M." name="civilite_al" <?php echo (set_value("civilite_al",$civilite_al)=="M.")?"checked='checked'":"";?> class="validate[required]">Monsieur</label>
              <label class="left"><input type="radio" value="Mme" name="civilite_al" <?php echo (set_value("civilite_al",$civilite_al)=="Mme")?"checked='checked'":"";?> class="validate[required]">Madame</label>
            </div>
          </div>
         
          <!-- Nom -->
          <div class='row'>
            <div class='columns two'><label>Nom :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] nom' name='nom_al' value="<?php echo set_value("nom_al",$nom_al);?>" /></div>
          </div>
          <!--Prénom -->
          <div class='row'>
            <div class='columns two'><label>Prénom :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='seven columns end'><input type='text' class='validate[required,maxSize[30]] prenom' name='prenom_al' value="<?php echo set_value("prenom_al",$prenom_al);?>" /></div>
          </div>
          
          
          <!--Numéro & Complément numéro 7 type de voie-->
          <div class='row'>
            <div class='columns two'><label>Numéro :<span class='has-tip' title='obligatoire'>*</span></label></div><div class='two columns'><input type='text' class='numero validate[required,custom[integer],min[1],max[99999]]' name='numero_al' value="<?php echo set_value("numero_al",$numero_al);?>" /></div>
            <div class='columns two'><label>Complément numéro:</label></div><div class='two columns'><input type='text' class='comp_numero validate[funcCall[validateCompNumEntryList]]' name='comp_numero_al' value="<?php echo set_value("comp_numero_al",$comp_numero_al);?>" /></div>              
            <div class='columns two'><label>Type de Voie :</label></div><div class='columns two'><input type='text' class='type_voie validate[funcCall[validateVoieEntryList]]' name='type_voie_al' value="<?php echo set_value("type_voie_al",$type_voie_al);?>" /></div>
          </div>
          
          <!--Addresse-->
          <div class='row'>
            <div class='columns two'><label>Adresse :</label></div><div class='four columns'><input type='text' class='validate[maxSize[64]] adresse' name='voie_al' value="<?php echo set_value("voie_al",$voie_al);?>" /></div>
            <div class='columns two'><label>Adresse suite :</label></div><div class='four columns'><input type='text' class='validate[maxSize[64]] adresse_suite' name='adresse_suite_al' value="<?php echo set_value("adresse_suite_al",$adresse_suite_al);?>" /></div>            
          </div>
         
          <!--Ensemble & Batiment & Escalier-->
          <div class='row'>
            <div class='columns two'><label>Ensemble</label></div><div class='columns two'><input type='text' class='validate[maxSize[20]] ensemble' name='ensemble_al' value="<?php echo set_value("ensemble_al",$ensemble_al);?>" /></div>
            <div class='columns two'><label>Batiment :</label></div><div class='columns two'><input type='text' class='validate[maxSize[4]] batiment' name='batiment_al' value="<?php echo set_value("batiment_al",$batiment_al);?>" /></div>
            <div class='columns two'><label>Escalier :</label></div><div class='columns two'><input type='text' class='validate[maxSize[2]] escalier' name='escalier_al' size='2' value="<?php echo set_value("escalier_al",$escalier_al);?>" /></div>
          </div>
          
         <!--Etage & Porte & logo-->
          <div class='row'>
            <div class='columns two'><label>Etage :</label></div><div class='columns two'><input type='text' class='validate[maxSize[2]] etage' name='etage_al' size='2' value="<?php echo set_value("etage_al",$etage_al);?>" /></div>
            <div class='columns two'><label>Porte :</label></div><div class='columns two'><input type='text' class='validate[maxSize[5]] porte' name='porte_al' value="<?php echo set_value("porte_al",$porte_al);?>" /></div>
            <div class='columns two'><label>Logo :</label></div><div class='columns two'><input type='text' class='validate[maxSize[5]] logo' name='logo_al' value="<?php echo set_value("logo_al",$logo_al);?>" /></div>
          </div>
          <!--Code postal & Ville -->
          <div class='row'>
            <div class='columns two'><label>Code postal :<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class='columns two'><input type='text' class='validate[required] code_postal' name='code_postal_al' value="<?php echo set_value("code_postal_al",$code_postal_al);?>" id='codepostal3' /></div>
            <div class='columns one'><label>Ville :<span class='has-tip' title='obligatoire'>*</span></label></div>
            <div class='columns four end'><input type='text' class='validate[required] ville' name='ville_al' value="<?php echo set_value("ville_al",$ville_al);?>" id='ville3' /></div>            
          </div>
          
        </div>
        <!--end of adresse de livraison-->
        <div class="row">
           <div class="column twelve bottom-10 top-20">
            <label>
              <input type="checkbox" value="true" name="livraison_express" <?php echo ($livraison_express!="false")?"checked='checked'":"";?> class="left">
                Je souhaite être livré plus rapidement et bénéficier d’une livraison express après validation de ma commande. (72h à partir du traitement de ma commande).<br>
            </label>
            <span class='top-10 column'><strong>IMPORTANT :</strong> Dans ce cas, je renonce à mon droit de rétractation de 7 jours suivant l'achats.</span>
          </div>
        </div>

          <!--adresse principale-->
          <h3 class="lfsection_space">Adresse de messagerie principale :</h3>
          <div class="row">
            <div class="column twelve bottom-10">
              <label>Vous bénéficiez d’un compte e-mail médiaserv<br> avec une messagerie de 100 mo</label>
            </div>
            <div class="column six"> 
               <input type='text' class='validate[required,funcCall[validateVerifyEmail]]' name='email_mediaserv' onchange="javascript:$('#verif_email').val('faux');" value="<?php echo set_value("email_mediaserv",$email_mediaserv);?>" id='email_mediaserv'/><span class='has-tip' title='obligatoire'>*</span>
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
                           <div class="column four"><label><input type="radio" onclick="javascript:choixFacture('facture_electronique');" value="<?php echo $val["Id_crm"]; ?>" name="type_de_facturation" id="facture_electronique" checked="checked"> Electronique (gratuit)</label></div>
                      <?php
                          }else{?>
                             <div class="column four"><label><input type="radio" onclick="javascript:choixFacture('facture_electronique');" value="<?php echo $val["Id_crm"]; ?>" name="type_de_facturation" id="facture_electronique" <?php echo ($type_de_facturation=="facture_electronique")?'checked="checked"':''; ?>> Electronique (gratuit)</label></div> 
                      <?php    }
                       }else{
                                $facture_papier = '<span class="prix">('.$val["Tarif"].'€)</span>';
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
          </div>
          
          <!-- Sexy line -->
          <hr class="sexy">

          <!--back and submit buttom -->
          <div class="six custom-column back-button left"><?php echo anchor('mon_offre','Précedent',array('title'=>"Retour à l'étape précédente",'class'=>'precedent','alt'=>'Précedent')); ?></div>
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
    var WSvilleSet = { "data":[<?php echo $codePostalVille; ?>]};
    var WScodePostalSet = new Array();

    //extracting codepostal and pushing to array WScodePostalSet
    $.each(WSvilleSet.data,function(key,value){
      WScodePostalSet.push(value.codepostal);
    });

    //Adding the extracted codepostal as autocomplete functionality to #codepostal
    $('#codepostal').autocomplete({ 
      source:$.unique(WScodePostalSet), 
      minLength:1, 
    });

    //adding autocomplete to #ville depending on extracted list of codepostal
    autocompleteVille('#ville','#codepostal',WScodePostalSet,WSvilleSet);
    
    
    /*------------------------------------------------
    * Function to prevent user from entering a value / the user must select the value from the list
    * @param {jqObject} the field where the validation applies
    * @param {Array[String]} validation rules for this field
    * @param {int} rule index
    * @param {Map} form options
    * @return an error string if validation failed
    */
    var validateCodePostalEntryList = function( field, rules, i, options ){

      var searchResult = new Array();
      var WSvilleSet = { "data":[<?php echo $codePostalVille; ?>]};

      searchResult = $.grep(WSvilleSet.data,function(key, item) { return key.codepostal == field.val() });
      if(searchResult.length == 0 )
      {
        $(field).autocomplete("search");
        return "Veuillez choisir un Code Postal dans la liste";
      }

    };
</script>