<?php
    if(!empty($_POST)){
        if(isset($_POST['Username'])){
            $user = $_POST['Username'];
        }
        if(isset($_POST['Password'])){
            $pass = $_POST['Password'];
        }
        if(isset($_POST['Type'])){
            $type = $_POST['Type'];
        }
    }
    if(empty($_POST)){
        header('Location: ../login/?page=login&msg=100');
    } elseif (empty($user)){
        if($type === 'ajax') {
            echo 'noEnteredUser';
        } else {
            header('Location: ../login/?page=login&msg=100');
        }
    } elseif (empty($pass)){
        if($type === 'ajax') {
            echo 'noEnteredPass';
        } else {
            $pass = mysqli_real_escape_string($pass);
            header('Location: ../login/?page=login&msg=102&user=' . $user);
        }
    } else {
        include '../includes/connect-db.php';
        $query2 = "SELECT * FROM users WHERE User_Login = '$user' OR User_Email = '$user'";
        $result2 = mysqli_query($conn, $query2);
        $uname = mysqli_fetch_array($result2);
        mysqli_close($conn);
        if($uname){
            include('../includes/connect-db.php');
            $query = "SELECT * FROM users WHERE User_Login = '$user' OR User_Email = '$user'";
            $result = mysqli_query($conn,$query);
            $login = mysqli_fetch_assoc($result);
            mysqli_close($conn);
            include('../includes/login/passwordapi.php');
            if(PasswordVerify ($pass, $login['User_Pass'], $login['User_Login'])){
                session_start();
                $_SESSION['ID'] = $login['User_ID'];
                if ($type === 'ajax'){
                    echo 'success';
                } else {
                    header('Location: ../admin/');
                }
            } else {
                if ($type === 'ajax'){
                    echo 'notValid';
                } elseif ($type === 'ajax'){
                    header('Location: ../login/?page=login&msg=105&user=' . $user);
                }
            }
        } else {
            if ($type === 'php'){
                header('Location: ../login/?page=login&msg=103&user=' . $user);
            } else if ($type === 'ajax'){
                echo 'noUser';
            }
        }
    }
