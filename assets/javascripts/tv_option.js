
$(function() {

  //set initial state of TV chaines
  $('#mega, #giga').css({ opacity:0.2 });


  /*---------------------------------
  * MOUSEOVER / MOUSEOUT
  ----------------------------------*/
  // Mega option
  $(".options_tab .mega").mouseover(function() {

    $('#giga').css({ opacity:0.2 });
    $('#mega').css({ opacity:1});
    $('.options_tab .mega,.options_tab .giga,.options_tab .ultra').removeClass( 'active');
    $(this).addClass('active');

  }).mouseout(function() {
    if($(".frm-tv input[type='radio']:checked").length > 0 )
    {
      retainState();
    }
    else 
    {
      $('#mega').css({ opacity:0.2});
      $(this).removeClass('active');

    }

  });

 
  // Giga option
  $(".options_tab .giga").mouseover(function() {

    $('#mega, #giga').css({ opacity:1 });
    $('.options_tab .mega,.options_tab .giga,.options_tab .ultra').removeClass( 'active');
    $(this).addClass( "active" );

  }).mouseout(function() {

    if($(".frm-tv input[type='radio']:checked").length > 0 )
    {
      retainState();
    }
    else
    {
      $('#mega, #giga').css({ opacity:0.2 });
      $(this).removeClass('active');
    }

  });


  // Ultra option
  $(".options_tab .ultra").mouseover(function() {
    
   $('#mega, #giga').css({ opacity:1 });
   $('.options_tab .mega,.options_tab .giga,.options_tab .ultra').removeClass( 'active');
   $(this).addClass( "active" );

  }).mouseout(function() {

    if($(".frm-tv input[type='radio']:checked").length > 0 )
    {
      retainState();
    }
    else
    {
      $('#mega, #giga').css({ opacity:0.2 });
      $(this).removeClass('active');
    }

  });


 /*---------------------------------
  * ON CLICK MODAL / REVEAL() JS FUNC
  ----------------------------------*/
  // Mega modal
  $('#link-mega').click(function() {
    DynamicModal('BOUQUET MEGA','mega-modal',$('#mega').html());
    return false;
  });

  // Giga modal
  $('#link-giga').click(function() {
     DynamicModal('BOUQUET GIGA','giga-modal', $('#mega').html() + $('#giga').html());
     return false;
  });

  //Ultra modal
  $('#link-ultra').click(function() {

    var content = $('#mega').html() + "<div class='row'>"+ $('#giga').html() +"</div><div class='row'>"+ $('#ultra').html() + "</div>";
    DynamicModal('BOUQUET ULTRA','ultra-modal',content);
    return false;
  });

  
  /*---------------------------------
  * RADIO BTN - ON CLICK 
  ----------------------------------*/
  $(".frm-tv input[type='radio']").click(function(){

    switch($(this).val())
    {
      case "mega":
        $('#mega').css({ opacity:1});
        removeUltraoptions();
      break;

      case "giga":
        $('#giga').css({ opacity:1});
        removeUltraoptions();
      break;

      case "ultra":
        $('#ultra').css({ opacity:1});
        addUltraOptions();
      break;
    }

  });

});


/*
* Functions 
*/

//Create a bootstrap modal with an unique ID and content as arg
var DynamicModal = function(title,id,content)
{
  if ($('#'+id).length == 0)
  {
    var dmodal = "<div id='"+id+"' class='reveal-modal medium modal fade chaines-mdl' role='dialog'><div class='modal-header'><a class='close-reveal-modal'>&#215;</a><h3>"+title+"</h3></div> <div class='modal-body'><div class='row'>" + content + "</div></div></div>";
    $('body').append(dmodal);
  }
  $('#'+id).reveal();
}

// Checked Ultra options ( Bein & Eden )
var addUltraOptions = function() {

  $("input[name='eden']").prop('checked', true);
  $("input[name='eden']").attr('disabled', true);

  $("input[name='bein']").prop('checked', true);
  $("input[name='bein']").attr('disabled', true);
}

// Uncheck Ultra options ( Bein & Eden )
var removeUltraoptions = function() {

  $("input[name='eden']").prop('checked', false);
  $("input[name='eden']").attr('disabled', false);

  $("input[name='bein']").prop('checked', false);
  $("input[name='bein']").attr('disabled', false);
}

//retain Opacity and active label of Bouquet depending on value of checked Radio button while MOUSEOUT
var retainState = function() {
  
  var radioValue = $(".frm-tv input[type='radio']:checked").val();

  switch(radioValue)
  {
    case "mega":
      $('#mega').css({ opacity:1 });
      $('#giga').css({ opacity:0.2 });
      $('.options_tab .mega').addClass('active');
    break;

    case "giga":
      $('#mega, #giga').css({ opacity:1 });
      $('.options_tab .giga').addClass('active');
    break;

    case "ultra":
      $('#mega, #giga').css({ opacity:1 });
      $('.options_tab .ultra').addClass('active');
    break;
  }
}



