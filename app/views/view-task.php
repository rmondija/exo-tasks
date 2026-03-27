<?php require_once __DIR__ . '/templates/header.php'; ?>

<div class="container mt-5">
    <h2>Détails de la tâche</h2>
    <p><strong>Titre :</strong> <?= htmlspecialchars($task['title']) ?></p>
    <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($task['description'])) ?></p>
    <p><strong>Statut :</strong> <?= htmlspecialchars($task['status']) ?></p>
    <p><strong>Créée le :</strong> <?php 
        $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $task['created_at']);
        echo $date->format('d') . ' ' . $mois[$date->format('n') - 1] . ' ' . $date->format('Y H:i');
    ?></p>
    <p><strong>Dernière mise à jour :</strong> <?php 
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $task['updated_at']);
        echo $date->format('d') . ' ' . $mois[$date->format('n') - 1] . ' ' . $date->format('Y H:i');
    ?></p>

    <a href="?id=<?= htmlspecialchars($task['id']) ?>&action=modifier" class="btn btn-warning">Modifier</a>
    <a href="?" class="btn btn-secondary">Retour à la liste</a>
</div>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
