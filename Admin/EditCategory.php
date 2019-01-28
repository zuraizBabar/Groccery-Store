<?php
if(!isset($_SESSION['user_email'])){
    header('location: Login.php?not_admin=You are not Admin!');
}
if(isset($_GET['EditCategory'])){
    $get_id = $_GET['EditCategory'];
    $get_cat = "select * from Category where Id='$get_id'";
    $run_cat = mysqli_query($DB, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_id = $row_cat['Id'];
    $cat_title = $row_cat['Title'];
    $cat_image = $row_cat['Image'];
    $cat_desc= $row_cat['Description'];
}

if(isset($_POST['update_cat']))
{
    $cat_image = $_FILES['cat_image']['name'];
    $cat_image_tmp = $_FILES['cat_image']['tmp_name'];
    move_uploaded_file($cat_image_tmp,"../images/$cat_image");
    if($cat_image!='')
    {
        $insert_category = "Update Category 
        set Title = '$_POST[cat_title]',Description = '$_POST[cat_desc]',Image='$cat_image'
            where
              Id='$cat_id' ";
        $insert_cat = mysqli_query($DB, $insert_category);
        if($insert_cat)
        {
            header("location: Index.php?ViewCategory");
        }
    }
    else
    {
        $insert_category = "Update Category 
        set Title = '$_POST[cat_title]',Description = '$_POST[cat_desc]'
            where
              Id='$cat_id' ";
        $insert_cat = mysqli_query($DB, $insert_category);
        if($insert_cat){
            header("location: Index.php?ViewCategory");
        }
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


<div class="row">
    <div class="offset-md-2 col-md-8">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <h2 class="offset-lg-3 offset-md-2 offset-1 "> Edit & Update Category </h2>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cat_title">Category Title</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control" type="text" id="cat_title" name="cat_title" placeholder="Category Title: "
                           value="<?php echo $cat_title;?>"  required pattern="[^\s][A-Za-z]{1,15}(\s)?(\W|_|-)?(\s)?[A-Za-z]{1,15}[^\s]">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cat_image">Category Image</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <img class="img-thumbnail" src='../images/<?php echo $cat_image;?>' width='80' height='80'>
                    <input class="form-control-file" type="file" id="cat_image" name="cat_image" pattern="[^\\s]+(\\.(?i)(jpg|png|gif|bmp))$">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-4 col-lg-3 d-none d-sm-block" for="cat_desc">Category Description</label>
                <div class="col-12 col-sm-8 col-lg-9">
                    <input class="form-control"  name="cat_desc" id="cat_desc" rows="4" placeholder="Category Description" value="<?php echo $cat_desc;?>"
                           required pattern="[^\s].{1,100}[^\s]">
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-sm-3 col-12 col-sm-6">
                    <input class="btn btn-block btn-primary btn-lg" type="submit" id="update_cat" name="update_cat"
                           value="Update Category Now">
                </div>
            </div>
        </form>
    </div>
</div>
