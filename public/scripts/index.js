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
        element.parentElement.parentElement.parentElement.classList.remove('is-active')
    })
}


// Add Item to DB
const addItemBtn = document.querySelector('#addItemBtn')
const addItemModal = document.querySelector('#addItemModal')

addItemBtn.addEventListener('click', () => {
    addItemModal.classList.add('is-active')
})