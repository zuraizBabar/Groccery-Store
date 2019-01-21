
  <?php require "Server/GroceryDBConnection.php";
  function getcategory()
  {
      global $DB;
      $getCatsQuery = "select * from Category";
      $getCatsResult = mysqli_query($DB,$getCatsQuery);
      while($row = mysqli_fetch_assoc($getCatsResult)) {
          $cat_title = $row['Title'];
          echo " <a class='dropdown-item' href='#' style='padding:0px;border-top: 1px solid saddlebrown'>$cat_title</a>";
      }
  }

  ?>
<!--<div id="header">
    <!--  NavBar Area -->
    <nav class="navbar navbar-expand-md navbar-dark bg-warning navbar-fixed-top"   style="padding:0px 0px 0px 0px ;margin-bottom: 0px; border-bottom: 2px solid white" >
        <a href="Index.php"><span class="col-md-2 d-none d-lg-inline" style="padding-left: 0px;padding-right: 50px"><img src="images/logo.jpg" style="width: 75px; height: 75px" ></span></a>
        <span class="navbar-text navbar-left d-inline " style=" padding-bottom: 0px;padding-top: 0px ; margin:0px 0px 0px 0px">
            <a href="Index.php" style="color: brown; font-size:xx-large;font-family: 'Franklin Gothic Medium Cond';font-weight: bolder;"> HumMart </a>
        </span>

        <button class="navbar-toggler navbar-right" type="button" data-toggle="collapse" data-target="#collapse_target" style="padding-left:0px ;padding-right:0px;">
            <span class="sr-only">Togggle navigation</span>
            <div  class="fa fa-align-justify fa-2x nav navbar-right" style="opacity: 0%;color: brown;" ></div>
        </button>
        <div class=" collapse navbar-collapse" id="collapse_target">
            <ul class= "nav navbar-nav navbar-right" style="border-left: 1px saddlebrown"   >
                <li class="dropdown">
                    <a href="Header.html" class=" dropdown-toggle fa fa-home " data-toggle="dropdown" data-target="#dropdowntarget"> Categories</a>
                    <div class="dropdown-menu bg-warning" aria-labelledby="dropdowntarget" style="padding: 0px">
                        <?php

                        getcategory();?>
                    </div>
                </li>
                <li >
                    <a href= "Login.php" class="fa fa-sign-in-alt"> Login</a>
                </li>
                <li>
                    </i> <a href="About.php" class="fa fa-user"> About</a>
                </li>
                <li>
                    <a href="Contact.php" class="fa fa-envelope"style="padding-right: 30px"> Contact</a>
                </li>
            </ul>
        </div>

    </nav>
</div>-->
