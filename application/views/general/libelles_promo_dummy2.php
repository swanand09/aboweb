<?php if(isset($promo_libelle)&&!empty($promo_libelle)){ ?>
<!--PROMOTION-->
<div class="forpro promotion">
    <?php if(is_array($promo_libelle)){?>
  <h3>Promotion <span class="right"><a href="#">Modifier</a></span></h3>
  <ul class="bottom-20">
    <li class="small-icon-like"><strong>Location box et décodeur TV</strong></li>
    <li class="small-icon-like"><strong>Vos appels vers les mobiles 24h/24 et 7j/7 en local et vers la métropole</strong></li>
  </ul>
  <?php }else{?>
  <h3>Promotion</h3>
    <ul class="bottom-20">
        <li class="small-icon-like"><strong><?php echo $promo_libelle; ?></strong></li>
    </ul>
<?php }?>
</div>
<hr>
<!--END OF PROMOTION-->

<?php } ?>
