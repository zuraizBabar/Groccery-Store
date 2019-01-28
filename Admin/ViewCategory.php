
<div class="row">
    <div class="col-sm-12">
        <h1>Products</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require "../Server/GroceryDBConnection.php";
            if(!isset($_SESSION['user_email'])){
                header('location: Login.php?not_admin=You are not Admin!');
            }
            $get_cat = "select * from Category";
            $run_cat = mysqli_query($DB,$get_cat);
            $count_cat = mysqli_num_rows($run_cat);
            if($count_cat==0){
                echo "<h2> No Category found in selected criteria </h2>";
            }
            else {
                $i = 0;
                while ($row_cat = mysqli_fetch_array($run_cat)) {
                    $cat_id = $row_cat['Id'];
                    $cat_title = $row_cat['Title'];
                    $cat_image = $row_cat['Image'];
                    $pro_desc= $row_cat['Description'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo ++$i; ?></th>
                        <td><?php echo $cat_title; ?></td>
                        <td><img class="img-thumbnail" src='../images/<?php echo $cat_image;?>' width='80' height='80'></td>
                        <td><a href="Index.php?EditCategory=<?php echo $cat_id?>" class="btn btn-primary">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="Index.php?DeleteCategory=<?php echo $cat_id?>" class="btn btn-danger">
                                <i class="fa fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>