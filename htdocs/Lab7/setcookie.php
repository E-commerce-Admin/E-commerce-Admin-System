<?php

$expire = time() + 60*60*24;
$random = md5($_SERVER['REMOTE_ADDR'].time());
setcookie("guest", $random, $expire, "/");
echo "Cookie has been set!";

?>