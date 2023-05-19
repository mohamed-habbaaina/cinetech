<?php
namespace App\Models;

use App\Models\DbConnect;

class UserModel
{
    public function __construct()
    {

    }

    // Check database where email.
    public function checkDB($email): array | false
    {
        $reqCheck = "SELECT * FROM `users` WHERE email=:email LIMIT 1";
        $data = DbConnect::getDb()->prepare($reqCheck);
        $data->bindParam(':email', $email);
        $data->execute();
        return $data->fetch(\PDO::FETCH_ASSOC) ?? false;

    }

    public function register($email, $firstName, $lastName, $password): void
    {
        $reqInser = 'INSERT INTO `users`(`email`, `first_name`, `last_name`, `password`) VALUES (:email, :first_name, :last_name, :password)';
        $creatUser = DbConnect::getDb()->prepare($reqInser);
        $creatUser->bindParam(':email', $email);
        $creatUser->bindParam(':first_name', $firstName);
        $creatUser->bindParam(':last_name', $lastName);
        $creatUser->bindParam(':password', $password);
        $creatUser->execute();
    }

}