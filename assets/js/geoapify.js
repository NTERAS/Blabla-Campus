/* 
	The addressAutocomplete takes as parameters:
  - a container element (div)
  - callback to notify about address selection
*/
const cache = document.getElementById("cache");
// const addTrajet = document.querySelector(".addTrajet");
const addEtape = document.querySelector(".addEtape");
let inputElement2 = document.getElementById("location");
let inputElement = document.getElementById("locationAdd");
let inputElement3 = document.getElementById("locationAdd2");
let autocompleContainer13 = document.getElementById("autocomplete-container13");
let info = document.getElementById("info");
const firstAutoC = document.querySelector(".firstAutoC");

inputElement2.addEventListener("click", function () {
    info.textContent = "🛑adresse complète nécessaire🛑 ";
    info.classList.add("redColor");
})



function addressAutocomplete(containerElement, callback) {
    // create input element
    // var inputElement = document.createElement("input");
    // inputElement.setAttribute("type", "text");
    // inputElement.placeholder = "etape";
    // inputElement.name = `locationAdd`;
    // inputElement.id = `locationAdd`;
    // inputElement.classList.add("input", "my-3", "py-5", "isEmpty");
    // containerElement.appendChild(inputElement);


    /* Current autocomplete items data (GeoJSON.Feature) */
    var currentItems;
    // let inputElement = document.getElementById("locationAdd");

    /* Active request promise reject function. To be able to cancel the promise when a new request comes */
    var currentPromiseReject;

    /* Focused item in the autocomplete list. This variable is used to navigate with buttons */
    var focusedItemIndex;

    /* Execute a function when someone writes in the text field: */
    inputElement.addEventListener("input", function (e) {
        var currentValue = this.value;

        /* Close any already open dropdown list */
        closeDropDownList();

        // Cancel previous request promise
        if (currentPromiseReject) {
            currentPromiseReject({
                canceled: true
            });
        }



        /* Create a new promise and send geocoding request */
        var promise = new Promise((resolve, reject) => {
            currentPromiseReject = reject;

            var apiKey = "466e0f43eb46480eb308182662bcfca7";
            var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&limit=5&filter=countrycode:fr&&apiKey=${apiKey}`;

            fetch(url)
                .then(response => {
                    // check if the call was successful
                    if (response.ok) {
                        response.json().then(data => resolve(data));
                    } else {
                        response.json().then(data => reject(data));
                    }
                });
        });

        promise.then((data) => {
            currentItems = data.features;

            /*create a DIV element that will contain the items (values):*/
            var autocompleteItemsElement = document.createElement("div");
            autocompleteItemsElement.setAttribute("class", "autocomplete-items");
            containerElement.appendChild(autocompleteItemsElement);
            if (document.querySelector("#autocomplete-container1").childElementCount == 2) {
                firstAutoC.classList.remove("enAvant");
                cache.classList.add("cacheCache");
                if (addTrajet != null) {
                    addTrajet.disabled = true;
                }
                addEtape.classList.add("enAvant");

            }

            /* For each item in the results */
            data.features.forEach((feature, index) => {
                /* Create a DIV element for each element: */
                var itemElement = document.createElement("DIV");
                /* Set formatted address as item value */
                itemElement.innerHTML = feature.properties.formatted;

                /* Set the value for the autocomplete text field and notify: */
                itemElement.addEventListener("click", function (e) {
                    inputElement.value = currentItems[index].properties.formatted;

                    callback(currentItems[index]);

                    /* Close the list of autocompleted values: */
                    closeDropDownList();
                });

                autocompleteItemsElement.appendChild(itemElement);
            });
        }, (err) => {
            if (!err.canceled) {
                console.log(err);
            }
        });
    });

    /* Add support for keyboard navigation */
    inputElement.addEventListener("keydown", function (e) {
        var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
        if (autocompleteItemsElement) {
            var itemElements = autocompleteItemsElement.getElementsByTagName("div");
            if (e.keyCode == 40) {
                e.preventDefault();
                /*If the arrow DOWN key is pressed, increase the focusedItemIndex variable:*/
                focusedItemIndex = focusedItemIndex !== itemElements.length - 1 ? focusedItemIndex + 1 : 0;
                /*and and make the current item more visible:*/
                setActive(itemElements, focusedItemIndex);
            } else if (e.keyCode == 38) {
                e.preventDefault();

                /*If the arrow UP key is pressed, decrease the focusedItemIndex variable:*/
                focusedItemIndex = focusedItemIndex !== 0 ? focusedItemIndex - 1 : focusedItemIndex = (itemElements.length - 1);
                /*and and make the current item more visible:*/
                setActive(itemElements, focusedItemIndex);
            } else if (e.keyCode == 13) {
                /* If the ENTER key is pressed and value as selected, close the list*/
                e.preventDefault();
                if (focusedItemIndex > -1) {
                    closeDropDownList();
                }
            }
        } else {
            if (e.keyCode == 40) {
                /* Open dropdown list again */
                var event = document.createEvent('Event');
                event.initEvent('input', true, true);
                inputElement.dispatchEvent(event);
            }
        }
    });

    function setActive(items, index) {
        if (!items || !items.length) return false;

        for (var i = 0; i < items.length; i++) {
            items[i].classList.remove("autocomplete-active");
        }

        /* Add class "autocomplete-active" to the active element*/
        items[index].classList.add("autocomplete-active");

        // Change input value and notify
        inputElement.value = currentItems[index].properties.formatted;
        callback(currentItems[index]);
    }

    function closeDropDownList() {
        var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
        if (autocompleteItemsElement) {
            containerElement.removeChild(autocompleteItemsElement);
        }

        focusedItemIndex = -1;
    }

    function addIcon(buttonElement) {
        var svgElement = document.createElementNS("http://www.w3.org/2000/svg", 'svg');
        svgElement.setAttribute('viewBox', "0 0 24 24");
        svgElement.setAttribute('height', "24");

        var iconElement = document.createElementNS("http://www.w3.org/2000/svg", 'path');
        iconElement.setAttribute("d", "M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z");
        iconElement.setAttribute('fill', 'currentColor');
        svgElement.appendChild(iconElement);
        buttonElement.appendChild(svgElement);
    }

    /* Close the autocomplete dropdown when the document is clicked. 
      Skip, when a user clicks on the input field */
    /* Close the autocomplete dropdown when the document is clicked. 
    Skip, when a user clicks on the input field */
    document.querySelector("#autocomplete-container1").addEventListener("click", function (e) {
        if (e.target !== inputElement) {

            if (document.querySelector("#autocomplete-container1").childElementCount == 1) {
                cache.classList.remove("cacheCache");
                if (addTrajet != null) {
                    addTrajet.disabled = false;
                }
            }
            closeDropDownList();
        } else if (!containerElement.querySelector(".autocomplete-items")) {
            // open dropdown list again
            var event = document.createEvent('Event');
            event.initEvent('input', true, true);
            inputElement.dispatchEvent(event);
        }
    });

}

function addressAutocomplete3(containerElement, callback) {
    // create input element
    // var inputElement = document.createElement("input");
    // inputElement.setAttribute("type", "text");
    // let nbLocation = 2;
    // const addNbLocation = document.querySelector(".addNbLocation");
    // inputElement.name = `locationAdd2`;
    // inputElement.id = `locationAdd2`;
    // inputElement.placeholder = "Etape";
    // addNbLocation.addEventListener("click", (e) => {
    //     inputElement.name = `locationAdd${nbLocation}`;
    //     inputElement.id = `locationAdd${nbLocation}`;
    //     inputElement.dataset.id = `nbLocation${nbLocation}`;
    //     return;
    // });
    // inputElement.classList.add("input", "my-3", "py-5", "isEmpty", "enAvant");
    // containerElement.appendChild(inputElement);



    /* Current autocomplete items data (GeoJSON.Feature) */
    var currentItems;

    /* Active request promise reject function. To be able to cancel the promise when a new request comes */
    var currentPromiseReject;

    /* Focused item in the autocomplete list. This variable is used to navigate with buttons */
    var focusedItemIndex;

    /* Execute a function when someone writes in the text field: */
    inputElement3.addEventListener("input", function (e) {
        var currentValue = this.value;

        /* Close any already open dropdown list */
        closeDropDownList();

        // Cancel previous request promise
        if (currentPromiseReject) {
            currentPromiseReject({
                canceled: true
            });
        }

        /* Create a new promise and send geocoding request */
        var promise = new Promise((resolve, reject) => {
            currentPromiseReject = reject;

            var apiKey = "466e0f43eb46480eb308182662bcfca7";
            var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&limit=5&filter=countrycode:fr&&apiKey=${apiKey}`;

            fetch(url)
                .then(response => {
                    // check if the call was successful
                    if (response.ok) {
                        response.json().then(data => resolve(data));
                    } else {
                        response.json().then(data => reject(data));
                    }
                });
        });

        promise.then((data) => {
            currentItems = data.features;

            /*create a DIV element that will contain the items (values):*/
            var autocompleteItemsElement = document.createElement("div");
            autocompleteItemsElement.setAttribute("class", "autocomplete-items");
            containerElement.appendChild(autocompleteItemsElement);
            if (document.querySelector("#autocomplete-container13").childElementCount == 2) {
                cache.classList.add("cacheCache");
                if (addTrajet != null) {
                    addTrajet.disabled = true;
                }
            }

            /* For each item in the results */
            data.features.forEach((feature, index) => {
                /* Create a DIV element for each element: */
                var itemElement = document.createElement("DIV");
                /* Set formatted address as item value */
                itemElement.innerHTML = feature.properties.formatted;

                /* Set the value for the autocomplete text field and notify: */
                itemElement.addEventListener("click", function (e) {
                    inputElement3.value = currentItems[index].properties.formatted;

                    callback(currentItems[index]);

                    /* Close the list of autocompleted values: */
                    closeDropDownList();
                });

                autocompleteItemsElement.appendChild(itemElement);
            });
        }, (err) => {
            if (!err.canceled) {
                console.log(err);
            }
        });
    });

    /* Add support for keyboard navigation */
    inputElement3.addEventListener("keydown", function (e) {
        var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
        if (autocompleteItemsElement) {
            var itemElements = autocompleteItemsElement.getElementsByTagName("div");
            if (e.keyCode == 40) {
                e.preventDefault();
                /*If the arrow DOWN key is pressed, increase the focusedItemIndex variable:*/
                focusedItemIndex = focusedItemIndex !== itemElements.length - 1 ? focusedItemIndex + 1 : 0;
                /*and and make the current item more visible:*/
                setActive(itemElements, focusedItemIndex);
            } else if (e.keyCode == 38) {
                e.preventDefault();

                /*If the arrow UP key is pressed, decrease the focusedItemIndex variable:*/
                focusedItemIndex = focusedItemIndex !== 0 ? focusedItemIndex - 1 : focusedItemIndex = (itemElements.length - 1);
                /*and and make the current item more visible:*/
                setActive(itemElements, focusedItemIndex);
            } else if (e.keyCode == 13) {
                /* If the ENTER key is pressed and value as selected, close the list*/
                e.preventDefault();
                if (focusedItemIndex > -1) {
                    closeDropDownList();
                }
            }
        } else {
            if (e.keyCode == 40) {
                /* Open dropdown list again */
                var event = document.createEvent('Event');
                event.initEvent('input', true, true);
                inputElement3.dispatchEvent(event);
            }
        }
    });

    function setActive(items, index) {
        if (!items || !items.length) return false;

        for (var i = 0; i < items.length; i++) {
            items[i].classList.remove("autocomplete-active");
        }

        /* Add class "autocomplete-active" to the active element*/
        items[index].classList.add("autocomplete-active");

        // Change input value and notify
        inputElement3.value = currentItems[index].properties.formatted;
        callback(currentItems[index]);
    }

    function closeDropDownList() {
        var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
        if (autocompleteItemsElement) {
            containerElement.removeChild(autocompleteItemsElement);
        }

        focusedItemIndex = -1;
    }

    function addIcon(buttonElement) {
        var svgElement = document.createElementNS("http://www.w3.org/2000/svg", 'svg');
        svgElement.setAttribute('viewBox', "0 0 24 24");
        svgElement.setAttribute('height', "24");

        var iconElement = document.createElementNS("http://www.w3.org/2000/svg", 'path');
        iconElement.setAttribute("d", "M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z");
        iconElement.setAttribute('fill', 'currentColor');
        svgElement.appendChild(iconElement);
        buttonElement.appendChild(svgElement);
    }

    /* Close the autocomplete dropdown when the document is clicked. 
      Skip, when a user clicks on the input field */
    document.querySelector("#autocomplete-container13").addEventListener("click", function (e) {
        if (e.target !== inputElement3) {

            if (document.querySelector("#autocomplete-container13").childElementCount == 1) {
                cache.classList.remove("cacheCache");
                addTrajet.disabled = false;
            }
            closeDropDownList();
        } else if (!containerElement.querySelector(".autocomplete-items")) {
            // open dropdown list again
            var event = document.createEvent('Event');
            event.initEvent('input', true, true);
            inputElement3.dispatchEvent(event);
        }
    });

}

function addressAutocomplete2(containerElement, callback) {
    // // create input element
    // var inputElement2 = document.createElement("input");
    // inputElement2.setAttribute("type", "text");
    // inputElement2.setAttribute("placeholder", "etapes");
    // inputElement2.id = "location";
    // inputElement2.name = 'location';
    // // inputElement2.value = "<?php echo $location; ?>";
    // inputElement2.classList.add("input")
    // inputElement2.classList.add("input", "my-3", "py-5");
    // containerElement.appendChild(inputElement2);



    /* Current autocomplete items data (GeoJSON.Feature) */
    var currentItems;
    // let inputElement2 = document.getElementById("location");


    /* Active request promise reject function. To be able to cancel the promise when a new request comes */
    var currentPromiseReject;

    /* Focused item in the autocomplete list. This variable is used to navigate with buttons */
    var focusedItemIndex;

    /* Execute a function when someone writes in the text field: */
    inputElement2.addEventListener("input", function (e) {
        var currentValue = this.value;

        /* Close any already open dropdown list */
        closeDropDownList();

        // Cancel previous request promise
        if (currentPromiseReject) {
            currentPromiseReject({
                canceled: true
            });
        }


        /* Create a new promise and send geocoding request */
        var promise = new Promise((resolve, reject) => {
            currentPromiseReject = reject;

            var apiKey = "466e0f43eb46480eb308182662bcfca7";
            var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&&limit=5&&filter=countrycode:fr&&apiKey=${apiKey}`;


            // if (options.type) {
            //     url += `&type=${options.type}`;
            // }

            fetch(url)
                .then(response => {
                    // check if the call was successful
                    if (response.ok) {
                        response.json().then(data => resolve(data));
                    } else {
                        response.json().then(data => reject(data));
                    }
                });
        });

        promise.then((data) => {
            currentItems = data.features;

            /*create a DIV element that will contain the items (values):*/
            // var autocompleteItemsElement = document.createElement("div");
            var autocompleteItemsElement = document.createElement("div");
            autocompleteItemsElement.setAttribute("class", "autocomplete-items");
            // const metToila = document.getElementById("itemsGeo");
            containerElement.appendChild(autocompleteItemsElement);
            // const cache = document.getElementById("cache");
            if (document.querySelector(".autocomplete-container").childElementCount == 2) {
                cache.classList.add("cacheCache");
                firstAutoC.classList.add("enAvant");
                addEtape.classList.remove("enAvant");

            }

            /* For each item in the results */
            data.features.forEach((feature, index) => {
                /* Create a DIV element for each element: */
                var itemElement = document.createElement("DIV");
                /* Set formatted address as item value */
                itemElement.innerHTML = feature.properties.formatted;

                /* Set the value for the autocomplete text field and notify: */
                itemElement.addEventListener("click", function (e) {
                    inputElement2.value = currentItems[index].properties.formatted;

                    callback(currentItems[index]);

                    /* Close the list of autocompleted values: */
                    closeDropDownList();
                });

                autocompleteItemsElement.appendChild(itemElement);
            });
        }, (err) => {
            if (!err.canceled) {
                console.log(err);
            }
        });
    });

    /* Add support for keyboard navigation */
    inputElement2.addEventListener("keydown", function (e) {

        var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
        if (autocompleteItemsElement) {
            var itemElements = autocompleteItemsElement.getElementsByTagName("div");
            if (e.keyCode == 40) {
                e.preventDefault();
                /*If the arrow DOWN key is pressed, increase the focusedItemIndex variable:*/
                focusedItemIndex = focusedItemIndex !== itemElements.length - 1 ? focusedItemIndex + 1 : 0;
                /*and and make the current item more visible:*/
                setActive(itemElements, focusedItemIndex);
            } else if (e.keyCode == 38) {
                e.preventDefault();

                /*If the arrow UP key is pressed, decrease the focusedItemIndex variable:*/
                focusedItemIndex = focusedItemIndex !== 0 ? focusedItemIndex - 1 : focusedItemIndex = (itemElements.length - 1);
                /*and and make the current item more visible:*/
                setActive(itemElements, focusedItemIndex);
            } else if (e.keyCode == 13) {
                /* If the ENTER key is pressed and value as selected, close the list*/
                e.preventDefault();
                if (focusedItemIndex > -1) {
                    closeDropDownList();
                }
            }
        } else {
            if (e.keyCode == 40) {
                /* Open dropdown list again */
                var event = document.createEvent('Event');
                event.initEvent('input', true, true);
                inputElement2.dispatchEvent(event);
            }
        }
    });

    function setActive(items, index) {
        if (!items || !items.length) return false;

        for (var i = 0; i < items.length; i++) {
            items[i].classList.remove("autocomplete-active");
        }

        /* Add class "autocomplete-active" to the active element*/
        items[index].classList.add("autocomplete-active");

        // Change input value and notify
        inputElement2.value = currentItems[index].properties.formatted;
        callback(currentItems[index]);
    }

    function closeDropDownList() {
        var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
        if (autocompleteItemsElement) {

            containerElement.removeChild(autocompleteItemsElement);
        }

        focusedItemIndex = -1;
    }

    function addIcon(buttonElement) {
        var svgElement = document.createElementNS("http://www.w3.org/2000/svg", 'svg');
        svgElement.setAttribute('viewBox', "0 0 24 24");
        svgElement.setAttribute('height', "24");

        var iconElement = document.createElementNS("http://www.w3.org/2000/svg", 'path');
        iconElement.setAttribute("d", "M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z");
        iconElement.setAttribute('fill', 'currentColor');
        svgElement.appendChild(iconElement);
        buttonElement.appendChild(svgElement);
    }

    /* Close the autocomplete dropdown when the document is clicked. 
      Skip, when a user clicks on the input field */
    document.querySelector(".autocomplete-container").addEventListener("click", function (e) {
        if (e.target !== inputElement2) {

            if (document.querySelector(".autocomplete-container").childElementCount == 1) {
                cache.classList.remove("cacheCache");
                addEtape.classList.add("enAvant");
                info.classList.remove("redColor");
                info.textContent = "D'où partez vous ?";
            }
            closeDropDownList();
        } else if (!containerElement.querySelector(".autocomplete-items")) {
            // open dropdown list again
            var event = document.createEvent('Event');
            event.initEvent('input', true, true);
            inputElement2.dispatchEvent(event);
        }
    });

}


let gps1String = "";
let gps2String = "";
let gps3String = "";
let gpsCo1 = document.querySelector(".gpsCo1");
let gpsCo2 = document.querySelector(".gpsCo2");
let gpsCo3 = document.querySelector(".gpsCo3");
let gps1Data = 0;
let gps2Data = 0;
let gps3Data = 0;
let coordonneeTrajet = "";
let coordonneeTrajet2 = "";
let coordonneeTrajet3 = "";
addressAutocomplete(document.getElementById("autocomplete-container1"), (data) => {
    // console.log("Selected option: ");
    // console.log(data);
    if (data.properties.housenumber != undefined && data.properties.street != undefined) {
        inputElement.value = data.properties.housenumber + " " + data.properties.street + " " + data.properties.city;
    }
    if (data.properties.housenumber == undefined) {
        inputElement.value = data.properties.street + " " + data.properties.city;
    }
    if (data.properties.street == undefined && data.properties.housenumber == undefined) {
        inputElement.value = data.properties.city;
    }

    let gps2 = data.geometry.coordinates[1].toString() + "," + data.geometry.coordinates[0].toString();
    gps2String = gps2;
    coordonneeTrajet = gps2;
    if (coordonneeTrajet != "") {
        const url = `https://api.geoapify.com/v1/routing?waypoints=${coordonneeTrajet}|${coordonneeTrajet2}&format=json&mode=drive&apiKey=466e0f43eb46480eb308182662bcfca7`
        fetch(url).then(res => res.json()).then(result => {
            gps2Data = Math.round(result.results[0].time);
            let hours = hour.value.split(":")
            let hInSec1 = (+hours[0]) * 60 * 60 + (+hours[1]) * 60;
            hourEtape.value = secondsToHms(gps2Data + hInSec1);
            gpsCo2.value = gps2String;
        })
    }
});



addressAutocomplete2(document.getElementById("autocomplete-container"), (data) => {
    // console.log("Selected option: ");
    // console.log(data);
    if (data.properties.housenumber != undefined && data.properties.street != undefined) {
        inputElement2.value = data.properties.housenumber + " " + data.properties.street + " " + data.properties.city;
    }
    if (data.properties.housenumber == undefined) {
        inputElement2.value = data.properties.street + " " + data.properties.city;
    }
    if (data.properties.street == undefined && data.properties.housenumber == undefined) {
        inputElement2.value = data.properties.city;
    }

    let gps1 = data.geometry.coordinates[1].toString() + "," + data.geometry.coordinates[0].toString();
    gps1String = gps1;
    coordonneeTrajet2 = gps1;
    if (coordonneeTrajet2 != "") {
        const url = `https://api.geoapify.com/v1/routing?waypoints=${coordonneeTrajet2}|46.671361,5.550796&format=json&mode=drive&apiKey=466e0f43eb46480eb308182662bcfca7`
        fetch(url).then(res => res.json()).then(result => {
            gps1Data = Math.round(result.results[0].time);
            gpsCo1.value = gps1;
        })
    }
});


nbEtape = 1;
nbEtapeMax = 2;

let addTrajet = document.querySelector(".addTrajet");
addTrajet.addEventListener("click", (e) => {
    const isEmpty = document.querySelectorAll(".isEmpty");
    if (nbEtape < nbEtapeMax && isEmpty[0].value != "") {
        nbEtape++
        autocompleContainer13.classList.remove("dsn");
        if (nbEtape === nbEtapeMax) {
            const p = document.createElement("p")
            p.innerHTML = "<p class='greyText'>Vous avez atteint le nombre maximum d'étapes</p>"
            addEtape.appendChild(p)
            addTrajet.disabled = true;
        }
    }
})



addressAutocomplete3(document.getElementById(`autocomplete-container13`), (data) => {
    // let inputElement3 = document.getElementById("locationAdd2");
    if (data.properties.housenumber != undefined && data.properties.street != undefined) {
        inputElement3.value = data.properties.housenumber + " " + data.properties.street + " " + data.properties.city;
    }
    if (data.properties.housenumber == undefined) {
        inputElement3.value = data.properties.street + " " + data.properties.city;
    }
    if (data.properties.street == undefined && data.properties.housenumber == undefined) {
        inputElement3.value = data.properties.city;
    }
    let gps1 = data.geometry.coordinates[1].toString() + "," + data.geometry.coordinates[0].toString();
    gps3String = gps1;
    coordonneeTrajet3 = gps1;
    if (coordonneeTrajet3 != "") {
        const url = `https://api.geoapify.com/v1/routing?waypoints=${coordonneeTrajet}|${coordonneeTrajet3}&format=json&mode=drive&apiKey=466e0f43eb46480eb308182662bcfca7`
        fetch(url).then(res => res.json()).then(result => {
            gps3Data = Math.round(result.results[0].time);
            let hours = hourEtape.value.split(":")
            let hInSec1 = (+hours[0]) * 60 * 60 + (+hours[1]) * 60;
            hourEtapeSupp.value = secondsToHms(gps3Data + hInSec1);
            gpsCo3.value = gps1;
        })
    }
});


function secondsToHms(d) {
    d = Number(d);
    let h = Math.floor(d / 3600);
    if (h > 23) {
        h = h - 24;
    }
    let m = Math.floor(d % 3600 / 60);
    return ('0' + h).slice(-2) + ":" + ('0' + m).slice(-2);
}


const hour = document.getElementById('heure')
const arrive = document.getElementById('h-arrive');
const hourEtape = document.getElementById('h-mid1')
const hourEtapeSupp = document.getElementById('h-mid2')
let hourInSeconde = 0;
hour.addEventListener('change', (e) => {
    let hours = hour.value.split(":")
    let hInSec1 = (+hours[0]) * 60 * 60 + (+hours[1]) * 60;
    return arrive.value = secondsToHms(gps1Data + hInSec1);
})


// gpsCo1.value = gps1String;
// gpsCo2.value = gps2String;
// gpsCo3.value = gps3String;
// https://api.geoapify.com/v1/routing?waypoints=46.9032246,5.7727504|46.8348884,5.7086756|46.797,5.5597|46.6727037,5.5589973&mode=drive&apiKey=YOUR_API_KEY


coordonneeTrajet2 = gpsCo2.value;
coordonneeTrajet3 = gpsCo3.value;
coordonneeTrajet = gpsCo1.value;
coorLons = "46.671361,5.550796";


// const urlEtape = `https://api.geoapify.com/v1/routing?waypoints=${coordonneeTrajet}|${coordonneeTrajet2}|${coordonneeTrajet3}|${coorLons}&mode=drive&apiKey=466e0f43eb46480eb308182662bcfca7`
// fetch(urlEtape).then(res => res.json()).then(result => {
//     console.log(result.features[0].properties.legs)
//     console.log(Math.round(result.features[0].properties.legs[0].time));
//     console.log(Math.round(result.features[0].properties.legs[1].time));
//     console.log(Math.round(result.features[0].properties.legs[2].time));
// })



if (coordonneeTrajet2 == "" && coordonneeTrajet3 == "") {
    const url = `https://api.geoapify.com/v1/routing?waypoints=${coordonneeTrajet}|${coorLons}&mode=drive&apiKey=466e0f43eb46480eb308182662bcfca7`
    fetch(url).then(res => res.json()).then(result => {
        console.log(result.features[0].properties.legs[0].time)
    })
}

if (coordonneeTrajet3 == "") {
    const url = `https://api.geoapify.com/v1/routing?waypoints=${coordonneeTrajet}|${coordonneeTrajet2}|${coorLons}&mode=drive&apiKey=466e0f43eb46480eb308182662bcfca7`
    fetch(url).then(res => res.json()).then(result => {
        console.log(result.features[0].properties.legs[0].time)
        console.log(result.features[0].properties.legs[1].time)
    })
}

if (coordonneeTrajet2 != "" && coordonneeTrajet3 != "") {
    const urlEtape = `https://api.geoapify.com/v1/routing?waypoints=${coordonneeTrajet}|${coordonneeTrajet2}|${coordonneeTrajet3}|${coorLons}&mode=drive&apiKey=466e0f43eb46480eb308182662bcfca7`
    fetch(urlEtape).then(res => res.json()).then(result => {
        console.log(result.features[0].properties.legs)
        console.log(Math.round(result.features[0].properties.legs[0].time));
        console.log(Math.round(result.features[0].properties.legs[1].time));
        console.log(Math.round(result.features[0].properties.legs[2].time));
    })
}