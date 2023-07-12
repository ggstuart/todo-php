<?php
include 'setup.php';

$todoList = getTodoList($_GET['id']);

include 'views/todo-list.phtml';
