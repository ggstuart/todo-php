<?php
include 'setup.php';

$listId = $_GET['id'];
$todoList = getTodoList($listId);

include 'views/todo-list.phtml';
