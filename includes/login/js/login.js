$( '#link' ).click(function(event){
    if($('#login-message').css('display') !== 'none'){
        $('#login-message').fadeOut(500);
    }
    function complete2(){
      $("#login-content").fadeIn(500);
    }

    function complete(){
        $('#login-container').load($('#link').data("page"),complete2);
    };
    var titlename = $('#link').data('title');
    $('title').text($('#link').data('title')+' | LMN CMS');
    var state = { 'page_name': $('#link').data('state') };
    var title = titlename;
    var url = $('#link').data('target');
    history.pushState(state, title, url);
    $('#login-content').fadeOut(500,complete);
    event.preventDefault();
});

$( '#link2' ).click(function(event){
    if($('#login-message').css('display') !== 'none'){
        $('#login-message').fadeOut(500);
    }
    function complete(){
        $('#login-container').load($('#link2').data("page"));
    };
    var titlename = $('#link2').data('title');
    $('title').text($('#link2').data('title')+' | LMN CMS');
    var state = { 'page_name': $('#link2').data('state') };
    var title = titlename;
    var url = $('#link2').data('target');
    history.pushState(state, title, url);
    $('#login-content').fadeOut(500,complete);
    event.preventDefault();
});

$( '#login-message-close').click(function(){
    $('#login-message').fadeOut(500);
});

$(document).ready(function(){
    $("#login-content").fadeIn(500);
});
