<?php

function update_cart($qty)
{
  foreach ($_SESSION['cart'] as $key => $item) {
    $_SESSION['cart'][$key][2] = $qty[$key];
    $_SESSION['cart'][$key][4] = $qty[$key] * $_SESSION['cart'][$key][3];
  }
}
function get_qty_product($id)
{
  $result = db_fetch_row("SELECT quantity FROM products where id = $id");
  return $result;
}
