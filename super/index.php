<?php
require '_cred.php';
session_start();

if(isset($_SESSION['username'])){
    header("location:home.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Updates | Cryosoft</title>
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="icon" type="image/png" sizes="308x303" href="assets/img/colored_transparent_logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/logo_template.png&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <?php
                                    if(isset($_POST['signin'])){
                                        $email=$_POST['email'];
                                        $pass=md5($_POST['password']);
                                        $sql = "SELECT username, password,level FROM admins WHERE username='$email' AND password='$pass'";
                                        $result = $conn->query($sql);
                                        if($result->num_rows>0){
                                            while($row = $result->fetch_assoc()){
                                                $_SESSION['username']=$row['username'];
                                                $_SESSION['usertype']=$row['level'];
                                                header('location:home.php');
                                            }
                                            echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><b>Successfully logged in!</b> You are being logged in, in a few!</div>";
                                        }
                                        else{
                                            echo"<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button><b>Unable to log in!</b> The details you have entered are incorrect!</div>";
                                        }
                                    }
                                    ?>
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Login.</h4>
                                    </div>
                                    <form class="user" method="post" action="">
                                        <div class="form-group"><input class="form-control form-control-user"
                                                                       type="text" id="exampleInputEmail"
                                                                       aria-describedby="emailHelp"
                                                                       placeholder="Enter Username" name="email"></div>
                                        <div class="form-group"><input class="form-control form-control-user"
                                                                       type="password" id="exampleInputPassword"
                                                                       placeholder="Password" name="password">
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" name="signin">Login</button>
                                        <hr>
                                    </form><small>--Login is only restricted to Cryosoft Staff Only.</small>
                                    <div class="text-center"></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>