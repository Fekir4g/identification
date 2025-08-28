<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MTN CI - Vérification</title>
  <link href="../css/ajoute.css" rel="stylesheet">
</head>
<body>
  <div class="cadre">
    <!-- Logo MTN -->
    <div class="logo">
      <img src="images/mtn.png" alt="MTN.Ci">
    </div>

    <h1 class="titre">Ajouter un utilisateur</h1>

    <form id="loginForm" class="formulaire">
      <div class="input-groupe">
        <input type="text" class="ncni" required>
        <label>Numéro CNI</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe">
        <input type="text" class="prenom" required>
        <label>Prénom</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe">
        <input type="text" class="nom" required>
        <label>Nom</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe">
        <input type="date" class="dateNss" required>
        <label>Date de naissance</label>
        <div class="input-barre"></div>
      </div>

      <!-- Sélect réseau -->
      <div class="input-groupe select">
        <select id="reseau" required>
          <option value="" disabled selected></option>
          <option value="1">MTN</option>
          <option value="2">Orange</option>
          <option value="3">Moov</option>
        </select>
        <label>Réseau</label>
        <div class="input-barre"></div>
      </div>

      <!-- Sélect numéro -->
      <div class="input-groupe select">
        <select name="ntel" id="ntel" required>
          <option value=""></option>
        </select>
        <label>Numéro de téléphone disponible</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe">
        <input type="text" class="lieuNss" required>
        <label>Lieu de naissance</label>
        <div class="input-barre"></div>
      </div>

      <div class="input-groupe">
        <input type="text" class="lieuNss" required>
        <label>Local enregistrement</label>
        <div class="input-barre"></div>
      </div>

      <button type="submit" class="button">Vérification</button>

      <a href="#" class="lien">Besoin d’aide ? Contactez le service client</a>
    </form>
  </div>

  <script>
    // Quand on change le réseau, on charge les numéros
    document.getElementById("reseau").addEventListener("change", function() {
      let idReseau = this.value;

      fetch("getNumeros.php?reseau=" + idReseau)
        .then(res => res.json())
        .then(data => {
          let ntel = document.getElementById("ntel");
          ntel.innerHTML = "";
          if (data.length > 0) {
            data.forEach(n => {
              let opt = document.createElement("option");
              opt.value = n.id;
              opt.textContent = n.num;
              ntel.appendChild(opt);
            });
          } else {
            let opt = document.createElement("option");
            opt.value = "";
            opt.textContent = "Aucun numéro disponible";
            ntel.appendChild(opt);
          }
        })
        .catch(err => console.error("Erreur AJAX :", err));
    });
  </script>
</body>
</html>
