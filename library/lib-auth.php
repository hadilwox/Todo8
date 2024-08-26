<?php

function isLogedIn (): bool
{
    return isset($_SESSION['login']);
}

function login($email, $password)
{

    global $db;
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $stmt = $db->query($query);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function signin($username, $email, $password)
{

    global $db;
    $queryIsUser = "SELECT * FROM users WHERE email = '$email'";
    $stmtIsUser = $db->query($queryIsUser);
    $resultIsUser = $stmtIsUser->fetch(PDO::FETCH_OBJ);
//    $validUser = validateSignin($email, $password);

    if ($resultIsUser) {
        return false;
    } else {
        $query = "INSERT INTO users (name, email, password) VALUES (:name,:email, :password)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $db->lastInsertId();
    }

}

//function validateSignin($email, $password)
//{
//    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//        return false;
//    } elseif (strlen($password) < 5) {
//        return false;
//    }
//}