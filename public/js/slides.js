//Slides films
// const items = document.querySelectorAll('.box-film');
// const controlLeft = document.querySelector('.control-left-films');
// const controlRight = document.querySelector('.control-right-films')
// const containerFilms = document.querySelector('.container-films');
// const itemSize = (items[0].clientWidth + 24) * 3;
// const maxItems = items.length;
// const rightSpace = (maxItems/3);
let currentItem = 0;

function prev(section) {
    const items = document.querySelectorAll('.box-film.' + section);
    const itemSize = (items[0].clientWidth + 24) * 3;
    const containerFilms = document.querySelector('.container-films.' + section);
    currentItem -= 1; 
    if (currentItem < 0 ) {
        currentItem = 0;
    }

    let multiplierLeft = itemSize * currentItem;
    containerFilms.style.marginLeft = '-' + multiplierLeft + 'px';
}


function next(section) {
    const items = document.querySelectorAll('.box-film.' + section);
    const containerFilms = document.querySelector('.container-films.' + section);
    const maxItems = items.length;
    const itemSize = (items[0].clientWidth + 24) * 3;
    const rightSpace = (maxItems/3);
    currentItem += 1; 


    if (currentItem > rightSpace) {
        currentItem = 0;

    }
    let multiplierRight = itemSize * currentItem;
    containerFilms.style.marginLeft = '-' + multiplierRight + 'px';
    console.log(section);
}