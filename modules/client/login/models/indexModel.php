<?php

function get_login_user($username, $pass)
{
    $result = db_fetch_row("SELECT * FROM `users` WHERE `email` = '$username' AND `pass` = '$pass'");
    return $result;
}

