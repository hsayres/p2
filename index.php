<?php
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>


<head>

    <title>P2</title>
    <meta charset='utf-8'>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link href='css/main.css' rel='stylesheet'>

</head>
<body>

<h1 class="hi">Bill Splitter</h1>

<form method='POST' id='billForm'>
    <label class='label'>How much was the tab?
        <span>$</span>
        <input type='number' name='tabTotal' id='tabTotal' min='0' step='.01' value='<?= $form->prefill('tabTotal') ?>'>
        <span class='required'> *required </span>

    </label>
    <label class='label'>Split how many ways?
        <input type='number' name='splitNum' id='splitNum' min='1' value='<?= $form->prefill('splitNum') ?>'>
        <span class='required'> *required </span>
    </label>
    <label class='label'>How was the service?
        <select name='serviceLevel' id='serviceLevel'>
            <option value='' <?php echo (isset($_POST['serviceLevel']) && (!$_POST['serviceLevel'])) ? 'selected="selected"' : ''; ?>>Select an option</option>
            <?php foreach ($possibleServiceLevels as $serviceLevel => $serviceDescription): ?>
            <option value='<?php echo($serviceLevel) ?>' <?php echo (isset($_POST['serviceLevel']) && $_POST['serviceLevel'] == $serviceLevel) ? 'selected="selected"' : ''; ?>> <?php echo $serviceDescription ?> </option>
            <?php endforeach ?>
        </select>
        <span class='required'> *required </span>
    </label>
    <label class='label'>Round up?:
        <input type='checkbox' name='roundUp' id='roundUp' value='1' <?= ($roundUp) ? 'checked' : '' ?>> Yes
    </label>

    <label class='label'>
        <input type='submit' class='btn-primary inputButton' value='Calculate'>
    </label>
    <label class='label'>
        <input type='button' class='btn-danger inputButton' value='Clear input' onClick='window.location.href=window.location.href'>
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
    <p class='bg-success'>Everyone owes $<?= $total ?> each</p>
<?php endif ?>

</body>
</html>
