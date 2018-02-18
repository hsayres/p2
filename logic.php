<?php

require('helpers.php');
require('Bill.php');
require('Form.php');

use P2\Bill;
use P2\Form;

$tabTotal = $_POST['tabTotal'] ?? '';
$splitNum = $_POST['splitNum'] ?? '';
$serviceLevel = $_POST['serviceLevel'] ?? '';
$roundUp = $_POST['roundUp'] ?? '';
$form = new Form($_POST);
$showResults = false;
$bill = new Bill($tabTotal, $splitNum, $serviceLevel, $roundUp);


if ($form->isSubmitted()) {
    $errors = $form->validate(
        [
            'tabTotal' => 'required',
            'splitNum' => 'required',
            'serviceLevel' => 'required',
        ]
    );

    if(!$form->hasErrors) {
        $total = $bill->calculateTotalPerPerson();
        $showResults = true;
    };
};
