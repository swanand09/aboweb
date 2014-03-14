<?php
if(!empty($result)&&(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"])||$result["interrogeEligibiliteResult"]["Erreur"]["NumError"]==202)){
//if(!empty($result)){
$debit_emis = round($result["interrogeEligibiliteResult"]["Ligne"]["Debit_emmission"],2);
$debit_recu = round($result["interrogeEligibiliteResult"]["Ligne"]["Debit_de_reception"],2);
   $max_emis = 1;
   $max_recu = 20;
   
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

$("#redu_facture").click(function(){
    if(!$(this).is(":checked")){
        $("#consv_num_tel").prop("checked",false)
                           .attr("disabled",true);
    }else{
         $("#consv_num_tel").attr("disabled",false);
    }
});
</script>
<hr/> 

<?php
}
    if(!empty($num_tel)){
        if(!empty($result)&&(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"])||$result["interrogeEligibiliteResult"]["Erreur"]["NumError"]==202)){
         //if(!empty($result))      
             $msgtv = " Vous êtes éligible à l’ensemble de nos offres TV.";
             if($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]=="false"&&$result["interrogeEligibiliteResult"]["Ligne"]["Debit_tv_ok"]=="false"){
                 $msgtv = "Votre ligne téléphonique n’est pas éligible à notre offre TV par ADSL.";
                 
             }
             
              if($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]=="false"&&$result["interrogeEligibiliteResult"]["Ligne"]["Debit_tv_ok"]=="true"){
                 $msgtv = "Votre ligne téléphonique n’est pas éligible à notre offre TV par ADSL.";
                
             }
             
             $msgtel  = "Vous êtes éligible à l’ensemble des options de notre offre téléphonie";
             $msgadsl = "Vous êtes éligible à un débit de réception maximum de ".$debit_recu." Mo";
             if($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]=="false"){
                  $msgtel = "Votre ligne téléphonique n’est pas éligible à notre offre de téléphonie.";
                  $msgadsl = "Votre ligne téléphonique n’est pas éligible à notre offre internet par ADSL.";
             }
?>       
<p><strong>Voici les résultats d’éligibilité liés à votre ligne</strong></p>
<h3 class='no-margin-bottom'>VOTRE D&Eacute;BIT ADSL</h3>
 <div class='row debit-adsl'>    
    <div class='column six debit_emission'><div id="g1"></div></div><div class='column six debit_reception'><div id="g2"></div></div>
  </div>
<div>
<h3 style='margin-top:0px;'>LES SERVICES MEDIASERV</h3>
<ul class='services-mediaserv'>
  <li class='telephone <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]=="true"?"available":"not-available");?>'><span><?php echo image('tel.png');?>T&Eacute;L&Eacute;PHONE</span> <?php echo $msgtel; ?></li>
  <li class='internet <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]=="true"?"available":"not-available");?>'><span><?php echo image('net.png');?>INTERNET</span> <?php echo $msgadsl; ?></li>
  <li class='television <?php echo (($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]=="true"&&$result["interrogeEligibiliteResult"]["Ligne"]["Debit_tv_ok"]=="true")?"available":"not-available");?>'><span><?php echo image('tv.png');?>T&Eacute;L&Eacute;VISION</span><?php echo $msgtv;?></li>
</ul>
</div>
<div>
<h3>CE QUE NOUS POUVONS AUSSI VOUS PROPOSER</h3>
<form class='frm-options' action='#' onsubmit='javascript:retrieveForfait();return false'> 
  <?php if($produitDegroupage){?>
  <label for="checkbox3"><?php echo form_checkbox($input1); ?> Je souhaite réduire ma facture en résiliant mon abonnement chez France Télécom/Orange car je suis en zone dégroupée. <span><a href='#' class='has-tip' data-width='360' title='En décochant cette option vous continuerez à payer votre abonnement téléphonique actuel auprès de votre fournisseur (généralement France Telecom) et bénéficierez d’une réduction de 5€ TTC/ mois sur l’ensemble des forfaits box mediaserv.'><?php echo image('info_icon.png',NULL,array("title"=>"", "alt"=>" ","class"=>"border-gray")); ?></a></span></label>
  <?php }?>
  <label for="checkbox3"><?php echo form_checkbox($input2);?> Je souhaite conserver mon numéro de téléphone.  <span><a href='#' class='has-tip' data-width='360' title="En cochant cette case, vous conserverez votre numéro de téléphone actuel, sinon un nouveau numéro vous sera attribué."><?php echo image('info_icon.png',NULL,array("title"=>"", "alt"=>" ","class"=>"border-gray")); ?></a></span></label>
  <p class='options-texte'>L’offre box mediaserv vous permet de vous connecter à Internet de façon illimitée via les technologies ADSL. Pour vous souscrire, il suffit de remplir le formulaire en ligne, avec vos coordonnées postales et vos coordonnées bancaires. Une fois la validation de votre dossier effectuée par Mediaserv, la création de votre ligne téléphonique sera effectuée et vos équipements vous seront envoyés.</p>
  <div class='top-20 six custom-column back-button left'><?php echo anchor('mon_offre/redirectToMonOffre',"Précédent",array("class"=>"precedent","title" => "Retour à l'étape précédente"));?></div>
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

