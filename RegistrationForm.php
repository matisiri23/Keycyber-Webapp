<?php include_once("main.php") ?>


<main>

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

    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $email_Confirm = $_POST['email_confirm'];
        $password = $_POST['password'];
        $password_Confirm = $_POST['password_confirm'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        if($email == $email_Confirm){
            if($password==$password_Confirm){
                $sql = "INSERT INTO mati.users (First_name, Last_name, Email, Password) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

            if ($stmt->execute()) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> Email Does Not Match.
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
            <input type="password" name="password" required id="password">
            <?php if (isset($errors['password'])): ?>
                <p class="text-danger"><?= $errors['password'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group <?= $error_class['password_confirm'] ?? '' ?>">
            <label for="password_confirm">Confirm Password</label>
            <input type="password" name="password_confirm" required id="password_confirm">
            <?php if (isset($errors['password_confirm'])): ?>
                <p class="text-danger"><?= $errors['password_confirm'] ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <button type="submit" id="submit" name="submit" >Register</button>
        </div>
    </form>

</main>
</body>

</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
