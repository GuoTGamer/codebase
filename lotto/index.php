<?php
session_start();

$lot_values = array(
    'lot1' => '',
    'lot2' => '',
    'lot3' => '',
    'lot4' => '',
    'lot5' => '',
    'lot6' => '',
);

$trekking_values = array(
    'trekking1' => '',
    'trekking2' => '',
    'trekking3' => '',
    'trekking4' => '',
    'trekking5' => '',
    'trekking6' => '',
);

$controle_values = array(
    'nr1' => '',
    'nr2' => '',
    'nr3' => '',
    'nr4' => '',
    'nr5' => '',
    'nr6' => '',
);

foreach ($trekking_values as $name => $value) {
    $trekking_values[$name] = rand(1,42);
}

// Als het formulier is verzonden, sla de ingevoerde waarden op in de sessie
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $name => $value) {
        if (array_key_exists($name, $lot_values)) {
            $lot_values[$name] = $value;
        }
    }
    $_SESSION['lot_values'] = $lot_values;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotto</title>
    <link rel="stylesheet" href="./styles.css?v<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>
<div class="win">
    <h1>Lotto</h1>
        <a>3 Juiste getallen: € 10,-</a>
        <a>4 Juiste getallen: € 1000,-</a>
        <a>5 Juiste getallen: € 100.000,-</a>
        <a>6 Juiste getallen: € 10.000.000,-</a>
</div>

<form method="post" class="back">
    <div class="input-row">
        <?php
        foreach ($lot_values as $name => $value) {
            echo '<input class="number" type="text" name="' . $name . '" placeholder="' . substr($name, -1) . '" value="' . $value . '" required maxlength="2" pattern="[1-9]|[1-3][0-9]|40|41|42" title="Alleen cijfers van 1 tot 42 zijn toegestaan">';
        }      
        ?>
    </div>
    <input type="submit" value="Check lot">
</form>
<?php   

echo '<a>Uw lotnummer(s): ' . $lot_values['lot1'] . ' ' . $lot_values['lot2'] . ' ' . $lot_values['lot3'] . ' ' . $lot_values['lot4'] . ' ' . $lot_values['lot5'] . ' ' . $lot_values['lot6']. '</a>';
echo '<a>Trekking: ' . $trekking_values['trekking1'] . ' ' . $trekking_values['trekking2'] . ' ' . $trekking_values['trekking3'] . ' ' . $trekking_values['trekking4'] . ' ' . $trekking_values['trekking5'] . ' ' . $trekking_values['trekking6']. '</a>';


foreach ($controle_values as $name => $value) {
    $lot_key = 'lot' . substr($name, 2);
    $trekking_key = 'trekking' . substr($name, 2);

    if ($lot_values[$lot_key] == $trekking_values[$trekking_key]) {
        $controle_values[$name] = 1;
    } else {
        $controle_values[$name] = 0;
    }
}

$trekking = $controle_values['nr1'] + $controle_values['nr2'] + $controle_values['nr3'] + $controle_values['nr4'] + $controle_values['nr5'] + $controle_values['nr6'];

if ($trekking == 3) {
    echo '<a>gefeliciteerd u heeft € 10,- gewonnen</a>';
} elseif ($trekking == 4) {
    echo '<a>gefeliciteerd u heeft € 1000,- gewonnen</a>';
} elseif ($trekking == 5) {
    echo '<a>gefeliciteerd u heeft € 100.000,- gewonnen</a>';
} elseif ($trekking == 6) {
    echo '<a>gefeliciteerd u heeft € 10.000.000,- gewonnen</a>';
} else {
    echo '<a>Helaas u heeft Niks gewonnen</a>';
}
?>

</body>
</html>