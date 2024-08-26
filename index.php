<?php


include_once "config/init.php";

if (!isLogedIn()){
    header("Location:".BASE_URL."auth.php");
}

if(isset($_GET['logout']) && $_GET['logout'] == 'true'){
    unset($_SESSION['login']);
    header("Location:".BASE_URL."auth.php");
}

$isFolder = false; // isset folderId or not
// delete folder
if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteRow = deleteFolders($_GET['deleteId']);
}

// show task just for one folder
if (isset($_GET['folderId'])) {
    $folderId = $_GET['folderId'];
    $isFolder = true;
} else {
    $folderId = -1;
}

// status of tasks
if (isset($_GET['statusId']) && !empty($_GET['statusId'])) {
    $changeSt = changeStatus($_GET['statusId'] , $_GET['statusDone']);
}

//delete task
if (isset($_GET['deleteT']) && !empty($_GET['deleteT'])) {
    $deleteTask = deleteTasks($_GET['deleteT']);
}


$task = getTasks();
$folder = getFolders();
$user = getUser();
require_once "view/task_template.php";
