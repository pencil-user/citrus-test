<?php

include "../settings.php";
include "../utils.php";

session_start();

if($_SESSION["logged"] == false){
    header("Location:login.php");
    die();
}

$mysql_link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

if ($_REQUEST['action'] == 'approve') {
    // perform 'approve' action
    $id = $_REQUEST['id'];
    $query = "UPDATE `comments` SET `approved` = '1' WHERE id='${id}'";
    mysqli_query ( $mysql_link , $query);
} elseif ($_REQUEST['action'] == 'delete') {
    // perform 'delete' action
    $id = $_REQUEST['id'];
    $query = "DELETE FROM `comments` WHERE id='${id}'";
    mysqli_query ( $mysql_link , $query);
}

header("Location:index.php"); 