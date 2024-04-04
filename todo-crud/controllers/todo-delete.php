<?php
include('../connection/conn.php');
$id = $_GET['id'];

mysqli_query($conn, "delete from todo_create where id='$id'");
header('location: ../controllers/todo-app.php');

?>