<?php
include('admin/config.php');
session_start();
$categoryname=strtolower($_GET['CATEGORYNAME']);
$id=$_GET['ID'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo strtoupper(str_replace("_"," ", $categoryname)); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css"> 
    <link rel="stylesheet" type="text/css" href="admin/navbarcss.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">  
    <link rel="icon" href="images/logo.jpg">
    
<style>
	  
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
}
.container {
	margin-top: 90px;
}
.productname {
	font-size: 25px;
	font-weight: 450;
}
.product-image{
	object-fit: contain;
}
.card-image {
	max-height: 400px;
}
.text {
	background: -webkit-linear-gradient(right, #0c3, #9900cc, #56c5e4, #9f01ea);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
	text-transform: uppercase;
}
table {
	width: 100%;
}

tr {
	border: 2px solid #0c3;
	text-align: center;
	font-size: 20px;
}
th {
	padding: 15px;
}
td {
	padding: 20px;
	text-align: center;
}
.btn {
	font-size: 20px;
	font-weight: 500;
}
.btn:hover {
	font-size: 25px;
	font-weight: 500;
}
#addtocardbtn{
	color: white;
}
.payment {
	display: inline-block;
}
.price {
	color: #0c3;
	font-size: 33px;
}
.discount {
	text-decoration: line-through;
	font-size: 18px;
}
#error-message{
	background-color: #EFDCDD;
	color: red;
	padding: 10px;
	margin: 10px;
	display: none;
	position: absolute;
	right: 15px;
	top: 100px;
	z-index: 999;
}
#success-message{
	background-color: #DEF1D8;
	color: green;
	padding: 10px;
	margin: 10px;
	display: none;
	position: absolute;
	right: 15px;
	top: 100px;
	z-index: 999;
}
#stock-mgs-box{
	display: none;
}
@media (max-width: 992px) {
	#card-name {
	    order: 1;
    }
	#card-image {
		order: 2;
	}
	#after-card {
		order: 3;
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
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
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

<!-- card starts here -->
 <div class="container">

    <div id="error-message"></div>
	<div id="success-message"></div>

    <div class="row">
      <?php 
          $sql = "SELECT * FROM $categoryname WHERE ID={$id}";
	      $result = mysqli_query($conn,$sql) or die("categoryname select query not running");
	      if(mysqli_num_rows($result)>0) {
		     $row = mysqli_fetch_assoc($result); 		
     ?>
     <div id="card-name" class="col-lg-12 col-md-12 col-sm-12 col-12">
	    <p class="productname"><?php echo $row['TITLE'];?></p>
		
	 </div>

	<div id="stock-mgs-box" class="col-lg-12 col-md-12 col-sm-12 col-12">
		<marquee behavior="alternate" direction="right" scrollamount="5" style="color: red;"></marquee>
	</div>
	 
	 <div id="after-card" class="col-lg-6 col-md-6 col-sm-6 col-12">
	    <table class="table table-light table-hover">
		  <thead>
		     <tr>
			    <h3 style="color:#0c3">Description</h3>
			 </tr>
		  </thead>
		  <tbody>
		  <?php 
          $sql1 = "SELECT * FROM $categoryname WHERE ID={$id}";
	      $result1 = mysqli_query($conn,$sql1) or die("categoryname second select query not running");
	      if(mysqli_num_rows($result1)>0) {
		    while($row1 = mysqli_fetch_assoc($result1)) { 				
          ?>
		     <tr>
			   <td>Color</td>
			   <td style="color:#0c3">-</td>
			   <td><?php echo $row1['COLOR'];?></td>
			 </tr>
			 <tr>
			   <td>Net. Quantity</td>
			   <td style="color:#0c3">-</td>
			   <td><?php echo $row1['QUANTITY'];?></td>
			 </tr>
			 <tr>
			   <td>Brand</td>
			   <td style="color:#0c3">-</td>
			   <td><?php echo $row1['BRAND'];?></td>
			 </tr>
			 <tr>
			   <td>Delivery Charge</td>
			   <td style="color:#0c3">-</td>
			   <td>&#8377;<?php echo $row1['DELIVERY'];?></td>
			 </tr>
			 <tr>
			   <td>Returnable</td>
			   <td style="color:#0c3">-</td>
			   <td><?php echo $row1['RETURNABLE'];?></td>
			 </tr>
		  </tbody>
		</table>
		  <?php } } ?>
		<br>
		<div align="center">
		<p class="payment price">&#8377;<?php echo $row['PRICE'];?>/-</p>
		<p class="payment discount"><?php echo $row['DISCOUNT'];?></p>
		</div>
	 </div>
	 <div id="card-image" class="col-lg-6 col-md-6 col-sm-6 col-12">
	    <img class="img-fluid card-image product-image" src="admin/images/product/<?php echo $row['IMAGE'];?>">
	 </div>
	 
	  <?php } ?>
	 </div> <!-- row div -->
	<div align="center" style="padding-top: 35px;">
	<a href="#" class="btn btn-success" id="addtowishlistbtn">Add To Wishlist</a>
	<a id="buy-now-btn" href="payment.php?CATEGORY=<?php echo $categoryname;?>&ID=<?php echo $id;?>" class="btn btn-success">Buy Now!!</a>
	<a href="#" class="btn btn-success" id="addtocardbtn">Add To Cart</a>
    </div>
 </div> <!-- container div -->
<br>
  
 <?php include('footer.php');?>  


<script src="js/jquery.js" type="text/javascript"></script>
<script src="Bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script> 
<script type="text/javascript">
	$(document).ready(function(){
		let url = window.location.href;
		let categoryName = url.substring(url.indexOf('=')+1, url.indexOf('&'));
		let productId = url.substring(url.indexOf('&')+4, url.charAt(url.length-1) == '#' ? url.length-1 : url.length);
		let addtocardbtn = $("#addtocardbtn");
		let addtowishlistbtn = $("#addtowishlistbtn");

		addtocardbtn.on("click", function(){
			$.ajax({
				url: "ajax/checkSession.php",
				type: "GET",
				success: function(data){
					if(data === "false"){
						$("#error-message").html("Login Required").slideDown();
						setTimeout(() => {
							$("#error-message").slideUp();
						}, 3000);
					}else{
						let url = window.location.href;
						let categoryName = url.substring(url.indexOf('=')+1, url.indexOf('&'));
						let productId = url.substring(url.indexOf('&')+4, url.charAt(url.length-1) == '#' ? url.length-1 : url.length);
						// console.log(categoryName);
						// console.log(productId);

						$.ajax({
							url: "ajax/addtocart.php",
							type: "POST",
							data: {categoryName: categoryName, productId: productId},
							success: function(data){
								$("#success-message").html(data).slideDown();
								setTimeout(() => {
									$("#success-message").slideUp();
								}, 3000);
							} 
						});
					}
				}
			});
		});

		addtowishlistbtn.on("click", function(){
			// console.log(categoryName);
			// console.log(productId);
			$.ajax({
				url: "ajax/checkSession.php",
				type: "GET",
				success: function(data){
					if(data === "false"){
						$("#error-message").html("Login Required").slideDown();
						setTimeout(()=>{
							$("#error-message").slideUp();
						}, 3000);
					}else{
						$.ajax({
							url: "ajax/addtowishlist.php",
							type: "POST",
							data: {categoryName: categoryName, productId: productId},
							success: function(data){
								$("#success-message").html("Added Successfully.").slideDown();
								setTimeout(() => {
									$("#success-message").slideUp();
								}, 3000);
							} 
						});
					}
				}
			});
		});

		let stockMgsBox = $("#stock-mgs-box");
		let buyNowBtn = $("#buy-now-btn");
		setInterval(() => {
			$.ajax({
				url: "ajax/stockMgs.php",
				type: "POST",
				data: {categoryName: categoryName, productId: productId},
				success: function(data){
					// console.log(data);
					if(data > 0 && data < 10){
						// console.log(data);
						stockMgsBox.css("display", "block");
						$("#stock-mgs-box marquee").html("Hurry Up Only "+data+" Left");
						buyNowBtn.css("display", "inline-block");
					}else if(data == 0){
						// console.log(data);
						stockMgsBox.css("display", "block");
						buyNowBtn.css("display", "none");
						$("#stock-mgs-box marquee").html("Sorry Currently Out of Stock Check After Some Time");
					}else{
						buyNowBtn.css("display", "inline-block");
						stockMgsBox.css("display", "none");
					}
				}
			});
		}, 500);

		// console.log("Hy");
	});
</script>

  </body>
</html>
