<?php

try {
    $pdo = new PDO('mysql:dbname=JHobby;host=localhost:3306', 'root', '');
	$stmt = $pdo->prepare("INSERT INTO users (UserName, FName, LName, Password, DoB) VALUES (:UserName, :FName, :LName, :Password, :DoB)");
} catch (\Exception $e) {
    var_dump($e);
    die();
}

var_dump($pdo);
die();