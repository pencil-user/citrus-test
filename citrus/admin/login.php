<?php

// Dušan Benašić test
include "../settings.php";
include "../utils.php";

session_start();

$mysql_link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

//$action = $_REQUEST['action'];

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'login') {
    $query = "SELECT * FROM `admin` WHERE `id`='1'";
    $result = mysqli_query ( $mysql_link , $query);
    $row = mysqli_fetch_assoc($result);
    
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    print_r($_REQUEST);
    
    if ($username == $row['username'] &&  hash("sha256", $password) == $row['password'])
    {
        $_SESSION['username'] = $row['username'];
        $_SESSION['logged'] = '1';
        header("Location:index.php");
        die();
    }
    else
    {
        header("Location:login.php");
        die();
    }
}

if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout')
{
    session_destroy();
    header("Location:login.php");
    die();
}

?><!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/main_style.css">
</head>
<body>

<h1>Citrus Fruit- Admin</h1>

<h3>Dušan Benašić Test</h3>

<h3>Please Log In</h3>

<form method="post" action="login.php">
    <input type="hidden" id="action" name="action" value="login">
    <label>Username : <br>
        <input 
        id="username" 
        name="username" 
        placeholder="Username" 
        type="text"
        value=""
        >
    </label>
    <br><br>
    <label>Password: <br>
        <input id="password" 
        name="password" 
        placeholder='Password' 
        type='text'
        value=""
        >
    </label>
    <br><br>
    <input type="submit" value="Submit">

</form>
* Username is admin, Password is admin123

</html>