// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTableFullPage').DataTable({
    dom: 'Bfrtip',
    responsive: true,
    rowReorder: true,
    buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5',
      'print',
      'pageLength'
    ],
    lengthMenu: [
      [ 10, 25, 50, -1 ],
      [ '10 rows', '25 rows', '50 rows', 'Show all' ]
    ]
     });
  $('#dataTablemin1').DataTable();
  $('#dataTablemin2').DataTable();
});
