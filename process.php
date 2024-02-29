<?php
use Classes\Database;

$db = new Database();

$bookings = $db->query(
    "SELECT * FROM bookings"
)->fetchAll();

var_dump($bookings);
?>