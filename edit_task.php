<?php
include 'db.php';
$id = $_GET['id'];

$sqlupdate = "SELECT * FROM tasks WHERE id = :id";
$stmtupdate = $pdo->prepare($sqlupdate);
$stmtupdate->execute(['id'=>$id]);
$updates = $stmtupdate->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST['task'];
    

    // Update the task in the database
    $stmt = $pdo->prepare("UPDATE tasks SET task = ? WHERE id = ?");
    $stmt->execute([$task, $id]);

    // Redirect back to index.php after update
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
<style>
    /* Reset default styling */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f4f4f9; /* Light neutral background */
        color: #333; /* Dark gray for text */
        font-family: 'Roboto', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .app-container {
        width: 350px;
        background-color: #ffffff; /* White container background */
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .title {
        font-size: 26px;
        font-weight: bold;
        color: #009688; /* Teal */
        margin-bottom: 20px;
        text-align: center;
    }

    .search {
        background-color: #e0f7fa; /* Light teal background */
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .search input {
        background-color: transparent;
        color: #00796b; /* Dark teal for text */
        border: none;
        width: 100%;
        outline: none;
        font-size: 14px;
    }

    .search input::placeholder {
        color: #004d40; /* Placeholder text color */
    }

    .search button {
        background-color: #ff9800; /* Vibrant orange */
        color: #ffffff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        margin-left: 10px;
    }

    .search button:hover {
        background-color: #e65100; /* Darker orange on hover */
    }

    .section-title {
        font-size: 18px;
        font-weight: normal;
        color: #00796b; /* Teal */
        margin-top: 20px;
        margin-bottom: 10px;
        font-weight: 800;
    }

    .todo-list, .completed-list {
        background-color: #f1f8e9; /* Soft greenish background */
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 16px;
    }

    .todo-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        color: #333;
        justify-content: space-between;
        padding: 5px 0;
        border-bottom: 1px solid #ccc; /* Separator for items */
    }

    .todo-item:last-child {
        border-bottom: none;
    }

    .todo-item .text {
        flex-grow: 1;
        color: #333;
    }

    .todo-item .edit, .todo-item .delete {
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        margin-left: 10px;
        padding: 3px 8px;
        border-radius: 5px;
        color: #ffffff;
    }

    .todo-item .edit {
        background-color: #4caf50; /* Green for edit */
    }

    .todo-item .edit:hover {
        background-color: #388e3c; /* Darker green on hover */
    }

    .todo-item .delete {
        background-color: #f44336; /* Red for delete */
    }

    .todo-item .delete:hover {
        background-color: #d32f2f; /* Darker red on hover */
    }

    .add-button {
        width: 60px;
        height: 60px;
        background-color: #ff5722; /* Bright orange */
        color: #ffffff;
        font-size: 28px;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        position: fixed;
        bottom: 20px;
        right: 20px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    button{
        background-color: goldenrod; 
        border: none;
        padding: 5px;
        border-radius: 5px;
        width:100px;
        color: white;
        font-weight: bold;
        margin-left: 110px;
    }
    
</style>
</head>
<body>
    <div class="app-container">
        <h1 class="title">To-do</h1>
        <div class="search">
            <form method="post">
                <input type="text" name="task" placeholder="Add To-Do Item"
                 value="<?php echo htmlspecialchars($updates['task']?? ''); ?>"
                >
                  </div>
                <button type="submit">Add</button>
            </form>
       </div>
</body>
</html>