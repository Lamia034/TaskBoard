<?php

require_once '../controller/tasksController.php';
require_once '../model/tasks.php';
require_once './profil.php';


if(isset($_POST['TaskId'])){
    $exitTask = new TaskController();
    $exitTask->deleteTask();
}

?>
       