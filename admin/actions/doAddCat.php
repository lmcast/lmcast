<?php
    if(!empty($_POST['Title'])){
        $title = $_POST['Title'];
    }
    if(!empty($_POST['Description'])){
        $desc = $_POST['Description'];
    }

    if(empty($title)){
        header('Location: ../addCat?msg=600');
    } else {
        include '../../includes/connect-db.php';
        $query = "INSERT INTO category(Cat_Title, Cat_Desc) VALUES ('$title','$desc')";
        $insert = mysqli_query($conn, $query);
        if($insert){
            header('Location: ../categories?msg=601');
        }
    }