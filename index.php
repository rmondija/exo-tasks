<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
require_once __DIR__ . '/app/controllers/TaskController.php';
require_once __DIR__ . '/app/controllers/AdminController.php';

$taskController = new TaskController();
$adminController = new AdminController();

if (!isset($_SESSION['username'])) {
    $adminController->index();
}

if (isset($_GET['action']) && $_GET['action'] == 'create' && isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['status']) && !empty($_POST['status']) ) {
    $taskController->createTask($_POST['title'], $_POST['description'], $_POST['status']);
} if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['status']) && !empty($_POST['status']) ) {
    $taskController->updateTask($_POST['id'], $_POST['title'], $_POST['description'], $_POST['status']);
} elseif (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] === 'supprimer') {
    $taskController->deleteTask($_GET['id']);
} elseif (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'voir') {
    $taskController->viewTask($_GET['id']);
} elseif (isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action']) && $_GET['action'] == 'modifier') {
    $taskController->modifyTask($_GET['id']);
} elseif (isset($_GET['page']) && $_GET['page'] === 'new-task') {
    $taskController->newTask();
} elseif (isset($_GET['page']) && $_GET['page'] === 'login') {
    $adminController->index();
} elseif (isset($_GET['action']) && $_GET['action'] === 'connexion' && isset($_POST['username']) && isset($_POST['password'])) {
    $adminController->connect($_POST['username'], $_POST['password']);
} elseif (isset($_GET['action']) && $_GET['action'] === 'disconnect') {
    $adminController->disconnect();
} else {
    $taskController->listAllTasks();
}
