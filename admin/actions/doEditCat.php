<?php
    if(!empty($_POST['Title'])){
        $title = $_POST['Title'];
    }
    if(!empty($_POST['Description'])){
        $desc = $_POST['Description'];
    }
    if(!empty($_POST['ID'])){
        $id = $_POST['ID'];
    }
    if(empty($id)){
        header('Location: ../editCat?msg=606');
    } elseif(empty($title)){
        header('Location: ../editCat?msg=600');
    } else {
        include '../../includes/connect-db.php';
        $query = "UPDATE category SET Cat_Title='$title', Cat_Desc='$desc' WHERE Cat_ID = '$id'";
        $insert = mysqli_query($conn, $query);
        if($insert){
            header('Location: ../categories?msg=604');
        } else {
            header('Location: ../editCat?msg=605');
        }
    }