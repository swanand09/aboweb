<?php if(isset($degrouper)&&isset($portabilite)){?>
<!--DEGROUPAGE-->
<div class="degroupage top-20 bottom-20">
   <strong><?php echo $degrouper;?></strong><br>
   <strong><?php echo $portabilite;?></strong>
</div>
<hr>
<?php
}
   if(isset($dum1_degroup_tarif)){
    ?>
       <!--degroupage-->
      <div class="degroupage end" style='min-height:20px'>
            <span class="left"><strong><?php echo utf8_encode($dum1_degroup_libelle); ?></strong></span>
            <span class="right"><strong><?php echo number_format($dum1_degroup_tarif,2,',',' ')."€"; ?></strong></span>
       </div>
        <!--end degroupage--> 
        <hr>
    <?php
  }?>


