<?php
         include 'connection.php';
         
         if (!isset($_SESSION)){
            session_start();
        }
        
 if(isset($_FILES ['image']) || isset($_POST['name']))
 {
    $name=  mysqli_real_escape_string($connection, $_POST['name']);
    $description=  mysqli_real_escape_string($connection, $_POST['description']);

    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];

    $upload_dir ='uploads/';
    $image_path =$upload_dir.$image_name;

    if (move_uploaded_file($image_tmp_name, $image_path)) {

   $query = "INSERT INTO projects (`name`,`description`,`image`)
     VALUES ( '$name' , '$description', '$image_path' )";
     
     if (mysqli_query($connection, $query)) {

    $res=mysqli_affected_rows($connection);
if($res == 1){
echo "<p>Product added successfully.</p>";
header("location:../index.php");}
else 
echo "<p>Error adding product: " . mysqli_error($connection) . "</p>";

     }
  }
}


 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
    <style>
        *{margin: 10px;}
        form{
            width: 100%;
            padding: 20px;
             margin: 20px;
             text-align: center;
            }
        
        form input,textarea { 
            width:30%;
        height: 50px;
       padding: 5px;
       margin: 5px;
       border-radius: 10px;}
      
     </style> </head>
 <body>
    <center>  <h2>Add Product</h2>  </center>
 <form method="post" enctype="multipart/form-data" > 
   
    <input type="text" name="name" placeholder="name" required><br>
    <input type="text" name="description" placeholder="description"required><br>
    <input type="file" name="image"required><br>

    <input type="submit" name="add" value="Add Product">
    
        </form>		

 </body>
 </html>
 