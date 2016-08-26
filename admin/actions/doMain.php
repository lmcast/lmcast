 <?php
  if(!empty($_POST['ID'])){
    $ID = $_POST['ID'];
  }

  if(!empty($_POST['Name'])) {
    $name = $_POST['Name'];
  }

  if(!empty($_POST['sURL'])) {
    $url = $_POST['sURL'];
  }

  if(!empty($_POST['aEmail'])) {
    $email = $_POST['aEmail'];
  }

  if(!empty($_POST['sFbook'])) {
    $fb = $_POST['sFbook'];
  } else {
    $fb = '';
  }

  if(!empty($_POST['sTwitter'])) {
    $twitter = $_POST['sTwitter'];
  }

  if(!empty($_POST['sYT'])) {
    $yt = $_POST['sYT'];
  }

  if(!empty($_POST['sInsta'])) {
    $insta = $_POST['sInsta'];
  }

  if(!empty($_POST['sReg'])){
    $reg = $_POST['sReg'];
  }

  if(!empty($_POST['sTwitch'])){
    $twitch = $_POST['sTwitch'];
  }

  if(!isset($ID)){
    header('Location: ../sitesettings?page=main&msg=600');
  } elseif(!isset($name)) {
    header('Location: ../sitesettings?page=main&msg=601');
  } elseif (!isset($url)){
    header('Location: ../sitesettings?page=main&msg=602');
  } elseif (!isset($email)){
    header('Location: ../sitesettings?page=main&msg=603');
  } else {
    include '../../includes/connect-db.php';
    $query = "UPDATE sites SET Site_Name='$name', Site_URL='$url', Site_AdminEmail='$email', Site_Facebook='$fb', Site_Twitter='$twitter', Site_YT='$yt', Site_Insta='$insta', Site_Reg='$reg', Site_Twitch='$twitch' WHERE Site_ID='$ID'";
    $insert = mysqli_query($conn, $query);
  if($insert) {
    header('Location: ../sitesettings?page=main&msg=604');
  } else {
    header('Location: ../sitesettings?page=main&msg=605');
  }
}
