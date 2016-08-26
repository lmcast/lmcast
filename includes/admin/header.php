<!-- (c) 2016 Littlered615 Media Network.-->
<?php
  ini_set('display_startup_errors',1);
  ini_set('display_errors',1);
  error_reporting(E_ALL && ~E_NOTICE);
  include '../includes/connect-db.php';
  include '../includes/header.php';
  include '../includes/site/functions.php';
  include '../includes/admin/functions.php';
  $admin = new AdminFunction();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../includes/css/admin.css" rel="stylesheet"/>
        <script src="../includes/admin/menu.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title><?php $admin->location($_SERVER['PHP_SELF'], 'name') ?> |<?php $admin->getSiteName($_SERVER['HTTP_HOST']); ?></title>
    </head>
    <body id="main">
        <div id="admin-mobile-area">
            <button id="admin-menuclose"><i class="fa fa-times"></i></button>
            <div class="admin-mobile-title">
                Main Menu
            </div>
            <div class="admin-mobile-menu">
              <ul class="admin-mobile-marea">
                <?php $admin->MainMenu(); ?>
              </ul>
            </div>
        </div>
        <div id="admin-user-area">
            <button id="admin-userclose"><i class="fa fa-times"></i></button>
            <div class="admin-mobile-title">
                Welcome, <?php echo $admin->cUserName(); ?>
            </div>
            <div class="admin-mobile-menu">
                <ul>
                    <?php $admin->profileMenu(); ?>
                </ul>
            </div>
        </div>
        <table id="admin-head">
            <tr id="admin-desktop">
                <td class="admin-head-left">
                  <ul>
                    <?php $admin->MainMenu(); ?>
                  </ul>
                </td>
                <td class="admin-head-right">
                    <ul>
                        <li>
                            <a class="alink" href="profile"><img class="admin-head-profile" src="<?php $admin->cUserAvatar(20); ?>" alt="<?php echo $admin->cUserName(); ?>"> Welcome, <?php echo $admin->cUserName(); ?></a>
                            <?php $admin->profileMenu(); ?>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr id="admin-mobile">
                <td class="admin-head-left">
                    <button id="admin-menuopen"><i class="fa fa-bars"></i></button>
                </td>
                <td class="admin-head-right">
                    <button id="admin-useropen"><img src="<?php cUserAvatar(25) ?>" alt="<?php echo $admin->cUserName(); ?>"></button>
                </td>
            </tr>
        </table>
