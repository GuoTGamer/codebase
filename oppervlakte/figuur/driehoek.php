<?php
session_start();

$basis = isset($_POST['basis']) ? $_POST['basis'] : 0;
$hoogte = isset($_POST['hoogte']) ? $_POST['hoogte'] : 0;
$driehoek = 0;
$driehoek = ($basis * $hoogte) / 2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppervlakte Berekenen - Uitkomst driehoek</title>
    <link rel="stylesheet" href="./styles.css?v<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>
    <h1>Uitkomst Driehoek</h1>
<?php
echo "Oppervlakte : " . number_format($driehoek, 2) . " CM<br />";
?>
</body>
</html>
