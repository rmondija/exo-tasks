<?php

require_once __DIR__ . '/../model/Task.php';

class TaskController 
{
    private $taskModel;
    
    public function __construct() 
    {
        $this->taskModel = new Task();
    }

    public function newTask() 
    {
        require_once __DIR__ . '/../views/new-task.php';
    }

    public function listAllTasks() 
    {
        $tasks = $this->taskModel->getAllTasks();
        require_once __DIR__ . '/../views/liste-tasks.php';
    }

    public function viewTask($id) 
    {
        $task = $this->taskModel->getTask($id);
        require_once __DIR__ . '/../views/view-task.php';
    }

    public function modifyTask($id) 
    {
        $task = $this->taskModel->getTask($id);
        require_once __DIR__ . '/../views/modify-task.php';
    }

    public function deleteTask($id) 
    {
        $this->taskModel->deleteTask($id);
        header('Location: index.php');
    }

    public function createTask(string $titre, string $description, string $status)
    {
        $this->taskModel->create($titre, $description, $status);
        header('Location: index.php');
    }

    public function updateTask(string $id, string $titre, string $description, string $status) 
    {
        $this->taskModel->update($id, $titre, $description, $status);
        header('Location: index.php');
    }
}