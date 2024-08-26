<?php
include_once "../config/init.php";

// message error : 0 => invalid action / 1 => name too small /
// var_dump($_POST);

if (!isAjax()) {
    errorMsg("0");
}

if (!isset($_POST['action'])) {
    errorMsg("0");
}

if (isset($_POST['folderName'])) {
    if (empty($_POST['folderName'])) {
        errorMsg("0");
    }
}

if (isset($_POST['taskName'])) {
    if (empty($_POST['taskName'])) {
        errorMsg("0");
    }
}

switch ($_POST['action']) {
    case "addFolder":
        if (strlen($_POST['folderName']) < 2) {
            errorMsg("1");
        } else {
            $json = addFolders($_POST['folderName']);
            echo $json;
        }
        break;

    case "addTask":
        if (strlen($_POST['taskName']) < 2) {
            errorMsg("1");
        } else {
            $json = addTasks($_POST['taskName'] , $_POST['folderId']);
            echo $json;
        }
        break;
    default:
        diePage("0");
        break;
}

