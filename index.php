<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body{
    display: flex;
    flex-direction: column;
    align-self: center;
    justify-content: flex-start;
    border: 2px solid black;
    border-radius: 8px;
    width: 400px;
    min-height: 300px;
  }
  .list{
    margin-left: 10px;
  }
  

  </style>
  <title>Todolist</title>
</head>
<body>
  <form action="" method="post">
    <div class="list">
      <h2>TODO LIST</h2>
      <label for="task">Tasks</label>
      <input type="text" name="task" required>
      
      <label for="location">Location</label>
      <input type="text" name="location" required>
      
      <label for="date">Date</label>
      <input type="date" name="date" required>
      
      <button type="submit">Add</button>
    </div>
    
    <div class="list">
      <ul>
        <li>
          
        </li>
      </ul>
    </div>
  </form>
</body>
</html>