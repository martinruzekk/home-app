document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});

// Close Button
let closeButtons = document.querySelectorAll('.delete')

for (let i = 0; i < closeButtons.length; i++) {
    const element = closeButtons[i];
    element.addEventListener('click', () => {
        closeButton(element.parentElement.parentElement.parentElement)
    })
}

function closeButton(element) {
    console.log("closeButton")
    if (element != null) {
        element.classList.remove('is-active')
    }
}


// Add Item to DB
const addItemBtn = document.querySelector('#addItemBtn')
const addItemModal = document.querySelector('#addItemModal')

addItemBtn.addEventListener('click', () => {
    addItemModal.classList.add('is-active')
})

// Add company to DB
const addCompanyBtn = document.querySelector('#addCompanyBtn')
const addCompanyModal = document.querySelector('#addCompanyModal')

addCompanyBtn.addEventListener('click', () => {
    addCompanyModal.classList.add('is-active')
})
/*
const addCompanyName = document.querySelector('#addCompanyName')
const addCompanyStreet = document.querySelector('#addCompanyStreet')
const addCompanyStreetNumber1 = document.querySelector('#addCompanyStreetNumber1')
const addCompanyStreetNumber2 = document.querySelector('#addCompanyStreetNumber2')
const addCompanyCity = document.querySelector('#addCompanyCity')
const addCompanyZip = document.querySelector('#addCompanyZip')
const addCompanyCountry = document.querySelector('#addCompanyCountry')
const addCompanyLogoURL = document.querySelector('#addCompanyLogoURL')
const addCompanyType = document.querySelector('#addCompanyType')
const addCompanyUrl = document.querySelector('#addCompanyUrl')
const addCompanyDesc = document.querySelector('#addCompanyDesc')
const addCompanyEmail = document.querySelector('#addCompanyEmail')
const addCompanySubmit = document.querySelector('#addCompanySubmit')


addCompanySubmit.addEventListener('click', () => {
    /*const arr = [document.querySelector('#addCompanyName').value,
        document.querySelector('#addCompanyStreet').value,
        document.querySelector('#addCompanyStreetNumber1').value,
        document.querySelector('#addCompanyStreetNumber2').value,
        document.querySelector('#addCompanyCity').textContent,
        document.querySelector('#addCompanyZip').textContent,
        document.querySelector('#addCompanyCountry').value,
        document.querySelector('#addCompanyLogoURL').textContent,
        document.querySelector('#addCompanyType').textContent,
        document.querySelector('#addCompanyUrl').textContent,
        document.querySelector('#addCompanyDesc').textContent,
        document.querySelector('#addCompanyEmail').textContent,
        document.querySelector('#addCompanySubmit')
    ]
    console.log(arr)
    console.log(addCompanyName.value)
    if(addCompanyName.value == "" || addCompanyStreet.value == "" || addCompanyStreetNumber1.value == "" || addCompanyCity.value == "" || addCompanyZip.value == "" || addCompanyType.value == "") {
        alert('Všechna pole nejsou vyplněna')
    }  else {
        $.ajax({
            type: "POST",
            url: "/inventory/addCompany",
            data: {
                addCompanyName: addCompanyName.value.trim(),
                addCompanyStreet: addCompanyStreet.value.trim(),
                addCompanyStreetNumber1: addCompanyStreetNumber1.value.trim(),
                addCompanyStreetNumber2: addCompanyStreetNumber2.value.trim(),
                addCompanyCity: addCompanyCity.value.trim(),
                addCompanyZip: addCompanyZip.value.trim(),
                addCompanyCountry: addCompanyCountry.value.trim(),
                addCompanyLogoURL: addCompanyLogoURL.value.trim(),
                addCompanyType: addCompanyType.value.trim(),
                addCompanyUrl: addCompanyUrl.value.trim(),
                addCompanyDesc: addCompanyDesc.value.trim(),
                addCompanyEmail: addCompanyEmail.value.trim()
            }
        }).then((response) => {
            console.log(response)
            if (response == "success") {
                closeButton(addCompanyModal)
            }
        })
    }
})

*/

// Add Item Type

const addItemTypeModal = document.querySelector('#addItemTypeModal')
const addItemTypeBtn = document.querySelector('#addItemTypeBtn')

addItemTypeBtn.addEventListener('click', () => {
    addItemTypeModal.classList.add('is-active')
})

// Add Item Info Autocomplete

const itemInfoItem = document.querySelector('#item_info_item')
document.querySelector('.autocomplete').clientWidth = itemInfoItem.clientWidth

let tags = []

$("#item_info_item").autocomplete({
    source: tags
})

itemInfoItem.addEventListener('input', (target) => {
    let input = itemInfoItem.value
    if (input.trim() !== "") {
        $.ajax({
            type: "POST",
            url: "/inventory/searchItems",
            data: {
                query: itemInfoItem.value
            }
        }).then((response) => {
            console.log(response)
            console.log(tags)
            if (response.length <= 0) {
                tags = []
            } else {
                response.forEach(tag => {
                    if(!tags.includes(tag[0])) {
                        tags.push(tag[0])
                    }
                    
                });
            }
            console.log(tags)

        })
    }
})