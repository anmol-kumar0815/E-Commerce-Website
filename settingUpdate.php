<?php
include('admin/config.php');
session_start();
if(!isset($_SESSION['EMAIL'])){
    header("location: index.php");
}

$id = $_GET['ID'];

if(isset($_POST['SUBMIT'])){
    $phone = $_POST['PHONE'];
    $address = $_POST['ADDRESS'];
    $city = $_POST['CITY'];
    $state = $_POST['STATE'];
    $pincode = $_POST['PINCODE'];
    $country = $_POST['COUNTRY'];

    $sql = "UPDATE normaluser SET ADDRESS = '{$address}', CITY='{$city}', STATE='{$state}', PINCODE='{$pincode}', COUNTRY = '{$country}', PHONE = '{$phone}' WHERE ID = $id";
    mysqli_query($conn, $sql) or die("Update query is not running");
    header("location: setting.php?ID=".$id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account Info</title>
    <link rel="icon" href="images/logo.jpg">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="customCss/index.css">
    <link rel="stylesheet" type="text/css" href="admin/navbarcss.css">

    <style type="text/css">
        .container{
            padding: 20px 20px;
            width: auto;
            max-width: 600px;
            height: auto;
            box-shadow: 0px 0px 13px rgba(0,0,0,0.9);
            margin-top: 100px;
        }
        .text-green{
            color: #0c3;
        }
        .bg-green{
            background-color: #0c3;
        }
        label{
            margin: 7px 0 2px 0;
        }
    </style>
</head>
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


    <div class="container bg-light">
        <h2 class="text-green">Update Account Info</h2>
        
        <?php
            $sql = "SELECT * FROM normaluser WHERE ID = {$id}";
            $result = mysqli_query($conn, $sql) or die("Select query not running");
            $row = mysqli_fetch_assoc($result)
        ?>

        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <div class="from-group">
                <label>Name</label>
                <input type="text" class="form-control" value="<?php echo $row['NAME'];?>" name="NAME" readonly/>
            </div>
            <div class="from-group">
                <label>Email</label>
                <input type="text" class="form-control" value="<?php echo $row['EMAIL'];?>" name="EMAIL" readonly/>
            </div>
            <div class="from-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" value="<?php echo $row['PHONE'];?>" name="PHONE" placeholder="Mobile Number" required/>
            </div>
            <div class="from-group">
                <label>Address *</label>
                <input type="text" class="form-control" value="<?php echo $row['ADDRESS'];?>" name="ADDRESS" placeholder="Enter Your Address Here..." required />
            </div>
            <div class="from-group">
                <label>City *</label>
                <input type="text" class="form-control" value="<?php echo $row['CITY'];?>" name="CITY" placeholder="Enter Your City" required/>
            </div>
            <div class="from-group">
                <label>Pincode *</label>
                <input type="text" class="form-control" value="<?php echo $row['PINCODE'];?>" name="PINCODE" placeholder="Enter Your Pincode" required/>
            </div>
            <div class="from-group">
                <label>State *</label>
                <input type="text" class="form-control" value="<?php echo $row['STATE'];?>" name="STATE" placeholder="Enter Your State" required/>
            </div>
            <div class="from-group">
                <label>Country *</label>
                <input type="text" class="form-control" value="<?php echo $row['COUNTRY'];?>" name="COUNTRY" placeholder="Enter Your Country" required/>
            </div>
            <br>
            <input type="submit" class="btn btn-success" value="Submit" name="SUBMIT">
        </form>
       
    </div>

   
    <br>
    
    <?php include("footer.php"); ?>

    <script src="jquery.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
</body>
</html>