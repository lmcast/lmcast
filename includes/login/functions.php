<?php
    function login($loc,$type){
        $area = array(
            'login' => array('Log In','login.php'),
            'register' => array('Register','register.php')
        );
        if($type == 'title'){
            echo $area[$loc][0];
        } elseif ($type == 'URL') {
            return include $area[$loc][1];
        }
    }

    function siteName(){
      $url = $_SERVER['HTTP_HOST'];
      include '../includes/connect-db.php';
      $query = "SELECT * FROM sites WHERE Site_URL = '$url'";
      $result = mysqli_query($conn, $query);
      $sname = mysqli_fetch_array($result);
      echo $sname['Site_Name'];
    }
?>
