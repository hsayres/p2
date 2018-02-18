<?php


$hasSubmitted = false;

if (isset($_POST['splitNum']) & isset($_POST['tabTotal'])) {
    $hasSubmitted = true;
    $tabTotal = $_POST['tabTotal'];
    $splitNum = $_POST['splitNum'];
    $service = $_POST['service'];
    $total = ($tabTotal + ($tabTotal*$service)) / $splitNum;
}

