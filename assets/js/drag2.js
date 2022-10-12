document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");

    dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
    });

    inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
        });
    });

    dropZoneElement.addEventListener("drop", (e) => {
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
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }

    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb", "preview");
        dropZoneElement.appendChild(thumbnailElement);
    }

    // thumbnailElement.dataset.label = file.name;
    let info = document.querySelector(".info");
    info.innerHTML = `<p>${file.name}</p>`;
    let encore = document.createElement("p");
    encore.innerHTML = "Changer ? ";
    info.appendChild(encore);

    let fileSizeLimit = 1024 * 1024 * 1; // 1MB

    // Show thumbnail for image files
    if (file.type.startsWith("image/jpg") || file.type.startsWith("image/jpeg") || file.type.startsWith("image/gif") || file.type.startsWith("image/png")) {
        if (file.size <= fileSizeLimit) {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            }
        } else {
            thumbnailElement.style.backgroundImage = null;
            info.textContent = "Ce fichier est trop volumineux";
        };
    } else {
        thumbnailElement.style.backgroundImage = null;
        info.textContent = "Ce format n'est pas supporté";

    }
}