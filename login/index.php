<!DOCTYPE html>
<html>
    <head>
        <?php
            session_start();
            if(!empty($_GET['page'])){
               $current = $_GET['page'];
            }
            if(empty($current)){
                $current = 'login';
            }
            include('../includes/header.php');
            include('../includes/login/functions.php');
        ?>
        <link href="../includes/css/login.css" rel="stylesheet">
        <title><?php login($current, 'title'); ?> | <?php siteName(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <script src="test.js"></script>
        <noscript>
        <style>
            #login-container {
                display: block;
            }
        </style>
        </noscript>
    </head>
    <body>
        <?php if(!isset($_SESSION['ID'])) {?>

        <div id="login-message">
            <table>
                <tr>
                    <td>
                        <button id="login-message-close"><i class="fa fa-times"></i></button>
                    </td>
                    <td id="login-message-text">

                    </td>
                </tr>
            </table>
        </div>
        <div id="login-content">
          <img src="../includes/img/cms-logo.png" alt="LM CMS Logo">
            <noscript>Please enable JavaScript to get the best web site experience.</noscript>
        <div id="login-container">
            <noscript>Please enable JavaScript to get the best web site experience.</noscript>
            <?php login($current, 'URL');?>
        </div>
        </div>
        <?php } else {
            header('Location: ../admin/');
        } ?>
    </body>
</html>
