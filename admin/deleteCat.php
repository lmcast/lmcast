<?php
    if(!empty($_GET['id'])){
        $ID = $_GET['id'];
    }
    session_start();
    $ID = (int) $ID;
    if(empty($_GET['id'])){
        header ('Location: categories.php?msg=400');
    } else {
        include '../includes/connect-db.php';
        $query = "DELETE FROM category WHERE Cat_ID = '$ID'";
        $result = mysqli_query($conn, $query);
        $test = mysqli_fetch_array($result);
        if ($test){
            mysqli_close($conn);
            header('Location: categories.php?msg=402');
        } else {
            mysqli_close($conn);
            header('Location: categories.php?msg=403');
        }
    }