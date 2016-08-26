<?php
    if(!empty($_POST)){
        if(isset($_POST['Username'])){
            $user = $_POST['Username'];
        }
        if(isset($_POST['Email'])){
            $email = $_POST['Email'];
        }
        if(isset($_POST['Password'])){
            $pass = $_POST['Password'];
        }
        if(isset($_POST['PassConf'])){
            $passconf = $_POST['PassConf'];
        }
    }

    function regActive(){
      $url = $_SERVER['HTTP_HOST'];
      include '../includes/connect-db.php';
      $query = "SELECT * FROM sites WHERE Site_URL = '$url'";
      $result = mysqli_query($conn, $query);
      $sreg = mysqli_fetch_array($result);
      return $sreg['Site_Reg'];
    }
    $reg = regActive();
    if(empty($_POST)){
        header('Location: index.php?page=register&msg=200');
    } elseif ($reg){
        header('Location: index.php?page=register&msg=209');
    }
        include('../includes/connect-db.php');
        $query1 = "SELECT * FROM users WHERE User_Login = '$user'";
        $result1 = mysqli_query($conn, $query1);
        $uname1 = mysqli_fetch_array($result1);
        mysqli_close($conn);
        if ($uname1){
            echo 'unameUsed';
        } else {
            include('../includes/connect-db.php');
            $query2 = "SELECT * FROM users WHERE User_Email = '$email'";
            $result2 = mysqli_query($conn, $query2);
            $email1 = mysqli_fetch_array($result2);
            mysqli_close($conn);
            if ($email1){
                echo 'emailUsed';
            } else {
                include('../includes/login/passwordapi.php');
                $pass = PasswordEncrypt($pass);
                $passconf = null;
                include('../includes/connect-db.php');
                $query = "INSERT INTO users (User_ID, User_Name, User_Login, User_Email, User_Pass, User_Role, User_View) VALUES ('', '', '$user', '$email', '$pass', 'Standard', 'User_Login')";
                $insert = mysqli_query($conn, $query);
                if($insert){
                    echo 'complete';
                } else {
                    echo 'regFailed';
                }
            }
        }
    }
