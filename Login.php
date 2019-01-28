<?php
include "Header.php";
include 'Server/GroceryDBConnection.php';
$error_msg = '';
if(isset($_POST['login'])){
    $email = $_POST['login_exampleInputEmail1'];
    $pass = $_POST['login_exampleInputPassword1'];
    $sel_user = "select * from Signin  where Email='$email'";
    $run_user = mysqli_query($DB, $sel_user);
    $check_user = mysqli_num_rows($run_user);
    $row_user = mysqli_fetch_array($run_user);
    if($check_user==0){
        $error_msg = 'Invalid Email or Signin first';
    }
    else if($row_user['Password'] != $pass)
    {
        $error_msg = 'Invalid Password';
    }
    else{
        $_SESSION['useremail'] = $email;
        if(!empty($_POST['remember'])) {
            setcookie('useremail', $email, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('userpassword', $pass, time() + (10 * 365 * 24 * 60 * 60));
        } else {
            setcookie('useremail','' );
            setcookie('userpassword', '');
        }
        header('location:index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="Css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="html,css,javascript,xml">
    <meta name="discription" content="Hum Mart (Online Groccery Store) ">
    <meta name="author" content="Zuraiz Ahmed Babar, Huzaifa Rizwan, Rao Ammar, Munnan Asim">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Css/Style.css">

</head>
<body style="background: white; height: 100%">
<div id="wrapper">

<div id= "maincontent">
    <div class="row login">
    <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3 col-xs-12">
        <form class="form-container bg-white" method="post">
            <label style="margin: 18px 0px;font-weight: bold; font-size: small ;font-family: 'Hobo Std';color: saddlebrown"><?php echo $error_msg;?></label>
            <h1 style="margin: 18px 0px;font-weight: bold; font-size: 70px;font-family: 'Hobo Std';color: saddlebrown"> login</h1>
            <div class="form-group" style="margin: 0px 0px">
                <label for="login_exampleInputEmail1" class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Email </label>
                <input type="email" class="form-control" name="login_exampleInputEmail1" id="login_exampleInputEmail1" placeholder="Email"
                      required pattern="(\d|\w|\.|-){1,30}@(gmail|yahoo|hotmail)\.com" value="<?php echo @$_COOKIE['useremail']?>"
                       style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">
            </div>
            <div class="form-group" style="margin: 0px 0px">
                <label for="login_exampleInputPassword1"  class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Password</label>
                <input type="password" class="form-control" name="login_exampleInputPassword1" id="login_exampleInputPassword1" placeholder="Password"
                       required pattern="(\d|\w|\.|-){0,15}[A-Z](\d|\w|\.|-){0,15}" value="<?php echo @$_COOKIE['userpassword']?>"
                       style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">

            </div>
            <span style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown ;">
            <a href="ForgotPassword.php" style="float: left">Forgot Password</a><br>
            </span>
            <div class="checkbox" style="margin: 0px 0px;">
                <label  class="float-left"style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">
                    <input type="checkbox" id="remember" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-warning  btn-block" style=" margin-bottom: 10px;
            font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown" name="login" id = "login">LogIn</button>
            <span style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown ;">
            New to HumMart?<a href="Signin.php">Create an Account</a>
                </span>
        </form>
    </div>
</div>
</div>
    <?php include "Footer.php";
    ?>

</div>
</body>
