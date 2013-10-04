<script>
 function verifParain()
 {
      preload();
        $.post(
             '<?php echo base_url('mes_coordonnees/verifParain');?>',
             {
                parrain_id_parcour : $("#parrain_id_parcour").val(),
                parrain_num_tel    : $("#parrain_num_tel").val()
             },
            function(data){
              //var content = $(data+'<div><div class="prev_next"><a href="javascript:void(0);" id="butt_prev">Précédent</a></div><div class="prev_next"><a href="javascript:void(0);" id="choose_forfait">Choisr Mon fortait</a></div></div>');
              alert(data.faultstring);                   
              $.unblockUI();                    
            }, "json"
        );
 }

   });
 
</script>
<hr>
<!-- PARRAINAGE -->
<!--<form method="POST">-->
<div class="custom-column p10 bottom-20">
    <div class="custom-column six"><strong>Avez-vous un parrain ?</strong></div>
    <div class="custom-column six">
      <label class="left"><input type="radio" value="oui" name="parrain">Oui</label>
      <label class="right"><input type="radio" value="non" name="parrain" checked="">Non</label>
    </div>
    <div class="parrain-section column twelve top-20" style="display: block;">
         <input type="text" placeholder="RE00065964" name="parrain_id_parcour" id="parrain_id_parcour">
         <input type="text" placeholder="0262218962" name="parrain_num_tel" id="parrain_num_tel">
         <a href="javascript:verifParain();">Verifier</a>        
     </div>
</div>
<!-- END OF PARRAINAGE -->