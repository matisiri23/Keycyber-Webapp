<?php include_once("main.php"); ?>



    <?php
    if (isset($_POST['edit'])){
        echo $_POST['edit'];
    }
    ?>


<div class="container p-5">

    <h1>Add Task</h1>
    <hr>

    <div class="row p-2">
        <form action="" method="post" >
            <div class="row">
                <div class="col-6">
                    <label for="formGroupExampleInput" class="form-label">Task name:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="task_name">
                </div>
                <div class="col-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="description"></textarea>
                </div>
                <div class="col-3">
                    <label for="dueDate" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="dueDate" name="due_date">
                </div>
                <div class="col-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select onchange="priority()" class="form-control " id="priority" name="priority">
                        <option selected>Select one</option>
                        <option style="background-color: red" >High</option>
                        <option style="background-color: yellow" >Medium</option>
                        <option style="background-color: green" >Low</option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option>Not Started</option>
                        <option>In Progress</option>
                        <option>Completed</option>
                        <option>Stuck</option>
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
                            echo '<option>'.$User1.'</option>';

                        }

                        ?>


                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-md-1">
                    <label for="submit" class="form-label text-white">Action</label>
                    <button type="submit" class="btn btn-warning" name="update">update</button>
                </div>
                <div class="col-md-1">
                    <label for="submit" class="form-label text-white">Action</label>
                    <button type="reset" class="btn btn-info" name="submit">Reset</button>
                </div>
            </div>


        </form>
    </div>
</div>


