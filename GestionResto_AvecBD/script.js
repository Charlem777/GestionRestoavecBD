// Fonction pour charger la liste des plats
function loadPlats() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "get_plats.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const plats = JSON.parse(xhr.responseText);
      const platsList = document.getElementById("platsList");
      platsList.innerHTML = "";
      plats.forEach(function (plat) {
        const li = document.createElement("li");
        li.textContent = plat.nomPlat;
        li.addEventListener("click", function () {
          selectPlat(plat.idPlat);
        });
        platsList.appendChild(li);
      });
    }
  };
  xhr.send();
}

// Fonction pour charger les dÃ©tails d'un plat sÃ©lectionnÃ©
function loadPlatDetails() {
  const platId = document.getElementById("platSelect").value;
  if (platId !== "") {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_plat_details.php?id=" + platId, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const plat = JSON.parse(xhr.responseText);
        document.getElementById("nomPlat").value = plat.nomPlat;
        document.getElementById("caloPlat").value = plat.caloPlat;
        document.getElementById("protPlat").value = plat.protPlat;
        document.getElementById("prixPlat").value = plat.prixPlat;
        document.getElementById("description").value = plat.description;
        document.getElementById("imageContainer").innerHTML = plat.image ? `<img src="${plat.image}" alt="Plat Image">` : "";
      }
    };
    xhr.send();
  } else {
    clearPlatDetails();
  }
}

// Fonction pour sÃ©lectionner un plat
function selectPlat(platId) {
  document.getElementById("platSelect").value = platId;
  loadPlatDetails();
}

// Fonction pour effacer les dÃ©tails du plat
function clearPlatDetails() {
  document.getElementById("nomPlat").value = "";
  document.getElementById("caloPlat").value = "";
  document.getElementById("protPlat").value = "";
  document.getElementById("prixPlat").value = "";
  document.getElementById("image").value = "";
  document.getElementById("description").value = "";
  document.getElementById("imageContainer").innerHTML = "";
}

// Fonction pour mettre Ã  jour un plat
function updatePlat() {
  const platId = document.getElementById("platSelect").value;
  const prixPlat = document.getElementById("prixPlat").value;
  const image = document.getElementById("image").value;
  const description = document.getElementById("description").value;
  var nomPlat = document.getElementById("nomPlat").value;
  const caloPlat = document.getElementById("caloPlat").value;
  const protPlat = document.getElementById("protPlat").value;

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "update_plat.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert(xhr.responseText);
      loadPlats();
      clearPlatDetails();
    }
  };
  xhr.send(
    "idPlat=" + platId +
    "&nomPlat=" + nomPlat +
    "&caloPlat=" + caloPlat +
    "&protPlat=" + protPlat +
    "&prixPlat=" + prixPlat +
    "&image=" + image +
    "&description=" + description
  );
}

// Fonction pour supprimer un plat
function deletePlat() {
  const platId = document.getElementById("platSelect").value;

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "supprimer_plat.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert(xhr.responseText);
      loadPlats();
      clearPlatDetails();
    }
  };

  xhr.send("idPlat=" + platId);
}

// Fonction pour ajouter un plat
function addPlat() {
  const nomPlat = document.getElementById("nomPlatAdd").value;
  const caloPlat = document.getElementById("caloPlatAdd").value;
  const protPlat = document.getElementById("protPlatAdd").value;
  const prixPlat = document.getElementById("prixPlatAdd").value;
  const quantite = document.getElementById("quantiteAdd").value;
  const description = document.getElementById("descriptionAdd").value;
  const image = document.getElementById("imageAdd").files[0];

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "ajouter_plat.php", true);
  const formData = new FormData();
  formData.append("nomPlatAdd", nomPlat);
  formData.append("caloPlatAdd", caloPlat);
  formData.append("protPlatAdd", protPlat);
  formData.append("prixPlatAdd", prixPlat);
  formData.append("descriptionAdd", description);
  formData.append("imageAdd", image);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert(xhr.responseText);
      loadPlats();
      document.getElementById("addPlatForm").reset();
    }
  };
  xhr.send(formData);
}

// Charger la liste des plats au chargement de la page
window.addEventListener("load", function () {
  loadPlats();
});