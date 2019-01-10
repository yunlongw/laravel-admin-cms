require('./bootstrap');

window.ClipboardJS = require('clipboard');


$(document).ready(function () {
    $('.select2').select2();

    $('#admin-api-index-example').DataTable();
});

var clipboard = new ClipboardJS('.btn');
