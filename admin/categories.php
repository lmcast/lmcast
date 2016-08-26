<?php
session_start();
if(isset($_SESSION['ID'])) {
include('../includes/admin/header.php'); ?>
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
            <div class='admin-choice'><a href='addCat' title='Add Category'><i class="fa fa-plus"></i> Add Category</a></div>
           <table class="admin-list-area">
                <tr class="admin-list-desktop">
                    <td>
                        <table id="admin-table">
                            <thead>
                                <td>
                                    Name
                                </td>
                                <td>
                                    Description
                                </td>
                                <td>
                                    Options
                                </td>
                            </thead>
                            <tbody>
                                <?php $admin->listCat(); ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr class="admin-list-mobile">
                    <td>
                        <table id="admin-table">
                            <?php $admin->listMobileCat(); ?>
                        </table>
                    </td>
                </tr>
            </table>
            </div>
        </div>
<?php include('../includes/admin/footer.php');
    } else {
            header('Location: ../login/?msg=300');
        }
