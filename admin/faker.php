<?php
session_start();
if(isset($_SESSION['ID'])) {
include('../includes/admin/header.php');

include('../includes/admin/footer.php');
    } else {
            header('Location: ../login/?msg=300');
        }
