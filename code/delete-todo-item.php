<?php
include 'setup.php';

$store->deleteTodoItem($_POST['item-id']);

header("Location: todo-list.php?id={$_POST['list-id']}");