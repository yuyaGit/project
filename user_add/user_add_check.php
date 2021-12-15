<?php

$name = $_POST["name"];
$pass = $_POST["pass"];

if (empty($name)) {
    echo "ユーザー名を入力してください" . "<br><br>";
    echo "<a href='user_add.html'>戻る</a>" . "<br><br>";
}

if (empty($pass)) {
    echo "パスワードを入力してください" . "<br><br>";
    echo "<a href='user_add.html'>戻る</a>" . "<br><br>";
}

if (!empty($name) && !empty($pass)) {
    print "ユーザを追加しますか？<br><br>";
    print "<form action='user_add_done.php' method='post'>";
    print "<input type='hidden' name='name' value='" . $name . "'>";
    print "<input type='hidden' name='pass' value='" . $pass . "'>";
    print "<input type='button' onclick='history.back()' value='戻る'>" . "<br><br>";
    print "<input type='submit' value='OK'>";
    print "</form>";
}
