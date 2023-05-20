const displaySearch = document.getElementById('displaySearch'),
      displayContainer = document.getElementById('displayContainer');


      
// display 
// ?api_key=c5154b392bebbe71d5d607ebd6c19ec2
// Handle input query

const API_KEY = 'c5154b392bebbe71d5d607ebd6c19ec2';

const urlSearch =  'https://api.themoviedb.org/3/search/movie?api_key=';

const urlImage = 'https://image.tmdb.org/t/p/w500';

const inputSearch = document.forms['search']['query'];

inputSearch.addEventListener('input', async (e) =>{

    // displayContainer.innerHTML ='';

let response = await fetch(urlSearch + API_KEY + '&query=' + inputSearch.value);
let data = await response.json();


displaySearch.innerHTML ='';

data.results.forEach(item => {


    // todo: id pour l'utilisé dans un a href get movie by ID view
    let {id, title, vote_average, poster_path, overview} = item;
    let movie = document.createElement('div');
    movie.classList.add('movie');

    let rate = item.vote_average;
    

    movie.innerHTML = `

    <a href="./movie/${id}"><img src="${urlImage + poster_path}" alt="${title}"></a>
    <div class="movieInfo">
        <h3>${title}</h3>
        <span style="color: ${getRateColor(vote_average)}">${rate.toFixed(2)}</span>
    </div>
    <a href="./movie/${id}"><div class="discrip">${overview}</div></a>


    `;

    displaySearch.appendChild(movie);

    
});

})

// Handle style Rate
function getRateColor(scors) {

    if(scors >= 8){
        return 'green';
    } else if (scors >= 6){
        return '#f2b612';
    } else if (scors >= 4) {
        return '#f27a12';
    } else {
        return 'red';
    }
    
}