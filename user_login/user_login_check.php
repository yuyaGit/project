<?php

require_once("../db/dbc.php");
$db = connect();

$name = $_POST["name"];
$pass = $_POST["pass"];


try {
    $sql = "SELECT name,pass FROM user WHERE name=? AND pass=?";
    $stmt = $db->prepare($sql);
    $data[] = $name;
    $data[] = $pass;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($rec["name"])) {
        print "入力が間違っています<br><br>";
        print "<a href='./user_login_form.html'>戻る</a>";
        exit();
    } else {
        session_start();
        $_SESSION["login"] = 1;
        $_SESSION["name"] = $rec["name"];
        header("Location:../index.php");
        exit();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
