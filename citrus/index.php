<?php
// Dušan Benašić test
include "settings.php";
include "utils.php";

$mysql_link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

$query_products ="SELECT * FROM products LIMIT 9";

$rows_products = getRows($mysql_link, $query_products);

$query_comments = "SELECT *
        FROM   comments
        WHERE  approved = 1 ORDER BY date_added DESC";

$rows_comments = getRows($mysql_link, $query_comments);


mysqli_close($mysql_link);

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/main_style.css">
</head>
<body>

<h1>Citrus Fruit</h1>

<h3>Dušan Benašić Test</h3>

<table>

<?php
    
    $count = 0;

    foreach($rows_products as $product)
    {

        if ($count == 0)
        {
            echo "<tr>";
        }
        elseif ($count %3 == 0)
        {
            echo "</tr>";            
            echo "<tr>";
        }
        $count ++;

        echo '<td width = "250">';
        echo '<div class="imgcontainer"><img src = "fruit_imgs/'.htmlspecialchars($product["image"]).'.jpg"></div><br>';
        echo '<b>'.htmlspecialchars($product["title"]).'</b>'.'<br>'.htmlspecialchars($product["description"]).'<br>';
        echo '</td>';

        if ($count == 9){
            echo "</tr>";
        }

    }
    

    //print_r($rows_products);
?>

    
</table>

<div>
<h3> comments </h3>
<?php
    foreach($rows_comments as $comment)
    {
        echo '<div>';
        echo '<b>'.htmlspecialchars($comment["name"]).'</b> ';
        echo htmlspecialchars($comment["date_added"]);
        echo '<br>';
        echo htmlspecialchars($comment["comment_body"]);
        echo '</div>';
    }
?>
</div>

<div>
    <h3>Please leave a comment</h3>
    <form method="post" action="submit_comment.php">
        <?php
            if (isset($_REQUEST['mistakes']))
            {
                echo '<div>There were mistakes in your comment!</div>';
            }

            if (isset($_REQUEST['pending']))
            {
                echo '<div>Your comment is pending approval</div>';
            }

        ?>
        <input type="hidden" id="action" name="action" value="submit_comment">
        <label>Name : <br>
            <input 
            id="name" 
            name="name" 
            placeholder="Your Name" 
            type="text"
            value="<?php if (isset($_REQUEST['name'])) {echo htmlspecialchars($_REQUEST['name']);} ?>"
            >
        </label>
        <br><br>
        <label>Email: <br>
            <input id="email" 
            name="email" 
            placeholder='Email Address' 
            type='text'
            value="<?php
             if (isset($_REQUEST['email'])) {echo htmlspecialchars($_REQUEST['email']);} 
             ?>"
            >
        </label>
        <br><br>
        <label>Comment: <br>
            <textarea 
            id="comment_body" 
            name="comment_body" 
            placeholder='Your Comment' 
            type='text'><?php if (isset($_REQUEST['email'])) {echo htmlspecialchars($_REQUEST['comment_body']);} ?></textarea>
        </label>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>

</body>

</html>