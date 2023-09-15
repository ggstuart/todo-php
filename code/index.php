<?php
include 'setup.php';

$todoLists = $store->getTodoLists();

include 'views/index.phtml';
