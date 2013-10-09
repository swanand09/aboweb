<div class="left-etape-content recapitulatif">
    <div class="row">
      <div class="column twelve bottom-20">
        <label class="top-20"><strong>Vos coordonnées</strong></label>
        <span class="val"><?php echo $civilite." ".$prenom." ".$nom;?></span>
        <label class="top-20"><strong>Adresse d'installation</strong></label>
        <span class="val"><?php echo $numero." ".$nomDeLaVoie." ".$complement; ?><br><?php echo $codepostal." ".$ville; ?></span>
        <label class="top-20"><strong>Vos coordonnées</strong></label>
        <span class="val">Vous souhaitez une livraison express</span>
        <label class="top-20"><strong>Votre adresse médiaServ est : </strong><a href="mailto:<?php echo $email_mediaserv; ?>" class="mail-link"><?php echo $email_mediaserv; ?></a></label>
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
    <form action="paiement" method="POST">
        <div class="row">
          <div class="column twelve conditions"><label><input type="checkbox" value="conditions" name="recap" class="left"><strong class="left">Je déclare avoir pris connaissance et accepté dans toutes leur teneur les Conditions Générales d’Inscriptions aux Services haut débit et de téléphonie fixe, ainsi que les descriptifs et les tarifs des offres.</strong></label></div>
          <div class="column twelve top-20"><label><input type="checkbox" value="mandat" name="recap"><strong>Je donne mandat à MEDIASERV……..</strong></label></div>
        </div>

        <!--back and submit buttom -->
        <div class="row">
          <div class="six column back-button left top-20"><a alt="Modifier" href="mes_coordonnees" class="precedent">Modifier</a></div>
          <div class="six column text-right top-20"> <input type="submit" value="Confirmer mon choix" name="suivant" class="btn-confirmer rmv-std-btn"></div> 
        </div>
    </form>
</div>