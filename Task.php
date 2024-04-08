<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Menu</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
<div class=" mt-5 p-5  row g-2">
    <i class='far fa-thumbs-up' style='font-size:36px'></i>
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


    $stmt = $conn->prepare("SELECT * from mati.tasks ");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $taskid = htmlspecialchars($row['Task_id']);
        $taskname = htmlspecialchars($row['Task_name']);
        $Description = htmlspecialchars($row['Description']);
        $Duedate = htmlspecialchars($row['Due_date']);
        $Priority = htmlspecialchars($row['Priority']);
        $Status = htmlspecialchars($row['Status']);


        echo '<div class="card col-sm-2 m-2" style="width: 18rem;">';
        echo '<img src="/image/task.jpg" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
        echo ' <h5 class="card-title">'.$taskname.'</h5>';
        echo '<p class="card-text">Description : '.$Description.'</p>';
        echo '<p class="card-text">Due Date : '.$Duedate.'</p>';
        echo '<p class="card-text">Priority : '.$Priority.'</p>';
        echo '<p class="card-text">Status: '.$Status.'</p>';
        if ($Status=='In Progress'){
            echo '<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
</div><br>';
        }if($Status=='Completed'){
            echo '<div class="progress">
  <div class="progress-bar   bg-success" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div><br>';
        }
        if($Status=='Stuck'){
            echo '<div class="progress">
  <div class="progress-bar bg-danger progress-bar-striped" role="progressbar" aria-label="Default striped example" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>';
        }


        echo '<form action="taskedit.php" method="post">';
        echo ' <button class="btn btn-primary" type="submit" name="edit" value='.$taskid.'>Edit</button>';
        echo '</form>';
        echo ' </div>';
        echo '</div>';


    }

    ?>



















<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSGFpoO9xmv/+/z7nU7ELJ6EeAZWlCmGKZk4M1RtIDZOt6Xq/YD"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>