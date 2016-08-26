<?php
    function SelfCheck($uid,$option){
        if($option == 'username'){
           include '../../includes/connect-db.php';
           $query = "SELECT * FROM users WHERE User_ID = '$uid'";
           $result = mysqli_query($conn, $query);
           $suname = mysqli_fetch_array($result);
           return $suname['User_Login'];
        } elseif($option == 'email'){
           include '../../includes/connect-db.php';
           $query = "SELECT * FROM users WHERE User_ID = '$uid'";
           $result = mysqli_query($conn, $query);
           $semail = mysqli_fetch_array($result);
           return $semail['User_Email'];
        }
    }

    if(!empty($_POST['ID'])){
        $id = $_POST['ID'];
        $id = (int) $id;
    }

    if(!empty($_POST['Username'])){
        $uname = $_POST['Username'];
    }

    if(!empty($_POST['Email'])){
        $email = $_POST['Email'];
    }

    if(!empty($_POST['Name'])){
        $name = $_POST['Name'];
    }

    if(!empty($_POST['About'])){
        $about = $_POST['About'];
    }

    if(!empty($_POST['Facebook'])){
        $fb = $_POST['Facebook'];
    }

    if(!empty($_POST['Twitch'])){
        $twitch = $_POST['Twitch'];
    }

    if(!empty($_POST['Twitter'])){
        $twitter = $_POST['Twitter'];
    }

    if(!empty($_POST['Display'])){
        $display = $_POST['Display'];
    }

    if(!empty($_POST['YouTube'])){
        $yt = $_POST['YouTube'];
    }

    if(!empty($_POST['Hitbox'])){
        $hb = $_POST['Hitbox'];
    }

    if(!empty($_POST['Pass'])){
        $pass = $_POST['Pass'];
    }

    if(!empty($_POST['PassConf'])){
        $passconf = $_POST['PassConf'];
    }

    if(empty($id)){
        header('Location: ../user?msg=500');
    } elseif(empty($uname)){
        header('Location: ../editUser?id=' . $id . '&msg=501');
    } elseif(empty($email)){
        header('Location: ../editUser?id=' . $id . '&msg=502');
    } elseif(empty($pass)) {
        $passconf = null;
        include '../../includes/connect-db.php';
        $query = "SELECT * FROM users WHERE User_Login = '$uname'";
        $result = mysqli_query($conn, $query);
        $ucheck = mysqli_fetch_array($result);
        mysqli_close($conn);
        if($uname == SelfCheck($id, 'username')){
            include '../../includes/connect-db.php';
            $query = "SELECT * FROM users WHERE User_Email = '$email'";
            $result = mysqli_query($conn, $query);
            $echeck = mysqli_fetch_array($result);
            mysqli_close($conn);
            if($email == SelfCheck($id, 'email')){
                include '../../includes/connect-db.php';
                $query = "UPDATE users SET User_Name = '$name', User_Login = '$uname', User_View = '$display', User_Email = '$email', User_About = '$about', User_FB = '$fb', User_Twitter = '$twitter', User_YT = '$yt', User_Twitch = '$twitch', User_Hitbox = '$hb' WHERE User_ID = '$id'";
                $result = mysqli_query($conn, $query);
                if($result){
                    mysqli_close($conn);
                    header('Location: ../user?msg=505');
                } else {
                    mysqli_error($conn);
                    mysqli_close($conn);
                }
            } elseif($echeck){
                header('Location: ../editUser?id=' . $id . '&msg=504');
            } else {
                include '../../includes/connect-db.php';
                $query = "UPDATE users SET User_Name = '$name', User_Login = '$uname', User_View = '$display', User_Email = '$email', User_About = '$about', User_FB = '$fb', User_Twitter = '$twitter', User_YT = '$yt', User_Twitch = '$twitch', User_Hitbox = '$hb' WHERE User_ID = '$id'";
                $result = mysqli_query($conn, $query);
                if($result){
                    mysqli_close($conn);
                    header('Location: ../user?msg=505');
                } else {
                    mysqli_error($conn);
                    mysqli_close($conn);
                }
            }
        } elseif($ucheck){
            header('Location: ../editUser?id=' . $id . '&msg=503');
        } else {
            include '../../includes/connect-db.php';
            $query = "SELECT * FROM users WHERE User_Email = '$email'";
            $result = mysqli_query($conn, $query);
            $echeck = mysqli_fetch_array($result);
            mysqli_close($conn);
            if($email == SelfCheck($id, 'email')){
                include '../../includes/connect-db.php';
                $query = "UPDATE users SET User_Name = '$name', User_Login = '$uname', User_View = '$display', User_Email = '$email', User_About = '$about', User_FB = '$fb', User_Twitter = '$twitter', User_YT = '$yt', User_Twitch = '$twitch', User_Hitbox = '$hb' WHERE User_ID = '$id'";
                $result = mysqli_query($conn, $query);
                if($result){
                    mysqli_close($conn);
                    header('Location: ../user?msg=505');
                } else {
                    mysqli_error($conn);
                    mysqli_close($conn);
                }
            } elseif($echeck){
                header('Location: ../editUser?id=' . $id . '&msg=504');
            } else {
                include '../../includes/connect-db.php';
                $query = "UPDATE users SET User_Name = '$name', User_Login = '$uname', User_View = '$display', User_Email = '$email', User_About = '$about', User_FB = '$fb', User_Twitter = '$twitter', User_YT = '$yt', User_Twitch = '$twitch', User_Hitbox = '$hb' WHERE User_ID = '$id'";
                $result = mysqli_query($conn, $query);
                if($result){
                    mysqli_close($conn);
                    header('Location: ../user?msg=505');
                } else {
                    mysqli_error($conn);
                    mysqli_close($conn);
                }
            }
        }
    } else {
        if(empty($passconf)){
            header('Location: ../editUser?id=' . $id . '&msg=507');
        } elseif($pass !== $passconf) {
            header('Location: ../editUser?id=' . $id . '&msg=508');
        } else {
            $passconf = null;
            $pass = mysqli_real_escape_string($pass);
            include '../../includes/connect-db.php';
            $query = "SELECT * FROM users WHERE User_Login = '$uname'";
            $result = mysqli_query($conn, $query);
            $ucheck = mysqli_fetch_array($result);
            mysqli_close($conn);
            if($uname == SelfCheck($id, 'username')){
                include '../../includes/connect-db.php';
                $query = "SELECT * FROM users WHERE User_Email = '$email'";
                $result = mysqli_query($conn, $query);
                $echeck = mysqli_fetch_array($result);
                mysqli_close($conn);
                if($email == SelfCheck($id, 'email')){
                    include '../../includes/login/passwordapi.php';
                    $pass = PasswordEncrypt($pass);
                    include '../../includes/connect-db.php';
                    $query = "UPDATE users SET User_Name = '$name', User_Login = '$uname', User_View = '$display', User_Email = '$email', User_About = '$about', User_FB = '$fb', User_Twitter = '$twitter', User_YT = '$yt', User_Twitch = '$twitch', User_Hitbox = '$hb', User_Pass = '$pass' WHERE User_ID = '$id'";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        mysqli_close($conn);
                        header('Location: ../user?msg=505');
                    } else {
                        mysqli_error($conn);
                        mysqli_close($conn);
                    }
                } elseif($echeck){
                    header('Location: ../editUser?id=' . $id . '&msg=504');
                } else {
                    include '../../includes/login/passwordapi.php';
                    $pass = PasswordEncrypt($pass);
                    include '../../includes/connect-db.php';
                    $query = "UPDATE users SET User_Name = '$name', User_Login = '$uname', User_View = '$display', User_Email = '$email', User_About = '$about', User_FB = '$fb', User_Twitter = '$twitter', User_YT = '$yt', User_Twitch = '$twitch', User_Hitbox = '$hb', User_Pass = '$pass' WHERE User_ID = '$id'";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        mysqli_close($conn);
                        header('Location: ../user?msg=505');
                    } else {
                        mysqli_error($conn);
                        mysqli_close($conn);
                    }
                }
            } elseif($ucheck){
                header('Location: ../editUser?id=' . $id . '&msg=503');
            } else {
                include '../../includes/connect-db.php';
                $query = "SELECT * FROM users WHERE User_Email = '$email'";
                $result = mysqli_query($conn, $query);
                $echeck = mysqli_fetch_array($result);
                mysqli_close($conn);
                if($email == SelfCheck($id, 'email')){
                    include '../../includes/connect-db.php';
                    $query = "UPDATE users SET User_Name = '$name', User_Login = '$uname', User_View = '$display', User_Email = '$email', User_About = '$about', User_FB = '$fb', User_Twitter = '$twitter', User_YT = '$yt', User_Twitch = '$twitch', User_Hitbox = '$hb' WHERE User_ID = '$id'";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        mysqli_close($conn);
                        header('Location: ../user?msg=505');
                    } else {
                        mysqli_error($conn);
                        mysqli_close($conn);
                    }
                } elseif($echeck){
                    header('Location: ../editUser?id=' . $id . '&msg=504');
                } else {
                    include '../../includes/connect-db.php';
                    $query = "UPDATE users SET User_Name = '$name', User_Login = '$uname', User_View = '$display', User_Email = '$email', User_About = '$about', User_FB = '$fb', User_Twitter = '$twitter', User_YT = '$yt', User_Twitch = '$twitch', User_Hitbox = '$hb' WHERE User_ID = '$id'";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        mysqli_close($conn);
                        header('Location: ../user?msg=505');
                    } else {
                        mysqli_error($conn);
                        mysqli_close($conn);
                    }
                }
            }
        }
    }
