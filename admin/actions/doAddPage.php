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
        header('Location: ../addPage?msg=800');
    } elseif (empty($content)) {
        header('Location: ../addPage?msg=801');
    } else {
        include '../../includes/connect-db.php';
        $query = "INSERT INTO pages(Page_Title, Page_Author, Page_Content, Page_Category, Page_Date) VALUES ('$title','$author','$content','$cat','$date')";
        $insert = mysqli_query($conn, $query);
        if($insert){
            header('Location: ../pages?msg=802');
        }
    }