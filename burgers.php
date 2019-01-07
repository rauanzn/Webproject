<?php 
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,'burgers');
   $id = $_GET['id'];
   $sql = "SELECT * FROM burgers WHERE id = '$id'";
   $result = mysqli_query($conn, $sql);
   $row = $result->fetch_array();
 ?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
    var slideIndex = 0;
showSlides();


function menuFunction() {
  var a = document.getElementById("all");
  if (a.className === "all") {
    a.className += " responsive";
  } else {
    a.className = "all";
  }
}
  </script>
	<link rel="stylesheet" type="text/css" href="burgers.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="index.js" defer></script>
	<title></title>
</head>
<body>
<div class="navbar">
	<img src="yy.jpg" class="badge">
	<div style="color: white;margin-left: 20px">«YUFRAME BURGER»<br>PLACE THE RIGHT BURGERS</div>
	<div class="all" id="all">
		<a href="index.php" class="without">HOME</a>
		<a href="about.html" class="without">ABOUT US</a>
		<a href="menu.php" class="without">MENU</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>

	</div>
</div>

<div class="burgers">
	<div class="burger">
		<img src="<?php echo $row['Src'] ?>">
		<div class="card">
			<div class='name'><?php echo $row['Name']; ?></div>
			<br><br>
			<div class="description"><?php echo $row['Description']; ?><br><?php echo $row['Consistence']  ;?></div>
			<br><br>
			<div class="price"><?php echo $row['Price'];?> tg</div>
		</div>
	</div>
</div>

<footer>
	<section>
		<div>
			<i class="fa fa-instagram" aria-hidden="true"></i>
			<a href="https://www.instagram.com/yuframe_burger/" style="color: white; text-decoration: none;">  @INSTAGRAM</a>
		</div>
		<div>
			<i class="fa fa-facebook" aria-hidden="true"></i>
			<a href="https://www.facebook.com/pg/yuframeburger/reviews/?referrer=page_recommendations_see_all" style="color: white;text-decoration: none;">  /FACEBOOK</a>
		</div>
	</section>
	<p style="margin-left: auto; margin-right: 20px">phones: +7 (727) 777 71 71, +7 708 222 24 22</p>
</footer>



</body>
</html>
