function odp(){
    let wiadomosc = document.getElementById("wiadomosc");
    let wynik = document.getElementById("wynik");
    let wynik2 = document.getElementById("wynik2");
    let odpowiedzi = ["hej", "siema", "cos"];
    let randomodp = Math.floor(Math.random() * odpowiedzi.length);
    let nowawiad = document.createElement("div");
    nowawiad.setAttribute("id","wynik2");
    wynik2.appendChild(nowawiad);
    nowawiad.innerHTML = "bot: " +odpowiedzi[randomodp];
    let nowawiaduser = document.createElement("div");
    nowawiad.setAttribute("id","wynik");
    wynik2.appendChild(nowawiaduser);
    nowawiaduser.innerHTML = "user: " + wiadomosc.value;
}