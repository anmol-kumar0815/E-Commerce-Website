<?php
include('admin/config.php');
session_start();
if(isset($_POST['send']))  {

     $name = $_POST['NAME'];
     $email = $_POST['EMAIL'];
     $mobile = $_POST['MOBILE'];
     $message = $_POST['MESSAGE'];
     
     $sql = "INSERT INTO feedback(NAME,EMAIL,PHONE,MESSAGE) values('{$name}','{$email}','{$mobile}','{$message}')";
	 $result = mysqli_query($conn,$sql) or die("INSERT query not running");
	 echo'<script type="text/javascript">alert("Your Feedback is Submitted");
	      window.location="feedback.php"</script>';
     
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>
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
       //background: linear-gradient(115deg, #9900cc 10%, #0c3 90%);
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
     form .btn {
         
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
        <a class="nav-link active" href="feedback.php">Feedback</a>
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
  <div class="container bg-light" style="margin-top: 89px">
     <h2 class="text">Contact Us</h2>
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
       
      <p>Message *</p>
      <div class="form-group">
       <textarea rows="5" class="form-control" name="MESSAGE" placeholder="Enter Your Message Here ...."></textarea>
      </div>
      
       <input type="submit" class="btn btn-success" value="Send" name="send">
     </form>
  </div>
</body>
</html>
    