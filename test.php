<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

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
            <select class="form-control" id="priority">
                <option>High</option>
                <option>Medium</option>
                <option>Low</option>
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>