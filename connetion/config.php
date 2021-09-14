<?php
    $conn = mysqli_connect('localhost','root','','cnpm_crud_employee');
    if($conn){
        mysqli_query($conn,"SET NAMES 'UTF8'");
    }else{
        echo "connet errow";
    }
?>