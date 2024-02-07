<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $iban1 = isset($_POST['IBAN_1']) ? $_POST['IBAN_!'] : 0;
    $iban2 = isset($_POST['IBAN_2']) ? $_POST['IBAN_2'] : 0;
    $iban3 = isset($_POST['IBAN_3']) ? $_POST['IBAN_3'] : 0;
    $iban4 = isset($_POST['IBAN_4']) ? $_POST['IBAN_4'] : 0;
    $iban5 = isset($_POST['IBAN_5']) ? $_POST['IBAN_5'] : 0;
    $iban6 = isset($_POST['IBAN_6']) ? $_POST['IBAN_6'] : 0;
    $iban7 = isset($_POST['IBAN_7']) ? $_POST['IBAN_7'] : 0;
    $iban8 = isset($_POST['IBAN_8']) ? $_POST['IBAN_8'] : 0;
    $iban9 = isset($_POST['IBAN_9']) ? $_POST['IBAN_9'] : 0;
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
echo $iban1;
echo $iban2;
echo $iban3;
echo $iban4;
echo $iban5;
echo $iban6;
echo $iban7;
echo $iban8;
echo $iban9;
?>
</body>
</html>