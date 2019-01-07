<?php 
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,'burgers');
   $sql = "SELECT * FROM burgers";
   $result = mysqli_query($conn, $sql);
 ?>
 <!DOCTYPE html>

<html>
<script type="text/javascript">
	var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000);  
}

function menuFunction() {
  var a = document.getElementById("all");
  if (a.className === "all") {
    a.className += " responsive";
  } else {
    a.className = "all";
  }
}
</script>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="index.js" defer></script>

</head>
<body>

<div class="navbar">
	<img src="yy.jpg" class="badge">
	<div style="color: white;margin-left: 20px">«YUFRAME BURGER»<br>PLACE THE RIGHT BURGERS</div>
	<div class="all" id="all">
		<a href="index.php" class="without">HOME</a>
		<a href="about.html" class="without">ABOUT US</a>
		<a href="menu.php" class="without">MENU</a>
		<a href="javascript:void(0);" class="icon" onclick="menuFunction()"><i class="fa fa-bars"></i></a>

	</div>
</div>
<video  autoplay muted loop id="myVideo">
  <source src="video.mp4" type="video/mp4" style="width: 50%;">
</video>

<div class="burgers">
	<?php  
	$i=0;
	while($row = mysqli_fetch_assoc($result)) {
		if ($i<4) {
			echo "<div class='burger'><img src='".$row['Src']."'><div class='description'><div class='name'>".$row['Name']."</div><div class='price'>".$row['Price']." TG<br><br><br></div><a href='burgers.php?id=".$row['id']."'>More</a></div></div>";
		}
		else{
			break;
		}
		$i++;
	}?>
</div>

<div class="slideshow-container">

<div class="mySlides fade">
  <img src="mafia.jpg">
</div>

<div class="mySlides fade">
  <img src="nochobzhorstva.jpg">
</div>

<div class="mySlides fade">
  <img src="hotdogwar.jpg">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>


<div class="div">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.9603596644133!2d76.93183641572413!3d43.25225258628198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38836eb8e7797151%3A0x4d2eb672c6bf8a35!2sYuframe+Burger!5e0!3m2!1sen!2skz!4v1545049106591" allowfullscreen></iframe>
	<div>
		<button class="gps">BOGENBAY BATYR 150</button>
		<button class="gps">SC "GLOBUS"</button>
		<button class="gps">SEC "ADK"</button>
		<button class="gps">PANFILOVA 92</button>
		<button class="gps">ZHETISU-1, 54</button>
		<button class="gps">SEC "DOSTYK PLAZA"</button>
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
	<p style="margin-left: auto; margin-right: 20px">phones: +7 (727) 777 71 71<br> +7 708 222 24 22</p>
</footer>

</body>
</html>
