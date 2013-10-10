<!--PROMOTION-->
<div class="custom-column forpro promotion top-20 p10">
    <?php if(is_array($promo_libelle)){?>
  <h3>Promotion <span class="right"><a href="#">Modifier</a></span></h3>
  <ul class="bottom-20">
    <li class="small-icon-location bottom-10"><strong>Location box et décodeur TV</strong></li>
    <li class="small-icon-appel"><strong>Vos appels vers les mobiles 24h/24 et 7j/7 en local et vers la métropole</strong></li>
  </ul>
  <?php }else{?>
  <h3>Promotion</h3>
  <p><?php echo $promo_libelle; ?></p>
<?php }?>
</div>
<!--END OF PROMOTION-->
<hr>