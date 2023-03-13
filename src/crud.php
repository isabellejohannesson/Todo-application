<?php


include 'dbconnection.php';

// Sanitize code

function sanitize($input) {

    return htmlspecialchars(strip_tags($input)); 
}

// Create 

function createTask($title, $taskDescription) {

    $conn = prepareDB();

    $title = sanitize($title);
    $description = sanitize($taskDescription);

    $query =<<<SQL
    INSERT INTO Todo (`TaskTitle`, `TaskDescription`) 
    VALUES (:TaskTitle, :TaskDescription)
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("TaskTitle", $title);
        $stmt->bindParam("TaskDescription", $description);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

//Read 
function getAllTasks($taskID, $title, $taskDescription, $taskStatus) {

    $conn = prepareDB();

    $taskID = sanitize($taskID);
    $title = sanitize($title);
    $taskDescription = sanitize($taskDescription);
    $taskStatus = sanitize($taskStatus);

    $query =<<<SQL
    SELECT * from Todo;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }

}

//View one task

function viewTask($taskID) {
    $conn = prepareDB();

    $query =<<<SQL
    SELECT * FROM Todo WHERE TaskID=:taskID;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskID", $taskID);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll()[0];
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
    
}

// Update task

function updateTask($taskID, $updateTitle, $updateDescription) {

    $conn = prepareDB();

    $taskID = sanitize($taskID);
    $updateTitle = sanitize($updateTitle);
    $updateDescription = sanitize($updateDescription);

    $query =<<<SQL
    UPDATE Todo
    SET TaskTitle = :updateTitle, TaskDescription = :updateDescription
    WHERE TaskID=:taskID; 
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskID", $taskID);
        $stmt->bindParam("updateTitle", $updateTitle);
        $stmt->bindParam("updateDescription", $updateDescription);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }

}

//Delete task

function deleteTask($taskID)
{
    $conn = prepareDB();

    $query =<<<SQL
    DELETE FROM Todo WHERE TaskID=:taskID;
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskID", $taskID);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

//DONE / NOT DONE
function checkTask($taskID, $currentValue)
{
    $conn = prepareDB();

    $query =<<<SQL
    UPDATE Todo
    SET TaskStatus=ABS(:currentValue-1)
    WHERE TaskID=:taskID
    SQL;

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam("taskID", $taskID);
        $stmt->bindParam("currentValue", $currentValue);
        $stmt->execute();
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }

}