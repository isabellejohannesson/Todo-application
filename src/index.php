<?php

include "crud.php";

?>
<!DOCTYPE html>
<html lang = "sv">
    <head>
        <meta charset = UTF-8>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Todo-lista</title>
        <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <header>
        <img src="./material/Logo.svg" alt="Logotype" id="logo">
    </header>
    <body>
        <main class="main">
          <div class="content">
            <h1 class="welcome">Welcome to Todo!</h1>
            <h3>Get stuff done:</h3>
          </div>

          <div class="tasks">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="inputTitle">Title:</label><br>
                <input type="text" name="taskTitle" id="inputTitle"><br>
                <label for="taskDescription">Describe task (if you want to):</label><br>
                <textarea id="taskDescription" name="taskDescription" rows="8"></textarea><br>
                <input type="submit" name="submit" value="Add task" class="add">
            </form>
          </div>
    </body>
    </html>

    <?php

    if (isset($_POST["taskTitle"])) { 
        if(empty ($_POST["taskTitle"])) {
            echo("<p id='title_msg'>Please create a title</p>");
        }
        else {
        createTask($_POST["taskTitle"], $_POST["taskDescription"]);
    }
}
    
    if (isset($_POST["updateTitle"])) { 
        updateTask($_POST["updateID"], $_POST["updateTitle"], $_POST["updateDescription"]);
    }

    ?>

    <?php

    //Delete 

    if(isset($_GET["deleteID"]))
    {
        deleteTask($_GET["deleteID"]);
    }

    //Checkbox done/not done 

    if (isset($_GET["checkDone"])) { 
        checkTask($_GET["checkDone"], $_GET["currentValue"]);
     }

    //List of all tasks
    echo("<h2>Your ToDo-list</h2>");
    echo("<div class='tasks'>");
    echo("<ul>");
    foreach(getAllTasks("TaskID", "TaskTitle", "TaskDescription", "TaskStatus") as $task) {
        print("<li>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?showID=" . $task["TaskID"] . "'>");
        print($task["TaskTitle"]);
        print("</a>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?deleteID=" . $task["TaskID"] . "' id='delete'>");
        print("<iconify-icon icon='material-symbols:delete-outline-sharp'></iconify-icon>");
        print("</a>");
        print("<a href='" . $_SERVER["PHP_SELF"] . "?checkDone=" . $task["TaskID"] . "&currentValue=" . $task["TaskStatus"] ."' id='done'>");
        if ($task["TaskStatus"] == 1){
            print("<iconify-icon icon='material-symbols:check-box-outline-sharp'></iconify-icon>");
        } else {
            print("<iconify-icon icon='material-symbols:check-box-outline-blank-sharp'></iconify-icon>");
        } 
        print("</a>");
        print("</li>");
    }

    echo("</ul>");
    echo("</div");

    ?>
     <!-- View one task -->
    
    <?php

    if(isset($_GET["showID"]))
    {
        $task = viewTask($_GET["showID"]);

        print("<h2>View and edit tasks</h2>");
        print("<h3>Selected task</h3>");
    ?>
    <div class="tasks">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <label for="updateTitle">Title:</label><br>
        <input type="text" name="updateTitle" id="updateTitle" value="<? print($task["TaskTitle"]) ?> "><br>
        <label for="updateDescription">Update description:</label><br>
        <textarea id="updateDescription" name="updateDescription" rows="8"><? print($task["TaskDescription"]) ?></textarea><br>
        <input type="hidden" name="updateID" value="<? print($_GET["showID"]) ?>"><br>
        <input type="submit" value="Update task" class="add">
    </form>
    </div>
    </main>
    <?php
    }
    ?>
    <footer><p>&copy Todo Inc - get stuff done</p></footer>
</body>
</html>





