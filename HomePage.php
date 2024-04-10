<?php include_once("main.php");
//session_start();
//if(!isset($_SESSION['First_name']) || empty($_SESSION['First_name'])) {
//    header("Location: index.php");
//    exit;
//}

?>

<nav style="background-color: #32a6a8" class="navbar navbar-expand-lg fixed-top ">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="HomePage.php">KeyCyber</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" onclick="task()" id="task" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white"  onclick="register()" href="#">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " onclick="createtask()"   href="#" id="createtask">Create Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Users</a>
                </li>

            </ul>
        </div>
    </div>


<!--    <h5><i class="fa fa-user text-white m-2" ></i></h5>  <h6 class="text-white">--><?php //echo $_SESSION['First_name']?><!--</h6>-->
<!---->
<!---->
<!--    </ul>-->
<!--    <form action="" method="post" style="width: 60px;margin-right: 60px;margin-left: 20px">-->
<!--        <button type="submit" class="btn btn-secondary " name="submit" value="  --><?php //session_destroy();?><!--">Logout</button>-->
<!--    </form>-->

</nav>





<iframe id="myIframe" src="Task.php" width="101%" height="600" frameborder="0"  allowfullscreen></iframe>



<footer style="height: 70px;background-color: #32a6a8" class=" fixed-bottom ">
    <div class="container text-center">
        <p class="text-white p-3" >Copyright © 2024 KeyCyber. All rights reserved.</p>
    </div>
</footer>


<script>
 function register(){
     document.getElementById("myIframe").src="RegistrationForm.php";
 }
 function createtask(){
     document.getElementById("myIframe").src="CreateTask.php";
 }
 function task(){
     document.getElementById("myIframe").src="Task.php";
 }



</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
