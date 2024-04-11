<?php include_once("main.php"); ?>



<?php
//These values are for the connection to the SQL server
$server_name = "localhost";
$username = "select";
$password = "-@OYhU9y6k*htzhQ";

//Establishing a new connection to the server
$conn = new mysqli($server_name, $username, $password);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['edit'])) {
    $userid = $_POST['edit'];
    $stmt = $conn->prepare("SELECT * from mati.user where User_id = ? ");
    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $userid = htmlspecialchars($row['User_id']);
        $firstname = htmlspecialchars($row['First_name']);
        $lastname = htmlspecialchars($row['Last_name']);
        $email = htmlspecialchars($row['Email']);
        $password = htmlspecialchars($row['Password']);
        $usertype = htmlspecialchars($row['User_type']);


    }
}





?>


<div class=" p-5 m-4">

    <h1>Edit User</h1>
    <hr>
    <?php include_once("main.php"); ?>

    <?php
    // These values are for the connection to the SQL server
    $server_name = "localhost";
    $username = "update";
    $password = "jLBaXC]sLJtr_XzZ";
    $database = "mati"; // Assuming database name

    // Establishing a new connection to the server
    $conn3 = new mysqli($server_name, $username, $password, $database);

    // Check connection
    if ($conn3->connect_error) {
        die("Connection failed: " . $conn3->connect_error);
    }

    if (isset($_POST['update'])) {
        $id = $_POST['update'];
        $uname = $_POST['first_name'];
        echo $uname;
        $lastname = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $uertype = $_POST['User_type'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Prepare and bind the update statement
        $stmt = $conn3->prepare('UPDATE user SET First_name = ?, Last_name = ?, Email = ?,Password = ?, User_type = ? WHERE User_id = ?');
        $stmt->bind_param("ssssss", $uname, $lastname, $email,$hashed_password,$uertype, $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">User Updated! <a type="button" href="#" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close">X</a></div>';


        } else {
            echo '<div class="alert alert-warning" role="alert">Invalid Information! <a type="button" href="#" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close">X</a></div>';
        }

        // Close statement
        $stmt->close();
    }



    // Close connection
    $conn3->close();
    ?>
    <?php
    // These values are for the connection to the SQL server
    $server_name = "localhost";
    $username = "delete";
    $password = "n8otmHU(oC6r2qRV";
    $database = "mati";

    // Establishing a new connection to the server
    $conn = new mysqli($server_name, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the delete button is clicked
    if (isset($_POST['delete'])) {
        // Get the Task_id from the POST data
        $tid = $_POST['delete'];

        // Prepare and bind the delete statement
        $stmt = $conn->prepare('DELETE FROM user WHERE User_id = ?');
        if ($stmt === false) {
            die('Error preparing statement: ' . $conn->error);
        }
        $stmt->bind_param("s", $tid);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">User Deleted! <a type="button" href="#" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></a></div>';
            $url = $_SERVER['REQUEST_URI'];
            header("refresh:2; URL=$url");
        } else {
            echo '<div class="alert alert-warning" role="alert">Error! Could not delete user! <a type="button" href="#" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close">X</a></div>';
        }

        // Close statement
        $stmt->close();
    }
    ?>


    <div class="row p-2">
        <div class="row">
            <form action="" method="post" class="row">
                <div class="col-md-2">
                    <label for="formGroupExampleInput" class="form-label">First name:</label>
                    <input type="text" name="first_name" id="first_name" required value="<?php if(isset($_POST['edit'])){ echo $firstname; } else { } ?>">
                </div>
                <div class="col-md-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" required value="<?php if(isset($_POST['edit'])){ echo $lastname; } else { } ?>">

                </div>
                <div class="col-md-2">
                    <label for="dueDate" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" required value="<?php if(isset($_POST['edit'])){ echo $email; } else { } ?>">
                </div>
                <div class="col-md-2">
                    <label for="dueDate" class="form-label">Confirm Email:</label>
                    <input type="email" name="email_confirm" id="email_confirm" required value="<?= $inputs['email_confirm'] ?? '' ?>">
                </div>
                <div class="col-md-2 input-group mb-3">

                    <label for="dueDate" class="form-label">Password:</label>

                    <input type="password" id="password" name="password" >
                    <span type="button" id="showPasswordBtn" class="input-group-text bp-3" onclick="togglePasswordVisibility()">Show Password</span>



                </div>
                <div class="col-md-2">
                    <label for="priority" class="form-label">User Type:</label>
                    <select class="form-select" aria-label="Default select example" name="User_type">
                        <option selected>Select User Type</option>

                        <option <?php if(isset($_POST['edit'])){ if ($usertype == 'Admin'){echo 'selected';}  } ?> >Admin</option>
                        <option <?php if(isset($_POST['edit'])){ if ($usertype == 'User'){echo 'selected';}  } ?>>User</option>

                    </select>
                </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-1">
                    <label for="submit" class="form-label text-white">Action</label>
                    <button type="submit" class="btn btn-warning" name="update" value="<?php echo $taskid ?>">update</button>
                </div>
                <div class="col-md-1">
                    <label for="submit" class="form-label text-white">Action</label>
                    <button type="submit" class="btn btn-danger" name="delete" value="<?php echo $taskid ?>">Delete</button>
                </div>
            </div>


        </form>
    </div>
</div>




    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var passwordBtn = document.getElementById("showPasswordBtn");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordBtn.textContent = "Hide Password";
            } else {
                passwordField.type = "password";
                passwordBtn.textContent = "Show Password";
            }
        }
    </script>
