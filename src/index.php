<?php
session_start();
include_once('todo.php');
?>

<html>
    <head>
        <title>TODO List</title>
        <link href="style.css" type="text/css" rel="stylesheet">
        
    </head>
    <body>
        <div class="container">
            <h2>TODO LIST</h2>
            <h3>Add Item</h3>
            <p id="para">
                <input id="new1" type="text">
                <button id="addBtn" name="addBtn">Add</button>
            </p>
    
            <h3>Todo</h3>
            <ul id="incomplete-tasks">
              <!--  <li><input type="checkbox"><label>Pay Bills</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
                <li><input type="checkbox"><label>Go Shopping</label><input type="text" value="Go Shopping"><button class="edit">Edit</button><button class="delete">Delete</button></li> -->
            <li><?php echo displayToDo();  ?></li>

            </ul>
    
            <h3>Completed</h3>
            <ul id="completed-tasks">
              <!--  <li><input type="checkbox" checked><label>See the Doctor</label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li> -->
            </ul>
            <li> <?php echo displayComplete(); ?> </li>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="script.js"></script>
    </body>
</html>