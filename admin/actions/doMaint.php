<?php
  if(!empty($_POST['mMode'])){
    $mMode = $_POST['mMode'];
  }

  if(!empty($_POST['mTitle'])){
    $title = $_POST['mTitle'];
  }

  if(!empty($_POST['mContent'])){
    $content = $_POST['mContent'];
  }

  if(!empty($_POST['ID'])){
    $ID = $_POST['ID'];
  }

  if(!isset($ID)){
    header("Location: ../sitesettings?page=maint&msg=600");
  } elseif (!isset($title)) {
    header("Location: ../sitesettings?page=maint&msg=606");
  } elseif (!isset($content)){
    header("Location: ../sitesettings?page=maint&msg=607");
  } else {
    include "../../includes/connect-db.php";
    $query = "UPDATE maintenance SET Maint_Active='$mMode', Maint_Title='$title', Maint_Context='$content' WHERE Maint_Site='$ID'";
    $insert = mysqli_query($conn, $query);
    if($insert) {
      header('Location: ../sitesettings?page=maint&msg=604');
    } else {
      header('Location: ../sitesettings?page=maint&msg=605');
    }
  }
