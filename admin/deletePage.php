<?php
    if(!empty($_GET['id'])){
        $ID = $_GET['id'];
    }
    session_start();
    $ID = (int) $ID;
    if(empty($_GET['id'])){
        header ('Location: pages?msg=800');
    } else {
        include '../includes/connect-db.php';
        $query = "DELETE FROM pages WHERE Page_ID = '$ID'";
        $result = mysqli_query($conn, $query);
        $test = mysqli_fetch_array($result);
        if ($test){
            mysqli_close($conn);
            header('Location: pages?msg=804');
        } else {
            mysqli_close($conn);
            header('Location: pages?msg=805');
        }
    }