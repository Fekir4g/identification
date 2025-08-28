<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MTN CI - Vérification</title>
  <link href="css/ajoute.css" rel="stylesheet">
</head>
<body>
  <div class="cadre">
    <!-- Logo MTN -->
    <div class="logo">
      <img src="images/mtn.png" alt="MTN.Ci">
    </div>

    <h1 class="titre">Ajouter un utilisateur</h1>

    <form method="POST" action="requete/ajoutUtilisateur.php" class="formulaire">
      <div class="input-groupe">
        <input type="text" name="ncni" required>
        <label>Numéro CNI</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe">
        <input type="text" name="prenom" required>
        <label>Prénom</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe">
        <input type="text" name="nom" required>
        <label>Nom</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe">
        <input type="date" name="dateNss" required>
        <label>Date de naissance</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe">
        <input type="text" name="lieuNss" required>
        <label>Lieu de naissance</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe select">
        <select id="reseau" required>
        <option value="" disabled selected></option>
        <option value="1">Moov Africa</option>
        <option value="2">MTN</option>
        <option value="3">Orange</option>
        </select>
        <label>Réseau</label>
        <div class="input-barre"></div>
     </div>

     <div class="input-groupe select">
        <select name="ntel" id="ntel" required>
        <option value=""  disabled selected></option>
        </select>
        <label>Numéro de téléphone disponible</label>
        <div class="input-barre"></div>
     </div>


      <div class="input-groupe">
        <input type="text" name="lieuEn" required>
        <label>Local enregistrement</label>
        <div class="input-barre"></div>
      </div>

      <button type="submit" name="verif" class="button">Vérification</button>

      <a href="#" class="lien">Besoin d’aide ? Contactez le service client</a>
    </form>
  </div>

  <script>
    document.getElementById("reseau").addEventListener("change", function() {
    let idReseau = this.value;

    fetch("requete/voirNumeros.php?reseau=" + idReseau)
    .then(res => res.text())
    .then(data => {
        document.getElementById("ntel").innerHTML = data;
    })
    .catch(err => console.error(err));
    });
 </script>
</body>
</html>
