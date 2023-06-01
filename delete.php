<?php
    require_once "includes/db.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `tasks` where id=$id";
        $conn->query($sql);
    }
    header('location:index.php');
    exit;
?>