<?php
session_start();

$iban_values = array(
    'iban1' => '',
    'iban2' => '',
    'iban3' => '',
    'iban4' => '',
    'iban5' => '',
    'iban6' => '',
    'iban7' => '',
    'iban8' => '',
    'iban9' => ''
);

// Als het formulier is verzonden, sla de ingevoerde waarden op in de sessie
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $name => $value) {
        if (array_key_exists($name, $iban_values)) {
            $iban_values[$name] = $value;
        }
    }
    $_SESSION['iban_values'] = $iban_values;
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elfproef</title>
    <link rel="stylesheet" href="./styles.css?v<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>
<form method="post" class="back">
    <div class="input-row">
        <?php
        foreach ($iban_values as $name => $value) {
            echo '<input class="number" type="text" name="' . $name . '" placeholder="' . substr($name, -1) . '" value="' . $value . '" required maxlength="1" pattern="[0-9]" title="Alleen cijfers van 1 tot 9 zijn toegestaan">';
        }      
        ?>
    </div>
    <input type="submit" value="Check IBAN">
</form>
<?php   

$confirm = 0;
echo $confirm;
echo '<br>';
for ($i = 10; $i > 0; $i--) {
    $confirm += $iban_values[$name] * $i;
}

echo $confirm;
$confirm = $confirm / 11;
echo '<br>';
echo $confirm;

// Laat zien of het een geldig IBAN is
if (is_int($confirm)) {
        echo '<style>.back {background-color: green;} .input-row {background-color: green;} a {background-color: green;}</style>';
        echo '<a>Deze IBAN is geldig</a>';
    } else {
        echo '<style>.back {background-color: red;} .input-row {background-color: red;} a {background-color: red;}</style>';
        echo '<a>Deze IBAN is niet geldig</a>';
    }
?>
</body>
</html>
