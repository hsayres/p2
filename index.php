<?php
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>P2</title>
    <meta charset='utf-8'>
    <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">


    <link href='main.css' rel='stylesheet'>

</head>
<body>

<h1>Bill Splitter</h1>

<form method='POST'>
    <label>Split how many ways?
        <input type='number' name='splitNum'  min='1' required>
    </label>
    <label>How much was the tab?
        <input type='number' name='tabTotal' min='0' required>
    </label>
    <label>How was the service?
        <select name = 'service'>
            <option value='0'>Horrendous (0% tip)</option>
            <option value='.10'>Bad (10% tip)</option>
            <option value='.15' selected>Okay (15% tip)</option>
            <option value='.18'>Good (18% tip)</option>
            <option value='.20'>Great (20% tip)</option>
            <option value='.25'>Spectacular (25% tip)</option>

        </select>
    </label>
    <label>Round up?:
        <input type='checkbox' name = 'roundUp' value = '1'> Yes
    </label>
    <input type='submit' value='Calculate'>
</form>

<?php if ($hasSubmitted): ?>
    <p>Everyone owes: $<?= $total?></p>
<?php endif ?>

</body>
</html>