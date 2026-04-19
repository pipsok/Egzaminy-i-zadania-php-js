function policz(){

    let liczby = document.getElementById("liczby").value;

    let rozdzielone = liczby.split(",");

    let suma = 0;

    for(let i = 0; i < rozdzielone.length; i++){

        let liczba = parseInt(rozdzielone[i]);

        suma += liczba;
    }

    document.getElementById("wynik").innerHTML = suma;

}