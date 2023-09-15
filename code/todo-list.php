<?php
include 'setup.php';

$listId = $_GET['id'];
$todoList = $store->getTodoList($listId);

include 'views/todo-list.phtml';
