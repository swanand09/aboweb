
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

	/*-------------------------------------/
	* Masked Input for Phone Number TODO : 
	--------------------------------------*/
	$('#ligne').mask("?99 99 99 99 99",{placeholder:" "});

	/*-------------------------------------/
	* Validation Engine
	--------------------------------------*/
	$("#mes-coordonnees").validationEngine();
	$("#frm-paiement").validationEngine();
	$(".frm-etape-tester").validationEngine({
		'custom_error_messages': {
			'#ligne': {
				'minSize': {'message' :" * 10 caractères requis"},
				'maxSize': {'message' :" * 10 caractères requis"}
			}
		}
	});

	/*-------------------------------------/
	* Right sidebar scroll ( PANIER )
	--------------------------------------*/

	var $sidebar   = $(".right-content"), 
	    $window    = $(window),
	    offset     = $sidebar.offset(),
	    topPadding = 0;
	var footerPosition = $('.main-footer').offset().top;
	var stopScroll;


	var lastScrollTop = 0;
	$(window).scroll(function(event){
		//console.clear();
	   var st = $(this).scrollTop();
	   if (st > lastScrollTop){ // IF scrolling Down

	       if ($window.scrollTop() > offset.top ) 
	       {
	      	    stopScroll = $('#stopScroll').offset().top;

	      	    if( stopScroll < footerPosition )
	      	    {
	      	    		//$sidebar.stop().animate({ marginTop: $window.scrollTop() - (offset.top) + topPadding });
	      	    }
	       } 
	   } 
	   else //if scrolling UP
	   {

	   	if( $window.scrollTop() > offset.top ) {

	     // $sidebar.stop().animate({ marginTop: $window.scrollTop() - (offset.top) });
	  	}

	   }
	   lastScrollTop = st;

	   console.log("stopScroll:"+stopScroll);
	   console.log("offset top:"+offset.top);
	   console.log("Window :"+$window.scrollTop());
	   console.log("footerPosition:"+footerPosition);
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
window.onload = function () {

	if($('.debit_emission').length > 0 )
	{
		var g1, g2;
		var g1 = new JustGage({
	          id: "g1", 
	          value: 0.4, 
	          min: 0,
	          max: 1,
	          title: "Débit d’émission",
	          label: "Mbps",
	          levelColors: ['95bc46','95bc46'],
	        });

		var g2 = new JustGage({
		      id: "g2", 
		      value: 17.5, 
		      min: 0,
		      max: 20,
		      title: "Débit de réception",
		      label: "Mbps",
		      levelColors: ['95bc46','95bc46'],
		    });	

	}
}