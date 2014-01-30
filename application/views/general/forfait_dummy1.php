<?php
    $panierVal = $this->session->userdata("panierVal");
?>
<div id="msvForfait">
<!--VOTRE OFFRE MEDIASERV-->
<div class="forpro votre-offre">
    <?php echo (!empty($text))?"<strong> VOTRE OFFRE MEDIASERV</strong><br><br><span class='top-10 block'><strong>".$text."</strong></span>":""; ?>    
    <?php if(!empty($panierVal["forfaitdum1"])){
           foreach($panierVal["forfaitdum1"] as $key=>$val){             
        ?>
    <h3>Votre offre Mediaserv<span class="right"><?php echo number_format($val["tarif"],2,',',' ')."€";?><span class="mini">/mois</span></span></h3>
    <?php 
         }
      } ?>
</div>

<!--END OF VOTRE OFFRE MEDIASERV-->
<?php 
    if(!empty($panierVal["forfaitdum1"])){
        foreach($panierVal["forfaitdum1"] as $key=>$val){      
     $label_internet  = isset($val["libelle"][0])?$val["libelle"][0]:$val["libelle"][0];
     $label_internet  = explode(";",$label_internet);
     $label_telephone = isset($val["libelle"][1])?$val["libelle"][1]:$val["libelle"][1];
     $label_telephone = explode(";",$label_telephone);
     
?>
<!--FORFAIT-->
<div class="forpro forfait">
  <h3>Forfait <span class="right"><a href="javascript:prevState('forfait');">Modifier</a></span></h3>
  
  <ul>
    <li class="small-icon-internet"><strong>Internet</strong><br><?php echo $label_internet[1]; ?></li>
    <li class="small-icon-telephone"><strong>Téléphone</strong><br><?php echo $label_telephone[1]; ?></li>
    <?php if(isset($val["tvChoisi"])&&$val["tvChoisi"]==true){ ?>
    <li class='small-icon-television'><strong>Télévision</strong></li>
    <?php } ?>
  </ul>
</div>
 <hr>
<!--END OF FORFAIT-->
<?php }
    }
?>
</div>