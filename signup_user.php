<?php
include("include/connection.php");

    if(isset($_POST['sign_up'])){

        $first_name = htmlentities(mysqli_real_escape_string($con,$_POST['user_first_name']));
        $last_name = htmlentities(mysqli_real_escape_string($con,$_POST['user_last_name']));
        $login = htmlentities(mysqli_real_escape_string($con,$_POST['user_login']));
        $pass = htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
    

        if($first_name == ''){
            echo"<script>alert('We can not verify your first name')</script>";
        }
        if($last_name == ''){
            echo"<script>alert('We can not verify your last name')</script>";
        }
        if(strlen($login)<5){
            echo"<script>alert('Login should be minimum 5 characters!')</script>";
            exit();
        }
        if(strlen($pass)<8){
            echo"<script>alert('Password should be minimum 8 characters!')</script>";
            exit();
        }

        $check_login = "select * from users where user_login='$login'";
        $run_login = mysqli_query($con,$check_login);

        $check = mysqli_num_rows($run_login);

        if($check==1){
            echo"<script>alert('Login already exist, please try again!')</script>";
            echo"<script>window.open('signup.php', '_self')</script>";
            exit();
        }

        if(substr($first_name,-1) == 'a'){
            echo"<script>alert('You're a woman')</script>";
            $profile_pic = "images/woman_icon.jpeg";
        }else{
            echo"<script>alert('You're a man')</script>";
            $profile_pic = "images/man_icon.jpeg";
        } 


        $insert = "insert into users (user_first_name, user_last_name, user_login, user_pass, user_profile)
            values('$first_name', '$last_name', '$login', '$pass', '$profile_pic')";

        $query = mysqli_query($con, $insert);

        if($query){
            echo"<script>alert('Congratulation $first_name, your account has been created successfully!')</script>";
            echo"<script>window.open('signin.php', '_self')</script>";
        }
        else{
            echo"<script>alert('Registration failed. try again!')</script>";
            echo"<script>window.open('signup.php', '_self')</script>";
        }
    }
        


?>