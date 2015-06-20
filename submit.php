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
    $sql = "INSERT INTO `comments`(name,article_id,email,body) VALUES('$name','$article_id','$email','$body')";
    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">';
        echo 'alert("message successfully sent")';
        echo '</script>';
        if (isset($_SERVER["HTTP_REFERER"])) {
            echo "zpráva byla odeslána";
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>