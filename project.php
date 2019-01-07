<!DOCTYPE html>
<html>
<head>
	<script>
	function validsettings()                                    
{ 
    var name = document.forms['menumaker']["name"];               
    var description = document.forms['menumaker']["description"];    
    var consistence =  document.forms['menumaker']["consistence"];  
    var src = document.forms['menumaker']["src"];  
   
    if (name.value == "")                                  
    { 
        window.alert("Please enter burger's name."); 
        return false; 
    } 
    if (price.value == "")                               
    { 
        window.alert("Please enter price."); 
        return false; 
    } 
       
    if (description.value == "")                                   
    { 
        window.alert("Please enter description address."); 
        return false; 
    } 
   
    if (consistence.value == "")                           
    { 
        window.alert("Please enter consistence."); 
        return false; 
    } 
   
    if (src.value == "")                        
    { 
        window.alert("Please enter path to image"); 
        return false; 
    } 
    return true; 
}</script> 
	<style>
	
	.logout a{
	right: 0;
	background-color:green;
	padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;		
	}
	@media screen and (max-width: 600px) {
		input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
	a{
		display: inline-block;
		margin: 10px; 
	}
	a:link, a:visited {
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
input[type=submit] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
}
	input[type=text], textarea {
  font-size: 16px;		
  width: 100%;
  padding-top: 12px;
  padding-bottom: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
	<div class="logout"><a href="logout.php">Logout</a></div>
	<?php require_once 'operation.php'; 
	?>
	<?php 
	if (isset($_SESSION['message'])) {
			echo "<script type='text/javascript'>alert('".$_SESSION['message']."');</script>";
			unset($_SESSION['message']);
		}
		 ?>

	<?php 
	if(!isset($_COOKIE["type"]))
{
 header("location:admin.php");
}
else{
		$dbhost = 'localhost:3306';
   		$dbuser = 'root';
   		$dbpass = '';
   		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'burgers');
   		$sql = "SELECT * FROM burgers";
   		$result = mysqli_query($conn, $sql);
   		?>
   		<div class="row">
   			<table class="table">
   				<thead>
					<tr>
						<th>Name of Burger</th>
						<th>Path for image</th>
						<th>Description</th>
						<th>Consistence</th>
						<th>Price</th>
						<th colspan="2">Settings</th>
					</tr>	
   				</thead>
   				<?php 
   					while ($row = $result->fetch_assoc()) {
   						echo "<tr>";
   						echo "<td>".$row['Name']."</td>";
   						echo "<td>".$row['Src']."</td>";
   						echo "<td>".$row['Description']."</td>";
   						echo "<td>".$row['Consistence']."</td>";
   						echo "<td>".$row['Price']."</td>";
   						echo "<td>";
   						echo "<a href='project.php?edit=".$row['id']."' style = 'background-color: blue;'>Edit</a>";
   						echo "<a href='operation.php?delete=".$row['id']."' style = 'background-color: red;'>Delete</a>";
   						echo "</td>";
   						echo "</tr>";
   					}
   				 ?>

   			</table>
   		</div>
<form action="operation.php" method="POST" onsubmit="return validsettings()" name="menumaker">
       <div id="data">
       		<input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Name of Dish</label>
            <input type="text" name="name" value="<?php echo $name ?>" placeholder = "enter the name of the dish"><br>
            <label>Description</label>
            <textarea id = "description" name="description" placeholder = "enter description" style="height: 200px;"><?php echo $description ?></textarea>
            <br>
            <label>Price</label>
            <input type="number" name="price" placeholder = "enter price"><br>
            <label>Consistence</label>
            <textarea id = "consistence" name="consistence" placeholder = "enter consistence" style="height: 200px;"><?php echo $consistence ?></textarea>
            <br>
            <label>Src</label>
            <input type="text" name="src" value="<?php echo $src ?>" placeholder = "enter path"><br>
        </div>
			 <?php 
	        		if ($update == true) {
	        			echo "<input type='submit' value='update' name='update' style = 'background-color:blue'>";

	        		}
	        		else{
	        			echo "<input type='submit' value='submit' name='submit'>";
	        		}}
	        	 ?>
     </form>
</body>
</html>