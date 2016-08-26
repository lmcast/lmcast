<?php
    function PasswordEncrypt($password){
        return password_hash($password,PASSWORD_DEFAULT);
    }
    function PasswordVerify($pass,$hash,$user){
        $password = password_verify($pass, $hash);
        if ($password){
            if(password_needs_rehash($hash, PASSWORD_DEFAULT)){
                $pass2 = PasswordEncrypt($pass);
                include '../includes/connect-db.php';
                $query = "UPDATE users SET User_Pass = '$pass2'";
                $sega = mysqli_query($conn, $query);
                if($sega){
                    return true;
                } else {
                    echo 'Error:' . $query . '<br>' . mysqli_error($conn);
                }
            } else {
                return true;
            }
        } else {
            return false;
        }
    }