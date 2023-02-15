import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
const deleteForms_list = document.querySelectorAll(".delete-form");


deleteForms_list.forEach((deleteForm) => {
    deleteForm.addEventListener("submit", function (event) {

        event.preventDefault();
        const conf = confirm("do you really want to delete this item?");

        if (conf === true) {
            deleteForm.submit();
        }
    })
})