<div class="left-etape-content ligne-deja-activer">
    <div class="seven columns">
        <p>VOTRE LIGNE <span class="green-text"><?php echo $this->session->userdata("num_tel"); ?></span> EST DÉJÀ<br>
        ACTIVÉE PAR NOS SERVICES.<br>
        <br>
        VOUS N'&Ecirc;TES PAS CLIENT BOX MEDIASERV ? </p>
    </div>
    <div class="five columns">
        <?php echo image('contenu/unconseiller.png',NULL,array("title"=>"Contacter")); ?>      
    </div>
    <div>
      <div class="columns six text-right"><strong class="misc-custom-1">NOUS VOUS INVITONS À CONTACTER NOTRE SERVICE COMMERCIAL POUR PLUS D'INFORMATIONS.</strong></div>
      <div class="columns six text-left"><a title="Contacter un conseiller" href="http://www.mediaserv.com/guadeloupe/souscrire/par-telephone.html" class="secondary btn-service-commercial">CONTACTER UN CONSEILLER</a></div>
    </div>
</div>
<?php
    $this->session->destroy();
?>