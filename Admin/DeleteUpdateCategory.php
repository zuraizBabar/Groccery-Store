<?php
require "../Server/GroceryDBConnection.php";
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
              Id='$_POST[cat_id]' ";
        $insert_cat = mysqli_query($DB, $insert_category);
        if($insert_cat)
        {
            header('Location: DeleteUpdateCategory.php');
            exit;
        }
        else
            echo "Not Updated";
    }
    else
    {
        $insert_category = "Update Category 
        set Title = '$_POST[cat_title]',Description = '$_POST[cat_desc]'
            where
              Id='$_POST[cat_id]' ";
        $insert_cat = mysqli_query($DB, $insert_category);
    }

}
if(isset($_POST['delete_cat']))
{
    $insert_category = "delete from Category where Id = '$_POST[cat_id]'";
    $insert_cat = mysqli_query($DB, $insert_category);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Update Category</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="../Css/Style.css">
</head>

<body>

<div class="container-fluid align-content-center">
    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <h1 class="fas fa-plus fa-md">Delete/Update Category</h1>
            </div>
        </div>
    </div>
</div>

<table style="width:100%;">
    <tr>
        <th align="left" valign="middle" >Title</th>
        <th align="left" valign="middle" >Description</th>
        <th align="left" valign="middle" >Image</th>
        <th align="left" valign="middle" >Update</th>
        <th align="left" valign="middle" >Delete</th>
    </tr>
    <?php
    global $DB;
    $getCatsQuery = "select * from Category";
    $getCatsResult = mysqli_query($DB,$getCatsQuery);
    while($row = mysqli_fetch_assoc($getCatsResult)) {
        $cat_id=$row['Id'];
        $cat_title = $row['Title'];
        $cat_desc = $row['Description'];
        $cat_image = $row['Image'];
        echo  "<tr>
        <form action='DeleteUpdateCategory.php' method = 'post' enctype='multipart/form-data'>
          <input type='hidden'class='form-control' id='cat_id' name='cat_id' value='$cat_id'>
        <th> 
        <input type='text'class='form-control' required pattern='[^\s][A-Za-z]{1,15}(\W|_|-)?[A-Za-z]{1,15}[^\s]' id='cat_title' name='cat_title' value='$cat_title'>
        </th>
         <th> 
        <input type='text' class='form-control' type='file' required pattern='[^\s].{1,100}[^\s]'  id='cat_desc' name='cat_desc' value='$cat_desc'>
        </th>  
        <th>
            <input class='form-control' type='file' pattern='[^\s].{1,20}\.(jpg|jpeg|png)' id='cat_image' name='cat_image' style='padding-bottom: 34px'>
        </th>
        <th>
             <button type='submit' name='update_cat' class='btn btn-primary btn-block'>Update</button>
        </th>
        <th>
             <button type='submit' name='delete_cat' class='btn btn-primary btn-block' >Delete</button>
        </th>
        </form> 
        
        </tr>";
        }
    ?>
</table>


</body>

</html>