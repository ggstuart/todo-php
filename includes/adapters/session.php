<?php

// This is the ONLY place where we handle todo data in the session

if (!isset($_SESSION['lists'])) {
    $_SESSION['lists'] = [];
}

function getTodoLists() {
    return $_SESSION['lists'];
}

function createTodoList(string $title) {
    $_SESSION['lists'][] = [
        'title'=>$title,
        'items'=>[]
    ];
}

function deleteTodoList(int $id) {
    array_splice($_SESSION['lists'], $id, 1);
}

function getTodoList(int $id) {
    return $_SESSION['lists'][$id];
}