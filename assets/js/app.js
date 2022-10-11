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
// function previewFile() {
//     const img = document.createElement("div");
//     img.innerHTML = `<img class="preview is-rounded previewImg" src=""></img>`
//     const imgChild = document.querySelector(".imgChild")
//     imgChild.appendChild(img)
//     if (imgChild.childElementCount > 1) {
//         imgChild.removeChild(imgChild.lastChild)
//     }
//     // if (previewImg.src == "") {
//     //     imgChild.removeChild(imgChild.firstChild)
//     // }
//     const preview = document.querySelector('.preview');
//     const file = document.querySelector('input[type=file]').files[0];
//     const reader = new FileReader();
//     const input = document.querySelector('input[type=file]');
//     const infoArea = document.querySelector('.file-upload-info');
//     const maxSize = 1000000;
//     const maxWidth = "150px";
//     const maxHeight = "150px";

//     reader.addEventListener("load", function () {
//         // verify if the file is an image or not
//         if (file.type.match('image.jpg') || file.type.match('image.jpeg') || file.type.match('image.png') || file.type.match('image.gif')) {
//             if (file.size < maxSize) {
//                 preview.src = reader.result;
//             } else {
//                 // imgChild.removeChild(imgChild.firstChild)
//                 infoArea.classList.add("greyText")
//                 infoArea.textContent = "Ce format où la taille n'est pas correct";
//                 setTimeout(() => {
//                     infoArea.textContent = "";
//                 }, 1500)
//             }
//         }
//     }, false);
//     if (file) {
//         reader.readAsDataURL(file);
//     }
// }


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
        profil.src = "http://localhost/blablacampus/assets/img/logo/default.svg"
    }
}