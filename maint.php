<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                background: url('/includes/img/nav-bg.png') repeat;
                padding: 0;
                margin: 0;
            }

            #maint-area {
                width: 70%;
                max-width: 750px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 10%;
                padding: 5px;
                color: #FFF;
                font-size: 18px;
                font-family: 'Roboto', sans-serif;
                background: rgba(255,0,0,1);
                padding: 5px;
                border-radius: 10px
            }

            #maint-title {
                font-size: 24px;
                font-family: 'Raleway', sans-serif;
                font-weight: lighter;
            }

            .maint-content {
              background: rgba(0,0,0,0.5);
              padding: 5px;
              border-radius: 10px;
            }

            p {
                margin-top: 5px;
                margin-bottom: 5px;
            }
        </style>
        <script src='https://use.fontawesome.com/ebb5fa27a2.js'></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
        <title><?php MaintContext('title'); ?> | <?php siteName(); ?></title>
    </head>
    <body>
        <div id="maint-area">
            <div id="maint-title">
                <i class="fa fa-exclamation-triangle"></i> <?php MaintContext('title'); ?>
            </div>
            <div class="maint-content">
                <?php MaintContext('content'); ?>
            </div>
        </div>
    </body>
</html>
