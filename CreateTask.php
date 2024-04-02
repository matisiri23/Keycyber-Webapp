<?php include_once("main.php") ?>

    <div class="container mt-5">
        <div class="container">
            <h1>Add Task</h1>
            <hr>
            <div class="row">
                <div class="col-2">
                    <label for="formGroupExampleInput" class="form-label">Task name:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" >
                </div>
                <div class="col-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                </div>
                <div class="col-2">
                    <label for="dueDate" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="dueDate">
                </div>
                <div class="col-2">
                    <label for="priority" class="form-label">Priority</label>
                    <select onchange="priority()" class="form-control " id="priority">
                        <option selected >Select one</option>
                        <option  style="background-color: red" value="3">High</option>
                        <option style="background-color: yellow" value="2">Medium</option>
                        <option style="background-color: green" value="1">Low</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status">
                        <option>Not Started</option>
                        <option>In Progress</option>
                        <option>Completed</option>
                    </select>
                </div>
                <div class="col-1">
                    <label for="status" class="form-label text-white">Action</label>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

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
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Task 1</td>
            <td>Description for Task 1</td>
            <td>2023-01-01</td>
            <td>2023-02-01</td>
            <td>High</td>
            <td>In Progress</td>
            <td><button class="btn btn-danger">Delete</button></td>
            <td><button class="btn btn-primary">Edit</button></td>
        </tr>
        <tr>
            <td>Task 2</td>
            <td>Description for Task 2</td>
            <td>2023-01-02</td>
            <td>2023-02-02</td>
            <td>Medium</td>
            <td>Completed</td>
            <td><button class="btn btn-danger">Delete</button></td>
            <td><button class="btn btn-primary">Edit</button></td>
        </tr>
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


<?php include_once("main.php") ?>