<?php
include 'setup.php';

$store->updateTodoItem($_POST['item-id'], isset($_POST['done']));

header("Location: todo-list.php?id={$_POST['list-id']}");