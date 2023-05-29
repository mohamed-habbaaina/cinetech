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

$router->map('GET', '/movie/[i:id]', function($id){

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/'. $id, [
            'headers' => [
          'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJjNTE1NGIzOTJiZWJiZTcxZDVkNjA3ZWJkNmMxOWVjMiIsInN1YiI6IjY0NjU0MGNlZmEyN2Y0MDBmZTEyMGVmZiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.pFdq9dS8QXyIyJNeJGJnmtZvguWiyLwe5EiFlpulZZE',
          'accept' => 'application/json',
        ],
      ]);
      $data = json_decode($response->getBody());
      echo $data->title;
      echo '<br>';
      echo '<pre>';
      var_dump(($data));
      echo '</pre>';

      require (__DIR__ . '/src/Views/series.php');
});

$router->map('GET', '/series', function(){

    

});


$match = $router->match();

if(is_array($match) && is_callable($match['target']))
{
    call_user_func_array($match['target'], $match['params']);
} else
{
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}