<?php
    if(isset($_SERVER['REDIRECT_STATUS'])){
        $eCode = $_SERVER['REDIRECT_STATUS'];
    } else {
        $eCode = null;
    }
    $msg = array(
        403 => array('Closed', 'Closed to the Public.','This part of the site is not available for public view. Please go back to the previous page or go to our homepage to see all of the content you see on our website.<br><br><code>Error: 403</code>'),
        404 => array('Not Found', 'Page or File is not found.','The site that you have been sent to is either removed or not available at this time. Please go to the homepage to find your way to the proper page or contact the owner of the website.<br><br><code>Error: 404</code>'),
        500 => array('Server Error', 'Something went wrong with our servers with handling your request. Please, email the webmaster about this issue.<br><br><code>Error: 500</code>')
    );
    if ($eCode !== null) {
    $pTitle = $msg[$eCode][0];
    $title = $msg[$eCode][1];
    $message = $msg[$eCode][2];
    if(empty($title)){
        $pTitle = 'Error';
        $title = 'Something is not right...';
        $message = "We are currently having some issues with the website. If you can please contact the website owner immediatly and take a picture of this screen with the URL still attached and the website owner will try to solve the problem.";
    }
    } else {
        $pTitle = 'Error';
        $title = 'We have just encountered a problem.';
        $message = "We are currently having some issues with the website. If you can please contact the website owner immediatly and take a picture of this screen with the URL still attached and the website owner will try to solve the problem.";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                background: url('/includes/img/nav-bg.png') repeat;
                padding: 0;
                margin: 0;
            }
            .error-area {
                background: red;
                width: 70%;
                margin-left: auto;
                margin-right: auto;
                margin-top: 10%;
                padding: 5px;
                border-radius: 0px 10px;
                color: #FFF;
                font-size: 18px;
                font-family: 'Roboto', sans-serif;
                box-shadow: 0 0 10px #000;
            }

            .error-title {
                font-size: 24px;
                font-family: 'Days One', sans-serif;
            }

            p {
                margin-top: 5px;
                margin-bottom: 5px;
            }
        </style>
        <script src='https://use.fontawesome.com/ebb5fa27a2.js'></script>
        <link href='//fonts.googleapis.com/css?family=Noto+Sans|Days+One|Roboto|Play' rel='stylesheet' type='text/css'>
        <title> <?php echo $pTitle ?> | LMN CMS</title>
    </head>
    <body>
        <div class="error-area">
            <div class="error-title">
                <i class="fa fa-exclamation-triangle"></i> <?php echo $title ?>
            </div>
            <p>
                <?php echo $message ?>
            </p>
        </div>
    </body>
</html>
