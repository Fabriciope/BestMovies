const btnSeeEnter= document.querySelector('i.see.enter');
const btnNotSeeEnter= document.querySelector('.not-see.enter');
const inputPasswordEnter= document.getElementById('passwordEnter');

btnSeeEnter.addEventListener('click', ()=>{
    inputPasswordEnter.type='text';
    btnSeeEnter.style.display='none';
    btnNotSeeEnter.style.display='block';
})
btnNotSeeEnter.addEventListener('click', ()=>{
    inputPasswordEnter.type='password';
    btnSeeEnter.style.display='block';
    btnNotSeeEnter.style.display='none';
})


const btnSeeRegister= document.querySelector('i.see.register');
const btnNotSeeRegister= document.querySelector('.not-see.register');
const inputPasswordRegister= document.getElementById('passwordRegister');

btnSeeRegister.addEventListener('click', ()=>{
    inputPasswordRegister.type='text';
    btnSeeRegister.style.display='none';
    btnNotSeeRegister.style.display='block';
})
btnNotSeeRegister.addEventListener('click', ()=>{
    inputPasswordRegister.type='password';
    btnSeeRegister.style.display='block';
    btnNotSeeRegister.style.display='none';
})


const btnSeeRegisterCS= document.querySelector('i.see.registerCS');
const btnNotSeeRegisterCS= document.querySelector('.not-see.registerCS');
const inputPasswordRegisterCS= document.getElementById('password-Register-CS');

btnSeeRegisterCS.addEventListener('click', ()=>{
    inputPasswordRegisterCS.type='text';
    btnSeeRegisterCS.style.display='none';
    btnNotSeeRegisterCS.style.display='block';
})
btnNotSeeRegisterCS.addEventListener('click', ()=>{
    inputPasswordRegisterCS.type='password';
    btnSeeRegisterCS.style.display='block';
    btnNotSeeRegisterCS.style.display='none';
})


