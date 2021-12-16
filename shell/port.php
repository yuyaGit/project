<?php

//デバッグ用
/* print "<pre>";
$d = posix_getpwuid(posix_geteuid());
print_r($d);
print "</pre>";
 */

session_start();
session_regenerate_id(true);
if (!isset($_SESSION["login"])) {
    print "ログインしていません<br><br>";
    print "<a href='./user_login/user_login_form.html'>ログイン画面へ</a>";
    exit();
} else {
    print $_SESSION["name"] . "さんログイン中";
    print "<br><br>";
}

$outputs = shell_exec("sh scan.sh"); //シェルスクリプトを実行

$output = explode("Nmap", $outputs); //Nmapで区切って配列に格納

echo count($output) - 3 . "個のデバイスが検出されました." . "<br>";

for ($i = 1; $i <= count($output); $i++) {
    echo $output[$i] . "<br>";
}
