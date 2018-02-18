<?php

require('Bill.php');

use P2\Bill;

$hasSubmitted = false;
$roundUp = $_POST['roundUp'] ?? '';

if (isset($_POST['splitNum']) & isset($_POST['tabTotal'])) {
    $hasSubmitted = true;
    $bill = new Bill($_POST['tabTotal'], $_POST['splitNum'], $_POST['serviceLevel'], $roundUp);
    $total = $bill->calculateTotalPerPerson();
}

