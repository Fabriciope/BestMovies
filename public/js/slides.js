const controls = document.querySelectorAll('.control');
const bannerItems = document.querySelectorAll('.box-banner');
const containerBanner = document.querySelector('.container-banners');
const bannerMaxItems = bannerItems.length;

const bannerItemSize = bannerItems[0].clientWidth
let bannerCurentItem = 0;

controls.forEach((control)=>{
    control.addEventListener('click', ()=>{
        const isLeft = control.classList.contains('left')
        if(isLeft) {
            bannerCurentItem -= 1;
            console.log(control)
        } else {
            bannerCurentItem += 1;
        }
        if (bannerCurentItem >= bannerMaxItems) {
            bannerCurentItem = 0;
        }
        if (bannerCurentItem < 0) {
            bannerCurentItem = bannerMaxItems -1;
        }

        bannerItems[bannerCurentItem].scrollIntoView({
            block : "center",
            behavior: "smooth"
        })
        console.log(bannerCurentItem);
    })
})

let currentItem = 0;

// currentItem

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


    if (currentItem > rightSpace-1) {
        currentItem = rightSpace -2;

    }
    let multiplierRight = itemSize * currentItem;
    containerFilms.style.marginLeft = '-' + multiplierRight + 'px';
    console.log(section);
}