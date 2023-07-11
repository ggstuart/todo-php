<?php
session_start();

if (!isset($_SESSION['lists'])) {
    $_SESSION['lists'] = [];
}
