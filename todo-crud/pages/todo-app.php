<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO APP</title>
    <link rel="stylesheet" href="../stylesheets/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="../function/todo-control.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="todo-container">
        <div class="todo-title">
            <h1>Create a todo task.</h1>
        </div>
        <br />
        <form class="todo-form" method="POST">
            <div class="todo-form-controls">
                <input type="text" name="tododata" id='input_task' disabled='true' oninput='inputFunction()' placeholder="Insert a task.">
                <div class="todo-btn">
                    <input type="submit" name="submit" id='add_task' value="Add task" disabled="true">
                    <input type="button" value="Start todo" onclick="startToDo()">
                </div>
            </div>
        </form>
    </div>
    <div class="table-data-result-container">
        <?php
        include('../connection/conn.php');
        if (isset($_POST['submit'])) {
            $tododata = $_POST['tododata'];

            $sql = "insert into todo_create (tododata) values ('$tododata')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
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
        }
        ?>
    </div>
    <table class="table-data-container" style="border: solid 1px #000; width: 500px;">
        <th style="border: solid 1px #000; text-align:center; background: #fff;">Task Inserted</th>
        <th style="border: solid 1px #000; text-align:center; background: #fff;">Actions</th>
        <tbody>
            <?php
            $result = mysqli_query($conn, "select * from todo_create");
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr style="border: solid 1px #000; width: 500px;">
                    <td style="border: solid 1px #000;"><?php echo $row['tododata']; ?></td>
                    <td><a href="../controllers/todo-edit.php?id=<?php echo $row['id']; ?>"><button style="background-color:lightgreen;" type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button></a>
                        <a href="../controllers/todo-delete.php?id=<?php echo $row['id']; ?>"> <button style="background-color:red;" type="button" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>