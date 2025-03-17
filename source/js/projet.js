//! Fonction menu burger
const menuButton = document.getElementById("button");
const dropdownMenu = document.getElementById("liste");

menuButton.addEventListener("click", () => {
  const isMenuVisible = dropdownMenu.style.display === "block";
  dropdownMenu.style.display = isMenuVisible ? "none" : "block";
});

//! Fermer le menu lorsqu'on clique en dehors
document.addEventListener("click", (event) => {
  if (!event.target.closest("#menuContainer")) {
    dropdownMenu.style.display = "none";
  }
});

//? Fonction dark mode
// window.addEventListener('load', function addDarkmodeWidget(){
//     new Darkmode().showWidget();
//   });

//! Fonction dark mode toggle
const darkmode = new Darkmode();
// darkmode.toggle();
console.log(darkmode.isActivated());

const bouttonDarkMode = document.querySelector("#darkMode");
bouttonDarkMode.addEventListener("click", () => {
  darkmode.toggle();
});

//? Fonction save position toggle
// window.addEventListener('DOMContentLoaded', () => {
//     if (darkmode.saveInCookies == true) {
//         test.checked = true
//     } else {
//         test.checked = false;
//     }
// } )

//! API Films
const API_KEY = "1d40b8d2bb813f70435b3e238addfe42"; // Clé API TMDb
const MOVIE_IDS = [
  157336, 550, 155, 680, 13, 329, 9377, 598, 8844, 7347, 156022, 8421, 565,
]; // Rajouter ici les ID TMDb

const filmsContainer = document.getElementById("articleFilm");

const fetchMovie = async (id) => {
  try {
    const rawData = await fetch(
      `https://api.themoviedb.org/3/movie/${id}?api_key=${API_KEY}&language=fr-FR`
    );

    //Vérification du statut de la réponse
    if (!rawData.ok || rawData.status !== 200) {
      // Vérification du statut 200
      console.error(
        "Erreur lors de la récupération des données : ",
        rawData.statusText
      );
      return; // Sortir de la fonction si la réponse n'est pas OK
    }
    //On transforme la reponse en objet JS
    const transformedData = await rawData.json();

    // Création des éléments HTML
    let filmDiv = document.createElement("div");
    let title = document.createElement("h3");
    let img = document.createElement("img");
    let description = document.createElement("p");
    let lien = document.createElement("a");

    title.innerText = transformedData.title;
    img.src = `https://image.tmdb.org/t/p/w300${transformedData.poster_path}`;
    img.alt = `Affiche de ${transformedData.title}`;
    description.innerText = transformedData.overview;
    lien.href = ``;

    // Ajout des éléments au conteneur
    filmDiv.append(lien);
    lien.append(img);
    lien.append(title);
    lien.append(description);

    // Ajout à la page
    filmsContainer.append(filmDiv);
  } catch (error) {
    console.error("Erreur lors de l'appel à l'API : ", error);
  }
};

// Charger tous les films de la liste
MOVIE_IDS.forEach(fetchMovie);

//! Chargement dernier ajout

const lastmovie = document.getElementById("last");
const dernierajout = async (id) => {
  try {
    const rawData = await fetch(
      `https://api.themoviedb.org/3/movie/${id}?api_key=${API_KEY}&language=fr-FR`
    );

    //Vérification du statut de la réponse
    if (!rawData.ok || rawData.status !== 200) {
      // Vérification du statut 200
      console.error(
        "Erreur lors de la récupération des données : ",
        rawData.statusText
      );
      return; // Sortir de la fonction si la réponse n'est pas OK
    }
    //On transforme la reponse en objet JS
    const transformedData = await rawData.json();
    let title = document.createElement("h3");
    let img = document.createElement("img");
    let description = document.createElement("p");

    title.innerText = transformedData.title;
    img.src = `https://image.tmdb.org/t/p/w300${transformedData.poster_path}`;
    img.alt = `Affiche de ${transformedData.title}`;
    description.innerText = transformedData.overview;

    lastmovie.append(img);
    lastmovie.append(title);
    lastmovie.append(description);
  } catch (error) {
    console.error("Erreur lors de l'appel à l'API : ", error);
  }
};

MOVIE_IDS.findLast(dernierajout);

//!Regex
const firstName = document.querySelector("#firstName");
const lastName = document.querySelector("#lastName");
const email = document.querySelector("#inscriptionEmail");
const password = document.querySelector("#inscriptionPassword");
const messageMail = document.querySelector("#messageMail");
const messagePassword = document.querySelector("#messagePassword");

const regexPasswordCreation =
  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;
password.addEventListener("keyup", () => {
  if (regexPasswordCreation.test(password.value)) {
    password.style.border = "solid 3px green";
    messagePassword.style.display = "none";
  } else {
    password.style.border = "solid 3px red";
    messagePassword.innerText =
      "Le mot de passe doit contenir au moins 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial";
    messagePassword.style.color = "red";
  }
});

const regexMailCreation = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
email.addEventListener("keyup", () => {
  if (regexMailCreation.test(email.value)) {
    email.style.border = "solid 3px green";
    messageMail.style.display = "none";
  } else {
    email.style.border = "solid 3px red";
    messageMail.innerText = "Email non valide";
    messageMail.style.color = "red";
  }
});

const regexNomCreation = /^[A-Za-zÀ-ÿ\- ]{2,}$/;
firstName.addEventListener("keyup", () => {
  if (regexNomCreation.test(firstName.value)) {
    firstName.style.border = "solid 3px green";
  } else {
    firstName.style.border = "solid 3px red";
  }
});
lastName.addEventListener("keyup", () => {
  if (regexNomCreation.test(lastName.value)) {
    lastName.style.border = "solid 3px green";
  } else {
    lastName.style.border = "solid 3px red";
  }
});
