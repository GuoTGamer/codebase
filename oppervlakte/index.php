<?php
session_start();

$lengte = isset($_POST['lengte']) ? $_POST['lengte'] : 0;
$breedte = isset($_POST['breedte']) ? $_POST['breedte'] : 0;
$straal = isset($_POST['straal']) ? $_POST['straal'] : 0;
$basis = isset($_POST['basis']) ? $_POST['basis'] : 0;
$hoogte = isset($_POST['hoogte']) ? $_POST['hoogte'] : 0;
$vierhoek = 0;
$cirkel = 0;
$driehoek = 0;

$figuur = array("vierhoek", "cirkel", "driehoek");

$vierhoek = $lengte * $breedte;
$cirkel = $straal * $straal * pi();
$driehoek = ($basis * $hoogte) / 2;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oppervlakte Berekenen</title>
    <link rel="stylesheet" href="./styles.css?v<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>

<body>

    <form method="post" action="">
    figuur:
    <select name="figuur" required>
        <option value="" disabled <?php if(empty($_POST['figuur'])) echo 'selected'; ?>>Maak uw keuze</option>
        <option value="vierhoek" <?php if(isset($_POST['figuur']) && $_POST['figuur'] == 'vierhoek') echo 'selected'; ?>>Vierkant/Rechthoek</option>
        <option value="cirkel" <?php if(isset($_POST['figuur']) && $_POST['figuur'] == 'cirkel') echo 'selected'; ?>>Cirkel</option>
        <option value="driehoek" <?php if(isset($_POST['figuur']) && $_POST['figuur'] == 'driehoek') echo 'selected'; ?>>Driehoek</option>
    </select>
    <br />
    <input type="submit" name="submit" value="Bevestig" />
    </form>

<?php

if (isset($_POST['submit']) && isset($_POST['figuur'])) {
    $figuur = $_POST["figuur"];
    switch($figuur) {
        case 'vierhoek':
            echo '<form method="post" action="">
            <input type="number" name="lengte" placeholder="lengte" value="' . $lengte . '" required /><br/>
            <input type="number" name="breedte" placeholder="breedte" value="' . $breedte . '" required /><br/>
            <input type="submit" name="submit2" value="berekenen" />
            </form>';
            break;
        case 'cirkel':
            echo '<form method="post" action="">
            <input type="number" name="straal" placeholder="straal" value="' . $straal . '" required /><br/>
            <input type="submit" name="submit2" value="berekenen" />
            </form>';
            break;
        case 'driehoek':
            echo '<form method="post" action="">
            <input type="number" name="basis" placeholder="basis" value="' . $basis . '" required /><br/>
            <input type="number" name="hoogte" placeholder="hoogte" value="' . $hoogte . '" required /><br/>
            <input type="submit" name="submit2" value="berekenen" />
            </form>';
            break;
        default:
            echo 'Selecteer alstublieft een figuur.';
    }
}

if (isset($_POST['submit2']) && isset($_POST['figuur'])) {
    $figuur = $_POST["figuur"];
    switch ($figuur) {
        case 'vierhoek':
            $lengte = $_POST["lengte"];
            $breedte = $_POST["breedte"];
            $vierhoek = $lengte * $breedte;
            break;
        case 'cirkel':
            $straal = $_POST["straal"];
            $cirkel = pi() * $straal * $straal;
            break;
        case 'driehoek':
            $basis = $_POST["basis"];
            $hoogte = $_POST["hoogte"];
            $driehoek = ($basis * $hoogte) / 2;
            break;
    }
}

// if ($figuur == "vierhoek") {
//     echo "Vierhoek $vierhoek <br />";
// } elseif ($figuur == "cirkel") {
//     echo "Cirkel $cirkel <br />";
// } elseif ($figuur == "driehoek") {
//     echo "Driehoek $driehoek <br />";
// }


echo "Vierhoek $vierhoek <br />";
echo "Cirkel $cirkel <br />";
echo "Driehoek $driehoek <br />";

?>

</body>
</html>
