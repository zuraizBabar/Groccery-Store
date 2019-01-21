<?php require "Header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>

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



</head>
<body>
<div id="wrapper">

    <div id= "maincontent">
        <div class="row signin">
            <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3 col-xs-12">
                <form class="form-containers bg-white" method="post" action="" style="height: 364px">
                    <h1 style="margin: 18px 0px;font-weight: bold; font-size: 52px;font-family: 'Hobo Std';color: saddlebrown">Contact</h1>
                    <div class="form-group" style="margin: 0px 0px">
                        <label for="username" class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">UserName</label>
                        <input type="text" class="form-control" id="contact_username" required pattern = "[A-Za-z](\d|\w|\.|-){2,30}"  placeholder="UserName" style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: black">
                    </div>
                    <div class="form-group" style="margin: 0px 0px">
                        <label for="exampleInputEmail1" class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Email </label>
                        <input type="email" class="form-control" id="contact_Email1" required pattern="(\d|\w|\.|-){1,30}@(gmail|yahoo|hotmail)\.com" placeholder="Email" style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: black">
                    </div>
                    <div class="form-group" style="margin: 0px 0px;padding-bottom: 14px">
                        <label for="exampleInputPassword1"  class="float-left" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Message</label>
                        <input type="text" class="form-control"  id="contact_message"  required pattern=".{10,}" placeholder="Message" style=" font-weight: lighter; font-size: 15px;font-family: 'Hobo Std';color: black;padding-bottom: 14px;">
                    </div>
                    <button type="submit" class="btn btn-warning  btn-block " class="form-control" style=" font-weight: bold; font-size: 15px;font-family: 'Hobo Std';color: saddlebrown">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <?php require "Footer.php";
    ?>

</div>

</body>

