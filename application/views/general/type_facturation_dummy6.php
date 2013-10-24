<!-- facturation -->
<div class="custom-column forpro promotion top-20 p10">
    <h3>Facturation</h3>
    <ul class="bottom-20">
        <?php
             foreach($dummyPanier["dummy6"] as $val){
                 echo "<li>Envoie des factures: <strong>".utf8_encode($val["Libelle"]["string"])."</strong><span class='right' style='color:#fff;font-weight:bold;'>".($val["Tarif"]>0?number_format($val["Tarif"],2,',',' ')."€/mois":"inclus")."</span></li>";
             }
         ?>
   </ul>
</div>
<!-- facturation -->
<hr>
