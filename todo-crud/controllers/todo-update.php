<?php

include('../connection/conn.php');
	$id=$_GET['id'];
	$tododata=$_POST['tododata'];

    mysqli_query($conn, "update todo_create set tododata='$tododata' where id='$id'");

    header('location: ../pages/todo-app.php');
?>