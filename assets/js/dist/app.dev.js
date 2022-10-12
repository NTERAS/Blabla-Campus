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

Cancel();
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
    // profil.src = "http://localhost/blablacampus/assets/img/logo/default.svg"
    profil.src = "https://miro.medium.com/max/720/1*W35QUSvGpcLuxPo3SRTH4w.png";
  }
}