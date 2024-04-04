
const startToDo = () => {
    var inputTask = document.getElementById('input_task');
    inputTask.disabled = false;
}

const inputFunction = () => {
    var inputTask = document.getElementById('input_task');
    var addTask = document.getElementById('add_task');
    if (inputTask.value !== '') {
        addTask.disabled = false;
    } else {
        addTask.disabled = true;
    }
}

const btnEditSubmit = () => {
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500
    });
}

const routeTodoApp = () => {
    var path = '../pages/todo-app.php';
    setTimeout(() => {
        window.location.href = path;
    }, 300);
}