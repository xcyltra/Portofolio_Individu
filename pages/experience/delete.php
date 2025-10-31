<?php
require_once '../../config/db.php';

$id = $_GET['id'];
$query = "DELETE FROM experience WHERE id = $id";

if(mysqli_query($conn, $query)) {
    header("Location: index.php?success=delete");
} else {
    header("Location: index.php?error=1");
}
exit();
?>