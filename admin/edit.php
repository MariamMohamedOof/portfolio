<?php
    include 'connection.php';
    $id = $_GET['id'];
    $sql = "select * from projects where `id` ='$id'";
    $res = mysqli_query($connection, $sql);
    $data = mysqli_fetch_array($res);

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];

        // Check if a new image was uploaded
        if (isset($_FILES['image'])) {
            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $upload_dir = 'uploads/';
            $image_path = $upload_dir . $image_name;

            if (move_uploaded_file($image_tmp_name, $image_path)) {
                $query = "UPDATE `projects` SET `image`='$image_path', `name`='$name',
                          `description`='$description'
                          WHERE `id`='$id'";
            }
         else {
            $query = "UPDATE `projects` SET `name`='$name',
             `description`='$description'
                       WHERE `id`='$id'";
        }

    }
        else {
            $query = "UPDATE `projects` SET `name`='$name',
             `description`='$description'
                       WHERE `id`='$id' ";
        }

        if (mysqli_query($connection,$query)) {

            $res = mysqli_affected_rows($connection);
            if ($res == 1) {
                echo "Product updated successfully";
                mysqli_close($connection);
                header("location:../index.php");
            } else {
                echo mysqli_error($connection);
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
    <title>edit</title>
    <style>
        * {
            margin: 10px;
        }

        form {
            width: 100%;
            padding: 20px;
            margin: 20px;
            text-align: center;
        }

        form input,
        textarea {
            width: 30%;
            height: 50px;
            padding: 5px;
            margin: 5px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <center>
        <h2>Update Product</h2>
    </center>
    <form method="post" enctype="multipart/form-data">

        <input type="text" name="name" placeholder="Name" value="<?php echo $data['name'] ?>"> <br>
        <input type="text" name="description" placeholder="Description" value="<?php echo $data['description'] ?>"><br>
<center> <img height="200px" width="200px" src="<?php echo $data['image'] ?>"></center>
        <input type="file" name="image"><br>

        <input type="submit" name="update" value="Update Product">

    </form>

</body>

</html>