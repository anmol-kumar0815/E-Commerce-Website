<?php
include('config.php');
session_start();
if(!isset($_SESSION['USERNAME'])) {
     header('location: index.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
         .container-fluid {
                 margin-top: 90px;
                 padding-bottom: 50px;
         }
          table {
		 height:auto;
		 width:100%;
		 
	 }
	 th  {
		 padding:5px 0px;
		 text-align:center;
		 border: 1px black solid;
		 background-color:#0c3;
		 text-transform:uppercase;
	 }
	 tr {
		 text-align:center;
	 }
	 td {
		 border: 1px black solid;
                 padding: 5px 0px;
	 }
         .btn {
            float:right;
            margin-right: 10px;
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
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
        if($_SESSION['EMAIL'] == "anmolshrivastav.08@gmail.com"){
      ?>
      <li class="nav-item">
        <a class="nav-link active" href="Admin.php">Admins <span class="sr-only">(current)</span></a>
      </li>
      <?php } ?>
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
        <a class="nav-link" href="users.php">Users</a>
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
  <div class="container-fluid">
     <div class="row">
     <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <h1 style="color: #0c3">Admins Information</h1>
     </div>
     <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        <input type="button" onclick="window.location.href='admin-users-add.php'" class="btn btn-success" value="Add Users">
     </div>
   </div> <!-- row div -->
<table>
   <thead>
    <tr>
     <th>Id</th>
     <th>Name</th>
     <th>Email</th>
     <th>Password</th>
     <th>Delete</th>
    </tr>
   </thead>
   <tbody>
     <?php 
         $sql = "SELECT * FROM adminuser";
         $result = mysqli_query($conn,$sql) or die("Select query not running"); 
          if(mysqli_num_rows($result)>0) {
             while($row = mysqli_fetch_assoc($result)) {
                 if($row['EMAIL'] == "anmolshrivastav.08@gmail.com"){
                    continue;
                 }
     ?>
     <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['USERNAME']; ?></td>
        <td><?php echo $row['EMAIL']; ?></td>   
        <td><?php echo $row['PASSWORD']; ?></td>
        <td><a href="admin-users-delete.php?ID=<?php echo $row['ID'];?>">
        <i class="fa fa-trash-alt"></i></a></td>
     </tr>
      <?php } } ?>
   </tbody>
</table>
  </div>  <!--container fluid div -->
</body>
</html>