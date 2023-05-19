<?php
session_start();

require_once('./vendor/autoload.php');

$router = new AltoRouter();

$router->setBasePath('/cinetech');

use App\Controllers\AuthController;

$router->map('GET', '/', function(){

    require_once __DIR__ . '/src/Views/home.php';
});


$router->map('GET', '/register', function(){
    
    require (__DIR__ . '/src/Views/register.php');
});

$router->map('POST', '/register', function(){

    
    $authController = new AuthController();
    $authController->register($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['c_pass']);
    
});


$router->map('GET', '/login', function(){

    require (__DIR__ . '/src/Views/login.php');

});

$router->map('POST', '/login', function(){

    $authController = new AuthController();
    $authController->login($_POST['email'], $_POST['password']);

});

$router->map('GET', '/films', function(){

    require (__DIR__ . '/src/Views/films.php');

});

$router->map('GET', '/series', function(){

    require (__DIR__ . '/src/Views/series.php');

});


$match = $router->match();

if(is_array($match) && is_callable($match['target']))
{
    call_user_func_array($match['target'], $match['params']);
} else
{
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}