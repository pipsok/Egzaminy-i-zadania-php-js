function dodaj(){
    let plik = document.getElementById("wybierz").files[0].name; ;
    let kopia = document.getElementById("kopia").value;
    let typ = document.querySelector('input[name="radio1"]:checked').value; //ZAPAMIETAC DOKLADNA PISOWNIE TEGO KURESTWA
    let blok = document.getElementById("koszyk");
    let cena = 0;
    if(typ == "blyszczacy"){
        cena = kopia * 1.5;
    }
    else if(typ == "matowy"){
        cena = kopia * 2;
    }
    let zdj = document.createElement("img")
    zdj.src = plik;
    blok.appendChild(zdj);
    let kopy = document.createElement("p");
    kopy.innerText = "Liczba kopii: "+kopia;
    blok.appendChild(kopy);
    let cenaa = document.createElement("p");
    cenaa.innerText = "Cena: "+cena;
    blok.appendChild(cenaa);
}