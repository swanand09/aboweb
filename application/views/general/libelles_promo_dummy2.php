<?php if(isset($promo_libelle)&&!empty($promo_libelle)){ ?>
<!--PROMOTION-->
<div class="forpro promotion">
    <?php if(is_array($promo_libelle)){?>
  <h3>Promotion <span class="right"><a href="#">Modifier</a></span></h3>
  <ul>
      <?php foreach($promo_libelle as $key=>$val){
              ?>
              <li class="small-icon-like <?php echo $key==0?'bottom-10':''; ?>"><strong><?php echo $val; ?></strong></li>
      <?php } ?>
   </ul>
  <?php }else{?>
  <h3>Promotion</h3>
    <ul class="bottom-20">
        <li class="small-icon-like bottom-10"><strong><?php echo $promo_libelle; ?></strong></li>
    </ul>
<?php }?>
</div>
<hr>
<!--END OF PROMOTION-->

<?php } ?>
