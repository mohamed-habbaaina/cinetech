<?php
// session_start();
if(isset($_SESSION['user']))
{
    $email = $_SESSION['user']['email'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/Views/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./src/Views/style/style.css">
    <link rel="stylesheet" href="./src/Views/style/auth.css">
    <script defer src="./src/Views/js/login.js"></script>
    <title>Login | Cinetech</title>
</head>
<body>

    <main>
        <div class="messageErr"></div>

        <h1>Login</h1>
        
        <form action="" id="formLogin">

            <label for="email">Email</label>
            <input type="email" name="email" 
            <?php
            if(isset($email))
            {
                echo 'value="' .$email . '">';
                } else
                {?>
            placeholder="Email"><?php } ?>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password">

            <input type="submit" value="Login">

        </form>
    </main>
</body>
</html>