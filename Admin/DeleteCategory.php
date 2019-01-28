<?php
if(!isset($_SESSION['user_email'])){
    header('location: Login.php?not_admin=You are not Admin!');
}
if(isset($_GET['DeleteCategory'])){
    $get_id = $_GET['DeleteCategory'];
    $insert_category = "delete from Category where Id = '$get_id'";
    $insert_cat = mysqli_query($DB, $insert_category);
    if($insert_cat)
    {
        header("location: Index.php?ViewCategory");
    }

}