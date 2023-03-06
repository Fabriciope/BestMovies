

//Slides films
const items = document.querySelectorAll('.box-film');
const controlLeft = document.querySelector('.control-left-films');
const controlRight = document.querySelector('.control-right-films')
const containerFilms = document.querySelector('.container-films');

const maxItems = items.length;
let currentItem = 0;

controlLeft.addEventListener('click', function() {
    currentItem -= 1; 
    if (currentItem < 0 ) {
        currentItem = 0;
    }

    items[currentItem].scrollIntoView({
        inline: "center",
        behavior: "smooth"
    })

    console.log(currentItem);
})

controlRight.addEventListener('click', function(){
    currentItem += 1; 
    if (currentItem > maxItems -1) {
        currentItem = 0;
    }
    items[currentItem].scrollIntoView({
        inline: "center",
        behavior: "smooth"
    })
    console.log(currentItem);
})

console.log(currentItem);