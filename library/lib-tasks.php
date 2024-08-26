<?php

function getCurrentUserId()
{
    //Get login user id
    return $_SESSION['login'];
}

function changeStatus($taskId , $statusDone){

    if ($statusDone == 0){
        $statusDone = 1;
    } else {
        $statusDone = 0;
    }

    global $db, $folderId;
    $currentUserId = getCurrentUserId();
    $query = "UPDATE tasks SET status = '$statusDone' WHERE id = '$taskId'";
    $result = $db->query($query);
    return $result->rowCount();
}

//*** Tasks Functions ***//
function getTasks()
{
    // Get all tasks from DB

    global $db, $folderId;
    $currentUserId = getCurrentUserId();
    $queryAll = "SELECT * FROM tasks WHERE user_id = '$currentUserId'";
    $query = "SELECT * FROM tasks WHERE user_id = '$currentUserId' AND folder_id = '$folderId'";
    if ($folderId == -1) {
        $result = $db->query($queryAll);
    } else {
        $result = $db->query($query);
    }

    return $result->fetchAll(PDO::FETCH_OBJ);
}
function deleteTasks($taskId)
{
    $currentUserId = getCurrentUserId();
    global $db;
    $query = "DELETE FROM tasks WHERE id = '$taskId' AND user_id = '$currentUserId'";
    $result = $db->query($query);
    return $result->rowCount();
}

function addTasks($taskName, $folderId)
{
    global $db;
    $currentUserId = getCurrentUserId();
    $query = "INSERT INTO tasks SET title = '$taskName' , user_id = '$currentUserId', folder_id = '$folderId', status = 0";
    $result = $db->query($query);
    // $result = $db->prepare($query);
    // $result->execute(['taskName' => $taskName, 'userId' => $currentUserId, 'folderId' => $folderId]);
    return $db->lastInsertId();
    // return 4;

}
//*** Folders Functions ***//
function deleteFolders($folderId)
{
    global $db;
    $query = "DELETE FROM folders WHERE id = '$folderId'";
    $result = $db->query($query);
    return $result->rowCount();
}

function addFolders($folderName)
{
    global $db;
    $currentUserId = getCurrentUserId();
    $query = "INSERT INTO folders SET name = :folderName , user_id = :userId ";
    $result = $db->prepare($query);
    $result->execute(['folderName' => $folderName, 'userId' => $currentUserId]);
    return $db->lastInsertId();


}

function getFolders()
{
    //Get all folders from DB
    global $db;
    $currentUserId = getCurrentUserId();
    $query = "SELECT * FROM folders WHERE user_id = '$currentUserId'";
    $result = $db->query($query);
    return $result->fetchAll(PDO::FETCH_OBJ);
}

function getUser()
{
    //Get data user logined from DB
    global $db;
    $currentUserId = getCurrentUserId();
    $query = "SELECT * FROM users WHERE id = '$currentUserId'";
    $result = $db->query($query);
    return $result->fetch(PDO::FETCH_OBJ);
}