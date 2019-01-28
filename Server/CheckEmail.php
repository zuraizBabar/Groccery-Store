<?php
require "GroceryDBConnection.php";
$e = $_REQUEST["e"];
$sel_email = "select * from Signin where Email= '$e'";
$run_email  = mysqli_query($DB,$sel_email);
$count = mysqli_num_rows($run_email);
if($count>0)
    echo "*********Already registered*********";