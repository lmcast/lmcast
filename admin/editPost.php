<?php
session_start();
if(isset($_SESSION['ID'])) {
include('../includes/admin/header.php');
if(empty($_GET['id'])){
    header('Location: posts?msg=700');
} else {
    $post = $admin->getPostData($_GET['id']);
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
                        <form action='actions/doEditPosts.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Title<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <input type="text" name='Title' class='admin-form-text' value="<?php echo $post['Post_Title']; ?>">
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Content<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <textarea name='Content' class='admin-form-content' id='smart-edit'><?php echo $post['Post_Content']; ?></textarea>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Categories<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <select class="admin-form-select" name="Category">
                                <?php $admin->getEditCatList($_GET['id']); ?>
                            </select>
                        </td>
                    </tr>
                    </table>
                    <input type='hidden' name='Author' value='<?php echo $post['Post_Author']; ?>'>
                    <input type='hidden' name='Date' value='<?php echo $post['Post_Date']; ?>'>
                    <input type='hidden' name='ID' value='<?php echo $post['Post_ID']; ?>'>
                    <button type='submit' class='admin-form-submit'>Submit</button>
                </form>
                    </td>
                </tr>
                <tr class="admin-form-mobile">
                    <td>
                <form action='doEditPosts.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Title<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type="text" name='Title' class='admin-form-text' value="<?php echo $post['Post_Title']; ?>">
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Content<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <textarea name='Content' class='admin-form-content' id='smart-edit'><?php echo $post['Post_Content']; ?></textarea>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Category<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <select class="admin-form-select" name="Category">
                                <?php $admin->getEditCatList($_GET['id']); ?>
                            </select>
                        </td>
                    </tr>
                    </table>
                    <input type='hidden' name='Author' value='<?php echo $post['Post_Author']; ?>'>
                    <input type='hidden' name='Date' value='<?php echo $post['Post_Date']; ?>'>
                    <button type='submit' class='admin-form-submit'>Submit</button>
                </form>
                </td>
                </tr>
                </table>
            </div>
        </div>
<?php
include('../includes/admin/footer.php');
}
} else {
    header('Location: ../login/?msg=300');
}
