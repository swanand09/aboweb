<?php
   $max_emis = 1;
   $max_recu = 1;
   $debit_emis = round($result["interrogeEligibiliteResult"]["Ligne"]["Debit_emmission"],2);
   $debit_recu = round($result["interrogeEligibiliteResult"]["Ligne"]["Debit_de_reception"],2);
   if($debit_emis > 1.00 && $debit_emis <= 5.00)
   {
       $max_emis = 5;
   }
   
   if($debit_emis > 5.00 && $debit_emis <= 10.00)
   {
       $max_emis = 10;
   }
   
   if($debit_recu > 1.00 && $debit_recu <= 5.00)
   {
       $max_recu = 5;
   }
   
   if($debit_recu > 5.00 && $debit_recu <= 10.00)
   {
       $max_recu = 10;
   }
   
   if($debit_recu > 10.00 && $debit_recu <= 15.00)
   {
       $max_recu = 15;
   }
   
   if($debit_recu > 15.00 && $debit_recu <= 20.00)
   {
       $max_recu = 20;
   }
   
   if($debit_recu > 20.00 && $debit_recu <= 25.00)
   {
       $max_recu = 25;
   }
   
   if($debit_recu > 25.00 && $debit_recu <= 30.00)
   {
       $max_recu = 30;
   }
?>
<script>
    $(function(){    
    /*------------------------------------------------
	* Jquery Meter Gauge
	------------------------------------------------*/

	var g1 = new JustGage({
          id: "g1", 
          value: <?php echo $debit_emis;?>, 
          min: 0,
          max: <?php echo $max_emis; ?>,
          title: "Débit d’émission",
          label: "Mbps",
          levelColors: ['95bc46','95bc46'],
        });

	var g2 = new JustGage({
	      id: "g2", 
	      value: <?php echo $debit_recu;?>, 
	      min: 0,
	      max: <?php echo $max_recu; ?>,
	      title: "Débit de réception",
	      label: "Mbps",
	      levelColors: ['95bc46','95bc46'],
	    });
});
</script>
<hr/> 
<?php
    if(!empty($num_tel)){
         if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"]))
         {   
?>       
<p><strong>Voici les résultats d’éligibilité liés à votre ligne</strong></p>
 <div class='row debit-adsl'>
    <div class='column twelve'><h3 class='no-margin-bottom'>VOTRE DEBIT ADSL</h3></div>
    <div class='column six debit_emission'><div id="g1"></div></div><div class='column six debit_reception'><div id="g2"></div></div>
  </div>
<div>
<h3 style='margin-top:0px;'>LES SERVICES MEDIASERV <span class='misc-custom-2'><a href='#'><?php echo image('info_icon.png',NULL,array("title"=>"Plus info", "alt"=>"Plus info","class"=>"border-gray")); ?></a></span></h3>
<ul class='services-mediaserv'>
  <li class='telephone not-available'><span><?php echo image('tel.png');?>T&Eacute;L&Eacute;PHONE</span> Chez Médiaserv vous disposerez de l’ensemble des options sur la téléphonie.</li>
  <li class='internet <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]=="true"?"available":"not-available");?>'><span><?php echo image('net.png');?>INTERNET</span> Chez Médiaserv vous disposerez de l’ensemble des options sur la téléphonie.</li>
  <li class='television <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]=="true"?"available":"not-available");?>'><span><?php echo image('tv.png');?>T&Eacute;L&Eacute;VISION</span><?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]=="true"?" Vous disposerez notre offreTV.":" Vous ne pourrez malheureusement pas bénéficier de notre offreTV car votre débit est trop faible.");?></li>
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
