let numer = 1;
function nastepne(){
    if(numer >= 7){
        numer = 0;
    }
    let zdjecie = document.getElementById("glowne");
    numer++;
    zdjecie.setAttribute("src", numer + ".jpg");
}
function poprzednie(){
    if(numer<= 1){
       numer = 8;
    }
    let zdjecie = document.getElementById("glowne");
    numer--;
    zdjecie.setAttribute("src", numer + ".jpg");

}
function efekt1(){
    let radio = document.querySelector('input[name="efekt"]:checked');
    let zdjecie = document.getElementById("glowne");

    if(radio == null){
        window.alert("wybierz opcje");
        return;
    }
    let zaznaczone = radio.value;
    if(zaznaczone == "blur"){
        zdjecie.style.filter = "blur(5px)";
    }
    else if(zaznaczone == "sepia"){
        zdjecie.style.filter = "sepia(100%)";
    }
    else if(zaznaczone == "invert"){
        zdjecie.style.filter = "invert(100%)";
    }
}
function efekt2(){
    let zdjecie = document.getElementById("glowne");
    let slider = document.getElementById("slider");
    let sliderval = slider.value;
    zdjecie.style.filter = "brightness("+ sliderval +"%)";
}