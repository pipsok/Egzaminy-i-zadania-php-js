function oblicz(){

let ilosc = document.getElementById("ilosc").value;
let cena = document.getElementById("cena").value;

let iloscint = parseInt(ilosc);
let cenafloat = parseFloat(cena);

if(ilosc == "" || cena == ""){
    window.alert("uzupelnij");
}
else{

    let koszt = iloscint * cenafloat;

    if(koszt > 100){
        koszt = koszt * 0.9;
    }
    if(koszt<50){
        window.alert("za male zamowienie");
        return;
    }

    document.getElementById("wynik").innerHTML = koszt;

}

}