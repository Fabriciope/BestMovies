const textFile= document.querySelector('.text-file');
const inputImage= document.getElementById('imageFile');

inputImage.addEventListener('change', function(){
    textFile.innerHTML = this.files[0].name;
});
