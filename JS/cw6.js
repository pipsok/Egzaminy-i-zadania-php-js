function wykonane(btn){
    if(btn.parentElement.style.textDecoration != "line-through"){
        btn.parentElement.style.textDecoration = "line-through";
        btn.parentElement.style.backgroundColor = "lightgreen";
    }
    else{
        btn.parentElement.style.textDecoration = "none";
        btn.parentElement.style.backgroundColor = "white";
    }
    //btn.parentElement.style.textDecoration = "line-through";
    //btn.parentElement.style.backgroundColor = "red"; fajne zmienianie stylu DOM
}
function dodaj(){
    let tekst = document.getElementById("noweZadanie").value;
    let inpucik = document.getElementById("noweZadanie");
    let lista = document.getElementById("lista");
    let li = document.createElement("li");
    let przycisk = document.createElement("button");
    przycisk.setAttribute("onclick","wykonane(this)");
    przycisk.innerHTML = "Wykonane";
    lista.appendChild(li);
    li.innerHTML = tekst + " ";
    li.appendChild(przycisk);
    inpucik.value = "";
}