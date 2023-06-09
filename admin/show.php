  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
    #projects .container {
	max-width:80%;
	margin: 0 auto;
	display: flex;
	flex-wrap: wrap ;
	justify-content: space-between;
	align-items: center;
}
.product {
	width:30%;
	height: 500px;
	margin: 10px;
	border: 2px solid gray;
	border-radius: 15px;
	box-shadow:5px 5px 10px 5px gray;
	padding: 20px;
	margin-bottom: 20px;
	overflow: hidden;
	
}
.product img{
	width: 300px;
	max-height: 300px;
	
}
 .product button{
	margin: 10px;
	padding: 10px;
	border-radius: 10px;
	border-color: gray;
	background-color: transparent;
	
}
.product a{
	text-decoration: none;
	color: black;
}
</style>
</head>
<body>
    
</body>
</html>
<section id="projects">
      <center>	  
		<h2>My Projects</h2>
 	</center>
	  <div class="container">

<?php 
		include './connection.php';
           
	// Retrieve products from database
			$query = "SELECT * FROM projects";

			$result = mysqli_query($connection, $query);

			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_array($result))
				 {
				?>
					<div class='product'>
					<h2> <?php echo $row['name'];?> </h2>
		   <center> <img src=" <?php echo $row['image'];  ?>" </center>
					<p> description: <?php echo $row['description']; ?></p>
					<button> <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></button>
					<button><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></button>
					</div>	
			<?php	
			}
		} 
            else {
				echo "<p>No products found.</p>";
			}
			?>

	</div>
  