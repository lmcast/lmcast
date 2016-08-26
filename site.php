<!DOCTYPE html>
<?php
session_start();
include 'includes/site/functions.php';
if( MaintenceMode() === '1' ){
  if(isset($_SESSION['ID'])){
    DisplaySite();
  } else {
    include 'maint.php';
  }
} else {
  DisplaySite();
}
function DisplaySite(){
  if (substr($_GET['url'],0,5) === 'admin') {
    include "admin/index.php";
  } elseif(substr($_GET['url'],0,4) === 'post'){
    $pURL = substr($_GET['url'],5);
    $pType = 'post';
    include "content/themes/lmn-flex2/post.php";
  } elseif(substr($_GET['url'],0,7) === 'profile') {
    $pURL = substr($_GET['url'],8);
    if(!empty($pURL)){
      $pType = 'profile-page';
      include "content/themes/lmn-flex2/profile-page.php";
    } else {
      $pType = 'profile';
      include "content/themes/lmn-flex2/profile.php";
    }
  } elseif (!empty($_GET['url'])) {
    $pURL = $_GET['url'];
    $pType = 'page';
    include "content/themes/lmn-flex2/pages.php";
  } else {
    $pType = 'home';
    $pURL = "";
    include "content/themes/lmn-flex2/home.php";
  }
}
?>
