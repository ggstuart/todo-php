<?php
include 'setup.php';

$store->createTodoItem($_POST['label'], false, $_POST['list-id']);

header("Location: todo-list.php?id={$_POST['list-id']}");
