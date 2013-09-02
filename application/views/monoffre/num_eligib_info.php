<?php
    if(!empty($num_tel)){
         if(empty($result["interrogeEligibiliteResult"]["Erreur"]["ErrorMessage"]))
         {   
?>
<p>VOICI LES RESULTATS D'ELIGIBILITE LIES A VOTRE LIGNE</p>
<h3>VOTRE DEBIT ADSL</h3>
<p>Numero: <?php echo $result["interrogeEligibiliteResult"]["Ligne"]["Numero"]; ?></p>
<p>Debit emmission: <?php echo $result["interrogeEligibiliteResult"]["Ligne"]["Debit_emmission"];?></p>
<p>Debit reception: <?php echo $result["interrogeEligibiliteResult"]["Ligne"]["Debit_de_reception"];?></p>
<h3>LES SERVICES MEDIASERV</h3>
<p>Eligibilé ADSL: <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_ADSL"]?"Oui":"Non");?></p>
<p>Eligibilé TV: <?php echo ($result["interrogeEligibiliteResult"]["Ligne"]["Eligible_televison"]?"Oui":"Non");?></p>
<h3>CE QUE NOUS POUVONS AUSSI VOUS PROPOSER:</h3>
<div>
    <form action='#' onsubmit='javascript:retrieveForfait();return false'>
        <p><?php echo form_checkbox($input1); ?> Réduisez votre facture en résiliant votre abonnement<br>car vous êtes en zone dégroupée</p>
        <p><?php echo form_checkbox($input2);?> Vous pouvez aussi conserver votre numéro de téléphone</p>
        <div>
            <div class="prev_next"><?php echo anchor('mon_offre/redirectToMonOffre',"PRECEDENT");?></div>
            <div class="prev_next"><?php echo form_submit($choix_forfait);?></div>
       </div>
    </form>
 </div>
<?php
            }else{
                ?>
                    <p>Le webservice retourne aucune valeur pour ce numéro: <?php echo $num_tel;?> 
                    <div>
                        <div class="prev_next">
                             <?php echo anchor('mon_offre/redirectToMonOffre',"PRECEDENT");?>
                        </div>
                     </div>                
           <?php
            }
    }else{?>
         <p>Veuillez saisir une valeur pour le numéro téléphone</p>
           <div>
               <div class="prev_next">
                    <?php echo anchor('mon_offre/redirectToMonOffre',"PRECEDENT");?>
                </div>
            </div>
    <?php
    }
?>