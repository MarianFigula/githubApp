$(document).ready(function () {
    $('#detail').DataTable({
        responsive: true,
        paging: true,
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
        columnDefs: [
            {orderable: false, targets: [2, 4]},
            {orderable: true, className: 'reorder', targets: [0,1,3]}
        ]
    });
});
