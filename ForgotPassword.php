<?php include "Header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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
                xmlhttp.open("POST", "Server/CheckEmail2.php?e=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>
<div id="wrapper">


<div id= "maincontent">

<div class="row forgot">
    <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3 col-xs-12">
        <form class="form-containerss bg-white">
            <h1 style="margin: 18px 0px;font-weight: bold; font-size: 30px;font-family: 'Hobo Std';color: saddlebrown">Forgot Password</h1>
            <p style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">
                Please enter your email address below and we will <br> send you information to change your password </p>
            <div class="form-group" style="margin: 0px 0px;">
                <label for="exampleInputEmail" class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Email</label>
                <input type="text" class="form-control" name="Forgot_exampleInputEmail" id="Forgot_exampleInputEmail" placeholder="Email"
                       required pattern="(\d|\w|\.|-){1,30}@(gmail|yahoo|hotmail)\.com"
                       onkeyup="checkEmail(this.value)"
                       style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">
                <span  id="hint" style="margin: 18px 0px;font-weight: bold; font-size: small ;font-family: 'Hobo Std';color: saddlebrown"></span>

            </div>

            <button type="submit" class="btn btn-warning  btn-block" style="margin-top: 20px; font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Reset</button>
        </form>
    </div>
</div>
</div>
    <?php include "Footer.php";
    ?>
</body>