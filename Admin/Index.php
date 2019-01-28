<?php
session_start();
require_once "../Server/GroceryDBConnection.php";
if(!isset($_SESSION['user_email'])){
    header('location: Login.php?not_admin=You are not Admin!');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link rel="stylesheet" type="text/css" href="../Css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers|Old+Standard+TT">
    <title>HumMart Admin Panel</title>
    <style>
        * {
            font-family: 'Old Standard TT', serif;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <img src="../images/logo.jpg" style="width: 100px"> <h3>Admin Panel</h3>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="Index.php?InsertCategory">
                    <i class="fas fa-plus"></i> Insert New Category
                </a>
            </li>
            <li>
                <a href="Index.php?ViewCategory">
                    <i class="fas fa-sitemap"></i> View All Category
                </a>
            </li>
            <li>
                <a href="Logout.php">
                    <i class="fa fa-sign-out-alt"></i> Admin logout</a>
            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
        <div class="container">
            <h2 class="text-center text-primary"><?php echo @$_GET['logged_in']?></h2>
            <?php
            if(isset($_GET['InsertCategory'])){
                include ('InsertCategory.php');
            }
            else if(isset($_GET['ViewCategory'])){
                include ('ViewCategory.php');
            }
            else if(isset($_GET['EditCategory'])){
                include ('EditCategory.php');
            }
            else if(isset($_GET['DeleteCategory'])){
                include ('DeleteCategory.php');
            }
            ?>

        </div>
    </div>
</div>
<script src="../js/jquery-3.3.1.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
</script>
</body>
</html>