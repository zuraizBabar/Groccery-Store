<?php require "../Server/GroceryDBConnection.php";
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
<body>
<div class="container-fluid align-content-center">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <h1 class="fas fa-plus fa-md"> Add Category</h1>
            </div>
        </div>
    </div>
    <form action="InsertCategory.php" method="post" enctype="multipart/form-data">
        <div class="row">
        <div class="offset-2 col-8 offset-md-4 col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                </div>
                <input type="text" class="form-control" required pattern="[^\s][A-Za-z]{1,15}(\s)?(\W|_|-)?(\s)?[A-Za-z]{1,15}[^\s]" id="in_cat_title" name="cat_title" placeholder="Enter Category Title"
                >
            </div>
        </div>
    </div>
        <div class="row my-3">
            <div class="offset-2 col-8 offset-md-4 col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-comment-alt"></i></div>
                    </div>
                    <input class="form-control" type="text" required pattern="[^\s].{1,100}[^\s]" id="in_cat_desc" name="cat_desc" placeholder="Enter Category Description">
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="offset-2 col-8 offset-md-4 col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-image"></i></div>
                    </div>
                    <input class="form-control" type="file" required pattern="[^\s].{1,20}\.(jpg|jpeg|png)" id="in_cat_image" name="cat_image"style="padding-bottom: 36px" >
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="offset-2 col-8 offset-md-4 col-md-4">
                <button type="submit" name="insert_cat"  class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Insert Now </button>
        </div>
    </div>
    </form>
</div>
</body>
</html>

