CREATE DATABASE IF NOT EXISTS todo;
CREATE USER IF NOT EXISTS 'todo' IDENTIFIED BY 'a_sekuur_5tr1n6_v41ue';
GRANT ALL ON todo.* TO 'todo';

USE todo;

DROP TABLE IF EXISTS Lists;
DROP TABLE IF EXISTS Items;

CREATE TABLE Lists (
    list_id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(255)
);

CREATE TABLE Items (
    item_id int PRIMARY KEY AUTO_INCREMENT,
    label varchar(255),
    done boolean,
    list_id int
);