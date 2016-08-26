
$(document).ready(function(){
    $("#login").submit(function(event){
        var uname = $("#uname").val();
        var pass = $("#pass").val();
        if(uname === ''){
            function complete1(){
                $( '#login-message' ).fadeIn(500);
                $( '#login-message-text' ).html("Please, enter in a username.");
                $( '#login-message').css('background-color','red');
                $( '#login-message-close' ).css('color','red');
            }
            $("#pass").val('');
            if($('#login-message').css('display') !== 'none'){
                $('#login-message').fadeOut(500, complete1);
            } else {
                complete1();
            }
        } else if (pass === ''){
            function complete2(){
                $( '#login-message' ).fadeIn(500);
                $( '#login-message-text' ).html("Please, enter in a password.");
                $( '#login-message').css('background-color','red');
                $( '#login-message-close' ).css('color','red');
            }
            $("#pass").val('');
           if($('#login-message').css('display') !== 'none'){
                $('#login-message').fadeOut(500, complete2);
           } else {
               complete2();
           }
        } else {
            if($('#login-message').css('display') !== 'none'){
                $('#login-message').fadeOut(500);
            }
            $.ajax({
                type: "POST",
                url: "doLogin.php",
                data: {Username: uname, Password: pass, Type: 'ajax'},
                success: function(data){
                        if(data === "noUser"){
                            function complete1(){
                                $( '#login-message' ).fadeIn(500);
                                $( '#login-message-text' ).html("Your username is not found. Please use a different username or <a href='?page=register' title='Register'>register</a> for an account.");
                                $( '#login-message').css('background-color','red');
                                $( '#login-message-close' ).css('color','red');
                            }
                            if($('#login-message').css('display') !== 'none'){
                                $('#login-message').fadeOut(500, complete1);
                            } else {
                                complete1();
                            }
                        } else if (data === "notValid"){
                            function complete1(){
                                $( '#login-message' ).fadeIn(500);
                                $( '#login-message-text' ).html("Your credentials are not valid. Please, try again.");
                                $( '#login-message').css('background-color','red');
                                $( '#login-message-close' ).css('color','red');
                            }
                            if($('#login-message').css('display') !== 'none'){
                                $('#login-message').fadeOut(500, complete1);
                            } else {
                                complete1();
                            }
                        } else if (data === "success") {
                            if (redir.length == 0){
                              window.location = "../admin/";
                            } else {
                              window.location = redir;
                            }
                        }
                    }
                });
        }
        event.preventDefault();
    });
    $("#reg").submit(function(event){
        var uname = $("#uname").val();
        var email = $("#email").val();
        var pass = $("#pass").val();
        var pass2 = $("#pass2").val();
        if(uname === ""){
            function complete1(){
                $( '#login-message' ).fadeIn(500);
                $( '#login-message-text' ).html("Please, enter in a username.");
                $( '#login-message').css('background-color','red');
                $( '#login-message-close' ).css('color','red');
            }
            if($('#login-message').css('display') !== 'none'){
                $('#login-message').fadeOut(500, complete1);
            } else {
                complete1();
            }
        } else if(email === ""){
            function complete2(){
                $( '#login-message' ).fadeIn(500);
                $( '#login-message-text' ).html("Please, enter in a email address.");
                $( '#login-message').css('background-color','red');
                $( '#login-message-close' ).css('color','red');
            }
            if($('#login-message').css('display') !== 'none'){
                $('#login-message').fadeOut(500, complete2);
            } else {
                complete2();
            }
        } else if(pass === ""){
            function complete3(){
                $( '#login-message' ).fadeIn(500);
                $( '#login-message-text' ).html("Please, enter in a password.");
                $( '#login-message').css('background-color','red');
                $( '#login-message-close' ).css('color','red');
            }
           if($('#login-message').css('display') !== 'none'){
                $('#login-message').fadeOut(500, complete3);
           } else {
               complete3();
           }
        } else if(pass2 === ""){
            function complete4(){
                $( '#login-message' ).fadeIn(500);
                $( '#login-message-text' ).html("Please, confirm your password.");
                $( '#login-message').css('background-color','red');
                $( '#login-message-close' ).css('color','red');
            }
           if($('#login-message').css('display') !== 'none'){
                $('#login-message').fadeOut(500, complete4);
           } else {
               complete4();
           }
        } else if(pass !== pass2){
            function complete5(){
                $( '#login-message' ).fadeIn(500);
                $( '#login-message-text' ).html("Your password do not match. Please, re-enter your password.");
                $( '#login-message').css('background-color','red');
                $( '#login-message-close' ).css('color','red');
            }
           if($('#login-message').css('display') !== 'none'){
                $('#login-message').fadeOut(500, complete4);
           } else {
               complete5();
           }
        } else {
            if($('#login-message').css('display') !== 'none'){
                $('#login-message').fadeOut(500);
            }
            pass2 = null;
            $.ajax({
                type: "POST",
                url: "doReg.php",
                data: {Username: uname, Password: pass, Email: email},
                success: function(data){
                    if(data === "unameUsed") {
                        function complete1(){
                            $( '#login-message' ).fadeIn(500);
                            $( '#login-message-text' ).html("This username is currently being used. Please choose another username.");
                            $( '#login-message').css('background-color','red');
                            $( '#login-message-close' ).css('color','red');
                        }
                        if($('#login-message').css('display') !== 'none'){
                            $('#login-message').fadeOut(500, complete1);
                        } else {
                            complete1();
                        }
                    } else if(data === "emailUsed"){
                        function complete1(){
                            $( '#login-message' ).fadeIn(500);
                            $( '#login-message-text' ).html("This email account is currently in use. Please use a different email address or <a href='?page=login' title='Login'>login</a> using your email address.");
                            $( '#login-message').css('background-color','red');
                            $( '#login-message-close' ).css('color','red');
                        }
                        if($('#login-message').css('display') !== 'none'){
                            $('#login-message').fadeOut(500, complete1);
                        } else {
                            complete1();
                        }
                    } else {
                        if($('#login-message').css('display') !== 'none'){
                            $('#login-message').fadeOut(500);
                        }
                        function complete(){
                            $('#login-container').load($('#link2').data("page"));
                        };
                        var titlename = $('#link2').data('title');
                        $('title').html('Log In | LMN CMS');
                        var state = { 'page_name': $('#link2').data('state') };
                        var title = titlename;
                        var url = $('#link2').data('target');
                        history.pushState(state, title, url);
                        $('#login-container').fadeOut(500,complete);
                        }
                }
            });
        }
        event.preventDefault();
    });
});
