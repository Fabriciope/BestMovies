

//Slides films
const items = document.querySelectorAll('.box-film');
const controlLeft = document.querySelector('.control-left-films');
const controlRight = document.querySelector('.control-right-films')
const containerFilms = document.querySelector('.container-films');
const itemSize = (items[0].clientWidth + 20) * 2;
const maxItems = items.length;
const rightSpace = (maxItems/2);
let currentItem = 0;

controlLeft.addEventListener('click', function() {
    currentItem -= 1; 
    if (currentItem < 0 ) {
        currentItem = 0;
    }

    let multiplierLeft = itemSize * currentItem;
    containerFilms.style.marginLeft = '-' + multiplierLeft + 'px';

    // items[currentItem].scrollIntoView({
    //     inline: "start",
    //     behavior: "smooth"
    // })

    console.log(currentItem);
    console.log(multiplierLeft);
})

controlRight.addEventListener('click', function(){
    currentItem += 1; 
    if (currentItem > rightSpace -1) {
        currentItem = 0;
    }

    let multiplierRight = itemSize * currentItem;
    containerFilms.style.marginLeft = '-' + multiplierRight + 'px';

    // items[currentItem].scrollIntoView({
    //     inline: "end",
    //     behavior: "smooth"
    // })

    console.log(currentItem);
    console.log(multiplierRight);
})

console.log(items);
console.log(itemSize);