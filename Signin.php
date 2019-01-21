<?php require "Server/GroceryDBConnection.php";
require "Header.php";
if(isset($_POST['SignInButton']))
{
    $UserName = $_POST['signin_username'];
    $Password = $_POST['signin_exampleInputPassword1'];
    $Email = $_POST['signin_exampleInputEmail1'];
    $reg_name = "/[A-Za-z](\d|\w|\.|-){2,30}/";
    $reg_pass = "/(\d|\w|\.|-){0,15}[A-Z](\d|\w|\.|-){0,15}/";
    $reg_email = "/(\d|\w|\.|-){1,30}@(gmail|yahoo|hotmail)\.com/";
    if(preg_match($reg_name,$UserName))
    {
        if(preg_match($reg_pass,$Password)){
            if(preg_match($reg_email,$Email)){
                $insert = "insert into signin(UserName,Password,Email)
                                VALUES ('$UserName','$Password','$Email')";
                mysqli_query($DB,$insert);
            }else{
                echo "Invalid Email Enter";
            }
        }
        else {
            echo "Invalid Password Enter";
        }
    }
    else{
        echo "Invalid Name Enter";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Css/Style.css">


</head>
<body>
<div id="wrapper">

    <div id= "maincontent">

<div class="row signin">
    <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3 col-xs-12">
        <form class="form-containers bg-white" action="Signin.php" method="post" enctype="multipart/form-data">
            <h1 style="margin: 18px 0px;font-weight: bold; font-size: 65px;font-family: 'Hobo Std';color: saddlebrown">SignIn</h1>
            <div class="form-group" style="margin: 0px 0px">
                <label for="signin_username" class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">UserName</label>
                <input type="text" class="form-control" required pattern = "[A-Za-z](\d|\w|\.|-){2,30}" name="signin_username" id="signin_user"  placeholder="UserName" >
            </div>
            <div class="form-group" style="margin: 0px 0px">
                <label for="exampleInputEmail1" class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Email </label>
                <input type="email" class="form-control" id="signin_exampleInputEmail1" required pattern="(\d|\w|\.|-){1,30}@(gmail|yahoo|hotmail)\.com" name="signin_exampleInputEmail1" placeholder="Email" style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: black">
            </div>
            <div class="form-group" style="margin: 0px 0px">
                <label for="exampleInputPassword1"  class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Password</label>
                <input type="password" class="form-control" name="signin_exampleInputPassword1" required pattern="(\d|\w|\.|-){0,15}[A-Z](\d|\w|\.|-){0,15}" id="signin_exampleInputPassword1" placeholder="Password" style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: black">
            </div>
            <div class="form-group" style="margin: 0px 0px">
                <label for="exampleInputPassword2"  class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Re-EnterPassword</label>
                <input type="password" class="form-control" name="signin_exampleInputPassword2" required pattern="(\d|\w|\.|-){0,15}[A-Z](\d|\w|\.|-){0,15}" id="signin_exampleInputPassword2" placeholder="Re-EnterPassword" style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: black">
            </div>
            <div class="checkbox" style="margin: 0px 0px">
                <label  class="float-left"style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">
                    <input type="checkbox" > Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-warning  btn-block" name="SignInButton" id="SignInButton" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">SignIn</button>
        </form>
    </div>
</div>
    </div>
    <?php require "Footer.php";
    ?>

</div>

</body>

