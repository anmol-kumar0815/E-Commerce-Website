<?php
include('admin/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="customCss/index.css">
    <link rel="stylesheet" type="text/css" href="admin/navbarcss.css">
    <link rel="icon" href="images/logo.jpg">

    <style type="text/css">
      .fa-user{
        color: black;
      }
      .product-image{
        object-fit: contain;
      }
      p.text{
        margin: 0;
      }
      .heading{
        padding-top: 15px;
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
        <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
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

  <!-- carousel starting -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  <?php
  $sql = "SELECT * FROM carousel"; 
  $result = mysqli_query($conn,$sql);
  $i = 0;
  while($row = mysqli_fetch_assoc($result)) {
	 
	  if($i ==0) {
		  $actives = 'active';
	  }else {
		  $actives = '';
	  }
	   
  ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" 
    class="<?php echo $actives; ?>"></li>
   <?php	   
 $i++; 
  } ?>
  </ol>
  <div class="carousel-inner" style="margin-top: 89px">
  <?php 
   $i = 0;
  foreach($result as $row) {
	  if($i ==0) {
		  $actives = 'active';
	  } else  {
		  $actives = '';
	  }
   ?>
    <div class="carousel-item <?php echo $actives; ?>">
      <img class="d-block w-100" src="admin/images/carousel/<?php echo $row['IMAGE'];?>">
    </div>
  <?php
		
   $i++;
   } 
   ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" 
  data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" 
  data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <!-- carousel ending -->
  <br>

<!-- Product card starts here -->
 <div id="product-box" class="container">

 </div> <!-- container div -->
 
<!-- card ends here -->
<br>

 <?php include('footer.php');?> 
 
 
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="Bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

  <script type="text/javascript">
    $(document).ready(function(){
        function loadAllProduct(){
          let productBox = $("#product-box");
          //console.log("Hello");
          $.ajax({
            url: "ajax/index/loadProductCard.php",
            type: "POST",
            success: function(data){
              //console.log(data);
              productBox.html(data);
            }
          });
        }
        loadAllProduct();

        $(document).on("click", ".pagination-btn", function(e){
            let productCategoryId = $(this).data('id');
            let paginationPageNo = e.currentTarget.innerText;

            if(paginationPageNo === "See All"){
              //do nothing because it will redirect to another page no need to do pagination
            }else{
              console.log(productCategoryId);
              console.log(paginationPageNo);
              $.ajax({
                url: "ajax/index/loadPaginationCard.php",
                type: "GET",
                data: {product_Category_Id: productCategoryId, pagination_Number: paginationPageNo},
                success: function(data){
                    $("#"+productCategoryId+"-OneProductRow").html(data);
                }
              });
            }
        });
    });
  </script>

  </body>
</html>
