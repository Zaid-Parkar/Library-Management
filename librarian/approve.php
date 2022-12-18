<?php
include "connection.php";
$id = $GET["id"];
mysqli_query($link,"update student_registration set status="yes" where id=$id");
?>