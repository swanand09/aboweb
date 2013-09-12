$(function(){

	//Set initial active state
	currentEtape();

	//Hover etape 1
	$('li.etape1').mouseover(function(){
		etape1();
	}).mouseout(function(){
		currentEtape();
	});

	//Hover etape 2
	$('li.etape2').mouseover(function(){
		etape2();
	}).mouseout(function(){
		currentEtape();
	});

	//Hover etape 3
	$('li.etape3').mouseover(function(){
		etape3();
	}).mouseout(function(){
		currentEtape();
	});

	//Hover etape 4
	$('li.etape4').mouseover(function(){
		etape4();
	}).mouseout(function(){
		currentEtape();
	});

	//hide parrain textboxes on load
	$('.parrain-section').hide();

	// hide or show depending on Value of radio button
	$("input[name='parrain']").click(function(){
		if( $(this).val() == 'oui' ) {
			$('.parrain-section').slideDown('slow');
		}
		else
		{
			$('.parrain-section').slideUp();
		}
	});


	

	//End of document.ready
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