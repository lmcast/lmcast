<?php
session_start();
if(isset($_SESSION['ID'])) {
include('../includes/admin/header.php');
$user = $admin->getProfileUser($_SESSION['ID']);
?>
        <div id="admin-area">
            <div id="admin-content">
                <div class="admin-title">
                    <?php
                    if(!empty($admin->location($_SERVER['PHP_SELF'], 'logo'))){
                        $admin->location($_SERVER['PHP_SELF'], 'logo');
                        echo ' ';
                    };
                        $admin->location($_SERVER['PHP_SELF'], 'name');
                    ?>
                </div>
                <table style="width: 100%;">
                <tr class="admin-form-desktop">
                    <td>
                    <form action='actions/doEditUser.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Nickname
                        </td>
                        <td class='admin-form-input'>
                            <input type="text" name='Name' value="<?php echo $user['User_Name']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Username<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Username' value="<?php echo $user['User_Login']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Display Name
                        </td>
                        <td class='admin-form-input'>
                            <select name="Display" class="admin-form-select">
                                <option value="User_Login" <?php if($user['User_View'] == 'User_Login') { ?>selected<?php }?>>Username</option>
                                <option value="User_Name" <?php if($user['User_View'] == 'User_Name') { ?>selected<?php }?>>Nickname</option>
                            </select>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-envelope-o"></i> Email<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <input type='email' name='Email' value="<?php echo $user['User_Email']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> About Me
                        </td>
                        <td class='admin-form-input'>
                            <textarea class='admin-form-textbox' name="About"><?php echo $user['User_About']; ?></textarea>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td colspan="2" class="admin-form-heading">
                            Social Media
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-facebook-official"></i> Facebook
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Facebook' value="<?php echo $user['User_Fb']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-twitter"></i> Twitter
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Twitter' maxlength="15" value="<?php echo $user['User_Twitter']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-twitch"></i> Twitch
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Twitch' value="<?php echo $user['User_Twitch']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-youtube"></i> YouTube
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='YouTube' value="<?php echo $user['User_YT']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-bullhorn"></i> Hitbox
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Hitbox' value="<?php echo $user['User_Hitbox']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td colspan="2" class='admin-form-heading'>
                            <i class='fa fa-key'></i> Change Password
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class='fa fa-key'></i> Password
                        </td>
                        <td class='admin-form-input'>
                            <input type='password' name='Pass' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class='fa fa-key'></i> Confirm Password
                        </td>
                        <td class='admin-form-input'>
                            <input type='password' name='PassConf' class='admin-form-text'>
                        </td>
                    </tr>
                    </table>
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']; ?>">
                    <button type='submit' class='admin-form-submit'>Submit</button>
                </form>
                    </td>
                </tr>
                <tr class="admin-form-mobile">
                    <td>
                <form action='doEditUser.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Nickname
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type="text" name='Name' value="<?php echo $user['User_Name']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Username<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Username' value="<?php echo $user['User_Login']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Display Name
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <select name="Display" class="admin-form-select">
                                <option value="User_Login" <?php if($user['User_View'] == 'User_Login') { ?>selected<?php }?>>Username</option>
                                <option value="User_Name" <?php if($user['User_View'] == 'User_Name') { ?>selected<?php }?>>Nickname</option>
                            </select>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-envelope-o"></i> Email<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='email' name='Email' value="<?php echo $user['User_Email']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> About Me
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <textarea class='admin-form-textbox' name="About"><?php echo $user['User_About']; ?></textarea>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td colspan="2" class="admin-form-heading">
                            Social Media
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-facebook-official"></i> Facebook
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Facebook' value="<?php echo $user['User_Fb']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-twitter"></i> Twitter
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Twitter' maxlength="15" value="<?php echo $user['User_Twitter']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-twitch"></i> Twitch
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Twitch' value="<?php echo $user['User_Twitch']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-youtube"></i> YouTube
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='YouTube' value="<?php echo $user['User_YT']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-bullhorn"></i> Hitbox
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Hitbox' value="<?php echo $user['User_Hitbox']; ?>" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-heading'>
                            <i class='fa fa-key'></i> Change Password
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class='fa fa-key'></i> Password
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='password' name='Pass' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class='fa fa-key'></i> Confirm Password
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='password' name='PassConf' class='admin-form-text'>
                        </td>
                    </tr>
                    </table>
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']; ?>">
                    <button type='submit' class='admin-form-submit'>Submit</button>
                </form>
                </td>
                </tr>
                </table>
            </div>
        </div>
<?php include('../includes/admin/footer.php');
}
