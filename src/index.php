<?php

require('./tasksController.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>To Do List</title>
  <link href="./assets/css/style.css" rel="stylesheet">
</head>

<body>

  <h1>TODO LIST</h1>

  <form method="post" id="addForm">
    <input type="text" id="addTask" name="task" placeholder="Add task..." required>
    <button type="submit" name="addTask">+</button>
  </form>

  <?php if (count($tasks) == 0) : ?>
    <div id="empty">
      <img src="./assets/images/Detective.png" alt="">
      <p>Empty...</p>
    </div>
  <?php endif; ?>

  <?php foreach ($tasks as $task): ?>
    <div class="taskDiv">
      <input class="checkbox" type="checkbox">

      <input class="task" type="task" name="task" value="<?= htmlspecialchars($task['task']) ?>" readonly>

      <button class="editButton updateButton">
        <img src="./assets/images/icon-pencil.svg" alt="">
      </button>

      <form method="post" class="editForm" style="display: none;">
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
        <input class="editInput" type="text" name="task" placeholder="Add edit..." required>

        <button class="updateButtonConfirm" type="submit" name="updateTask">
          <img src="./assets/images/icon-confirm.svg" alt="">
        </button>
        <button class="updateButtonCancel" type="button">
          <img src="./assets/images/icon-cancel.svg">
        </button>
      </form>

      <form method="post">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
        <button class="deleteButton" type="submit" name="deleteTask">
          <img src="./assets/images/icon-trash.svg" alt="">
        </button>
      </form>
    </div>
  <?php endforeach ?>

</body>

<script src="./assets/javascript/script.js"></script>
</html>
