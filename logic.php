<?php

require('helpers.php');
require('Bill.php');
require('Form.php');

use P2\Bill;
use P2\Form;

$roundUp = $_POST['roundUp'] ?? '';
$form = new Form($_POST);
$showResults = false;

if ($form->isSubmitted()) {
    $errors = $form->validate(
        [
            'tabTotal' => 'required',
            'splitNum' => 'required',
            'serviceLevel' => 'required',
        ]
    );

    if(!$form->hasErrors) {
        $bill = new Bill($_POST['tabTotal'], $_POST['splitNum'], $_POST['serviceLevel'], $roundUp);
        $total = $bill->calculateTotalPerPerson();
        $showResults = true;
    };
};

