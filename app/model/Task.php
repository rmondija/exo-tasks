<?php

require_once __DIR__ . '/../dao/connexion.php';

class Task
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getConnexion();
    }

    public function getAllTasks()
    {
        $sql = "SELECT * FROM tasks";
        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
    }

    public function deleteTask($id)
    {
        $sqlDelete = "DELETE FROM tasks WHERE id=:id";
        $stmt = $this->pdo->prepare($sqlDelete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getTask($id) 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create(string $titre, string $description, string $status)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description, status) VALUES (:title, :description, :status);");
        $stmt->bindParam(':title', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        
        return $stmt->execute();
    }

    public function update(string $id, string $titre, string $description, string $status) 
    {
        $stmt = $this->pdo->prepare("UPDATE tasks 
                    SET title = :title, description = :description, status = :status 
                    WHERE id=:id;");
        $stmt->bindParam(':title', $titre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}