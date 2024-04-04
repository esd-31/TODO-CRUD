<?php

$conn = new mysqli("localhost", "root", "", "todo_db");

if($conn) {
    // echo "<script>
    // alert('Connection Successfully!');
    // </script>";
}else{
    die(mysqli_error($conn));
}
?>