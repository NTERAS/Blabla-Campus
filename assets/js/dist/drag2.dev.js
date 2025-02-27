"use strict";

document.querySelectorAll(".drop-zone__input").forEach(function (inputElement) {
  var dropZoneElement = inputElement.closest(".drop-zone");
  dropZoneElement.addEventListener("click", function (e) {
    inputElement.click();
  });
  inputElement.addEventListener("change", function (e) {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });
  dropZoneElement.addEventListener("dragover", function (e) {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });
  ["dragleave", "dragend"].forEach(function (type) {
    dropZoneElement.addEventListener(type, function (e) {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });
  dropZoneElement.addEventListener("drop", function (e) {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});
/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */

function updateThumbnail(dropZoneElement, file) {
  var thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb"); // First time - remove the prompt

  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  } // First time - there is no thumbnail element, so lets create it


  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb", "preview");
    dropZoneElement.appendChild(thumbnailElement);
  } // thumbnailElement.dataset.label = file.name;


  var info = document.querySelector(".info");
  info.innerHTML = "<p>".concat(file.name, "</p>");
  var encore = document.createElement("p");
  encore.innerHTML = "Changer ? ";
  info.appendChild(encore);
  var fileSizeLimit = 1024 * 1024 * 1; // 1MB
  // Show thumbnail for image files

  if (file.type.startsWith("image/jpg") || file.type.startsWith("image/jpeg") || file.type.startsWith("image/gif") || file.type.startsWith("image/png")) {
    if (file.size <= fileSizeLimit) {
      var reader = new FileReader();
      reader.readAsDataURL(file);

      reader.onload = function () {
        thumbnailElement.style.backgroundImage = "url('".concat(reader.result, "')");
      };
    } else {
      thumbnailElement.style.backgroundImage = null;
      info.textContent = "Ce fichier est trop volumineux";
    }

    ;
  } else {
    thumbnailElement.style.backgroundImage = null;
    info.textContent = "Ce format n'est pas supporté";
  }
}