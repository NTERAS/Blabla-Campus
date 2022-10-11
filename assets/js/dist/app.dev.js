"use strict";

var updel = document.querySelectorAll(".trajets");
var optionEditDel = document.querySelectorAll(".optionEditDel");

var updelActive = function updelActive() {
  var _loop = function _loop(i) {
    updel[i].addEventListener("click", function () {
      for (var j = 0; j < updel.length; j++) {
        optionEditDel[j].classList.add("dsn");
        updel[j].classList.remove("dsn");
      }

      updel[i].classList.add("dsn");
      optionEditDel[i].classList.remove("dsn"); // updel[i].innerHTML = editDel;
    });
  };

  for (var i = 0; i < updel.length; i++) {
    _loop(i);
  }
};

updelActive(); // bouton annuler

var cancel = document.querySelectorAll(".reservation");
optionAnnulation = document.querySelectorAll(".optionAnnulation");

var Cancel = function Cancel() {
  var _loop2 = function _loop2(i) {
    cancel[i].addEventListener("click", function () {
      for (var j = 0; j < cancel.length; j++) {
        optionAnnulation[j].classList.add("dsn");
        cancel[j].classList.remove("dsn");
      }

      cancel[i].classList.add("dsn");
      optionAnnulation[i].classList.remove("dsn");
    });
  };

  for (var i = 0; i < cancel.length; i++) {
    _loop2(i);
  }
};

Cancel(); // voir la pp en prévisualisation
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

var place1;
var click = true;

if (document.querySelector("#place") != null) {
  place1 = document.querySelector("#place");
  place1.addEventListener("click", function () {
    if (click && place1.value == "") {
      place1.value = 1;
      click = false;
    }
  });
}

var p;

if (document.querySelector("#password") != null) {
  p = document.querySelector("#password");
}

function strength() {
  var strength = 0;

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
} // } else if (strength == 4) {
//     p.style.outlineColor = "green";
// } else if (strength == 5) {
//     p.style.outlineColor = "yellow";
// }


if (p != null) {
  p.addEventListener("keyup", function () {
    strength();
  });
} // profil defautlt 


var profil;

if (document.querySelector(".pp") != null) {
  profil = document.querySelector(".pp");

  if (profil.src.length <= 50) {
    profil.src = "http://localhost/blablacampus/assets/img/logo/default.svg";
  }
}