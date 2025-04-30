import './bootstrap';

import Alpine from 'alpinejs';
import 'datatables.net-dt';
import 'datatables.net-dt/css/jquery.dataTables.css';
import $ from 'jquery';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    $('#classSectionsTable').DataTable(
        {
            responsive: true,
            pageLength: 10,
            columnDefs: [
                {orderable: false, targets: -1},
            ],
        });
});