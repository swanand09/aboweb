  <section class='seven column centered page-merci'>
        <div class='row cwidth'>
          <h1 class='text-center'>FÉLICITATIONS!<br/>BIENVENUE CHEZ MEDIASERV !</h1>
          <p class='text-center'><strong>Vous pourrez très prochainement profiter de vos services !</strong></p>
          <ul class='calque'>
            <li class='fir'>
              <h3>AUJOURD'HUI</h3>
              <?php echo image('contenu/merci_auj.png')?>
              <p>VOUS complétez et<br/>envoyer votre dossier</p>
            </li>
            <li class='sec'>
              <h3>DANS <span>7</span> JOURS</h3>
              <?php echo image('contenu/merci_7.png')?>
              <p>NOUS expedions<br/>votre commande</p>
            </li>
            <li class='thi'>
              <h3>APRÉS <span>10</span> JOURS</h3>
              <?php echo image('contenu/merci_10.png')?>
              <p>Nous activons<br/>vos services</p>
            </li> 
          </ul>
        </div>

        <div class="row">
          <div class='column cwidth'>
            <p class='sf'>
              <strong> >Voici le rappel de vos informations, qui vous seront également communiquées par email.</strong>
            </p>
            <ul>
              <li class='left'>Votre numéro de contrat: <span class='green-text'>RE123456</span></li>
              <li class='left mleft35'>Votre numéro de client: <span class='green-text'>REP123456</span></li>
              <li class='clear'>Votre numéro de téléphone: <span class='green-text'><?php echo $this->session->userdata("telephone_domicile"); ?></span></li>
              <li>Votre email Mediaserv: <span class='green-text'><?php echo $this->session->userdata("email_mediaserv")."@mediaserv.net"; ?></span></li>
            </ul>
          </div>
        </div>
        
        <div class="row">
          <div class='column cwidth twelve shadow bottom-20 p30all'>
             <?php echo ($moyen_paiement=="PR")?"<span class='green-text'>Vous avez soucrit par prélèvement automatique.</span><br /> Afin de compléter votre dossier, veuillez renvoyer les documents ci-dessous <br/>
            à l'adresse suivante : MEDIASERV – CS 41077 97495 STE CLOTILDE CEDEX":"<span class='green-text'>Vous avez valdé votre commande par Carte Bancaire. </span><br />Vous avec validé votre commande par Carte Bancaire
Afin de compléter votre dossier, veuillez vous rendre dans l'espace Mediaserv le plus proche de chez vous muni des pièces indiquées ci-dessous: ";?>
           
            <ul class='no-margin-bottom top-10'>
              <li>Une photocopie de votre pièce d’identité</li>
              <li>Une photocopie d’une facture récente France Télécom</li>
                <?php if($moyen_paiement=="PR"){?>
                <li><?php echo anchor("paiement/generateFpdf","Le mandat SEPA à télécharger"); ?>, compléter, dater, signer accompagné de votre RIB</li>
                <?php }else{$this->session->destroy();}  ?>
            </ul>
        </div>
        </div>
        <div class='row bottom-20'>
          <div class="column cwidth three-sqr">
            <a href='#'><div class='column shadow four text-center'><h4>Mon espace client</h4><?php echo image('contenu/mon_espace_client.png')?></div></a>
            <a href='http://www.mediaserv.com/guadeloupe/ma-messagerie.html'><div class='column shadow four text-center'><h4>Mon webmail</h4><?php echo image('contenu/mon_webmail.png')?></div></a>
            <a href='http://www.mediaserv.com/guadeloupe/souscrire/par-telephone.html'><div class='column shadow four text-center no-margin'><h4>Assistance</h4><?php echo image('contenu/assistance.png')?></div></a>
            </div>
        </div>
    </section>