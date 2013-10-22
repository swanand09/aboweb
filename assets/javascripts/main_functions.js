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
          
          function procTestEligib()
          {
               if($("#ligne").val().replace(/\s+/g, "").length==10){               
                    preload();
                    $.post(
                        ajax_proc_interogeligib,
                         {
                            num_tel : $("#ligne").val()                                                                                  
                         },
                        function(data){
                          //var content = $(data+'<div><div class="prev_next"><a href="javascript:void(0);" id="butt_prev">Précédent</a></div><div class="prev_next"><a href="javascript:void(0);" id="choose_forfait">Choisr Mon fortait</a></div></div>');
                          $("#cont_mon_off").empty().prepend(data[0].contenu_html); 
                          $("#recap_contenu").empty().prepend(data[1].form_test_ligne);                     
                          $.unblockUI();                    
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
                      $("#cont_mon_off").empty().prepend(data[0].contenu_html); 
                   
                      var key, count = 0;
                      for(key in data[1]) {
                          if(count==0) {
                            $("#recap_contenu").empty();                                                    
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
          function prevState(page)
          {               
            //preload();
            $("#cont_mon_off").empty().load('mon_offre/prevState/'+page);
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

                            $.unblockUI();  
                            $( "html,body" ).scrollTop(0); 
                         }else{
                               $(location).attr('href',"mes_coordonnees");
                         }
                    },"json"
                  ); 
          }
          
          function choixTv()
          {    

                preload();    
//                var beneficierTv = "";
               var beneficierTv = $("#beneficier").val();                
                if($("#beneficier").is(":checked"))
                {
                      
                    $.post(
                        updateTvDecodeur,
                         {
                            beneficierTv : beneficierTv,  
                            decoder_tv   : "check"
                         },
                        function(data){     
                          $("#recap_contenu").children("#location").remove();  
                          $("#recap_contenu").append(data.location_equipements_dummy4);
                          $("#recap_contenu").children("#oneshot").remove();  
                          $("#recap_contenu").append(data.frais_activation_facture_dummy7);
                          $("#total_mois").empty().append(data.total_par_mois);  
                          $.unblockUI(); 
                          $('html, body').animate({
                            scrollTop: $(".second").offset().top
                          }, 500);
                        },"json"
                   ); 
                }else{         
//                     beneficierTv = "uncheck";       
                     $.post(
                            updateTvDecodeur,
                             {
                                beneficierTv : beneficierTv,
                                decoder_tv   : "uncheck"
                             },
                            function(data){
                              $("#recap_contenu").children("#location").remove();
                               $("#recap_contenu").children("#options").remove();  // removes any bouquet if any
                              $("#recap_contenu").append(data.location_equipements_dummy4);
                              $("#recap_contenu").children("#oneshot").remove(); 
                              $("#recap_contenu").append(data.frais_activation_facture_dummy7);  
                              $("#total_mois").empty().append(data.total_par_mois);  
                              $.unblockUI(); 
                              $('html, body').animate({
                                    scrollTop: $(".second").offset().top
                              }, 500);
                            },"json"
                       );         
                }

            }
            
          function choixBouquet(id)
          {    

                preload();    
//                var beneficierTv = "";
               var bouquet = $("#"+id).val();  
               
                $.post(
                    updateOptions,
                     {
                        bouquetTv : bouquet
                     },
                    function(data){                          
                      $("#recap_contenu").children("#options").remove();  
                      $("#recap_contenu").append(data.options_dummy3);
                      $("#total_mois").empty().append(data.total_par_mois);  
                      $.unblockUI(); 
                    },"json"
               ); 

            }
            
          function verifMailWebServ(){
            preload();
            $.post(                   
               verifEmail,
                 {
                    email_msv : $("#email_mediaserv").val()
                 },
                function(data){                 
                  alert(data.msg);             
                  switch(data.error){
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
                         
                         if($("#parrain_num_tel").val()==="")
                         {
                             $("#parrain_num_tel").focus();
                         }
                         if($("#parrain_num_contrat").val()==="")
                         {
                             $("#parrain_num_contrat").focus();
                         }
                         $.unblockUI();                    
                       }, "json"
                   );
            }