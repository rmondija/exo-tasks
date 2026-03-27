<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Modifier la tâche</h2>
    <form action="?action=update" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Titre :</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($task['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Statut :</label>
            <input type="text" class="form-control" id="status" name="status" value="<?= htmlspecialchars($task['status']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
    <a href="?id=<?= htmlspecialchars($task['id']) ?>&action=voir" class="btn btn-secondary mt-3">Annuler</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
