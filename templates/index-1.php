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
         <hr/>
        <p><strong>Voici les résultats d’éligibilité liés à votre ligne</strong></p>
        <div class='debit-adsl'>
          <h3>VOTRE DEBIT ADSL</h3>
        </div>
        <div>
          <h3>LES SERVICES MEDIASERV <span class='misc-custom-2'><a href='#'><img class='border-gray' src='images/info_icon.png' title='Plus info' alt='Plus info'></a></span></h3>
          <ul class='services-mediaserv'>
            <li class='telephone available'><span> T&Eacute;L&Eacute;PHONE</span> Chez Médiaserv vous disposerez de l’ensemble des options sur la téléphonie.</li>
            <li class='internet available'><span> T&Eacute;L&Eacute;PHONE</span> Chez Médiaserv vous disposerez de l’ensemble des options sur la téléphonie.</li>
            <li class='television not-available'><span> T&Eacute;L&Eacute;PHONE</span> Chez Médiaserv vous disposerez de l’ensemble des options sur la téléphonie.</li>
          </ul>
        </div>
        <div>
          <h3>CE QUE NOUS POUVONS AUSSI VOUS PROPOSER</h3>
          <form class='frm-options'> 
            <label for="checkbox3"><input type="checkbox" name='reduisez' id='reduisez'> Réduisez votre facture en résiliant votre abonnement car vous êtes en zone dégroupée <span><a href='#'><img class='border-gray' src='images/info_icon.png' title='Plus info' alt='Plus info'></a></span></label>
            <label for="checkbox3"><input type="checkbox" name='conserver' id='conserver'> Vous pouvez aussi conserver votre numéro de téléphone <span><a href='#'><img class='border-gray' src='images/info_icon.png' title='Plus info' alt='Plus info'></a></span></label>
          </form>
        </div>

      </div>
    </section>
    <!--RIGHT SIDEBAR-->
    <section class='four columns right-content'>
     <div class='ligne'>
        <form class='frm-etape-tester-block'>
          <label class='lbl-white'><strong>Votre ligne</strong></label>
          <input type='text' id='ligne' name='ligne' value='02 40 52 48 69'/>
          <input class='rmv-std-btn right link' type='submit' value='Modifier' name='tester_ligne_block'/>
        </form>
     </div>
    </section>
    <!--END OF RIGHT SIDEBAR-->
  </section>
  <!--END OF MAIN SECTION-->
<?php include('footer.php');?>
