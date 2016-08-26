<!-- (c) 2016 Littlered615 Media Network.-->
<!DOCTYPE html>
<html>
    <head>
        <link href="../../includes/css/admin.css" rel="stylesheet"/>
        <?php
            include '../../includes/header.php';
            include '../../includes/site/functions.php';
            include '../../includes/admin/functions.php';
        ?>
        <script src="../../includes/admin/menu.js"></script>
        <title><?php location($_SERVER['PHP_SELF'], 'name') ?> | LMN CMS</title>
    </head>
    <body id="main">
        <div id="admin-mobile-area">
            <button id="admin-menuclose"><i class="fa fa-times"></i></button>
            <div class="admin-mobile-title">
                Main Menu
            </div>
            <div class="admin-mobile-menu">
                <?php MainMenu(); ?>
            </div>
        </div>
        <div id="admin-user-area">
            <button id="admin-userclose"><i class="fa fa-times"></i></button>
            <div class="admin-mobile-title">
                Welcome, <?php echo cUserName(); ?>
            </div>
            <div class="admin-mobile-menu">
                <ul>
                    <?php profileMenu(); ?>
                </ul>
            </div>
        </div>
        <table id="admin-head">
            <tr id="admin-desktop">
                <td class="admin-head-left">
                    <?php MainMenu(); ?>
                </td>
                <td class="admin-head-right">
                    <ul>
                        <li>
                            <a href="profile"><img class="admin-head-profile" src="<?php cUserAvatar(20) ?>" alt="<?php echo cUserName(); ?>"> Welcome, <?php echo cUserName(); ?></a>
                            <?php profileMenu(); ?>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr id="admin-mobile">
                <td class="admin-head-left">
                    <button id="admin-menuopen"><i class="fa fa-bars"></i></button>
                </td>
                <td class="admin-head-right">
                    <button id="admin-useropen"><img src="<?php cUserAvatar(25) ?>" alt="<?php echo cUserName(); ?>"></button>
                </td>
            </tr>
        </table>
        