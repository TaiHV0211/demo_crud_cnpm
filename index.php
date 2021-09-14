<?php
    require_once "./connetion/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <?php
        if(isset($_GET['page_layout'])){
            switch ($_GET['page_layout']) {
                case 'select':
                    require_once './employee/select.php';
                    break;
                case 'add':
                    require_once './employee/add.php';
                    break;
                case 'update':
                    require_once './employee/update.php';
                    break;
                case 'delete':
                    require_once './employee/delete.php';
                    break;
                case 'hellworld':
                    require_once './bt3_hello.php';
                    break;            
                default:
                    require_once './employee/select.php';
                    break;
            }
        }else {
            require_once './employee/select.php'; 
        }
    ?>
</body>
</html>