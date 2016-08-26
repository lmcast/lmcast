<html>
<head>
    <title><?php LMNTitle($pType,$pURL); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Days+One|Roboto" rel="stylesheet">
    <script src='https://use.fontawesome.com/ebb5fa27a2.js'></script>
    <link href='//<?php echo $_SERVER['HTTP_HOST']; ?>/includes/css/sitehead.css' rel='stylesheet' type='text/css'>
    <link href='//<?php echo $_SERVER['HTTP_HOST']; ?>/content/themes/lmn-flex2/style.css' rel='stylesheet' type='text/css'>
</head>
<body>
    <?php include "includes/site/usermenu.php" ?>
    <table id='site-head'>
      <tr class='head-desktop'>
          <td class='head-logo'>
            <a href="<?php echo '//' . siteURL(); ?>" title="Homepage"><img src='//<?php echo $_SERVER['HTTP_HOST']; ?>/content/themes/lmn-flex2/img/logo.png' alt='Littlered615 Media Logo'></a>
          </td>
          <td class='head-social'>
            <table id="smedia-area">
              <tr>
                <td class="smedia-title">
                  Social Media:
                </td>
                <td class="smedia-links-desktop">
                  <?php if(isSocialLink('Facebook')){ ?>
                  <a href="<?php echo SocialLink('Facebook'); ?>" title="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                  <?php }
                  if(isSocialLink('Twitter')){ ?>
                  <a href="<?php echo SocialLink('Twitter'); ?>" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  <?php }
                  if(isSocialLink('YouTube')) { ?>
                    <a href="<?php echo SocialLink('YouTube'); ?>" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                  <?php }
                  if(isSocialLink('Instagram')) {?>
                  <a href="<?php echo SocialLink('Instagram'); ?>" title="Instagram"><i class="fa fa-instagram"></i></a>
                  <?php }
                  if(isSocialLink('Twitch')) {?>
                  <a href="<?php echo SocialLink('Twitch'); ?>" title="Twitch"><i class="fa fa-twitch" aria-hidden="true"></i></a>
                  <?php } ?>
                </td>
            </table>
          </td>
      </tr>
    </table>
    <div id='site-menu'>
      Soon!
    </div>
