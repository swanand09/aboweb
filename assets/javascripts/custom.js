
$(function(){    
	carousel('.etapes li.etape1','.etape1');
	carousel('.etapes li.etape2','.etape2');
	carousel('.etapes li.etape3','.etape3');
	carousel('.etapes li.etape4','.etape4');

});


var carousel = function(selector,inverse) {
	$(selector).mouseover( function()
	{
		$(selector).addClass("etape-active");
		$('.etapes li:not('+inverse+')').removeClass("etape-active");
	}).mouseout(function(){

		$(selector).removeClass("etape-active");
	});
}

