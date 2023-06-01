<?php 

require_once 'includes/db.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

   $sql = "INSERT INTO tasks (`name`, `lastname`, `email`) VALUES ('$name', '$lastname', '$email')";

 $query = mysqli_query($conn,$sql);
 if($query){
    header("Location:index.php");
    exit();
 }
}

?>