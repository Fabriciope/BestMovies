const textFile= document.querySelector('.text-file');
const inputImage= document.getElementById('imageFile');
const image= document.getElementById('image');

inputImage.addEventListener('change', function(){
    textFile.innerHTML = this.files[0].name;
    
    const reader = new FileReader();
    
    reader.onload= ()=>{
        image.src = reader.result;
    }
    
    reader.readAsDataURL(image.files[0])
});
