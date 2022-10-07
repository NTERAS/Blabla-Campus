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


// voir la pp en prévisualisation
function previewFile() {
    const img = document.createElement("div");
    img.innerHTML = `<img class="preview is-rounded" src=""></img>`
    const imgChild = document.querySelector(".imgChild")
    imgChild.appendChild(img)
    if (imgChild.childElementCount > 1) {
        imgChild.removeChild(imgChild.lastChild)
    }
    const preview = document.querySelector('.preview');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();
    const input = document.querySelector('input[type=file]');
    const infoArea = document.querySelector('.file-upload-info');
    const maxSize = 1500000;

    reader.addEventListener("load", function () {
        // verify if the file is an image or not
        if (file.type.match('image.*')) {
            preview.src = reader.result;
        } else {
            imgChild.removeChild(imgChild.firstChild)
            infoArea.classList.add("greyText")
            infoArea.textContent = "Le fichier n'est pas une image";
            setTimeout(() => {
                infoArea.textContent = "";
            }, 1500)
        }
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
    if (file.size > maxSize) {
        infoArea.classList.add("greyText")
        infoArea.textContent = "Le fichier est trop volumineux";
        setTimeout(() => {
            infoArea.textContent = "";
        }, 1500)
        input.value = "";
        imgChild.removeChild(imgChild.firstChild)
    }
}

// const place1 = document.querySelector("#place")
// let click = true;

// function place() {
//     place1.addEventListener("click", function () {
//         if (click && place1.value == "") {
//             place1.value = 1;
//             click = false;
//         }
//     })
// }
// place();

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
    // verify the strength of the password
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
        p.style.backgroundColor = "red";
    } else if (strength == 2) {
        p.style.backgroundColor = "orange";
    } else if (strength == 3) {
        p.style.backgroundColor = "yellow";
    } else if (strength == 4) {
        p.style.backgroundColor = "green";
    } else if (strength == 5) {
        p.style.backgroundColor = "blue";
    }
}
if (p != null) {
    p.addEventListener("keyup", () => {
        strength();
    })
}

let a = querySelectorAll("a")
opac.forEach(a => {
    a.addEventListener("click", () => {
        document.querySelector(body).style.opacity = "0.5"
    })

});