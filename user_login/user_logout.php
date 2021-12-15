<?php

session_start();

$_SESSION = [];

session_destroy();

echo "ログアウトしました" . "<br><br>";
echo "<a href='user_login_form.html'>ログイン画面</a>";
