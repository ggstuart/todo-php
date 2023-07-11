<?php
session_start();

if (isset($_POST['list-id'])) {
    array_splice($_SESSION['lists'], $_POST['list-id'], 1);
}

header("Location: /");