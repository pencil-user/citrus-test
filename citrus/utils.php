<?php

// Dušan Benašić test

function isEmail(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    else {
        return true;
    }
}

/*
function sanitize($elements)
{
    if (is_array($elements)) {
        $arr = [];
        foreach($elements as $key=>$value)
        {
            if (is_string($value)) {
                $arr[$key] = mysqli_real_escape_string($mysql_link, $value);
            }
        }

        return $arr;
    }
    elseif (is_string($elements)) {
        return mysqli_real_escape_string($mysql_link, $elements);
    }
    elseif (is_numeric($elements)) {
        return $elements;
    }
}
*/

function getRows($mysql_link, $query)
{
    $result = mysqli_query ( $mysql_link , $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}