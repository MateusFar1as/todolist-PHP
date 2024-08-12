<?php

require './connection/dbConnection.php';

// Fetch tasks
$stmt = $pdo->prepare('SELECT id, task FROM tasks');
$stmt->execute();
$tasks = $stmt->fetchAll();

// Handle POST request to create, update, or delete tasks
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // CREATE
  if (isset($_POST['addTask'])) {
    $task = htmlspecialchars($_POST['task']);
    $sql = 'INSERT INTO tasks (task) VALUES (:task)';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['task' => $task]);

  // DELETE
  } elseif (isset($_POST['deleteTask']) && ($_POST['_method'] ?? '' === 'delete')) {
    $sql = 'DELETE FROM tasks WHERE id = :id';

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_POST['id']]);

  // UPDATE
  } elseif (isset($_POST['updateTask']) && ($_POST['_method'] ?? '' === 'put')) {
    $updatedTask = htmlspecialchars($_POST['task']);

    $sql = 'UPDATE tasks SET task = :task WHERE id = :id';

    $stmt = $pdo->prepare($sql);
    $params = [
      'task' => $updatedTask,
      'id' => $_POST['id']
    ];
    $stmt->execute($params);
  }

  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

?>
