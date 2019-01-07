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
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<style type="text/css">
		body{
    margin: 0;
}
.navbar {
    display: flex;
    margin: 0;
    overflow: hidden;
    background-color: black;
    font-family: 'Comic Sans MS', 'Comic Sans', cursive;
    padding-right: 50px;
    padding-top: 12px;
    padding-bottom: 12px;
}
.navbar a:hover{
    background-color: #E74C3C;
}

.navbar .all a{
    font-size: 17px;
    color: white; 
    text-align: center;
    padding: 12px;
    text-decoration: none;
}
.all:last-child {
  margin-left: auto;
  display: flex;
}

.badge{
    margin-left: 50px; 
    width: 50px; 
    height: 50px;
}
.icon{
    display: none;
}
@media screen and (max-width: 600px) {
    body{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .navbar a{display: none;}
    .all .icon {
       float: right;
        display: block;
    }
    .all.responsive {
        position: relative; 
        display: inline-block;
        color: black; 
        background-color: #E74C3C;}
    .all.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
    }
  .all.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
.burgers{
    display: flex;
    justify-content: space-around;
    height: 500px;
    flex-wrap: wrap;
    
}
.burgers .burger:hover{
    border: 2px solid black;
}
.burgers .burger{
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 20em;
    padding: 5px;
}
.burgers .burger img{
    height: 50%;
    width: 100%;
}
.burgers .burger .description{
    position: relative;
    height: 50%;
    background-color: #212121;
    font-family: 'Pacifico',cursive;
    font-size: 30px;
    color:white;
    border-top: 1px solid #ffe57f;
}
.burgers .burger a{
    position: absolute;
    display: inline-block;
    color:white;
    bottom: 0;
}
footer{
    display: flex;
    flex: 1;
    background-color: black;
    right: 0;
    left: 0;
    bottom: 0;
    text-align: center;
    color: white;
    position: fixed;
    display: flex;
    font-family: 'Comic Sans MS', 'Comic Sans', cursive;
    padding: 10px;
    margin-top: 10px;
}
footer section div{
    padding: 15px;
}
footer section{
    display: flex;
    width: 30%;
    justify-content: center
}
footer div:hover{
    border: 1px solid white;
}
footer div{
    border: 1px solid black;
}
footer img{
    width: 40px;
    height: 40px
}

	</style>
	
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
		<a href="javascript:void(0);" class="icon" onclick="menuFunction()"><i class="fa fa-bars"></i></a>

	</div>
</div>

	<div class="burgers">
	<?php  while($row = mysqli_fetch_assoc($result)) {
		echo "<div class='burger'><img src='".$row['Src']."'><div class='description'><div class='name'>".$row['Name']."</div><div class='price'>".$row['Price']." TG</div><a href='burgers.php?id=".$row['id']."'>More</a></div></div>";
	}
	?>
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