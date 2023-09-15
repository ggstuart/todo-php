<?php
include 'setup.php';

$store->deleteTodoList($_POST['list-id']);

header("Location: /");