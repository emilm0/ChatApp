<!DOCTYPE html>
<html>
<head>
    <title>School Chat - HOME</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    
</head>
<body>
    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group searchbox">
                    <div class="input-group-btn">
                        <center><a href="include/find_friends.php"><button class="btn btn-default
                         search-icon" name="search_user" type="submit">Add new user</button></a></center>
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <?php include("include/get_users_data.php"); ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <!-- getting the user information who is logged in  -->
                    <?php
                        $user = $_SESSION['user_login'];
                        $get_user = "select * from users where user_login='$user'";
                        $run_user = mysqli_query($con, $get_user);
                        $row = mysqli_fetch_array($run_user);

                        $user_id = $row['user_id'];
                        $userlogin = $row['user_login'];
                    ?>

                    <?php
                    // getting the user data on which user click
                        if(isset($GET['user_login'])){

                            global $con;

                            $get_user_login = $_GET['user_login'];
                            $get_user = "select * from users where user_login='$get_user_login'";

                            $run_user = mysqli_query($con, $get_user);
                            $row_user = mysqli_fetch_array($run_user);

                            $user_login = $row_user['user_login'];
                            $user_profile_image = $row_user['user_profile'];
                        }
                        
                        $total_message = "select * form users_chat where
                            (sender_user_login = '$userlogin' AND receiver_user_login= '$user_login')
                            OR (receiver_user_login='$userlogin' AND sender_user_login = '$user_login')";
                        $run_messages = mysqli_query($con, $total_message);
                        $total = mysqli_num_rows($run_messages);
                    ?>
                    <div class = "col-md-12 right-header">
                        <div class ="right-header-img">
                            <img src="<?php echo"$user_profile_image"; ?>">
                        </div>
                        <div class="right-header-detail">
                            <form method="post">
                                <p><?php echo "user_login"; ?></p>
                                <span><?php echo $total; ?> message</span>&nbsp &nbsp
                                <button name ="logout" class="btn btn-denger">Logout</button> 
                            </form>
                            <?php
                                if(isset($_POST['logout'])){
                                    $update_msg = mysqli_query($con, "UPDATE users SET log_in='Offline'
                                        WHERE userlogin='$userlogin'");
                                    header("Location:logout.php");
                                    exit();

                                }
                            ?>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div id="scrolling_to_botton" class="col-md-12 right-header-contentChat">
                        <?php

                            $udate_msg = mysqli_query($con, "UPDATE users_chat SET msg_status='read'
                                WHERE sender_user_login = '$user_login' AND receiver_user_login='$user_id'");

                            $sel_msg = "select * form users_chat where
                            (sender_user_login = '$userlogin' AND receiver_user_login= '$user_login')
                            OR (receiver_user_login='$userlogin' AND sender_user_login = '$user_login')
                            ORDER by 1 ASC";
                            $run_msq = mysqli_query($con, $sel_msg);

                            while ($row = mysqli_fetch_array($run_msq)) {

                                $sender_user_login = $row['sender_user_login'];
                                $reciever_user_login = $row['receiver_user_login'];
                                $msg_content = $row['msg_content'];
                                $msg_date = $row['msg_date'];
                            
                        ?>
                        <ul>
                            <?php

                                if($userlogin == $sender_user_login AND
                                     $user_login == $reciever_user_login){

                                    echo"
                                        <li>
                                            <div class='rightside-chat'>
                                                <span> $user_login <small>$msg_date</small></span> 
                                                <p>$msg_content</p>
                                            </div>    
                                        </li>
                                     ";
                                }

                                else if($userlogin == $reciever_user_login AND
                                    $user_login == $sender_user_login){

                                 echo"
                                    <li>
                                        <div class='rightside-chat'>
                                            <span> $user_login <small>$msg_date</small></span> 
                                            <p>$msg_content</p>
                                        </div>    
                                    </li>
                                    ";
                                }    
                            ?>
                        </ul>
                        <?php
                            }
                        ?>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-12 right-chat-textbox">
                        <form method="post">
                            <input autocomplete="off" type="text" name="msg_content" placeholder=
                            "Write your message......">
                            <button class="btn" name="submit"><i class="fa fa-telegram" 
                            aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>         
            </div>
        </div>
    </div>
    <?php

        if(isset($_POST['submit'])){

            $msg = htmlentities($_POST['msg_content']);

            if($msg == ""){
                echo"
                <div class='alert alert-denger'>
                    <strong><center>Message was unable to send</center></strong>
                </div>
                ";
            }
            else if(strlen($msg) > 100){
                echo"
                <div class='alert alert-denger'>
                    <strong><center>Message is too long. Use only 100 characters</center></strong>
                </div>
                ";
            }
            else{
                $insert = "insert into users_chat(sender_user_login, receiver_user_login,
                    msg_content, msg_status, msg_date) values('$userlogin', '$user_login',
                    '$msg_content', 'unread', NOW())";
                
                $run_insert = mysqli_query($con, $insert);
            }
        }
    ?>
</body>

</html>