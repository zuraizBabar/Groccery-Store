<?php require "Header.php";
require "Server/Function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hum Mart</title>
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
        <!--Banner Area-->
        <div class="container-fluid con" style="padding-left: 0px;padding-right: 0px;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="border-bottom: 10px solid white">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-12 d-inline" style="padding-left: 0px; padding-right: 0px;">
                            <img src="images/G.jpg" alt="Grocery" class="img-responsive">
                        </div>
                    </div>
                      <div class="item">
                          <div class="col-12 d-inline" style="padding-left: 0px; padding-right: 0px">
                              <img src="images/G1.jpg" alt="Grocery" class="img-responsive ">
                          </div>
                      </div>
                      <div class="item">
                          <div class="col-12 d-inline" style="padding-left: 0px; padding-right: 0px">
                              <img src="images/G2.jpg" alt="Grocery" class="img-responsive" >
                          </div>
                      </div>
                      <div class="item">
                          <div class="col-12 d-inline" style="padding-left: 0px; padding-right: 0px">
                              <img src="images/G3.jpg" alt="Grocery" class="img-responsive" >
                          </div>
                      </div>
                </div>


                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev" role="button" style="opacity: 50%;">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next" role="button" style="opacity: 50%">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!--Category Area-->
        <div class= " container-fluid " style="background: #f8f8f8;padding-left: 0px; padding-right: 0px;" >
        <div class="col-12 form-inline ">
                 <h1 style="font-family: 'Droid Serif';font-size:50px ;color: saddlebrown;text-align: center"> Category </h1> <br>
            </div>
            <?php getCats(); ?>
        </div>
    </div>

    <?php require "Footer.php";
    ?>

</div>

</body>
