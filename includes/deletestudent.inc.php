<?php
include_once './dbh.inc.php';
$sql = "DELETE FROM `students` WHERE `id`='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
  header("location: /students.php");
  exit();
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
