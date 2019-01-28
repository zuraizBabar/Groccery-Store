<?php
include "Header.php";
include "Server/GroceryDBConnection.php";
$error_msg = '';
if(isset($_POST['SignInButton']))
{
    $UserName = $_POST['signin_username'];
    $Password = $_POST['signin_exampleInputPassword1'];
    $Password2 = $_POST['signin_exampleInputPassword2'];
    $Email = $_POST['signin_exampleInputEmail1'];
    $reg_name = "/[A-Za-z](\d|\w|\.|-){2,30}/";
    $reg_pass = "/(\d|\w|\.|-){0,15}[A-Z](\d|\w|\.|-){0,15}/";
    $reg_email = "/(\d|\w|\.|-){1,30}@(gmail|yahoo|hotmail)\.com/";
    if($Password !== $Password2)
    {
        $error_msg = 'Password not matched';
    }
    else if(preg_match($reg_name,$UserName)) {
        if (preg_match($reg_pass, $Password)) {
            if (preg_match($reg_email, $Email)) {
                $insert = "insert into signin(UserName,Password,Email)
                                VALUES ('$UserName','$Password','$Email')";
                mysqli_query($DB, $insert);
                $_SESSION['useremail'] = $Email;
                if (!empty($_POST['remember'])) {
                    setcookie('useremail', $Email, time() + (10 * 365 * 24 * 60 * 60));
                    setcookie('userpassword', $Password, time() + (10 * 365 * 24 * 60 * 60));
                } else {
                    setcookie('useremail', '');
                    setcookie('userpassword', '');
                }
                header('location:index.php');

            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signin</title>

    <!-- Bootstrap -->
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
    <script>
        function checkEmail(str) {
            if (str.length == 0) {
                document.getElementById("hint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("hint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("POST", "Server/CheckEmail.php?e=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

</head>
<body>
<div id="wrapper">
    <div id= "maincontent">
<div class="row signin">
    <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3 col-xs-12">
        <form class="form-containers bg-white"  method="post" enctype="multipart/form-data">
            <label style="margin: 18px 0px;font-weight: bold; font-size: small ;font-family: 'Hobo Std';color: saddlebrown"><?php echo $error_msg;?></label>
            <h1 style="margin: 18px 0px;font-weight: bold; font-size: 65px;font-family: 'Hobo Std';color: saddlebrown">SignIn</h1>
            <div class="form-group" style="margin: 0px 0px">
                <label for="signin_username" class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">UserName</label>
                <input type="text" class="form-control" required pattern = "[A-Za-z](\d|\w|\.|-){2,30}" name="signin_username" id="signin_user"  placeholder="UserName"
                       style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">
            </div>
            <div class="form-group" style="margin: 0px 0px">
                <label for="signin_exampleInputEmail" class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Email </label>

                <input type="email" class="form-control" id="signin_exampleInputEmail1" required pattern="(\d|\w|\.|-){1,30}@(gmail|yahoo|hotmail)\.com"
                       name="signin_exampleInputEmail1" placeholder="Email" style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown"
                        onkeyup="checkEmail(this.value)">
                <span   id="hint" style="margin: 18px 0px;font-weight: bold; font-size: small ;font-family: 'Hobo Std';color: saddlebrown"></span>
            </div>
            <div class="form-group" style="margin: 0px 0px">
                <label for="signin_exampleInputPassword1"  class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Password</label>
                <input type="password" class="form-control" name="signin_exampleInputPassword1" required pattern="(\d|\w|\.|-){0,15}[A-Z](\d|\w|\.|-){0,15}" id="signin_exampleInputPassword1" placeholder="Password"style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">
            </div>
            <div class="form-group" style="margin: 0px 0px">
                <label for="signin_exampleInputPassword2"  class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Re-EnterPassword</label>
                <input type="password" class="form-control" name="signin_exampleInputPassword2" required pattern="(\d|\w|\.|-){0,15}[A-Z](\d|\w|\.|-){0,15}" id="signin_exampleInputPassword2" placeholder="Re-EnterPassword" style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">
            </div>
            <div class="checkbox" style="margin: 0px 0px">
                <label  class="float-left"style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">
                    <input type="checkbox"id="remember" name="remember" > Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-warning  btn-block" name="SignInButton" id="SignInButton" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">SignIn</button>
        </form>
    </div>
</div>
    </div>
    <?php include "Footer.php";
    ?>

</div>

</body>

