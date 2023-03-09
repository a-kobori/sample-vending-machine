<?php

use Database;

$pdo = Database::getPdo();
$query = $pdo->query('SELECT * FROM sample');
$result = $query->fetchAll();
$name = $result[0]['name'];

echo "Hello, " . $name . "!";
