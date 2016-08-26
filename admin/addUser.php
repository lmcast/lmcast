<?php
session_start();
if(isset($_SESSION['ID'])) {
include('../includes/admin/header.php');
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
                    <form action='actions/doAddUser.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Nickname
                        </td>
                        <td class='admin-form-input'>
                            <input type="text" name='Name' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Username<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Username' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                      <td class="admin-form-label">
                        <i class="fa fa-key"></i> User Account Type
                      </td>
                      <td class="admin-form-input">
                        <select name="Role" class="admin-form-select">
                          <?php $admin->getRolelist(); ?>
                        </select>
                      </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Display Name
                        </td>
                        <td class='admin-form-input'>
                            <select name="Display" class="admin-form-select">
                                <option value="User_Login" selected>Username</option>
                                <option value="User_Name">Nickname</option>
                            </select>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-envelope-o"></i> Email<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <input type='email' name='Email' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> About Me
                        </td>
                        <td class='admin-form-input'>
                            <textarea class='admin-form-textbox' name="About"></textarea>
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
                            <input type='text' name='Facebook' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-twitter"></i> Twitter
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Twitter' maxlength="15" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-twitch"></i> Twitch
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Twitch' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-youtube"></i> YouTube
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='YouTube' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-bullhorn"></i> Hitbox
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Hitbox' class='admin-form-text'>
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
                    <button type='submit' class='admin-form-submit'>Submit</button>
                </form>
                    </td>
                </tr>
                <tr class="admin-form-mobile">
                    <td>
                <form action='actions/doAddUser.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Nickname
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type="text" name='Name' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> Username<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Username' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                      <td class="admin-form-label">
                        <i class="fa fa-key"></i> User Account Type
                      </td>
                    </tr>
                    <tr class='admin-form-section'>
                      <td class="admin-form-input">
                        <select name="Role" class="admin-form-select">
                          <?php $admin->getRolelist(); ?>
                        </select>
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
                                <option value="User_Login" selected>Username</option>
                                <option value="User_Name">Nickname</option>
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
                            <input type='email' name='Email' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-user"></i> About Me
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <textarea class='admin-form-textbox' name="About"></textarea>
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
                            <input type='text' name='Facebook' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-twitter"></i> Twitter
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Twitter' maxlength="15" class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-twitch"></i> Twitch
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Twitch' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-youtube"></i> YouTube
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='YouTube' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            <i class="fa fa-bullhorn"></i> Hitbox
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Hitbox' class='admin-form-text'>
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
                    <button type='submit' class='admin-form-submit'>Submit</button>
                </form>
                </td>
                </tr>
                </table>
                <br><span class='admin-form-required'>*</span> Required
            </div>
        </div>
<?php include('../includes/admin/footer.php');
    } else {
            header('Location: ../login/?msg=300');
        }
