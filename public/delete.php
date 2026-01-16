<?php
include '../includes/db.php';

$id = $_GET['id'];
$db->exec("DELETE FROM faculty WHERE id = $id");

header("Location: index.php");
exit;
?>
