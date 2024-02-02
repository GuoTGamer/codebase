<?php
session_start();

$lengte = isset($_POST['lengte']) ? $_POST['lengte'] : 0;
$breedte = isset($_POST['breedte']) ? $_POST['breedte'] : 0;
$vierhoek_opp = 0;
$vierhoek_omtr = 0;
$vierhoek_opp = $lengte * $breedte;
$vierhoek_omtr = 2 * ($lengte + $breedte);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppervlakte Berekenen - Uitkomst vierhoek</title>
    <link rel="stylesheet" href="./styles.css?v<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>
    <h1> Uitkomst vierhoek </h1>
<?php
echo "Oppervlakte : " . number_format($vierhoek_opp, 2) . " CM<br />";
echo "Omtrek : " . number_format($vierhoek_omtr, 2) . " CM<br />";
?>
</body>
</html>
