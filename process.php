<?php

include 'connect.php';
$form_good = TRUE;
extract($_POST);
$comment = $_POST['comment'];
var_dump($comment);
if (strlen($comment) < 17) {
    echo '<p>Please add more content</p>';
    $form_good = FALSE;
}
if ($form_good){
    $htmlspecialchar = htmlspecialchars($comment, ENT_QUOTES);
    $sql = "INSERT INTO comments (content) VALUES ('$htmlspecialchar')";
    if ($conn->query($sql)) {
        echo "<p>comment inserted successfully</p>";
    } else {
        echo $conn->error;
    }
}

?> 