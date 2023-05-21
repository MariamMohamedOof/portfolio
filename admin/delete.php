  
  <?php
include 'connection.php';
 
    $id=$_GET['id'];
    $query = "DELETE FROM projects WHERE `id`='$id'";

    if (mysqli_query($connection, $query)) {
        $res = mysqli_affected_rows($connection);
        if ($res == 1){
            echo "Product deleted successfully";
            header("location:../index.php");
        }else 
            echo  mysqli_error($connection);
    }

?>