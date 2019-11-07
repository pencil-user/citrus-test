<?php

// Dušan Benašić test
include "settings.php";
include "utils.php";

if ($_REQUEST['action'] == "submit_comment") { // if form is submitted
    // form validation
    $ok = true;
    $error = [];

    $email = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $comment_body = $_REQUEST['comment_body'];

    if ($email == '' || $name =='' || $comment_body =='')
    {
        $error[] = 'Please fill all the fields';
        $ok = false;
    }

    if (!isEmail($_REQUEST['email']))
    {
        $error[] = 'Email must be valid';
        $ok = false;
    }

    if ($ok) { 
    // if the form is not ok, send it to database and redirect to index    
        $mysql_link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

        $name = mysqli_real_escape_string($mysql_link, $name);
        $email = mysqli_real_escape_string($mysql_link, $email);
        $comment_body = mysqli_real_escape_string($mysql_link, $comment_body);


        $query = "INSERT INTO `comments` (`id`, `name`, `email`, `comment_body`, `date_added`, `approved`) 
                        VALUES (NULL, '${name}', '${email}', '${comment_body}', CURRENT_TIME(), '0'); ";
        
        $result = mysqli_query ( $mysql_link , $query);

        header("Location:index.php?pending=1");
    die();
    }
    else { 
        // if not ok, redirect to index with error message
        
        $http_query = http_build_query(['mistakes' => '1', 'name' => $name, 'email' => $email, 'comment_body' => $comment_body ]);

        $header = "Location:index.php?".$http_query;//.http_build_query($error);
        header($header);
        die();
    }


} else {
    // if not form submitted, redirect to index
    header("Location:index.php"); 
}