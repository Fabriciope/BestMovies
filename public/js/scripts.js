const btnSeeEntrar= document.querySelector('i.see.entrar');
const btnNotSeeEntrar= document.querySelector('.not-see.entrar');
const inputPasswordEntrar= document.getElementById('passwordEntrar');

btnSeeEntrar.addEventListener('click', ()=>{
    inputPasswordEntrar.type='text';
    btnSeeEntrar.style.display='none';
    btnNotSeeEntrar.style.display='block';
})
btnNotSeeEntrar.addEventListener('click', ()=>{
    inputPasswordEntrar.type='password';
    btnSeeEntrar.style.display='block';
    btnNotSeeEntrar.style.display='none';
})


const btnSeeRegistrar= document.querySelector('i.see.registrar');
const btnNotSeeRegistrar= document.querySelector('.not-see.registrar');
const inputPasswordRegistrar= document.getElementById('passwordRegistrar');

btnSeeRegistrar.addEventListener('click', ()=>{
    inputPasswordRegistrar.type='text';
    btnSeeRegistrar.style.display='none';
    btnNotSeeRegistrar.style.display='block';
})
btnNotSeeRegistrar.addEventListener('click', ()=>{
    inputPasswordRegistrar.type='password';
    btnSeeRegistrar.style.display='block';
    btnNotSeeRegistrar.style.display='none';
})


const btnSeeRegistrarCS= document.querySelector('i.see.registrarCS');
const btnNotSeeRegistrarCS= document.querySelector('.not-see.registrarCS');
const inputPasswordRegistrarCS= document.getElementById('password-Registrar-CS');

btnSeeRegistrarCS.addEventListener('click', ()=>{
    inputPasswordRegistrarCS.type='text';
    btnSeeRegistrarCS.style.display='none';
    btnNotSeeRegistrarCS.style.display='block';
})
btnNotSeeRegistrarCS.addEventListener('click', ()=>{
    inputPasswordRegistrarCS.type='password';
    btnSeeRegistrarCS.style.display='block';
    btnNotSeeRegistrarCS.style.display='none';
})


