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
        header('Location: editPosts: editPosts?msg=703');
    } elseif(empty($title)){
        header('Location: editPosts?msg=700');
    } elseif(empty($content)) {
        header('Location: editPosts?msg=701');
    } else {
        include '../includes/connect-db.php';
        $query = "UPDATE posts SET Post_Title='$title', Post_Content='$content', Post_Category='$cat' WHERE Post_ID = '$id'";
        $insert = mysqli_query($conn, $query);
        if($insert){
            header('Location: posts?msg=702');
        }
    }