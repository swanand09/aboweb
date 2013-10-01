<div class='ligne'>
    <form class='frm-etape-tester-block' onsubmit='modif_num();return false;'>
      <label class='lbl-white'><strong>Votre ligne</strong></label>
      <?php echo form_input($this->data["racap_num"]);?>
      <input class='rmv-std-btn right link' type='submit' value='Modifier' name='tester_ligne_block'/>
    </form>
</div>