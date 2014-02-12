<div class="left-etape-content page-refus-paiement">
      <div class="row prelevement">
        <div class="column twelve"><h3>Le PAIEMENT DE VOTRE ABONNEMENT</h3></div>
        <div class="row cartebancaire border-gray box-shadow">
          <div class="column three top-10"><?php echo image("contenu/rib_refus.png"); ?></div>
          <div class="column nine"><strong>paiement a échoué</strong></div>
        </div>
      </div>

      <div class="row clear">
        <div class="column eleven end pleft35 top-20 msg"><p class="top-10"><strong>NOS SERVICES SONT ACTUELLEMENT INDISPONIBLES NOUS VOUS INVITONS A CONCTACTER NOTRE SERVICE COMMERCIAL</strong></p></div>
<!--        <div class="six column back-button end top-20"><?php //echo anchor('paiement','REVENIR AU MODE DE RÈGLEMENT',array('title'=>"Retour à l'étape précédente",'class'=>'precedent back-long','alt'=>'Précedent')); ?></div>-->
      </div>

    </div>
<?php $this->session->destroy(); ?>