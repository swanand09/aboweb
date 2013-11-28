/*
*----------------------------------------------------------------------------
* Display an overlay with a preloader
*----------------------------------------------------------------------------
*/
var preload = function() { 
  $.blockUI({                    
    message:$("#displayBox"),
    css: { 
      border: 'none',
      padding: '15px',
      backgroundColor: '#fff',
      width: '60px',
      '-webkit-border-radius': '10px', 
      '-moz-border-radius': '10px',
      'border-radius': '10px',
      opacity: .5
    } 
  }); 
}

/*
*----------------------------------------------------------------------------
* Ajax function to interogate the method 'interrogeEligibilite' of the webservice
*----------------------------------------------------------------------------
* @where - parameter to check from where the function has been called
*        - possible values = 'column droite' and 'column gauche'
*/          
function procTestEligib(where) {
  if($("#ligne").val().replace(/\s+/g, "").length==10) {               
    preload();
    $.post(
      ajax_proc_interogeligib,
      {
        num_tel : $("#ligne").val()                                                                          
      },
      function(data) {
        if(data.error==true) {
          alert("Veuillez re-essayer votre numéro n'est pas éligible");                              
          return false;
        }
        // redirect the user to the page 'mon_offre' if the function was triggered from the right sidebar
        if(where=="colonne droite") {
          $(location).attr('href',"mon_offre");
          return false;
        }
        //empty container and add new HTML content
        $("#cont_mon_off").empty().prepend(data[0].contenu_html); 
        $("#recap_contenu").empty().prepend(data[1].form_test_ligne);
        $.unblockUI(); 
      },
      "json"
    );
  }
  return false; 
}

/*
*----------------------------------------------------------------------------
* Ajax function to retrieve a list of 'forfait' from this->session->userdata("produit")
*----------------------------------------------------------------------------
*/            
function retrieveForfait()
{           
  preload();
  var redu_facture = "false";
  var consv_num_tel = "false";

  if($("#redu_facture").is(":checked")) {
      redu_facture = "true";
  }

  if($("#consv_num_tel").is(":checked")) {
      consv_num_tel = "true";
  }

  $.post(
    forfait,
    {
      redu_facture : redu_facture,
      consv_num_tel : consv_num_tel
    },
    function(data){                      
      $("#cont_mon_off").empty().prepend(data[0].contenu_html); 
      var key, count = 0;
      for(key in data[1]) {
        if(count==0) {
          $("#recap_contenu").empty();      
          $("#total_mois").empty(); 
        }
        $("#recap_contenu").append(data[1][key]);
        count++;
      }
     
      $.unblockUI();     
      $( "html,body" ).scrollTop(0);
    },"json"
  );
  return false;
}  

/*
*----------------------------------------------------------------------------
* Function to return to previous page
*----------------------------------------------------------------------------
* @page  - parameter of the name of the previous page
*        - function in controller mon_offre.php/prevState
*/        
function prevState(page)
{               
  //preload();
  $("#cont_mon_off").empty().load('mon_offre/prevState/'+page);
  //$.unblockUI(); 
  $( "html,body" ).scrollTop(0);
}

/*
*----------------------------------------------------------------------------
* Function to add forfait information in session & panier
*----------------------------------------------------------------------------
* @id  - parameter of the id_crm of the 'forfait'
*      - function in controller mon_offre.php/refreshRecapCol
*/        
function choixForfait(id)
{
  preload();
  $.post(
    refreshRecapCol,
    {
      id_crm : id
    },
    function(data){
      if(data[0].contenu_html!="redirect to mes coordonnees") {
        $("#cont_mon_off").empty().prepend(data[0].contenu_html); 
        var key, count = 0;

        for(key in data[1]) {
          if(count==0) {
            $("#recap_contenu").empty();                                                    
          }
          (key!="total_par_mois")?$("#recap_contenu").append(data[1][key]):$("#total_mois").empty().append(data[1][key]);                            
          count++;
        }
           //Disable 'list of bouquet' on startup
           $('.four.bouquet').fadeTo('slow',.6);
           $('.four.bouquet').append('<div class="disabled-div" style="position: absolute;top:0;left:0;width: 100%;height:100%;z-index:2;opacity:0.4;filter: alpha(opacity = 50)"></div>'); 
           promoInitialText = $('.prix_option').html();
            //$.getScript(option_tv);        
            $.unblockUI();  
            $( "html,body" ).scrollTop(0); 
         }else{
               $(location).attr('href',"mes_coordonnees");
         }
    },"json"
  );
}

/*
*----------------------------------------------------------------------------
* Ajax function to add caution/location/oneshot information in session & panier
*----------------------------------------------------------------------------
*/  
function choixTv()
{    
  preload();    
  //var beneficierTv = "";
  var beneficierTv = $("#beneficier").val();    
  var recap_contenu = $("#recap_contenu");            
  if($("#beneficier").is(":checked"))
  {
    $.post(
      updateTvDecodeur,
      {
        beneficierTv : beneficierTv,  
        decoder_tv   : "check"
      },
      function(data) {
        //var recap_contenu = $("#recap_contenu");
        recap_contenu.children("#caution").remove();  
        recap_contenu.append(data.caution_decodeur_dummy5);  
        recap_contenu.children("#location").remove();  
        recap_contenu.append(data.location_equipements_dummy4);
        recap_contenu.children("#oneshot").remove();  
        recap_contenu.append(data.frais_activation_facture_dummy7);
        $("#total_mois").empty().append(data.total_par_mois);  
        $.unblockUI(); 
        $('html, body').animate({
          scrollTop: $(".second").offset().top
        }, 500);
      },"json"
    ); 
  } 
  else {         
    //beneficierTv = "uncheck";
    $.post(
      updateTvDecodeur,
      {
          beneficierTv : beneficierTv,
          decoder_tv   : "uncheck"
      },
      function(data){
        recap_contenu.children("#caution").remove(); 
        recap_contenu.children("#location").remove();
        recap_contenu.children("#options").remove();  // removes any bouquet if any
        recap_contenu.append(data.location_equipements_dummy4);
        recap_contenu.children("#oneshot").remove(); 
        recap_contenu.append(data.frais_activation_facture_dummy7);  
        $("#total_mois").empty().append(data.total_par_mois);  
        $.unblockUI(); 
        $('html, body').animate({
              scrollTop: $(".second").offset().top
        }, 500);
      },"json"
    );         
  }
}

/*
*----------------------------------------------------------------------------
* Ajax function to add selected bouquet information in session / panier
* when clicking a 'bouquet' from the list - #filter>li
*----------------------------------------------------------------------------
* @valeur  - a concatation of 'bouquet' values -> string
*          - function in controller mon_offre.php/updateBouquet
* TODO: for 'valeur' use arrays instead of concatanating values into strings
*/ 
function choixBouquet(valeur)
{
  preload();
  //var beneficierTv = "";
  //var bouquet = $("#"+id).val();
  $.post(
      updateBouquet,
      {
        bouquetTv : valeur
      },
      function(data) {                          
        $("#recap_contenu").children("#options").remove();  
        $("#recap_contenu").append(data.options_dummy3);
        $("#total_mois").empty().append(data.total_par_mois);  
        $.unblockUI(); 
        //$('html, body').animate({scrollTop: $(".sexy").offset().top}, 500);
      },"json"
  );
}

/*
*----------------------------------------------------------------------------
* Ajax function to add selected Option ( Eden/Bein ) information in session / panier
* when clicking checkbox eden/bein
*----------------------------------------------------------------------------
* @id  - a concatation of 'bouquet' values -> string
*      - function in controller mon_offre.php/updateBouquet
*/
function choixOption(id)
{
  preload();
  var optionTv   = $("#"+id).val();
  var checkOption = "uncheck";
  if($("#"+id).is(":checked"))
  {
    checkOption = "check";
  }
  $.post(
    updateOptions,
    {
      optionTv      : optionTv,
      checkOption   : checkOption
    },
    function(data){
      $("#recap_contenu").children("#options").remove();
      $("#recap_contenu").append(data.options_dummy3);
      $("#total_mois").empty().append(data.total_par_mois);  
      $.unblockUI();
    },"json"
  );
}

/*
*----------------------------------------------------------------------------
* Ajax function to add cost for type of 'facturation' in session / panier
* when clicking radio btn electronique/papier
*----------------------------------------------------------------------------
* @id  - the id of the radion btn clicked
*      - function in controller mes_coordonnes.php/updateFacture
* TODO: use $(this)
*/
function choixFacture(id)
{
  preload();    
  var typeFacture   = $("#"+id).val(); 
  $.post(
    updateFacture,
    {
      typeFacture : typeFacture,
    },
    function(data){                          
      $("#recap_contenu").children("#colFacture").remove();  
      $("#recap_contenu").append(data.envoie_facture_dummy6);
      $("#total_mois").empty().append(data.total_par_mois);  
      $("#"+id).attr("Disabled","Disabled");
      switch(id){
        case "type_facture1":
          $("#type_facture2").removeAttr("Disabled");
          break;
        case "type_facture2":
          $("#type_facture1").removeAttr("Disabled");
          break;
      }
      $.unblockUI();                       
    },"json"
  ); 
}
          
function gotoMesCoord(){
  $.post(
    mesCoordonnes,
    {

    },
    function(data){
      $(location).attr('href',"mes_coordonnees");
    },"json"
  );
}
            
function verifMailWebServ() {
  preload();
  $.post(                   
    verifEmail,
    {
      email_msv : $("#email_mediaserv").val()
    },
    function(data) {                 
      alert(data.msg);             
      switch(data.error) {
        case "401":
          $("#email_mediaserv").val("").focus();
          break;
      }
      $.unblockUI(); 
    },"json"
  ); 
}
          
function verifParainWebServ()
{
  preload();
  $.post(
    verifParain,
    {
      parrain_num_contrat : $("#parrain_num_contrat").val(),
      parrain_num_tel    : $("#parrain_num_tel").val()
    },
    function(data){
      //var content = $(data+'<div><div class="prev_next"><a href="javascript:void(0);" id="butt_prev">Précédent</a></div><div class="prev_next"><a href="javascript:void(0);" id="choose_forfait">Choisr Mon fortait</a></div></div>');
      alert(data.Error.ErrorMessage); 
      $.unblockUI(); 
      if(data.Error.ErrorMessage=="Votre parrain existe. Merci!"){
        return false;
      }
      $("#parrain_num_tel").focus();
      $("#parrain_num_contrat").focus();
    }, "json"
  );
  }