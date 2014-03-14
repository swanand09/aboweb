$(function() {

   //initial Promotion text before selecting Ultra
  window.promoInitialText = getUltraInitialPrice();

  //Disable 'list of bouquet' on startup
  if(!$('#filter').find('li').hasClass('active')){
    $('.four.bouquet').fadeTo('slow',.5);
  }

  //Enable/Disable 'list of bouquet' on Click/Checkbox
  //Enable/Disable checkbox Ultra options
  //Open accordion on Click/ Checkbox
  $(document).on('click','#beneficier',function(){

    //caching DOM objects
    var decodeurTvNetgem = $('#decodeur-tv-netgem');
    var ultraOption = $('input.ultraoption');
    var disabledDiv = $('.disabled-div');

    if($(this).is(":checked"))
    {
      decodeurTvNetgem.attr('disabled', true);
      decodeurTvNetgem.prop('checked', true);
      $('.four.bouquet').fadeTo('slow',1);
      disabledDiv.hide();
      $('.accordion .first').addClass('active');
      $('.accordion .first .content').css({ display: 'block'});
      ultraOption.attr('disabled', false);
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
      if(ultraOption.is(":checked"))
      {
        removeUltraoptions(promoInitialText);
        ultraOption.attr('disabled', true);
      }
      //reinitiate Chaine filter group
      $('#filter li').removeClass('active');
      var selector = $('.eight.chaines .grid li');
      chainesFilter(selector,'ultra');
    }
  });

  //Default selected 'Bouquet'
  //chainesFilter($('.eight.chaines .grid li'),'mega');

  $(document).on('click','#filter li',function(e){
   var selector = $('.eight.chaines .grid li');
   if(!$(this).hasClass('select'))
   {
     e.preventDefault();

     if($('#filter li').hasClass('active')){
       var option = $('#filter li.active').find('a');
      if(option.attr('data-group') == "ultra"){
       removeUltraoptions(promoInitialText)
      }
     }
     $('#filter li').removeClass('active');
     $(this).addClass('active');
     var datagroup = $(this).children('a').attr('data-group');
     

     //if ultra is selected, option ultra will be checked
     if(datagroup == 'ultra')
     {
       addUltraOptions('INCLUS');
     }
    /* else //option ultra will be unchecked
     {
       removeUltraoptions(promoInitialText);
     }   */ 
     chainesFilter(selector,datagroup);
   }
   else
   {
    $('#filter li.select').find('input').prop('checked',false);
    $('#filter li.select').find('input').removeAttr('checked');

    $(this).find('input').prop('checked',true);
    $(this).find('input').attr('checked','checked');

    $('#filter li').removeClass('active');
    $(this).prev().addClass('active');

    var datagroup = $(this).prev().children('a').attr('data-group');
    //if ultra is selected, option ultra will be checked
    if(datagroup == 'ultra')
    {
      addUltraOptions('INCLUS');
    }
    else
    {
      removeUltraoptions(promoInitialText);
    }
    chainesFilter(selector,datagroup);
   }

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

// Checked Ultra options 
var addUltraOptions = function(new_content) {

  var ultraOption = $('input.ultraoption');
  ultraOption.prop('checked', true);
  ultraOption.attr('checked', 'checked');
  ultraOption.attr('disabled', true);
  //change 9€ to INCLUS
  $('.prix_option').addClass('inclus');
  $('.prix_option').html(new_content);
  $('html, body').animate({
        scrollTop: $(".row.ultra").offset().top
    }, 1500);
}

// Uncheck Ultra options 
var removeUltraoptions = function(initial_content) {

  var ultraOption = $('input.ultraoption');
  ultraOption.prop('checked', false);
  ultraOption.removeAttr('checked');
  ultraOption.attr('disabled', false);
  //change INCLUS to 9€
  $('.prix_option').removeClass('inclus');
  setUltraInitialPrice(initial_content);
}

//Get initial prices of Ultra option
var getUltraInitialPrice = function() {

  var rowUltra = $('.row.ultra');
  var initialPriceArr = new Array();

  rowUltra.each(function(){
   initialPriceArr.push($(this).find('.prix_option').html());
  });
  return initialPriceArr;
}

//Set initial price of Ultra Option
var setUltraInitialPrice = function( initialText ) {

  var rowUltra = $('.row.ultra');
  var i = 0;
  rowUltra.each(function(){
   $(this).find('.prix_option').html(initialText[i]);
   i++;
  });
}