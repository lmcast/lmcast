$(document).ready(function() {
  $('.slink').click(function(event){
    var href = $(this).attr('href');
    var title = $(this).attr('title');
    var name = "Littlered615 Media Portal";
    $('.admin-soptions-area').load(href+' .admin-soptions-area');
    $('.admin-soptions-marea').load(href+' .admin-soptions-marea');
    $('title').html(title+' | '+name);
    var state = { 'page_name': $('#link').data('state') };
    var title = title+' | '+name;
    var url = href;
    history.pushState(state, title, url);
    event.preventDefault();
  })
});
