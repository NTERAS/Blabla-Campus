const updel = document.querySelectorAll(".trajets")
const optionEditDel = document.querySelectorAll(".optionEditDel")
const updelActive = () => {
    for (let i = 0; i < updel.length; i++) {
        updel[i].addEventListener("click", function () {
            for (let j = 0; j < updel.length; j++) {
                optionEditDel[j].classList.add("dsn")
                updel[j].classList.remove("dsn");
            }
            updel[i].classList.add("dsn");
            optionEditDel[i].classList.remove("dsn");
            // updel[i].innerHTML = editDel;
        });
    }
}
updelActive();


// bouton annuler
const cancel = document.querySelectorAll(".reservation")
optionAnnulation = document.querySelectorAll(".optionAnnulation")
const Cancel = () => {
    for (let i = 0; i < cancel.length; i++) {
        cancel[i].addEventListener("click", function () {
            for (let j = 0; j < cancel.length; j++) {
                optionAnnulation[j].classList.add("dsn")
                cancel[j].classList.remove("dsn");
            }
            cancel[i].classList.add("dsn");
            optionAnnulation[i].classList.remove("dsn");
        });
    }
}
Cancel();


let place1;
let click = true;
if (document.querySelector("#place") != null) {
    place1 = document.querySelector("#place")
    place1.addEventListener("click", function () {
        if (click && place1.value == "") {
            place1.value = 1;
            click = false;
        }
    })
}

let p;
if (document.querySelector("#password") != null) {
    p = document.querySelector("#password");
}

function strength() {
    let strength = 0;
    if (p.value.match(/[a-z]+/)) {
        strength += 1;
    }
    if (p.value.match(/[A-Z]+/)) {
        strength += 1;
    }
    if (p.value.match(/[0-9]+/)) {
        strength += 1;
    }
    if (p.value.match(/[$@#&!]+/)) {
        strength += 1;
    }
    if (p.value.length > 8) {
        strength += 1;
    }
    if (strength == 1) {
        p.style.outlineColor = "red";
    } else if (strength == 2) {
        p.style.outlineColor = "orange";
    } else if (strength == 3) {
        p.style.outlineColor = "yellow";
    }
}
// } else if (strength == 4) {
//     p.style.outlineColor = "green";
// } else if (strength == 5) {
//     p.style.outlineColor = "yellow";
// }
if (p != null) {
    p.addEventListener("keyup", () => {
        strength();
    })
}



// profil defautlt 
let profil
if (document.querySelector(".pp") != null) {
    profil = document.querySelector(".pp");
    if (profil.src.length <= 50) {
        // profil.src = "http://localhost/blablacampus/assets/img/logo/default.svg"
        profil.src = "https://miro.medium.com/max/720/1*W35QUSvGpcLuxPo3SRTH4w.png"
    }
}