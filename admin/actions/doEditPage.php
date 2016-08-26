<?php
    if(!empty($_POST['Title'])){
        $title = $_POST['Title'];
    }
    
    if(!empty($_POST['Content'])){
        $content = $_POST['Content'];
    }
    
    if(!empty($_POST['Category'])){
        $cat = $_POST['Category'];
    }
    
    if(!empty($_POST['Author'])){
        $author = $_POST['Author'];
    }
    
    if(!empty($_POST['Date'])){
        $date = $_POST['Date'];
    }
    
    if(!empty($_POST['ID'])){
        $id = $_POST['ID'];
    }
    if(empty($id)) {
        header('Location: ../editPage?msg=803');
    } elseif(empty($title)){
        header('Location: ../editPage?msg=800');
    } elseif(empty($content)) {
        header('Location: ../editPage?msg=801');
    } else {
        include '../../includes/connect-db.php';
        $query = "UPDATE pages SET Page_Title='$title', Page_Content='$content', Page_Category='$cat' WHERE Page_ID = '$id'";
        $insert = mysqli_query($conn, $query);
        if($insert){
            header('Location: ../pages?msg=802');
        }
    }