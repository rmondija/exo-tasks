<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des tâches</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="?">📋 Gestion des Tâches</a>
            <div class="" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?">🏠 Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=new-task">➕ Nouvelle Tâche</a>
                    </li>
                    <li class="nav-item">
                        <?php if(isset($_SESSION['username'])): ?>
                            <a class="nav-link" href="?action=disconnect">🔐 Déconnexion</a>
                        <?php else: ?>
                            <a class="nav-link" href="?page=login">🔓 Connexion</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php if(isset($_SESSION['username'])): ?>
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <span class="navbar-text">
                    Vous naviguez en tant que: <?= $_SESSION['username'] ?>
                </span>
            </div>
        </nav>
    <?php endif; ?>