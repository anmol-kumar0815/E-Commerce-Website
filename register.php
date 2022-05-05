<?php
include('admin/config.php');
if(isset($_POST['register']))  {

     $name = $_POST['NAME'];
     $email = $_POST['EMAIL'];
     $mobile = $_POST['MOBILE'];
     $password = $_POST['PASSWORD'];
     $repassword = $_POST['REPASSWORD'];
    //  address
    $address = $_POST['ADDRESS'];
    $city = $_POST['CITY'];
    $pincode = $_POST['PINCODE'];
    $state = $_POST['STATE'];
    $country = $_POST['COUNTRY'];
     
     if($password === $repassword)    {
            $sql = "SELECT * FROM normaluser WHERE EMAIL = '{$email}'";
            $result = mysqli_query($conn,$sql) or die("Select query not running");
            if(mysqli_num_rows($result)>0) {
              echo "<script type='text/javascript'>alert('Already have an account with this Email-Id');
                    window.location='register.php'</script>";
          } else {
                $sql1 = "INSERT INTO normaluser(NAME,EMAIL,PHONE,PASSWORD,ADDRESS,CITY,PINCODE,STATE,COUNTRY) VALUES('{$name}','{$email}','{$mobile}','{$password}','{$address}','{$city}','{$pincode}','{$state}','{$country}')";
                $result1 = mysqli_query($conn,$sql1) or die("Insert query not running");

                //creating tables for wishlist and cart
                $sql1 = "SELECT ID FROM normaluser WHERE EMAIL = '{$email}'";
                $result1 = mysqli_query($conn, $sql1) or die("Select ID query not running");
                $row2 = mysqli_fetch_assoc($result1);
                $id = $row2['ID'];
                //die($id);

                $tablename1 = "normaluser_wishlist_".$id; 
                $tablename2 = "normaluser_cart_".$id; 

                $sql1 = "CREATE TABLE $tablename1(ID int primary key auto_increment, PRODUCTCATEGORY varchar(400) not null, PRODUCTID int not null)";
                mysqli_query($conn, $sql1) or die("wishlist table creation failed");

                $sql1 = "CREATE TABLE $tablename2(ID int primary key auto_increment, PRODUCTCATEGORY varchar(400) not null, PRODUCTID int not null)";
                mysqli_query($conn, $sql1) or die("cart table creation failed");

                echo'<script type="text/javascript">alert("Account Created");
                     window.location="index.php"</script>';
             }
          
      } else {
          echo "<script>alert('Password does not mached');
                window.location='register.php'</script>";
       }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="admin/navbarcss.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="Bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
    <link rel="icon" href="images/logo.jpg">
  
 <style type="text/css">
   body { 
       margin: 0;
       padding: 0;
       /* background: linear-gradient(115deg, #9900cc 10%, #0c3 90%); */
       padding: 55px 20px 40px 20px;
    }
   .container {
          padding: 20px 20px;
          width: auto;
          max-width: 600px;
          height: auto;
          box-shadow: 0px 0px 13px rgba(0,0,0,0.9);
         }
    .container .text {
         background: -webkit-linear-gradient(right, #0c3, #9900cc, #56c5e4, #9f01ea);
         -webkit-background-clip: text;
         -webkit-text-fill-color: transparent;
     }
     .btn {
         
          left: -100%;
          padding: 10px 30px;
          transition: all 0.4s;
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
	  <?php 
          if(isset($_SESSION['EMAIL']))  {
      ?>
	  <li class="nav-item mobile">
	    <i class="fa fa-user fa-2x"></i>
	    <p class="text">Welcome <?php echo $_SESSION['NAME']; ?></p>
		<button class="btn btn-info" onclick="window.location.href='setting.php'">Settings</button>
		<button class="btn btn-danger" onclick="window.location.href='logout.php'">Logout</button>
	  </li>
	  <?php } ?>
	   
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
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item active" href="register.php">Register</a>
          <a class="dropdown-item" href="login.php">Login</a>
        </div>
       </li>	
    <?php } ?>

    <?php 
          if(isset($_SESSION['EMAIL']))  {
      ?>
	   <li class="nav-item dropdown computer">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <i class="fa d-flex fa-user fa-3x justify-content-center" aria-hidden="true"></i>
			<hr>
	        <p class="text">Welcome <?php echo $_SESSION['NAME']; ?></p>
			<hr>
		    <button class="btn btn-info" onclick="window.location.href='setting.php'">Settings</button>
		    <button class="btn btn-danger" onclick="window.location.href='logout.php'" style="float:right">Logout</button>
          </div>
       </li>	
	<?php } ?>	
      </ul>
  </div>
</nav>
<!--ending of navbar -->

  <div class="container bg-light" style="margin-top: 89px">
     <h2 class="text">Register Your Self</h2>
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
       <div class="form-group">
         <label>Name *</label>
         <input type="text" class="form-control" placeholder="Name" name="NAME" required>
       </div>
       <div class="form-group">
         <label>Email Address *</label>
         <input type="email" class="form-control" placeholder="Eg:abc@gmail.com" name="EMAIL" required>
       </div>
       <div class="form-group">
         <label>Mobile Number *</label>
         <input type="text" class="form-control" placeholder="Contact Number" name="MOBILE" required>
       </div>
       <div class="form-group">
         <label>Password *</label>
         <input type="password" class="form-control" placeholder="Min-6 Character" name="PASSWORD" required>
       </div>
       <div class="form-group">
         <label>Re-Password *</label>
         <input type="password" class="form-control" placeholder="Confirm Password" name="REPASSWORD" required>
       </div>
       <!-- address -->
       <div class="form-group">
         <label>Address *</label>
         <input type="text" class="form-control" placeholder="Full Address" name="ADDRESS" required>
       </div>
       <div class="form-group">
         <label>City *</label>
         <input type="text" class="form-control" placeholder="eg: New Delhi" name="CITY" required>
       </div>
       <div class="form-group">
         <label>Pincode *</label>
         <input type="text" class="form-control" placeholder="eg: 110003" name="PINCODE" required>
       </div>
       <div class="form-group">
         <label>State *</label>
         <input type="text" class="form-control" placeholder="eg: Delhi" name="STATE" required>
       </div>
       <div class="form-group">
         <label>Country *</label>
         <input type="text" class="form-control" placeholder="eg: India" name="COUNTRY" required>
       </div>
       
       

      
       <input type="submit" class="btn btn-success" value="Register" name="register">
	   <br>
     </form>
  </div>
  <br>
  
</body>
</html>
    