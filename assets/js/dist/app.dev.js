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

function previewFile() {
  var img = document.createElement("div");
  img.innerHTML = "<img class=\"preview is-rounded\" src=\"\"></img>";
  var imgChild = document.querySelector(".imgChild");
  imgChild.appendChild(img);

  if (imgChild.childElementCount > 1) {
    imgChild.removeChild(imgChild.lastChild);
  }

  var preview = document.querySelector('.preview');
  var file = document.querySelector('input[type=file]').files[0];
  var reader = new FileReader();
  var input = document.querySelector('input[type=file]');
  var infoArea = document.querySelector('.file-upload-info');
  var maxSize = 1500000;
  reader.addEventListener("load", function () {
    // verify if the file is an image or not
    if (file.type.match('image.*')) {
      preview.src = reader.result;
    } else {
      imgChild.removeChild(imgChild.firstChild);
      infoArea.classList.add("greyText");
      infoArea.textContent = "Le fichier n'est pas une image";
      setTimeout(function () {
        infoArea.textContent = "";
      }, 1500);
    }
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }

  if (file.size > maxSize) {
    infoArea.classList.add("greyText");
    infoArea.textContent = "Le fichier est trop volumineux";
    setTimeout(function () {
      infoArea.textContent = "";
    }, 1500);
    input.value = "";
    imgChild.removeChild(imgChild.firstChild);
  }
} // const place1 = document.querySelector("#place")
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
  p = document.querySelector("#password"); // verify the strength of the password
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
  p.addEventListener("keyup", function () {
    strength();
  });
}

var a = querySelectorAll("a");
opac.forEach(function (a) {
  a.addEventListener("click", function () {
    document.querySelector(body).style.opacity = "0.5";
  });
});