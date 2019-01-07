<?php
   session_start(); 
   $id = 0;
   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,'burgers');
   $name ='';
   $src='';
   $description='';
   $consistence='';
   $price=0;
   $update = false;
   if(isset($_POST['submit'])){
    $burger = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $consistence = $_POST['consistence'];
    $src = $_POST['src'];
    $sql = "INSERT INTO burgers(Name, Src, Description, Consistence, Price) VALUES('".$burger."','".$src."','".$description."','".$consistence."','".$price."')";
   if (mysqli_query($conn, $sql)) {
      $_SESSION['message'] = "Addition has been saved";
      header("location: project.php");
   } else {
   echo "Error: " . $sql . "" . mysqli_error($conn);}
   mysqli_close($conn);
   }
   if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM burgers WHERE id = $id";
    $result = mysqli_query($conn, $sql) or die($conn->error());
    $_SESSION['message'] = "Record has been deleted";
      header("location: project.php");
   }
   if (isset($_GET['edit'])) {
         $id = $_GET['edit'];
         $sql = "SELECT * FROM burgers WHERE id = $id";
         $result = mysqli_query($conn, $sql) or die($conn->error());
         if ($result->num_rows>0) {
          $row = $result->fetch_array();
          $name = $row['Name'];
          $src = $row['Src'];
          $description = $row['Description'];
          $consistence = $row['Consistence'];
          $price = $row['Price'];
          $update = true;
         }
   }
   if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $burger = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $consistence = $_POST['consistence'];
            $src = $_POST['src'];
            $sql = "UPDATE burgers SET Name = '$burger', Src = '$src',Price = '$price',Consistence = '$consistence' , Description = '$description' WHERE id = $id";
            $result = mysqli_query($conn, $sql) or die($conn->error());
            $_SESSION['message'] = 'update successfully has done';
            header('location: project.php');
          }
?> 