<div id="promo">
<?php 
$panierVal = $this->session->userdata("panierVal");
if(!empty($panierVal["promodum2"][0])){ ?>
<!--PROMOTION-->
<div class="forpro promotion">   
  <h3>Promotion</h3>
  <ul>
      <?php 
            foreach($panierVal["promodum2"] as $key=>$val){
                foreach($val as $key2=>$val2){
      ?>
         <li class="small-icon-like <?php echo $key==0?'bottom-10':''; ?>"><strong>
             <?php 
                   echo $val2;
             ?></strong></li>
      <?php }
            }?>
   </ul>
</div>
<hr>
<!--END OF PROMOTION-->

<?php } ?>
</div>