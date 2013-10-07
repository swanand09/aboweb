<?php
if(!empty($result)&&empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"])){
//if(!empty($result)){
$debit_emis = round($result["interrogeEligibiliteResult"]["Ligne"]["Debit_emmission"],2);
$debit_recu = round($result["interrogeEligibiliteResult"]["Ligne"]["Debit_de_reception"],2);
   $max_emis = 10;
   $max_recu = 30;
   
?>
<script>
    $(function(){    
    /*------------------------------------------------
	* Jquery Meter Gauge
	------------------------------------------------*/
if($('.debit_emission').length > 0 )
  {
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
    }
    
    
});

</script>
<hr/> 

<?php
}
    if(!empty($num_tel)){
        if(!empty($result)&&empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"])){
         //if(!empty($result))      
             $msgtv = "Vous disposerez notre offreTV.";
             if($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]=="false"&&$result["interrogeEligibiliteResult"]["Ligne"]["Debit_tv_ok"]=="false"){
                 $msgtv = "Vous ne pourrez malheureusement pas bénéficier de notre offreTV car votre débit est trop faible.";
             }
             
              if($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]=="false"&&$result["interrogeEligibiliteResult"]["Ligne"]["Debit_tv_ok"]=="true"){
                 $msgtv = "Votre ligne n'est malheureusement pas éligible à la TV.";
             }
             
             $msgtel = "Chez Mediaserv vous disposerez de l’ensemble des options sur la téléphonie.";
            
             if($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]=="false"){
                  $msgtel = "Votre ligne n'est pas éligible pour la telephonie et l'adsl";
                  
             }
?>       
<p><strong>Voici les résultats d’éligibilité liés à votre ligne</strong></p>
 <div class='row debit-adsl'>
    <div class='column twelve'><h3 class='no-margin-bottom'>VOTRE DEBIT ADSL</h3></div>
    <div class='column six debit_emission'><div id="g1"></div></div><div class='column six debit_reception'><div id="g2"></div></div>
  </div>
<div>
<h3 style='margin-top:0px;'>LES SERVICES MEDIASERV <span class='misc-custom-2'><a href='#'><?php echo image('info_icon.png',NULL,array("title"=>"Plus info", "alt"=>"Plus info","class"=>"border-gray")); ?></a></span></h3>
<ul class='services-mediaserv'>
  <li class='telephone <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]=="true"?"available":"not-available");?>'><span><?php echo image('tel.png');?>T&Eacute;L&Eacute;PHONE</span> <?php echo $msgtel; ?></li>
  <li class='internet <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]=="true"?"available":"not-available");?>'><span><?php echo image('net.png');?>INTERNET</span> <?php echo $msgtel; ?></li>
  <li class='television <?php echo (($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]=="true"&&$result["interrogeEligibiliteResult"]["Ligne"]["Debit_tv_ok"]=="true")?"available":"not-available");?>'><span><?php echo image('tv.png');?>T&Eacute;L&Eacute;VISION</span><?php echo $msgtv;?></li>
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
                    <p>Le webservice ne retourne aucune valeur pour ce numéro: <?php echo $num_tel;?> 
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

