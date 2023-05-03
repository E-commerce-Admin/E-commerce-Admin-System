<?php

session_start();
session_destroy();

$url = $_SERVER['HTTP_REFERER'];
echo '<script type="text/javascript"> alert("logout success!"); window.location.href="'.$url.'"; </script>';

?>