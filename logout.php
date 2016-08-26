<?php
    session_start();
    session_destroy();
    if(!empty($_GET['redir'])){
      header('Location: ' . $_GET['redir']);
    } else {
      header('Location: login/?msg=301');
    }
