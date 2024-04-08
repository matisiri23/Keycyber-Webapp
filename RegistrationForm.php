<?php include_once("main.php") ?>


<main>
    <div class=" container p-5">
        <h1>Register</h1>
        <?php
        $servername = "localhost";
        $user = 'insert';
        $pass = 'FbSpE1bZzysoJh!V';

        $conn = new mysqli($servername, $user, $pass );

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
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> Email Does Not Match.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

        }

        $conn->close();
        ?>
        <form action="" method="post">
            <div class="form-group <?= $error_class['first_name'] ?? '' ?>">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" required value="<?= $inputs['first_name'] ?? '' ?>">
                <?php if (isset($errors['first_name'])): ?>
                    <p class="text-danger"><?= $errors['first_name'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group <?= $error_class['last_name'] ?? '' ?>">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" required value="<?= $inputs['last_name'] ?? '' ?>">
                <?php if (isset($errors['last_name'])): ?>
                    <p class="text-danger"><?= $errors['last_name'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group <?= $error_class['email'] ?? '' ?>">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required value="<?= $inputs['email'] ?? '' ?>">
                <?php if (isset($errors['email'])): ?>
                    <p class="text-danger"><?= $errors['email'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group <?= $error_class['email_confirm'] ?? '' ?>">
                <label for="email_confirm">Confirm Email</label>
                <input type="email" name="email_confirm" id="email_confirm" required value="<?= $inputs['email_confirm'] ?? '' ?>">
                <?php if (isset($errors['email_confirm'])): ?>
                    <p class="text-danger"><?= $errors['email_confirm'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group <?= $error_class['password'] ?? '' ?>">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" >
                <button type="button" onclick="generatePassword()">Generate Password</button>
                <?php if (isset($errors['password'])): ?>
                    <p class="text-danger"><?= $errors['password'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group ">
                <label for="password">User Type</label>
                <select class="form-select" aria-label="Default select example" name="User_type">
                    <option selected>Select User Type</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>

                </select>
            </div>

            <div class="form-group">
                <button type="submit" id="submit" name="submit" >Register</button>
            </div>
        </form>

    </div>
</main>
</body>

</footer>

<script>
    function generatePassword() {
        var length = 10; // length of the password
        var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        var retVal = "";
        for (var i = 0, n = charset.length; i < length; i++) {
            retVal += charset.charAt(Math.floor(Math.random() * n));
        }
        document.getElementById('password').value = retVal;
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
