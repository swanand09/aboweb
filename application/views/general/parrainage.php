<div id="panierParrain">
<!-- PARRAINAGE -->
<form method="POST">
     <div class="parrainage bottom-10">
          <div class="custom-column six"><strong>Avez-vous un parrain ?</strong></div>
          <div class="custom-column six">
            <label class="left"><input type="radio" value="oui" <?php echo (isset($parrain)&&$parrain=="oui")?"checked='checked'":"";  ?> name="parrain">Oui</label>
            <label class="right"><input type="radio" value="non" id="cancelParrain" <?php echo (isset($parrain)&&$parrain=="non")?"checked='checked'":"";  ?> name="parrain">Non</label>
          </div>
          <div class="parrain-section <?php echo (isset($parainNumTel)&&isset($parainNumCont)&&!empty($parainNumTel)&&!empty($parainNumCont))?"open":"";?> column twelve top-20" style="display: none;">            
            <input type="text" placeholder="Numéro de contrat de votre parrain" name="parrain_num_contrat" value="<?php echo isset($parainNumCont)?$parainNumCont:""; ?>" id="parrain_num_contrat">
            <input type="text" placeholder="Numéro de téléphone de votre parrain" name="parrain_num_tel" value="<?php echo isset($parainNumTel)?$parainNumTel:"";?>" id="parrain_num_tel">
            <?php if(isset($parainNumTel)&&isset($parainNumCont)&&!empty($parainNumTel)&&!empty($parainNumCont)){ ?>
            <div id="verifAccParai" class="column twelve parrainage-accepte">
                  Parrainage accepté
            </div>
            <?php }else{?>
            <div id="verifAccParai" class="column twelve">
                <a href="javascript:verifParainWebServ();">Verifier</a> 
            </div>
            <?php } ?>
          </div>
     </div>
</form>
    
<!-- END OF PARRAINAGE -->
<hr>
</div>