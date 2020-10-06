<html>
<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php


$con = mysqli_connect("localhost", "root", "", "chatApp");

    
    $user = "select * from users";

    $run_user = mysqli_query($con, $user);

    while ($row_user = mysqli_fetch_array($run_user)){

        $user_id = $row_user['user_id'];
        // $user_first_name = $row_user['user_first_name'];
        // $user_last_name = $row_user['user_last_name'];
        $user_profile = $row_user['user_profile'];
        $user_status = $row_user['user_in'];
        $user_login = $row_user['user_login'];

        if($user_login != $_SESSION['user_login']){
        echo " 
            <li>
                <div class='chat-left-img'>
                    <img src='$user_profile'>
                </div>
                <div class='chat-left-detail'>
                <p><a href='home.php?userlogin=$user_login'>$user_login</a></p>";

                if($user_status == 1){
                    echo"<span><i class='fa fa-circle' aria-hidden='true'></i> Online</span>";
                } else{
                    echo"<span><i class='fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
                }
                "
                </div>
            </li>
            ";
        }
    }

?>
</html>