<div id="colFacture">
<!-- facturation -->
<div class="custom-column forpro promotion top-20 p10">
    <h3>Facturation</h3>
    <ul class="bottom-20">
        <li>Envoie des factures: <strong>Facture <?php echo $typeFacture[1]; ?></strong><span style="color:#fff;font-weight:bold;" class="right"><?php echo (isset($typeFacture[2]))?number_format($typeFacture[2],2,',',' ')."€/mois":"inclus"; ?></span></li>
   </ul>
</div>
<!-- facturation -->
<hr>
</div>