<?php
session_start();
if(isset($_SESSION['ID'])) {
include('../includes/admin/header.php');
if(!empty($_GET['page'])){
    $current = $_GET['page'];
} else {
    $current = 'main';
}
?>
        <div id="admin-area">
          <script src="../includes/admin/sMenu.js"></script>
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
                <table id="admin-soptions-desktop">
                    <tr>
                        <td class="admin-soptions-menu">
                            <?php $admin->sOptionsMenu($current); ?>
                        </td>
                        <td class="admin-soptions-area">
                            <?php $admin->sitepage($current); ?>
                        </td>
                    </tr>
                </table>
                <table id="admin-soptions-mobile">
                  <tr>
                    <td class="admin-soptions-mmenu">
                      <?php $admin->sOptionsMenu($current); ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="admin-soptions-marea">
                      <?php $admin->sitepage($current); ?>
                    </td>
                  </tr>
                </table>
            </div>
        </div>
<?php include('../includes/admin/footer.php');
    } else {
            header('Location: ../login/?msg=300');
        }
