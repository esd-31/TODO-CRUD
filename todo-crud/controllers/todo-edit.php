<?php
include('../connection/conn.php');
$id = $_GET['id'];
$result = mysqli_query($conn, "select * from todo_create where id='$id'");
$row = mysqli_fetch_array($result);

if($result) {
    echo '<script>
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500
      });
         </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO APP</title>
    <link rel="stylesheet" href="../stylesheets/main.css">
    <script src="../function/todo-control.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    
<form class="todo-form-edit" method="POST" action="todo-update.php?id=<?php echo $id; ?>">
        <div class="todo-form-title">
            <button onclick="routeTodoApp()">Back</button>
            <h1>Edit your task.</h1>
        </div>
		<div class="todo-form-edit-controll">
        <input type="text" value="<?php echo $row['tododata']; ?>" name="tododata">
        <input type="submit" name="submit" value="Edit Task"> 
        </div>
    </form>
</body>
</html>