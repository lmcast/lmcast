<?php
  include 'header.php';
?>
  <table id="page">
    <tr>
      <td id="page-content">
        <div id="page-contentarea">
          <h1 id="page-title">
            <?php echo getUserProfile('Name',$pURL); ?>
          </h1>
          <h3 id="profile-information">
            <?php echo getUserProfile('Bio',$pURL); ?>
          </h3>
        </div>
      <td>
      <td id="page-desktop-sidebar">
        Soon!
      </td>
    </tr>
  </table>
