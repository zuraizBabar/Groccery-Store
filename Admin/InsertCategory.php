<?php require "../Server/GroceryDBConnection.php";
if(!isset($_SESSION['user_email'])){
    header('location: Login.php?not_admin=You are not Admin!');
}
if(isset($_POST['insert_cat']))
{
    $cat_title = $_POST['cat_title'];
    $cat_desc = $_POST['cat_desc'];
    $cat_image = $_FILES['cat_image']['name'];
    $cat_image_tmp = $_FILES['cat_image']['tmp_name'];
    move_uploaded_file($cat_image_tmp,"../images/$cat_image");
    $reg_title="/[^\s][A-Za-z]{1,15}(\s)?(\W|_|-)?(\s)?[A-Za-z]{1,15}[^\s]/";
    $reg_desc="/[^\s].{1,100}[^\s]/";
    $reg_img="/[^\s].{1,20}\.(jpg|jpeg|png)/";
    if(preg_match($reg_title,$cat_title))
    {
        if(preg_match($reg_desc,$cat_desc))
        {
            if(preg_match($reg_img,$cat_image))
            {
                $insert_category = "insert into Category (Title,Description,Image)
                  VALUES ('$cat_title','$cat_desc','$cat_image')";
                $insert_cat = mysqli_query($DB, $insert_category);
            }
            else{
                echo "Image Invalid";
            }
        }
        else{
            echo "Invalid Description";
        }
    }
    else{
        echo "Title Invalid";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Category</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="../Css/Style.css">
</head>

<h1 class="text-center my-4"><i class="fas fa-plus fa-md"></i> <span class="d-none d-sm-inline"> Add New </span> Category </h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="pro_title" class="float-md-right"> <span class="d-sm-none d-md-inline"> Category </span> Title:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                </div>
                <input type="text" class="form-control" id="cat_title" name="cat_title" placeholder="Enter Category Title"
                       required pattern="[^\s][A-Za-z]{1,15}(\s)?(\W|_|-)?(\s)?[A-Za-z]{1,15}[^\s]" >
            </div>
        </div>

        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="pro_img" class="float-md-right"><span class="d-sm-none d-md-inline"> Category </span> Image:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4 mt-3 mt-lg-0">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="far fa-image"></i></div>
                </div>
                <input class="form-control" type="file" id="cat_image" name="cat_image" required pattern="[^\\s]+(\\.(?i)(jpg|png|gif|bmp))$" >
            </div>
        </div>

        <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto">
            <label for="pro_desc" class="float-md-right"><span class="d-sm-none d-md-inline"> Category </span> Detail:</label>
        </div>
        <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4 mt-3 mt-lg-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="far fa-comment-alt"></i></div>
                </div>
                <input class="form-control" type="text" id="cat_desc" name="cat_desc" placeholder="Enter Category Detail"
                       required pattern="[^\s].{1,100}[^\s]" >
            </div>
        </div>

    </div>
<div class="row my-3">
    <div class="d-none d-sm-block col-sm-3 col-md-4 col-lg-2 col-xl-2 mt-auto"></div>
    <div class="col-sm-9 col-md-8 col-lg-4 col-xl-4">
        <button type="submit" name="insert_cat" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Insert Now </button>
    </div>
</div>


</form>

