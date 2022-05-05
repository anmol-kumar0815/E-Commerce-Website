<?php
include('admin/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Wishlist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="customCss/index.css">
    <link rel="stylesheet" type="text/css" href="admin/navbarcss.css">
    <link rel="icon" href="images/logo.jpg">
  </head>
  <style type="text/css">
        .container {
            margin-top: 90px;
        }
        .remove-btn{
            background-color: #f8f9fa;
            border: 1px solid black;
            padding: 5px 7px;
            text-decoration: none;
            color: black;
        }
        .remove-btn:hover{
            text-decoration: none;
            background-color: black;
            color: #f8f9fa;
        }
        .product-image{
          object-fit: contain;
        }
  </style>
  <body>
<!-- starting of navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <img class="navbar-brand" src="images/logo.jpg" alt="logo" style="width:7vh; height:7svh">
  <h4 class="navbar-brand" style="margin-top:6px;color:#0c3; font-size: 33px">
  Aggrawal's
  </h4>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
		 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  <?php 
		    $sql2 = "SELECT * FROM allcategory";
			$result2 = mysqli_query($conn,$sql2) or die("Allcategory select query not running");
			if(mysqli_num_rows($result2)>0) {
				while($row2 = mysqli_fetch_assoc($result2)) {
					$productcategory=$row2['CATEGORYNAME'];
		  ?>
		     
		   <a class="dropdown-item product-dropdown" href="product-card.php?CATEGORYNAME=<?php echo $productcategory;?>&ID=<?php echo $row2['ID'];?>"><?php echo strtoupper(str_replace("_"," ",$row2['CATEGORYNAME']));?></a>
			<?php } }?>
		 </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="feedback.php">Feedback</a>
      </li>
	<?php 
          if(!isset($_SESSION['EMAIL']))  {
    ?>	
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="register.php">Register</a>
          <a class="dropdown-item" href="login.php">Login</a>
        </div>
       </li>	
    <?php } else {?>
      <li class="nav-item">
        <a class="nav-link" href="cart.php?ID=<?php echo $_SESSION['ID'];?>" data-toggle="tooltip" data-placement="bottom" title="View Cart"><i class="fas fa-shopping-cart"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="wishlist.php?ID=<?php echo $_SESSION['ID'];?>" data-toggle="tooltip" data-placement="bottom" title="View Wishlist"><i class="fas fa-heart"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="setting.php?ID=<?php echo $_SESSION['ID'];?>" data-toggle="tooltip" data-placement="bottom" title="MY ACCOUNT"><i class="fa fa-user"></i> <?php echo $_SESSION['NAME'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
      <?php } ?>
      </ul>
  </div>
</nav>
<!--ending of navbar -->

    <div class="container">
        <div class="row">
            <?php
                $id = $_GET['ID'];
                $tablename = "normaluser_wishlist_".$id;

                $sql = "SELECT * FROM {$tablename}";
                $result = mysqli_query($conn, $sql) or die("select query not running");
                if($n = mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $newtablename = $row["PRODUCTCATEGORY"];
                        $productid = $row["PRODUCTID"];
        
                        $sql1 = "SELECT * FROM {$newtablename} WHERE ID = {$productid}";
                        $result1 = mysqli_query($conn, $sql1) or die("second query not running");
                        $row1 = mysqli_fetch_assoc($result1);
                        $n = mysqli_num_rows($result1);
            ?>
            <div class="col-lg-3 col-md-3 col-6">
                <div class="card mx-auto">
                    <a href="card-details.php?CATEGORYNAME=<?php echo $row["PRODUCTCATEGORY"];?>&ID=<?php echo $row['PRODUCTID'];?>"><img class="card-img-top product-image" src="admin/images/product/<?php echo $row1['IMAGE'];?>"/></a> 
                    <div class="card-body bg-light">
                        <p class="card-text"><?php echo $row1["TITLE"];?></p>
                        <?php 
                        if($row1["DISCOUNT"] != "") {
                        ?>
                            <p class="card-title discount" style="text-decoration:line-through;"><?php echo $row1["DISCOUNT"];?> Rs</p>
                        <?php }?>
                        <p class="card-title price text-success"><i><?php echo $row1["PRICE"];?> Rs</i></p>
                        <div>
                            <a href="delete-wishlist-product.php?USERID=<?php echo $id;?>&ID=<?php echo $row['ID'];?>" class="remove-btn">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } else {?>
                <p>Your Wishlist is Empty.</p>
            <?php } ?>
        </div>
    </div>
    
    <br>
    <?php include('footer.php');?> 
 
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="Bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

  </body>
</html>
