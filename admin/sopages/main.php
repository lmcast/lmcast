<?php $main = getsMain($_SERVER['HTTP_HOST']);
$reg = $main['Site_Reg'];?>
<div id="admin-sform-desktop">
<form action="actions/doMain.php" method="POST">
    <table id="admin-sform-desktop">
        <tr class="admin-sform-section">
            <td class="admin-sform-label">
                Site Name
            </td>
            <td class="admin-sform-input">
                <input type="text" name="Name" class="admin-sform-text" value="<?php echo $main['Site_Name']; ?>">
            </td>
        </tr>
        <tr class="admin-sform-section">
            <td class="admin-sform-label">
                <i class="fa fa-link"></i> Site URL
            </td>
            <td class="admin-sform-input">
                <input type="text" name="sURL" class="admin-sform-text" value="<?php echo $main['Site_URL']; ?>">
            </td>
        </tr>
        <tr class="admin-sform-section">
            <td class="admin-sform-label">
                <i class="fa fa-envelope-o"></i> Admin Email
            </td>
            <td class="admin-sform-input">
                <input type="email" name="aEmail" class="admin-sform-text" value="<?php echo $main['Site_AdminEmail']; ?>">
            </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
              <i class="fa fa-facebook-official"></i> Site Facebook
          </td>
          <td class="admin-sform-input">
            <input type="text" name="sFbook" class="admin-sform-text" value="<?php echo $main['Site_Facebook']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
            <i class="fa fa-twitter"></i> Site Twitter
          </td>
          <td class="admin-sform-input">
            <input type="text" name="sTwitter" class="admin-sform-text" value="<?php echo $main['Site_Twitter']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
            <i class="fa fa-youtube-play"></i> Site YouTube
          </td>
          <td class="admin-sform-input">
            <input type="text" name="sYT" class="admin-sform-text" value="<?php echo $main['Site_YT']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
            <i class="fa fa-instagram"></i> Site Instagram
          </td>
          <td class="admin-sform-input">
            <input type="text" name="sInsta" class="admin-sform-text" value="<?php echo $main['Site_Insta']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
            <i class="fa fa-twitch"></i> Site Twitch
          </td>
          <td class="admin-sform-input">
            <input type="text" class="admin-sform-text" name="sTwitch" value="<?php echo $main['Site_Twitch']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
            Allow Registration
          </td>
          <td class "admin-sform-input">
            <label><input type="radio" name="sReg" value="1" <?php if($reg === '1'){ echo 'checked'; }?>>Yes</label> <label><input type="radio" name="sReg" value="0" <?php if($reg === '0'){ echo 'checked'; } ?>>No</label>
          </td>
        </tr>
    </table>
    <input type='hidden' name="ID" value="<?php echo $main['Site_ID']; ?>">
    <button type="submit" class="admin-form-submit"><i class="fa fa-send"></i> Submit</button>
</form>
</div>
<div id="admin-sform-mobile">
<form action="actions/doMain.php" method="POST">
    <table id="admin-sform-mobile">
        <tr class="admin-sform-section">
            <td class="admin-sform-label">
                Site Name
            </td>
        </tr>
        <tr class="admin-sform-section">
            <td class="admin-sform-input">
                <input type="text" name="Name" class="admin-sform-text" value="<?php echo $main['Site_Name']; ?>">
            </td>
        </tr>
        <tr class="admin-sform-section">
            <td class="admin-sform-label">
                <i class="fa fa-link"></i> Site URL
            </td>
        </tr>
        <tr class="admin-sform-section">
            <td class="admin-sform-input">
                <input type="text" name="sURL" class="admin-sform-text" value="<?php echo $main['Site_URL']; ?>">
            </td>
        </tr>
        <tr class="admin-sform-section">
            <td class="admin-sform-label">
                <i class="fa fa-envelope-o"></i> Admin Email
            </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-input">
              <input type="email" name="aEmail" class="admin-sform-text" value="<?php echo $main['Site_AdminEmail']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
              <i class="fa fa-facebook-official"></i> Site Facebook
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-input">
            <input type="text" name="sFbook" class="admin-sform-text" value="<?php echo $main['Site_Facebook']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
            <i class="fa fa-twitter"></i> Site Twitter
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-input">
            <input type="text" name="sTwitter" class="admin-sform-text" value="<?php echo $main['Site_Twitter']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
            <i class="fa fa-youtube-play"></i> Site YouTube
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-input">
            <input type="text" name="sYT" class="admin-sform-text" value="<?php echo $main['Site_YT']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
            <i class="fa fa-instagram"></i> Site Instagram
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-input">
            <input type="text" name="sInsta" class="admin-sform-text" value="<?php echo $main['Site_Insta']; ?>">
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class="admin-sform-label">
            Allow Registration
          </td>
        </tr>
        <tr class="admin-sform-section">
          <td class "admin-sform-input">
            <label><input type="radio" name="sReg" value="1" <?php if($reg === '1'){ echo 'checked'; }?>>Yes</label><br><label><input type="radio" name="sReg" value="0" <?php if($reg === '0'){ echo 'checked'; } ?>>No</label>
          </td>
        </tr>
    </table>

    <button type="submit" class="admin-form-submit"><i class="fa fa-send"></i> Submit</button>
</form>
