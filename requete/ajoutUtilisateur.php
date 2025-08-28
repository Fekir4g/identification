<?php
require("../connexion.php");

if (isset($_POST["verif"])) {
    $cni = $_POST['ncni'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNss = $_POST['dateNss'];
    $lieuNss = $_POST['lieuNss'];   
    $ntel = $_POST['ntel']; // ID du numéro choisi
    $dateEn = date("Y-m-d H:i:s");
    $lieuEn = $_POST['lieuEn'];

    // Vérifier si l'utilisateur existe déjà
    $check = $cle->prepare("SELECT id FROM utilisateur WHERE cni = ?");
    $check->bind_param("s", $cni);
    $check->execute();
    $result = $check->get_result();
    
    if ($result->num_rows > 0) {
        // Utilisateur existant
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
    } else {
        // Insertion utilisateur sans numéro
        $req = $cle->prepare("INSERT INTO utilisateur 
            (cni, nom, prenom, dateNss, lieuNss, dateEn, lieuEn) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $req->bind_param("sssssss", $cni, $nom, $prenom, $dateNss, $lieuNss, $dateEn, $lieuEn);
        if ($req->execute()) {
            $user_id = $cle->insert_id;
        } else {
            die("Erreur sur la requête : " . $req->error);
        }
    }

    // Associer le numéro à l'utilisateur
    $update = $cle->prepare("UPDATE numero SET utilisateur = ? WHERE id = ?");
    $update->bind_param("ii", $user_id, $ntel);
    $update->execute();

    header("Location: ../ajouter.php");
    exit();
}
?>