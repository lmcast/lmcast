$(document).ready(function(){
  $('.alink').click(function(event){
    var href = $(this).attr('href');
    var title = $(this).attr('title');
    var name = "Littlered615 Media Portal";
    if(href !== "#"){
      $('#admin-area').load(href+' #admin-area');
      $('title').html(title+' | '+name);
      var state = { 'page_name': $('#link').data('state') };
      var title = title+' | '+name;
      var url = href;
      history.pushState(state, title, url);
    };
    event.preventDefault();
  });
  $('.admin-mobile-marea .dropdown > a').after(' <button id="menumobile-trigger2"><i class="fa fa-caret-down"></i></button>');
   $('#admin-menuopen').click(function(){
       $('#admin-mobile-area').animate({ left: "0px" }, 200);
   });
   $('#admin-menuclose').click(function(){
       $('#admin-mobile-area').animate({ left: "-305px"}, 200);
   });
   $('#admin-useropen').click(function(){
       $('#admin-user-area').animate({ right: "0px" }, 200);
   });
   $('#admin-userclose').click(function(){
       $('#admin-user-area').animate({ right: "-270px" }, 200);
   });
   $("#menumobile-trigger2").click(function(){
     $(this).next().slideToggle(200);
   });
});
