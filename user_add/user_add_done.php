<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require_once("../db/dbc.php");
$db = connect();

$name = $_POST["name"];
$pass = $_POST["pass"];

try {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO user(name,pass) VALUES (?,?)";
    $stmt = $db->prepare($sql);
    $data[] = $name;
    $data[] = $pass;
    $stmt->execute($data);
    echo "ユーザを登録しました";
    echo "<a href='../index.php'>管理画面へ</a>";
} catch (PDOException $e) {
    echo $e->getMessage();
}
