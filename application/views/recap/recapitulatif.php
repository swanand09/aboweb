<div class="left-etape-content recapitulatif">
    <div class="row">
<!--    INSTALLATION    -->
    <div class='column twelve bottom-20 recap-add'>
        <label class='top-20'><strong>Vos coordonnées</strong></label>
        <div class='val civilite-prenom-nom'><?php echo $civilite_aa." ".$prenom_aa." ".$nom_aa;?></div>
        <div class='val numero-complement-numero-type-de-voie'>  <?php echo $numero_aa." ".$comp_numero_aa." ".$type_voie_aa." ".$voie_aa; ?></div>
        <div class='val adresse-suite'> <?php echo $adresse_suite_aa;?></div>
        <div class='val ensemble'><?php echo !empty($ensemble_aa)?"Ensemble ".$ensemble_aa:""; ?></div>
        <div class='val escalier-etage-porte'> <?php echo !empty($batiment_aa)?"Bat ".$batiment_aa:""; ?>  <?php echo !empty($escalier_aa)?"Escalier ".$escalier_aa:""; ?>  <?php echo !empty($etage_aa)?"Etage ".$etage_aa:""; ?>  <?php echo !empty($porte_aa)?"Porte ".$porte_aa:""; ?></div>
        <div class='val logo'> <?php echo !empty($logo_aa)?"Logo ".$logo_aa:""; ?></div>
        <div class='val code-postal-ville'><?php echo $code_postal_aa." ".$ville_aa;?></div>
        <div class="val"><?php echo "portable: ".$telephone_portable;?><?php echo !empty($telephone_bureau)?", bureau: ".$telephone_bureau:"";?><?php echo !empty($telephone_domicile)?", domicile: ".$telephone_domicile:""; ?></div>
       
<!--     </div> -->
       <?php if(empty($check_adresse_facturation)){ ?>
<!--     FACTURATION-->
<!--        <div class='column twelve bottom-20 recap-add'>-->
           <label class='top-20'><strong>Adresse de facturation</strong></label>
           <div class='val civilite-prenom-nom'> <?php echo $civilite_af." ".$prenom_af." ".$nom_af; ?></div>
           <div class='val numero-complement-numero-type-de-voie'>  <?php echo $numero_af." ".$comp_numero_af." ".$type_voie_af." ".$voie_af; ?></div>
           <div class='val adresse-suite'>  <?php echo $adresse_suite_af;?></div>
           <div class='val code-postal-ville'><?php echo $code_postal_af." ".$ville_af;?></div>     
<!--        </div>     -->
       <?php } 
       if(empty($check_adresse_livraison)){ ?>
<!--        LIVRAISON -->
<!--        <div class='column twelve bottom-20 recap-add'>-->
           <label class='top-20'><strong>Adresse de livraison</strong></label>
           <div class='val civilite-prenom-nom'> <?php echo $civilite_al." ".$prenom_al." ".$nom_al; ?></div>
           <div class='val numero-complement-numero-type-de-voie'>  <?php echo $numero_al." ".$comp_numero_al." ".$type_voie_al." ".$voie_al; ?></div>
           <div class='val adresse-suite'>  <?php echo $adresse_suite_al;?></div>
           <div class='val ensemble'>Ensemble <?php echo $ensemble_al; ?></div>
           <div class='val escalier-etage-porte'>Bat <?php echo $batiment_al; ?> Escalier <?php echo $escalier_al; ?> Etage <?php echo $etage_al; ?> Porte <?php echo $porte_al; ?></div>
           <div class='val logo'>Logo <?php echo $logo_al; ?></div>
           <div class='val code-postal-ville'><?php echo $code_postal_al." ".$ville_al;?></div>
<!--        </div>   -->
       <?php } ?> 

<?php if($livraison_express=="true"){ ?>
<!--<div class='column twelve bottom-20 recap-add'>-->
    <div class="top-20">
        <div class="top-20">
          <p><strong>Vous souhaitez bénéficier d'une livraison express et vous renoncez ainsi au délai de rétractation de 7 jours.</strong></p>
        </div>
    </div>
<!--</div>   -->
<?php }else{ ?>
<!--<div class='column twelve bottom-20 recap-add'>-->
    <div class="top-20">
        <div class="top-20">
          <p><strong>Conformément à la loi informatique et libertés du 6/01/1978, les informations recueillies et transmises dans le cadre de la présente souscription peuvent donner lieu à l'exercice du droit d'accès et de rectification auprès de Mediaserv</strong></p>
        </div>
    </div>
<!--</div>   -->
<?php } ?>
<!-- <div class='column twelve bottom-20 recap-add'>-->
        <div class='top-20'><strong>Votre adresse médiaServ est : </strong><span class='green-text'><?php echo $email_mediaserv."@mediaserv.net"; ?></span></div>
     </div>        
    </div>
    <hr class="sexy">
    <div class="row">
      <div class="column twelve"><label><strong>Vous profitez en plus de :</strong></label></div>
      <div class="column six top-20 end"><?php echo image('promo_nouveau_forfait.png',NULL,array("title"=>"Nouveau Forfaite 49,99€ TTC par mois", "alt"=>"Nouveau Forfaite 49,99€ TTC par mois")); ?></div>
    </div>
    <hr class="sexy">
    <form id='frm-mon-recap' action="paiement" method="POST">
        <div class="row">
          <?php
          $prefixNum= substr($this->session->userdata("num_tel"),0,4);
          $region_class = ($prefixNum != "0262" ) ? "":"RE";
          ?>
          <div class="column twelve conditions"><label><input id='cgu-link' type="checkbox" class='validate[required] left <?php print $region_class;?>'  value="conditions" name="recap" class="left"><strong class="left">Je déclare avoir pris connaissance et accepté dans toutes leur teneur les Conditions Générales d’Inscriptions aux Services haut débit et de téléphonie fixe, ainsi que les descriptifs et les tarifs des offres.</strong></label></div>
<!--      <div class="column twelve top-20"><label><input type="checkbox" value="mandat" name="recap"><strong>Je donne mandat à MEDIASERV……..</strong></label></div>-->
         <div class='column twelve top-20'><label><input class='validate[required] left' type='checkbox' name='mandat' value='mandat'/><strong class='left'>Je déclare être le titulaire de la ligne à dégrouper et disposer d’un abonnement téléphonique auprès de France Télécom/Orange. Sous réserve d’éligibilité de ma ligne, je souscris à l’offre de dégroupage total et donne expressément mandat à mediaserv, Tour Sécid 6ème étage, place de la Rénovation, 97 110 Pointe à Pitre, pour effectuer en mon nom et pour mon compte les opérations correspondant au dégroupage total. Je reconnais avoir été informé(e) que la mise en oeuvre de cette modalité de dégroupage entraînera la résiliation du contrat d’abonnement au service téléphonique de France Télécom/Orange ou auprès de votre fournisseur d’accès actuel..</strong></label></div>   
        </div>

        <!--back and submit buttom -->
        <div class="row">
          <div class="six column back-button left top-20"><?php echo anchor('mes_coordonnees','Modifier',array('title'=>"Retour à l'étape précédente",'class'=>'precedent','alt'=>'Modifier')); ?></div>
          <div class="six column text-right top-20"> <input type="submit" value="Confirmer mon choix" name="suivant" class="btn-confirmer rmv-std-btn" title='Etape suivante : paiement'></div> 
        </div>
    </form>
</div>