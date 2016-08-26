<?php if(isset($_GET['msg'])){
    $code = $_GET['msg'];
}
$meanings = array(
    100 => array('green','You are now registered. Please, sign in.'),
    102 => array('red','Please enter email or password.'),
    103 => array('red','Your password is required to sign in.'),
    104 => array('red','Your username is not found. Please use a different username or <a href="?page=register" title="Register">register</a> for an account.'),
    105 => array('red','Your password is incorrect. Please try again.'),
    201 => array('red','Please enter a username.'),
    202 => array('red','Please enter an email address.'),
    203 => array('red','Please enter your password.'),
    204 => array('red','Please confirm your password.'),
    205 => array('red','Your password does not match. Please re-enter your password.'),
    206 => array('red','This username is currently being used. Please choose another username.'),
    207 => array('red','This email account is currently in use. Please use a different email address or <a href="?page=login" title="Login">login</a> using your email address.'),
    208 => array('red','The registration of your account did not go through. Please contact the website owner for assistance.'),
    209 => array('red','Registration is currently not allowed.'),
    300 => array('green','Please sign in to continue.'),
    301 => array('green','You have been successfully logged out.')
);

if(isset($code)){
    if(isset($meanings[$code][1])){
        $msg = $meanings[$code][1];
    }
    if(isset($meanings[$code][0])){
        $color = $meanings[$code][0];
    }
    if(empty($msg)){
        $msg = "Message is not known.";
        $color = 'orange';
        echo "<script>" . "$(document).ready(function(){" . "$( '#login-message' ).fadeIn(500);" . "$( '#login-message-text' ).html('" . $msg . "');" . "$( '#login-message' ).css('background-color','" . $color . "');" . "$( '#login-message-close' ).css('color','" . $color . "');});" . "</script>";
    } else {
        echo "<script>" . "$(document).ready(function(){" . "$( '#login-message' ).fadeIn(500);" . "$( '#login-message-text' ).html('" . $msg . "');" . "$( '#login-message' ).css('background-color','" . $color . "');" . "$( '#login-message-close' ).css('color','" . $color . "');});" . "</script>";
    }
}
