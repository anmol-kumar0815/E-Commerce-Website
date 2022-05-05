<?php
include('admin/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="admin/navbarcss.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="Bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
    <link rel="icon" href="images/logo.jpg">
    
<style>
	  
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
}

.carousel-inner img {
  width:100%;
	height:70vh;
}
.container-fluid {
    margin-top: 88px; 
}
.card-img-top {
	height: 45vh;
	object-fit: contain;
}
.colorchange  {
		 color:black;
		 animation:myanimation 5s infinite;
	 }
@keyframes myanimation {
  0% {color: black;}
  25% {color:blue;}
  50% {color: #0c3;}
  75% {color:red;}
}
 @media (max-width: 992px) {
        .card-img-top {
			height: 30vh;
		}
		.card {
			margin-top: 25px;
		}
 
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
        <a class="nav-link active" href="about.php">About Us</a>
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

<div class="container-fluid">
 
     <div class="row">
      <?php
        $sql1 = "SELECT * FROM aboutpic";
        $result1 = mysqli_query($conn,$sql1) or die("about pic query not running");
	if(mysqli_num_rows($result1)>0)  {
		  while($row1 = mysqli_fetch_assoc($result1)) {
	?>
        <div class="col-md-6">
           <img src="admin/images/about/<?php echo $row1['IMAGE'];?>" class="d-block w-100">
        </div>
        <?php } }?>
        
        <div class="col-md-6">
           <h1 class="colorchange">Aggrawal's General Store</h1>
           <ol>
             <?php 
                 $sql2 = "SELECT * FROM aboutlist";
                 $result2 = mysqli_query($conn,$sql2) or die("team query not running");
	         if(mysqli_num_rows($result2)>0)  {
		      while($row2 = mysqli_fetch_assoc($result2)) {
	
             ?>
               <li style="padding: 5px 10px"><?php echo $row2['LIST'];?></li>
             <?php } }?>
           </ol>
        </div>
     </div> <!-- row div -->
      <br>
     <div class="row bg-light"">
       <?php
        $sql2 = "SELECT * FROM normaluser";
        $result2 = mysqli_query($conn,$sql2) or die("normaluser query not running");
	$customers = mysqli_num_rows($result2);  
	 
       ?>
         <div class="col-md-3 col-sm-3 col-6 text-center">
            <h1 style="color:#0c3"><?php echo $customers; ?></h1>
            <p><strong>customer's</strong></p>
         </div>
        <?php
        $sql3 = "SELECT * FROM aboutinfo";
        $result3 = mysqli_query($conn,$sql3) or die("aboutinfo query not running");
	if(mysqli_num_rows($result3)>0)  {
		  while($row3 = mysqli_fetch_assoc($result3)) {
	?>
         <div class="col-md-3 col-sm-3 col-6 text-center">
            <h1 style="color:#0c3"><?php echo $row3['VISITERS']. "+"; ?></h1>
            <p><strong>Visiters</strong></p>
         </div>
         <div class="col-md-3 col-sm-3 col-6 text-center">
            <h1 style="color:#0c3"><?php echo $row3['PRODUCTS']."+"; ?></h1>
            <p><strong>Products</strong></p>
         </div>
         <div class="col-md-3 col-sm-3 col-6 text-center">
            <h1 style="color:#0c3"><?php echo $row3['BRANDS']."+"; ?></h1>
            <p><strong>Brands</strong></p>
         </div>
     <?php } }?>
     </div> <!-- row div -->

  <br>
   
  
</div> <!-- container-fluid div-->
      <div class="container">
	<h1 class="colorchange">Our Team</h1>
	<div class="row">
	  <?php
      $sql = "SELECT * FROM team ORDER BY ID";
      $result = mysqli_query($conn,$sql) or die("select query not running");
	if(mysqli_num_rows($result)>0)  {
		  while($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
      <div class="card mx-auto">
       
         <img class="card-img-top" src="admin/images/about/team/<?php echo $row['IMAGE'];?>" alt="Card image">
    
       <div class="card-body">
         <h4 class="card-title" style="color: #0c3"><?php echo $row['TITLE'];?></h4>
         <p class="card-text text-muted"><i>
           <?php echo $row['DESCRIPTION']; ?>
         </i></p>
        
       </div> <!-- card body div -->
     </div>  <!-- card div -->
  </div>  <!-- col-md-3 div -->

  <?php } }?>
  </div>  <!-- row div -->
</div> <!-- container div -->
<br>

<?php include('footer.php'); ?>
</body>
</html>
