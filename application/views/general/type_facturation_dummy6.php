<!-- facturation -->
<div id="colFacture">
<div class="mfacturation notitle forpro">
   
    <ul>
        <li class="bottom-10"><strong>Facturation : <?php echo $typeFacture[1]; ?><span class="right"><?php echo (isset($typeFacture[2]))?number_format($typeFacture[2],2,',',' ')."€/mois":"inclus"; ?></span></strong></li>
   </ul>
</div>

<hr>
</div>
<!-- END facturation -->