let url = window.location.href;
let splitUrl = url.split("&");

if (splitUrl[1] === 'assess') {
    const assess = document.querySelector('.assessments');
    assess.scrollIntoView({
        block : "end",
        behavior: "smooth"
    });
}

