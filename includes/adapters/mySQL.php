<?php

class MySQLAdapter
{
    private $connection;

    function __construct(string $servername, string $username, string $password, string $dbname) {
        $this->connection = new mysqli($servername, $username, $password, $dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    function __destruct() {
        $this->connection->close();
    }

    public function getTodoLists() {
        return $this->connection->query("SELECT Lists.list_id, title, count(*) as item_count FROM Lists JOIN Items ON Lists.list_id = Items.list_id  GROUP BY Lists.list_id");
    }

    public function createTodoList(string $title) {
        $query = $this->connection->prepare("INSERT INTO Lists(title) VALUES (?)");
        $query->bind_param("s", $title);
        $query->execute();
    }

    public function deleteTodoList(int $id) {
        $this->connection->begin_transaction();
        $query1 = $this->connection->prepare("DELETE FROM Lists WHERE list_id = (?)");
        $query1->bind_param("i", $id);
        $query1->execute();
        $query2 = $this->connection->prepare("DELETE FROM Items WHERE list_id = (?)");
        $query2->bind_param("i", $id);
        $query2->execute();
        $this->connection->commit();
    }

    public function getTodoList(int $id) {
        $query = $this->connection->prepare("SELECT * FROM Lists WHERE list_id = (?)");
        $query->bind_param("i", $id);
        $query->execute();
        $list = $query->get_result()->fetch_assoc();
        $items = $this->getItemsForList($id);
        if($items->num_rows) {
            $list['items'] = $items->fetch_all(MYSQLI_ASSOC);
        } else {
            $list['items'] = [];
        }
        return $list;
    }

    public function createTodoItem(string $label, bool $done, int $list_id) {
        $query = $this->connection->prepare("INSERT INTO Items(label, done, list_id) VALUES (?, ?, ?)");
        $query->bind_param("sii", $label, $done, $list_id);
        return $query->execute();
    }

    public function deleteTodoItem(int $item_id)
    {
        $query1 = $this->connection->prepare("DELETE FROM Items WHERE item_id = (?)");
        $query1->bind_param("i", $item_id);
        $query1->execute();
    }

    public function updateTodoItem(int $item_id, bool $done)
    {
        $query1 = $this->connection->prepare("UPDATE Items SET done = (?) WHERE item_id = (?)");
        $query1->bind_param("ii", $done, $item_id);
        $query1->execute();
    }

    private function getItemsForList(int $list_id) {
        $query = $this->connection->prepare("SELECT * FROM Items WHERE list_id = (?)");
        $query->bind_param("i", $list_id);
        $query->execute();
        return $query->get_result();
    }
}