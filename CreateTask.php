<?php include_once("main.php"); ?>


<div class="container mt-5 p-4">
    <?php
    $servername = "localhost";
    $user = 'insert';
    $pass = 'FbSpE1bZzysoJh!V';
    $db = 'mati';

    $conn = new mysqli($servername, $user, $pass, $db);

    if ($conn->connect_error) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> Database is not working.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }

    if(isset($_POST['submit'])){
        $task_name = $_POST['task_name'];
        $description = $_POST['description'];
        $due_date = $_POST['due_date'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $assigned = $_POST['assigned'];
        $taskdate = date("Y-m-d");


        $sql = "INSERT INTO mati.tasks (Task_name, Description, taskdate,Due_date, Priority, Status, assigned_by) VALUES (?, ?, ?, ?, ?,?,?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssssss", $task_name, $description, $taskdate,$due_date, $priority, $status, $assigned);

            if ($stmt->execute()) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> Data Insert Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  
</div>';
                header("Refresh:2");
            } else {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> Database is not working.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            }

            $stmt->close();
        } else {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> Database is not working.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }
    }

    $conn->close();
    ?>
    <div class="container">
        <h1>Add Task</h1>
        <hr>
        <div class="row">
        <form action="" method="post" class="row">
                <div class="col-md-2">
                    <label for="formGroupExampleInput" class="form-label">Task name:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="task_name">
                </div>
                <div class="col-md-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="description"></textarea>
                </div>
                <div class="col-md-2">
                    <label for="dueDate" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="dueDate" name="due_date">
                </div>
                <div class="col-md-2">
                    <label for="priority" class="form-label">Priority</label>
                    <select onchange="priority()" class="form-control " id="priority" name="priority">
                        <option selected>Select one</option>
                        <option style="background-color: red" >High</option>
                        <option style="background-color: yellow" >Medium</option>
                        <option style="background-color: green" >Low</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option>Not Started</option>
                        <option>In Progress</option>
                        <option>Completed</option>
                        <option>Stuck</option>
                    </select>
                </div>
            <div class="col-md-2">
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
                    echo '<option>'.$User1.'</option>';

                    }

                    ?>


                </select>
            </div>
                <div class="col-md-1">
                    <label for="submit" class="form-label text-white">Action</label>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                </div>
            <div class="col-md-1">
                <label for="submit" class="form-label text-white">Action</label>
                <button type="reset" class="btn btn-info" name="submit">Reset</button>
            </div>
            </form>
        </div>
    </div>

    <hr><br>
    <h1>Task List</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Task Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Assigned</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <form method="post" action="taskedit.php">
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


            $stmt = $conn->prepare("SELECT * from mati.tasks ");
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
            echo'
             <tr>
            <td>'.$taskname.'</td>
            <td>'.$Description.'</td>
            <td>'.$tdate.'</td>
            <td>'.$Duedate.'</td>
            <td>'.$Priority.'</td>
            <td>'.$Status.'</td>
            <td>'.$assigned_by.'</td>
            
            <td><button class="btn btn-danger">Delete</button></td>
            <td><button class="btn btn-primary" name="edit" value='.$taskid.'>Edit</button></td>
        </tr>
        
            ';
             }

        ?>
        </form>

        </tbody>
    </table>

</div>

<script>
    function priority(){
        var priority = document.getElementById("priority").value;

        if(priority==3){
            document.getElementById("priority").style.backgroundColor="#f20505";
            document.getElementById("priority").style.color="#ffffff";
        }
        if(priority==2){
            document.getElementById("priority").style.backgroundColor="#fbff03";
            document.getElementById("priority").style.color="#ffffff";
        }
        if(priority==1){
            document.getElementById("priority").style.backgroundColor="#03ff0f";
            document.getElementById("priority").style.color="#ffffff";
        }
    }
</script>

<?php include_once("foot.php"); ?>
