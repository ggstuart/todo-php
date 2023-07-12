<?php
include 'setup.php';

if (isset($_POST['title'])) {
    createTodoList($_POST['title']);
}

header("Location: /");
