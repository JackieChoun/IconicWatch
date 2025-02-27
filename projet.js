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



const description = document.querySelector('#articlefilm');
let info = document.createElement('div');


 //? API Films
const options = {
    method: 'GET',
    headers: {
      accept: 'application/json',
      Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxZDQwYjhkMmJiODEzZjcwNDM1YjNlMjM4YWRkZmU0MiIsIm5iZiI6MTczNjUwNzk5MS41MTYsInN1YiI6IjY3ODEwMjU3YzgxYWNhYTYzZGJiNmU1ZCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.b5ORsKozigHYkl_QVf6DaVDwi4cYPrCKg-hZegYoAx4'
    }
  };

  
//   const contactApiSecurePlus =  async () => {
//   const rawData = await fetch('https://api.themoviedb.org/3/authentication', options)
//     .then(res => res.json())
//     .then(res => console.log(res))
//     .catch(err => console.error(err));
//     console.log(rawData);
//   }
//   contactApiSecurePlus();
  


  const contactApiSecurePlus =  async () => {
    try {
        const rawData = await fetch('https://api.themoviedb.org/3/authentication', options)
        .then(res => res.json())
        .then(res => console.log(res))
        .catch(err => console.error(err));
        console.log(rawData);
        
        // Vérification du statut de la réponse
        if (!rawData.ok || rawData.status !== 200) { // Vérification du statut 200
            console.error("Erreur lors de la récupération des données : ", rawData.statusText);
            return; // Sortir de la fonction si la réponse n'est pas OK
        }

        const transformedData = await rawData.json();
    for(let i = 0; i < transformedData.length; i++){
        console.log(transformedData);
        let container = document.createElement('div');
        let nom = document.createElement('h3');
        let image = document.createElement('img');
        let synopsis = document.createElement('li');

        apiDiv.append(container);
        image.src = transformedData[i].sprites.regular;
        nom.innerText = transformedData[i].name.fr;
        synopsis.innerText = 'Synopsis: ';
        for(let j = 0; j < transformedData[i].types.length; j++){
        synopsis.innerText += transformedData[i].types[j].name + ' ';
        };
        height.innerText = 'Taille: '+ transformedData[i].height;
        weight.innerText = 'Poids: ' + transformedData[i].weight;

        container.append(image);
        container.append(nom);
        container.append(synopsis);
        container.append(height);
        container.append(weight);
    }

    } catch (error) {
        console.error("Erreur lors de l'appel à l'API : ", error);
    }
}
contactApiSecurePlus();