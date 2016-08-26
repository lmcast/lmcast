<?php
session_start();
if(isset($_SESSION['ID'])) {
include('../includes/admin/header.php');
if(empty($_GET['id'])){
    header('Location: pages?msg=800');
} else {
    $page = getPageData($_GET['id']);
?>
        <div id="admin-area">
            <div id="admin-content">
                <div class="admin-title">
                    <?php
                    if(!empty(location($_SERVER['PHP_SELF'], 'logo'))){
                        location($_SERVER['PHP_SELF'], 'logo');
                        echo ' ';
                    };
                        location($_SERVER['PHP_SELF'], 'name');
                    ?>
                </div>
                <table style="width: 100%;">
                <tr class="admin-form-desktop">
                    <td>
                        <form action='actions/doEditPage.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                          Permalink
                        </td>
                        <td class='admin-form-input'>
                          <?php echo "http://" . $_SERVER['HTTP_HOST'] . "/"; ?><input type="text" name='Link' value="<?php echo $page['Page_Perma'];?>">
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Title<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <input type="text" name='Title' class='admin-form-text' value="<?php echo $page['Page_Title']; ?>">
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Content<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <textarea name='Content' class='admin-form-content' id='smart-edit'><?php echo $page['Page_Content']; ?></textarea>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Categories<span class='admin-form-required'>*</span>
                        </td>
                        <td class='admin-form-input'>
                            <select class="admin-form-select" name="Category">
                                <?php getPageCatList($_GET['id']); ?>
                            </select>
                        </td>
                    </tr>
                    </table>
                    <input type='hidden' name='Author' value='<?php echo $page['Page_Author']; ?>'>
                    <input type='hidden' name='Date' value='<?php echo $page['Page_Date']; ?>'>
                    <input type='hidden' name='ID' value='<?php echo $page['Page_ID']; ?>'>
                    <button type='submit' class='admin-form-submit'>Submit</button>
                </form>
                    </td>
                </tr>
                <tr class="admin-form-mobile">
                    <td>
                <form action='doEditPage.php' method="post">
                    <table class='admin-form-full'>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Title<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <input type="text" name='Title' class='admin-form-text' value="<?php echo $page['Page_Title']; ?>">
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-label'>
                            Content<span class='admin-form-required'>*</span>
                        </td>
                    </tr>
                    <tr class='admin-form-section'>
                        <td class='admin-form-input'>
                            <textarea name='Content' class='admin-form-content' id='smart-edit'><?php echo $page['Page_Content']; ?></textarea>
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
                                <?php getPageCatList($_GET['id']); ?>
                            </select>
                        </td>
                    </tr>
                    </table>
                    <input type='hidden' name='Author' value='<?php echo $page['Page_Author']; ?>'>
                    <input type='hidden' name='Date' value='<?php echo $page['Page_Date']; ?>'>
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
