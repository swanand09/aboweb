<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Aboweb - <?php echo $template['title']; ?></title>
  
 <!-- Included CSS Files (Compressed) -->
 <?php        
        echo css('foundation.min.css');
        echo css('app.css'); 
        echo css('main.css'); 
        echo css('etape.css');
        echo css('font.css'); 
        echo css('validationEngine.jquery.css');
        echo css('jquery-ui.css');
        echo css('combobox.css');
  ?>
   <!--[if IE 7]><?php echo css('ie7.css');?><![endif]-->
  <!--[if IE 8]><?php echo css('ie8.css');?><![endif]-->
  <?php
        echo js('modernizr.foundation.js');
         echo js('jquery.js');
         echo js('foundation.min.js');
         echo js('jquery-ui.js');
         echo js('jquery.blockUI.js');
         echo js('custom_autocomplete.js');
  ?> 

  <style>
      .highli{
          font-weight:bold;
      }
      #prlodtxt{
          display:none;
      }
  </style>
</head>
<body>
<noscript>
  <div class='no-script'>Javascript est désactivé sur votre navigateur. Veuillez l'activer pour continuer. </div>
  </noscript>
<!--HEADER-->
  <header class='row header'>
    <div class='three columns'><h1 class='main-title'>SOUSCRIPTION EN LIGNE</h1></div>
    <div class='three columns service-client text-center'><?php echo image('service_client.png',NULL,array("title"=>"Service client - 0811 57 57 57", "alt"=>"Numéro de téléphone")); ?></div>
<!--    <div class='three columns chat last-2'> Une question ?<span>CHATER AVEC MOI</span></div>-->
    <div class='three columns end rapeler last-2'><a href='#' data-reveal-id="modalBesoinDaide" title="Vous faire rappeler gratuitement">Besoin d'aide ?<span>VOUS FAIRE RAPPELER</span></a></div>
  </header>
  <!--END OF HEADER-->

  <!--NAV-->
  <nav class='navigation'>
    <div class='row'>
      <div class='twelve columns'><?php echo image('logo_mediaserv.png',NULL,array("title"=>"Souscription en ligne", "alt"=>"Mediaserv")); ?></div>
    </div>
  </nav>
  <!--END OF NAV-->
 <script>
    var monOffre                = '<?php echo base_url('mon_offre');?>';
    var ajax_proc_interogeligib = '<?php echo base_url('mon_offre/ajax_proc_interogeligib');?>';
    var forfait                 = '<?php echo base_url('mon_offre/forfait');?>';
    var refreshRecapCol         = '<?php echo base_url('mon_offre/refreshRecapCol');?>'; 
    var updateTvDecodeur        = '<?php echo base_url('mon_offre/updateTvDecodeur');?>'; 
    var mesCoordonnes           = '<?php echo base_url('mon_offre/mesCoordonnes');?>';   
    var mesCoordonnees2           = '<?php echo base_url('mes_coordonnees');?>';  
    var verifEmail              = '<?php echo base_url('mes_coordonnees/verifEmail');?>';
    var verifParain             = '<?php echo base_url('mes_coordonnees/verifParain');?>';
    var cancelParain             = '<?php echo base_url('mes_coordonnees/cancelParain');?>';
    var updateBouquet           = '<?php echo base_url('mon_offre/updateBouquet');?>';  
    var updateOptions           = '<?php echo base_url('mon_offre/updateOptions');?>';
    var updateFacture           = '<?php echo base_url('mes_coordonnees/updateFacture'); ?>';
    //var option_tv               = '<?php echo base_url('assets/javascripts/tv_option.js'); ?>';
</script>
<?php  echo js('custom_tv_option.js'); echo js('main_functions.js');?>
  <!--MAIN SECTION-->
  <section class='row main-content'>
    <section class='nine columns left-content'>
      <ul class="block-grid four-up etapes <?php echo $pageid; ?>">        
        <li class='etape1 state1' data-nav='<?php echo $allow[0]; ?>'><?php echo image('etape.png')?><?php echo ($etapes_url[0]=="#")?"<a><span>1</span>Mon<br/>offre</a>":anchor($etapes_url[0],'<span>1</span> Mon<br/>offre'); ?></li>
        <li class='etape2' data-nav='<?php echo $allow[1]; ?>'><?php echo image('etape.png')?><?php echo ($etapes_url[1]=="#")?"<a><span>2</span> Mes<br/>coordonnées</a>":anchor($etapes_url[1],'<span>2</span> Mes<br/>coordonnées'); ?></li>
        <li class='etape3' data-nav='<?php echo $allow[2]; ?>'><?php echo image('etape.png')?><?php echo ($etapes_url[2]=="#")?"<a><span>3</span> Mon<br/>récapitulatif</a>":anchor($etapes_url[2],'<span>3</span> Mon<br/>récapitulatif'); ?></li>
        <li class='etape4' data-nav='<?php echo $allow[3]; ?>'><?php echo image('etape.png')?><?php echo ($etapes_url[3]=="#")?"<a><span>4</span> Paiement</a>":anchor($etapes_url[3],'<span>4</span> Paiement'); ?></li>
      </ul>
<!--      <div>-->
           <?php echo $template['partials']['contenu_gauche'];?>
<!--      </div>    -->
    </section>
    <section class='three column right-content'>       
         <?php echo $template['partials']['contenu_droit'];?>           
    </section>
      
  </section>
  <!--END OF MAIN SECTION-->

  <!--FOOTER-->
  <footer>
    <div class='main-footer'>
      <div class='row'>
        <div class='three columns text-left'><a href="#" data-reveal-id="modalMentionLegale" title="Mentions légales">Mentions légales</a> | <a href="http://www.mediaserv.com/fileadmin/contenus/box/pdf/CUS.pdf" target="_blank" title="Conditions Générales d'Utilisation">CUS</a></div>
        <div class='paiement three columns text-center' title="Paiement sécurisé">PAIEMENT S&Eacute;CURIS&Eacute;</div>
        <div class='livraison three columns text-center' title='Livraison gratuite'>LIVRAISON GRATUITE</div>
        <div class='souscription three columns text-right' title='Souscription en mode express'>SOUSCRIPTION EN MODE EXPRESS</div>
      </div>

    </div>
    <div class='row below-footer'>
      <div class='twelve columns'>
        <p>Mediaserv est un opérateur télécom d'offres de téléphonie, Internet et télévision en Guadeloupe, à Saint-Martin et Saint-Barthelemy, en Martinique,<br/>
        en Guyane et à la Réunion pour les particuliers et les entreprises (accès à l’ Internet haut débit, présélection, réseau d’ interconnexions de sites,<br/>
        hébergements de sites Internet et de serveurs).</p>
        <h5 class='text-center'>&copy;2014 MEDIASERV | <a href="#" data-reveal-id="modalMentionLegale" title="Mentions légales">MENTIONS LEGALES</a></h5>
      </div>
    </div>
  </footer>
  <!-- END OF FOOTER-->


    <!--mention legales-->
  <div id="modalMentionLegale" class="reveal-modal xlarge">
    <h2>MENTIONS LEGALES</h2>
  <ul>
  <li><h4>1 - Propriété</h4>

  Le présent site Internet (ci-après « Site »), accessible à l’adresse URL www.mediaserv.com, ainsi que ses sous domaines, est édité par et est la propriété de la société Mediaserv (ci- après « Mediaserv »), SAS au capital de 1.000.000 €, immatriculée au RCS de Pointe-à-Pitre sous le n°351 555 792, dont le siège social est situé Tour Secid, 6e étage, Place de la Rénovation, 97110 Pointe-à-Pitre, dont le numéro de téléphone est le 0590 57 10 10 [international : (+590) 590 57 10 10].<br/><br/>
  Le directeur de la publication du Site est Monsieur Laurent AGRECH Président de Mediaserv. <br/><br/>
  Mediaserv est un opérateur de communications électroniques titulaire dans les Départements d’Outre-mer français (DOM) de la Guadeloupe, de la Martinique, de la Guyane et de la Réunion ainsi que dans les Collectivités d’Outre-Mer (COM) de Saint-Martin et de Saint-Barthélemy.
  </li>
  <li><h4>2 - Contenu du Site – Représentation</h4>

  On entend par contenu du Site (ci-après « Contenu ») le Site dans son ensemble et dans chacun de ses éléments, notamment mais non limitativement la structure générale du Site, l’adresse URL à laquelle il est accessible, le nom de domaine correspondant, la charte graphique du Site, les textes, les images animées ou non, les sons dont il est composé, les marques et logos de Mediaserv. Le Contenu et chacun de ses éléments constituent la propriété exclusive de Mediaserv (ou de ses partenaires).<br/><br/>

  Le Visiteur doit veiller à respecter les droits de propriété intellectuelle de tout tiers et s’engage à ne pas violer les dispositions légales sur les droits d’auteur et notamment à ne pas commettre d’actes susceptibles de constituer une contrefaçon. Mediaserv dégage toute responsabilité en cas d’action en contrefaçon intentée par un tiers à l’encontre du Visiteur. Le Visiteur n’acquiert aucun droit de propriété intellectuelle sur les bases de données de Mediaserv, ni sur ses marques, concepts, interfaces graphiques, logos et plus largement sur aucune des oeuvres de l’esprit et créations sur lesquelles Mediaserv est titulaire de droits de propriété intellectuelle.<br/><br/>

  Toute représentation totale ou partielle du Site ou de son Contenu par quelque procédé que ce soit, sans autorisation préalable et expresse de Mediaserv, est illicite au sens de l’article L.122-4 du Code de la Propriété Intellectuelle et constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du même code.<br/><br/>

  Il en est de même de l’extraction et/ou l’utilisation totale ou partielle des bases de données figurant le cas échéant sur le Site, qui sont la propriété de Mediaserv en sa qualité de producteur et sont protégées à ce titre en application des dispositions des articles L.341-1 et suivants du Code de la propriété intellectuelle.
  </li>
  <li><h4>3 - Licence d’utilisation</h4>

  Du seul fait de sa connexion au Site, l’internaute qui consulte le Site (ci-­après « Visiteur ») reconnaît accepter de Mediaserv une licence d’utilisation du Contenu strictement limitée aux conditions impératives suivantes :

    <ul>
      <li>la licence est accordée à titre non exclusif ;</li>
      <li>le droit d’utilisation conféré au Visiteur est personnel et privé, ce qui signifie que toute reproduction du Contenu du Site sur un quelconque support pour un usage collectif ou professionnel, même en interne dans l’entreprise, est prohibée. Il en est de même pour toute communication de son Contenu par voie électronique, même diffusé en intranet ou en extranet d’entreprise ;</li>
      <li>le droit d’utilisation comprend seulement l’autorisation de reproduire pour stockage aux fins de représentation sur écran monoposte et de copier en un exemplaire, pour sauvegarde et/ou tirage papier ;</li>
      <li>les pages du Site ne peuvent en aucun cas être incluses ou imbriquées dans les pages d’un autre site Internet. La violation de ces dispositions pourra engager la responsabilité civile et pénale du Visiteur de ces sites notamment au titre des dispositions de l'article L335-2 du Code de la Propriété Intellectuelle relatives à la contrefaçon punie de trois ans d'emprisonnement et de 300 000 euros d'amende.</li>
    </ul>

  </li>
  <li><h4>4 - Données personnelles</h4>
  Conformément à la loi n° 2004-­801 du 6 août 2004 relative à la protection des personnes physiques à l'égard des traitements de données à caractère personnel modifiant la loi n° 78-17 du 6 janvier 1978, ce site a fait l’objet d’une déclaration à la CNIL.<br/><br/>
  Mediaserv est tenue de respecter les dispositions de la loi n°78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, dont la violation est passible de sanctions pénales.<br/><br/>
  Mediaserv s’abstient, s’agissant des données à caractère personnel auxquelles elle accède, de toute collecte illicite, de toute utilisation détournée et, d’une manière générale, de tout acte susceptible de porter atteinte à la vie privée ou à la réputation d’autrui.<br/><br/>
  La collecte et le traitement par Mediaserv des données personnelles communiquées par le Visiteur sont nécessaires pour répondre à ses demandes.<br/><br/>
  Conformément aux articles 38 à 40 de la Loi n°78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, le Visiteur dispose d'un droit de communication, d’opposition, de rectification et de suppression des données le concernant qu’il peut exercer auprès du Service Clients de Mediaserv par courrier, adressé à l’adresse suivante : BP 378 – 97288 Lamentin Cedex 2, accompagné de la copie d’une pièce d'identité de la personne concernée.

  </li>
  <li><h4>4.1 – Envoi d’e-mailings personnalisés</h4>

  Mediaserv peut utiliser vos informations personnelles pour vous proposer des offres adaptées, directement par le biais du site www.Mediaserv.com ou lors de campagnes de communications par e-mails.

  </li>
  <li><h4>4.2 - Mémorisation de votre identifiants de connexion</h4>

  Lors de votre identification, si vous cochez la case « Rester connecté », votre session restera active pendant 60 jours ou jusqu’à déconnexion de votre part (même après fermeture du navigateur ou arrêt de l’ordinateur). Vous avez ainsi accès à votre compte en ligne et/ou à votre messagerie sans vous identifier à chaque fois. Cette opération s’applique uniquement à l’ordinateur en cours d’utilisation.
  Mediaserv vous conseil de ne pas activer la reconnaissance automatique sur des sites publics ou sur des ordinateurs partagés.

  </li>
  <li><h4>5 - Marques</h4>

  Les marques et logos figurant sur le Site sont des marques déposées de Mediaserv ou de ses partenaires.

  Toute reproduction totale ou partielle de ces marques et logos sans autorisation préalable et expresse de leurs titulaires est prohibée.

  </li>
  <li><h4>6 - Liens Internet</h4>

  Toute insertion dans un site Internet ou sur des pages personnelles d’un lien hypertexte (ci-­‐ après « Lien ») pointant vers le Site est prohibée sauf autorisation préalable et expresse de Mediaserv. L’insertion de liens ne doit en aucun cas être utilisée dans un contexte susceptible de porter préjudice à Mediaserv. En tout état de cause, Mediaserv se réserve le droit de demander la suppression d’un Lien sur un site tiers.<br/><br/>

  Les Liens mis en place dans le cadre du Site en direction d’autres ressources présentes sur Internet ne sauraient engager la responsabilité de Mediaserv à raison de leur contenu.

  </li>
  <li><h4>7 - Hébergement du Site</h4>

  L’hébergement du Site est assuré par Mediaserv.

  </li>
  <li><h4>8 – Décharge et Responsabilité</h4>

  Le Visiteur utilise le site <a href="www.mediaserv.com" target="_blank">www.mediaserv.com</a> sous sa seule et entière responsabilité. En aucun cas Mediaserv ne pourra être tenue pour responsable de tout dommage direct ou indirect résultant de l’accès et de l’utilisation de ces sites par le Visiteur du site ou des sites qui lui sont liés.<br/><br/>

  Mediaserv ne peut en aucun cas voir sa responsabilité engagée du fait :

  <ul>
  <li>d’une mauvaise utilisation du réseau Internet,</li>
  <li>d’un mauvais fonctionnement du réseau Internet,</li>
  <li>des informations accessibles sur le réseau Internet,</li>
  <li>de l’absence de réception pour le Client des courriers électroniques de confirmation de ses actions due à un fait indépendant de la volonté de Mediaserv,</li>
  <li>du refus par le service d’accepter que le Client puisse souscrire ou modifier ses options,</li>
  <li>de la lecture, du téléchargement ou de l’utilisation frauduleuse de données par des tiers, sans la volonté du Visiteur, non-imputable à Mediaserv.</li>
  </ul>

  <p>Le Visiteur est seul responsable de la configuration du matériel informatique qu’il utilise.</p>

  </li>
  <li><h4>9 - Aide à la navigation</h4>

  Le Visiteur est informé que, pour le bon fonctionnement de certaines pages dynamiques et le bon déroulement de la navigation, un cookie peut s’installer automatiquement sur son logiciel de navigation ; ce cookie ne permet pas d’identifier le Visiteur mais enregistre des informations relatives à la navigation de son ordinateur sur le Site (notamment les pages qu’il a consultées ainsi que la date et l’heure de la consultation), informations auxquelles Mediaserv pourra avoir accès lors de ses visites ultérieures. Par ailleurs, le Visiteur est informé du fait que lorsqu’il saisit certaines informations sur le Site lors de sa visite, un cookie enregistre et stocke les informations saisies lors de sa visite. Ainsi, le Visiteur n’aura pas besoin, lors de sa prochaine visite, de les saisir. Mediaserv pourra les consulter lors des prochaines visites du Visiteur.

  </li>
  <li><h4>9.1 - Gestion des cookies</h4>

  Mediaserv vous informe que vous pouvez vous opposer à l'enregistrement de cookies en configurant votre navigateur de la manière suivante.<br/><br/>

  Pour Microsoft Internet Explorer :
  <ol>
      <li>Choisissez le menu " Outils " (ou " Tools "), puis " Options Internet " (ou " Internet Options ")</li>
      <li>Cliquez sur l'onglet " Confidentialité " (ou " Confidentiality ")</li>
      <li>Sélectionnez le niveau souhaité à l'aide du curseur</li>
  </ol>
  <br/>

  Pour Mozilla Firefox :
  <ol>
      <li>Choisissez le menu " Outils " > " Options "</li>
      <li>Cliquez sur l'option " Vie Privée "</li>
      <li>Rubrique " Cookies "</li>
  </ol>
  <br/>

  Pour Chrome :
  <ol>
      <li>Choisissez le menu " Edition " > " Préférences " </li>
      <li>Cliquez sur l'option " Données personnelles " </li>
      <li>Rubrique " Cookies "</li>
  </ol>
  <br/>

  Pour Safari :
  <ol>
      <li>Choisissez le menu " Edition " > " Préférences " </li>
      <li>Cliquez sur l'option " Données personnelles " </li>
      <li>Rubrique " Cookies "</li>
  </ol>
  <br/>

  </li>
  <li><h4>9.2 - Responsabilité</h4>

  Mediaserv ne pourra en aucun cas voir sa responsabilité engagée du fait d'une éventuelle perturbation de la navigation liée à la désactivation des cookies par l'utilisateur
  </li>
  <li><h4>10 - Droit applicable</h4>

  Le site www.mediaserv.com et les présentes mentions légales sont soumis au droit français.</li>
  </ul>
  <a class="close-reveal-modal">&#215;</a>
  </div>
  <!-- End of mention legale-->

  <!--Modal Besoin d'aide-->
  <div id="modalBesoinDaide" class="reveal-modal large">
    <div class='column twelve'><h3>CONTACTER UN CONSEILLER</h3></div>
    <div class='column six'>
      Vous souhaitez avoir plus d'informations par téléphone sur notre offre ou vous souhaitez tout simplement souscrire par téléphone au
      <h4>0811 57 57 57</h4>
      (prix d'un appel local depuis un fixe).<br/><br/>
      Nos conseillers vous accueillent du lundi au samedi 24h/24.</br></br>
      <p class="pour-info">INFO : Pour plus de rapidité dans le traitement de votre demande de souscription, nous vous conseillons de vous munir de votre RIB/IBAN.</p>

    </div>
    <div class='column six'>
        <?php echo image('contenu/contact_conseiller.png',NULL,array("title"=>"Contacter un conseiller", "alt"=>"Contacter un conseiller","height"=>"245","width"=>"295")); ?>
    </div>
    <a class="close-reveal-modal">&#215;</a>
  </div>
  <!--end of Besoin d'aide-->

  <!--Modal for invalid numbet-->
  <div id="modalpaseli" class="reveal-modal small">
  <p>
  <strong>VOTRE LIGNE <span class='green-text' id="modTel">05 96 71 91 65</span> N'EST PAS ENCORE ÉLIGIBLE À NOS SERVICES.<br/><br/>
  VOUS POUVEZ CONTACTER NOTRE SERVICE COMMERCIAL POUR PLUS D'INFORMATION.</strong>
  </p>
  <a class="close-reveal-modal">&#215;</a>
  </div>
  <!-- End of modal-->
  
  <!-- Included JS Files (Compressed) -->
   <?php       
      //  echo js('foundation.min.js');
        echo js('app.js');
        echo js('raphael.2.1.0.min.js');
        echo js('justgage.1.0.1.min.js');        
        echo js('jquery.maskedinput.min.js');
        echo js('jquery.validationEngine.js');
        echo js('languages/jquery.validationEngine-fr.js');
        echo js('custom_main.js');
        echo js('jquery.foundation.reveal.js');
        echo js('combobox.js');
        echo image('ajax-loader.gif',NULL,array("style"=>"display:none;","id"=>"displayBox"));
   ?> 
  <h3 id="prlodtxt">Veuillez patienter...</h3> 
</body>
</html>
