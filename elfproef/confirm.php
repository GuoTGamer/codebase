<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$iban1 = isset($_POST['iban1']) ? $_POST['iban1'] : 0;
$iban2 = isset($_POST['iban2']) ? $_POST['iban2'] : 0;
$iban3 = isset($_POST['iban3']) ? $_POST['iban3'] : 0;
$iban4 = isset($_POST['iban4']) ? $_POST['iban4'] : 0;
$iban5 = isset($_POST['iban5']) ? $_POST['iban5'] : 0;
$iban6 = isset($_POST['iban6']) ? $_POST['iban6'] : 0;
$iban7 = isset($_POST['iban7']) ? $_POST['iban7'] : 0;
$iban8 = isset($_POST['iban8']) ? $_POST['iban8'] : 0;
$iban9 = isset($_POST['iban9']) ? $_POST['iban9'] : 0;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./styles.css?v<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>
<?php

echo $iban1 . ' ';
echo $iban2 . ' ';
echo $iban3 . ' ';
echo $iban4 . ' ';
echo $iban5 . ' ';
echo $iban6 . ' ';
echo $iban7 . ' ';
echo $iban8 . ' ';
echo $iban9 . ' ';
echo '<br>';

$som1 = $iban1 * 9;
$som2 = $iban2 * 8;
$som3 = $iban3 * 7;
$som4 = $iban4 * 6;
$som5 = $iban5 * 5;
$som6 = $iban6 * 4;
$som7 = $iban7 * 3;
$som8 = $iban8 * 2;
$som9 = $iban9 * 1;

echo $som1 . ' ';
echo $som2 . ' ';
echo $som3 . ' ';
echo $som4 . ' ';
echo $som5 . ' ';
echo $som6 . ' ';
echo $som7 . ' ';
echo $som8 . ' ';
echo $som9 . ' ';
echo '<br>';

$ibansom1 = $som1 + $som2 + $som3 + $som4 + $som5 + $som6 + $som7 + $som8 + $som9;
$ibansom2 = $ibansom1 / 11;

echo $ibansom1;
echo '<br>';
echo $ibansom2;
echo '<br>';

if (is_int($ibansom2)) {
    echo 'Dit is een geldig IBAN nummer';
} else {
    echo 'Dit is geen geldig IBAN nummer';
}

?>
</body>
</html>