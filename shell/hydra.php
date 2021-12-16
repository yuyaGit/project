<?php
$ip = $_GET["ip"];

$outputs = shell_exec("sh hydra.sh   '" . $ip . "'   "); //シェルスクリプトを実行

echo $outputs;
