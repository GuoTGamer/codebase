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
    <title>Elfproef</title>
    <link rel="stylesheet" href="./styles.css?v<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>
<?php
echo '
<form method="post" action="./confirm.php">
    <div class="input-row">
        <input type="text" name="iban_1" placeholder="1" value="' . $iban1 . '" required maxlength="1">
        <input type="text" name="iban_2" placeholder="2" value="' . $iban2 . '" required maxlength="1">
        <input type="text" name="iban_3" placeholder="3" value="' . $iban3 . '" required maxlength="1">
        <input type="text" name="iban_4" placeholder="4" value="' . $iban4 . '" required maxlength="1">
        <input type="text" name="iban_5" placeholder="5" value="' . $iban5 . '" required maxlength="1">
        <input type="text" name="iban_6" placeholder="6" value="' . $iban6 . '" required maxlength="1">
        <input type="text" name="iban_7" placeholder="7" value="' . $iban7 . '" required maxlength="1">
        <input type="text" name="iban_8" placeholder="8" value="' . $iban8 . '" required maxlength="1">
        <input type="text" name="iban_9" placeholder="9" value="' . $iban9 . '" required maxlength="1">
    </div>
    <input type="submit" value="Check IBAN">
</form>'
?>
</body>
</html>