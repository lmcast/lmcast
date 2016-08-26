  <html>
    <?php include "content/themes/lmn-flex2/header.php";
    if(!empty($pURL)){
      $name = $pURL;
    } else {
      $name = null;
    }?>
    <div id="content-box">
      <table id="content">
        <tr>
          <td id="content-text">
            <h1 class="content-title">
              <?php echo getPost($name,'title'); ?>
            </h1>
            <div class="content-area">
              <?php echo getPost($name,'content'); ?>
            </div>
          </td>
        </tr>
    </div>
    </body>
  </html>
