<?php
$ip = $_GET["ip"];

$outputs = shell_exec("/usr/local/bin/hydra -L ./list/usr.lst -P ./list/pass.lst " . $ip . " telnet"); //シェルスクリプトを実行

echo $outputs;
