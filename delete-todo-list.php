<?php
include 'setup.php';

if (isset($_POST['list-id'])) {
    deleteTodoList($_POST['list-id']);
}

header("Location: /");