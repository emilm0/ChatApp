<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    
    <!-- Fonts from google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@500&family=Sansita+Swashed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Mansalva&family=Rock+Salt&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="css/signup.css">

    <title>Create new Account</title>
</head>

<body>
    <div class="signup-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Sign Up</h2>
                <p>Fill out this form and start chating with your friends</p>
            </div>
            <div class="form-group">
                <input class="form-control" name="user_first_name" placeholder="First name" 
                    autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input class="form-control" name="user_last_name" placeholder="Last name" 
                    autocomplete="off" required="">
            </div>
            <div class="form-group">
                <input class="form-control" name="user_login" placeholder="Login" autocomplete="off"
                    required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="user_pass" placeholder="Password"
                    autocomplete="off" required="">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
            </div>
            <?php include("signup_user.php"); ?>
            <div class="text-center small" style="color: #674288;">Already have an account?
                <a href="signin.php">Sign here</a></a>
            </div>
        </form>
    </div>

</body>

</html>