$(function () {

//
$(document).on('click','#modifier-option',function(){
	$(location).attr('href',monOffre);
});

//parrainage
$(document).on('keyup','#parrain_num_contrat',function(){  
    $("#verifAccParai").removeClass("parrainage-accepte").empty().html("<a href='javascript:verifParainWebServ();'>Verifier</a> ");
 return false;
});
$(document).on('keyup','#parrain_num_tel',function(){   
    $("#verifAccParai").removeClass("parrainage-accepte").empty().html("<a href='javascript:verifParainWebServ();'>Verifier</a> ");
 return false;
});

//Alert When Phone number is not valid
//$('#modalpaseli').reveal();


//Populate year in expiration date - Payment page
$('#date_expiration_annee').html(populateYear());

//open CGU link
$('#cgu-link').click(function(){
	if($(this).is(":checked"))
  	{
		if($(this).hasClass( "RE" ))
		{
			window.open('http://www.mediaserv.com/fileadmin/contenus/box/pdf/CUS-RE.pdf','_blank',"resizable=yes,height=600,width=800");	
		}
		else
		{
			window.open('http://www.mediaserv.com/fileadmin/contenus/box/pdf/CUS.pdf','_blank',"resizable=yes,height=600,width=800");	
		}

	}
});

$(document).on('click','#grille-tarifaire',function(){
 window.open(this.href,'_blank',"resizable=yes,height=600,width=800");
 return false;
});

$(document).on('click','#condition-tarifaire',function(){
 window.open(this.href,'_blank',"resizable=yes,height=600,width=800");
 return false;
});


/***
 * @modif reddy 2014 01 28
 * sur test deligibilité
 */

$(document).on('click','#redu_facture',function(){
     if(!$(this).is(":checked")){
         $("#consv_num_tel").prop("checked",false)
                            .attr("disabled",true);
     }else{
          $("#consv_num_tel").attr("disabled",false);
     }
 });

	var etapeOne = $('li.etape1');
	var etapeTwo = $('li.etape2');
	var etapeThree = $('li.etape3');
	var etapeFour = $('li.etape4');

	//Set initial active state
	currentEtape();
	$('.etapes li[data-nav="not-allowed"]').click(function(){
		return false;
	});

	if(etapeOne.attr('data-nav') == 'allowed')
	{
		//Hover etape 1
		etapeOne.mouseover(function(){
			etape1();
		}).mouseout(function(){
			currentEtape();
		});
	}


	if(etapeTwo.attr('data-nav') == 'allowed')
	{
		//Hover etape 2
		etapeTwo.mouseover(function(){
			etape2();
		}).mouseout(function(){
			currentEtape();
		});
	}

	if(etapeThree.attr('data-nav') == 'allowed')
	{
		//Hover etape 3
		etapeThree.mouseover(function(){
			etape3();
		}).mouseout(function(){
			currentEtape();
		});
	}

	if(etapeFour.attr('data-nav') == 'allowed')
	{
	//Hover etape 4
		etapeFour.mouseover(function(){
			etape4();
		}).mouseout(function(){
			currentEtape();
		});
	}

	//hide parrain textboxes on load
	if($('.parrain-section').hasClass('open')) {
		$('.parrain-section').show();
	}
	else {
		$('.parrain-section').hide();	
	}

	// hide or show depending on Value of radio button
	$(document).on("click","input[name='parrain']",function(){
		if( $(this).val() == 'oui' ) {
			$('.parrain-section').slideDown('slow');
		}
		else {
			$('.parrain-section').slideUp();
                         preload();
                         $.post(
                            cancelParain,                        
                            function(data){  
                               if(data.error=="redirect"){  
                                    $('#modalpaseli').empty().prepend(data.msg).reveal(); 
                                   //$(location).attr('href',monOffre);
                                    $.unblockUI();     
                                   return false;
                               }                                 
                                if(data.msg!="VOUS N'AVEZ PAS DE PARRAIN!"){
                                  $('#modalpaseli').empty().prepend("<p><strong>"+data.msg+"</strong></p><a class='close-reveal-modal'>&#215;</a>").reveal();                        
                                }
                                        $.unblockUI();
                                 $("#parrain_num_contrat").val("");
                                 $("#parrain_num_tel").val("");
                                 $("#verifAccParai").removeClass("parrainage-accepte").empty().html("<a href='javascript:verifParainWebServ();'>Verifier</a> ");
                            }, "json"
                         );
		}
	});

	/*-------------------------------------/
	* Masked Input for Phone Number TODO : 
	--------------------------------------*/
	//$('.numero').mask("99999");
	//$('#ligne_prefix').mask("9999");
	//$('#ligne_sufix').mask("999999");
	//$('#ligne,.telephone').mask("9999999999");
	$('#cle').mask("99");
	$('#banque').mask("99999");
	$('#guichet').mask("99999");
	//$('#cryptogramme').mask("999");
	//$('#numerodecarte').mask("9999999999999999");
	//$('#numero_de_compte').mask("AAAAAAAAAAA");

	/*-------------------------------------/
	* Validation Engine
	--------------------------------------*/
	$("#mes-coordonnees").validationEngine();
	$("#frm-paiement").validationEngine();
	$("#frm-mon-recap").validationEngine();
	$(".frm-etape-tester-block").validationEngine();
	$(".frm-etape-tester").validationEngine({
		'custom_error_messages': {
			'#ligne_sufix': {
				'custom[integer]': {'message' :" * Seuls les chiffres sont acceptés"}
			}
		}
	});
        $("#frmParrain").validationEngine();

	/*--------------------------------
	*  Change focus after prefix
	---------------------------------*/
	autofocus('#ligne_prefix',3,'#ligne_sufix');
 	//autofocus('#codepostal',4,'#ville');
 	autofocus('#iban1',3,'#iban2');
 	autofocus('#iban2',3,'#iban3');
 	autofocus('#iban3',3,'#iban4');
 	autofocus('#iban4',3,'#iban5');
 	autofocus('#iban5',3,'#iban6');
 	autofocus('#iban6',3,'#iban7');
	/*--------------------------------
	*  Page paiement toggle
	---------------------------------*/
	//intial state
	$('.prelevement .automatique').addClass('box-shadow');
	$('.section-automatique').show();
	$('.section-carte-bancaire').hide();

	$('.prelevement .automatique').click( function(){
		$('.prelevement div').removeClass('box-shadow');
		$(this).addClass('box-shadow');
		$('.section-automatique').show();
		$('.section-carte-bancaire').hide();
		$('#mode_pay').val('rib');
	});
	$('.prelevement .cartebancaire').click( function(){
		$('.prelevement div').removeClass('box-shadow');
		$(this).addClass('box-shadow');
		$('.section-automatique').hide();
		$('.section-carte-bancaire').show();
		 $('#mode_pay').val('cartebleue');
	});

	$('#show-hide-adresse').click(function(){
		$('#adresse-paiement').toggle();
	});
	/*------------------------------------
	* Page Mes coordonées checkbox event
	------------------------------------*/
	//on click
	$('#check-adresse-facturation').click(function(){
		if($(this).is(":checked")) {
			$('.adresse-facturation').addClass('hide');
		}
		else
		{
			$('.adresse-facturation').removeClass('hide');
		}
	});
	//on load
	if($('#check-adresse-facturation').is(":checked")) {
		$('.adresse-facturation').addClass('hide');
	}
	else
	{
		$('.adresse-facturation').removeClass('hide');
	}
	//on click
	$('#check-adresse-livraison').click(function(){
		if($(this).is(":checked")) {
			$('.adresse-livraison').addClass('hide');
		}
		else
		{
			$('.adresse-livraison').removeClass('hide');
		}
	});
	//on load
	if($('#check-adresse-livraison').is(":checked")) {
		$('.adresse-livraison').addClass('hide');
	}
	else
	{
		$('.adresse-livraison').removeClass('hide');
	}



	//
	$(document).on('click','.etape1',function(){

		if($('ul.etapes').hasClass('page-etape-2'))
		{
			var redirePg = true;
			$("#mes-coordonnees input[type=text]").each(function() {
			   if($(this).val()!=$(this).prop("defaultValue")) {
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
			
			if(redirePg==true) {
			   $(location).attr( 'href', monOffre );
			}
			else
			{
				return false;
			}
		}
	});
});



//Get the current "Etape" and reinitialise state
var currentEtape = function(){

	if($('ul.etapes').hasClass('page-etape-1')){ etape1(); }
	if($('ul.etapes').hasClass('page-etape-2')){ etape2(); }
	if($('ul.etapes').hasClass('page-etape-3')){ etape3(); }
	if($('ul.etapes').hasClass('page-etape-4')){ etape4(); }
}

//Etape1 active
var etape1 = function() {
	$('li.etape1').removeClass().addClass('etape1 state-active');
	$('li.etape2').removeClass().addClass('etape2 state2');
	$('li.etape3').removeClass().addClass('etape3 state3');
	$('li.etape4').removeClass().addClass('etape4 state4');
}

//Etape2 active	
var etape2 = function() {
	$('li.etape1').removeClass().addClass('etape1 state2');
	$('li.etape2').removeClass().addClass('etape2 state-active');
	$('li.etape3').removeClass().addClass('etape3 state2');
	$('li.etape4').removeClass().addClass('etape4 state3');
}

//Etape3 active
var etape3 = function() {
	$('li.etape1').removeClass().addClass('etape1 state3');
	$('li.etape2').removeClass().addClass('etape2 state2');
	$('li.etape3').removeClass().addClass('etape3 state-active');
	$('li.etape4').removeClass().addClass('etape4 state2');
}

//Etape4 active
var etape4 = function() {
	$('li.etape1').removeClass().addClass('etape1 state4');
	$('li.etape2').removeClass().addClass('etape2 state3');
	$('li.etape3').removeClass().addClass('etape3 state2');
	$('li.etape4').removeClass().addClass('etape4 state-active');
}

/*------------------------------------------------
* Jquery Meter Gauge
------------------------------------------------*/
/*
window.onload = function () {

	if($('.debit_emission').length > 0 )
	{
		//var g1, g2;
		var g1 = new JustGage({
	        id: "g1", 
	        // value: 0.4, 
	        min: 0,
	        max: 1,
	        title: "Débit d’émission",
	        label: "Mbps",
	        levelColors: ['95bc46','95bc46']
	    });

		var g2 = new JustGage({
		    id: "g2", 
		    value: 17.5, 
		    min: 0,
		    max: 20,
		    title: "Débit de réception",
		    label: "Mbps",
		    levelColors: ['95bc46','95bc46']
		});	
	}
}
*/


/*
* Get current year and populate select options for credit card expiration date
*/
var populateYear = function ()
{
	var currentYear = (new Date).getFullYear();
	var options="";
	var year;
	var twoDigit;
	
	for( var i=0; i<=15; i++ )
	{
		year = currentYear+i;
		twoDigit = year + "";
		twoDigit = twoDigit.substr(twoDigit.length - 2);
		options += "<option value='"+twoDigit+"'>"+year+"</option>";
	}
	return options;
}

/*------------------------------------------------
* IBAN Validation
* @param {jqObject} the field where the validation applies
* @param {Array[String]} validation rules for this field
* @param {int} rule index
* @param {Map} form options
* @return an error string if validation failed
*/
var validateIban = function( field, rules, i, options ){
	var iban = "";
	var ibanRegex = /[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}/;
	//combine the values of all textboxes #iban
	for( x=1; x<=7; x++ ) {
		iban = iban.concat($('#iban'+ x).val());
	}
	//return the error message if iban is not valid
	if(!ibanRegex.test(iban)) {
		return 'Votre IBAN n\'est pas valide';
	}
}

/*------------------------------------------------
* FR validation
* @param {jqObject} the field where the validation applies
* @param {Array[String]} validation rules for this field
* @param {int} rule index
* @param {Map} form options
* @return an error string if validation failed
*/
var validateIbanFr = function( field, rules, i, options ){
	var ibanFr = $('#iban1').val() 
	var ibanFrRegex = /(^FR|fr)/;
	//return the error message if string does not start with FR/fr
	if(!ibanFrRegex.test(ibanFr)) {
		return 'Votre IBAN doit commencer par FR';
	}
}

/*------------------------------------------------
* BIC Validation
* @param {jqObject} the field where the validation applies
* @param {Array[String]} validation rules for this field
* @param {int} rule index
* @param {Map} form options
* @return an error string if validation failed
*/
var validateBic = function( field, rules, i, options ){
	//combine the values of all textboxes #bic
	var bic = $('#bic').val();
	var bicRegex = /([a-zA-Z]{4}[a-zA-Z]{2}[a-zA-Z0-9]{2}([a-zA-Z0-9]{3})?)/;
	//return the error message if bic is not valid
	if(!bicRegex.test(bic)) {
		return 'Votre BIC n\'est pas valide';
	}
}

/*------------------------------------------------
* Numéro téléphone portable doit commencer par 06 ou 07
* @param {jqObject} the field where the validation applies
* @param {Array[String]} validation rules for this field
* @param {int} rule index
* @param {Map} form options
* @return an error string if validation failed
*/
var validateTelephonePortable = function( field, rules, i, options ){
	
	var telephonePortable = field.val();
	var telephonePortableRegex = /(^06|07)/;
	//return the error message if string does not start with FR/fr
	if(!telephonePortableRegex.test(telephonePortable)) {
		return '*Le numéro du téléphone portable doit commencer par 06 ou 07 uniquement';
	}
}


/*------------------------------------------------
* Custom email validation - validation before @mediaserv.net
* @param {jqObject} the field where the validation applies
* @param {Array[String]} validation rules for this field
* @param {int} rule index
* @param {Map} form options
* @return an error string if validation failed
*/
var validateVerifyEmail = function( field, rules, i, options ){
	//combine the values of all textboxes #bic
	var email = field.val() + "@mediaserv.net";
	var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
	console.log(email);
	//return the error message if bic is not valid
	if( field.val().length > 0 ) {
		if(!emailRegex.test(email)) {
			return 'Votre email n\'est pas valide';
		}
		else
		{
			var verifMail = $("#verif_email").val();
			if(verifMail=="faux"){
				return "Veuillez verifier votre e-mail médiaserv";
			}
		}
	}
}

/*------------------------------------------------
* Custom email validation
* @param {jqObject} the field where the validation applies
* @param {Array[String]} validation rules for this field
* @param {int} rule index
* @param {Map} form options
* @return an error string if validation failed
*/
var validateEmail = function( field, rules, i, options ){
	var email = field.val();
	var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}$/i;
	if( field.val().length > 0 ) {
		if(!emailRegex.test(email)) {
			return 'Votre email n\'est pas valide';
		}
	}
}

var validateName = function( field, rules, i, options ){
	var name = field.val();
	var nameRegex = /(‘|"|`|%|!|#)/;
	if( field.val().length > 0 ) {
		if(nameRegex.test(name)) {
			console.log("testing");
			return 'Ce champ n\'est pas valide';
		}
	}
}

var validateAdd = function( field, rules, i, options ){
	var adr = field.val();
	var adrRegex = /^[a-z0-9\s-.]+$/i;
	if( field.val().length > 0 ) {
		if(!adrRegex.test(adr)) {
			return 'Ce champ n\'est pas valide';
		}
	}
}


//AutoChange focus
var autofocus = function( initialSelector,length,nextSelector){
	$(initialSelector).keyup(function(e){
		if(this.value.length > length && e.keyCode != 8 && e.keyCode != 46 )
		{
			$(nextSelector).focus();
		}
	});
}

//Validate Expiration date
var validateExpDate = function( field, rules, i, options ){
 var today = new Date();
 var currentYear = (new Date).getFullYear();

 //convert currentYear to string and assign to var twoDigit
 var twoDigit = currentYear + "";

 //Get last two digit ( characters )
 twoDigit = twoDigit.substr(twoDigit.length - 2);

 //current month
 var mm = today.getMonth()+1;
 //select month
 var sm = +(field.val());

 if( sm < mm && $('#date_expiration_annee').val() == twoDigit ) {
   return "La date n'est pas valide";
 }
}