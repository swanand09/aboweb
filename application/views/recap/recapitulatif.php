<div class="left-etape-content recapitulatif">
    <div class="row">
      <div class="column twelve bottom-20">
        <label class="top-20"><strong>Vos coordonnées(adresse d'installation)</strong></label>
        <span class="val"><?php echo $civilite_aa." ".$prenom_aa." ".$nom_aa;?></span>
        <label class="top-20"><strong>Adresse d'installation</strong></label>
        <span class="val">
            <?php echo $numero_aa." ".$comp_numero_aa." ".$type_voie_aa." ".$voie_aa; ?><br>
            <?php echo $adresse_suite_aa." ".$ensemble_aa." ".$batiment_aa." ".$escalier_aa; ?><br>
            <?php echo $etage_aa." ".$porte_aa." ".$logo_aa; ?><br>
            <?php echo $code_postal_aa." ".$ville_aa; ?>
        </span>
        <label class="top-20"><strong>Téléphones</strong></label>
        <span class="val">
            <?php echo $telephone_portable." ".$telephone_bureau." ".$telephone_domicile; ?>
        </span>
        
        <?php if(empty($check_adresse_facturation)){ ?>
        <label class="top-20"><strong>Adresse de facturation</strong></label>        
        <span class="val">
            <?php echo $civilite_af." ".$prenom_af." ".$nom_af; ?><br>
            <?php echo $numero_af." ".$comp_numero_af." ".$type_voie_af." ".$voie_af; ?><br>
            <?php echo $adresse_suite_af." ".$code_postal_af." ".$ville_af; ?><br>
        </span>
        
        <?php }if(empty($check_adresse_livraison)){ ?>
        <label class="top-20"><strong>Adresse de livraison</strong></label>        
        <span class="val">
            <?php echo $civilite_al." ".$prenom_al." ".$nom_al; ?><br>
            <?php echo $numero_al." ".$comp_numero_al." ".$type_voie_al." ".$voie_al; ?><br>
            <?php echo $adresse_suite_al." ".$ensemble_al." ".$batiment_al." ".$escalier_al; ?><br>
            <?php echo $etage_al." ".$porte_al." ".$logo_al; ?><br>
            <?php echo $code_postal_al." ".$ville_al; ?><br>
        </span>
        <?php }if(!empty($livraison_express)&&isset($livraison_express)&&$livraison_express=="true"){ ?>
        <label class="top-20"><strong>Vous souhaitez une livraison express</strong></label>
        <?php }?>
        <label class="top-20"><strong>Votre adresse médiaServ est : </strong><a href="mailto:<?php echo $email_mediaserv."@mediaserv.net"; ?>" class="mail-link"><?php echo $email_mediaserv."@mediaserv.net"; ?></a></label>
         <label class="top-20"><strong>Type de facturation</strong></label>
         <span class="val"><?php echo $type_de_facturation[1]; ?></span>
      </div>
    </div>
    <hr class="sexy">
    <div class="row">
      <div class="column twelve"><label><strong>Vous profitez en plus de :</strong></label></div>
      <div class="column six top-20"><?php echo image('promo_nouveau_forfait.png',NULL,array("title"=>"Nouveau Forfaite 49,99€ TTC par mois", "alt"=>"Nouveau Forfaite 49,99€ TTC par mois")); ?></div>
      <div class="column six top-20 border-left-gray">
        <h4>PARRAINEZ C'EST GAGNEZ</h4>
        <p><strong>Parrainez vos proches et bénéficiez de 25 € d'avoir pour chaque filleul devenu client </strong></p>
      </div>
    </div>
    <hr class="sexy">
    <form id='frm-mon-recap' action="paiement" method="POST">
        <div class="row">
          <div class="column twelve conditions"><label><input type="checkbox" class='validate[required] left'  value="conditions" name="recap" class="left"><strong class="left">Je déclare avoir pris connaissance et accepté dans toutes leur teneur les Conditions Générales d’Inscriptions aux Services haut débit et de téléphonie fixe, ainsi que les descriptifs et les tarifs des offres.</strong></label></div>
<!--      <div class="column twelve top-20"><label><input type="checkbox" value="mandat" name="recap"><strong>Je donne mandat à MEDIASERV……..</strong></label></div>-->
         <div class='column twelve top-20'><label><input class='validate[required] left' type='checkbox' name='mandat' value='mandat'/><strong class='left'>Je déclare être le titulaire de la ligne à dégrouper et disposer d’un abonnement téléphonique auprès de France Télécom/Orange. Sous réserve d’éligibilité de ma ligne, je souscris à l’offre de dégroupage total et donne expressément mandat à mediaserv, Tour Sécid 6ème étage, place de la Rénovation, 97 110 Pointe à Pitre, pour effectuer en mon nom et pour mon compte les opérations correspondant au dégroupage total. Je reconnais avoir été informé(e) que la mise en oeuvre de cette modalité de dégroupage entraînera la résiliation du contrat d’abonnement au service téléphonique de France Télécom/Orange ou auprès de votre fournisseur d’accès actuel..</strong></label></div>   
        </div>

        <!--back and submit buttom -->
        <div class="row">
          <div class="six column back-button left top-20"><?php echo anchor('mes_coordonnees','Modifier',array('title'=>'Modifier','class'=>'precedent','alt'=>'Modifier')); ?></div>
          <div class="six column text-right top-20"> <input type="submit" value="Confirmer mon choix" name="suivant" class="btn-confirmer rmv-std-btn"></div> 
        </div>
    </form>
</div>