  <html>
    <?php include "content/themes/lmn-flex2/header.php";
    if (!empty($pURL)){
      $name = $pURL;
    } else {
      $name = null;
    } ?>
      <table id="page">
        <tr>
          <td id="page-content">
            <div id="page-contentarea">
              <h1 id="page-title">
                <?php echo getPage($name,'title'); ?>
              </h1>
              <?php echo getPage($name,'content'); ?>
            </div>
          <td>
          <td id="page-desktop-sidebar">
            Soon!
          </td>
        </tr>
      </table>
    </body>
  </html>
