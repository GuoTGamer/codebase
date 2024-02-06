<?php
session_start();
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
<div class="box">
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
            echo '
            <form method="post" action="./figuur/vierhoek.php">
            <label>Lengte in cm</label>
            <input type="number" name="lengte" placeholder="lengte" value="' . $lengte . '" required /><br/><br/>
            <label>Breedte in cm</label>
            <input type="number" name="breedte" placeholder="breedte" value="' . $breedte . '" required /><br/>
            <input type="submit" name="submit" value="berekenen" />
            </form>';
            break;
        case 'cirkel':
            echo '
            <form method="post" action="./figuur/cirkel.php">
            <label>Diameter in cm</label>
            <input type="number" name="diameter" placeholder="diameter" value="' . $diameter . '" required /><br/>
            <input type="submit" name="submit" value="berekenen" />
            </form>';
            break;
        case 'driehoek':
            echo '
            <form method="post" action="./figuur/driehoek.php">
            <div class="driehoek">
            <div class="opp">
            <label>Oppervlakte</label>
            <label>Basis in cm</label>
            <input type="number" name="basis" placeholder="basis" value="' . $basis . '" required /><br/><br/>
            <label>Hoogte in cm</label>
            <input type="number" name="hoogte" placeholder="hoogte" value="' . $hoogte . '" required /><br/>
            </div>
            <div class="omtr">
            <label>Omtrek</label>
            <label>Zijde 1 in cm</label>
            <input type="number" name="zijden1" placeholder="zijde 1" value="' . $zijden1 . '" required /><br/><br/>
            <label>Zijde 2 in cm</label>
            <input type="number" name="zijden2" placeholder="zijde 2" value="' . $zijden2 . '" required /><br/><br/>
            <label>Zijde 3 in cm</label>
            <input type="number" name="zijden3" placeholder="zijde 3" value="' . $zijden3 . '" required /><br/>
            </div>
            </div>
            <input type="submit" name="submit" value="berekenen" />
            </form>';
            break;
    }
}

?>
</div>
</body>
</html>
