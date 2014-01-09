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

	      //$sidebar.stop().animate({ marginTop: $window.scrollTop() - (offset.top) });
	  	}

	   }
	   lastScrollTop = st;
	});