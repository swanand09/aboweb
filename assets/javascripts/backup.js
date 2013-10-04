	$window.scroll(function() {
		console.clear();

		console.log("Window scrollTop:" + $window.scrollTop());
		console.log("Offsettop:" + offset.top);

/*	    if ($window.scrollTop() > offset.top ) {

	    	stopScroll = $('#stopScroll').offset().top;

	    	console.log("stopScroll:"+stopScroll);
	    	console.log("footerPosition:"+footerPosition);

	    	if( stopScroll < footerPosition )
	    	{
	    		$sidebar.stop().animate({ marginTop: $window.scrollTop() - (offset.top) + topPadding });
	    	}
	    } 
	    else {

	        $sidebar.stop().animate({ marginTop: 0 });
	        console.log("current sidebar_state :"+ $(".right-content").offset().top);

	    }*/
	});