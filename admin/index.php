<?php
session_start();
if(isset($_SESSION['ID'])) {
include('../includes/admin/header.php'); ?>
        <div id="admin-area">
            <?php $admin->getDash(); ?>
            <div id="admin-dash-toolset">
                <button class="admin-dash-add" title="Add Dash" data-state="addDash"><i class="fa fa-plus"></i></button>
                <script src="../includes/admin/dash.js"></script>
           </div>
        </div>

<?php include('../includes/admin/footer.php');
    } else {
            header('Location: ../login/?msg=300');
        }
