<?php $main = getsMaint($_SERVER['HTTP_HOST']);
$mMode = $main['Maint_Active'];?>
<div id="admin-sform-desktop">
  <form action="actions/doMaint.php" method="POST">
  <table id="admin-sform-desktop">
    <tr class="admin-sform-section">
      <td class="admin-sform-label">
        Enable Maintence Mode?
      </td>
      <td class="admin-sform-input">
        <label><input type="radio" name="mMode" value="1" <?php if($mMode === '1'){echo "checked";} ?>>Yes</label> <label><input type="radio" name="mMode" value="0" <?php if ($mMode === '0') { echo "checked"; }?>>No</label>
      </td>
    </tr>
    <tr class="admin-sform-section">
      <td class="admin-sform-label">
        Page Title
      </td>
      <td class="admin-sform-input">
        <input type="text" class="admin-form-text" name="mTitle" value="<?php echo $main['Maint_Title'] ?>">
      </td>
    </tr>
    <tr class="admin-sfrom-section">
      <td class="admin-sform-label">
        Page Content
      </td>
      <td class="admin-sform-input">
        <textarea class="admin-form-content" name="mContent"><?php echo $main['Maint_Context'];?></textarea>
      </td>
    </tr>
  </table>
  <input type='hidden' name="ID" value="<?php echo $main['Maint_Site']; ?>">
  <button type="submit" class="admin-form-submit"><i class="fa fa-send"></i> Submit</button>
  </form>
</div>
<div id="admin-sform-mobile">
  <form action="actions/doMain.php" method="POST">
    <table id="admin-sform-mobile">
      <tr class="admin-sform-section">
        <td class="admin-sform-label">
          Enable Maintence Mode?
        </td>
      </tr>
      <tr class="admin-sform-section">
        <td class="admin-sform-input">
          <label><input type="radio" name="mMode" value="1" <?php if($mMode === '1'){echo "checked";} ?>>Yes</label> <label><input type="radio" name="mMode" value="0" <?php if ($mMode === '0') { echo "checked"; }?>>No</label>
        </td>
      </tr>
      <tr class="admin-sform-section">
        <td class="admin-sform-label">
          Page Title
        </td>
      </tr>
      <tr class="admin-sform-section">
        <td class="admin-sform-input">
          <input type="text" class="admin-form-text" name="mTitle" value="<?php echo $main['Maint_Title'] ?>">
        </td>
      </tr>
      <tr class="admin-sfrom-section">
        <td class="admin-sform-label">
          Page Content
        </td>
      </tr>
      <tr class="admin-sform-section">
        <td class="admin-sform-input">
          <textarea class="admin-form-content" name="mContent"><?php echo $main['Maint_Context'];?></textarea>
        </td>
      </tr>
    </table>
    <input type='hidden' name="ID" value="<?php echo $main['Maint_Site']; ?>">
    <button type="submit" class="admin-form-submit"><i class="fa fa-send"></i> Submit</button>
    </form>
  </div>
