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
            echo '<input class="number" type="text" name="' . $name . '" placeholder="' . substr($name, -1) . '" value="' . $value . '" required maxlength="1" pattern="[1-9]" title="Alleen cijfers van 1 tot 9 zijn toegestaan">';
        }      
        ?>
    </div>
    <input type="submit" value="Check IBAN">
</form>
<?php   

// Bereken de som van de vermenigvuldigde waarden
$som1 = $iban_values['iban1'] * 9;
$som2 = $iban_values['iban2'] * 8;
$som3 = $iban_values['iban3'] * 7;
$som4 = $iban_values['iban4'] * 6;
$som5 = $iban_values['iban5'] * 5;
$som6 = $iban_values['iban6'] * 4;
$som7 = $iban_values['iban7'] * 3;
$som8 = $iban_values['iban8'] * 2;
$som9 = $iban_values['iban9'] * 1;
$confirm = ($som1 + $som2 + $som3 + $som4 + $som5 + $som6 + $som7 + $som8 + $som9) / 11;


// Kijkt of er een 0 in zit
$mag = true;
foreach ($iban_values as $name => $value) {
    if ($value == 0) {
        $mag = false;
    } else {
    }
}

// Laat zien of het een geldig IBAN is
if ($mag == true & is_int($confirm)) {
        echo '<style>.back {background-color: green;} .input-row {background-color: green;} a {background-color: green;}</style>';
        echo '<a>Deze IBAN is geldig</a>';
    } else {
        echo '<style>.back {background-color: red;} .input-row {background-color: red;} a {background-color: red;}</style>';
        echo '<a>Deze IBAN is niet geldig</a>';
    }
?>
</body>
</html>
