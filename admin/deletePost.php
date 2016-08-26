<?php
    if(!empty($_GET['id'])){
        $ID = $_GET['id'];
    }
    session_start();
    $ID = (int) $ID;
    if(empty($_GET['id'])){
        header ('Location: posts?msg=700');
    } else {
        include '../includes/connect-db.php';
        $query = "DELETE FROM posts WHERE Post_ID = '$ID'";
        $result = mysqli_query($conn, $query);
        $test = mysqli_fetch_array($result);
        if ($test){
            mysqli_close($conn);
            header('Location: posts?msg=704');
        } else {
            mysqli_close($conn);
            header('Location: posts?msg=705');
        }
    }