<?php
session_start();

include("include/connection.php");

    if(isset($_POST['sign_in'])){

        $login = htmlentities(mysqli_real_escape_string($con,$_POST['login']));
        $pass = htmlentities(mysqli_real_escape_string($con,$_POST['pass']));

        $select_user = "select * from users where user_login='$login' AND user_pass='$pass'";

        $query = mysqli_query($con, $select_user);
        $check_user = mysqli_num_rows($query);

        if($check_user == 1){
            $_SESSION['user_login'] = $login;

            $update_msg = mysqli_query($con, "UPDATE users SET log_in='Online' WHERE user_login='$login'");

            $user = $_SESSION['user_login'];
            $get_user = "select * from users where user_login='$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['user_name'];
            echo "<script>window.open('home.php?user_name=$user_name', '_self')</script>";
        }
        else{
            echo "
            
            <div class='alert alert-denger'>
                <strong>Check your login and password.</strong>
            </div>
                
            ";
        }
    }


?>