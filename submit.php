<?php
include 'config.php';
include 'comment.class.php';

$conn = new mysqli('localhost', 'root', '159357', 'blog_andrea');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_POST['name'])
    $name = $_POST['name'];
if ($_POST['article_id'])
    $article_id = $_POST['article_id'];
if ($_POST['email'])
    $email = $_POST['email'];
if ($_POST['body'])
    $body = $_POST['body'];
if ($name && $article_id && $email && $body ) {
    $db_charset = mysql_query("SET CHARACTER SET utf8");
    $sql = " INSERT INTO `comments`(name,article_id,email,body) VALUES('$name','$article_id','$email','$body')";
    if ($conn->query($sql) === TRUE) {
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>