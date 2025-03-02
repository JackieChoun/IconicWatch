//? Fonction menu burger
const menuButton = document.getElementById('button');
const dropdownMenu = document.getElementById('liste');

menuButton.addEventListener('click', () => {
    const isMenuVisible = dropdownMenu.style.display === 'block';
    dropdownMenu.style.display = isMenuVisible ? 'none' : 'block';
});

//? Fermer le menu lorsqu'on clique en dehors
document.addEventListener('click', (event) => {
    if (!event.target.closest('#menuContainer')) {
    dropdownMenu.style.display = 'none';
    }
});



//? Fonction dark mode
// window.addEventListener('load', function addDarkmodeWidget(){
//     new Darkmode().showWidget();
//   });

//? Fonction dark mode toggle
  const darkmode =  new Darkmode();
  // darkmode.toggle();
  console.log(darkmode.isActivated());
  
  const bouttonDarkMode = document.querySelector('#darkMode');
bouttonDarkMode.addEventListener('click', () => {
    darkmode.toggle()
})

//? Fonction save position toggle
// window.addEventListener('DOMContentLoaded', () => {
//     if (darkmode.saveInCookies == true) {
//         test.checked = true 
//     } else {
//         test.checked = false;
//     }
// } )



 //? API Films
        const API_KEY = "1d40b8d2bb813f70435b3e238addfe42"; // Clé API TMDb
        const MOVIE_IDS = [157336, 550, 155, 680, 13, 329, 9377, 598, 8844]; // Rajouter ici les ID TMDb 

        const filmsContainer = document.getElementById("articleFilm");

        const fetchMovie =  async (id) => {
          try{
            const rawData = await fetch(`https://api.themoviedb.org/3/movie/${id}?api_key=${API_KEY}&language=fr-FR`)

            //Vérification du statut de la réponse
            if (!rawData.ok || rawData.status !== 200) { // Vérification du statut 200
            console.error("Erreur lors de la récupération des données : ", rawData.statusText);
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
                filmsContainer.append(filmDiv)
                

              } catch (error) {
                console.error("Erreur lors de l'appel à l'API : ", error);
            }
        }

        // Charger tous les films de la liste
        MOVIE_IDS.forEach(fetchMovie);
