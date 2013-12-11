<div class='left-etape-content' id="cont_mon_off">
 
<?php 
    if(!empty($userdata["context"])&&array_key_exists("prevState",$userdata)){
            $redu_facture = $this->session->userdata("redu_facture");
            $htmlContent = $userdata["prevState"][0]["contenu_html"];
            if($redu_facture=="true")
            {
                $htmlContent = str_replace('<input type="checkbox" name="redu_facture" value="true" id="redu_facture"  />','<input type="checkbox" name="redu_facture" value="true" checked="checked" id="redu_facture"  />',$htmlContent);
            }
            $consv_num_tel = $this->session->userdata("consv_num_tel");
            if($consv_num_tel=="true")
            {
                $htmlContent = str_replace('<input type="checkbox" name="consv_num_tel" value="true" id="consv_num_tel"  />','<input type="checkbox" name="consv_num_tel" value="true" checked="checked" id="consv_num_tel"  />',$htmlContent);
            }
           // echo utf8_encode(utf8_decode($htmlContent)); 
            echo $htmlContent;
    }else { 
        echo $contenuGauche["contenu_html"];
    }
?>
</div>
