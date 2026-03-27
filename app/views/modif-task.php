<?php
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/../model/Task.php';

// Vérifier si l'ID de la tâche est fourni dans l'URL
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $taskModel = new Task();
    $task = $taskModel->getTask($taskId); // Récupérer la tâche

    if (!$task) {
        // Si la tâche n'existe pas
        echo "Tâche introuvable.";
        exit;
    }

    // Remplir les champs du formulaire avec les données existantes
    $title = $task['title'];
    $description = $task['description'];
    $status = $task['status'];
} else {
    // Si l'ID n'est pas passé, rediriger ou afficher un message d'erreur
    echo "ID de tâche manquant.";
    exit;
}

// Traitement du formulaire de mise à jour
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Mettre à jour la tâche dans la base de données
    $taskModel->updateTask($taskId, $titre, $description, $status);
    header('Location: /exo-tasks'); // Rediriger vers la liste des tâches
    exit;
}
?>

<div class="container mt-5">
    <h2>Modifier la tâche</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Titre :</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($description); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Statut :</label>
            <select class="form-control" name="status" id="status">
                <option value="en-cours" <?php echo $status === 'en-cours' ? 'selected' : ''; ?>>En cours</option>
                <option value="termine" <?php echo $status === 'termine' ? 'selected' : ''; ?>>Terminée</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
