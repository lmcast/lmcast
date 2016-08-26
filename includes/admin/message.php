<?php
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}
$data = array(
    '100' => array('Direct access of this file is not allowed.','red'),
    '101' => array('The title is needed for the post.','red'),
    '102' => array('Content is needed for the post.','red'),
    '103' => array('The dashboard post was not accepted on our database. Please email the administrator for help with this issue.','orange'),
    '104' => array('Your dashboard post was successfully submitted.','green'),
    '105' => array('The dashboard post was not successfully deleted.','red'),
    '106' => array('The dashboard post was successfully deleted.','green'),
    '403' => array('This account has been successfully deleted.','green'),
    '500' => array('Direct access to this file is not allowed.','red'),
    '501' => array('Please enter your username.','red'),
    '502' => array('Please enter your email address.','red'),
    '505' => array('This account has been successfully edited.','green'),
    '700' => array('The title for the post is required to post on our website.','red'),
    '701' => array('The post must contain something in the content section in order for this post to appear on our website.','red'),
    '702' => array('The post has been successfully submitted.','green'),
    '800' => array('Username is required for registration.','red'),
    '801' => array('Email is required for registration.','red'),
    '802' => array('Please select the role of the user.','red'),
    '803' => array('Please enter in your password.','red'),
    '804' => array('Please re-enter in your password.','red'),
    '805' => array('Your password does not match. Please re-enter your password.','red'),
    '806' => array('This username matches another username in our database. Please enter another username.', 'red'),
    '807' => array('This email matches another email in our database. Please enter another email.','red'),
    '808' => array('The user is now offically registered with the site.','green'),
    '809' => array('The info that you have sent to the site did not go through. Please email the administrator for assistance with this issue.', 'orange'),
    '600' => array('The website could not submit your form. Please, try again.','orange'),
    '601' => array('The name of the site is required for the site.','red'),
    '602' => array('A Site URL is required for the site.','red'),
    '603' => array('An adminstrative email address is required of this site.','red'),
    '604' => array('The form has been submitted successfully.','green'),
    '605' => array('There was a problem in submitting the form. Please email the adminstrator for assistance with this issue.', 'orange'),
    '606' => array('The title to the maintenance page is missing. Please type in a title for the page.', 'red'),
    '607' => array('The content to the maintenance page is missing. Please type the content for the page.', 'red')
);

if(isset($msg)){
    if(empty($msg)){
    ?>
        <script>
            $(document).ready(function(){
                $('#admin-message').fadeIn(500);
                $('#admin-message').css('background-color','orange');
                $('#admin-closemessage').css('color','orange');
                $('#admin-messagetext').text('Message not found.');
                $('#admin-closemessage').click(function(){
                    $('#admin-message').fadeOut(500);
                });
            });
        </script>
    <?php
    } elseif (empty($data[$msg][0])) {
        ?>
        <script>
            $(document).ready(function(){
                $('#admin-message').fadeIn(500);
                $('#admin-message').css('background-color','orange');
                $('#admin-closemessage').css('color','orange');
                $('#admin-messagetext').text('Message not found.');
                $('#admin-closemessage').click(function(){
                    $('#admin-message').fadeOut(500);
                });
            });
        </script>
        <?php
    } else {
        ?>
        <script>
            $(document).ready(function(){
                $('#admin-message').fadeIn(500);
                $('#admin-message').css('background-color','<?php echo $data[$msg][1];?>');
                $('#admin-closemessage').css('color','<?php echo $data[$msg][1];?>');
                $('#admin-messagetext').text('<?php echo $data[$msg][0];?>');
                $('#admin-closemessage').click(function(){
                    $('#admin-message').fadeOut(500);
                });
            });
        </script>
        <?php
    }
}
