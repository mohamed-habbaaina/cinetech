<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./src/Views/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./src/Views/style/style.css">
    <link rel="stylesheet" href="./src/Views/style/auth.css">
    <script defer src="./src/Views/js/register.js"></script>
    <title>Register | Cinetech</title>
</head>
<body>
    <main>
        <div class="messageErr"></div>
        <form action="" method="post" id="formRegister">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email ...">
            <small></small>

            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" placeholder="First Name ...">

            <label for="last_name">Nom</label>
            <input type="text" name="last_name" placeholder="Last Name ...">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password ...">
            <small></small>

            <label for="c_pass">Confirme Password</label>
            <input type="password" name="c_pass" placeholder="Confirm Password ...">
            <small></small>

            <input type="submit" value="Valid">

        </form>
    </main>
    
</body>
</html>