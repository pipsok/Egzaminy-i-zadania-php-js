function oblicz(){
    let a = document.getElementById("a").value;
    let b = document.getElementById("b").value;
    let wynik = document.getElementById("wynik");
    let operacja = document.querySelector('input[name="op"]:checked').value;


    if(a == "" || b == ""){
        alert("ktores z pol jest puste uzupelnij");
    }
    if(operacja == "dodaj"){
        let numa = parseInt(a);
        let numb = parseInt(b);
        let suma = numa + numb;
        wynik.innerHTML = suma;
    }
    else if(operacja == "odejmij"){
        let numa = parseInt(a);
        let numb = parseInt(b);
        let odejmowanie = numa - numb;
        wynik.innerHTML = odejmowanie;
    }
}