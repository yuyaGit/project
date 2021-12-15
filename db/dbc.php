<?php

function connect()
{

    //各々のSQL環境に合わせて変更
    $dsn = "mysql:host=localhost;dbname=iot;charset=utf8mb4"; //ここは変更しなくておk(多分)
    $user = "yuya"; //ユーザ名
    $pass =  "root"; //パスワード

    try {
        $dbh = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
    return $dbh;
}
