<?php
session_start();

function greenbg() {
    echo '<style>p {background-color: green;}</style>';
}
function redbg() {
    echo '<style>p {background-color: red;}</style>';
}

$lot_values = array(
    'lot1' => '',
    'lot2' => '',
    'lot3' => '',
    'lot4' => '',
    'lot5' => '',
    'lot6' => '',
);

$trekking_values = array(
    'trekking1' => 'Nr',
    'trekking2' => 'Nr',
    'trekking3' => 'Nr',
    'trekking4' => 'Nr',
    'trekking5' => 'Nr',
    'trekking6' => 'Nr',
);

$controle_values = array(
    'nr1' => '',
    'nr2' => '',
    'nr3' => '',
    'nr4' => '',
    'nr5' => '',
    'nr6' => '',
);

// Als het formulier is verzonden, sla de ingevoerde waarden op in de sessie
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_values = array_values($_POST);

    // Sorteer de ingevoerde waarden in oplopende volgorde
    sort($input_values);
    
    // Controleer op dubbele waarden in de ingediende lotnummers
    if (count($input_values) !== count(array_unique($input_values))) {
        redbg();
        echo '<p>U kunt geen dubbele getallen invoeren!</p>';
    } else {
        // Genereer nieuwe trekkingwaarden zolang er dubbele waarden zijn
        do {
            foreach ($trekking_values as $name => $value) {
                $trekking_values[$name] = rand(1, 42);
            }
        } while (count(array_unique($trekking_values)) < count($trekking_values));
        
        // Sorteer de trekkingwaarden in oplopende volgorde
        asort($trekking_values);
        
        // Sla de ingevoerde waarden op in de sessie
        foreach ($input_values as $index => $value) {
            $name = 'lot' . ($index + 1); // lot1, lot2, ..., lot6
            $lot_values[$name] = $value;
        }
        $_SESSION['lot_values'] = $lot_values;
    }
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
<!-- De prijzen -->
<div class="win">
    <h1>Lotto</h1>
        <a>3 Juiste getallen: € 10,-</a>
        <a>4 Juiste getallen: € 1000,-</a>
        <a>5 Juiste getallen: € 100.000,-</a>
        <a>6 Juiste getallen: € 10.000.000,-</a>
</div>

<!-- Lotnummers invoeren -->
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

// Controleerd of de waarde het zelfde zijn
foreach ($controle_values as $name => $value) {
    $lot_key = 'lot' . substr($name, 2);
    $trekking_key = 'trekking' . substr($name, 2);

    if ($lot_values[$lot_key] == $trekking_values[$trekking_key]) {
        $controle_values[$name] = 1;
    } else {
        $controle_values[$name] = 0;
    }
}
echo '<a>Uw lotnummers: ' . implode(', ', $lot_values) . '</a>';
echo '<a>De trekking: ' . implode(', ', $trekking_values) . '</a>';

// Controleerd hoeveel getallen het zelfde zijn
$trekking = $controle_values['nr1'] + $controle_values['nr2'] + $controle_values['nr3'] + $controle_values['nr4'] + $controle_values['nr5'] + $controle_values['nr6'];

if ($trekking == 3) {
    greenbg();
    echo '<p>gefeliciteerd u heeft € 10,- gewonnen</p>';
} elseif ($trekking == 4) {
    greenbg();
    echo '<p>gefeliciteerd u heeft € 1000,- gewonnen</p>';
} elseif ($trekking == 5) {
    greenbg();
    echo '<p>gefeliciteerd u heeft € 100.000,- gewonnen</p>';
} elseif ($trekking == 6) {
    greenbg();
    echo '<p>gefeliciteerd u heeft € 10.000.000,- gewonnen</p>';
} else {
    redbg();
    echo '<p>Helaas u heeft Niks gewonnen</p>';
}
?>

</body>
</html>