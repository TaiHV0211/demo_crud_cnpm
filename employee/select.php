<?php
    $sql = "SELECT * FROM employee INNER JOIN manager ON employee.Id_manager = manager.Id_manager";
    $query= mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELECT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body{
            text-align: center;
        }
        td{
            padding-top: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Manager</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name Employee</th>
                            <th>Image Employee</th>
                            <th>Email Employee</th>
                            <th>Phone Employee</th>
                            <th>Select Manager</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1 ;
                            while ($row = mysqli_fetch_assoc($query)) {?>
                                <tr class="table-info">
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $row['Name_employee']; ?></td>
                                    <td>
                                        <img style="width: 100px;" src="img/<?php echo $row['Image_employee']; ?>" alt="img">
                                    </td>
                                    <td><?php echo $row['Email_employee'] ;?></td>
                                    <td><?php echo $row['Phone_employee'] ;?></td>
                                    <td><?php echo $row['Name_manager'] ?></td>
                                    <td >
                                        <a style="min-width: 81px;" href="index.php?page_layout=update&Id_employee=<?php echo $row['Id_employee']?>" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <a onclick="return Delete('<?php  echo $row['Name_employee'];?>')" style="min-width: 81px;" href="index.php?page_layout=delete&Id_employee=<?php echo $row['Id_employee']?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
                <a href="index.php?page_layout=add" class="btn btn-info">Add Employee</a>
            </div>
        </div>
    </div>
    <script>
        function Delete(name){
            return confirm ("You sure remove member: " + name +" ?");
        }
    </script>
</body>
</html>
