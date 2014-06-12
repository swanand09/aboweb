var preload = function(){ 
                      $.blockUI({                    
                    message:$("#displayBox"),
                      css: { border: 'none',
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
          
          function procTestEligib(where)
          {
               if(!$(".frm-etape-tester").validationEngine('validate')){
                  return false;
               }

               if(!$(".frm-etape-tester-block").validationEngine('validate')){
                  return false;
               }


                    var num_tel = "";
                    if($("#ligne").attr("value")){
                        num_tel = $("#ligne").val();
                    }else{
                         num_tel = $("#ligne_prefix").val()+$("#ligne_sufix").val();
                    }
                    
              if(num_tel.replace(/\s+/g, "").length==10){        
                    preload();
                    $.post(
                        ajax_proc_interogeligib,
                         {
                            num_tel : num_tel                                                                                  
                         },
                        function(data){
                          //var content = $(data+'<div><div class="prev_next"><a href="javascript:void(0);" id="butt_prev">Précédent</a></div><div class="prev_next"><a href="javascript:void(0);" id="choose_forfait">Choisr Mon fortait</a></div></div>');
                          $.unblockUI(); 
                         if(data.error==true){ 
                             $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                           return false;
                          }
                          if(where=="colonne droite"){
                              preload();
                               $(location).attr('href',monOffre);
                               return false;
                          }
                          $("#cont_mon_off").empty().prepend(data[0].contenu_html); 
                          $("#recap_contenu").removeClass("medium").addClass("small").empty().prepend(data[1].form_test_ligne); 
                         
                        }, "json"
                    );
                    return false; 
               }else{
                  return false; 
                }
          }
          
          function retrieveForfait()
          {    
           
              preload();
              var redu_facture = "false";
              var consv_num_tel = "false";
                if($("#redu_facture").is(":checked"))
                {
                    redu_facture = "true";                   
                }
                if($("#consv_num_tel").is(":checked"))
                {
                    consv_num_tel = "true";                   
                }
                $.post(
                    forfait,
                     {
                        redu_facture : redu_facture,
                        consv_num_tel : consv_num_tel
                     },
                    function(data){
                         if(data.error=="redirect"){  
                             $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                            //$(location).attr('href',monOffre);
                             $.unblockUI();     
                            return false;
                        }
                        if(data.error==202){                              
                             $(location).attr('href',"mon_offre/ligne_active");
                        }else{                             
                            $("#cont_mon_off").empty().prepend(data[0].contenu_html); 
                            //alert(data[0].contenu_html);
                            var key, count = 0;
                            for(key in data[1]) {
                                if(count==0) {
                                  $("#recap_contenu").empty();      
                                  $("#total_mois").empty(); 
                                }
                               // alert(key);
                                $("#recap_contenu").append(data[1][key]);
                                count++;
                            }

                            $.unblockUI();     
                            $( "html,body" ).scrollTop(0);
                        }
                    },"json"
                  );   
              return false;
          }  
          function prevState(page)
          {               
            //preload();
            if( $('#cont_mon_off').length )
            {
              $("#cont_mon_off").empty().load('mon_offre/prevState/'+page);
            }
            else
            {
              $(location).attr('href',monOffre);
            }
            //$.unblockUI(); 
            $( "html,body" ).scrollTop(0);
          }
          
          function choixForfait(id)
          {
              preload();
                $.post(
                    refreshRecapCol,
                     {
                        id_crm : id
                     },
                    function(data){  
                         if(data.error=="redirect"){  
                             $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                            //$(location).attr('href',monOffre);
                             $.unblockUI();     
                            return false;
                        }
                         if(data[0].contenu_html!="redirect to mes coordonnees"){
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
                            window.promoInitialText = getUltraInitialPrice();
                            //promoInitialText = $('.prix_option').html();
                            //$.getScript(option_tv);        
                            $.unblockUI();  
                            $( "html,body" ).scrollTop(0); 
                         }else{
                               $(location).attr('href',mesCoordonnees2);
                         }
                    },"json"
                  ); 
          }
          
          function choixTv()
          {    

                preload();    
//                var beneficierTv = "";
              // var beneficierTv = $("#beneficier").val();                
                if($("#beneficier").is(":checked"))
                {
                     $("#beneficier").attr("checked","checked");  
                    $.post(
                        updateTvDecodeur,
                         {
                           // beneficierTv : beneficierTv,  
                            decoder_tv   : "check"
                         },
                        function(data){   
                            
                             if(data.error=="redirect"){  
                                    $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                                   //$(location).attr('href',monOffre);
                                    $.unblockUI();     
                                   return false;
                               }
                         
                            var key, count = 0;
                            for(key in data) {
                                if(count==0) {
                                  $("#recap_contenu").empty();                                                    
                                }                                
                              (key!="total_par_mois")?$("#recap_contenu").append(data[key]):$("#total_mois").empty().append(data[key]);                            
                                count++;
                            }
                          $.unblockUI(); 
                          $('html, body').animate({
                            scrollTop: $(".second").offset().top
                          }, 500);
                        },"json"
                   ); 
                }else{         
                   $("#beneficier").removeAttr("checked"); 
                     $.post(
                            updateTvDecodeur,
                             {
                               // beneficierTv : beneficierTv,
                                decoder_tv   : "uncheck"
                             },
                            function(data){
                               if(data.error=="redirect"){  
                                    $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                                   //$(location).attr('href',monOffre);
                                    $.unblockUI();     
                                   return false;
                                }
                              //enlever tv dans forfait dummy1
                             // $("#recap_contenu").remove().append("forfait_dummy1");
                             /*
                              $("#recap_contenu").children("#msvForfait").remove();
                              $("#recap_contenu").append(data.forfait_dummy1); 
                              $("#recap_contenu").children("#caution").remove(); 
                              $("#recap_contenu").children("#location").remove();
                              $("#recap_contenu").children("#options").remove();  // remove any bouquet if any
                              $("#recap_contenu").children("#promo").remove();
                              $("#recap_contenu").append(data.libelles_promo_dummy2);
                              $("#recap_contenu").append(data.location_equipements_dummy4);
                              $("#recap_contenu").children("#oneshot").remove(); 
                              $("#recap_contenu").append(data.frais_activation_facture_dummy7);  
                              $("#total_mois").empty().append(data.total_par_mois); 
                              */
                              var key, count = 0;
                              for(key in data) {
                                    if(count==0) {
                                      $("#recap_contenu").empty();                                                    
                                    }                                
                                  (key!="total_par_mois")?$("#recap_contenu").append(data[key]):$("#total_mois").empty().append(data[key]);                            
                                    count++;
                              }   
                              $("#recap_contenu").children("#caution").remove(); 
                              $("#recap_contenu").children("#location").remove();
                              $("#recap_contenu").children("#options").remove();
                              $("#recap_contenu").children("#oneshot").remove(); 
                              
                              $.unblockUI(); 
                              $('html, body').animate({
                                    scrollTop: $(".second").offset().top
                              }, 500);
                            },"json"
                       );         
                }

            }
            
          function choixBouquet(valeur)
          {    

                preload();    
//                var beneficierTv = "";
               //var bouquet = $("#"+id).val();  
               
                $.post(
                    updateBouquet,
                     {
                        bouquetChoisi : valeur
                     },
                    function(data){
                        if(data.error=="redirect"){  
                             $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                            //$(location).attr('href',monOffre);
                             $.unblockUI();     
                            return false;
                        }
                      var key, count = 0;
                            for(key in data) {
                                if(count==0) {
                                  $("#recap_contenu").empty();                                                    
                                }
                              (key!="total_par_mois")?$("#recap_contenu").append(data[key]):$("#total_mois").empty().append(data[key]);                            
                                count++;
                            }  
                      $.unblockUI(); 
//                      $('html, body').animate({
//                                    scrollTop: $(".sexy").offset().top
//                              }, 500);
                    },"json"
               ); 

            }
          
          function choixOption(id)
          {    
                preload();    
                var optionTv   = $("#"+id).val(); 
                var checkOption = "uncheck";
                if($("#"+id).is(":checked"))
                {
                     $("#"+id).attr("checked","checked"); 
                    checkOption = "check";
                }else{
                    $("#"+id).removeAttr("checked"); 
                }
                $.post(
                    updateOptions,
                     {
                        optionTv      : optionTv,
                        checkOption   : checkOption
                     },
                    function(data){
                        if(data.error=="redirect"){  
                             $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                            //$(location).attr('href',monOffre);
                             $.unblockUI();     
                            return false;
                        }
                       var key, count = 0;
                        for(key in data) {
                            if(count==0) {
                              $("#recap_contenu").empty();                                                    
                            }
                          (key!="total_par_mois")?$("#recap_contenu").append(data[key]):$("#total_mois").empty().append(data[key]);                            
                            count++;
                        }    
                      $.unblockUI();                       
                    },"json"
               ); 

          }
          
          //choix facturation
          function choixFacture(id)
          {
               preload();    
                var typeFacture   = $("#"+id).val(); 
                $("#type_facturation_hid").val(id);
                 $.post(
                    updateFacture,
                     {
                        typeFacture      : typeFacture
                     },
                    function(data){    
                         if(data.error=="redirect"){  
                             $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                            //$(location).attr('href',monOffre);
                             $.unblockUI();     
                            return false;
                        }
                        var key, count = 0;
                        for(key in data) {
                            if(count==0) {
                              $("#recap_contenu").empty();                                                    
                            }
                          (key!="total_par_mois")?$("#recap_contenu").append(data[key]):$("#total_mois").empty().append(data[key]);                            
                            count++;
                        }    
                      $("#"+id).attr("Disabled","Disabled");
                      switch(id){
                          case "facture_papier":
                               $("#facture_electronique").removeAttr("Disabled");
                          break;
                          case "facture_electronique":
                               $("#facture_papier").removeAttr("Disabled");
                          break;
                      }
                      $.unblockUI();                       
                    },"json"
               ); 
          }
          
          function gotoMesCoord(){
              preload();    
              var maTv = $("#cont_mon_off").html();
                $.post(
                    mesCoordonnes,
                     {
                      maTv : maTv          
                     },
                   function(data){
                       $(location).attr('href',mesCoordonnees2);
                       $.unblockUI();  
                   },"json"
                );
           }
            
          function verifMailWebServ(){
            var emailMsv = $("#email_mediaserv").val();

            if(emailMsv.length){
                preload();
                $.post(                   
                   verifEmail,
                     {
                        email_msv : emailMsv
                     },
                    function(data){                 
                     if(data.error=="redirect"){  
                             $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                            //$(location).attr('href',monOffre);
                             $.unblockUI();     
                            return false;
                     }
                       $('#modalpaseli').empty().prepend("<p><strong>"+data.msg+"</strong></p><a class='close-reveal-modal'>&#215;</a>").reveal(); 
                      switch(data.error){
                          case "401":
                              $("#email_mediaserv").val("").focus();
                              $("#verif_email").val("faux");
                          break;
                          case "0":
                              $("#verif_email").val("vraie");
                          break;
                      }
                      $.unblockUI(); 
                    },"json"
               ); 
            }else{
               $("#email_mediaserv").val("").focus();
           }
           $('#email_mediaserv').validationEngine('hide');
        }
          
          function verifParainWebServ()
          {
                if($("#frmParrain").validationEngine('validate')){        
                   preload();
                   $.post(
                        verifParain,
                        {
                           parrain_num_contrat : $("#parrain_num_contrat").val(),
                           parrain_num_tel    : $("#parrain_num_tel").val()
                        },
                       function(data){
                        if(data.error=="redirect"){  
                             $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                            //$(location).attr('href',monOffre);
                             $.unblockUI();     
                            return false;
                        }
                        $('#modalpaseli').empty().prepend("<p><strong>"+data.Error.ErrorMessage+"</strong></p><a class='close-reveal-modal'>&#215;</a>").reveal(); 
                        $.unblockUI(); 
                        /*var errVar = 'Error';
                        if("Erreur" in data ){
                            alert("toto");
                            errVar = 'Erreur';
                        }*/
                        if(data.Error.ErrorMessage=="VOTRE PARRAIN EXISTE. MERCI!"){
                            $("#verifAccParai").addClass("parrainage-accepte").empty().html("Parrainage accepté");
                            return false;
                        }                         
                        $("#parrain_num_tel").focus();
                        $("#parrain_num_contrat").focus();                                     
                       }, "json"
                   );
                }
            }
            $(document).on('click','#prevEtape2A1',function(){
                var redirePg = true;
               $("#mes-coordonnees input[type=text]").each(function() {
                  if($(this).val()!=$(this).prop("defaultValue")){
                     redirePg = false;
                       $('#modalpaseli').empty().prepend("<p><strong>Vous n\'avez pas validé vos coordonnées. Si vous quittez la saisie sans passer à l’étape suivante, vos données ne seront pas conservées.<br><br>Procéder?</strong></p><div class='text-center'><a class='button' id='btnOuiPrev'>Oui</a>&nbsp;<a class='button close-reveal-modal' id='btnNon'>Non</a></div>").reveal(); 
                  }
               });
               $("#mes-coordonnees input[type=radio], #mes-coordonnees input[type=checkbox]").each(function() {
                  if($(this).prop("defaultChecked") !=  $(this).prop("checked")){
                      redirePg =false;
                       $('#modalpaseli').empty().prepend("<p><strong>Vous n\'avez pas validé vos coordonnées. Si vous quittez la saisie sans passer à l’étape suivante, vos données ne seront pas conservées.<br><br>Procéder?</strong></p><div class='text-center'><a class='button' id='btnOuiPrev'>Oui</a>&nbsp;<a class='button close-reveal-modal' id='btnNon'>Non</a></div>").reveal(); 
                  }
               });
               
               if(redirePg==true){
                   $(location).attr('href',monOffre);
               }
            });
             $(document).on('click','#btnOuiPrev',function(){
                 $(location).attr('href',monOffre);
             });
           $(document).on('click','#btnNon',function(){
                 $('#modalpaseli').trigger('reveal:close');
             });
