<?php 
	$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,'burgers');
   if(isset($_COOKIE["type"]))
	{
    header("location:project.php");
	}
   if (isset($_POST['login'])) {
         $login = $_POST['uname'];
         $password = $_POST['psw'];
         $sql = "SELECT * FROM login WHERE login = '$login' AND password = '$password'";
         $result = mysqli_query($conn, $sql);
         if ($result->num_rows>0) {
          $row = $result->fetch_array();
          setcookie("type",$row['id'],time()+3600);
          header('location: project.php');
         }
         else{
         	echo "<script type='text/javascript'>alert('you have error password or login');</script>";
         }
   }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<style>
	button:hover {
  		opacity: 0.8;
	}
	.container{
		display: flex;
		flex-direction: column;
		background-color: black;
		width: 30%;
		padding: 50px;
		padding-right: 5%;
		padding-left: 5%;
		margin: 0px auto;
		margin-top: 100px;
		font-family: 'Comic Sans MS', 'Comic Sans', cursive;
		font-size: 20px;
	}
	input[type='submit']{
		font-family: 'Comic Sans MS', 'Comic Sans', cursive;
		width: 30%;
		margin: 0px auto;
		font-size: 20px;
    
	}
	.username, .password{
		color: white;
	}
	.avatar{
		width: 100%
	}
	.imgcontainer{
		margin: 0px auto;
		width: 20%
	}
	.enter_username, .enter_password{
		font-family: 'Comic Sans MS', 'Comic Sans', cursive;
		font-size: 20px;
	}

	</style>
</head>
<body>
	<form action="" method="POST">
	<div class="container">
		<div class="imgcontainer"><img src="yy.jpg" class="avatar"></div>
		
	    <label class="username"><b>Username</b></label>
	    <input type="text" placeholder="Enter Username" name="uname" class="enter_username" required>
	    <br>
	    <label class="password"><b>Password</b></label>
	    <input type="password" placeholder="Enter Password" name="psw" class="enter_password" required>
	    <br>    
	    <input type="submit" name = "login">Login</input>
  </div>
</form>

</body>
</html>