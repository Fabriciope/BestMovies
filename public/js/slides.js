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

currentItemRecent = 0;
currentItemAction = 0;
currentItemDrama = 0;
currentItemThriller = 0;
currentItemSciencFiction = 0;
currentItemFantasy = 0;
currentItemRomance = 0;
currentItemAdventure = 0;
currentItemHorror = 0;

const controls = document.querySelectorAll('.controlMovies');

function slides(section, control){
    const containerMovies = document.querySelector('.container-films.' + section);
    const items = document.querySelectorAll('.box-film.' + section);
    const maxItem = items.length;
    let gap = document.defaultView.getComputedStyle(containerMovies, null)['gap']
    gap = gap.slice(0, -2);
    const itemSize = (items[0].clientWidth + Math.round(gap) ) * 2;
    const maxSlides = maxItem/2;
    switch (section){
        case 'novos':
            if (control.classList.contains('left')){
                currentItemRecent -= 1;
            } else {
                currentItemRecent += 1;
            }
        
            if (currentItemRecent < 0) {
                currentItemRecent = 0;
            }
            if (currentItemRecent > maxSlides) {
                currentItemRecent = maxSlides -1;
            }
            currentItem = currentItemRecent;
         break;
        case 'ação':
            if (control.classList.contains('left')){
                currentItemAction -= 1;
            } else {
                currentItemAction += 1;
            }
        
            if (currentItemAction < 0) {
                currentItemAction = 0;
            }
            if (currentItemAction > maxSlides) {
                currentItemAction = 0;
            }
            currentItem = currentItemAction;
         break;
        case 'aventura':
            if (control.classList.contains('left')){
                currentItemAdventure -= 1;
            } else {
                currentItemAdventure += 1;
            }
        
            if (currentItemAdventure < 0) {
                currentItemAdventure = 0;
            }
            if (currentItemAdventure > maxSlides) {
                currentItemAdventure = 0;
            }
            currentItem = currentItemAdventure;
         break;
        case 'drama':
            if (control.classList.contains('left')){
                currentItemDrama -= 1;
            } else {
                currentItemDrama += 1;
            }
        
            if (currentItemDrama < 0) {
                currentItemDrama = 0;
            }
            if (currentItemDrama > maxSlides) {
                currentItemDrama = 0;
            }
            currentItem = currentItemDrama;
         break;
        case 'ficção':
            if (control.classList.contains('left')){
                currentItemSciencFiction -= 1;
            } else {
                currentItemSciencFiction += 1;
            }
        
            if (currentItemSciencFiction < 0) {
                currentItemSciencFiction = 0;
            }
            if (currentItemSciencFiction > maxSlides) {
                currentItemSciencFiction = 0;
            }
            currentItem = currentItemSciencFiction;
         break;
        case 'suspense':
            if (control.classList.contains('left')){
                currentItemThriller -= 1;
            } else {
                currentItemThriller += 1;
            }
        
            if (currentItemThriller < 0) {
                currentItemThriller = 0;
            }
            if (currentItemThriller > maxSlides) {
                currentItemThriller = 0;
            }
            currentItem = currentItemThriller;
         break;
        case 'fantasia':
            if (control.classList.contains('left')){
                currentItemFantasy -= 1;
            } else {
                currentItemFantasy += 1;
            }
        
            if (currentItemFantasy < 0) {
                currentItemFantasy = 0;
            }
            if (currentItemFantasy > maxSlides) {
                currentItemFantasy = 0;
            }
            currentItem = currentItemFantasy;
         break;
        case 'romance':
            if (control.classList.contains('left')){
                currentItemRomance -= 1;
            } else {
                currentItemRomance += 1;
            }
        
            if (currentItemRomance < 0) {
                currentItemRomance = 0;
            }
            if (currentItemRomance > maxSlides) {
                currentItemRomance = 0;
            }
            currentItem = currentItemRomance;
         break;
        case 'terror':
            if (control.classList.contains('left')){
                currentItemHorror -= 1;
            } else {
                currentItemHorror += 1;
            }
        
            if (currentItemHorror < 0) {
                currentItemHorror = 0;
            }
            if (currentItemHorror > maxSlides) {
                currentItemHorror = 0;
            }
            currentItem = currentItemHorror;
         break;
    }
    let multiplierSlides = itemSize * currentItem;
    containerMovies.style.marginLeft = '-' + multiplierSlides + 'px';
}

controls.forEach((control)=>{
    control.addEventListener('click', ()=>{
        let section = control.classList[2];
        switch(section) {
            case 'novos':
                slides(section, control);
             break;
            case 'ação':
                slides(section, control);
             break;
            case 'aventura':
                slides(section, control);
             break;
            case 'drama':
                slides(section, control);
             break;
            case 'ficção':
                slides(section, control);
             break;
            case 'suspense':
                slides(section, control);
             break;
            case 'fantasia':
                slides(section, control);
             break;
            case 'romance':
                slides(section, control);
             break;
            case 'terror':
                slides(section, control);
             break;
                
        }
    })
})






