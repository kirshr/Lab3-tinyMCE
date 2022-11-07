<?php
include 'connect.php';

$list = "SELECT * FROM comments ORDER BY date DESC";
if($result = $conn->query($list)) {
    $comments = '';
    while ($row = mysqli_fetch_array($result)) {
        $comments .= "<div>";
        $comments .= htmlspecialchars_decode($row['content']);
        $comments.= '<p>'. $row['date'] . '</p>';
        $comments .= "</div>";
    }
    echo $comments;
} else {
    echo $conn->error;
}

?>
