<?php
session_start();

if (isset($_POST['title'])) {
    $_SESSION['lists'][] = $_POST['title'];
}

header("Location: /");
