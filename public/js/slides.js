const controlsBanner = document.querySelectorAll('.control');
const bannerItems = document.querySelectorAll('.box-banner');
const containerBanner = document.querySelector('.container-banners');
const bannerMaxItems = bannerItems.length;

const bannerItemSize = bannerItems[0].clientWidth
let bannerCurentItem = 0;

controlsBanner.forEach((control)=>{
    control.addEventListener('click', ()=>{
        const isLeft = control.classList.contains('left')
        if(isLeft) {
            bannerCurentItem -= 1;
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
        });
    })
})

// setInterval(function(){
//     bannerCurentItem++
//     if (bannerCurentItem >= bannerMaxItems) {
//         bannerCurentItem = 0;
//     }
//     bannerItems[bannerCurentItem].scrollIntoView({
//         block : "center",
//         behavior: "smooth"
//     });
// }, 3000);


// let currentItem = 0;

// function prev(section) {
//     const items = document.querySelectorAll('.box-film.' + section);
//     const itemSize = (items[0].clientWidth + 24) * 3;
//     const containerFilms = document.querySelector('.container-films.' + section);
//     currentItem -= 1; 
//     if (currentItem < 0 ) {
//         currentItem = 0;
//     }

//     let multiplierLeft = itemSize * currentItem;
//     containerFilms.style.marginLeft = '-' + multiplierLeft + 'px';
//     console.log(currentItem)
// }


// function next(section) {
//     const items = document.querySelectorAll('.box-film.' + section);
//     const containerFilms = document.querySelector('.container-films.' + section);
//     const maxItems = items.length;
//     const itemSize = (items[0].clientWidth + 24) * 3;
//     const rightSpace = (maxItems/3);
//     currentItem += 1; 


//     if (currentItem > rightSpace -1) {
//         currentItem = Math.round(rightSpace);

//     }
//     let multiplierRight = itemSize * currentItem;
//     containerFilms.style.marginLeft = '-' + multiplierRight + 'px';
//     console.log(currentItem)
//     console.log(Math.round(rightSpace))
// }


currentItemRecent = 0;


const controls = document.querySelectorAll('.controlMovies');
// const containerFilms = document.querySelector('.container-films');

// const maxItems = items.length;
// let currentItem = 0;
console.log(controls)
controls.forEach((control)=>{
    control.addEventListener('click', ()=>{
        let section = control.classList[2];
        switch(section) {
             case "recent":
                const itemsRecent = document.querySelectorAll('.box-film.recent');
                const maxItemRecent = itemsRecent.length;
                const itemSizeRecent = (itemsRecent[0].clientWidth + 24) * 3;
                const maxSlidesRecent = maxItemRecent/3;
    
                const containerMoviesRecent = document.querySelector('.container-films.recent')
                if (control.classList.contains('left')){
                    currentItemRecent -= 1;
                } else {
                    currentItemRecent += 1;
                }

                if (currentItemRecent < 0) {
                    currentItemRecent = 0;
                }
                if (currentItemRecent > maxSlidesRecent) {
                    currentItemRecent = maxSlidesRecent -1;
                }
    
                let multiplierSlidesRecent = itemSizeRecent * currentItemRecent;
                containerMoviesRecent.style.marginLeft = '-' + multiplierSlidesRecent + 'px';
                console.log(currentItemRecent);
                console.log('max slides:'+maxSlidesRecent)
            break;
        }
    })

   
})

// controlLeft.addEventListener('click', function() {
//     currentItem -= 1; 
//     if (currentItem < 0 ) {
//         currentItem = 0;
//     }

//     items[currentItem].scrollIntoView({
//         inline: "center",
//         behavior: "smooth"
//     })

//     console.log(currentItem);
// })

// controlRight.addEventListener('click', function(){
//     currentItem += 1; 
//     if (currentItem > maxItems -1) {
//         currentItem = 0;
//     }
//     items[currentItem].scrollIntoView({
//         inline: "center",
//         behavior: "smooth"
//     })
//     console.log(currentItem);
// })

// console.log(currentItem);