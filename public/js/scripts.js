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


const btnSeeCadastrar= document.querySelector('i.see.cadastrar');
const btnNotSeeCadastrar= document.querySelector('.not-see.cadastrar');
const inputPasswordCadastrar= document.getElementById('passwordCadastrar');

btnSeeCadastrar.addEventListener('click', ()=>{
    inputPasswordCadastrar.type='text';
    btnSeeCadastrar.style.display='none';
    btnNotSeeCadastrar.style.display='block';
})
btnNotSeeCadastrar.addEventListener('click', ()=>{
    inputPasswordCadastrar.type='password';
    btnSeeCadastrar.style.display='block';
    btnNotSeeCadastrar.style.display='none';
})


const btnSeeCadastrarCF= document.querySelector('i.see.cadastrarCF');
const btnNotSeeCadastrarCF= document.querySelector('.not-see.cadastrarCF');
const inputPasswordCadastrarCF= document.getElementById('password-Cadastrar-CF');

btnSeeCadastrarCF.addEventListener('click', ()=>{
    inputPasswordCadastrarCF.type='text';
    btnSeeCadastrarCF.style.display='none';
    btnNotSeeCadastrarCF.style.display='block';
})
btnNotSeeCadastrarCF.addEventListener('click', ()=>{
    inputPasswordCadastrarCF.type='password';
    btnSeeCadastrarCF.style.display='block';
    btnNotSeeCadastrarCF.style.display='none';
})


