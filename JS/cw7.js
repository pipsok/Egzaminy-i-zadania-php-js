function oblicz(){
    let szerokosc = document.getElementById("szerokosc").value;
    let dlugosc = document.getElementById("dlugosc").value;
    if(szerokosc == "" || dlugosc == ""){
        window.alert("wpisz dane");
    }
    else{
        let pole = parseFloat(szerokosc) * parseFloat(dlugosc);
        let zaznaczoneRadio = document.querySelector('input[name="typ"]:checked');
        let wynik = document.getElementById("wynik");

        if(zaznaczoneRadio == null){
        wynik.innerHTML = "Wprowadź poprawne dane";
        return;
        }

        let zaznaczone = zaznaczoneRadio.value;
        let koszt = 0;
        if(zaznaczone == "laminowane"){
            koszt = pole * 12;
            wynik.innerHTML = "Pole to: "+pole+", a koszt calkowity to: " + koszt;
        }
        else if(zaznaczone == "winylowe"){
            koszt = pole * 14;
            wynik.innerHTML = "Pole to: "+pole+", a koszt calkowity to: " + koszt;
        }
        else if(zaznaczone == "deska"){
            koszt = pole * 18; //te liczby szanowny chacie gpt to sa te koszty przypisane do kazdego z nich
            wynik.innerHTML = "Pole to: "+pole+", a koszt calkowity to: " + koszt;
        }
    }
}