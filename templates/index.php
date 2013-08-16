<?php include('header.php'); ?>
<!--MAIN SECTION-->
<section class='row main-content'>
  <!--Right content -->
  <section class='eight columns left-content'>
      <ul class="block-grid four-up etapes">
        <li class='etape1 page-active etape-active'><img src='images/etape.png'/><a href='#'><span>1</span> Mon offre</a></li>
        <li class='etape2'><img src='images/etape.png'/><a href='#'><span>2</span> Mes coordonnées</a></li>
        <li class='etape3'><img src='images/etape.png'/><a href='#'><span>3</span> Mon récapitulatif</a></li>
        <li class='etape4'><img src='images/etape.png'/><a href='#'><span>4</span> Paiement</a></li>
      </ul>

      <div class='left-etape-content'>
  
        <form class='border-gray frm-etape-tester columns twelve'>
          <div class='seven columns'>
            <label><strong>SAISISEZ VOTRE NUM&Eacute;RO DE T&Eacute;L&Eacute;PHONE</strong><span class='right'><a href='#'><img class='border-gray' src='images/info_icon.png' title='Plus info' alt='Plus info'></a></span></label>
            <input type='text' id='ligne' name='ligne' value='02 40 52 48 69'/>
          </div>
          <div class='five columns'>
            <input  class='rmv-std-btn btn-green' type='submit' name='tester_ligne' value='TESTER'/>
          </div>
        </form>
        <div>
          <div class='columns six text-right'><strong class='misc-custom-1' >VOUS N'AVEZ PAS DE LIGNE FIXE ?</strong></div>
          <div class='columns six text-left'><a class='button secondary' href='#'>CONTACTER LE SERVICE COMMERCIAL</a></div>
        </div>
      </div>
    </section>
    <!--RIGHT SIDEBAR-->
    <section class='four columns right-content'>
      <div class='ligne'>
        
      </div>
    </section>
    <!--END OF RIGHT SIDEBAR-->
  </section>
  <!--END OF MAIN SECTION-->
<?php include('footer.php');?>
