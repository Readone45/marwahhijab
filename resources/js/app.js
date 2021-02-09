require('./bootstrap');

import Swal from 'sweetalert2';

window.deleteConfirm = function (formId) {
    Swal.fire({
        icon: 'warning',
        text: 'Do you want to delete this?',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        console.log(result);
        if (result.isConfirmed) {
            //console.log(formId);
            let a = document.getElementById(formId);
            a.submit();

        }
    });
}
