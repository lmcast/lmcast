<?php
// (c) 2016 Littlered615 Media Network
  class AdminFunction {
    private $_db;
    public function ___construct(){
      // Timezone for Website
      date_default_timezone_get('America/Chicago');
      $this->_db = LMNConnect::getInstance();
      var_dump($this->_db);
    }
    // Menu for the Admin pages
    public function MainMenu(){
        echo "<li>" . "<a href='../admin/' id='admin-link' class='alink' title='Dashboard'><i class='fa fa-tachometer'></i> Dashboard</a>" .
            "</li><li class='dropdown'>" . "<a href='user' id='admin-link' class='alink' title='Users'><i class='fa fa-users'></i> Users</a>" .
            "<ul><li>" . "<a href='adduser' id='admin-link' class='alink' title='Add User'><i class='fa fa-user-plus'></i> Add User</a>" . "</li></ul>" .
            "</li><li class='dropdown'>" . "<a href='#' title='Content' id='admin-link' class='alink'><i class='fa fa-file'></i> Content</a>" . "<ul>" .
            "<li>" . "<a href='posts' title='Posts' id='admin-link' class='alink'><i class='fa fa-file-text-o'></i> Posts</a>" .
            "</li><li>" . "<a href='pages' title='Pages' id='admin-link' class='alink'><i class='fa fa-file-o'></i> Page</a>" .
            "</li><li>" . "<a href='categories' id='admin-link' class='alink' title='Categories'><i class='fa fa-tag'></i> Categories</a>" . "</li></ul>" .
            "</li><li class='dropdown'>" . "<a href='sitesettings' id='admin-link' class='alink' title='Site Settings'><i class='fa fa-cogs'></i> Site Settings</a>" .
            "<ul><li>" . "<a href='sitesettings?page=main' id='admin-link' class='alink' title='Main Page'><i class='fa fa-home'></i> Main Page</a>" . "</li>" .
            "<li>" . "<a href='sitesettings?page=maint' id='admin-link' class='alink' title='Maintence Page'><i class='fa fa-wrench'></i> Maintence Page</a>" . "</li></ul>" .
            "</li>";
    }

    // Displays Name for Webpage on the Browser's Window or Tab and the Webpage title area.
    public function location($loc,$type){
        $array = array(
            '/admin/user.php' => array('Users','<i class="fa fa-users"></i>',true),
            '/admin/index.php' => array('Dashboard','<i class="fa fa-tachometer"></i>',true),
            '/admin/posts.php' => array('Posts','<i class="fa fa-file-text-o"></i>',true),
            '/admin/editUser.php' => array('Edit User','<i class="fa fa-pencil-square-o"></i>',false),
            '/admin/adduser.php' => array('Add User','<i class="fa fa-user-plus"></i>',false),
            '/admin/profile.php' => array('Profile','<i class="fa fa-user"></i>',false),
            '/admin/sitesettings.php' => array('Site Settings','<i class="fa fa-cogs"></i>',true),
            '/admin/categories.php' => array('Categories','<i class="fa fa-tag"></i>',true),
            '/admin/addCat.php' => array('Add Category','<i class="fa fa-plus"></i>',false),
            '/admin/editCat.php' => array('Edit Category','<i class="fa fa-pencil-square-o"></i>',false),
            '/admin/addUser.php' => array('Add User','<i class="fa fa-user-plus"></i>'),
            '/admin/addPosts.php' => array('Add Post','<i class="fa fa-plus"></i>'),
            '/admin/editPost.php' => array('Edit Post','<i class="fa fa-pencil-square-o"></i>'),
            '/admin/pages.php' => array('Pages','<i class="fa fa-file-o"></i>'),
            '/admin/addPage.php' => array('Add Page','<i class="fa fa-plus"></i>'),
            '/admin/editPage.php' => array('Edit Page','<i class="fa fa-pencil-square-o"></i>'),
            '/admin/addDash.php' => array('Add Dash','<i class="fa fa-plus"></i>')
        );
        if(empty($array[$loc][0])){
            if($type == 'name'){
                echo 'Unknown';
            } else {
                echo '<i class="fa fa-exclamation-triangle"></i> ';
            }
        } else {
            if($type == 'name'){
                echo $array[$loc][0];
            } else {
                echo $array[$loc][1] . " ";
            }
        }
    }

    //Fetches the name of the role from the database.
    function getRole($id){
        $id = (int) $id;

        $query = "SELECT * FROM roles WHERE Role_ID = '$id'";
        $result = $this->_db->mysqli_query($query);
        $role1 = mysqli_fetch_array($result);
        return $role1['Role_Name'];
    }

    // Returns User Info on user.php
    function getUsers(){

        $query = 'SELECT * FROM users';
        $result = $this->_db->mysqli_query($query);
        while($users = mysqli_fetch_array($result)){
        echo "<tr><td>" . $users['User_Login'] . "</td><td>" . $users['User_Name'] . "</td><td>" . $users['User_Email'] . "</td><td>" . getRole($users['User_Role']) . "</td><td>";
            echo "<div class='admin-choice'>";
            if ($users['User_ID'] == $_SESSION['ID']) {
                echo "<a title='Edit User' href='profile'><i class='fa fa-pencil-square-o'></i> Edit User</a>";
            } else {
                echo "<a title='Edit User' href='editUser?uname=" . $users['User_Login'] . "'><i class='fa fa-pencil-square-o'></i> Edit User</a>";
            }
            echo "</div>";
            echo "<div class='admin-choice'><a title='Delete User' class='admin-choice' href='deleteUser?uname=" . $users['User_Login'] . "'><i class='fa fa-user-times'></i> Delete User</a></div></td></tr>";
        }
    }

    // Mobile Version of getUsers();
    function getMobileUsers(){

        $query = 'SELECT * FROM users';
        $result = $this->_db->mysqli_query($query);
        while($users = mysqli_fetch_array($result)){
        echo "<tr><td class='admin-mobile-header'>" . "Username" . "</td></tr><tr><td>" . $users['User_Login'] . "</td></tr><tr><td class='admin-mobile-header'>" . "Name" . "</td></tr><tr><td>" . $users['User_Name'] . "</td></tr><tr><td class='admin-mobile-header'>" . "Email" . "</td></tr><tr><td>" . $users['User_Email'] . "</td></tr><tr><td class='admin-mobile-header'>" . "Role" . "</td></tr><tr><td>" . $users['User_Role'] . "</td></tr><tr><td class='admin-mobile-header'>" . "Options" . "</td></tr><tr><td>";
            echo "<div class='admin-choice'>";
            if ($users['User_ID'] == $_SESSION['ID']) {
                echo "<a title='Edit User' href='profile'><i class='fa fa-pencil-square-o'></i> Edit User</a>";
            } else {
                echo "<a title='Edit User' href='editUser?uname=" . $users['User_Login'] . "'><i class='fa fa-pencil-square-o'></i> Edit User</a>";
            }
            echo "</div>";
            echo "<div class='admin-choice'><a title='Delete User' class='admin-choice' href='deleteUser?uname=" . $users['User_Login'] . "'><i class='fa fa-user-times'></i> Delete User</a></div></td></tr>";
        }
    }

    // Fetching Users for editUsers.php
    function getEditUser($uname){

        $query = "SELECT * FROM users WHERE User_Login = '$uname'";
        $result = $this->_db->mysqli_query($query);
        return mysqli_fetch_array($result);
    }

    function getProfileUser($id){
        $id = (int) $id;

        $query = "SELECT * FROM users WHERE User_ID = '$id'";
        $result = $this->_db->mysqli_query($query);
        return mysqli_fetch_array($result);
    }

    // Fetch Posts for posts.php
    function getPosts(){

        $query = "SELECT * FROM posts";
        $result = $this->_db->mysqli_query($query);
        $posts = mysqli_fetch_array($result);
        while($posts = mysqli_fetch_array($result)){
            echo "<tr><td>" . $posts['Post_Title'] . "</td><td>" . getUser($posts['Post_Author']) . "</td><td>" . getCats($posts['Post_Category']) . "</td><td>" . date('n/j/Y g:i a',$posts['Post_Date']) . "</td><td>";
            echo "<div class='admin-choice'><a href='editPost?id=" . $posts['Post_ID'] . "' title='Edit Post'><i class='fa fa-pencil-square-o'></i> Edit Post</a></div>";
            echo "<div class='admin-choice'><a href='deletePost?id=" . $posts['Post_ID'] . "' title='Delete Post'><i class='fa fa-times'></i> Delete Post</a></div>";
            echo "</td></tr>";
        }
    }

    // Mobile Version of getPosts();
    function getMobilePosts(){

        $query = 'SELECT * FROM posts';
        $result = $this->_db->mysqli_query($query);
        while($posts = mysqli_fetch_array($result)){
        echo "<tr><td class='admin-mobile-header'>" . "Title" . "</td></tr><tr><td>" . $posts['Post_Title'] . "</td></tr><tr><td class='admin-mobile-header'>" . "Author" . "</td></tr><tr><td>" . getUser($posts['Post_Author']) . "</td></tr><tr><td class='admin-mobile-header'>" . "Category" . "</td></tr><tr><td>" . getCats($posts['Post_Category']) . "</td></tr><tr><td class='admin-mobile-header'>" . "Date" . "</td></tr><tr><td>" . $posts['Post_Date'] . "</td></tr><tr><td class='admin-mobile-header'>" . "Options" . "</td></tr><tr><td>";
            echo "<div class='admin-choice'>";
            echo "<a title='Edit User' href='editPost?id=" . $posts['Post_ID'] . "'><i class='fa fa-pencil-square-o'></i> Edit Post</a>";
            echo "</div>";
            echo "<div class='admin-choice'><a title='Delete Post' class='admin-choice' href='deletePost?id=" . $posts['Post_ID'] . "'><i class='fa fa-times'></i> Delete Post</a></div></td></tr>";
        }
    }

    // Fetches Single Category for where Category is needed to be referenced (Ex.: pages.php)
    function getCats($id){
        $id = (int) $id;

        $query = "SELECT * FROM category WHERE Cat_ID = '$id'";
        $result = $this->_db->mysqli_query($query);
        $cats = mysqli_fetch_array($result);
        return $cats['Cat_Title'];
    }

    // Fetches and formats categories for categories.php
    function listCat(){
        $query = "SELECT * FROM category";
        $result = $this->_db->mysqli_query($query);
        while($posts = mysqli_fetch_array($result)){
            echo "<tr><td>" . $posts['Cat_Title'] . "</td><td>" . $posts['Cat_Desc'] . "</td><td>";
            echo "<span class='admin-choice'><a href='editCat?id=" . $posts['Cat_ID'] . "' title='Edit Category'><i class='fa fa-pencil-square-o'></i> Edit Category</a></span>" . "<span class='admin-choice'><a href='deleteCat?id=" . $posts['Cat_ID'] . "' title='Delete Category'><i class='fa fa-times'></i> Delete Category</a></span>" . "</td></tr>";
        }
    }

    // Mobile Version of listCat();
    function listMobileCat(){

        $query = 'SELECT * FROM category';
        $result = $this->_db->mysqli_query($query);
        while($cat = mysqli_fetch_array($result)){
        echo "<tr><td class='admin-mobile-header'>" . "Name" . "</td></tr><tr><td>" . $cat['Cat_Title'] . "</td></tr><tr><td class='admin-mobile-header'>" . "Description" . "</td></tr><tr><td>" . $cat['Cat_Desc'] . "</td></tr><tr><td class='admin-mobile-header'>" . "Options" . "</td></tr><tr><td>";
            echo "<div class='admin-choice'>";
            echo "<a title='Edit Category' href='editCat?id=" . $cat['Cat_ID'] . "'><i class='fa fa-pencil-square-o'></i> Edit Category</a>";
            echo "</div>";
            echo "<div class='admin-choice'><a title='Delete Category' class='admin-choice' href='deleteCat?id=" . $cat['Cat_ID'] . "'><i class='fa fa-times'></i> Delete Category</a></div></td></tr>";
        }
    }

    // Returns the specific category which is needed for editCat.php
    function getCat($id){
        $id = (int) $id;

        $query = "SELECT * FROM category WHERE Cat_ID = '$id'";
        $result = $this->_db->mysqli_query($query);
        return mysqli_fetch_array($result);
    }

    // Menu for the website
    function sOptionsMenu($page){
        echo "<ul><li><a href='?page=main' class='slink' title='Main Page' ";
        if(!isset($page)){
            echo "class='admin-soptions-current'";
        } elseif ($page == 'main') {
            echo "class='admin-soptions-current'";
        }
        echo "><i class='fa fa-home'></i> Main Page</a></ul></li>";
        echo "<ul><li><a href='?page=maint' class='slink' title='Maintence Mode' ";
        if ($page == 'maint') {
            echo "class='admin-soptions-current'";
        }
        echo "><i class='fa fa-wrench'></i> Maintence Mode</a>";
    }

    // Displays posts to Dashboard
    function getDash(){

        $query = "SELECT * FROM dashboard ORDER BY Dash_ID desc";
        $result = $this->_db->mysqli_query($query);
        while($dash = mysqli_fetch_array($result)){
            echo "<div id='admin-dash-content'>";
            echo "<div class='admin-dash-title'>" . $dash['Dash_Title'] . "</div>";
            echo $dash['Dash_Content'];
            echo "<br><a href='deleteDash?id=" . $dash['Dash_ID'] . "'>Delete Entry</a>";
            echo "</div>";
        }
    }

    // Fetches Categories for addPost.php
    function getCatList(){

        $query = "SELECT * FROM category";
        $result = $this->_db->mysqli_query($query);
        echo "<option value=''>Choose Category</option>";
        while($cat = mysqli_fetch_array($result)){
            echo "<option value='" . $cat['Cat_ID'] . "'>" . $cat['Cat_Title'] . "</option>";
        }
    }

    // Fetches Categories for editPost.php
    function getEditCatList($id){
        $id = (int) $id;

        $query = "SELECT * FROM category";
        $result = $this->_db->mysqli_query($query);
        $query2 = "SELECT * FROM posts WHERE Post_ID = '$id'";
        $result2 = mysqli_query($conn, $query2);
        $post = mysqli_fetch_array($result2);
        echo "<option value=''>Choose Category</option>";
        while($cat = mysqli_fetch_array($result)){
            echo "<option value='" . $cat['Cat_ID'] . "'";
            if ($post['Post_Category'] == $cat['Cat_ID']){
                echo " selected";
            }
            echo ">" . $cat['Cat_Title'] . "</option>";
        }
    }

    // Returns data from database to editPost.php
    function getPostData($id){
        $id = (int) $id;

        $query = "SELECT * FROM posts WHERE Post_ID = '$id'";
        $result = mysqli_query($conn,$query);
        return mysqli_fetch_array($result);
    }

    // Retreives the Pages from the database for pages.php
    function getPages(){

        $query = "SELECT * FROM pages";
        $result = mysqli_query($conn,$query);
        while($page = mysqli_fetch_array($result)){
            echo "<tr><td>" . $page['Page_Title'] . "</td><td>" . getUser($page['Page_Author']) . "</td><td>" . getCats($page['Page_Category']) . "</td><td>" . date('n/j/Y g:i a',$page['Page_Date']) . "</td><td>";
            echo "<div class='admin-choice'><a href='editPage?id=" . $page['Page_ID'] . "' title='Edit Page'><i class='fa fa-pencil-square-o'></i> Edit Page</a></div>";
            echo "<div class='admin-choice'><a href='deletePage?id=" . $page['Page_ID'] . "' title='Delete Page'><i class='fa fa-times'></i> Delete Page</a></div>";
            echo "</td></tr>";
        }
    }

    // Returns data from database to editPage.php
    function getPageData($id){
        $id = (int) $id;

        $query = "SELECT * FROM pages WHERE Page_ID = '$id'";
        $result = mysqli_query($conn,$query);
        return mysqli_fetch_array($result);
    }

    // Fetches Categories for editPost.php
    function getPageCatList($id){
        $id = (int) $id;

        $query = "SELECT * FROM category";
        $result = $this->_db->mysqli_query($query);
        $query2 = "SELECT * FROM pages WHERE Page_ID = '$id'";
        $result2 = mysqli_query($conn, $query2);
        $page = mysqli_fetch_array($result2);
        echo "<option value=''>Choose Category</option>";
        while($cat = mysqli_fetch_array($result)){
            echo "<option value='" . $cat['Cat_ID'] . "'";
            if ($page['Page_Category'] == $cat['Cat_ID']){
                echo " selected";
            }
            echo ">" . $cat['Cat_Title'] . "</option>";
        }
    }

    // Gets the page for Site Options
    function sitepage($loc){
        $area = array(
            'main' => 'main.php',
            'maint' => 'maint.php',
        );

        include 'sopages/' . $area[$loc];
    }

    // Gets the role names from the database
    function getRolelist(){

        $query = "SELECT * FROM roles";
        $result = $this->_db->mysqli_query($query);
        echo "<option value=''>Select User Role</option>";
        while($role = mysqli_fetch_array($result)){
            echo "<option value='" . $role['Role_ID'] . "'>" . $role['Role_Name'] . "</option>";
        }
    }

    // Gets all of the content of the main page of the Site Settings page and relays it to the server side.
    function getsMain($url){

        $query = "SELECT * FROM sites WHERE Site_URL = '$url'";
        $result = $this->_db->mysqli_query($query);
        return mysqli_fetch_array($result);
    }

    function getSiteName($url){
      $query = "SELECT * FROM sites WHERE Site_URL = '$url'";
      $result = $this->_db->mysqli_query($query);
      $sname = mysqli_fetch_array($result);
      return $sname['Site_Name'];
    }

    function getsMaint($url){

      $query = "SELECT * FROM maintenance WHERE Maint_Site = '$url'";
      $result = $this->_db->mysqli_query($query);
      return mysqli_fetch_array($result);
    }
  }
