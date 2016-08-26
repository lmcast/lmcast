<?php
    if(!empty($_POST['Name'])){
        $name = $_POST['Name'];
    }

    if(!empty($_POST['Username'])){
        $uname = $_POST['Username'];
    }

    if(!empty($_POST['Display'])){
        $display = $_POST['Display'];
    }

    if(!empty($_POST['Email'])){
        $email = $_POST['Email'];
    }

    if(!empty($_POST['About'])){
        $about = $_POST['About'];
    }

    if(!empty($_POST['Facebook'])){
        $fb = $_POST['Facebook'];
    }

    if(!empty($_POST['Twitter'])){
        $twitter = $_POST['Twitter'];
    }

    if(!empty($_POST['Twitch'])){
        $twitch = $_POST['Twitch'];
    }

    if(!empty($_POST['YouTube'])){
        $yt = $_POST['YouTube'];
    }

    if(!empty($_POST['Hitbox'])) {
        $hb = $_POST['Hitbox'];
    }

    if(!empty($_POST['Pass'])){
        $pass = $_POST['Pass'];
    }

    if(!empty($_POST['PassConf'])){
        $passconf = $_POST['PassConf'];
    }

    if(!empty($_POST['Role'])){
        $role = $_POST['Role'];
    }
    $Date = date();

    if(empty($uname)){
        header('Location: ../adduser?msg=800');
    } elseif (empty($email)) {
        header('Location: ../adduser?msg=801&user=' . $uname);
    } elseif (empty($role)){
        header('Location: ../adduser?msg=802&user=' . $uname . '&email=' . $email);
    } elseif (empty($pass)) {
        header('Location: ../adduser?msg=803&user=' . $uname . '&email=' . $email);
    } elseif (empty($passconf)) {
        header('Location: ../adduser?msg=804&user=' . $uname . '&email=' . $email);
    } elseif ($pass !== $passconf) {
        header('Location: ../adduser?msg=805&user=' . $uname . '&email=' . $email);
    } else {
        $passconf = null;
        include '../../includes/connect-db.php';
        $query = "SELECT * FROM users WHERE User_Login = '$uname'";
        $result = mysqli_query($conn, $query);
        $ucheck = mysqli_fetch_array($result);
        mysqli_close($conn);
        if($ucheck){
            header('Location: ../adduser?msg=806');
        } else {
            include '../../includes/connect-db.php';
            $query = "SELECT * FROM users WHERE User_Email = '$email'";
            $result = mysqli_query($conn, $query);
            $echeck = mysqli_fetch_array($result);
            mysqli_close($conn);
            if($echeck){
                header('Location: ../adduser?msg=807');
            } else {
                include '../../includes/login/passwordapi.php';
                $pass = PasswordEncrypt($pass);
                include '../../includes/connect-db.php';
                $query = "INSERT INTO users(User_Name, User_Login, User_View, User_Email, User_About, User_Pass, User_Role, User_Registered, User_Fb, User_Twitter, User_YT, User_Twitch, User_Hitbox) VALUES ('$name', '$uname', '$display', '$email', '$about', '$pass', '$role', '$Date', '$fb', '$twitter', '$yt', '$twitch', '$hb')";
                $result = mysqli_query($conn, $query);
                $insert = mysqli_fetch_array($result);
                if($insert){
                    header('Location: ../adduser?msg=809');
                } else {
                    header('Location: ../user?msg=808');
                }
            }
        }
    }
