<?php

if(!empty($_POST['Title'])){
    $title = $_POST['Title'];
}

if(!empty($_POST['Content'])){
    $content = $_POST['Content'];
}

if(!empty($_POST['Author'])){
    $author = $_POST['Author'];
}

if(!empty($_POST['Date'])){
    $date = $_POST['Date'];
}

if(empty($_POST)){
    header('Location: ../?msg=100');
} elseif(empty($title)){
    header('Location: ../addDash?msg=101');
} elseif(empty($content)){
    header('Location: ../addDash?msg=102&title=' . $title);
} else {
    include '../../includes/connect-db.php';
    $query = "INSERT INTO dashboard(Dash_Title, Dash_Content, Dash_Author, Dash_Date) VALUES('$title', '$content', '$author', '$date')";
    $result = mysqli_query($conn, $query);
    $insert = mysqli_fetch_array($result);
    if($insert){
        header('Location: ../addDash?msg=103&title=' . $title);
    } else {
        header('Location: ../?msg=104');
    }
}