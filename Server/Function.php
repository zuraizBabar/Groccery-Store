<?php require "GroceryDBConnection.php";

function getCats(){
    global $DB;
    $getCatsQuery = "select * from Category";
    $getCatsResult = mysqli_query($DB,$getCatsQuery);
    while($row = mysqli_fetch_assoc($getCatsResult)){
        $cat_title = $row['Title'];
        $cat_desc = $row['Description'];
        $cat_image =$row['Image'];
           echo "<a href='#'class='col-12 col-md-6 category-list form-inline '>

            <div class='category-image'>
                    <img src= 'images/$cat_image' class='pictures'>
            </div>
                <div class='category-text form-inline'>
                       <h2 class='category-heading'>
        $cat_title
        </h2>
                    <h4 class='category-detail'>
        $cat_desc
        </h4>
                </div>
	    </a>
            ";

    }
}


