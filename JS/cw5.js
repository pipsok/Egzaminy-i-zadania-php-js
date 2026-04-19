function dodaj(){
    let produkt = document.getElementById("produkt").value;
    let ilosc = document.getElementById("ilosc").value;
    let cena = document.getElementById("cena").value;
    let lista = document.getElementById("lista");

    if(produkt == "" || ilosc == "" || cena == ""){
        window.alert("uzupelnij");
    }
    else{
        let koszt = ilosc * cena;
        let li = document.createElement("li");
        lista.appendChild(li);
        li.innerHTML = produkt + " - " + koszt + "zl";
    }
}
// JAZDA KURWA SAM TO ZROBILEM NEXT SESJA DALSZA MANIPULACJA DOM !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!