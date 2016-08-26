<?php
    if(!empty($_GET['id'])){
        $ID = $_GET['id'];
    }
    session_start();
    $ID = (int) $ID;
    if(empty($_GET['id'])){
        header ('Location: ../admin/?msg=100');
    } else {
        include '../includes/connect-db.php';
        $query = "DELETE FROM dashboard WHERE Dash_ID = '$ID'";
        $result = mysqli_query($conn, $query);
        $test = mysqli_fetch_array($result);
        if ($test){
            mysqli_close($conn);
            header('Location: ../admin/?msg=105');
        } else {
            mysqli_close($conn);
            header('Location: ../admin/?msg=106');
        }
    }