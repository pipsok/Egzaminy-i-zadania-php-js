function oblicz(){

    let liczba = document.getElementById("liczba").value;

    if(liczba == ""){
        alert("Podaj liczbę");
    }
    else if(liczba < 0){
        alert("liczba musi byc dodatnia");
    }
    else if(liczba >= 100){
        alert("liczba jest za duza");
    }
    else{

        let num = parseInt(liczba);
        let kwadrat = num * num;

        document.getElementById("wynik").innerHTML = kwadrat;
    }
}