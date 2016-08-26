<?php
    if(!empty($_GET['uname'])){
        $uname = $_GET['uname'];
    }
    session_start();
    if(empty($_GET['uname'])){
        header ('Location: user?msg=400');
    /* } elseif( $_SESSION['ID'] == $ ){
        header('Location: user?msg=401'); */
    } else {
        include '../includes/connect-db.php';
        $query = "DELETE FROM users WHERE User_Login = '$uname'";
        $result = mysqli_query($conn, $query);
        $test = mysqli_fetch_array($result);
        if ($test){
            mysqli_close($conn);
            header('Location: user?msg=402');
        } else {
            mysqli_close($conn);
            header('Location: user?msg=403');
        }
    }
