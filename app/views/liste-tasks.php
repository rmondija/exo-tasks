<?php require_once __DIR__ . '/templates/header.php'; ?>

<?php if (!empty($tasks)):  ?>
    <div class="container mt-5">
    <h2 class="mb-4">📋 Liste des tâches</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Créé le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= htmlspecialchars($task['id']) ?></td>
                    <td><?= htmlspecialchars($task['title']) ?></td>
                    <td><?= htmlspecialchars($task['description']) ?></td>
                    <td><?= htmlspecialchars($task['status']) ?></td>
                    <td><?php 
                        $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $task['created_at']);
                        echo $date->format('d') . ' ' . $mois[$date->format('n') - 1] . ' ' . $date->format('Y') . ' à ' . $date->format('H:i');
                    ?></td>
                    <td>
                        <a href="?id=<?= $task['id'] ?>&action=voir" class="btn btn-info btn-sm">Voir</a>
                        <a href="?id=<?= $task['id'] ?>&action=modifier" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="?id=<?= $task['id'] ?>&action=supprimer" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>
    <p style="text-align: center;">Aucune tâche trouvée.</p>
<?php endif; ?>

<?php require_once __DIR__ . '/templates/footer.php'; ?>