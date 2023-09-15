<?php
session_start();

function show_error($code, $title, $msg) {
    http_response_code($code);
    include 'views/error.phtml';
    die();
}

include 'adapters/mySQL.php';

$db_config = parse_ini_file('config.ini', true)['database'];
$store = new MySQLAdapter($db_config['servername'], $db_config['username'], $db_config['password'], $db_config['dbname']);
