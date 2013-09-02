<div>
    <?php
        if($iadArr["Libelle"]!="")
        {?>
           <div><input type='checkbox' checked='checked' disabled='disabled'><?php echo $iadArr["Libelle"]."&nbsp;&nbsp;".$iadArr["Tarif"]; ?>&euro;</div>
     <?php
        }?>
    <div class='prev_next'><a href='javascript:prevState();'>PRECEDENT</a></div>
</div>