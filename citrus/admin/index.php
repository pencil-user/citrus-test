<?php
// Dušan Benašić test
include "../settings.php";
include "../utils.php";

session_start();

if($_SESSION["logged"] == false){
    header("Location:login.php");
    die();
}

$mysql_link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

$query_comments = "SELECT *
        FROM   comments
        WHERE  approved = 0 ORDER BY date_added DESC";

$rows_comments = getRows($mysql_link, $query_comments);


mysqli_close($mysql_link);

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/main_style.css">
</head>
<body>

<h3>Logged in as <?php echo $_SESSION["username"] ?>, <a href="login.php?action=logout">logout</a>

<h1>Citrus Fruit- Admin</h1>

<h3>Dušan Benašić Test</h3>

<h3><?php echo count($rows_comments); ?> Comments Pending Approval</h3>

<?php
    foreach($rows_comments as $comment)
    {
        echo '<div>';
        echo '<b>'.htmlspecialchars($comment["name"]).'</b> ';
        echo htmlspecialchars($comment["date_added"]);
        echo '<br>';
        echo htmlspecialchars($comment["email"]);       
        echo '<br>';     
        echo htmlspecialchars($comment["comment_body"]);
        echo '</div>';
        echo '<a href="process_comment.php?id='.htmlspecialchars($comment["id"]).'&action=approve">Approve</a>';
        echo ' ';
        echo '<a href="process_comment.php?id='.htmlspecialchars($comment["id"]).'&action=delete">Delete</a>';
    }

?>


</html>