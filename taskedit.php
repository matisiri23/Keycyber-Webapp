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
        $taskid = $_POST['edit'];
        $stmt = $conn->prepare("SELECT * from mati.tasks where Task_id = ? ");
        $stmt->bind_param("s", $taskid);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $taskid = htmlspecialchars($row['Task_id']);
            $taskname = htmlspecialchars($row['Task_name']);
            $Description = htmlspecialchars($row['Description']);
            $tdate = htmlspecialchars($row['taskdate']);
            $Duedate = htmlspecialchars($row['Due_date']);
            $Priority = htmlspecialchars($row['Priority']);
            $Status = htmlspecialchars($row['Status']);
            $assigned_by = htmlspecialchars($row['assigned_by']);
        }
    }





    ?>


<div class="container p-5 m-4">

    <h1>Add Task</h1>
    <hr>
    <?php include_once("main.php"); ?>

    <?php
    // These values are for the connection to the SQL server
    $server_name = "localhost";
    $username = "update";
    $password = "jLBaXC]sLJtr_XzZ";
    $database = "mati"; // Assuming database name

    // Establishing a new connection to the server
    $conn = new mysqli($server_name, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['update'])) {
        $id = $_POST['update'];
        $tname = $_POST['task_name'];
        $description = $_POST['description'];
        $duedate = $_POST['due_date'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $assignedby = $_POST['assigned'];

        // Prepare and bind the update statement
        $stmt = $conn->prepare('UPDATE tasks SET Task_name = ?, Description = ?, Due_date = ?, Priority = ?, Status = ?, assigned_by = ? WHERE Task_id = ?');
        $stmt->bind_param("ssssssi", $tname, $description, $duedate, $priority, $status, $assignedby, $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">Task Updated! <a type="button" href="#" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close">X</a></div>';


        } else {
            echo '<div class="alert alert-warning" role="alert">Invalid Information! <a type="button" href="#" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close">X</a></div>';
        }

        // Close statement
        $stmt->close();
    }



    // Close connection
    $conn->close();
    ?>
    <?php
    // These values are for the connection to the SQL server
    $server_name = "localhost";
    $username = "delete";
    $password = "n8otmHU(oC6r2qRV";
    $database = "mati"; // Assuming database name

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
        $stmt = $conn->prepare('DELETE FROM tasks WHERE Task_id = ?');
        if ($stmt === false) {
            die('Error preparing statement: ' . $conn->error);
        }
        $stmt->bind_param("s", $tid);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">Task Deleted! <a type="button" href="#" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></a></div>';
           $url = $_SERVER['REQUEST_URI'];
            header("refresh:2; URL=$url");
        } else {
            echo '<div class="alert alert-warning" role="alert">Error deleting task! <a type="button" href="#" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close">X</a></div>';
        }

        // Close statement
        $stmt->close();
    }
    ?>


    <div class="row p-2">
        <form action="" method="post" >
            <div class="row">
                <div class="col-6">
                    <label for="formGroupExampleInput" class="form-label">Task name:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="task_name" value="<?php if(isset($_POST['edit'])){ echo $taskname; } else { } ?>" >
                </div>
                <div class="col-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="description"><?php if(isset($_POST['edit'])){ echo $Description; } ?></textarea>
                </div>
                <div class="col-3">
                    <label for="dueDate" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="dueDate" name="due_date" value="<?php if(isset($_POST['edit'])){ echo $Duedate; } ?>">
                </div>
                <div class="col-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select onchange="priority()" class="form-control " id="priority" name="priority">
                        <option selected>Select one</option>
                        <option style="background-color: red" <?php if(isset($_POST['edit'])){ if ($Priority == 'High'){echo 'selected';}  } ?> >High</option>
                        <option style="background-color: yellow" <?php if(isset($_POST['edit'])){ if ($Priority == 'Medium'){echo 'selected';}  } ?>  >Medium</option>
                        <option style="background-color: green" <?php if(isset($_POST['edit'])){ if ($Priority == 'Low'){echo 'selected';}  } ?>  >Low</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option <?php if(isset($_POST['edit'])){ if ($Status == 'Not Started'){echo 'selected';}  } ?> >Not Started</option>
                        <option <?php if(isset($_POST['edit'])){ if ($Status == 'In Progress'){echo 'selected';}  } ?>>In Progress</option>
                        <option <?php if(isset($_POST['edit'])){ if ($Status == 'Completed'){echo 'selected';}  } ?>>Completed</option>
                        <option <?php if(isset($_POST['edit'])){ if ($Status == 'Stuck'){echo 'selected';}  } ?>>Stuck</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="status" class="form-label">Assigned by</label>
                    <select class="form-control" id="status" name="assigned">
                        <option value="">Select User</option>
                        <?php
                        session_start();
                        //These values are for the connection to the SQL server
                        $server_name = "localhost";
                        $username = "select";
                        $password = "-@OYhU9y6k*htzhQ";

                        //Establishing a new connection to the server
                        $conn = new mysqli($server_name, $username, $password);

                        if ($conn->connect_error){
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $stmt = $conn->prepare("SELECT * from mati.user");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        //Iterate through the results
                        while ($row = $result->fetch_assoc()) {
                            $User1 = htmlspecialchars($row['First_name']);
                            echo '<option ' . (($assigned_by == $User1) ? 'selected' : '') . '>' . $User1 . '</option>';

                        }

                        ?>


                    </select>
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


