<?php 
    $id = $_GET['Id_employee'];
    $sql = "DELETE FROM employee where Id_employee = $id";
    $query = mysqli_query($conn,$sql);
    header('location: index.php?page_layout=select');
?>