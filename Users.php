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

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;


    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $email_Confirm = $_POST['email_confirm'];
        $password = $_POST['password'];
        $User_type = $_POST['User_type'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if($email == $email_Confirm){

            $sql = "INSERT INTO mati.user (First_name, Last_name, Email, Password,User_type) VALUES (?, ?, ?, ?,?)";

            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password,$User_type);

                if ($stmt->execute()) {
                    $name ="noreply";
                    $email =$_POST['email'];;
                    $subject = "Key Cyber";
                    $message = "
Dear $first_name,

We are thrilled to inform you that your account has been successfully created! Welcome to Keycyber!
Below are your login credentials:

* Email: $email
* Password: $password
* You can login here: http://localhost:63342/matisha/index.php

Please keep this information secure and do not share it with anyone.
Should you have any questions or encounter any issues, please feel free to reach out to our support team at keycyber23@gmail.com.
Please note that this is a no-reply email.
Thank you for choosing KeyCyber. We look forward to serving you!

Best regards,
Keycyber
                            ";

                    require "vendor/autoload.php";

                    $mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

                    $mail->isSMTP();
                    $mail->SMTPAuth = true;

                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->Username = "keycyber23@gmail.com";
                    $mail->Password = "esog hntm wfyl jrql";

                    $mail->setFrom($email, $name);
                    $mail->addAddress($email);

                    $mail->Subject = $subject;
                    $mail->Body = $message;

                    $mail->send();


                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> Data Insert Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
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
        else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> Paasword Does Not Match.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        }
    }

    else{


    }

    $conn->close();
    ?>
    <div class="container">
        <h1>Add User</h1>
        <hr>
        <div class="row">
            <form action="" method="post" class="row">
                <div class="col-md-2">
                    <label for="formGroupExampleInput" class="form-label">First name:</label>
                    <input type="text" name="first_name" id="first_name" required value="<?= $inputs['first_name'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <label for="exampleFormControlTextarea1" class="form-label">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" required value="<?= $inputs['last_name'] ?? '' ?>">

                </div>
                <div class="col-md-2">
                    <label for="dueDate" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" required value="<?= $inputs['email'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <label for="dueDate" class="form-label">Confirm Email:</label>
                    <input type="email" name="email_confirm" id="email_confirm" required value="<?= $inputs['email_confirm'] ?? '' ?>">
                </div>
                <div class="col-md-2 input-group mb-3">

                    <label for="dueDate" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" >
                    <span type="button" class="input-group-text" onclick="generatePassword()">Generate Password</span>
                    <span type="button" id="showPasswordBtn" class="input-group-text" onclick="togglePasswordVisibility()">Show Password</span>



                </div>
                <div class="col-md-2">
                    <label for="priority" class="form-label">User Type:</label>
                    <select class="form-select" aria-label="Default select example" name="User_type">
                        <option selected>Select User Type</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>

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
    <h1>Users List</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>User Type</th>
        </tr>
        </thead>
        <tbody>
        <form method="post" action="useredit.php">
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


            $stmt = $conn->prepare("SELECT * from mati.user ");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $userid = htmlspecialchars($row['User_id']);
                $firstname = htmlspecialchars($row['First_name']);
                $lastname = htmlspecialchars($row['Last_name']);
                $email = htmlspecialchars($row['Email']);
                $usertype = htmlspecialchars($row['User_type']);
                echo'
             <tr>
            <td>'.$firstname.'</td>
            <td>'.$lastname.'</td>
            <td>'.$email.'</td>
            <td>'.$usertype.'</td>
            
            <td><button class="btn btn-danger">Delete</button></td>
            <td><button class="btn btn-primary" name="edit" value='.$userid.'>Edit</button></td>
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
<script>
    function generatePassword() {
        var length = 16; // length of the password
        var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        var retVal = "";
        for (var i = 0, n = charset.length; i < length; i++) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        document.getElementById('password').value = retVal;
    }
</script>
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
<?php include_once("foot.php"); ?>

