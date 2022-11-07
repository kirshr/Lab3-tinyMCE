<?php

$displayby = isset($_REQUEST['displayby']) ? $_REQUEST['displayby'] : NULL;
$displayvalue = isset($_REQUEST['displayvalue']) ? $_REQUEST['displayvalue'] : NULL;
$comments = "";
if ($displayby && $displayvalue) {
    include 'connect.php';
    switch ($displayvalue) {
        case 'today':
            $displayvalue = " = CURDATE()";
            break;
        case 'yesterday':
            $displayvalue = " = CURDATE() - 1";
            break;
        case 'last_week':
            $displayvalue = " = CURDATE() - 7";
            break; 
        default:
            $displayvalue = " = CURDATE()";
            break;
    }
    $get_sql = "SELECT * FROM comments WHERE date(date) $displayvalue";
    if ($get_result = mysqli_query($conn, $get_sql)) {
        if (mysqli_num_rows($get_result) > 0) {
            //$comments = '';
            while ($row = mysqli_fetch_array($get_result)) {
                $comments .= "<div>";
                $comments .= htmlspecialchars_decode($row['content']);
                $comments.= '<p>'. $row['date'] . '</p>';
                $comments .= "</div>";
            }
            echo $comments;
        } else {
            echo '<p>No Comments Avaliable</p>';
        }
    } else {
        echo mysqli_error($conn);
    }
}


?>