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
  ?>
   <!--[if IE 7]><?php echo css('ie7.css');?><![endif]-->
  <!--[if IE 8]><?php echo css('ie8.css');?><![endif]-->
  <?php
        echo js('modernizr.foundation.js');
         echo js('jquery.js');
         echo js('foundation.min.js');
         echo js('jquery-ui.js');
         echo js('jquery.blockUI.js');
      // echo ajax()->init();
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

<!--HEADER-->
  <header class='row header'>
    <div class='three columns'><h1 class='main-title'>SOUSCRIPTION EN LIGNE</h1></div>
    <div class='three columns service-client text-center'><?php echo image('service_client.png',NULL,array("title"=>"Service client - 0811 57 57", "alt"=>"Numéro de téléphone")); ?></div>
    <div class='three columns chat last-2'> Une question ?<span>CHATER AVEC MOI</span></div>
    <div class='three columns rapeler last-2'>Besoin d'aide ?<span>VOUS FAIRE RAPPELER</span></div>
  </header>
  <!--END OF HEADER-->

  <!--NAV-->
  <nav class='navigation'>
    <div class='row'>
      <div class='twelve columns'><?php echo image('logo_mediaserv.png',NULL,array("title"=>"Aboweb", "alt"=>"Mediaserv")); ?></div>
    </div>
  </nav>
  <!--END OF NAV-->
  <!--MAIN SECTION-->
  <section class='row main-content'>
    <?php echo $template['partials']['contenu'];?>
  </section>
  <!--END OF MAIN SECTION-->

  <!--FOOTER-->
  <footer>
    <div class='main-footer'>
      <div class='row'>
        <div class='paiement four columns text-center'>PAIEMENT SECURISE</div>
        <div class='livraison four columns text-center'>LIVRAISON GRATUITE</div>
        <div class='souscription four columns text-center'>SOUSCRIPTION EN MODE EXPRESS</div>
      </div>
    </div>
    <div class='row below-footer'>
      <div class='twelve columns'>
        <p>Sed (saepe enim redeo ad Scipionem, cuius omnis sermo erat de amicitia) querebatur, quod omnibus in rebus homines diligentiores essent; capras et oves quot quisque haberet, dicere posse, amicos quot haberet, non posse dicere et in illis quidem parandis adhibere curam, in amicis eligendis neglegentis esse nec habere quasi signa quaedam et notas, quibus eos qui ad amicitias essent idonei, iudica rent. Sunt igitur firmi et stabiles et constantes eligendi; cuius generis est magna penuria. Et iudicare difficile est sane nisi expertum; experiendum autem est in ipsa amicitirit amicitia; iudicium tollitque experiendi potestatem.</p>
      </div>
    </div>
  </footer>
  <!-- END OF FOOTER-->
  
  <!-- Included JS Files (Compressed) -->
   <?php       
      //  echo js('foundation.min.js');
        echo js('app.js');
        echo js('raphael.2.1.0.min.js');
        echo js('justgage.1.0.1.min.js');        
        echo js('jquery.maskedinput.min.js');
        echo js('jquery.validationEngine.js');
        echo js('languages/jquery.validationEngine-fr.js');
//        echo js('tv_option.js');
        echo js('custom.js');
        echo js('custom_autocomplete.js');
        echo image('ajax-loader.gif',NULL,array("style"=>"display:none;","id"=>"displayBox"));
   ?> 
  <h3 id="prlodtxt">Veuillez patienter...</h3> 
</body>
</html>
