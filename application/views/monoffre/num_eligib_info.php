<hr/> 
<?php
    if(!empty($num_tel)){
         if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"]))
         {   
?>       
<p><strong>Voici les résultats d’éligibilité liés à votre ligne</strong></p>
<div class='debit-adsl'>
  <h3>VOTRE DEBIT ADSL</h3>
  <p>Debit emmission: <?php echo $result["interrogeEligibiliteResult"]["Ligne"]["Debit_emmission"];?></p>
  <p>Debit reception: <?php echo $result["interrogeEligibiliteResult"]["Ligne"]["Debit_de_reception"];?></p>
</div>
<div>
<h3 style='margin-top:0px;'>LES SERVICES MEDIASERV <span class='misc-custom-2'><a href='#'><?php echo image('info_icon.png',NULL,array("title"=>"Plus info", "alt"=>"Plus info","class"=>"border-gray")); ?></a></span></h3>
<ul class='services-mediaserv'>
  <li class='telephone not-available'><span><?php echo image('tel.png');?>T&Eacute;L&Eacute;PHONE</span> Chez Médiaserv vous disposerez de l’ensemble des options sur la téléphonie.</li>
  <li class='internet <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]?"available":"not-available");?>'><span><?php echo image('net.png');?>INTERNET</span> Chez Médiaserv vous disposerez de l’ensemble des options sur la téléphonie.</li>
  <li class='television <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]?"available":"not-available");?>'><span><?php echo image('tv.png');?>T&Eacute;L&Eacute;VISION</span> Vous ne pourrez malheureusement pas bénéficier de notre offreTV car votre débit est trop faible.</li>
</ul>
</div>
<div>
<h3>CE QUE NOUS POUVONS AUSSI VOUS PROPOSER</h3>
<form class='frm-options' action='#' onsubmit='javascript:retrieveForfait();return false'> 
  <label for="checkbox3"><?php echo form_checkbox($input1); ?> Réduisez votre facture en résiliant votre abonnement car vous êtes en zone dégroupée <span><a href='#'><?php echo image('info_icon.png',NULL,array("title"=>"Plus info", "alt"=>"Plus info","class"=>"border-gray")); ?></a></span></label>
  <label for="checkbox3"><?php echo form_checkbox($input2);?> Vous pouvez aussi conserver votre numéro de téléphone <span><a href='#'><?php echo image('info_icon.png',NULL,array("title"=>"Plus info", "alt"=>"Plus info","class"=>"border-gray")); ?></a></span></label>
  <div class='top-20 six custom-column back-button left'><?php echo anchor('mon_offre/redirectToMonOffre',"PRECEDENT",array("class"=>"precedent"));?></div>
  <div class='top-20 six custom-column text-right'><?php echo form_submit($choix_forfait);?></div>
</form>
</div>
<?php
            }else{
                ?>
                    <p>Le webservice retourne aucune valeur pour ce numéro: <?php echo $num_tel;?> 
                    <div>
                       <div class='top-20 six custom-column back-button left'><?php echo anchor('mon_offre/redirectToMonOffre',"PRECEDENT",array("class"=>"precedent"));?></div>
                     </div>                
           <?php
            }
    }else{?>
         <p>Veuillez saisir une valeur pour le numéro téléphone</p>
           <div>
              <div class='top-20 six custom-column back-button left'><?php echo anchor('mon_offre/redirectToMonOffre',"PRECEDENT",array("class"=>"precedent"));?></div>
            </div>
    <?php
    }
?>

