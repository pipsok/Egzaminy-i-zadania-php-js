function przelicz(){
    let liczba = document.getElementById("liczba").value;
    let wynik = document.getElementById("wynik");
    let licznik = 0;
    let liczbabinarna = parseInt(liczba).toString(2);
    let wyszlo = "";
    for(let i = liczbabinarna.length - 1; i >= 0; i--){
        wyszlo = liczbabinarna[i] + wyszlo;
        licznik++;
        if(licznik % 4 == 0 && i != 0){
            wyszlo = " " + wyszlo;
        }
    }
    wyszlo += " (2)";
    wynik.innerHTML = wyszlo;
}