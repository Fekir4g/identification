<?php
require "../connexion.php"; // ta connexion à la base

if (isset($_GET['reseau'])) {
    $reseau = intval($_GET['reseau']);

    $req = "SELECT id, num FROM numero WHERE reseau = $reseau AND utilisateur IS NULL";
    $res = $cle->query($req);

    $nums = [];
    if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            $nums[] = $row;
        }
    }
    echo json_encode($nums);
}
?>
