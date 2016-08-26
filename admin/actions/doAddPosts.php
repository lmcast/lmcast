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
    
    if(empty($title)){
        header('Location: ../addPosts?msg=700');
    } elseif (empty($content)) {
        header('Location: ../addPosts?msg=701');
    } else {
        include '../../includes/connect-db.php';
        $query = "INSERT INTO posts(Post_Title, Post_Author, Post_Content, Post_Category, Post_Date) VALUES ('$title','$author','$content','$cat','$date')";
        $insert = mysqli_query($conn, $query);
        if($insert){
            header('Location: ../posts?msg=702');
        }
    }