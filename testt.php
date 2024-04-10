<?php

$password = "test";
$message = "<!DOCTYPE html>
<html>
<head>
    <script>
        function revealPassword() {
            var password = document.getElementById('password');
            password.removeAttribute('type');
        }
    </script>
</head>
<body>
    <p>Your password is hidden below. Click the button to reveal it.</p>
    <input type='password' id='password' value='$password' readonly style='border:none; background:none; width:1px; height:1px;' />
    <button onclick='revealPassword()'>Reveal Password</button>
</body>
</html>";

echo $message;