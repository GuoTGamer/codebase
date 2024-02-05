<?php
session_start();

$lengte = isset($_POST['lengte']) ? $_POST['lengte'] : 0;
$breedte = isset($_POST['breedte']) ? $_POST['breedte'] : 0;
$diameter = isset($_POST['diameter']) ? $_POST['diameter'] : 0;
$basis = isset($_POST['basis']) ? $_POST['basis'] : 0;
$hoogte = isset($_POST['hoogte']) ? $_POST['hoogte'] : 0;
$straal = $diameter / 2;
$vierhoek_opp = 0;
$vierhoek_omtr = 0;
$cirkel_opp = 0;
$cirkel_omtr = 0;
$driehoek = 0;

$figuur = array("vierhoek", "cirkel", "driehoek");


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
            echo '<form class="form2" method="post" action="./figuur/vierhoek.php">
            <label>Lengte in cm</label>
            <input type="number" name="lengte" placeholder="lengte" value="' . $lengte . '" required /><br/><br/>
            <label>Breedte in cm</label>
            <input type="number" name="breedte" placeholder="breedte" value="' . $breedte . '" required /><br/>
            <input type="submit" name="submit2" value="berekenen" />
            </form>';
            break;
        case 'cirkel':
            echo '<form class="form2" method="post" action="./figuur/cirkel.php">
            <label>Diameter in cm</label>
            <input type="number" name="diameter" placeholder="diameter" value="' . $diameter . '" required /><br/>
            <input type="submit" name="submit2" value="berekenen" />
            </form>';
            break;
        case 'driehoek':
            echo '<form class="form2" method="post" action="./figuur/driehoek.php">
            <label>Basis in cm</label>
            <input type="number" name="basis" placeholder="basis" value="' . $basis . '" required /><br/><br/>
            <label>Hoogte in cm</label>
            <input type="number" name="hoogte" placeholder="hoogte" value="' . $hoogte . '" required /><br/>
            <input type="submit" name="submit2" value="berekenen" />
            </form>';
            break;
    }
}

?>

</body>
</html>
