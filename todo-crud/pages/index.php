<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee CRUD</title>
    <link rel="stylesheet" href="../stylesheets/main.css">
    <script src="../script/main.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <h1>EMPLOYEE CRUD</h1>
    <div class="container-parent">
        <div class="container-child">
            <div class="content-frame">
                <h1>ADD EMPLOYEE</h1>
                <button id="btn-add">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="#fff" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="modal-form-container" style="display: none;">
        <div class="modal-form-content">
            <form class="form-control" method="POST">
                <div class="input-group">
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="input-group">
                    <input type="text" name="position" placeholder="Position" required>
                </div>
                <div class="btn-action">
                    <input type="submit" name="submit" value="SAVE">
                </div>
            </form>
        </div>
    </div>
    <div class="employee-result-container">
        <?php
        include('../connection/conn.php');
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $position = $_POST['position'];

            $sql = "insert into employee_info (name, position) values ('$name', '$position')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('New Employee Inserted!')</script>";
            }
        }
        ?>
    </div>
    <table class="tbl" style="border: solid 1px #000; width: 500px;">
        <th style="border: solid 1px #000;">NAME</th>
        <th style="border: solid 1px #000;">POSITION</th>
        <th style="border: solid 1px #000;">ACTION</th>
        <tbody>
            <?php
            $result = mysqli_query($conn, "select * from employee_info");
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td style="border:solid 1px #000;"><?php echo $row['name']; ?></td>
                    <td style="border:solid 1px #000;"><?php echo $row['position']; ?></td>
                    <td><a href="edit.php?id=<?php echo $row['id']; ?>"><button style="background-color:lightgreen;" type="button" class="btn btn-default btn-sm">
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