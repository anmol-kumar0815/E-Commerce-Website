<?php
include('admin/config.php');
session_start();
if(!isset($_SESSION['EMAIL'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="customCss/index.css">
    <link rel="stylesheet" type="text/css" href="admin/navbarcss.css">
    <link rel="icon" href="images/logo.jpg">
  </head>

  <style type="text/css">
    .container {
        padding: 20px 20px;
        width: auto;
        max-width: 600px;
        height: auto;
        box-shadow: 0px 0px 13px rgba(0,0,0,0.9);
    }
    .text-green{
        color: #0c3;
    }
    .bg-green{
        background-color: #0c3;
    }
    .section-title {
        padding-top: 30px;
        padding-bottom: 13px;
    }
    .section-title h2 {
        font-size: 16px;
        font-weight: 500;
        padding: 0;
        line-height: 1px;
        margin: 0 0 5px 0;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #aaaaaa;
        font-family: "Poppins", sans-serif;
    }

    .section-title h2::after {
        content: "";
        width: 120px;
        height: 1px;
        display: inline-block;
        background:#39ac39;
        margin: 4px 10px;
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
        <a class="nav-link" href="wishlist.php?ID=<?php echo $_SESSION['ID'];?>" data-toggle="tooltip" data-placement="bottom" title="View Wishlist"><i class="fas fa-heart"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="setting.php?ID=<?php echo $_SESSION['ID'];?>" data-toggle="tooltip" data-placement="bottom" title="MY ACCOUNT"><i class="fa fa-user"></i> <?php echo $_SESSION['NAME'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </li>
      <?php } ?>
      </ul>
  </div>
</nav>
<!--ending of navbar -->
  <div class="container bg-light" style="margin-top: 100px">
    <h4 class="text-green">My Account</h4>

    <?php
        $id = $_GET['ID'];
        $sql = "SELECT * FROM normaluser WHERE ID = {$id}";
        $result = mysqli_query($conn, $sql) or die("Select query not running");
        $row = mysqli_fetch_assoc($result);
    ?>
    
    <div class="section-title"> <!-- staring of about section -->
        <h2>Basic Info</h2>       <!-- For line -->
    </div>   <!-- section title div -->

    <div class="personal-info-box">
        <p>User Name : <?php echo $row['NAME'];?></p>
        <p>Registered Email : <?php echo $row['EMAIL'];?></p>
        <p>Registered Phone Number : <?php echo $row['PHONE'];?></p>
    </div>

    <div class="section-title"> <!-- staring of about section -->
        <h2>Address Info</h2>       <!-- For line -->
    </div>   <!-- section title div -->

    <div class="address-info-box">
        <p>Address : <?php echo $row['ADDRESS'];?></p>
        <p>City : <?php echo $row['CITY'];?></p>
        <p>Pincode : <?php echo $row['PINCODE'];?></p>
        <p>State : <?php echo $row['STATE'];?></p>
        <p>Country : <?php echo $row['COUNTRY'];?></p>
    </div>
    
    <a href="settingUpdate.php?ID=<?php echo $id;?>" class="btn btn-success">Update Info</a>
  </div>
  
  <br>
  <?php include('footer.php');?> 

  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="Bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
  </body>
</html>