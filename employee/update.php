<?php
    $Id_employee = $_GET['Id_employee'];
    $sql_manager = "SELECT * FROM manager";
    $query_manager = mysqli_query($conn , $sql_manager);

    $sql_up = "SELECT * FROM employee WHERE Id_employee = $Id_employee";
    $query_up = mysqli_query($conn, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);
    if(isset($_POST['Submit_Employee'])){
        $Name_employee = $_POST['Name_employee'];
        $Image_employee_tmp = $_FILES['image']['tmp_name'];

        if($_FILES['Image_employee']['name'] == ""){
            $Image_employee = $row_up['Image_employee'];
        }else{
            $Image_employee = $row_up['Image_employee'];
            // $Image_employee = $_FILES['Image_employee']['name'];
            // $Image_employee_tmp = $_FILES['Image_employee']['tmp_name'];
            // move_uploaded_file($Image_employee_tmp, 'img/'.$Image_employee);
        }
        $Email_employee = $_POST['Email_employee'];
        $Phone_employee = $_POST['Phone_employee'];
        $Id_manager = $_POST['Id_manager'];

        $sql = "UPDATE employee set 
        Name_employee ='$Name_employee',Image_employee ='$Image_employee',
        Email_employee= '$Email_employee',Phone_employee =$Phone_employee ,Id_manager = $Id_manager where Id_employee = $Id_employee    ";
            $query = mysqli_query($conn, $sql);
            header('location: index.php?page_layput=select');    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Upate Employee</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                <!-- Name -->
                    <div class="form-group">
                      <label for="">Name Employee</label>
                      <input type="text" name="Name_employee" id="Name_employee" class="form-control" 
                      required value="<?php echo $row_up['Name_employee']; ?>">
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                      <label for="">Image Employee</label> <br>
                      <input type="file" name="Image_employee" id="Image_employee" placeholder="" aria-describedby="helpId">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                      <label for="">Email Employee</label>
                      <input type="email" name="Email_employee" id="Email_employee" class="form-control" required value="<?php echo $row_up['Email_employee']; ?>">
                    </div>

                    <!-- Phone -->

                    <div class="form-group">
                      <label for="">Phone Employee</label>
                      <input type="number" name="Phone_employee" id="Phone_employee" class="form-control" required value="<?php echo $row_up['Phone_employee']; ?>">
                    </div>

                    <!-- select manager -->
                    <div class="form-group">
                      <label for="">Select Manager</label>
                      <select class="form-control" name="Id_manager" id="Id_manager">
                            <?php
                                while($row_manager = mysqli_fetch_assoc($query_manager)){?>
                                    <option value="<?php echo $row_manager['Id_manager'] ?>">
                                        <?php echo $row_manager['Name_manager'] ?>
                                    </option>
                                    
                                <?php } ?>
                      </select>
                    </div>
                    <button class="btn btn-primary" type="submit" name="Submit_Employee" id="Submit_Employee" >
                        Update Employee
                    </button>
                </form>
            </div>
          </div>
        </div>
    </div>
</body>
</html>