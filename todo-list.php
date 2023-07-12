<?php
include 'setup.php';

$todoList = getTodoList($_GET['id']);

var_dump($todoList);

