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
                        <form action='actions/doAddCat.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Title<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <input type="text" name='Title' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Description<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <input type='text' name='Description' class='admin-form-text'>
                        </td>
                    </tr>
                    </table>
                    <button type='submit' class='admin-form-submit'>Submit</button>
                </form>
                    </td>
                </tr>
                <tr class="admin-form-mobile">
                    <td>
                <form action='doAddCat.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Title<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type="text" name='Title' class='admin-form-text'>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Description<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type='text' name='Description' class='admin-form-text'>
                        </td>
                    </tr>
                    </table>
                    <button type='submit' class='admin-form-submit'><i class="fa fa-send"></i> Submit</button>
                </form>
                </td>
                </tr>
                </table>
            </div>
        </div>
<?php
include('../includes/admin/footer.php');
} else {
    header('Location: ../login/?msg=300');
}
