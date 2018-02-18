<?php
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>P2</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href='css/main.css' rel='stylesheet'>

</head>
<body>

<h1 class = "hi">Bill Splitter</h1>

<form method='POST'>
    <label class='label'>How much was the tab?
        <span >$</span>
        <input type='number' name='tabTotal' min='0' step='.01' value='<?= $form->prefill('tabTotal') ?>'>
        <span class='required'> *required </span>

    </label>
    <label class='label'>Split how many ways?
        <input type='number' name='splitNum'  min='1' value='<?= $form->prefill('splitNum') ?>'>
        <span class='required'> *required </span>
    </label>
    <label class='label'>How was the service?
        <select name = 'serviceLevel'>
            <option value = ''>Select an option </option>
            <option value='0' <?php echo (isset($_POST['serviceLevel']) && $_POST['serviceLevel'] == '0') ? 'selected="selected"' : ''; ?>>Horrendous (0% tip)</option>
            <option value='.10' <?php echo (isset($_POST['serviceLevel']) && $_POST['serviceLevel'] == '.10') ? 'selected="selected"' : ''; ?>>Bad (10% tip)</option>
            <option value='.15' <?php echo (isset($_POST['serviceLevel']) && $_POST['serviceLevel'] == '.15') ? 'selected="selected"' : ''; ?>>Okay (15% tip)</option>
            <option value='.18' <?php echo (isset($_POST['serviceLevel']) && $_POST['serviceLevel'] == '.18') ? 'selected="selected"' : ''; ?>>Good (18% tip)</option>
            <option value='.20' <?php echo (isset($_POST['serviceLevel']) && $_POST['serviceLevel'] == '.20') ? 'selected="selected"' : ''; ?>>Great (20% tip)</option>
            <option value='.25' <?php echo (isset($_POST['serviceLevel']) && $_POST['serviceLevel'] == '.25') ? 'selected="selected"' : ''; ?>>Spectacular (25% tip)</option>
        </select>
        <span class='required'> *required </span>

    </label>
    <label class='label'>Round up?:
        <input type='checkbox' name = 'roundUp' value = '1' <?= ($roundUp) ? 'checked' : '' ?>> Yes
    </label>
    <label class='label'>
        <input type='submit' value='Calculate'>
    </label>
</form>

<?php if ($form->hasErrors) : ?>
    <div class='alert alert-danger'>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php elseif ($showResults): ?>
    <p class='bg-success'>Everyone owes $<?= $total?> each</p>
<?php endif ?>

</body>
</html>