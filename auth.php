<?php
include_once "config/init.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        $params = $_POST;
        $result = login($params['emailLogin'], $params['passwordLogin']);

        if (!$result){
            header("location:".BASE_URL."auth.php?login=false");
        } else {
            $_SESSION['login'] = $result->id;
            header("location:".BASE_URL);
        }
    } else {
        if (isset($_POST['signin'])) {
            $params = $_POST;
            $result = signin($params['usernamesign'], $params['emailsign'], $params['passwordsign']);
            if (!$result) {
                header("location:" . BASE_URL . "auth.php?signin=false");
            } else {
                $_SESSION['login'] = $result; // result = id of item insert
                header("location:" . BASE_URL);
            }
        }
    }
}


require_once BASE_PATH . "view/login_template.php";
