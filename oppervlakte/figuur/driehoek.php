<?php
session_start();

$basis = isset($_POST['basis']) ? $_POST['basis'] : 0;
$hoogte = isset($_POST['hoogte']) ? $_POST['hoogte'] : 0;
$zijden1 = isset($_POST['zijden1']) ? $_POST['zijden1'] : 0;
$zijden2 = isset($_POST['zijden2']) ? $_POST['zijden2'] : 0;
$zijden3 = isset($_POST['zijden3']) ? $_POST['zijden3'] : 0;
$driehoek_opp = 0;
$driehoek_omtr = 0;
$driehoek_opp = ($basis * $hoogte) / 2;
$driehoek_omtr = $zijden1 + $zijden2 + $zijden3;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppervlakte Berekenen - Uitkomst driehoek</title>
    <link rel="stylesheet" href="../styles.css?v<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>

<div class="box">

<form method="post" action="../index.php">
    <h1>Uitkomst Driehoek</h1>
<?php
echo "Oppervlakte : " . number_format($driehoek, 2) . " CM<br />";
echo "Omtrek : " . number_format($driehoek_omtr, 2) . " CM<br />";
?>

<br />
    <input type="submit" name="submit" value="Terug naar hoofdpagina" />
</form>
</div>
</body>
</html>
