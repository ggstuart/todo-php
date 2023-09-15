<?php
include 'setup.php';

$store->createTodoList($_POST['title']);

header("Location: /");
