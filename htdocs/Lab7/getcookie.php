<?php

if (isset($_COOKIE["guest"]))
    echo "Fetch the guest name from cookie: " . $_COOKIE["guest"] . "!<br>";
else
    echo "No cookie!";

?>