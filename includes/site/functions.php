<?php
    // Retrieves the current email for the accounts
    function cUserEmail(){
        $id = $_SESSION['ID'];
        include('../includes/connect-db.php');
        $query = "SELECT * FROM users WHERE User_ID = '$id'";
        $result = mysqli_query($conn, $query);
        $user2 = mysqli_fetch_assoc($result);
        return $user2['User_Email'];
    }

    function cUserEmail2(){
        $id = $_SESSION['ID'];
        include('includes/connect-db.php');
        $query = "SELECT * FROM users WHERE User_ID = '$id'";
        $result = mysqli_query($conn, $query);
        $user2 = mysqli_fetch_assoc($result);
        return $user2['User_Email'];
    }

    //Sets e-mail and size for Gravatar and echos it out.
    function cUserAvatar($size){
        $size = (int) $size;
        echo 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(cUserEmail()))) . "/?s=" . $size . "&r=pg&d=mm";
    }

    function cUserAvatar2($size){
        $size = (int) $size;
        echo 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(cUserEmail2()))) . "/?s=" . $size . "&r=pg&d=mm";
    }

    function getUserAvatar($email,$size) {
      $size = (int) $size;
      return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '/?s=' . $size . '&r=pg&d=mm';
    }
    //Gets the name of the user that is currently logged in.
    function cUserName(){
        $id = $_SESSION['ID'];
        include "../includes/connect-db.php";
        $query = "SELECT * FROM users WHERE User_ID = '$id'";
        $result = mysqli_query($conn, $query);
        $name = mysqli_fetch_array($result);
        if($name['User_View'] == 'User_Login'){
            return $name['User_Login'];
        } elseif ($name['User_View'] == 'User_Name') {
            return $name['User_Name'];
        } else {
            return 'Unknown';
        }
    }

    function cUserName2(){
        $id = $_SESSION['ID'];
        include "includes/connect-db.php";
        $query = "SELECT * FROM users WHERE User_ID = '$id'";
        $result = mysqli_query($conn, $query);
        $name = mysqli_fetch_array($result);
        if($name['User_View'] == 'User_Login'){
            return $name['User_Login'];
        } elseif ($name['User_View'] == 'User_Name') {
            return $name['User_Name'];
        } else {
            return 'Unknown';
        }
    }

    //Gets the name of the user that is with the requested User ID.
    function getUser($id){
        $id = (int) $id;
        include "../includes/connect-db.php";
        $query = "SELECT * FROM users WHERE User_ID = '$id'";
        $result = mysqli_query($conn, $query);
        $name = mysqli_fetch_array($result);
        if($name['User_View'] == 'User_Name'){
            return $name['User_Name'];
        } else {
            return $name['User_Login'];
        }
    }

    //Gets the name of the user that is with the requested Username.
    function getUser2($uname){
        include "includes/connect-db.php";
        $query = "SELECT * FROM users WHERE User_Login = '$uname'";
        $result = mysqli_query($conn, $query);
        $name = mysqli_fetch_array($result);
        if($name['User_View'] == 'User_Name'){
            return $name['User_Name'];
        } else {
            return $name['User_Login'];
        }
    }


    //The menu that is in the profile.
    function profileMenu(){
        echo "<ul><li><a href='profile' class='alink' title='Profile'><i class='fa fa-user'></i> Profile</a></li><li><a href='/' title='Go to Website'><i class='fa fa-globe' aria-hidden='true'></i> Go to Website</a></li><li><a href='../logout' title='Logout'><i class='fa fa-sign-out'></i> Logout</a></li></ul>";
    }

    function getPost($url,$type) {
        include "includes/connect-db.php";
        $query = "SELECT * FROM posts WHERE Post_Perma = '$url'";
        $result = mysqli_query($conn, $query);
        $post = mysqli_fetch_array($result);
        if($type === 'title'){
          $post = $post['Post_Title'];
          return $post;
        } elseif ($type === 'content') {
          $post = $post['Post_Content'];
          return $post;
        }
    }

    function getPage($url,$type) {
        include "includes/connect-db.php";
        $query = "SELECT * FROM pages WHERE Page_Perma = '$url'";
        $result = mysqli_query($conn, $query);
        $page = mysqli_fetch_array($result);
        if($type === 'title'){
          $page = $page['Page_Title'];
          return $page;
        } elseif($type === 'content') {
          $page = $page['Page_Content'];
          return $page;
        }
    }

    function siteURL() {
      return $_SERVER['HTTP_HOST'];
    }

    function siteName() {
      $url = siteURL();
      include "includes/connect-db.php";
      $query = "SELECT * FROM sites WHERE Site_URL = '$url'";
      $result = mysqli_query($conn, $query);
      $sname = mysqli_fetch_array($result);
      return $sname['Site_Name'];
    }

    function LMN_Head() {
      include 'header.php';
    }

    function MaintenceMode() {
      $url = siteURL();
      include "includes/connect-db.php";
      $query = "SELECT * FROM maintenance WHERE Maint_Site = '$url'";
      $result = mysqli_query($conn, $query);
      $mMode = mysqli_fetch_array($result);
      return $mMode['Maint_Active'];
    }

    function SocialLink($sm) {
      $url = siteURL();
      include "includes/connect-db.php";
      $query = "SELECT Site_Facebook, Site_Twitter, Site_YT, Site_Insta, Site_Twitch FROM sites WHERE Site_URL = '$url'";
      $result = mysqli_query($conn, $query);
      $sMedia = mysqli_fetch_array($result);
      if ($sm === 'Facebook'){
        return "https://www.facebook.com/" . $sMedia['Site_Facebook'];
      } elseif ($sm === 'Twitter'){
        return "https://www.twitter.com/" . $sMedia['Site_Twitter'];
      } elseif ($sm === 'YouTube'){
        return "https://www.youtube.com/" . $sMedia['Site_YT'];
      } elseif ($sm === 'Instagram'){
        return "https://www.instagram.com/" . $sMedia['Site_Insta'];
      } elseif ($sm === 'Twitch'){
        return "https://www.twitch.tv/" . $sMedia['Site_Twitch'];
      }
    }

    function isSocialLink($type) {
      $url = siteURL();
      if ($type === 'YouTube'){
        include "includes/connect-db.php";
        $query = "SELECT Site_YT FROM sites WHERE Site_URL = '$url'";
        $result = mysqli_query($conn, $query);
        $sMediaCheck = mysqli_fetch_array($result);
        $sMediaCheck = $sMediaCheck['Site_YT'];
        if(!empty($sMediaCheck)) {
          return TRUE;
        } else {
          return FALSE;
        }
      } elseif ($type === 'Twitter'){
        include "includes/connect-db.php";
        $query = "SELECT Site_Twitter FROM sites WHERE Site_URL = '$url'";
        $result = mysqli_query($conn, $query);
        $sMediaCheck = mysqli_fetch_array($result);
        $sMediaCheck = $sMediaCheck['Site_Twitter'];
        if(!empty($sMediaCheck)) {
          return TRUE;
        } else {
          return FALSE;
        }
      } elseif ($type === 'Instagram'){
        include "includes/connect-db.php";
        $query = "SELECT Site_Insta FROM sites WHERE Site_URL = '$url'";
        $result = mysqli_query($conn, $query);
        $sMediaCheck = mysqli_fetch_array($result);
        $sMediaCheck = $sMediaCheck['Site_Insta'];
        if(!empty($sMediaCheck)) {
          return TRUE;
        } else {
          return FALSE;
        }
      } elseif ($type === 'Facebook'){
        include "includes/connect-db.php";
        $query = "SELECT Site_Facebook FROM sites WHERE Site_URL = '$url'";
        $result = mysqli_query($conn, $query);
        $sMediaCheck = mysqli_fetch_array($result);
        $sMediaCheck = $sMediaCheck['Site_Facebook'];
        if(!empty($sMediaCheck)) {
          return TRUE;
        } else {
          return FALSE;
        }
      } elseif ($type === 'Twitch') {
        include "includes/connect-db.php";
        $query = "SELECT Site_Twitch FROM sites WHERE Site_URL = '$url'";
        $result = mysqli_query($conn, $query);
        $sMediaCheck = mysqli_fetch_array($result);
        $sMediaCheck = $sMediaCheck['Site_Twitch'];
        if(!empty($sMediaCheck)) {
          return TRUE;
        } else {
          return FALSE;
        }
      }
    }

    function MaintContext($type) {
      $url = SiteUrl();
      if ($type === 'title'){
        include "includes/connect-db.php";
        $query = "SELECT Maint_Title FROM maintenance WHERE Maint_Site = '$url'";
        $result = mysqli_query($conn, $query);
        $context = mysqli_fetch_array($result);
        $context = $context['Maint_Title'];
        echo $context;
      } elseif ($type === 'content'){
        include "includes/connect-db.php";
        $query = "SELECT Maint_Context FROM maintenance WHERE Maint_Site = '$url'";
        $result = mysqli_query($conn, $query);
        $context = mysqli_fetch_array($result);
        $context = $context['Maint_Context'];
        echo $context;
      }
    }

    function getUserProfile($type,$uname){
      if ($type === 'Name') {
        return getUser2($uname);
      } elseif ($type === 'Email') {
        include "includes/connect-db.php";
        $query = "SELECT User_Email FROM users WHERE User_Login = '$uname'";
        $result = mysqli_query($query);
        $profile = mysqli_fetch_array($result);
        $profile = $profile['User_Email'];
        return $profile;
      }
    }

    function LMNTitle($type,$url) {
      if($type === 'home') {
        echo "Welcome to " . siteName();
      } elseif ($type === 'post'){
        echo getPost($url,'title') . " | " . siteName();
      } elseif ($type === 'page'){
        echo getPage($url,'title') . " | " . siteName();
      } elseif ($type === 'profile-page') {
        echo getUser2($url) . " | " . siteName();
      } else {
        echo "Unknown | " . siteName();
      }
    }
