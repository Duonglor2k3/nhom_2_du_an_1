<?php

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM  users");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM users WHERE `id` = $id");
    return $item;
}
