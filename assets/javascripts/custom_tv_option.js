$(function() {

  //Disable 'list of bouquet' on startup
  $('.four.bouquet').fadeTo('slow',.5);

  //Enable/Disable 'list of bouquet' on Click/Checkbox
  //Enable/Disable checkbox Bein/Eden
  //Open accordion on Click/ Checkbox
  $(document).on('click','#beneficier',function(){

    //caching DOM objects
    var decodeurTvNetgem = $('#decodeur-tv-netgem');
    var optionEden = $("input[name='eden']");
    var optionBein = $("input[name='bein']");
    var disabledDiv = $('.disabled-div');


    if($(this).is(":checked"))
    {
      decodeurTvNetgem.attr('disabled', true);
      decodeurTvNetgem.prop('checked', true);
      $('.four.bouquet').fadeTo('slow',1);
      disabledDiv.hide();
      $('.accordion .first').addClass('active');
      $('.accordion .first .content').css({ display: 'block'});
      optionEden.attr('disabled', false);
      optionBein.attr('disabled', false);
    }
    else
    {
      $('.four.bouquet').fadeTo('slow',.6);
      disabledDiv.show();
      decodeurTvNetgem.prop('checked', false);
      $('.accordion .first').removeClass('active');
      $('.accordion .second').removeClass('active');
      $('.accordion .first .content').css({ display: 'none'});
      $('.accordion .second .content').css({ display: 'none'});
      optionEden.attr('disabled', true);
      optionBein.attr('disabled', true);
      optionEden.prop('checked', false);
      optionBein.prop('checked', false);
    }
  });

  //initial Promotion text before selecting Ultra
  var promoInitialText = $('.prix_option').html();
  //Default selected 'Bouquet'
  //chainesFilter($('.eight.chaines .grid li'),'mega');

  $(document).on('click','#filter li',function(e){
    e.preventDefault();
    $('#filter li').removeClass('active');
    $(this).addClass('active');
    var datagroup = $(this).children('a').attr('data-group');
    var selector = $('.eight.chaines .grid li');

    //if ultra is selected, option ultra will be checked
    if(datagroup == 'ultra')
    {
      addUltraOptions('INCLUS');
    }
    else //option ultra will be unchecked
    {
      //Enable option Bein & Eden Checkbox
      removeUltraoptions(promoInitialText);
    }
    chainesFilter(selector,datagroup);
  });

});

/*
* Function 
* Filter the 'chaines/logo' depending on the datagroup
*/
var chainesFilter = function(selector,datagroup) {
  $.each(selector,function(){
    var datagroups = $(this).attr('data-groups');
    datagroups = $.parseJSON(datagroups);
    var search_result = $.inArray(datagroup, datagroups);

    if( search_result < 0 ) {
      $(this).hide('slow');
    }
    else
    {
      $(this).show('slow');
    }
  });
}

// Checked Ultra options ( Bein & Eden )
var addUltraOptions = function(new_content) {

  $("input[name='eden']").prop('checked', true);
  $("input[name='eden']").attr('disabled', true);
  $("input[name='bein']").prop('checked', true);
  $("input[name='bein']").attr('disabled', true);
  //change 9€ to INCLUS
  $('.prix_option').addClass('inclus');
  $('.prix_option').html(new_content);
  $('html, body').animate({
        scrollTop: $(".row.ultra").offset().top
    }, 1500);
}

// Uncheck Ultra options ( Bein & Eden )
var removeUltraoptions = function(initial_content) {

  $("input[name='eden']").prop('checked', false);
  $("input[name='eden']").attr('disabled', false);
  $("input[name='bein']").prop('checked', false);
  $("input[name='bein']").attr('disabled', false);
  //change INCLUS to 9€
  $('.prix_option').removeClass('inclus');
  $('.prix_option').html(initial_content);
}




