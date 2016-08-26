$(document).ready(function(){
   $('.admin-dash-add').click(function(){
       href = 'addDash.php';
       title = $(this).attr('title');
       name = 'Littlered615 Media';
       $('#admin-area').load('../../admin/addDash.php #admin-area');
       var state = { 'page_name': $(this).data('state') };
       var title = title+' | '+name;
       var url = href;
       $('title').html(title+' | '+name);
   });
});
