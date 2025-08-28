<?php
require "../connexion.php";

if (isset($_GET['reseau'])) {
    $reseau = intval($_GET['reseau']); // sécurité

    $req = "SELECT * FROM numero WHERE utilisateur IS NULL AND reseau = $reseau";
    $res = $cle->query($req);

    if ($res->num_rows > 0) {
        while ($tab = $res->fetch_row()) {
            echo "<option value='".$tab[0]."'>".$tab[1]."</option>";
        }
    } else {
        echo "<option value='' disabled></option>";
        echo "<option value=''>Aucun numéro disponible</option>";
    }
}
?>
