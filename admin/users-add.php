<?php
include('config.php');
session_start();
if(!isset($_SESSION['USERNAME'])) {
     header('location: index.php');
  }
if(isset($_POST['ADD'])) {
       
       $name = $_POST['NAME'];
       $email = $_POST['EMAIL'];
       $mobile = $_POST['MOBILE'];
       $password = $_POST['PASSWORD'];
       
       $sql1 = "SELECT * FROM normaluser WHERE EMAIL = '{$email}'";
       $result = mysqli_query($conn,$sql1) or die("Select query not running");
       if(mysqli_num_rows($result)>0) {
          echo'<script type="text/javascript"> alert("An Account already exist with this Email-Id");
               window.location="users-add.php" </script>';
        } else {
       $sql = "INSERT INTO normaluser(NAME,EMAIL,PHONE,PASSWORD) values('{$name}','{$email}','{$mobile}','{$password}')";
       mysqli_query($conn, $sql) or die("Insert Query not running");
       header('location: users.php');
       }
 }
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Users</title>
    <link rel="icon" href="images/logo.jpg"> 
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="mycss/file.css">
    <link rel="stylesheet" type="text/css" href="navbarcss.css">
    <script src="myjquery/jqueryfirst.js" type="text/javascript"></script>
    <script src="myjquery/secondproper.js" type="text/javascript"></script>
    <script src="myjquery/thirdbootstrap.js" type="text/javascript"></script>
    
    <style type="text/css">
	 body {
		 padding:0;
		 margin:0;
             }
        .container {
                 margin-top:88px;
                 max-width: 600px;
                 width: auto;
                 height:auto;
                 padding: 15px 20px;
       
             }             
    </style>
</head>
 <body class="bg-light">
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
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="carousel.php">Carousel</a>
      </li>
	  <li class="nav-item">
	    <div class="input-group">
		  <div class="input-group-append">
		    <a class="nav-link product-inline" href="category.php">Category</a>
			  <a class="dropdown-toggle dropdown-toggle-split product-inline" data-toggle="dropdown"></a>
			    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<?php 
		    $sql = "SELECT * FROM allcategory";
			$result = mysqli_query($conn,$sql) or die('Allcategory query not running');
			if(mysqli_num_rows($result)>0) {
				while($row = mysqli_fetch_assoc($result)) {
				
		  ?>
		   <a class="dropdown-item" href="#"><?php echo $row['CATEGORYNAME']; ?></a>
			<?php } } else {?>
			    <a class="dropdown-item" href="category-add.php">Add Category</a> 
			<?php } ?>
		         
		  </div>
		</div>
	  </li>
		  
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="users.php">Users</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="feedback.php">Feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      </ul>
  </div>
</nav>
<!--ending of navbar -->

  <div class="container">
    <h1 style="color:#0c3">Add Users</h1>
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
       <div class="form-group">
          <label>Name *</label>
          <input type="text" class="form-control" name="NAME" placeholder="Name" required>
       </div>
       
       <div class="form-group">
          <label>Email-Address *</label>
          <input type="email" class="form-control" name="EMAIL" placeholder="Email" required>
       </div>
       
       <div class="form-group">
          <label>Mobile Number *</label>
          <input type="text" class="form-control" name="MOBILE" placeholder="Contact Number" required>
       </div>
       
       <div class="form-group">
          <label>Password *</label>
          <input type="password" class="form-control" name="PASSWORD" placeholder="Create Password" required>
       </div>

      
       <input type="submit" class="btn btn-success" value="Add" name="ADD">
     </form>
  </div>
</body>
</html>