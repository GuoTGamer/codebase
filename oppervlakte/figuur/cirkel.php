<?php
session_start();

$diameter = isset($_POST['diameter']) ? $_POST['diameter'] : 0;
$straal = $diameter / 2;
$cirkel_opp = 0;
$cirkel_omtr = 0;
$cirkel_opp = pi() * $straal * $straal;
$cirkel_omtr = 2 * pi() * $straal;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppervlakte Berekenen - Uitkomst cirkel</title>
    <link rel="stylesheet" href="../styles.css?v<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>

<div class="box">

<form method="post" action="../index.php">
    <h1>Uitkomst Cirkel</h1>

<?php
echo "Oppervlakte : " . number_format($cirkel_opp, 2) . " CM<br />";
echo "Omtrek : " . number_format($cirkel_omtr, 2) . " CM<br />";
?>

<br />
    <input type="submit" name="submit" value="Terug naar hoofdpagina" />
</form>
</div>
</body>
</html>
